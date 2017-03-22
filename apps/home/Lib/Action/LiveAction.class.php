<?php
header('Content-type:text/html;charset=utf-8');
/**
 * 直播室控制器
 * @author ashangmanage <ashangmanage@phpzsm.com>
 * @version CY1.0
 */
//session_start();
class LiveAction extends Action
{
	private $_roomidArr_model;			// 直播间模型
	private $_user_model;				// 用户模型字段
	private $livemodel;				    // 直播模型

	/**
	 * 模块初始化
	 * @return void
	 */
	protected function _initialize()
	{
		//实例化模型		
		$this->livemodel        = model('Live');
		$this->_roomidArr_model = model('studioroom');
		$this->_user_model      = model('User');

	}
	
	//首页
	public function index()
	{
		//表前缀
		$tp = C('DB_PREFIX');
		// if(!(model('Passport')->isLogged())){
		// 	$this->error("请先登录!");
		// 	U('index/Index/index','',true);
		// }
		//js变量值
		// echo '<pre>';
		// print_r($_COOKIE);exit;
		
		//初始化房间信息
		$user = $this->initializationRoom();

		//用户的id
		$userinfo = $user['uid'] ? array('_'=>$user['uid']) : array('__'=>$user['id']);
		$gundong = "\$(\".bar_gundong\").toggle(function(){\$(this).removeAttr('checked');},function(){\$(this).attr('checked',true);});";
		//换肤的值
		$bg_img = isset($_COOKIE['bg_img']) ? $_COOKIE['bg_img'] : 'http://www.educationonline.com/addons/theme/stv1/_static/style/bj.jpg';
		//换肤图片
		$skin = '';
		for($i=2;$i<25;$i++) {
			$skin .= '<a href="javascript:void(0)" rel="__THEME__/style/skin/w'.$i.'.jpg" onclick="changeSkin(this)"><img src="__THEME__/style/w'.$i.'x.jpg"></a>';
		}

		//查询聊天信息
		//判断房间号
		$chatarr  = array();
		$roomid   = isset($_GET['roomid']) ? $_GET['roomid'] : '';
		$chatinfo = M ('chatlist') -> field("id,mid,gid") -> where ("roomid = '{$roomid}' and private_chat = 0") -> limit(20) -> order("id desc") -> select();
		$chatinfo = array_reverse($chatinfo);
		foreach($chatinfo as $val) {
			if($val['gid']){
				$chatarr[] = M ('chatlist') -> field("{$tp}chatlist.*,b.id,b.usergroupid") ->join ("left join {$tp}guest as b on {$tp}chatlist.mid = b.id") -> where ("{$tp}chatlist.id = {$val['id']}") -> find();
			}else {
				$chatarr[] = M ('chatlist') -> field("{$tp}chatlist.*,b.user_group_id") ->join ("left join {$tp}user_group_link as b on {$tp}chatlist.mid = b.uid") -> where ("{$tp}chatlist.id = {$val['id']}") -> find();
			}
		}
		// echo '<pre>';
		// print_r($chatarr);exit;
		//分配变量
		$this->assign('gundong',$gundong);
		$this->assign('user',$user);
		$this->assign('chatarr',$chatarr);
		$this->assign('skin',$skin);
		$this->assign('userinfo',$userinfo);
		$this->assign('bg_img',$bg_img);
		//print_r($tp);exit;
		$this->display();
	}

	//初始化房间信息
	//判断登录情况
	private function initializationRoom()
	{
		//获取表前缀
		$tp = C('DB_PREFIX');

		//获取静态目录
		$theme = THEME_PUBLIC_URL;
	    $guest =  M ('guest');

		//判断房间号
		$roomid = isset($_GET['roomid']) ? $_GET['roomid'] : '';
		//查询所有房间的id
		$roomidArr = $this->livemodel->getroom();

		//判断当前房间id是否准确
		if(!in_array($roomid, $roomidArr)){
			echo "string";
			$this->redirect('home/Live/index',array('roomid'=>$roomidArr[0]));
			exit;
		}

		//加入ip判断
		$thisip  = get_client_ip();
		$isblack = $this->_roomidArr_model->query("select id from {$tp}ipblacklist where ip = '$thisip'");

		//判断ip是否列入黑名单,查询客服QQ
		if($isblack){
  			$qq_rs = $this->_roomidArr_model->query("select * from {$tp}qqlist");
  			if($qq_rs) { 		
        		echo '<a href="http://wpa.qq.com/msgrd?v=3&uin='.$qq_rs[0]["code"].'&site=qq&menu=yes" target="_blank" ><img src="'.$theme.'/style/QQ.jpg" title="'.$qq_rs[0]["code"].'"/></a>&nbsp;&nbsp;';
     		}  
     		echo "<br/>你的ip已经被屏蔽,请联系管理员";
			exit;
     	}

     	//判断房间是否开放
     	$peizhi = $this->_roomidArr_model->where("roomid = '{$roomid}'")->find();
		if(!$peizhi['onoff']){
			$this->error('当前房间暂时未开放');
			exit;
		}

		//判断是否需要密码
		// if($_GET['pwd'] != $peizhi['password']) {
		// 	$this->redirect('home/Live/showPassword',array('roomid'=>$roomid));
		// 	exit;
		// }

		//判断是否存在登录情况
		$login = $tp.'login';
		if($_SESSION['gid']){
			$guser = $guest->where("id = '$_SESSION[gid]' and roomid = '$roomid'")->find();    		   		
		}else if($_SESSION['mid']){
    		$user = $this->_user_model-> field("{$tp}user.*,b.user_group_id")->join("left join {$tp}user_group_link as b on {$tp}user.uid = b.uid") -> where("{$tp}user.uid = '$_SESSION[mid]' and roomid = '$roomid'")->find(); 
		}

		if(!$user && !$guser){
			$user = $this->_user_model->where("login = '$_COOKIE[$login]' and roomid = '$roomid'")->find();
    		if(!$user) {
    			$guser = $guest->where("username = '$_COOKIE[$login]' and roomid = '$roomid'")->find();
    		}
		}
		// echo "<pre>";
		// print_r($user);exit;
		//如果没有数据则生成游客身份
		if(!$user && !$guser){
			$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		 		for($i = 0; $i < 4; $i ++) {
		        	$returnStr .= $pattern {mt_rand ( 0, 61 )};
				} //生成php随机数
			$arr=array(
			'uname'       => "游客".$returnStr,
			'usergroupid'    => 14,
			'last_logintime' => time(),
			'ctime'          => time(),
			'roomid'         => $roomid,
			'ip'             => $thisip,
			);
			
			//创建数据
			$data = $guest->create($arr);
			//插入数据
			$mid = $guest->add();

			//查询刚插入的数据
			$user = $guest->where("id = '$mid'")->find();
			$_SESSION['gid']      = $mid;
			$_SESSION['username'] = "游客".$returnStr;
			$_SESSION['roomid']   = $user['roomid'];
		}else if($user){
			//更新登录的ip
			$data['ip'] = $thisip;
			$this->_user_model->where("uid = '$user[uid]'")->save($data);

			$_SESSION['username'] = $user['uname'];
			$_SESSION['mid']      = $user['uid'];
			$_SESSION['roomid']   = $user['roomid'];
		}

		$username = $user['login'] ? $user['login'] : $guser['username'];
		cookie('login', $username, time()+8640000);

		$user = $user ? $user : $guser;
		return $user;
	}

	//添加聊天信息
	//$roomid 直播室房间id
	public function addchat()
	{
		//获取表前缀
		$tp = C('DB_PREFIX');

		//判断ip是否被拉黑
		$thisip = get_client_ip();
		$ipinfo = M ('ipblacklist')->field('id')->where("ip = '{$thisip}'")->find();
		if($ipinfo) {
			echo json_encode("iphei");
			exit;
		}

		//获取提交的数据
		$content    = $arr['content']          = isset($_POST['content']) ? $_POST['content'] : "";         //聊天内容
		$username   = $arr['uname']            = isset($_POST['username']) ? $_POST['username'] : "";       //用户名字
		$mid        = $arr['mid']              = isset($_POST['mid']) ? $_POST['mid'] : "";                 //用户id
		$tomid      = $arr['tomid']            = isset($_POST['tomid']) ? $_POST['tomid'] : "";             //对象id
		$tousername = $arr['touname']          = isset($_POST['tousername']) ? $_POST['tousername'] : "";   //对象名称
		$siliao     = $arr['private_chat']     = isset($_POST['siliao']) ? $_POST['siliao'] : "";           //是否私聊
		$roomid     = $arr['roomid']           = isset($_POST['roomid']) ? $_POST['roomid'] : "";           //房间id
		$gid        = $arr['gid']              = isset($_POST['gid'])      ? $_POST['gid'] : "";            //游客身份用户组id		
		$togid      = $arr['toadminid']        = isset($_POST['togid'])    ? $_POST['togid'] : "";          //对象用户组id		
		$myadminid  = $arr['myadminid']        = isset($_POST['myadminid'])    ? $_POST['myadminid'] : "";  //发言者用户组id		
		$roleid     = isset($_POST['roleid'])   ? $_POST['roleid'] : "";                                    //身份id		
		$rolename   = isset($_POST['rolename']) ? $_POST['rolename'] : "";                                  //身份姓名
		$roleaid    = isset($_POST['roleaid'])  ? $_POST['roleaid'] : "";                                    //身份用户组id

		//查询用户信息和对象的信息
		if($gid) {
			//当为游客时查询游客表
			$user = M ('guest')->where("id = '{$mid}'")->find();
		}else {
			//$user = $this->_user_model->where("uid = '{$mid}'")->find();
			$user = $this->_user_model->field("{$tp}user.uname,{$tp}user.uid,{$tp}user.is_say,{$tp}user.roomid,b.user_group_id")->join("left join {$tp}user_group_link as b on {$tp}user.uid = b.uid")->where("{$tp}user.uid = '{$mid}'")->find();
		}

		//查询对象的信息
		$touser = $this->_user_model->field("{$tp}user.uname,{$tp}user.uid,b.user_group_id")->join("left join {$tp}user_group_link as b on {$tp}user.uid = b.uid")->where("{$tp}user.uid = '{$tomid}'")->find();
		
		//查询房间配置信息
		$roomconfig = $this->_roomidArr_model->where("roomid = '{$roomid}'")->find();

		//发言时间差
		$timediff = time() - $_SESSION['saytime'];
		if($user['usergroupid'] == 14 && $timediff < $roomconfig['speak_interval']){
			echo json_encode($roomconfig['speak_interval'] - $timediff);
			return false;
		}

		//设置发言时间
		$_SESSION['saytime'] = time();

		//判断是否被禁言
		if(!$user['is_say']){
			echo json_encode("jinyan");
			return false;
		}

		//表情替换
		$arr['content'] = $this->smile_replace($content);
		//敏感词过滤
		$arr['content'] = $this->words_replace($arr['content'],$roomconfig['sensitive_words']);
		//标签替换
		$arr['content'] = str_ireplace("<script", "&ltscript", $arr['content']);
		$arr['content'] = str_ireplace("</script", "&lt/script", $arr['content']);
		$arr['content'] = str_ireplace("<style", "&ltstyle", $arr['content']);
		$arr['content'] = str_ireplace("</style", "&lt/style", $arr['content']);
		$arr['time']    = time();

		//创建数据
		if( M ('chatlist')->create($arr)){
			//插入数据
			$addid = M ('chatlist')->add();
		}

		//用户级别
		$usergroupid = $user['user_group_id'] ? $user['user_group_id'] : $user['usergroupid'];
		//返回聊天json信息
		$chat = array(
			'lid'     	 => $addid,
			'mid'     	 => $mid,
			'username'	 => $username,
			'adminid' 	 => $usergroupid,
			'content' 	 => $this->smile_replace($_POST['content']),
			'content2'	 => $arr['content'],
			'tomid'   	 => $arr['tomid'],
			'togid'   	 => $togid,
			'time'    	 => time(),
			'fid'        => $user['roomid'],
			'tousername' => $arr['touname'],
			'toadminid'  => $touser['user_group_id'],
			'shstatus'   => 1,		
		);		

		echo json_encode($chat);

		//创建敏感信息数据
		$arr['chat_id'] = $addid;
		//判断是否是敏感信息
		if(preg_match('/[1-9][0-9]{9,}/', $_POST['content'])){
			$arr['content']=$_POST['content'];
			if( M('chatlist_sen') -> create($arr)) {
				M('chatlist_sen') -> add();
			}
		}else{
			//敏感词判断
			$words = explode('|',$roomconfig['sensitive_words']);
			foreach ($words as $key =>$value){				
				if(strpos($content, $value) > -1){
					$arr['content'] = $content;
					if( M('chatlist_sen') -> create($arr)) {
						M('chatlist_sen') -> add();
					}
					break;
				}
			}
		}
	}

	//获取私聊的信息
	public function private_chat()
	{
		$time       = time()-3600*24;
		$tomid      = $_POST['tomid'];
		$mid        = $_POST['mid'];
		//获取私聊信息

		$arr = array();
		$arr = M ('chatlist') -> where ("(mid = '$mid' and tomid = '$tomid' and private_chat = 1) or (mid = '$tomid' and tomid = '$mid' and private_chat = 1)") -> select ();
		echo json_encode($arr);
	}

	//根据传入的id输出相应的信息
	public function userinfo()
	{
		$guest =  M ('guest');
		//获取静态目录
		$theme = THEME_PUBLIC_URL;
		if(isset($_GET['_'])) {
			//查询是否是会员
			$user = $this->_user_model->getUserInfo($_GET['_']);
		}else if(isset($_GET['__'])) {
			//如果不是会员，则查询游客列表
			$user = $guest->where("id = '{$_GET["__"]}'")->find();
		}
		
		// echo '<pre>';
		// print_r($user);exit;

		//组别信息
		$groupid = $user['user_group'][0]['user_group_id'] ? $user['user_group'][0]['user_group_id'] : $user['usergroupid'];
		$uid = $user['uid'] ? $user['uid'] : $user['id'];
		//观看时间cookie设置
		$mycooke = isset($_COOKIE['clearvideo']) ? $_COOKIE['clearvideo'] : "''";
		//添加聊天信息的链接
		$addchat = U ('home/Live/addchat');
		$Private = U ('home/Live/private_chat');

		//查询会员所对应的房间的配置信息
     	$peizhi = $this->_roomidArr_model->where("roomid = '{$user[roomid]}'")->find();
     	echo "var FID       = '$user[roomid]';
		var MID             = $uid;
		var USERNAME        = '$user[uname]';
		var ADMINID         = $groupid;
		var TUIJIANMID      = '';
		var TUIJIANUSERNAME = '';
		var TUIJIANADMINID  = '';
		var LOGIN_COUNT     = '';
		var TOMID           = '';
		var TOUSERNAME      = '';
		var COOKIE          = $mycooke;
		var FAYAN_LIMIT     = '$peizhi[speak_interval]';
		var Flower_NUM      = '';
		var VIEWSTATUS      = '$peizhi[viewstatus]';
		var VIEWTIME        = '$peizhi[viewtime]';
		var LOGIN_SWITCH    = 1;
		var LOGIN_TIP       = 1;
		var ADDCHAT         = '$addchat';
		var Private_chat    = '$Private';
		var THEME           = '$theme';
		";
	}

	//输入密码页面
	public function showPassword()
	{
		//跳转的链接
		$url = U('home/Live/showPassword');
		//是否有post请求
		if($_POST['pwd']) {
			$pwd    = $_POST['pwd'];     //密码
			$roomid = $_POST['roomid']; //房间号

			//获取房间密码
	     	$password = $this->_roomidArr_model->field('password')->where("roomid = '{$roomid}'")->find();

			//判断密码是否正确
			if($pwd == $password['password']) {
				$this->redirect('home/Live/index',array('roomid'=>$roomid, 'pwd'=>$pwd));
				exit;
			}
		}

		//分配变量
		$this->assign('url', $url);
		$this->display('password');
	}

	//表情替换
	private function smile_replace($content){
		$smile=array ( 
			0 =>'/鼓掌', 
			1 => '/跳', 
			2 => '/kiss',
			3 => '/来电', 
			4=> '/贱笑', 
			5 => '/陶醉', 
			6 => '/兴奋',
			7 => '/鄙视',
			8=> '/得意',
			9=> '/偷笑', 
			10=> '/挖鼻孔',
			11=> '/衰',
			12 => '/流汗',
			13 => '/伤心', 
			14 => '/鬼脸',
			15=> '/狂笑',
			16=> '/发呆',
			17 => '/害羞',
			18=> '/可怜',
			19=> '/气愤',
			20=> '/惊吓',
			21=> '/困了',
			22=> '/再见',
			23=> '/感动',
			24=> '/晕' ,
			25=> '/可爱',
			26=> '/潜水',
			27 => '/强' ,
			28=> '/囧',
			29=> '/窃笑',
			30=> '/疑问',
			31=> '/装逼',
			32=> '/抱歉',
			33=> '/鼻血',
			34=> '/睡觉',
			35=> '/委屈',
			36=> '/笑哈哈',
			37=> '/贱贱地笑',
			38=> '/被电',
			39=> '/转发',
			40 => '/求关注',
			41=> '/路过这儿',
			42=> '/好激动',
			43=> '/招财' ,
			44=> '/加油啦',
			45=> '/转转',
			46=> '/围观',
			47=> '/推撞',
			48=> '/来嘛',
			49=> '/啦啦啦' ,
			50 => '/切克闹',
			51=> '/给力',
			52=> '/威武',
			53=> '/流血',
			54=> '/顶一个', 
			55=> '/赞一个' ,
			56=> '/掌声' ,
			57=> '/鲜花' ,
			
			
			'Expression_1'=> '[鼓掌]' ,
			'Expression_2'=> '[跳]' ,
			'Expression_3'=> '[kiss]' ,
			'Expression_4'=> '[来电]' ,
			'Expression_5'=> '[贱笑]' ,
			'Expression_6'=> '[陶醉]' ,
			'Expression_7'=> '[兴奋]' ,
			'Expression_8'=> '[鄙视]' ,
			'Expression_9'=> '[得意]' ,
			'Expression_10'=> '[偷笑]' ,
			'Expression_11'=> '[挖鼻孔]' ,
			'Expression_12'=> '[衰]' ,
			'Expression_13'=> '[流汗]' ,
			'Expression_14'=> '[伤心]' ,
			'Expression_15'=> '[鬼脸]' ,
			'Expression_16'=> '[狂笑]' ,
			'Expression_17'=> '[发呆]' ,
			'Expression_18'=> '[害羞]' ,
			'Expression_19'=> '[可怜]' ,
			'Expression_20'=> '[气愤]' ,
			'Expression_21'=> '[惊吓]' ,
			'Expression_22'=> '[困了]' ,
			'Expression_23'=> '[再见]' ,
			'Expression_24'=> '[感动]' ,
			'Expression_25'=> '[晕]' ,
			'Expression_26'=> '[可爱]' ,
			'Expression_27'=> '[潜水]' ,
			'Expression_28'=> '[强]' ,
			'Expression_29'=> '[囧]' ,
			'Expression_30'=> '[窃笑]' ,
			'Expression_31'=> '[疑问]' ,
			'Expression_32'=> '[装逼]' ,
			'Expression_33'=> '[抱歉]' ,
			'Expression_34'=> '[鼻血]' ,
			'Expression_35'=> '[睡觉]' ,
			'Expression_36'=> '[委屈]' ,
			'Expression_37'=> '[笑哈哈]' ,
			'Expression_38'=> '[贱贱地笑]' ,
			'Expression_39'=> '[被电]' ,
			'Expression_40'=> '[转发]' ,
			'Expression_41'=> '[求关注]' ,
			'Expression_42'=> '[路过这儿]' ,
			'Expression_43'=> '[好激动]' ,
			'Expression_44'=> '[招财]' ,
			'Expression_45'=> '[加油啦]' ,
			'Expression_46'=> '[转转]' ,
			'Expression_47'=> '[围观]' ,
			'Expression_48'=> '[推撞]' ,
			'Expression_49'=> '[来嘛]' ,
			'Expression_50'=> '[啦啦啦]' ,
			'Expression_51'=> '[切克闹]' ,
			'Expression_52'=> '[给力]' ,
			'Expression_53'=> '[威武]' ,
			'Expression_54'=> '[流血]' , 
			'Expression_55'=> '[顶一个]' ,
			'Expression_56'=> '[赞一个]' ,
			'Expression_57'=> '[掌声]' ,
			'Expression_58'=> '[鲜花]' ,
		);
		foreach ($smile as $key =>$value){
		$i=$key;
		$theme = THEME_PUBLIC_URL;
		$content = str_replace (
	        $value,'<img align="absmiddle" src="'.THEME_PUBLIC_URL.'/style/face/'.$i.'.gif">',$content);
		}
		return $content;		
	}
	
	//关键字过滤
	private function words_replace($content,$pingbi){
		$words=explode('|',$pingbi);
		
		foreach ($words as $key =>$value){
		
		$content = str_replace ($value,'***',$content);
		}
		$content = str_replace("'", "\'", $content);
		return $content;	
	}

}
<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
    <?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?>
    <?php else: ?>
        <?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?>
    </title>
    <meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
    <meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
    <meta property="qc:admins" content="142507604576615276467164506000761451001">
    
    <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="default">
    <meta name="browsermode" content="application">
    <meta name="apple-touch-fullscreen" content="no">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <!--<base href="/">--><base href=".">
    <link rel="shortcut icon" href="__THEME__/style/favicon.ico" type="image/x-icon">
  
    <link href="__THEME__/style/css/css.css" type="text/css" rel="stylesheet">
    <link href="__THEME__/style/css/media.css" rel="stylesheet" type="text/css">
    <script src="__THEME__/style/js/jquery-1.7.2.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="__THEME__/style/css/fancybox.css">
    <link href="__THEME__/style/css/jquery.qtip.css" rel="stylesheet">
    <link rel="stylesheet" href="__THEME__/style/css/slide.css">
    <script type="text/javascript" src="<?php echo U('home/Live/userinfo',$userinfo);?>" media="all"></script>
    <script type="text/javascript" src="__THEME__/style/js/jquery.cookie.js"></script>

    <!--socoket start-->
    <script type="text/javascript" src="__THEME__/style/js/swfobject.js"></script>
    <script type="text/javascript" src="__THEME__/style/js/web_socket.js"></script>
    <script type="text/javascript" src="__THEME__/style/js/json.js"></script>
    <script type="text/javascript" src="__THEME__/style/js/websocket_config.js" media="all"></script>
    <script src="__THEME__/style/js/main.js" type="text/javascript"></script>
    <script src="__THEME__/style/js/controller.js" type="text/javascript"></script>
    <script src="__THEME__/style/js/register.js" type="text/javascript"></script>
    <script src="__THEME__/style/js/jquery.fancybox-1.3.1.pack.js" type="text/javascript"></script>
    <script src="__THEME__/style/js/jquery.qtip.js" type="text/javascript"></script>
    <script src="__THEME__/style/js/jquery.rotate.min.js"></script>
    <script src="__THEME__/style/js/rotate.js"></script>
    <script src="__THEME__/style/js/slide.js"></script>
    <script>

        $(document).ready(function(){

            $('.showdiv').fancybox({'centerOnScroll':true});
            $('.iframe').fancybox({'width':'75%','height':'75%','centerOnScroll':true});
            $('.ajax').fancybox({'width':770,'height':430,'centerOnScroll':true});
            $("#kcb").fancybox({'centerOnScroll':true,'onStart':function(){initKecheng()},'showCloseButton':false});
            $("#login").fancybox({'centerOnScroll':true,'onStart':function(){$('.shipinchuangkou').html('')},'onClosed':function(){loadVideo()}});
            $("#register").fancybox({'centerOnScroll':true,'onStart':function(){$('.shipinchuangkou').html('')},'onClosed':function(){loadVideo()}});
            $("#ts").fancybox({'centerOnScroll':true});
            $("#ms").fancybox({'centerOnScroll':true});
            $('.teacher').fancybox({'width':920,'height':600,'padding':0,'centerOnScroll':true});
            //  $('.rotate').fancybox({'width':920,'height':'75%','padding':0,'margin':0,'opacity':true,'overlayShow':false});
        });

    </script>

    <!--mp3插件-->
    <script type="text/javascript" src="__THEME__/style/js/swfobject(1).js"></script>
    <script type="text/javascript">
        var flashvars = {
        };
        var params = {
            wmode: "transparent"
        };
        var attributes = {};
        swfobject.embedSWF("__THEME__/style/sound.swf", "sound", "1", "1", "9.0.0", "__THEME__/style/expressInstall.swf", flashvars, params, attributes);

        function play(music) {
            var sound = swfobject.getObjectById("sound");
            if (sound) {
                sound.SetVariable("f", music);
                sound.GotoFrame(1);}
        }
    </script><style type="text/css" media="screen">#sound {visibility:hidden}</style>
    <!--mp3插件/end-->

</head>

<body>
<div id="skin">
            <img src="<?php echo ($bg_img); ?>">
    </div>
 <div class="top" id="top">
    <div class="top_left">
        <object type="application/x-shockwave-flash" data="__THEME__/style/sound.swf" width="1" height="1" id="sound" style="visibility: visible;"><param name="wmode" value="transparent"></object>
        <div class="logo fl"><a href="javascript:;"><img src="__THEME__/style/logoll_1001.png"></a></div>
        <div class="baocun fl">
        <a href="http://www.zhibo.net/durl.php?fid=1001" class="shortcut" target="_blank" style="background: url(__THEME__/style/images/header-icon.png) no-repeat 10px -6px; padding-left:50px;" id="durl">保存到桌面</a>
        
           
           
            <a style="line-height: 14px;display: inline-block;text-align: center;font-weight:bold;border:solid 1px #FF0;color: #FF0;padding: 5px;width: 30px; cursor:pointer; height:auto;" href="#skinbox" class="changeskin showdiv">换肤</a>
            <!--<a href="javascript:void(0)" style="color: #E5FF00;background: #f00;padding: 5px;margin-left:20px" onclick="$('.haibao #welcome').attr('src','images/welcome3.jpg');$('.haibao').show();"> </a>-->
        </div>
        <script type="text/javascript">

            function AddFavorite(sURL, sTitle) {
                try {
                    window.external.addFavorite(sURL, sTitle);
                } catch (e) {
                    try {
                        window.sidebar.addPanel(sTitle, sURL, "");
                    } catch (e) {
                        alert("加入收藏失败，请使用Ctrl+D进行添加");
                    }
                }
            }

        </script>
        <div class="nav fl" style="display:none;"> <a href="http://www.zhibo.net/durl.php?fid=1001" class="shortcut" target="_blank" id="durl" style="display:none;"><img src="__THEME__/style/save_desk.gif"></a>
                        <a href="http://www.zhibo.net/ajax.php?nid=" class="shortcut ajax" style="color: #fff;
  height: 46px;
  line-height: 46px;
  padding: 0 13px 0px 40px;background: url(&#39;..__THEME__/style/images/mobile.png&#39;) 12px 7px no-repeat #e03f27; display:none;">手机看直播</a>
                        <!--<p class="fl" onclick="$('.haibao').show()" style="margin-left:20px;cursor:pointer">更多>></p>-->
        </div>
    </div>
    <?php if(in_array($user['uid'],$user)): ?><div class="top_right fr header_right"> <span class="guestname"><a href="javascript:void(0)" class="guest_ico">
        <?php echo ($user['uname']); ?>    </a></span>
        <!-- <span><a href="javascript:void(0)" class="guest_ico"><img style="margin-top:5px;" src="image/Connect_logo_6.png" width="50" height="16" alt=""></a></span> -->
        <!-- <span><a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0acaedecfdadfcff&redirect_uri=http%3a%2f%2fzb.yuyingshipx.com%2fwechatCode.php%3fact%3dwechat&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect" class="guest_ico">
        <img style="margin-top:5px;" src="image/Connect_logo_6.png" width="50" height="16" alt=""></a></span> -->
                        <span id="log_span"><a class="log on_log" href="admin_user/index.php" target="_blank">个人中心</a></span> <span id="reg_span"><a class="reg on_reg" href="sys/off.php">退出</a></span>
                    <span class="links"><a class="showdiv" href="#tcontent">联系我们</a></span>
        </div>
    <?php else: ?>
    <div class="top_right fr header_right"> <span class="guestname"><a href="javascript:void(0)" class="guest_ico">
    <?php echo ($user['uname']); ?>    </a></span>
    <!-- <span><a href="javascript:void(0)" class="guest_ico"><img style="margin-top:5px;" src="image/Connect_logo_6.png" width="50" height="16" alt=""></a></span> -->
    <!-- <span><a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0acaedecfdadfcff&redirect_uri=http%3a%2f%2fzb.yuyingshipx.com%2fwechatCode.php%3fact%3dwechat&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect" class="guest_ico">
    <img style="margin-top:5px;" src="image/Connect_logo_6.png" width="50" height="16" alt=""></a></span> -->
                <!-- <span><a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&amp;client_id=101381107&amp;redirect_uri=http%3a%2f%2fdxjjyxbd.com%2freturnResult.php%3fact%3dQQ%26fid%3d1001&amp;state=mytest&amp;scope=get_user_info" class="guest_ico">
    <img style="margin-top:5px;" src="__THEME__/style/Connect_logo_6.png" width="50" height="16" alt=""></a></span> -->
            <span id="log_span"><a class="log on_log" href="#login_form" id="login">会员登录</a></span> <span id="reg_span"><a class="reg on_reg" href="/#register_form" id="register">加入我们</a></span>
                <span class="links"><a class="showdiv" href="http://www.zhibo.net/#tcontent">联系我们</a></span>
                    <a href="javascript:void(0)" class="shortcut ajax" style="color: #fff;
  height: 46px;
  line-height: 46px;
  padding: 0 13px 0px 10px;background: #e03f27;  font-size: 20px;
  color: #ff0;" onclick="$(&#39;#register&#39;).click()">免费注册</a>
  </div><?php endif; ?>
</div>

<!--提示框-->
<style>
    .header{display:none}
    .topnav-area{width:98%;}
    #qtip-growl-container{
        position: fixed;
        z-index:9999;
        left:50%;
        margin-left:-250px;
        margin-top:18%;
    }
    #qtip-growl-container .qtip{
        position: static;
        min-height: 0;
        overflow: hidden;
        margin: 0 0 5px 0;
    }
</style>
<div id="qtip-growl-container"></div>

<!-- 提示结束-->

<div class="main" style="height: 890px;">
    <script type="text/javascript">Main_Height();</script>
    <!-- <div class="main_right_right">
        <style>
            .main_right_right{ float:left; height:100%; width:59px; padding:0px auto; background:#464649;border-radius: 2px 2px 2px 2px;text-align:center;margin-right:5px}
            .main_right_right li{ height:90px; float:left; border-bottom:1px solid #615f5f;}
            .main_right_right li.last{ border-bottom:none;}
            .main_right_right li a{ display:block; width:58px; height:25px; padding-top:64px; text-align:center;color:#fff; font-size:12px;}
            .main_right_right li a:hover{ color:#ff0;}
            .main_right_right li a:active{ color:#fff;}
            .main_right_right .menu1 a{background:url(__THEME__/style/images/left_menuico.png) 2px 15px no-repeat;}
            .main_right_right .menu2 a{background:url(__THEME__/style/images/left_menuico.png) 2px -83px no-repeat;}
            .main_right_right .menu3 a{background:url(__THEME__/style/images/left_menuico.png) 2px -177px no-repeat;}
            .main_right_right .menu4 a{background:url(__THEME__/style/images/left_menuico.png) 2px -266px no-repeat;}
            .main_right_right .menu5 a{background:url(__THEME__/style/images/left_menuico.png) 1px -525px no-repeat;}
            .main_right_right .menu6 a{background:url(__THEME__/style/images/left_menuico.png) 2px -430px no-repeat;}
            .main_right_right .menu7 a{background:url(__THEME__/style/images/left_menuico.png?v) 0px -355px no-repeat;}
        </style>
        <ul>
           
             <li class="menu2 on_cpcl">
         
        <a href="handan.php?status=0" class="iframe" id="hdtx" target="_blank" >最新就业</a>
      
            </li> 

           <li class="menu3 on_mstd"><a href="http://www.zhibo.net/teacher_list.php" class="iframe teacher"> 名师团队</a></li>

       
             <li class="menu7 on_advice ">
                       <a href="javascript:void(0)" onclick="notice(&#39;对不起，您不具有查看此栏目的权限，请注册或登录后查看&#39;);return false;">共享文件</a>
                    </li>
             <li class="menu6 on_advice ">
               
                 <a href="http://www.zhibo.net/#kechengopenbox" id="kcb" class="course on_course" style="border:none;">课程安排</a>
                
            </li>
        </ul>
    </div> -->
    <div class="main_left fl">
  
      <div class="zaixian" style="height: 946px;">
            <div class="zaixian_tit"> <a href="javascript:void(0)" class="renshu on" rel="2000"> 在线人数                       
                    <b></b>人 </a>
                <a href="javascript:void(0)" id="user_select" rel="tuijian" class=""> 在线主播</a>
            </div>
            <div class="User_List" style="height: 908px;">
                <ul id="users_online">
                </ul>
                <ul id="mykefu" style="display: none;">
                </ul>
            </div>
        </div>
        <!--/.zaixian-->

  </div>
    <script>
        Userlist_Height();

    </script>
    
    <div class="main_middle ">
        <div class="liaotiankuang">
            <div id="liaotianlist">            
                <div class="load_more"><a href="javascript:void(0)" onclick="loadMore()">查看更多信息</a></div>
                <?php if(is_array($chatarr)): ?><?php $i = 0;?><?php $__LIST__ = $chatarr?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="liaotian " id="<?php echo ($vo["id"]); ?>" aid="">
                        <div class="liaotian_right fl "> 
                            <span class="userbase"> <a href="javascript:void(0)" class="lt_time"><?php echo date("H:i:s",$vo['time']);?></a> 
                                    <img src="__THEME__/style/level/User<?php if($vo["gid"] == 0): ?><?php echo ($vo["user_group_id"]); ?><?php else: ?><?php echo ($vo["usergroupid"]); ?><?php endif; ?>.png">
                                    <a href="javascript:void(0)" uid="<?php echo ($vo["mid"]); ?>" uname="<?php echo ($vo["uname"]); ?>" onclick="User_Click(this)"><?php echo ($vo["uname"]); ?></a>
                                    <?php if($vo['tomid'] != 0): ?><a class="user_to">对</a><img src="__THEME__/style/level/User<?php echo ($vo["toadminid"]); ?>.png"/>
                                        <a href="javascript:void(0)" uid="<?php echo ($vo["tomid"]); ?>" uname="<?php echo ($vo["touname"]); ?>" adminid="<?php echo ($vo["toadminid"]); ?>" onclick="User_Click(this)"><?php echo ($vo["touname"]); ?></a>
                                        <?php if($user['user_group_id'] == 1): ?><a href="javascript:void(0)"; rel="<?php echo ($vo["id"]); ?>" onClick="liaotianDel(this)" class="lt_del">删除</a><?php endif; ?><?php endif; ?>
                            </span>                        
                            <div>
                                <?php echo ($vo["content"]); ?>
                            </div>
                        </div>
                    </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            </div>
            <!--/.liaotianlist end-->

            <div class="_tools">
                                    <a href="JavaScript:void(0)" title="私聊" onclick="$(&#39;#mykefu li:first&#39;).click();$(&#39;#mykefu li:first .talkto&#39;).click();"><img src="__THEME__/style/message.png"><span>私聊</span></a>
                    <!-- <a href="javascript:void(0)" class="rotate" onclick="$(&#39;#dowebok&#39;).show()" title="抽奖"><img src="__THEME__/style/choujiang.png"><span>抽奖</span></a> -->
                                      <!--  <a href="ajax.php?nid=" class="ajax" title="二维码" ><img src="images/erweima.png" /><span>充值</span></a>-->

                            </div>
            <div class="_tools bottom"> <a href="javascript:void(0)" class="bar_qingping" onclick="PubClear()">清屏</a> <a href="javascript:void(0)" class="bar_gundong" checked="true" id="gundong">滚动</a>
                <script type="text/javascript">
                    <?php echo ($gundong); ?>
                </script>
            </div>
        </div>
        <div class="main_middle1 ">

            <div class="zaixiankefu"> <span class="kefu fl"><img src="__THEME__/style/zaiiankefu.png" style="margin-left:7px;"></span>
                <ul>
                                                    <li style="border:1px solid #7ECBEB;height:23px;background-color:#A1DBF0; "><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank" style="margin-right: 5px;margin-top: 2px;display: block;"><img style="heigth:23px;vertical-align:middle;" src="__THEME__/style/QQ_1.png" title="请加QQ：qq"><i style="font-size:13px;">老师助理</i></a></li>
                                                            <li style="border:1px solid #7ECBEB;height:23px;background-color:#A1DBF0; "><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank" style="margin-right: 5px;margin-top: 2px;display: block;"><img style="heigth:23px;vertical-align:middle;" src="__THEME__/style/QQ_1.png" title="请加QQ：qq"><i style="font-size:13px;">老师助理</i></a></li>
                                                            <li style="border:1px solid #7ECBEB;height:23px;background-color:#A1DBF0; "><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank" style="margin-right: 5px;margin-top: 2px;display: block;"><img style="heigth:23px;vertical-align:middle;" src="__THEME__/style/QQ_1.png" title="请加QQ：qq"><i style="font-size:13px;">老师助理</i></a></li>
                                                            <li style="border:1px solid #7ECBEB;height:23px;background-color:#A1DBF0; "><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank" style="margin-right: 5px;margin-top: 2px;display: block;"><img style="heigth:23px;vertical-align:middle;" src="__THEME__/style/QQ_1.png" title="请加QQ：qq"><i style="font-size:13px;">课程建议</i></a></li>
                                                            <li style="border:1px solid #7ECBEB;height:23px;background-color:#A1DBF0; "><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank" style="margin-right: 5px;margin-top: 2px;display: block;"><img style="heigth:23px;vertical-align:middle;" src="__THEME__/style/QQ_1.png" title="请加QQ：qq"><i style="font-size:13px;">老师助理</i></a></li>
                                            </ul>
            </div>

            <div class="clear"></div>
            <div class="tool_bar ">
                <ul>
                    <li>
                        <select class="fsize">
                            <option>字号</option>
                            <option value="12">12</option>
                            <option value="14">14</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                            <option value="20">20</option>
                        </select>
                    </li>
                    <li><a href="javascript:void(0)" class="bar_biaoqing" onclick="ShowFaceList(&#39;Faces&#39;)">表情</a></li>
                    <li><a href="javascript:void(0)" class="bar_caitiao" onclick="ShowFaceList(&#39;caitiao&#39;)">彩条</a></li>
                    <li><a href="javascript:void(0)" onclick="alert(&#39;请使用CRTL+ALT+A进行截图，然后在发送框内进行粘贴发送&#39;)" class="bar_tupian">截图</a></li>
                    <li onmouseout="$(&#39;#flowers_list&#39;).hide()" onmouseover="$(&#39;#flowers_list&#39;).show()" style="position:relative"><a href="javascript:void(0)" class="bar_flower">送鲜花<span>
                        </span></a>
                        <ul id="flowers_list" class="FlowerBox">
                                                                <li> <a class="mm" href="javascript:void(0)" title="传奇" onclick="SendFlower(&#39;3023&#39;)">送给：
                                            传奇                                        </a><br>
                                    </li>
                                                                    <li> <a class="mm" href="javascript:void(0)" title="QQ用户原点" onclick="SendFlower(&#39;3498&#39;)">送给：
                                            QQ用户原点                                        </a><br>
                                    </li>
                                                                    <li> <a class="mm" href="javascript:void(0)" title="传奇" onclick="SendFlower(&#39;3522&#39;)">送给：
                                            传奇                                        </a><br>
                                    </li>
                                                                    <li> <a class="mm" href="javascript:void(0)" title="元风" onclick="SendFlower(&#39;4818&#39;)">送给：
                                            元风                                        </a><br>
                                    </li>
                                                                    <li> <a class="mm" href="javascript:void(0)" title="QQ用户泰山" onclick="SendFlower(&#39;4825&#39;)">送给：
                                            QQ用户泰山                                        </a><br>
                                    </li>
                                                        </ul>
                    </li>
                    <li>
                        <a href="/#redbag_choice" class=" showdiv bar_redbag">抢红包<span>￥</span></a>
                    </li>

                                    </ul>
                <input type="hidden" id="mythisroom" value="<?php echo ($user['roomid']); ?>">
                <!-- <input type="hidden" id="roomname" value="总房间"> -->
                <div class="xialatiao ">
                    <select id="send_talkto" onchange="Change_talkto()">
                        <option value="0" uname="">对所有人说</option>
                    </select>
                </div>
            </div>
            <div class="fasongquyu fl">
                <div class="button11 " style="float:right;margin-right:10px;"><a href="javascript:void(0)" id="addliaotian" onclick="addliaotian()"></a></div>
                <script type="text/javascript" language="JavaScript" charset="UTF-8">
                    document.onkeydown=function(event){
                        var e = event || window.event || arguments.callee.caller.arguments[0];
                        if(e && e.keyCode==13){ // enter 键
                            addliaotian();
                        }
                    };
                </script>
                <div style=" overflow:hidden;">
                    <div id="send_input"></div>
                    <script type="text/javascript" charset="utf-8" src="__THEME__/style/js/xeditor.js"></script>                    
                    <script type="text/javascript">
                        $('#send_input').setup();
                    </script>
                </div>
            </div>
            <!-------faces---------->
					<div id="Faces" class="FaceBox" style="display: none;">
							<table class="tab1">
								<tbody>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/0.gif&#39;) no-repeat scroll center center transparent" title="鼓掌">鼓掌</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/1.gif&#39;) no-repeat scroll center center transparent" title="跳">跳</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/2.gif&#39;) no-repeat scroll center center transparent" title="kiss">kiss</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/3.gif&#39;) no-repeat scroll center center transparent" title="来电">来电</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/4.gif&#39;) no-repeat scroll center center transparent" title="贱笑">贱笑</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/5.gif&#39;) no-repeat scroll center center transparent" title="陶醉">陶醉</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/6.gif&#39;) no-repeat scroll center center transparent" title="兴奋">兴奋</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/7.gif&#39;) no-repeat scroll center center transparent" title="鄙视">鄙视</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/8.gif&#39;) no-repeat scroll center center transparent" title="得意">得意</em></td>
									</tr>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/9.gif&#39;) no-repeat scroll center center transparent" title="偷笑">偷笑</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/10.gif&#39;) no-repeat scroll center center transparent" title="挖鼻孔">挖鼻孔</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/11.gif&#39;) no-repeat scroll center center transparent" title="衰">衰</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/12.gif&#39;) no-repeat scroll center center transparent" title="流汗">流汗</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/13.gif&#39;) no-repeat scroll center center transparent" title="伤心">伤心</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/14.gif&#39;) no-repeat scroll center center transparent" title="鬼脸">鬼脸</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/15.gif&#39;) no-repeat scroll center center transparent" title="狂笑">狂笑</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/16.gif&#39;) no-repeat scroll center center transparent" title="发呆">发呆</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/17.gif&#39;) no-repeat scroll center center transparent" title="害羞">害羞</em></td>
									</tr>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/18.gif&#39;) no-repeat scroll center center transparent" title="可怜">可怜</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/19.gif&#39;) no-repeat scroll center center transparent" title="气愤">气愤</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/20.gif&#39;) no-repeat scroll center center transparent" title="惊吓">惊吓</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/21.gif&#39;) no-repeat scroll center center transparent" title="困了">困了</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/22.gif&#39;) no-repeat scroll center center transparent" title="再见">再见</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/23.gif&#39;) no-repeat scroll center center transparent" title="感动">感动</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/24.gif&#39;) no-repeat scroll center center transparent" title="晕">晕</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/25.gif&#39;) no-repeat scroll center center transparent" title="可爱">可爱</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/26.gif&#39;) no-repeat scroll center center transparent" title="潜水">潜水</em></td>
									</tr>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/27.gif&#39;) no-repeat scroll center center transparent" title="强">强</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/28.gif&#39;) no-repeat scroll center center transparent" title="囧">囧</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/29.gif&#39;) no-repeat scroll center center transparent" title="窃笑">窃笑</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/30.gif&#39;) no-repeat scroll center center transparent" title="疑问">疑问</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/31.gif&#39;) no-repeat scroll center center transparent" title="装逼">装逼</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/32.gif&#39;) no-repeat scroll center center transparent" title="抱歉">抱歉</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/33.gif&#39;) no-repeat scroll center center transparent" title="鼻血">鼻血</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/34.gif&#39;) no-repeat scroll center center transparent" title="睡觉">睡觉</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/35.gif&#39;) no-repeat scroll center center transparent" title="委屈">委屈</em></td>
									</tr>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/36.gif&#39;) no-repeat scroll center center transparent" title="笑哈哈">笑哈哈</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/37.gif&#39;) no-repeat scroll center center transparent" title="贱贱地笑">贱贱地笑</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/38.gif&#39;) no-repeat scroll center center transparent" title="被电">被电</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/39.gif&#39;) no-repeat scroll center center transparent" title="转发">转发</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/40.gif&#39;) no-repeat scroll center center transparent" title="求关注">求关注</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/41.gif&#39;) no-repeat scroll center center transparent" title="路过这儿">路过这儿</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/42.gif&#39;) no-repeat scroll center center transparent" title="好激动">好激动</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/43.gif&#39;) no-repeat scroll center center transparent" title="招财">招财</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/44.gif&#39;) no-repeat scroll center center transparent" title="加油啦">加油啦</em></td>
									</tr>
									<tr>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/45.gif&#39;) no-repeat scroll center center transparent" title="转转">转转</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/46.gif&#39;) no-repeat scroll center center transparent" title="围观">围观</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/47.gif&#39;) no-repeat scroll center center transparent" title="推撞">推撞</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/48.gif&#39;) no-repeat scroll center center transparent" title="来嘛">来嘛</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/49.gif&#39;) no-repeat scroll center center transparent" title="啦啦啦">啦啦啦</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/50.gif&#39;) no-repeat scroll center center transparent" title="切克闹">切克闹</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/51.gif&#39;) no-repeat scroll center center transparent" title="给力">给力</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/52.gif&#39;) no-repeat scroll center center transparent" title="威武">威武</em></td>
										<td><em isface="1" style="background:url(&#39;__THEME__/style/face/53.gif&#39;) no-repeat scroll center center transparent" title="流血">流血</em></td>
									</tr>
								</tbody>
							</table>
						</div>				
						
	<!-------faces---------->
	<div id="caitiao" class="hid ption_a" style="display: none;">				
	
	    <ul id="c_pt" class="clearfix " isface="2" pack="3" style=" position:absolute;margin: 16px;">
			<li isface="1" title="顶一个">顶一个</li>
			<li isface="1" title="赞一个">赞一个</li>
			<li isface="1" title="掌声">掌声</li>
			<li isface="1" title="鲜花">鲜花</li>		
		</ul>
		<div class="clearfix"></div>
	</div>
	  </div>
        <div id="ManageMenu">
            <div class="NormalMenu">
                                            </div>
        </div>
</div>
    <div class="main_right">
        <div class="shipin">
            <ul>
                                    <li><a href="javascript:void(0)">视频直播</a></li>
                                <li><a href="javascript:void(0)" onclick="loadVideo()">刷新</a></li>
                <!-- <li><a href="http://www.zhibo.net/teacher_list.php" class="iframe teacher" style="color:#ff0;font-weight:bold;" id="ms">《给老师点赞》</a></li> -->
                <li><a href="javascript:void(0)" style="color:#fff;font-size:18px;font-weight:600;"><img src="__THEME__/style/phone.png">
                                            </a></li>
                <li><a href="javascript:void(0)" class="lubo" onclick="$(&#39;.videolist&#39;).slideDown(&#39;fast&#39;);"></a></li>
            </ul>
        </div>
        <div class="videolist">
            <h1>回播<a href="javascript:void(0)" onclick="$(&#39;.videolist&#39;).slideUp(&#39;fast&#39;);">X</a></h1>
            <ul>
                            </ul>
        </div>
        <div class="shipinchuangkou" id="CuPlayer"></div>
        <div class="FlowerNumBox" title="主播收到的鲜花">
            <div class="FlowerNum">
                <p> <em> </em> <span>
                    </span> </p>
            </div>
            <span class="addnum">+1</span> </div>
                <script type="text/javascript">
                var sid='26316703';
                var yid='794738882';
                var w=window.innerWidth? window.innerWidth:document.body.clientWidth;
                if(w<880){
                    var video_html = '<iframe height="100%" width="100%" allowtransparency="true" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" src="http://www.baowangkj.com/yyzhibo/yy.php?id='+sid+'"></iframe>';
                }else{
                    //var video_html = '<embed id="yyEmbed" src="http://webyylbs.yy.duowan.com/s/'+sid+'/'+yid+'/yyscene.swf" quality="high" height="100%"  width="100%"align="middle" allowscriptaccess="always" allowfullscreen="true" mode="transparent" wmode="transparent" type="application/x-shockwave-flash">';
                    var video_html = '<embed height="100%" align="middle" width="100%" autostart="true" type="application/x-shockwave-flash" wmode="transparent" allowfullscreen="true" allowscriptaccess="always" quality="high" src="http://c2.web.yystatic.com/r/rc/main/main/1/60/main.swf?type=yyscene&amp;topSid='+sid+'&amp;subSid=&amp;newtuna=1&amp;referer=" id="videolive">';
                }

                if(COOKIE && ADMINID == 14 && VIEWSTATUS) {
                    var video_html = '<p style="margin-top:350px;">对不起，您的观看时间已到，请联系客服后继续观看</p>';
                }
            </script>
            <script type="text/javascript">

            function loadVideo(){
                $('.shipinchuangkou').html(video_html);  
            }
            loadVideo();
        </script>
     <script src="__THEME__/style/js/sl.js" type="text/javascript"></script>
    <link rel="stylesheet" href="__THEME__/style/css/sl.css">
</div>
<!--/.main-->
<div class="clear"></div>
<div class="wrap" style="display:none">
<!--弹出窗口-->
<div class="tanchuchuang">
	<div class="close"><a href="http://www.zhibo.net/#"><img src="__THEME__/style/guanbi.jpg"></a></div>
	<div class="wenzi">投票功能暂只对会员开放，请先注册会员或登入会员账号，为喜欢的老师投上一票</div>
	<div class="anniu">
    	<div class="zhuceanniu fl"><a href="http://www.zhibo.net/#"><img src="__THEME__/style/zhuce.png"></a></div>
        <div class="dengluanniu fl"><a href="http://www.zhibo.net/#"><img src="__THEME__/style/denglu.png"></a></div>
    </div>
</div>

<!--登陆弹出框-->

<div id="login_form">
	<div class="content">
     	 <div class="ErrBox"></div>
    	<div class="touxiang fl"><img src="__THEME__/style/touxiang.jpg"></div><span class="zhanghao fl"><input type="text" name="account" placeholder="请输入账号" value="请输入账号" onclick="this.value=&#39;&#39;"></span>
        <div class="touxiang fl" style="margin-top:20px;"><img src="__THEME__/style/mima.jpg"></div>
        
        <span class="zhanghao fl" style="margin-top:20px;"><input type="text" placeholder="请输入密 码" name="password" value="请输入确认密码" onclick="this.type=&#39;password&#39;;this.value=&#39;&#39;"></span>
      
    
        <div class="yanzheng_fl fl"><input type="text" placeholder="请输入验证码" name="validate" value="请输入验证码" onclick="this.value=&#39;&#39;"></div>
        <div class="yanzheng_fr fr"><img src="__THEME__/style/pic.php" onclick="this.src=&#39;sys/pic.php&#39;+&#39;?time=&#39;+Date.parse(new Date())" style="height:90%;margin:5%"></div>
      
        <div class="clear"></div>
        <input type="checkbox" class="xuan fl"><div class="zidongdenglu fl">自动登录</div>
        <div class="form_submit"><img src="__THEME__/style/lijidenglu.png"></div>
        <div class="l_r"><a href="JavaScript:void(0)" style="float:right" onclick="$(&#39;#register&#39;).click()">立即注册</a></div>
    </div>
</div>


<!--注册弹出框-->
<!--[if lte IE 8]>
<div id="register_form" >
	<div class="content">
     	<div class="ErrBox"></div>
    	<div class="touxiang fl"><img src="images/touxiang.jpg" /></div>
        <span class="zhanghao fl"><input type="text" placeholder="账 号:6-15位字母或数字组合11" name="account" value="账 号:6-15位字母或数字组合11" onclick="this.value=''"/></span>
        <div class="touxiang fl" style="margin-top:20px;"><img src="images/mima.jpg" /></div>
        <span class="zhanghao fl" style="margin-top:20px;"><input type="text" placeholder="密 码：6-15位" name="password"  value="密 码：6-15位" onclick="this.type='password';this.value=''"/></span>
        <div class="mima fl"><input type="text" placeholder="请输入确认密码" name="rpassword"  value="请输入确认密码" onclick="this.type='password';this.value=''"/></div>
    	
		<div class="shouji">
		<input type="text" placeholder="请输入真实姓名" name="nickname"  value="请输入真实姓名" onclick="this.value=''"/>
		</div>
		
	    <div class="shouji">
		<Select name="tmid" >
			<option value='0'>请选择意向分析师</option>
				</select>
		</div>
		
        <div class="shouji">
		<input type="text" placeholder="请输入手机号" name="telephone" value="请输入手机号" onclick="this.value=''"/>
		</div>
		<div class="shouji">
		<input type="text" placeholder="请输入QQ号" name="qq" value="请输入QQ号" onclick="this.value=''"/>
		</div>
	
		  
        <div class="yanzheng_fl fl"><input type="text" placeholder="请输入验证码" name="validate" value="请输入验证码" onclick="this.value=''"/></div>
     <div class=" yanzheng_fr fr"><input type="button" id="sendmsg_btn" value="发送手机验证码" onclick="sendmsg()"/></div>
        
       
        <div class="form_submit"><img src="images/lijizhuce.png" /></div>
		<div class="l_r"><a href="JavaScript:void(0)" style="float:right" onclick="$('#login').click()">立即登录</a></div>
    </div>

</div>
<![endif]-->

<!--[if !IE || rte IE 9]><!--> 
<div id="register_form">
	<div class="content">
     	<div class="ErrBox"></div>
    	<div class="touxiang fl"><img src="__THEME__/style/touxiang.jpg"></div>
        <span class="zhanghao fl"><input type="text" placeholder="账 号:6-15位字母或数字组合" name="account"></span>
        <div class="touxiang fl" style="margin-top:20px;"><img src="__THEME__/style/mima.jpg"></div>
        <span class="zhanghao fl" style="margin-top:20px;"><input type="password" placeholder="密 码：6-15位" name="password"></span>
        <div class="mima fl"><input type="password" placeholder="请输入确认密码" name="rpassword"></div>
    	
		<div class="shouji">
		<input type="text" placeholder="请输入手机号" name="telephone">
		</div>
		<div class="shouji">
		<input type="text" placeholder="请输入QQ号" name="qq">
		</div>
        <div class="shouji">
		<input type="text" placeholder="请输入真实姓名" name="nickname">
		</div>
		  
        <div class="yanzheng_fl fl"><input type="text" placeholder="请输入验证码" name="validate"></div>
     <div class=" yanzheng_fr fr"><input type="button" id="sendmsg_btn" value="发送手机验证码" onclick="sendmsg()"></div>
        
       
        <div class="form_submit"><img src="__THEME__/style/lijizhuce.png"></div>
		<div class="l_r"><a href="JavaScript:void(0)" style="float:right" onclick="$(&#39;#login&#39;).click()">立即登录</a></div>
    </div>

</div>
 <!--<![endif]-->


<!--专家团队-->
<div id="zhuanjia">
<div class="laoshizong">
      </div>
</div>


<!--课程表-->
<div id="kechengbiao">

	<div class="kecheng">
    	<div class="biaoti"><img src="__THEME__/style/kecheng.png"></div>
        <div class="biaoge">
        	<span><img src="__THEME__/style/829.png"></span>
            <span class="kecheng1">
            <table style="width:790px;text-align:center;margin-left:20px;border:0px solid black;border-spacing:0px;height:35px;line-height:35px;">
            	
                <tbody><tr style="font-size:18px;color:#fff;background:#23abff;  ">
                	<td>直播时间</td>
                    <td>星期一</td>
                    <td>星期二</td>
                    <td>星期三</td>
                    <td>星期四</td>
                    <td>星期五</td>
                </tr>
               
               
 
                <tr style="font-size:18px;color:#fff; color:#4884b3; " class="ke">
                	<td>9：30~11:30</td>
                    <td>传奇</td>
                 <td>传奇</td>
<td>传奇</td>
<td>传奇</td>
<td>传奇</td>
                </tr>
          
                <tr style="font-size:18px;color:#fff; color:#4884b3; " class="ke">
                	<td>13:00~15:00</td>
                    <td>原点</td>
                 <td>原点</td>
<td>原点</td>
<td>原点</td>
<td>原点</td>
                </tr>
          
                <tr style="font-size:18px;color:#fff; color:#4884b3; " class="ke">
                	<td>19：30~21:30</td>
                    <td>传奇</td>
                 <td>传奇</td>
<td>传奇</td>
<td>传奇</td>
<td>子龙</td>
                </tr>
                
             
            </tbody></table>
            </span>
        </div>
    </div>
</div>


<!--提示-->
<a href="#tishi" id="ts"></a>
<div id="tishi">
<h2>提示信息</h2>
<div class="tishi_content">
<p>游客发言时间间隔为10秒，还有<t>--</t>秒！</p>
<p>请联系QQ客服，免费领取马甲和老师解答，发言不受限制！</p>
 <ul>
                 	<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank"><img src="__THEME__/style/QQ.jpg" title="请加QQ：qq"></a></li>
          
               	<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank"><img src="__THEME__/style/QQ.jpg" title="请加QQ：qq"></a></li>
          
               	<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank"><img src="__THEME__/style/QQ.jpg" title="请加QQ：qq"></a></li>
          
               	<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank"><img src="__THEME__/style/QQ.jpg" title="请加QQ：qq"></a></li>
          
               	<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=qq&amp;site=qq&amp;menu=yes" target="_blank"><img src="__THEME__/style/QQ.jpg" title="请加QQ：qq"></a></li>
          
               </ul>
</div>

</div>
<!--skinbox-->
<div id="skinbox" style="width:622px">
	<style>#skinbox img {width:100px;height:55px}</style>
	<a href="javascript:void(0)" rel="__THEME__/style/bj.jpg" onclick="changeSkin(this)"><img src="__THEME__/style/bj.jpg"></a>
		<?php echo ($skin); ?>
	</div>

<div id="tcontent" style="width:180px;height:200px">

<h3 style="text-align:center;padding-bottom:10px">联系我们</h3>

<li class="qqli"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes"><img src="__THEME__/style/QQ.jpg" alt="" class="qqimg"></a></li>
<li class="qqli"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes"><img src="__THEME__/style/QQ.jpg" alt="" class="qqimg"></a></li>
<li class="qqli"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes"><img src="__THEME__/style/QQ.jpg" alt="" class="qqimg"></a></li>
<li class="qqli"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes"><img src="__THEME__/style/QQ.jpg" alt="" class="qqimg"></a></li>
<li class="qqli"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes"><img src="__THEME__/style/QQ.jpg" alt="" class="qqimg"></a></li>
 <li>电话：</li>
</div>

<div id="redbag_choice">
<h1>发送红包</h1>
<ul>
   <li><span>红包个数：</span><input id="rendbag_num" placeholder="输入个数"></li>
   <li><span>总 金 额：</span><input id="rendbag_total" placeholder="输入金额"></li>
   <li><a href="javascript:void(0)" class="send_redbag" onclick="sendRedbag()">立即塞钱</a></li>
</ul>
</div>
<a href="/#redbag_pay" class="showdiv" id="redbag_pay_btn"></a>
<div id="redbag_pay">
<h1>支付宝充值</h1>
<form method="post" id="ali_form" action="http://www.zhibo.net/alipay2/alipayapi.php?mid=6133">
   <input type="hidden" name="WIDshow_url" value="http://www.zhibo.net/index.php?fid=1001">
<p>请输入充值金额</p>
<ul>
   <li><input name="WIDtotal_fee" id="WIDtotal_fee" value="1" placeholder="请输入充值金额"></li>
   <li><a href="javascript:void(0)" onclick="ali_form.submit()">立即支付</a></li>
</ul>
</form>
</div>
<a href="/#redbag_info" class="showdiv" id="redbag_info_btn"></a>
<div id="redbag_info">
<div class="redbag_sender">
  <div class="_avatar"><img src="__THEME__/style/level/User2.png"></div>
  <div class="_info">
		<span class="_info_total"></span>
	    <span class="_info_from"></span>
  </div>
</div>
<h1>已领取3/3个，已领完</h1>
<table>
 
  
</table>
<div class="redbag_get_bottom">收到的红包已存入<a href="http://www.zhibo.net/admin_user" target="_blank" style="color:red">余额</a></div>
</div>

<!--新课程表-->
<div id="kechengopenbox" class="kechengopenbox" style="left: 50%; margin-left: -310px; z-index: 1002; position: fixed; top: 50%; margin-top: -155px; display: block;">
	<div class="close" onclick="$.fancybox.close();"></div>
    <div class="kechengbox">
        <div class="kechengtitle hd">
            <ul class="clearFix">
                <li class="">星期一<span>Monday</span></li>
                <li class="">星期二<span>Tuesday</span></li>
                <li class="">星期三<span>Wednesday</span></li>
                <li class="on">星期四<span>Thursday</span></li>
                <li class="">星期五<span>Friday</span></li>
            </ul>
        </div>
        <div class="kechengboxcon bd">
		               
		
		  
          <div class="kechengboxlist" style="display: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
					<tr>
							
                    <td><span class="time" start="" end="1489462200">9：30-11:30</span><span class="videoname">传奇</span></td>
							
                    <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
		                </tr>
		<tr>
							
                  <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
							
                  <td><span class="time" start="" end="1489498200">19：30-21:30</span><span class="videoname">传奇</span></td>
		                </tr>
            </tbody>
			</table>
          </div>
 		
		  
          <div class="kechengboxlist" style="display: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
					<tr>
							
                    <td><span class="time" start="" end="1489462200">9：30-11:30</span><span class="videoname">传奇</span></td>
							
                    <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
		                </tr>
		<tr>
							
                  <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
							
                  <td><span class="time" start="" end="1489498200">19：30-21:30</span><span class="videoname">传奇</span></td>
		                </tr>
            </tbody>
			</table>
          </div>
 		
		  
          <div class="kechengboxlist" style="display: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
					<tr>
							
                    <td><span class="time" start="" end="1489462200">9：30-11:30</span><span class="videoname">传奇</span></td>
							
                    <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
		                </tr>
		<tr>
							
                  <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
							
                  <td><span class="time" start="" end="1489498200">19：30-21:30</span><span class="videoname">传奇</span></td>
		                </tr>
            </tbody>
			</table>
          </div>
 		
		  
          <div class="kechengboxlist" style="display: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
					<tr>
							
                    <td><span class="time" start="" end="1489462200">9：30-11:30</span><span class="videoname">传奇</span></td>
							
                    <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
		                </tr>
		<tr>
							
                  <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
							
                  <td><span class="time" start="" end="1489498200">19：30-21:30</span><span class="videoname">传奇</span></td>
		                </tr>
            </tbody>
			</table>
          </div>
 		
		  
          <div class="kechengboxlist" style="display: none;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
					<tr>
							
                    <td><span class="time" start="" end="1489462200">9：30-11:30</span><span class="videoname">传奇</span></td>
							
                    <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
		                </tr>
		<tr>
							
                  <td><span class="time" start="1489467600" end="1489474800">13:00-15:00</span><span class="videoname">原点</span></td>
							
                  <td><span class="time" start="" end="1489498200">19：30-21:30</span><span class="videoname">子龙</span></td>
		                </tr>
            </tbody>
			</table>
          </div>
         </div>
    </div>
</div>

</div><!--/.wrap-->

<link href="__THEME__/style/css/siliao.css" type="text/css" rel="stylesheet">
<link href="__THEME__/style/css/ligerui-tab.css" type="text/css" rel="stylesheet">
<link href="__THEME__/style/css/ligerui-common.css" type="text/css" rel="stylesheet">
<link href="__THEME__/style/css/ligerui-all.css" rel="stylesheet">


<div class="whisper" id="whisperContainer" style="top: 69px; left: 399px; display: none;">

            <div class="close-wrap" onclick="$(this).parent().hide()"></div>
            <div class="whisper-content-wrap">
                <div class="whisper-tabs l-tab" id="whisper-tabs" ligeruiid="whisper-tabs">
                    <div class="l-tab-links" style="cursor: move;">
                        <ul style="left: 0px;max-height: 31px;overflow-y: auto;">
                        </ul>
                    </div>
                    <div class="l-tab-content">
                        <div class="l-tab-content-item" tabid="tab_private_366">
                        
                            <div id="private_366" class="ui-widget-content draggable" rel="0">
                             
                                <div id="divMessage" class="message-area Y_iMessage ">
                               
                                <div id="Y_PriMes_Div" style="height:100%;overflow-y: auto;">
                                  <p class="loading">信息加载中....</p>
                                  
                            
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>
                <div class="whisper-action" id="whisper-action">
                    <div class="whisper-chat-tabs block-title">
                    
                        <ul>
                            <li class="active" title="聊天"><i class="icon-chat"></i><span style="line-height:27px">聊天</span></li>
                        </ul>
                    </div>
                    <div class="whisper-message-wrap">
                        <div class="message-content-container">
                            <div id="Y_iSend_Input2" contenteditable="true" class="whisper-message"></div>
                            <div class="message-button-wrap">
                                <button id="btnSendMessage" class="button-blue1" type="button" onclick="addliaotian()">发送</button>
                            </div>
                        </div>
                        <div id="hid-messaage-container" style="display: none"><div id="tabContent-tab_private_366"></div></div>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">

            var _move = false; //移动标记
            var _x, _y; //鼠标离控件左上角的相对位置
            $(".l-tab-links").mousedown(function(e) {
			
                 _move = true;
                 _x = e.pageX - parseInt($(".whisper").css("left"));
                 _y = e.pageY - parseInt($(".whisper").css("top"));
             
            });
             $(".l-tab-links").mousemove(function(e) {
				
                 if (_move) {
					 
                     var x = e.pageX - _x; //移动时根据鼠标位置计算控件左上角的绝对位置
                    var y = e.pageY - _y;
					
                     $(".whisper").css({ top: y, left: x }); //控件新位置
				
                }
             }).mouseup(function() {
                 _move = false;
            
            });
     
</script>
     <script>
            RightContent_Height();

        </script>
    </div>
    <script>
        Middle_Height();
    </script>
<div style="display:none">
    <!-- JiaThis Button BEGIN -->
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
<!-- JiaThis Button END --></div>

</body></html>
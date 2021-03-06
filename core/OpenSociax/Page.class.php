<?php
/**
 * 分页显示类
 * @category   ORG
 * @package  ORG
 * @subpackage  Util
 * @author    liu21st <liu21st@gmail.com>
 * @version   $Id$
 */
class Page
{//类定义开始

    /**
     * 分页起始行数
     * @var integer
     * @access protected
     */
    public $firstRow ;

    /**
     * 列表每页显示行数
     * @var integer
     * @access protected
     */
    public $listRows ;

    /**
     * 页数跳转时要带的参数
     * @var integer
     * @access protected
     */
    public $parameter  ;

    /**
     * 分页总页面数
     * @var integer
     * @access protected
     */
    public $totalPages  ;

    /**
     * 总行数
     * @var integer
     * @access protected
     */
    public $totalRows  ;

    /**
     * 当前页数
     * @var integer
     * @access protected
     */
    public $nowPage    ;

    /**
     * 分页的栏的总页数
     * @var integer
     * @access protected
     */
    public $coolPages   ;

    /**
     * 分页栏每页显示的页数
     * @var integer
     * @access protected
     */
    public $rollPage   ;

    /**
     * 分页记录名称
     * @var integer
     * @access protected
     */

    // 分页显示定制
    public $config   =   array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页');

    /**
     * 架构函数
     * @access public
     * @param array $totalRows  总的记录数
     * @param array $firstRow  起始记录位置
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows,$listRows='',$parameter='')
    {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        $this->rollPage = 5;
        $this->listRows = !empty($listRows)?$listRows:20;
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);

        if( (!empty($this->totalPages) && $_REQUEST[C('VAR_PAGE')]>$this->totalPages) || $_REQUEST[C('VAR_PAGE')]==='last' ) {
            $this->nowPage = $this->totalPages;
            $_REQUEST[C('VAR_PAGE')] = $this->totalPages;
        }else{
        	$this->nowPage  = intval($_REQUEST[C('VAR_PAGE')])>0?intval($_REQUEST[C('VAR_PAGE')]):1;
        }

        $this->firstRow = $this->listRows*($this->nowPage-1);

    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     * 分页显示
     * 用于在页面显示的分页栏的输出
     * @access public
     * @return string
     */
    public function show($isArray=false){

		if(APP_NAME == 'wap' || APP_NAME == 'WAP'){
			 return $this->wapShow($isArray);
		}

        if(0 == $this->totalRows) return;

		$url = $_SERVER['QUERY_STRING'];
        $url = preg_replace("/<script(.*?)<\/script>/is","",$url);
        $url = preg_replace("/<frame(.*?)>/is","",$url);
        $url = preg_replace("/<\/fram(.*?)>/is","",$url);
        $url = str_replace('&amp;','&',$url);
        $url = str_replace('&nbsp;',' ',$url);
        $url = str_replace("'","&#39;",$url);
        $url = str_replace('"',"&quot;",$url);
        $url = str_replace("<","&lt;",$url);
        $url = str_replace(">","&gt;",$url);
        $url = str_replace("\t","&nbsp; &nbsp; ",$url);
        $url = str_replace("\r","",$url);
        $url = str_replace("   ","&nbsp; &nbsp;",$url);
        $url = eregi_replace("(#.+$|".C('VAR_PAGE')."=[0-9]+)",'',t($_SERVER['PHP_SELF']).'?'.$url);
		$url = $url.(strpos($url,'?')?'':"?");
		$url = eregi_replace("(&+)",'&',$url);
        $url = trim($url,'&');

        //上下翻页字符串
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<a p='".$upRow."' href='".$url."&".C('VAR_PAGE')."=$upRow' class='pre'>".$this->config['prev']."</a>";
        }else{
            $upPage="";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<a p='".$downRow."' href='".$url."&".C('VAR_PAGE')."=$downRow' class='next'>".$this->config['next']."</a>";
        }else{
            $downPage="";
        }

        // 1 2 [3] 4 5
		$linkPage = "";
		//dump(ceil($this->rollPage/2)-1);
		$halfRoll	=	ceil($this->rollPage/2);

		if( $this->totalPages <= $this->rollPage ){
			$leftPages	=	$this->nowPage-1;
			$rightPages	=	$this->totalPages-$leftPages-1;
		}elseif( ($this->nowPage < $halfRoll) && ($this->totalPages > $this->rollPage) ){
			$leftPages	=	$this->nowPage-1;
			$rightPages	=	$this->rollPage-$leftPages-1;
		}elseif( ($this->totalPages-$this->nowPage) < $halfRoll ){
			$rightPages	=	$this->totalPages-$this->nowPage;
			$leftPages	=	$this->rollPage-$rightPages-1;
		}else{
			$rightPages	=	$this->rollPage-$halfRoll;
			$leftPages	=	$this->rollPage-$rightPages-1;
		}

		if($leftPages>0){
			for($i=$this->nowPage-$leftPages;$i<$this->nowPage;$i++){
				$linkPage .= "<a p='".$i."' href='".$url."&".C('VAR_PAGE')."=$i'>".$i."</a>";
			}
		}
		$linkPage .= " <a class='current'>".$this->nowPage."</a>";
		if($rightPages>0){
			for($i=$this->nowPage+1;$i<=$this->nowPage+$rightPages;$i++){
				$linkPage .= "<a p='".$i."' href='".$url."&".C('VAR_PAGE')."=$i'>".$i."</a>";
			}
		}
        // << < > >>
        if( $this->nowPage <= $halfRoll || $this->totalPages <= $this->rollPage ){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            $prePage = "<a p='".$preRow."' href='".$url."&".C('VAR_PAGE')."=$preRow' >上".$this->rollPage."页</a>";
            $theFirst = "<a p='1' href='".$url."&".C('VAR_PAGE')."=1' >1..</a>";
        }

		if( ($this->totalPages-$this->nowPage) < $halfRoll || $this->totalPages <= $this->rollPage ){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            $theEndRow = $this->totalPages;
            $nextPage = "<a p='".$nextRow."' href='".$url."&".C('VAR_PAGE')."=$nextRow' >下".$this->rollPage."页</a>";
            $theEnd = "<a p='".$theEndRow."' href='".$url."&".C('VAR_PAGE')."=$theEndRow' >..{$theEndRow}</a>";
        }

		if( ( $this->totalPages+1 - $halfRoll ) == $this->nowPage || $this->totalPages == $this->nowPage ){
			$theEnd = "";
		}

        //$pageStr = $upPage.$downPage.$theFirst.$prePage.$linkPage.$nextPage.$theEnd;
		if( $this->totalPages > 1 )
			$pageStr = $upPage.$theFirst.$linkPage.$theEnd.$downPage;
		if($isArray) {
			$pageArray['totalRows'] =   $this->totalRows;
			$pageArray['upPage']    =   $url.'&'.C('VAR_PAGE')."=$upRow";
			$pageArray['downPage']  =   $url.'&'.C('VAR_PAGE')."=$downRow";
			$pageArray['totalPages']=   $this->totalPages;
			$pageArray['firstPage'] =   $url.'&'.C('VAR_PAGE')."=1";
			$pageArray['endPage']   =   $url.'&'.C('VAR_PAGE')."=$theEndRow";
			$pageArray['nextPages'] =   $url.'&'.C('VAR_PAGE')."=$nextRow";
			$pageArray['prePages']  =   $url.'&'.C('VAR_PAGE')."=$preRow";
			$pageArray['linkPages'] =   $linkPage;
			$pageArray['nowPage'] =   $this->nowPage;
			return $pageArray;
		}
		return $pageStr;
	}

    /**
     * 手机端分页显示
     * 用于在页面显示的分页栏的输出
     * @access public
     * @return string
     */
	public function wapShow($isArray=false){

        if(0 == $this->totalRows) return;

		$url	=	eregi_replace("(#.+$|p=[0-9]+)",'',$_SERVER['REQUEST_URI']);
		$url	=	$url.(strpos($url,'?')?'':"?");
		$url	=	eregi_replace("(&+)",'&',$url);
        $url    =   trim($url,'&');

        //上下翻页字符串
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<a href='".$url."&".C('VAR_PAGE')."=$upRow' class='pre'>".$this->config['prev']."</a>";
        }else{
            $upPage="";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<a href='".$url."&".C('VAR_PAGE')."=$downRow' class='next'>".$this->config['next']."</a>";
        }else{
            $downPage="";
        }

		$linkPage = "";
		$halfRoll	=	ceil($this->rollPage/2);

		if( $this->totalPages <= $this->rollPage ){
			$leftPages	=	$this->nowPage-1;
			$rightPages	=	$this->totalPages-$leftPages-1;
		}elseif( ($this->nowPage < $halfRoll) && ($this->totalPages > $this->rollPage) ){
			$leftPages	=	$this->nowPage-1;
			$rightPages	=	$this->rollPage-$leftPages-1;
		}elseif( ($this->totalPages-$this->nowPage) < $halfRoll ){
			$rightPages	=	$this->totalPages-$this->nowPage;
			$leftPages	=	$this->rollPage-$rightPages-1;
		}else{
			$rightPages	=	$this->rollPage-$halfRoll;
			$leftPages	=	$this->rollPage-$rightPages-1;
		}

		if($leftPages>0){
			for($i=$this->nowPage-$leftPages;$i<$this->nowPage;$i++){
				$linkPage .= "<a href='".$url."&".C('VAR_PAGE')."=$i'>".$i."</a>";
			}
		}
		$linkPage .= " <a class='current'>".$this->nowPage."</a>";
		if($rightPages>0){
			for($i=$this->nowPage+1;$i<=$this->nowPage+$rightPages;$i++){
				$linkPage .= "<a href='".$url."&".C('VAR_PAGE')."=$i'>".$i."</a>";
			}
		}
        // << < > >>
        if( $this->nowPage <= $halfRoll || $this->totalPages <= $this->rollPage ){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            $prePage = "<a href='".$url."&".C('VAR_PAGE')."=$preRow' class='pre'>上".$this->rollPage."页</a>";
            $theFirst = "<a href='".$url."&".C('VAR_PAGE')."=1' >1..</a>";
        }

		if( ($this->totalPages-$this->nowPage) < $halfRoll || $this->totalPages <= $this->rollPage ){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            $theEndRow = $this->totalPages;
            $nextPage = "<a href='".$url."&".C('VAR_PAGE')."=$nextRow' class='next'>下".$this->rollPage."页</a>";
            $theEnd = "<a href='".$url."&".C('VAR_PAGE')."=$theEndRow' >..{$theEndRow}</a>";
        }

		if( ( $this->totalPages+1 - $halfRoll ) == $this->nowPage || $this->totalPages == $this->nowPage ){
			$theEnd = "";
		}

		//dump($_SERVER);
		if( $this->totalPages > 1 ){
			//$pageStr = '<div class="L">'.$upPage.'&nbsp;'.$downPage.'&nbsp;'.$this->nowPage.'/'.$this->totalPages.'页</div>';

			$nowUrl  =	SITE_URL.'/index.php?'.$_SERVER['QUERY_STRING'];
			$nowUrl	 =	preg_replace("/&p=[0-9]*/",'',$nowUrl);

			$pageStr = '<form method="post" action="'.$nowUrl.'"><span>'.$upPage.'&nbsp;'.$downPage.'&nbsp;'.$this->nowPage.'/'.$this->totalPages.'页</span>';
			$pageStr .= '<input type="text" style="margin-left:8px;width:40px"  name="p" id="p" value="'.$this->nowPage.'">';
			$pageStr .= '<input type="submit" value="转至"/>
				</form>';
		}

		if($isArray) {
			$pageArray['totalRows'] =   $this->totalRows;
			$pageArray['upPage']    =   $url.'&'.C('VAR_PAGE')."=$upRow";
			$pageArray['downPage']  =   $url.'&'.C('VAR_PAGE')."=$downRow";
			$pageArray['totalPages']=   $this->totalPages;
			$pageArray['firstPage'] =   $url.'&'.C('VAR_PAGE')."=1";
			$pageArray['endPage']   =   $url.'&'.C('VAR_PAGE')."=$theEndRow";
			$pageArray['nextPages'] =   $url.'&'.C('VAR_PAGE')."=$nextRow";
			$pageArray['prePages']  =   $url.'&'.C('VAR_PAGE')."=$preRow";
			$pageArray['linkPages'] =   $linkPage;
			$pageArray['nowPage'] =   $this->nowPage;
			return $pageArray;
		}
		return $pageStr;
	}
}//类定义结束
?>
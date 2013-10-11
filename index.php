<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	$edituname = $_SESSION["editusername"]?$_SESSION["editusername"]:0;
	$edituid = $_SESSION["edituserid"]?$_SESSION["edituserid"]:0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试一下</title>
<script language="javascript" type="text/javascript">
	var edituid = <?php /*if(!empty($edituid)){echo $edituid; }else{ echo ''; }*/echo $edituid; ?>;
</script>
<script language="Javascript" type="text/javascript" src="./edit_area/edit_area_full.js"></script>
<script language="javascript" type="text/javascript" src="./public/js/jquery-1.7.2.min.js"></script>
<script language="Javascript" type="text/javascript" src="./public/js/page.js"></script>
<script language="Javascript" type="text/javascript" src="./public/js/ajaxfileupload.js"></script>
<link href="./public/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
<form action='' method='post'>
	<textarea id="zqq" style="width: 100%;" name="zqq"></textarea>
</form>
</div>
<!--登录s-->
<div class="login_div <?php if($edituid!=''){ ?>hide<?php } ?>" id="zh_login">
  <h3><a href="javascript:;" class="right" onclick="edit_hide('zh_login');"></a>登录<span></span></h3>
   <table class="login_tab2" border="0" cellspacing="0" cellpadding="0">
   <tr></tr>
   <tr>
     <td width="70" align="right">帐   号：</td>
     <td><input name="username" id="zh_username" type="text" class="input01"></td>
   </tr>
   <tr>
     <td width="70" align="right">密   码：</td>
     <td><input name="password" id="zh_password" type="password" class="input01"></td>
   </tr>
   <tr>
     <td width="70" align="right">验证码：</td>
     <td><input name="vcode" id="zh_vcode" type="text" class="input02">&nbsp;&nbsp;<img src="./function/ValidationCode.php" onclick="this.src='./function/ValidationCode.php?t='+Math.random()" width="63" height="25" align="absmiddle" alt="看不清楚，点击刷新验证码" title="看不清楚，点击刷新验证码" style="cursor:pointer">
      </td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><a href="javascript:edit_login();" class="btn_01 left" id="zh_login_now" onclick="edit_login();">立即登录</a><a href="#" class="btn_02" id="reg_now">查看帮助</a></td>
   </tr>
   </table>
</div>
<!--登录e-->
<!--打开文件s-->
<div class="login_div hide" id="zh_openfile">
  <h3><a href="javascript:;" class="right" onclick="edit_hide('zh_openfile');"></a>打开文件<span>(三种不同位置的文件选其一)</span></h3>
   <table class="login_tab3" border="0" cellspacing="0" cellpadding="0">
   <tr></tr>
   <tr>
     <td width="100" align="right">服务器上：</td>
     <td><input name="path_1" id="path_1" type="text" class="input03" value="../"></td>
     <td><input type="button" name="path_upload_1" id="path_upload_1" value="打开文件" class="btn_01" onclick="edit_openfile(1);" /></td>
   </tr>
   <tr><td colspan="3" id="path_ts_1">&nbsp;</td></tr>   
   <tr>
     <td width="100" align="right">网络上：</td>
     <td><input name="path_2" id="path_2" type="text" class="input03" value="http://"></td>
     <td><input type="button" name="path_upload_2" id="path_upload_2" value="打开文件" class="btn_01" onclick="edit_openfile(2);"/></td>
   </tr>
   <tr><td colspan="3" id="path_ts_2">&nbsp;</td></tr>
   <tr>
     <td width="100" align="right">个人PC上：</td>
     <td><input type="file" name="path_3" id="path_3" /></td>
     <td><input type="button" name="path_upload_3" id="path_upload_3" value="打开文件" class="btn_01" onclick="edit_openfile(3);"/></td>
   </tr>
   <tr><td colspan="3" id="path_ts_3">&nbsp;</td></tr>
   </table>
</div>
<!--打开文件e-->
<!--打开文件s-->
<div class="login_div hide" id="zh_openfile">
  <h3><a href="javascript:;" class="right" onclick="edit_hide('zh_openfile');"></a>打开文件<span>(三种不同位置的文件选其一)</span></h3>
   <table class="login_tab3" border="0" cellspacing="0" cellpadding="0">
   <tr></tr>
   <tr>
     <td width="100" align="right">服务器上：</td>
     <td><input name="path_1" id="path_1" type="text" class="input03" value="../"></td>
     <td><input type="button" name="path_upload_1" id="path_upload_1" value="打开文件" class="btn_01" onclick="edit_openfile(1);" /></td>
   </tr>
   <tr><td colspan="3" id="path_ts_1">&nbsp;</td></tr>   
   <tr>
     <td width="100" align="right">网络上：</td>
     <td><input name="path_2" id="path_2" type="text" class="input03" value="http://"></td>
     <td><input type="button" name="path_upload_2" id="path_upload_2" value="打开文件" class="btn_01" onclick="edit_openfile(2);"/></td>
   </tr>
   <tr><td colspan="3" id="path_ts_2">&nbsp;</td></tr>
   <tr>
     <td width="100" align="right">个人PC上：</td>
     <td><input type="file" name="path_3" id="path_3" /></td>
     <td><input type="button" name="path_upload_3" id="path_upload_3" value="打开文件" class="btn_01" onclick="edit_openfile(3);"/></td>
   </tr>
   <tr><td colspan="3" id="path_ts_3">&nbsp;</td></tr>
   </table>
</div>
<!--打开文件e-->
<!--历史记录s-->
<div class="history_div hide" id="zh_history">
  <h3><a href="javascript:;" class="right" onclick="edit_hide('zh_history');"></a>历史记录<span></span></h3>
  <div class="zh_h_show">
   <table class="login_tab3" border="0" cellspacing="0" cellpadding="0" id="zh_history_show"></table>
</div>
</div>
<!--历史记录e-->
<!--当前文件历史记录s-->
<div class="history_div hide" id="zh_curr_history">
  <h3><a href="javascript:;" class="right" onclick="edit_hide('zh_curr_history');"></a>历史记录<span></span></h3>
  <div class="zh_h_show">
   <table class="login_tab3" border="0" cellspacing="0" cellpadding="0" id="zh_currhistory_show"></table>
</div>
</div>
<!--当前文件历史记录e-->
<!--背景s-->
<div id="ly" class="winbg <?php if($edituid!=''){ ?>hide<?php } ?>">
<!--背景e-->
</body>
</html>

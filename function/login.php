<?php
	require("./root.php");
	$username = addslashes($_POST["username"]);
	$password = addslashes($_POST["password"]);
	$vcode = $_POST["vcode"];
	
	if($username=='' || $password==''){
		$data["error"] = 1;
		$data["msg"] = '用户名和密码不能为空！';
	}
	elseif($vcode != $_SESSION["vdcode"]){
		$data["error"] = 2;
		$data["msg"] = '验证码不正确！';
	}
	else{
		$edituser = D("edituser");
		$password = md5($password);
		$result = $edituser->find("username='".$username."' and password='".$password."'");
		if(!empty($result)){
			$_SESSION["editusername"] = $username;
			$_SESSION["edituserid"] = $result["id"];
			$data["error"] = 0;
			$post["lasttime"] = WHOLETIME;
			$post["lastip"] = $_SERVER["REMOTE_ADDR"];
			$result = $edituser->update($post,"id=".$result["id"]."");
		}
		else{
			$data["error"] = 3;
			$data["msg"] = '用户名或密码错误！';
		}
	}
	echo json_encode($data);
	
	
<?php
	require("root.php");
	$fid = $_POST["fid"];
	$content = $_POST["content"];
	
	if($fid==''){
		$data["error"] = 1;
		$data["msg"] = "保存文件出错，请重新操作！";
		echo json_encode($data);
		exit();
	}	
	$id = substr($fid,-intval(strlen($fid)-strrpos($fid,"_")-1));
	$editlog = D("editlog");
	$result = $editlog->find("id=".$id."");
	
	$filepath = $result["path"];
	$fp = fopen($filepath,"w+");
	$w = fwrite($fp,$content);
	fclose($fp);
	
	if($w){
		$data["error"] = 0;
		$data["msg"] = "保存成功！";
	}
	else{
		$data["error"] = 2;
		$data["msg"] = "对不起，保存失败，请重新试一下哦！";
	}
	echo json_encode($data);
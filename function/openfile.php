<?php
	require("root.php");
	$type = $_POST["type"];
	$path = $_POST["path"];
	//$type = $_GET["type"];
	//$path = $_GET["path"];
	
	if($type=='' || $path==''){
		$data["error"] = 1;
		$data["msg"] = '请选择要打开的文件！';
		echo json_encode($data);
		return false;
	}
	if(!checkcanopen($path)){
		$data["error"] = 1;
		$data["msg"] = '此文件正在被您或者您的同伴使用中！';
		echo json_encode($data);
		return false;
	}	
	if(substr($path,0,2)=='./'){
		$path = "../".substr($path,2);
	}
	if($type==1){
		$file = $path;
		if(!file_exists($file)){
			$data["error"] = 2;
			$data["msg"] = '您要打开的文件不存在！';
			$data["path"] = $file;
		}
		else{
			$filecontent = file_get_contents($file);
			$arr = explode('/',$path);
			$fname = $arr[(count($arr)-1)];
			$ret = setfileinfo($type,$file,$fname);
			if($ret!=0){
				$data["error"] = 0;
				$data["content"] = bmtoutf8($filecontent);
				$data["fid"] = $ret;
				$data["fname"] = $fname;
			}
			else{
				$data["error"] = 3;
				$data["msg"] = '打开文件失败，请重新试一下！';
			}
		}
	}
	elseif($type==2){
		$url = $path;
		if(!get_headers($url)){
			$data["error"] = 2;
			$data["msg"] = '您要打开的网址链接不上，请检查网络是否连接！';
		}
		else{
			$filecontent = file_get_contents($url);
			$fname = "".YMD.".html";
			$ret = setfileinfo($type,$url,$fname);
			if($ret!=0){
				$data["error"] = 0;
				$data["content"] = bmtoutf8($filecontent);
				$data["fid"] = $ret;
				$data["fname"] = $url;
			}
			else{
				$data["error"] = 3;
				$data["msg"] = '打开页面失败，请重新试一下！';
			}
		}
		
	}
	elseif($type==3){
		$file = $path;
		if(!file_exists($file)){
			$data["error"] = 2;
			$data["msg"] = '您要打开的文件不存在，请重新打开一下哦！';
		}
		else{
			$filecontent = file_get_contents($file);
			$arr = explode('/',$path);
			$fname = $arr[(count($arr)-1)];
			$ret = setfileinfo($type,$file,$fname);
			if($ret!=0){
				$data["error"] = 0;
				$data["content"] = bmtoutf8($filecontent);
				$data["fid"] = $ret;
				$data["fname"] = $fname;
			}
			else{
				$data["error"] = 3;
				$data["msg"] = '打开文件失败，请重新试一下！';
			}
		}
	}
	
	echo json_encode($data);
	//var_dump($data);

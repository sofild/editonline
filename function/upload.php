<?php
	date_default_timezone_set("PRC");
	error_reporting(E_ALL & ~E_NOTICE);
	header("Content-type:text/html;Charset=utf-8");
	$elementname = 'path_3'; 
	$allowtype = array('.txt','.htm','.html','.xhtml','.css','.js','.php','.jsp','.asp','.aspx','.xml');
	$temp_name = $_FILES[$elementname]['tmp_name'];
	$filename = $_FILES[$elementname]['name'];
	$type = substr($filename,-intval(strlen($filename)-strrpos($filename,".")));
	$temp_error = $_FILES[$elementname]['error'];
	if(!empty($temp_error)){
		switch($temp_error){
			case '1':
				$data["error"] = 1;
				$data["msg"] = '超过了允许上传的文件大小！';
			case '2':
				$data["error"] = 2;
				$data["msg"] = '超过了允许上传的文件大小！';
			case '3':
				$data["error"] = 3;
				$data["msg"] = '文件只有部分被上传！';
			case '4':
				$data["error"] = 4;
				$data["msg"] = '没有文件被上传！';	
			case '5':
				$data["error"] = 5;
				$data["msg"] = '上传文件大小为0！';
		}
	}
	else{
		if(!in_array($type,$allowtype)){
			$data["error"] = 10;
			$data["msg"] = '该文件类型不被允许！';
		}
		else{
			$ym = date("Ymd",time());
			$his = date("His",time());
			$dir = "../files/".$ym."";
			if(!is_dir($dir)){
				mkdir($dir);
			}
			$file = $dir."/".$filename;
			if(file_exists($file)){
				$file = $dir."/".$his."_".$filename;
			}
			$up = move_uploaded_file($temp_name,$file);
			if($up){
				$data["error"]=0;
				$data["msg"] = '上传成功！';
				$data["file"] = $file;
			}
			else{
				$data["error"]=11;
				$data["msg"] = '文件上传失败！';
			}
		}
	}
	echo json_encode($data);
	
?>

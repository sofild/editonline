<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	header("Content-type:text/html;Charset=utf-8");
	require("../config/config.php");
	require("./mysql.class.php");
	require("./func.php");
	
	function setfileinfo($pcate,$path,$fname){
		$dir = "../files/".YMD."";
		if(!is_dir($dir)){
			mkdir($dir);
		}
		$fpath = $dir."/".HIS."_".$fname;
		$cp = copy($path,$fpath);
		if(!$cp){
			return 0;
		}
		$post["uid"] = $_SESSION["edituserid"];
		$post["opentime"] = WHOLETIME;
		$post["isopen"] = 1;
		$post["pcate"] = $pcate;
		$post["path"] = $path;
		$post["fpath"] = $fpath;		
		
		$editlog = D("editlog");
		$result = $editlog->insert($post);
		if(!empty($result)){
			return $result;
		}
		else{
			return 0;
		}
	}
	
	function checkcanopen($path){
		$editlog = D("editlog");
		$result = $editlog->find("path='".$path."' and isopen=1","opentime desc");
		if(!empty($result)){
			$opentime = strtotime($result["opentime"]);
			$xdtime = $opentime+3600*3;
			if($xdtime < intval(STAMPTIME)){
				$id = $result["id"];
				$post["isopen"] = 0;
				$editlog->update($post,"id=".$id."");
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return true;
		}
	}
	
	function bmtoutf8($string){
		$encode = mb_detect_encoding($string, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
		if($encode=='ASCII'){
			$string = iconv("ASCII","UTF-8",$string);
		}
		elseif($encode=='UTF-8'){
			$string = $string;
		}
		elseif($encode=='GB2312'){
			$string = iconv("GB2312","UTF-8",$string);
		}
		elseif($encode=='GBK'){
			$string = iconv("GBK","UTF-8",$string);
		}
		elseif($encode=='BIG5'){
			$string = iconv("BIG5","UTF-8",$string);
		}
		elseif($encode=='CP936'){
			$string = iconv("GBK","UTF-8",$string);	
		}
		else{
			$string = $string;	
		}
		return $string;
	}
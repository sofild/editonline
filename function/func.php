<?php	
	function msg($content,$href='',$js=''){
		if($href!=''){
			echo "<script language='javascript'>alert('".$content."');window.location.href='".$href."'</script>";
			exit();
		}
		elseif($js!=''){
			echo "<script language='javascript'>alert('".$content."'); ".$js.";</script>";
			exit();
		}
		else{
			echo "<script language='javascript'>alert('".$content."'); history.go(-1); </script>";
			exit();
		}
	}
	
	function logs($content){
		if(!is_dir(ROOT."/err/".YM)){
			mkdir(ROOT."/err/".YM);
		}
		$logfile = "".ROOT."/err/".YM."/".YMD.".log";
		$fp = fopen($logfile,"a");
		fwrite($fp,"".WHOLETIME."\n".$content."\n\n");
		fclose($fp);
	}
	
	function D($table,$code="utf8"){
		$db = array('host'=>DBHOST,'user'=>DBUSER,'pwd'=>DBPWD,'dbname'=>DBNAME);
		$mydb = new db($table,$db,$code);
		return $mydb;
	}
	
	function E($sql,$code="utf8"){
		$db = array('host'=>DBHOST,'user'=>DBUSER,'pwd'=>DBPWD,'dbname'=>DBNAME);
		$mydb = new db('',$db,$code);
		return $mydb->exe($sql);
	}

	
	
	
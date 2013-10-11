<?php
	require("root.php");
	$more = $_POST["more"]?$_POST["more"]:0;
	$fid = $_POST["fid"];
	
	$id = substr($fid,-intval(strlen($fid)-strrpos($fid,"_")-1));
	$editlog = D("editlog");
	$result = $editlog->find("id=".$id."");
	$path = $result["path"];
	$field = "id,fpath,opentime,pcate";
	$where = "path='".$path."'";
	if($more==0){
		$limit = "0,10";
	}
	else{
		$limit = "";
	}
	$order = "opentime desc";
	$result = $editlog->select($field,$where,$order,$limit);
	$html = '<tr><td>文件</td><td>修改时间</td></tr>';
	foreach($result as $k=>$v){
		if($v["pcate"]==1 || $v["pcate"]==3){
			$pcate = 1;
		}
		elseif($v["pcate"]==2){
			$pcate = 2;
		}
		$html .= '<tr><td><a href="javascript:void(0);" onclick="edit_path'.$pcate.'(\''.$v["fpath"].'\')">'.$path.'</a></td><td>'.$v["opentime"].'</td></tr>';				
	}
	if($more==0){
		$html .= '<tr><td></td><td><a href="javascript:void(0);" onclick="myhistory(1)">更多...</a></td></tr>';
	}
	echo $html;	
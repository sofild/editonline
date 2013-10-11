<?php
	require("root.php");
	$more = $_POST["more"]?$_POST["more"]:0;
	$editlog = D("editlog");
	$field = "path,opentime,pcate";
	$where = "";
	if($more==0){
		$limit = "0,10";
	}
	else{
		$limit = "";
	}
	$order = "opentime desc";
	$group = "path";
	$result = $editlog->select($field,$where,$order,$limit,$group);
	$html = '<tr><td>文件</td><td>最近打开时间</td></tr>';
	foreach($result as $k=>$v){
		if($v["pcate"]==1 || $v["pcate"]==3){
			$pcate = 1;
		}
		elseif($v["pcate"]==2){
			$pcate = 2;
		}
		$html .= '<tr><td><a href="javascript:void(0);" onclick="edit_path'.$pcate.'(\''.$v["path"].'\')">'.$v["path"].'</a></td><td>'.$v["opentime"].'</td></tr>';				
	}
	if($more==0){
		$html .= '<tr><td></td><td><a href="javascript:void(0);" onclick="myhistory(1)">更多...</a></td></tr>';
	}
	echo $html;
	
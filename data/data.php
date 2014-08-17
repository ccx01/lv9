<?php
	header('content-type:text/html;charset=utf-8');
	include('common.php');
	$sort = htmlspecialchars($_POST['sort']);

	switch ($sort) {
		case 'words':
			$index = htmlspecialchars($_POST['index']);
			$index = $index < 5 ? $index : mt_rand(5, 1000);
			$sql="SELECT * FROM wtow WHERE sort='$sort' ORDER BY id DESC LIMIT $index,1";
			$result = mysql_query($sql);
			$arr = mysql_fetch_array($result);
			break;
		case 'video':
			//暂时这样，之后筛选规则有变
			$index = htmlspecialchars($_POST['index']);
			$index = $index < 3 ? $index : mt_rand(3, 50);
			$sql="SELECT * FROM wtow WHERE sort='$sort' ORDER BY id DESC LIMIT $index,1";
			$result = mysql_query($sql);
			$arr = mysql_fetch_array($result);
			break;
		default:
			
			break;
	}


	$json_string = json_encode($arr); 
	echo $json_string;

	mysql_close($con);
?>
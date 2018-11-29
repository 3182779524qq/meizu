<?php
	header("Content-Type: text/html;charset=utf-8");
	
	$db = mysqli_connect("localhost","root","1234","phonesystem");
	$model=$_GET["model"];
	
	$color=$_GET["color"];
	
	$type=$_GET["type"];
	
	switch($color){
		case "blue":
		$color="极光蓝";
		break;
		case "white":
		$color="远山白";
		break;
		case "black":
		$color="静夜黑";
		break;
	}
	
	mysqli_query($db,"set names utf8");
	
	$sql = "select * from phone where model='$model' and color='$color' and type='$type'";

//	$sql = "select * from phone where model='16th' and color='极光蓝' and type='6+128GB'";
	
	$result = mysqli_query($db,$sql);	
	
	$arr = mysqli_fetch_array($result);
//	echo $arr["Id"];
	print $arr["price"]."&".$arr["Id"];
//	print $arr["Id"];
//	print_r($arr["price"]);
	
	
?>
<?php
	header("Content-Type: text/html;charset=utf-8");
	$phoneld=$_GET["Id"];
	$Uname=$_GET["Uname"];
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");
	
	$sql = "select * from phone where Id=$phoneld";
	
	$result = mysqli_query($my,$sql);
	
	$arr = mysqli_fetch_array($result);
//	echo "aa";
//	print_r (json_encode($arr));
	print $arr["model"]."&".$arr["type"].$arr["color"]."&".$arr["price"]."&".$arr["color"];
	
	
	
?>
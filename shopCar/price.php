<?php
	header("Content-Type: text/html;charset=utf-8");
	$phoneld=$_GET["Id"];
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");	
	$newUser = "select * from user where Uname='$Uname'";
	$newShop = mysqli_query($my,$newUser);
	$arrNew = mysqli_fetch_array($newShop);
	$newshopInfo = $arrNew["shop"];
	$newshopInfoArr = explode("&",$newshopInfo);
	$resStr = "";
	for($j = 0; $j<count($newshopInfoArr); $j++){
		$newminArr = explode(",",$newshopInfoArr[$j]);
		$phonesql = "select * from phone where Id=$newminArr[0]";
		$newPhoneResult = mysqli_query($my,$phonesql);
		$phoneArrNew = mysqli_fetch_array($newPhoneResult);
		$resB = $phoneArrNew["model"]."&".$phoneArrNew["type"].$phoneArrNew["color"]."&".$phoneArrNew["price"]."&".$phoneArrNew["color"]."&".$newminArr[1];	
		$resStr = $resStr.",".$resB;
	};
	print_r($resStr);
?>
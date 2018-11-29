<?php
	header("Content-Type: text/html;charset=utf8");
	$phoneld=$_GET["Id"];
	$Uname=$_GET["Uname"];
	
//	$phoneld=3;
//	$Uname="tom";
	
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");
	
	//用户查询
	$user = "select * from user where Uname='$Uname'";
	$result = mysqli_query($my,$user);
	$arr = mysqli_fetch_array($result);
	$shopInfo = $arr["shop"];
	
	
	
	
	//$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
	//$pieces = explode(" ", $pizza);字符串转数组
	
	//数组转字符串
	//$array = array('lastname', 'email', 'phone');
	//$comma_separated = implode(",", $array);
	
	$shopInfoArr = explode("&",$shopInfo);
	
	$flag=false;
	for($i = 0; $i<count($shopInfoArr); $i++){
		$minArr = explode(",",$shopInfoArr[$i]);
//		print_r ($shopInfoArr);
		if($phoneld == $minArr[0]){
			$flag = true;
			$minArr[1]++;
			$minStr = $minArr[0].",".$minArr[1];
//			print_r ($minStr);
//			echo '<br>';
			$shopInfoArr[$i] = $minStr;
//			$sArr = explode("#",$minStr);
//			$shopInfoArr[$i] = explode("#",$minStr);
//			print_r ($sArr);
			
//			print_r ($shopInfoArr[$i]);
//			echo '<br>';
			
			
		}else{
//			$minStr = $minArr[0].",".$minArr[1]."&";
		}

	};
//	print_r($shopInfoArr);
//	echo '<br>';
	$shopInfo =  implode("&",$shopInfoArr);
	if($flag == false){
		$newPhone = "&".$phoneld.",1";
		$shopInfo = $shopInfo.$newPhone;
	}
//	print_r($sa);
//	echo '<br>';
//	print_r($shopInfo);
//	echo '<br>';
		
	//将新的	$shopInfo存进数据库里
	$newSql = "update user set shop='$shopInfo' where Uname='$Uname'";
	$newresult = mysqli_query($my,$newSql);
	
	if($newresult){
//		echo "成功";
//		echo '<br>';	
	}else{
//		echo "err";
	}
	
//	查询购物车商品信息
//	$sql = "select * from user where Id=$phoneld";
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
		$resB = $phoneArrNew["model"]."&".$phoneArrNew["type"].$phoneArrNew["color"]."&".$phoneArrNew["price"]."&".$phoneArrNew["color"]."&".$newminArr[1]."&".$phoneArrNew["Id"];	
//		$resB = "{".$phoneArrNew["model"]."&".$phoneArrNew["type"].$phoneArrNew["color"]."&".$phoneArrNew["price"]."&".$phoneArrNew["color"]."&".$newminArr[1]."}";	
		$resStr = $resStr.",".$resB;
	};

	print_r($resStr);
?>
<?php
	header("Content-Type: text/html;charset=utf-8");
	$newphoneld=$_GET["newId"];
	$Uname=$_GET["Uname"];
	
//	$newphoneld=1;
//	$Uname="tom";
	
	
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");
	
	//用户查询
	$user = "select * from user where Uname='$Uname'";
	$result = mysqli_query($my,$user);
	$arr = mysqli_fetch_array($result);
	$shopInfo = $arr["shop"];
	
	$shopInfoArr = explode("&",$shopInfo);
	
	$flag=false;
	for($i = 0; $i<count($shopInfoArr); $i++){
		$minArr = explode(",",$shopInfoArr[$i]);
//		print_r ($shopInfoArr);
		if($newphoneld == $minArr[0]){
			$flag = true;
			$minArr[1]=$minArr[1]+1;
//			print_r ($minStr);
//			echo '<br>';
			$shopInfoArr[$i] = $minStr;
		}else{
			$minStr = $minArr[0].",".$minArr[1]."&";
		}

	};
//	print_r($shopInfoArr);
//	echo '<br>';
	
	$shopInfo =  implode("&",$shopInfoArr);
	if($flag == false){
		$newPhone = "&".$phoneld.",1";
		$shopInfo = $shopInfo.$newPhone;
	};
	if($shopInfo[0]=="&"){
		$shopInfo = substr($shopInfo,1);
	};
	if($shopInfo[strlen($shopInfo)-1]=="&"){
		$shopInfo = substr($shopInfo,0,strlen($shopInfo)-1);
	};
	//将新的	$shopInfo存进数据库里
	$newSql = "update user set shop='$shopInfo' where Uname='$Uname'";
	$newresult = mysqli_query($my,$newSql);
	
?>
<?php
	header("Content-Type: text/html;charset=utf-8");
	$Unmae=$_POST["Uname"];
	$Upwd=$_POST["Upwd"];
	$old=$_POST["old"];
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");
	$sql = "select * from user";
	$flag = false;
	$result = mysqli_query($my,$sql);
	
	while($arr = mysqli_fetch_array($result)){
		if($arr["Uname"]==$Unmae&&$arr["Upwd"]==$Upwd){
			$flag = true;
//			echo "../shopCar/shopCar.html?Uname=$Unmae";
		}
	}
//	echo "0";
	if($flag){
//		echo "&Uname=$Unmae"
		$str=$old."&"."Uname=".$Unmae;
//		echo "../shopCar/shopCar.html";
		echo "../shopCar/shopCarPlus.html$str";
//		echo "../shopCar/shopCar.html?Uname=$Unmae"."&".Search=$Search;
//		echo "<script>
//			var oldlocation=location.search;
//			var newlocation='../shopCar/shopCar.html'+oldlocation+'&Uname='".$Unmae.";
//			document.write(newlocation);
//		</script>";
	}else{
		echo "0";
	}
?>
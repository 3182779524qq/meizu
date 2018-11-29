<?php
	header("Content-Type: text/html;charset=utf-8");
	$Unmae=$_POST["Uname"];
	$Upwd=$_POST["Upwd"];
	$my=mysqli_connect("localhost","root","1234","phonesystem");
	mysqli_query($my,"set names utf8");
	$selSql = "select * from user where Uname = '$Unmae'";
	$result = mysqli_query($my,$selSql);
	$arr = mysqli_fetch_array($result);
	if($arr){
		echo "0";
	}else{
		$sql="insert into user(Uname,Upwd) values ('$Unmae',$Upwd)";
		$ad=mysqli_query($my,$sql);
		if($ad){			
			echo "login.html";
		}else{
//			echo "defect";
		}
	}
?>
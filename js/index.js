//轮播图
//var hd = document.getElementById("hd");
//var speed = window.innerWidth-30;
//setInterval(autoPlay,2000);
//var index=0;
//function autoPlay(){
//	if(index >= hd.children.length-1){
//		index = 1;			hd.style.left = 0 + "px";
//	}else{		
//		index++;
//	}
//	animateBuffer(hd,{left:-speed*index},20);		
//}

//nav导航
var nav = document.getElementById("nav");
var phone_des = document.getElementById("phone_des");
var music_des = document.getElementById("music_des");
var people = document.getElementById("people");
for (let i=0;i<nav.children.length;i++) {
	nav.children[i].onmouseover=function () {
		nav.style.background="#FFFFFF";
		nav.style.transition="all 1s";
		if(i==1){
			phone_des.style.display="block";
			animateBuffer(phone_des,{bottom:-170},20);
		}else if(i==2){
			music_des.style.display="block";
			animateBuffer(music_des,{bottom:-170},20);
		}
	}
	nav.children[i].onmouseout=function () {
		nav.style.background="";
		nav.style.transition="all 1s";
		animateBuffer(phone_des,{bottom:0},20,function(){
			phone_des.style.display="none";			
		});
		animateBuffer(music_des,{bottom:0},20,function(){
			music_des.style.display="none";			
		});
	}
}
people.onmouseenter = function () {
	people.children[0].style.display = "block";
}
people.onmouseleave = function () {
	people.children[0].style.display = "none";
}
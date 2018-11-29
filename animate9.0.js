function animateBuffer(ele, obj, tim, callback) {
	clearInterval(ele.timer);
	ele.timer = setInterval(function() {
		var flag = true;
		var current = 0;
		for(var attr in obj) {
			if(attr == "opacity") {
				current = getStyle(ele, attr) * 100;
			} else {
				current = parseInt(getStyle(ele, attr));
			}
			var speed = (obj[attr] - current) / 10;
			speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
			if(Math.abs(obj[attr] - current) >= speed + 0.1) {
				flag = false;
			}
			if(attr == "opacity") {
				current += speed;
				ele.style[attr] = current / 100;
			} else if(attr == "zIndex") {
				ele.style[attr] = obj[attr];
			} else {
				ele.style[attr] = current + speed + "px"; 
			}
		}
		if(flag) {
			ele.style[attr] = obj[attr] + "px";
			clearInterval(ele.timer);
			if(callback) {
				callback();
			}
		}
	}, tim);
}
function getStyle(ele, attr) {
	return window.getComputedStyle ? window.getComputedStyle(ele, false)[attr] : ele.currentStyle[attr];
}

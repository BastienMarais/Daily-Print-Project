
window.onload=function() {
	horloge('div_horloge');
};	
		 
function horloge(el) {
	if(typeof el=="string") {
		el = document.getElementById(el); 
	}
	function actualiser() {
		var date = new Date();
		var str =date.getHours();
		str += 'h'+(date.getMinutes()<10?'0':'')+date.getMinutes();
		str += 'm'+(date.getSeconds()<10?'0':'')+date.getSeconds();
		str += 's';
		el.innerHTML = str;
	}
	actualiser();
	setInterval(actualiser,1000);
}

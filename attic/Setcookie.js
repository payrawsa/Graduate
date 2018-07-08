function setcookie(){
	var name = "taname";
	var taname = document.getElementById("taname").value;
	document.cookie = name+"="+taname;
	//alert(taname);
}
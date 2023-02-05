// intro-page
function openForm(){
	document.getElementById("popup-form").style.opacity = "1";
	document.getElementById("popup-form").style.visibility = "visible";
}
function closeForm(){
	document.getElementById("popup-form").style.opacity = "0";
	document.getElementById("popup-form").style.visibility = "hidden";
}

// main-page
function profile(){
	document.getElementById("profile").style.display = "block";
	document.getElementById("main").style.display = "none";
	document.getElementById("settings").style.display = "none";
}
function main(){
	document.getElementById("profile").style.display = "none";
	document.getElementById("main").style.display = "block";
	document.getElementById("settings").style.display = "none";
}
function settings(){
	document.getElementById("profile").style.display = "none";
	document.getElementById("main").style.display = "none";
	document.getElementById("settings").style.display = "block";
}

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
// main-page
function dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function main(){
	document.getElementById("profile").style.display = "none";
	document.getElementById("main").style.display = "block";
	document.getElementById("settings").style.display = "none";
}
function profile(){
	document.getElementById("profile").style.display = "block";
	document.getElementById("main").style.display = "none";
	document.getElementById("settings").style.display = "none";
}
function settings(){
	document.getElementById("profile").style.display = "none";
	document.getElementById("main").style.display = "none";
	document.getElementById("settings").style.display = "block";
}

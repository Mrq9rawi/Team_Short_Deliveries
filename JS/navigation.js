document.getElementById("burgerIcon").onclick = function () {
	document.getElementById("navigation").style.display = "block";
	document.getElementById("burgerIcon2").style.display = "block";
	document.getElementById("burgerIcon").style.display = "none";
};

document.getElementById("burgerIcon2").onclick = function () {
	document.getElementById("navigation").style.display = "none";
	document.getElementById("burgerIcon2").style.display = "none";
	document.getElementById("burgerIcon").style.display = "block";
};
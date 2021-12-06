let navigation = document.getElementById("navigation");

let timesClicked = 0;

document.getElementById("burgerIcon").onclick = function () {
	timesClicked++;
	if (timesClicked % 2 !== 0) {
		navigation.style.display = "block";
	} else {
		navigation.style.display = "none";
	}
};

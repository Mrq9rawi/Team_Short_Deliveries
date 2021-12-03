let slideIndex = 1;
slider(slideIndex);

function nextSlide(n) {
	slider(slideIndex += n);
}

function currentSlide(n) {
	slider(slideIndex = n);
}

function slider(n) {
	let i;
	let slides = document.getElementsByClassName("imgSlide");
	let dots = document.getElementsByClassName("far fa-circle");
	if (n > slides.length) { slideIndex = 1; }
	if (n < 1) { slideIndex = slides.length; }
	for (let i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (let i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" fas fa-circle", "");
	}
	slides[slideIndex - 1].style.display = "block";
	dots[slideIndex - 1].className += " fas fa-circle";
}
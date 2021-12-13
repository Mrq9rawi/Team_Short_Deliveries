let productName = document.querySelectorAll(".products>div p");

productName.forEach(function (ele) {
	ele.addEventListener("click", function () {
		window.localStorage.setItem("product", ele.textContent);
		window.alert(`(${ele.textContent}) Has been added to your cart`);
	});
});
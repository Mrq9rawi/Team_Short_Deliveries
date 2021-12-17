<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- CSS Files -->
	<!-- Normalizer -->
	<link rel="stylesheet" href="../CSS/normalize.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../CSS/all.min.css">
	<!-- MainCSSFile -->
	<link rel="stylesheet" href="../CSS/master.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
</head>

<body>
	<!-- Header Start -->
	<header>
		<?php
			require ("../Database+SQL/database.php");
			require "login.php";
			session_start();
			echo "<h4>Logged in: $email</h4>";
		?>
		<div class="container">
			<nav>
				<a href="index.html">
					<img src="../images/Team_Short_Deliveries_logo.png" alt="">
				</a>
				<div>
					<i class="fas fa-bars fa-2x" id="burgerIcon"></i>
					<ul id="navigation" class="navigation">
						<li><a href="cart.html">Cart</a></li>
						<li><a href="account.html">Sign In | Sign Up</a></li>
					</ul>
				</div>
				<script>
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
				</script>
			</nav>
		</div>
	</header>
	<!-- Header End -->
	<!-- Main Start -->
	<main>
		<div class="container">
			<div class="home_banner">
				<img src="../images/pexels-alleksana-5949885.jpg" class="imgSlide fade" alt="">
				<img src="../images/pexels-suzy-hazelwood-1306559.jpg" class="imgSlide fade" alt="">
				<img src="../images/pexels-maria-lindsey-content-creator-1468000.jpg" class="imgSlide fade" alt="">
				<div class="circles">
					<i class="far fa-circle" onclick="currentSlide(1)"></i>
					<i class="far fa-circle" onclick="currentSlide(2)"></i>
					<i class="far fa-circle" onclick="currentSlide(3)"></i>
				</div>
				<script>
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
						if (n > slides.length) {
							slideIndex = 1;
						}
						if (n < 1) {
							slideIndex = slides.length;
						}
						for (let i = 0; i < slides.length; i++) {
							slides[i].style.display = "none";
						}
						for (let i = 0; i < dots.length; i++) {
							dots[i].className = dots[i].className.replace(" fas fa-circle", "");
						}
						slides[slideIndex - 1].style.display = "block";
						dots[slideIndex - 1].className += " fas fa-circle";
					}
				</script>
			</div>
			<section class="products-section">
				<div class="special_title">
					<p>Produce</p>
				</div>
				<div class="products">
					<div>
						<img src="../images/pexels-angele-j-128420.jpg" alt="">
						<p>Zucchini $5</p>
					</div>
					<div>
						<img src="../images/pexels-abdul-sameer-7641473.jpg" alt="">
						<p>Yellow Mango $3</p>
					</div>
					<div>
						<img src="../images/pexels-karolina-grabowska-4963963.jpg" alt="">
						<p>Peas $1</p>
					</div>
					<div>
						<img src="../images/pexels-pixabay-326005.jpg" alt="">
						<p>Macintosh Apples $1</p>
					</div>
				</div>
			</section>
			<section class="products-section">
				<div class="special_title">
					<p>Fresh Meal Kits</p>
				</div>
				<div class="products">
					<div>
						<img src="../images/pexels-angele-j-128420.jpg" alt="">
						<p>Zucchini</p>
					</div>
					<div>
						<img src="../images/pexels-abdul-sameer-7641473.jpg" alt="">
						<p>Yellow Mango</p>
					</div>
					<div>
						<img src="../images/pexels-karolina-grabowska-4963963.jpg" alt="">
						<p>Peas</p>
					</div>
					<div>
						<img src="../images/pexels-pixabay-326005.jpg" alt="">
						<p>Macintosh Apples</p>
					</div>
				</div>
			</section>
			<section class="products-section">
				<div class="special_title">
					<p>Nearest To you!</p>
				</div>
				<div class="products">
					<div>
						<img src="../images/pexels-angele-j-128420.jpg" alt="">
						<p>Zucchini</p>
					</div>
					<div>
						<img src="../images/pexels-abdul-sameer-7641473.jpg" alt="">
						<p>Yellow Mango</p>
					</div>
					<div>
						<img src="../images/pexels-karolina-grabowska-4963963.jpg" alt="">
						<p>Peas</p>
					</div>
					<div>
						<img src="../images/pexels-pixabay-326005.jpg" alt="">
						<p>Macintosh Apples</p>
					</div>
				</div>
			</section>
			<script>
				let productName = document.querySelectorAll(".products>div p");
				productName.forEach(function (ele) {
					ele.addEventListener("click", function () {
						window.localStorage.setItem("product", ele.textContent.slice(0, ele.textContent.indexOf("$")));
						window.localStorage.setItem("cost", ele.textContent.slice(ele.textContent.indexOf("$")));
						window.alert(`(${ele.textContent}) Has been added to your cart`);
					});
				});
			</script>
		</div>
	</main>
	<!-- Main End -->
</body>

</html>
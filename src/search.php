<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- ion icons -->
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Zip Code Search</title>
</head>

<body>
	<div class="container">

		<h1 class="text-center">Zipcode Search Tool</h1>

		<div class="row row-top-padding">
			<div class="col-md-5">
				<h3 class="text-center">Zip Code Search</h1>
					<!-- zipcode search box -->
					<input type="number" onkeyup="showZipCodes(this.value)" placeholder="Enter zip code" class="form-control">

					<!-- zip code search results table -->
					<div id="zip-results" class="search-results">
					</div>

			</div>

			<!-- middle space -->
			<div class="col-md-2"></div>

			<div class="col-md-5">
				<h3 class="text-center">City Search</h1>

					<!-- city input -->
					<input type="text" onkeyup="showCities(this.value)" placeholder="Enter city" class="form-control">

					<!-- city results table -->
					<div id="city-results" class="search-results">
					</div>
			</div>

		</div>

		<div class="footer">
			<!-- link to github repo -->
			<h3><a href="https://github.com/rrickgauer/Zipcodes" target="_blank"><ion-icon name="logo-github"></ion-icon><a></h3>
		</div>
	</div>

</body>

</html>

<script>
	function showZipCodes(value) {
		if (value.length < 3) {
			$("#results").html("");
		} else {

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("zip-results").innerHTML = this.responseText;
				}
			};

			xmlhttp.open("GET", "get-results.php?zip=" + value, true);
			xmlhttp.send();
		}
	}

	function showCities(value) {
		if (value.length < 3) {
			$("#results").html("");
		} else {

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("city-results").innerHTML = this.responseText;
				}
			};

			xmlhttp.open("GET", "get-cities.php?city=" + value, true);
			xmlhttp.send();
		}
	}
</script>

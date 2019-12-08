<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include('header-includes.php'); ?>
		<title>Zip Code Search</title>
	</head>
	<body>
		<div class="container">

			<div class="row">
				<div class="col-md-5">

					<h1 class="text-center">Zip Code Search</h1>
						<input type="number" onkeyup="showZipCodes(this.value)" placeholder="Enter zip code" class="form-control">

						<div id="zip-results">
						</div>

				</div>

				<div class="col-md-1">
				</div>

				<div class="col-md-5">
					<h1 class="text-center">City Search</h1>
						<input type="text" onkeyup="showCities(this.value)" placeholder="Enter city" class="form-control">

						<div id="city-results">
						</div>
				</div>

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

<?php
include("connection.php");
$query = mysqli_query($db, "SELECT * FROM cpu_temperature ORDER BY id DESC");
while ($row = mysqli_fetch_array($query)) {
	$time = $row['time'];
	$temperature = $row['temperature'];


	// echo print_r($dataPoints);
}
?>
<html>

<head>
	<title>
	</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div id="link_wrapper">

		</div>
	</div>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>

</body>

</html>
<script>
	window.onload = setInterval(function() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("link_wrapper").innerHTML =
					this.responseText;
			}
		};
		xhttp.open("GET", "server.php", true);
		xhttp.send();

		var getData = document.getElementsByTagName("td")
		var temperatureArray = []
		var timeArray = []
		if (getData.length != 0) {
			for (let index = 0; index < getData.length; index++) {
				if (index % 2 != 0) {
					temperatureArray.push(parseFloat(document.getElementsByTagName("td").item(index).innerHTML))
				}
				if (index == 0 || index % 2 == 0) {
					timeArray.push(document.getElementsByTagName("td").item(index).innerHTML)
				}
			}

			var c = timeArray.map(time =>
				temperatureArray.map(temperature =>
					({
						'y': time,
						'label': temperature
					})
				)
			)
			console.log(dataPoints)
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Push-ups Over a Week"
				},
				axisY: {
					title: "Number of Push-ups"
				},
				data: [{
					type: "line",
					dataPoints: c,
				}]
			});
			chart.render();
		}
	}, 1000);
</script>
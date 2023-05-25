<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chart Data</title>
</head>
<body>
<!-- Menggunakan link CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="ratingChart"></canvas>
<script>
	function readTextFile(file, callback) {
	    var rawFile = new XMLHttpRequest();
	    rawFile.overrideMimeType("application/json");
	    rawFile.open("GET", file, true);
	    rawFile.onreadystatechange = function() {
	        if (rawFile.readyState === 4 && rawFile.status == "200") {
	            callback(rawFile.responseText);
	        }
	    }
	    rawFile.send(null);
	}

	//usage:
	readTextFile("data/out_rating_film.json", function(text){
	    var readDataJson = JSON.parse(text);
	    
		// Data dummy dari JSON
		var data =  readDataJson;

		// Mendapatkan label negara bagian dan rating rata-rata dari data
		var labels = data.data.map(function(item) {
		    return item.state;
		});
		var ratings = data.data.map(function(item) {
		    return item.average_rating;
		});

		// Menggambar grafik menggunakan Chart.js
		var ctx = document.getElementById('ratingChart').getContext('2d');
		// Menggambar grafik menggunakan Chart.js
		var ratingChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: labels,
		        datasets: [{
		            label: 'Rating Rata-rata',
		            data: ratings,
		            backgroundColor: 'rgba(75, 192, 192, 0.8)',
		            borderColor: 'rgba(75, 192, 192, 1)',
		            borderWidth: 1
		        }]
		    },
		    options: {
		        responsive: true,
		        scales: {
		            y: {
		                beginAtZero: true,
		                max: 5
		            }
		        }
		    }
		});
	});

</script>

</body>
</html>
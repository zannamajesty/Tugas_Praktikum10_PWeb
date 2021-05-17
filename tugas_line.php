<?php
include('koneksi2.php');
$negara = mysqli_query($koneksi,"select * from negara");
while($row = mysqli_fetch_array($negara)){
	$nama_negara[] = $row['nama_negara'];
	$new_cases[] = $row['new_cases'];
	$total_deaths[] = $row['total_deaths'];
	$new_deaths[] = $row['new_deaths'];
	$total_recovered[] = $row['total_recovered'];
	$active_cases[] = $row['active_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart New Cases COVID 19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<!-- bar chart new cases -->
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [
				{
					label: 'New Cases',
					//menghilangkan blok warna yang ada di bawah garis
					fill: false,
					data: <?php echo json_encode($new_cases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 1)',
					borderColor: 'rgba(255,99,132,1)',
					//mengatur ketebalan garis
					borderWidth: 1
				},
				{
					label: 'Total Deaths',
					//menghilangkan blok warna yang ada di bawah garis
					fill: false,
					data: <?php echo json_encode($total_deaths); ?>,
					backgroundColor: 'rgba(66, 135, 245, 1)',
					borderColor: 'rgba(66, 135, 245,1)',
					//mengatur ketebalan garis
					borderWidth: 1
				},
				{
					label: 'New Deaths',
					//menghilangkan blok warna yang ada di bawah garis
					fill: false,
					data: <?php echo json_encode($new_deaths); ?>,
					backgroundColor: 'rgba(247, 152, 35, 1)',
					borderColor: 'rgba(247, 152, 35,1)',
					//mengatur ketebalan garis
					borderWidth: 1
				},
				{
					label: 'Total Recovered',
					//menghilangkan blok warna yang ada di bawah garis
					fill: false,
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: 'rgba(133, 245, 29, 1)',
					borderColor: 'rgba(133, 245, 29,1)',
					//mengatur ketebalan garis
					borderWidth: 1
				},
				{
					label: 'Active Cases',
					//menghilangkan blok warna yang ada di bawah garis
					fill: false,
					data: <?php echo json_encode($active_cases); ?>,
					backgroundColor: 'rgba(0, 247, 255, 1)',
					borderColor: 'rgba(0, 247, 255,1)',
					borderWidth: 1
				},
				]
			},
			options: {
				//membuat garis tegak
				elements: {
			        line: {
			            tension: 0
			        }
			    },
				legend: {
					display: true
				},
				barValueSpacing: 20,
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
						}
					}],
					xAxes: [{
						gridLines: {
							color: "rgba(0, 0, 0, 0)",
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
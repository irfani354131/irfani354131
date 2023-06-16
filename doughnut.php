<?php
$koneksi    = mysqli_connect("localhost", "root", "", "chart_belbin");
$nilai  = mysqli_query($koneksi, "SELECT nilai FROM chart order by ID asc");
$action = mysqli_query($koneksi, "SELECT action FROM chart order by ID asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Belbin's Team Roles</title>
    <link rel="stylesheet" href="style.css" />
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 80%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d"); 
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($action)) { echo '"' . $p['action'] . '",';}?>],datasets: [
            {
              label: "nilai",
              data: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"'. $p['nilai']. '",';}?>],
              backgroundColor: [
                '#230f63',
                '#2300cf',
                '#c9aef1'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                  options: {
                    responsive: true
                }
              });
  
</script>

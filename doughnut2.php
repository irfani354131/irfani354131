<?php
$koneksi    = mysqli_connect("localhost", "root", "", "chart_belbin");
$nilai2     = mysqli_query($koneksi, "SELECT nilai_2 FROM chart order by ID asc");
$people     = mysqli_query($koneksi, "SELECT people FROM chart order by ID asc");
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
            labels: [<?php while ($p = mysqli_fetch_array($people)) { echo '"' . $p['people'] . '",';}?>],
            datasets: [
            {
              label: "Nilai_2",
              data: [<?php while ($p = mysqli_fetch_array($nilai2)) { echo '"' . $p['nilai_2'] . '",';}?>],
              backgroundColor: [
                '#00bead',
                '#1b443f',
                '#55ffec'
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
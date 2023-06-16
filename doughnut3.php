<?php
$koneksi    = mysqli_connect("localhost", "root", "", "chart_belbin");
$nilai3     = mysqli_query($koneksi, "SELECT nilai_3 FROM chart order by ID asc");
$thought    = mysqli_query($koneksi, "SELECT thought FROM chart order by ID asc");
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
            labels: [<?php while ($p = mysqli_fetch_array($thought)) { echo '"' . $p['thought'] . '",';}?>],
            datasets: [
            {
              label: "nilai_3",
              data: [<?php while ($p = mysqli_fetch_array($nilai3)) { echo '"' . $p['nilai_3'] . '",';}?>],
              backgroundColor: [
                '#274a11',
                '#649f39',
                '#c4dcb0'
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
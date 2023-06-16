<?php
$koneksi    = mysqli_connect("localhost", "root", "", "chart_belbin");
$nilai  = mysqli_query($koneksi, "SELECT nilai, nilai_2, nilai_3 FROM chart order by ID asc");
$data = mysqli_query($koneksi, "SELECT action, people, thought FROM chart order by ID asc ");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chart Belbin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <style type="text/css">
            .container {
                width: 100%;
                margin: 30px auto;
            }
    </style>
  </head>
  <body>
    <div class="programming-stats">
      <div class="container">
        <canvas id="chart1" widht="300" height="300"></canvas>
      </div>
       <div class="details">
        <ul></ul>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>   
  </body>
</html>
<script>
const chartData = {
  labels: [<?php while ($p = mysqli_fetch_array($data)) { echo '"'. 
             $p['action']. '",' . '"' .$p['people'] . '",' . '"' . $p['thought'] . '",';}?>],
  data: [<?php while ($p = mysqli_fetch_array($nilai)) { echo '"'. 
             $p['nilai']. '",' . '"' .$p['nilai_2'] . '",' . '"' . $p['nilai_3'] . '",';}?>],
};


const myChart = document.getElementById("chart1");
const ul = document.querySelector(".programming-stats .details ul");

new Chart(myChart, {
  type: "doughnut",
  data: {
    labels: chartData.labels,
    datasets: [
      {
        label: "  Nilai",
        data: chartData.data,
        backgroundColor: [
                '#230f63',
                '#00bead',
                '#274a11',
                '#2300cf',
                '#1b443f',
                '#649f39',
                '#c9aef1',
                '#55ffec',
                '#c4dcb0'
              ],
      },
    ],
  },
  options: {
    borderWidth: 5,
    borderRadius: 0,
    hoverBorderWidth: 2,
    plugins: {
      legend: {
        display: true,
      },
    },
  },
});

const populateUl = () => {
  chartData.labels.forEach((l, i) => {
    let li = document.createElement("li");
    li.innerHTML = `${l}: <span class='percentage'>${chartData.data[i]}%</span>`;
    ul.appendChild(li);
  });
};

populateUl();
</script>









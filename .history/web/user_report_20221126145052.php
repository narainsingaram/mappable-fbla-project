<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

?>

<div id="content">
	<main>
        <h1 class="text-3xl font-semibold">Welcome to Your User Report, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$full_name</a>";?></h1>
        <div class="shadow-lg rounded-lg overflow-hidden">
     <div class="py-3 px-5 ">Event Breakdown</div>
     <canvas class="w-4" id="chartPie"></canvas>
    </div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart pie -->
<script>
  const dataPie = {
    labels: ["Academic", "Extracurricular", "Sport"],
    datasets: [
      {
        label: "My First Dataset",
        data: [3, 5, 2],
        backgroundColor: [
          "rgb(133, 105, 241)",
          "rgb(164, 101, 241)",
          "rgb(101, 143, 241)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configPie = {
    type: "pie",
    data: dataPie,
    options: {},
  };

  var chartBar = new Chart(document.getElementById("chartPie"), configPie);
</script>
    </main>
</div>
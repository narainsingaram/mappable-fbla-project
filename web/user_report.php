<?php
  include("../template/navbar.php");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

//get number of global users
$number_of_global_users = mysqli_query(
  $connection,
  "SELECT count( * ) as id FROM users",
);

//get user list ordered by points and gems
$user_list_points_query = mysqli_query(
  $connection,
  "SELECT * FROM users ORDER BY points DESC LIMIT 10",
);
$user_list_gems_query = mysqli_query(
  $connection,
  "SELECT * FROM users ORDER BY gems DESC LIMIT 10",
);

//get sum of all gems, points and experience in users table
$total_gems = mysqli_query(
  $connection,
  "SELECT SUM(gems) as gem_sum
FROM users;",
);
$total_points = mysqli_query(
  $connection,
  "SELECT SUM(points) as point_sum  FROM users;",
);
$total_experience = mysqli_query(
  $connection,
  "SELECT SUM(experience) as experience_sum FROM users;",
);


// establish rows and totals of points, gems, and xp points

$gem_rows = mysqli_fetch_assoc($total_gems);
$point_rows = mysqli_fetch_assoc($total_points);
$experience_rows = mysqli_fetch_assoc($total_experience);

$total_sum_gems = $gem_rows["gem_sum"];
$total_sum_points = $point_rows["point_sum"];
$experience_sum_points = $experience_rows["experience_sum"];
?>



<div id="content" class='px-4 sm:px-6 lg:px-4'>
	<main>
        <header aria-label="Page Header" class="bg-slate-200 mx-8 rounded-xl">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="my-6">
      <h1 class="font-bold text-gray-900 text-4xl">
        Welcome to Your User Report, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$first_name</a>";?>
      </h1>

      <p class="mt-1.5 text-sm text-gray-500">
      See your overall and indiviual statistics in a cleanly laid out report! 
      </p>
    </div>
  </div>
</header>

      <!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <!-- Card -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl bg-neutral-900 border-neutral-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg bg-neutral-800">
          <svg class="flex-shrink-0 size-5 text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500 ">
              Total users
            </p>
            <div class="hs-tooltip">
              <div class="hs-tooltip-toggle">
                <svg class="flex-shrink-0 size-4 text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm bg-neutral-700" role="tooltip">
                  The number of daily users
                </span>
              </div>
            </div>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 200">
            <?php while (
                $row = $number_of_global_users->fetch_assoc()
            ) {
                echo $row["id"] . "<br>";
            } ?>
            </h3>
            <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-green-100 text-green-900 bg-green-800 text-green-100">
              <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
              <span class="inline-block text-xs font-medium">
                12.5%
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl bg-neutral-900 border-neutral-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg bg-neutral-800">
          <svg class="flex-shrink-0 size-5 text-gray-200 400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Overall Points
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800 200">
              <?php echo $total_sum_points; ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl bg-neutral-900 border-neutral-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg bg-neutral-800">
          <svg class="flex-shrink-0 size-5 text-gray-200 400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500 ">
              Overall Gems
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
              <?php echo $total_sum_gems; ?>
            </h3>
            <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-red-100 text-red-900 bg-red-800 text-red-100">
              <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
              <span class="inline-block text-xs font-medium">
                1.7%
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl bg-neutral-900 border-neutral-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg bg-neutral-800">
          <svg class="flex-shrink-0 size-5 text-gray-200 400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Experience Points
            </p>
            <div class="hs-tooltip">
              <div class="hs-tooltip-toggle">
                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm bg-neutral-700" role="tooltip">
                  The average pageviews
                </span>
              </div>
            </div>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800">
              <?php echo $experience_sum_points; ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Card Section -->


          
      <div class="flex flex-wrap mt-6 -mx-3 p-2">

      <div class="w-full px-6 py-2 mx-auto">
      <div wire:id="4ilqyNplThbbtlHVw3TJ">
      <div class="flex flex-wrap -mx-3">

      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-3">
      <div>
      <div class="flex p-4 space-x-4 rounded-2xl md:space-x-6 bg-white">
      <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-blue-100">
	<i class="uil uil-user text-4xl px-1 text-black"></i>
</div>

</div>
      </h5>


      </h5>
      </div>
      </div>
      <div class="px-2 text-right">
      <div class="inline-block text-center rounded-lg bg-gradient-fuchsia">
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="flex flex-wrap mt-6 -mx-3">
      <div class="lg:mb-0 lg:w-4/12">
      <div class="border-black/12.5 flex-col break-words rounded-2xl border-0 border-solid bg-white">
      <div class="py-4 pr-1 bg-gradient-dark-gray rounded-xl">
      <div>
      <h1 class='font-bold text-gray-900 text-3xl pb-4 px-1'>
        Statistics
      </h1>
      </div>
      </div>
      <p>
        <div class="text-lg font-extrabold"> Level and Role: </div><div class="text-blue-600 font-extrabold"> Lvl. <?php echo $levels ?> <?php echo $position ?> </div>
        <div class="text-lg font-extrabold">Total Number of Points:</div> <div class="text-yellow-600 font-extrabold"> <?php echo $points ?> </div>
        <div class="text-lg font-extrabold">Total Number of Gems: </div><div class="text-green-600 font-extrabold"> <?php echo $gems ?> </div> 
        <div class="text-lg font-extrabold">Total Number of Experience Points: </div><div class="text-purple-600 font-extrabold"> <?php echo $experience ?> </div>
        <div class="text-lg font-extrabold">Number of Events Attended: </div><div class="text-orange-600 font-extrabold"> <?php echo $events_attended ?> </div>
        <div class="text-lg font-extrabold">Sports Events Attended:</div><div class="text-blue-600 font-extrabold"><?php echo $sports_count ?></div>
        <div class="text-lg font-extrabold">Extracurricular Events Atended:</div><div class="text-red-600 font-extrabold"><?php echo $extracurricular_count?> </div> 
        <div class="text-lg font-extrabold">Academic Events Attended: </div><div class="text-purple-600 font-extrabold"><?php echo $academic_count?></div>
      </p>
      <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
      <div class="flex flex-wrap mt-0 -mx-3">
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      
      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-cyan 900">
      
      
      </div>

      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-orange 900">
      
     

      </div>
     
      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">

      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-red 900">
      
      </div>

      </div>

      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="px-3 mt-0 lg:flex-none">
      <div class="border-black/12.5 shadow-soft-xl relative pl-6 z-20 flex flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="px-3 lg:w-6/12 lg:flex-none display-inline box-sizing:border-box float-left pt-6">
      <div class="border-black/12.5 shadow-soft-xl relative flex  h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-2">


      <h1 class='font-bold text-gray-900 text-3xl pb-8 px-1'>
        Leaderboard
      </h1>

      <table class="text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-2xl border-0 border-solid">
        <tr>
          <th scope="col" class="py-3 px-36">
            Ranking
          </th>
          <th scope="col" class="py-3 px-36">
            Name
          </th>
          <th scope="col" class="py-3 px-36">
            Points
          </th>
          <th scope="col" class="py-3 px-36">
            Gems
          </th>
        </tr>
      </thead>
      <tbody>
      <?php
      $leaderboard_i = 0;

      foreach ($user_list_points_query as $row) {
          $leaderboard_i = $leaderboard_i + 1;
          $_SESSION["leaderboard"] = $leaderboard_i;
          $user_list_points_first_name = $row["first_name"];
          $user_list_points_last_name = $row["last_name"];
          $user_list_gems = $row["gems"];
          $user_list_points = $row["points"];


          echo "
      <tr class='bg-white'>
      <th scope='row' class='py-2 px-40 font-medium text-gray-900 whitespace-nowrap'>
        $leaderboard_i
      </th>
      <td class='py-2 px-20'>
        $user_list_points_first_name $user_list_points_last_name
      </td>
      <td class='py-2 px-36'>
        $user_list_points
      </td>
      <td class='py-2 px-36'>
        $user_list_gems
      </td>
      </tr>
      ";
      }
      ?>
              </tbody>
          </table>
      </div>
        </div>
          </div>
      </div>
      </div>
      </div>
      </div>

      <div class="flex flex-wrap my-6 -mx-3">

      <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
      <div class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
      <div class="flex flex-wrap mt-0 -mx-3">
      <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-full lg:flex-none">
      
      <?php
      
      $dataPoints = array( 
        array("y" => $extracurricular_count, "label" => "Extracurriculars" ),
        array("y" => $sports_count, "label" => "Sports" ),
        array("y" => $academic_count, "label" => "Academic" ),
      );
      
      ?>
      <!DOCTYPE HTML>
      <html>
      <head>
      <script>
      window.onload = function() {
      
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
          text: "Events Attended"
        },
        axisY: {
          title: "Events Attended by Type"
        },
        data: [{
          type: "column",
          yValueFormatString: "#,##0.## attended",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
      
      }
      </script>
      </head>
      <body>
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </body>
</html>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 969px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 589px;"></div></div></main>
      <div fixed-plugin="">
      <a fixed-plugin-button="" class="bottom-7.5  right-7.5 text-size-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
      <i class="py-2 pointer-events-none fa fa-cog" aria-hidden="true"> </i>
      </a>

      
      </div>
      <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-horizontal-dark">
      <div class="flex-auto p-6 pt-0 sm:pt-4">
      </div>
</div>
</div>
      </div>
      </div>
      </div>
      </div>

      <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA
                                                                                                                                           
                                                                                                                                           
                                                                                                                                           
                                                                                                                                           " data-cf-beacon="{&quot;rayId&quot;:&quot;7848fc3098eb1833&quot;,&quot;version&quot;:&quot;2022.11.3&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;1b7cbb72744b40c580f8633c6b62637e&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/plugins/chartjs.min.js" async=""></script>

      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/plugins/perfect-scrollbar.min.js" async=""></script>

      <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>

      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3" async=""></script>

      </body>
          </main>
      </div>
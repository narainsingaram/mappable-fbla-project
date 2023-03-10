<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

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
        <div class="shadow-lg rounded-lg overflow-hidden">
        <body class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500">
        <div class="flex flex-wrap mt-6 -mx-3 p-4">
          <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 rounded-2xl">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-wrap -mx-3">
                  <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                    <div class="flex flex-col h-full">
                      <p class="text-xs w-max text-neutral-500">Built by developers</p>
                      <h5 class="text-3xl my-2 font-bold">Mappable</h5>
                      <p class="pb-4 text-mg text-neutral-500">Constructed by student developers in West Forsyth High School to improve student engagement and commitment all throughout school. </p>
                      <a class="font-semibold leading-normal text-sm text-slate-500">
                      Read More
                        <i class="uil uil-angle-right-b"></i>
                      </a>
                      </div>
                      </div>
                      <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                      <div class="h-full bg-slate-200 rounded-2xl p-3">
                      <div class="relative flex items-center justify-center h-full">
                    <img class="relative z-20 w-full w-44" src="../assets/images/your_developers.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          
      <div class="flex flex-wrap mt-6 -mx-3 p-2">
      <div class="w-full px-3 mb-4 lg:mb-0 lg:w-7/12 rounded-2xl">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <li class="flex items-center pl-4 xl:hidden">
        <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-size-sm text-slate-500" sidenav-trigger="">
          <div class="w-4.5 overflow-hidden">
            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
            <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
          </div>
        </a>
      </li>
      <li class="flex items-center px-4">
        <a href="javascript:;" class="p-0 transition-all text-size-sm ease-nav-brand text-slate-500">
          <i fixed-plugin-button-nav="" class="cursor-pointer fa fa-cog" aria-hidden="true"></i>
        </a>
      </li>

      <li class="relative flex items-center pr-2">
      <p class="hidden transform-dropdown-show"></p>
      <a href="javascript:;" class="block p-0 transition-all text-size-sm ease-nav-brand text-slate-500" dropdown-trigger="" aria-expanded="false">
      <i class="cursor-pointer fa fa-bell" aria-hidden="true"></i>
      </a>
      <ul dropdown-menu="" class="text-size-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">

      <li class="relative mb-2">
      <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
      <div class="flex py-1">
      <div class="my-auto">
      <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white text-size-sm h-9 w-9 max-w-none rounded-xl">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-1 font-normal leading-normal text-size-sm"><span class="font-semibold">New
      message</span> from Laur</h6>
      <p class="mb-0  leading-tight text-size-xs text-slate-400">
      <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
      13 minutes ago
      </p>
      </div>
      </div>
      </a>
      </li>
      <li class="relative mb-2">
      <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
      <div class="flex py-1">
      <div class="my-auto">
      <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-white text-size-sm bg-gradient-dark-gray h-9 w-9 max-w-none rounded-xl">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-1 font-normal leading-normal text-size-sm"><span class="font-semibold">New
      album</span> by Travis Scott</h6>
      <p class="mb-0  leading-tight text-size-xs text-slate-400">
      <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
      1 day
      </p>
      </div>
      </div>
      </a>
      </li>
      <li class="relative">
      <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
      <div class="flex py-1">
      <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-size-sm bg-gradient-slate h-9 w-9 rounded-xl">
      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>credit-card</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(453.000000, 454.000000)">
      <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
      <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
      </svg>
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-1 font-normal leading-normal text-size-sm">Payment successfully completed</h6>
      <p class="mb-0  leading-tight text-size-xs text-slate-400">
      <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
      2 days
      </p>
      </div>
      </div>
      </a>
      </li>
      </ul>
      </li>
      </ul>
      </div>
      </div>
      </nav>
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
<div class="flex flex-col justify-center align-middle">
	<p class="text-3xl font-semibold leading-none"> <?php while (
     $row = $number_of_global_users->fetch_assoc()
 ) {
     echo $row["id"] . "<br>";
 } ?></p>
	<p class="capitalize">Users</p>
  <span class="leading-normal text-size-sm font-weight-bolder text-lime-500">+55%</span>
</div>
</div>
      </h5>
      </div>
      </div>
      <div class="px-3 text-right basis-1/3">
      <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-fuchsia">
      <i class="ni ni-money-coins text-size-lg relative top-3.5 text-white"></i>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>

      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-3">
      <div>
      <div class="flex p-4 space-x-4 rounded-2xl md:space-x-6 bg-white">
<div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-yellow-100">
<img class='w-12 inline' src='../assets/images/points.png'>
</div>
<div class="flex flex-col justify-center align-middle">
	<p class="text-3xl font-semibold leading-none"><?php echo $total_sum_points; ?></p>
	<p class="capitalize">Overall Points</p>
  <span class="leading-normal text-size-sm font-weight-bolder text-lime-500">+15%</span>
</div>
</div>
      </h5>
      </div>
      </div>
      <div class="px-3 text-right basis-1/3">
      <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-fuchsia">
      <i class="ni ni-world text-size-lg relative top-3.5 text-white"></i>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
      <div class="flex flex-row -mx-3">
      <div class="flex-none w-2/3 max-w-full px-3">
      <div>
      <div class="flex p-4 space-x-4 rounded-2xl md:space-x-6 bg-white">
      <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-green-100">
<i class="bx bx-diamond text-4xl px-1 text-black"></i>
</div>
<div class="flex flex-col justify-center align-middle">
	<p class="text-3xl font-semibold leading-none"><?php echo $total_sum_gems; ?></p>
	<p class="capitalize">Overall Gems</p>
  <span class="leading-normal text-size-sm font-weight-bolder text-lime-500">-5%</span>
</div>
</div>
      </h5>
      </div>
      </div>
      <div class="px-3 text-right basis-1/3">
      <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-fuchsia">
      <i class="ni ni-paper-diploma text-size-lg relative top-3.5 text-white"></i>
      </div>
      </div>
      </div>
      </div> 
      </div>
      </div>

      <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
      <div class="flex flex-row -mx-3">
      <div>
      <div class="flex flex-col justify-center align-middle">
      <div class="flex p-4 space-x-4 rounded-2xl md:space-x-6 bg-white">
<div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 dark:bg-violet-100">
	<img class='w-12 inline -rotate-12' src='../assets/images/experience_points.png'>
</div>

<div class="flex flex-col justify-center align-middle">
	<p class="text-3xl font-semibold leading-none"><?php echo $experience_sum_points; ?></p>
	<p class="capitalize">Experience Points</p>
  <span class="leading-normal text-size-sm font-weight-extrabold text-lime-500">+13%</span>
</div>
</div>

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
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-cyan text-neutral-900">
      
      
      </div>

      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-orange text-neutral-900">
      
     

      </div>
     
      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">

      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-red text-neutral-900">
      
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
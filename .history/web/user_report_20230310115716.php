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

      <!-- Icon Blocks -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
          <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Creative minds
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Effortless updates
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Strong empathy
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Conquer the best
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Designing for people
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Simple and affordable
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 0a.5.5 0 0 1 .447.276L8.81 1h4.69A1.5 1.5 0 0 1 15 2.5V11h.5a.5.5 0 0 1 0 1h-2.86l.845 3.379a.5.5 0 0 1-.97.242L12.11 14H3.89l-.405 1.621a.5.5 0 0 1-.97-.242L3.36 12H.5a.5.5 0 0 1 0-1H1V2.5A1.5 1.5 0 0 1 2.5 1h4.691l.362-.724A.5.5 0 0 1 8 0ZM2 11h12V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5V11Zm9.61 1H4.39l-.25 1h7.72l-.25-1Z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Get freelance work
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-gray-700">
      <!-- Icon -->
      <div class="flex justify-center items-center w-12 h-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-md mx-auto">
        <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </div>
      <!-- End Icon -->

      <div class="mt-3">
        <h3 class="text-sm sm:text-base sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
          Sell your goods
        </h3>
      </div>
    </div>
    <!-- End Icon Block -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Icon Blocks -->
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
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

<div id="content" class='flex mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4'>
	<main>
  <header aria-label="Page Header" class="bg-slate-200 mx-8 rounded-xl">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="my-6">
      <h1 class="font-bold text-gray-900 text-4xl">
        Your User Report, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$first_name</a>";?>
      </h1>

      <p class="mt-3 text-sm text-gray-500">
      With your user report you can see your individual statistics on how you performed in terms of school activities and events this year. 🚀
      </p>
    </div>
  </div>
</header>
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
      <h3 class="text-4xl font-semibold text-black p-2">Overall Data</h3>
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
      <div class="px-3 text-right basis-1/3">
      <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-fuchsia">
      <i class="ni ni-cart text-size-lg relative top-3.5 text-white"></i>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <h3 class="text-4xl font-semibold text-black p-6">Indivual Data</h3>
      <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-5/12 lg:flex-none">
      <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="flex-auto p-4">
      <div class="py-4 pr-1 mb-4 bg-gradient-dark-gray rounded-xl">
      <div>
      <canvas id="chart-bars" height="170" style="display: block; box-sizing: border-box; height: 170px; width: 580px;" width="580"></canvas>
      </div>
      </div>
      <h6 class="mt-6 mb-0 ml-2">Active Users</h6>
      <p class="ml-2 leading-normal text-size-sm">(<span class="font-bold">+23%</span>) than last week
      </p>
      <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
      <div class="flex flex-wrap mt-0 -mx-3">
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs">Users</p>
      </div>
      <h4 class="font-bold">36K</h4>
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-cyan text-neutral-900">
      <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>spaceship</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(4.000000, 301.000000)">
      <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
      </path>
      <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
      </path>
      <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
      <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
      </g>
      </g>
      </g>
      </g>
      </svg>
      </div>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs">Clicks</p>
      </div>
      <h4 class="font-bold">2m</h4>
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft -mt-0.38 w-9/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-orange text-neutral-900">
      <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs">Sales</p>
      </div>
      <h4 class="font-bold">435$</h4>
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft -mt-0.38 w-3/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-red text-neutral-900">
      <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>settings</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(304.000000, 151.000000)">
      <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
      </polygon>
      <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
      <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
      </svg>
      </div>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs">Items</p>
      </div>
      <h4 class="font-bold">43</h4>
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-1/2 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
      <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
      <h6>Sales overview</h6>
      <p class="leading-normal text-size-sm">
      <i class="fa fa-arrow-up text-lime-500" aria-hidden="true"></i>
      <span class="font-semibold">4% more</span> in 2021
      </p>
      </div>
      <div class="flex-auto p-4">
      <div>
      <canvas id="chart-line" height="300" style="display: block; box-sizing: border-box; height: 300px; width: 584px;" width="584"></canvas>
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
      <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
      <h6>Projects</h6>
      <p class="mb-0 leading-normal text-size-sm">
      <i class="fa fa-check text-cyan-500" aria-hidden="true"></i>
      <span class="ml-1 font-semibold">30 done</span>
      this month
      </p>
      </div>
      <div class="flex-none w-5/12 max-w-full px-3 my-auto text-right lg:w-1/2 lg:flex-none">
      <div class="relative pr-6 lg:float-right">
      <a dropdown-trigger="" class="cursor-pointer" aria-expanded="false">
      <i class="fa fa-ellipsis-v text-slate-400" aria-hidden="true"></i>
      </a>
      <p class="hidden transform-dropdown-show"></p>
      <ul dropdown-menu="" class="z-100 text-size-sm transform-dropdown shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 -ml-34 before:text-5.5 pointer-events-none absolute top-0 m-0 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:top-0 before:right-7 before:left-auto before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
      <li class="relative">
      <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300" href="javascript:;">Action</a>
      </li>
      <li class="relative">
      <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300" href="javascript:;">Another action</a>
      </li>
      <li class="relative">
      <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300" href="javascript:;">Something else here</a>
      </li>
      </ul>
      </div>
      </div>
      </div>
      </div>
      <div class="flex-auto p-6 px-0 pb-2">
      <div class="overflow-x-auto ps">
      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
      <thead class="align-bottom">
      <tr>
      <th class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
      Companies</th>
      <th class="px-6 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
      Members</th>
      <th class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
      Budget</th>
      <th class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
      Completion</th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-xd.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="xd">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Soft UI XD Version
      </h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-1.jpg" class="w-full rounded-full" alt="team1">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(806px, 545px);" data-popper-placement="bottom">
      Ryan Tompson
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-2.jpg" class="w-full rounded-full" alt="team2">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(818px, 545px);" data-popper-placement="bottom">
      Romina Hadid
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-3.jpg" class="w-full rounded-full" alt="team3">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(830px, 545px);" data-popper-placement="bottom">
      Alexander Smith
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="team4">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(842px, 545px);" data-popper-placement="bottom">
      Jessica Doe
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> $14,000 </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">60%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-cyan -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      </div>
      </td>
      </tr>
      <tr>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-atlassian.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="atlassian">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Add Progress Track
      </h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-2.jpg" class="w-full rounded-full" alt="team5">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(806px, 608px);" data-popper-placement="bottom">
      Romina Hadid
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="team6">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(818px, 608px);" data-popper-placement="bottom">
      Jessica Doe
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> $3,000 </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">10%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-cyan -mt-0.38 w-1/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      </div>
      </td>
      </tr>
      <tr>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-slack.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="team7">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Fix Platform Errors
      </h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-3.jpg" class="w-full rounded-full" alt="team8">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(806px, 671px);" data-popper-placement="bottom">
      Romina Hadid
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-1.jpg" class="w-full rounded-full" alt="team9">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(818px, 671px);" data-popper-placement="bottom">
      Jessica Doe
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> Not set </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">100%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-lime -mt-0.38 -ml-px flex h-1.5 w-full flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      </div>
      </td>
      </tr>
      <tr>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="spotify">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Launch our Mobile App
      </h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="user1">
      </a>
      <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm" role="tooltip" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(587px, 1711px);" data-popper-placement="top" data-popper-reference-hidden="" data-popper-escaped="">
      Ryan Tompson
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-3.jpg" class="w-full rounded-full" alt="user2">
      </a>
      <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm" role="tooltip" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(599px, 1711px);" data-popper-placement="top" data-popper-reference-hidden="" data-popper-escaped="">
      Romina Hadid
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="user3">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(830px, 734px);" data-popper-placement="bottom">
      Alexander Smith
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-1.jpg" class="w-full rounded-full" alt="user4">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(842px, 734px);" data-popper-placement="bottom">
      Jessica Doe
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> $20,500 </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">100%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-lime -mt-0.38 -ml-px flex h-1.5 w-full flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      </div>
      </td>
      </tr>
      <tr>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-jira.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="jira">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Add the New Pricing
      Page</h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="user5">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(806px, 797px);" data-popper-placement="bottom">
      Ryan Tompson
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> $500 </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">25%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-cyan -mt-0.38 -ml-px flex h-1.5 w-1/4 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
      </div>
      </div>
      </td>
      </tr>
      <tr>
      <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
      <div class="flex px-2 py-1">
      <div>
      <img src="../assets/img/small-logos/logo-invision.svg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="invision">
      </div>
      <div class="flex flex-col justify-center">
      <h6 class="mb-0 leading-normal text-size-sm">Redesign New Online
      Shop</h6>
      </div>
      </div>
      </td>
      <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
      <div class="mt-2 avatar-group">
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-1.jpg" class="w-full rounded-full" alt="user6">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(806px, 860px);" data-popper-placement="bottom">
      Ryan Tompson
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      <a href="javascript:;" class="relative z-20 inline-flex items-center justify-center w-6 h-6 -ml-4 text-white transition-all duration-200 border-2 border-white border-solid rounded-full ease-soft-in-out text-size-xs hover:z-30" data-target="tooltip_trigger" data-placement="bottom">
      <img src="../assets/img/team-4.jpg" class="w-full rounded-full" alt="user7">
      </a>
      <div data-target="tooltip" class="px-2 py-1 text-white bg-black rounded-lg text-size-sm hidden" role="tooltip" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(818px, 860px);" data-popper-placement="bottom">
      Jessica Doe
      <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
      </div>
      </div>
      </td>
      <td class="p-2 leading-normal text-center align-middle bg-transparent border-0 text-size-sm whitespace-nowrap">
      <span class="font-semibold leading-tight text-size-xs"> $2,000 </span>
      </td>
      <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
      <div class="w-3/4 mx-auto">
      <div>
      <div>
      <span class="font-semibold leading-tight text-size-xs">40%</span>
      </div>
      </div>
      <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
      <div class="duration-600 ease-soft bg-gradient-cyan -mt-0.38 -ml-px flex h-1.5 w-2/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
      </div>
      </div>
      </td>
      </tr>
      </tbody>
      </table>
      <div class="ps__rail-x" style="width: 377px; left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
      </div>
      </div>
      </div>

      <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
      <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
      <h6>Orders overview</h6>
      <p class="leading-normal text-size-sm">
      <i class="fa fa-arrow-up text-lime-500" aria-hidden="true"></i>
      <span class="font-semibold">24%</span> this month
      </p>
      </div>
      <div class="flex-auto p-4">
      <div class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
      <div class="relative mb-4 mt-0 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-bell-55 leading-pro bg-gradient-lime bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">$2400,
      Design changes</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">22 DEC
      7:20 PM</p>
      </div>
      </div>
      <div class="relative mb-4 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-html5 leading-pro bg-gradient-red bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">New order
      #1832412</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">21 DEC
      11 PM</p>
      </div>
      </div>
      <div class="relative mb-4 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-cart leading-pro bg-gradient-cyan bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Server
      payments for April</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">21 DEC
      9:34 PM</p>
      </div>
      </div>
      <div class="relative mb-4 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-credit-card leading-pro bg-gradient-orange bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">New card
      added for order #4395133</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">20 DEC
      2:20 AM</p>
      </div>
      </div>
      <div class="relative mb-4 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-key-25 leading-pro bg-gradient-fuchsia bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Unlock
      packages for development</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">18 DEC
      4:54 AM</p>
      </div>
      </div>
      <div class="relative mb-0 after:clear-both after:table after:content-['']">
      <span class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
      <i class="relative z-10 text-transparent ni ni-money-coins leading-pro bg-gradient-dark-gray bg-clip-text fill-transparent"></i>
      </span>
      <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
      <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">New order
      #9583120</h6>
      <p class="mt-1 mb-0 font-semibold leading-tight text-size-xs text-slate-400">17 DEC
      </p>
      </div>
      </div>
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

      <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;7848fc3098eb1833&quot;,&quot;version&quot;:&quot;2022.11.3&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;1b7cbb72744b40c580f8633c6b62637e&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/plugins/chartjs.min.js" async=""></script>

      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/plugins/perfect-scrollbar.min.js" async=""></script>

      <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>

      <script src="https://soft-ui-dashboard-tall.creative-tim.com/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3" async=""></script>

      </body>
          </main>
      </div>
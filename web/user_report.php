<?php
  include("../template/navbar.php");

$select_events_query = mysqli_query($connection, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

$authentifications_content = "";

//get number of global users
$number_of_global_users = mysqli_query(
  $connection,
  "SELECT count( * ) as id FROM users",
);

//get user list ordeemerald by points and gems
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
<header aria-label="Page Header" class="bg-emerald-200 mx-8 rounded-xl">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="my-6">
      <h1 class="font-bold text-emerald-900 text-4xl">
        Welcome to Your User Report, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-emerald-600'>$first_name</a>";?>
      </h1>

      <p class="mt-1.5 text-sm text-gray-500">
      See your overall and indiviual statistics in a cleanly laid out report! 
      </p>
    </div>
  </div>
</header>


<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-emerald-800 dark:border-gray-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
          <h1 class='text-white font-bold text-3xl'>Attendance Report</h1>

            <div class="sm:col-span-2 md:grow">
              <div class="flex justify-end gap-x-2">
                <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[12rem] z-10 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-as-table-table-export-dropdown">
                    <div class="py-2 first:pt-0 last:pb-0">
                      <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                        Options
                      </span>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-emerald-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                          <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        Copy
                      </a>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-emerald-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                          <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                        </svg>
                        Print
                      </a>
                    </div>
                    <div class="py-2 first:pt-0 last:pb-0">
                      <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                        Download options
                      </span>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-emerald-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        Excel
                      </a>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-emerald-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z"/>
                        </svg>
                        .CSV
                      </a>
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-emerald-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                          <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                        </svg>
                        .PDF
                      </a>
                    </div>
                  </div>
                </div>

                <div class="hs-dropdown relative inline-block [--placement:bottom-right]" data-hs-dropdown-auto-close="inside">
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[12rem] z-10 bg-white shadow-md rounded-lg mt-2" aria-labelledby="hs-as-table-table-filter-dropdown">
                    <div class="divide-y divide-gray-200">
                      <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-emerald-600 pointer-events-none focus:ring-emerald-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-emerald-50 border-emerald-200 border-dashed0 dark:checked:border-emerald-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-all" checked>
                        <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">All</span>
                      </label>
                      <label for="hs-as-filters-dropdown-published" class="flex py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-emerald-600 pointer-events-none focus:ring-emerald-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-emerald-50 border-emerald-200 border-dashed0 dark:checked:border-emerald-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-published">
                        <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Published</span>
                      </label>
                      <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                        <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-emerald-600 pointer-events-none focus:ring-emerald-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-emerald-50 border-emerald-200 border-dashed0 dark:checked:border-emerald-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-pending">
                        <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Pending</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead class="bg-gray-50 dark:bg-emerald-600">
              <tr>
                <th scope="col" class="px-6 py-3 text-left">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Event Title
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-left">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Authentifier
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-left">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      ID
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-left">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Status
                    </span>
                  </div>
                </th>
              </tr>
            </thead>
            <?php $post->loadAttendanceTable(); ?>
              </tr>
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">

            <div>
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->
<main class='mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4'>  
  <h1 class='font-bold text-gray-900 text-3xl mb-4 ml-16'>Verify Volunteer Hours</h1>
    <ol class='relative border-l mx-5 border-gray-200'> 
        <?php
            $post->loadAuthentifications();
        ?>
    </ol>
</main>

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
            <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-emerald-100 text-emerald-900 bg-emerald-800 text-emerald-100">
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
            <span class="inline-flex items-center gap-x-1 py-0.5 px-2 rounded-full bg-emerald-100 text-emerald-900 bg-emerald-800 text-emerald-100">
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
      <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-emerald-100">
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
        <div class="text-lg font-extrabold"> Level and Role: </div><div class="text-emerald-600 font-extrabold"> Lvl. <?php echo $levels ?> <?php echo $position ?> </div>
        <div class="text-lg font-extrabold">Total Number of Points:</div> <div class="text-emerald-600 font-extrabold"> <?php echo $points ?> </div>
        <div class="text-lg font-extrabold">Total Number of Gems: </div><div class="text-emerald-600 font-extrabold"> <?php echo $gems ?> </div> 
        <div class="text-lg font-extrabold">Total Number of Experience Points: </div><div class="text-purple-600 font-extrabold"> <?php echo $experience ?> </div>
        <div class="text-lg font-extrabold">Number of Events Attended: </div><div class="text-emerald-600 font-extrabold"> <?php echo $events_attended ?> </div>
        <div class="text-lg font-extrabold">Sports Events Attended:</div><div class="text-emerald-600 font-extrabold"><?php echo $sports_count ?></div>
        <div class="text-lg font-extrabold">Extracurricular Events Atended:</div><div class="text-emerald-600 font-extrabold"><?php echo $extracurricular_count?> </div> 
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
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-emerald 900">
      
     

      </div>
     
      </div>
      
      <div class="text-size-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">

      </div>
      </div>
      </div>
      <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
      <div class="flex mb-2">
      <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-emerald 900">
      
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

      <?php
        // Query to fetch event types and their counts
$sqlEventTypes = "SELECT type, COUNT(*) as count FROM teacher_events GROUP BY type";
$resultEventTypes = $connection->query($sqlEventTypes);

// Query to fetch event distribution by state
$sqlEventStates = "SELECT state, COUNT(*) as count FROM teacher_events WHERE state IS NOT NULL GROUP BY state";
$resultEventStates = $connection->query($sqlEventStates);
      ?>

      <!-- HTML/PHP structure for Event Types Bar Chart -->
<div>
    <canvas id="eventTypeChart" width="400" height="400"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var eventTypesData = <?php echo json_encode($resultEventTypes->fetch_all(MYSQLI_ASSOC)); ?>;
    
    var ctx = document.getElementById('eventTypeChart').getContext('2d');
    var eventTypeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: eventTypesData.map(item => item.type),
            datasets: [{
                label: 'Event Types Distribution',
                data: eventTypesData.map(item => item.count),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Events'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Event Types'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});
</script>


<!-- HTML/PHP structure for Event Distribution by State Pie Chart -->
<div>
    <canvas id="eventStateChart" width="400" height="400"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var eventStatesData = <?php echo json_encode($resultEventStates->fetch_all(MYSQLI_ASSOC)); ?>;
    
    var ctx = document.getElementById('eventStateChart').getContext('2d');
    var eventStateChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: eventStatesData.map(item => item.state),
            datasets: [{
                label: 'Event Distribution by State',
                data: eventStatesData.map(item => item.count),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 0, 255, 0.5)',
                    'rgba(0, 128, 0, 0.5)',
                    'rgba(0, 0, 255, 0.5)',
                    'rgba(128, 128, 128, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 0, 255, 1)',
                    'rgba(0, 128, 0, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return eventStatesData[tooltipItem.index].state + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var scatterChartData = <?php echo json_encode($scatterChartData); ?>;
    
    var hours = scatterChartData.map(item => item.hours);
    var gradeLevels = scatterChartData.map(item => item.grade_level);
    
    var ctx = document.getElementById('scatterPlotHoursGradeLevel').getContext('2d');
    var scatterPlotHoursGradeLevel = new Chart(ctx, {
        type: 'scatter',
        data: {
            datasets: [{
                label: 'Hours vs Grade Level',
                data: scatterChartData,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var data = tooltipItem.parsed;
                            return 'Hours: ' + data.hours + ', Grade Level: ' + data.grade_level;
                        }
                    }
                }
            },
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom',
                    title: {
                        display: true,
                        text: 'Hours'
                    }
                },
                y: {
                    type: 'linear',
                    title: {
                        display: true,
                        text: 'Grade Level'
                    }
                }
            }
        }
    });
});
</script>




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
      <a fixed-plugin-button="" class="bottom-7.5  right-7.5 text-size-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-emerald-700">
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
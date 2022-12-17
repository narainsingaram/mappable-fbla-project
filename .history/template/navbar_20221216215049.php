<?php 
  shuffle($color_array);
?>

<div class="navbar">
  <div class="flex-none">
    <div class="dropdown">
    <label tabindex="0" class="btn btn-square btn-ghost m-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M17.54 8.81a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#000"></path><path d="M6.46 8.81a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92ZM17.54 21.111a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#000"></path><path opacity=".4" d="M6.46 21.111a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#000"></path></svg>
    </label>
    <ul tabindex="0" class="dropdown-content menu p-2 bg-white shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] rounded-2xl w-52">
      <li><a href="index.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="user_report.php">User Report</a></li>
      <li><a href="shop.php">Rewards</a></li>
      <li><a href="teacher_auth.php">Authentications</a></li>
      <li><a href="../settings/user_settings.php">Settings</a></li>
    </ul>
  </div>
  </div>
  <div class="flex-1">
    <a href="index.php" class="btn btn-ghost normal-case text-xl">
      <img class='w-7 pb-0.5 mr-2' src="../assets/images/mappable_logo.png" alt="logo" />
      Mappable
    </a>
  </div>
  <div class="dropdown dropdown-end">
    <label tabindex="0" class="btn btn-square btn-ghost m-1 focus:outline-none focus:ring focus:ring-slate-300">
      <i class="text-2xl uil uil-bell"></i>
    </label>
    <ul tabindex="0" class="dropdown-content menu p-2 bg-white shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] rounded-2xl w-80">
      <div class="px-5 pt-5 flex justify-between">
        <span class=''>
          <h1 class='inline text-lg font-semibold leading-none text-gray-900'>Notifications</h1>
        </span>
        <span class='justify-end'>
          <span class='text-sm text-red-400'>Clear</span>
        </span>
      </div>
    <?php 
      $add_notification = new Notify($con, $userLoggedIn);
      $add_notification->getNotifications();
    ?>
    </ul>
  </div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn normal-case border-none inline-flex mx-2 items-center text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl">Create</label>
      <ul tabindex="0" class="dropdown-content menu p-2 shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] bg-white rounded-2xl text-black w-52">
        <li><a>Create Event</a></li>
        <li><label for="my-modal-5">Create Space</label></li>
      </ul>
    </div>
    <div class="dropdown dropdown-end ">
      <label tabindex="0" class="btn btn-ghost p-0 hover:bg-slate-50">
        <?php echo "<span class='bg-$color_array[0]-100 w-12 h-12 text-xl font-bold text-gray-700  rounded-full flex items-center justify-center'> $profile_symbol </span>";?>
      </label>
      <blockquote tabindex="0" class="dropdown-content rounded-2xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px]">
        <div class="card w-96 bg-white">
          <div class="p-4">
            <div class='w-full flex'>
              <p class="w-1/2 inline mx-1 bg-slate-200/60 px-4 py-2 rounded-xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] text-xl "><?php echo $user['gems']; ?> Gems</p>
              <p class="w-1/2 inline mx-1 bg-slate-200/60 px-4 py-2 rounded-xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] text-xl "><?php echo $user['points']; ?> Points</p>
            </div>
          <div class='bg-slate-200/60 rounded-xl shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] px-2 py-3 mt-4'>
            <div class='pb-1'>
              <span class="text-sm px-2 text-slate-600">3</span>
              <span class="text-sm float-right px-2 text-slate-600">4</span>
            </div>
            <div class="w-full bg-slate-300 rounded-full">
              <div class="bg-blue-600 text-xs text-gray-900/60 text-center p-0.5 leading-none rounded-full" style="width: <?php echo $user['percentage_growth']; ?>%"> <?php echo $user['percentage_growth'] . '%'; ?>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      </blockquote>
    <button class="btn px-1 btn-ghost">
    </button>
  </div>
</div>


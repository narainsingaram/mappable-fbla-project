<?php 
  shuffle($color_array);
?>


<div class="shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] bg-white flex justify-between w-full p-6 items-center">
      <button onclick='myFunction()' class="flex text-black justify-between items-center space-x-3">
        <img class='w-8' src="../assets/images/mappable_logo.png" alt="logo" />
        <p class="text-2xl font-semibold text-blue-600 ">Mappable</p>
      </button>
      <div aria-label="toggler" class="flex justify-center text-white items-center">
      <button class='ml-7 rounded-xl mr-4'>

    <button data-popover-target="popover-bottom" data-popover-placement="bottom" class="radial-progress bg-slate-300/30 text-blue-600" style="<?php echo $user['percentage_growth']; ?>; --size:4rem; --thickness: 0.6rem;"><span class='text-xs'>Lvl <?php echo $user['levels']; ?></span></button>

      <div data-popover id="popover-bottom" role="tooltip" class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-2xl shadow-[rgba(7,_65,80,_0.3)_0px_10px_100px] opacity-0 transition-opacity duration-300">
    <div class="py-2 px-3">
        <p><i class='bx bx-party' ></i> Only <b class='text-blue-600'><?php echo 100 - $user['percentage_growth']; ?>%</b> remaining before marking the achievement of <b class='text-blue-600'>Level <?php echo $user['levels'] + 1; ?></b> <i class='bx bx-party' ></i> </p>
        <a>View more Statistics</a>
    </div>
</div>
    </button>
      <span class='rounded-xl bg-yellow-200 p-1 text-black px-3 py-2 mx-2'>
        <i class='bx bx-star'></i> <?php echo $user['points']; ?></span>
      <span class='rounded-xl bg-teal-200 p-1 text-black px-3 py-2 mx-2'>
        <i class='bx bx-diamond'></i> <?php echo $user['gems']; ?></span>
        <button>
          <?php echo "<span class='bg-$color_array[0]-100 w-10 h-10 text-xl font-bold text-gray-700  rounded-full flex items-center justify-center font-mono'> $profile_symbol </span>";?>
        </button>
        <button class='inline text-xs text-red-500'>Logout</button>
      <button class='w-12 h-12 rounded-full ml-6 bg-slate-500/50' onclick='myFunction()'>
        <i class="uil uil-bars text-2xl"></i>
      </button>
      </div>
    </div>
    <div id="Main" style='display:none;' 
    class="bg-slate-700/70 transform xl:translate-x-0 shadow-[rgba(7,_65,_210,_0.1)_0px_9px_50px] fixed overflow-y-auto  top-0 z-20 bg-white justify-between items-start w-full sm:w-64 flex-col h-full">
      <div class="md:w-auto w-full">
        <button onclick='myFunction()' class="hidden focus:outline-none hover:text-indigo-200 focus:text-indigo-200 text-black sm:flex justify-start p-6 items-center space-x-3 w-full">
         <img class='w-8' src="../assets/images/mappable_logo.png" alt="logo" />
          <p class="inline text-2xl font-semibold text-blue-600">Mappable</p>
        </button>
        <div class="flex flex-col px-6 justify-start items-center px-4 w-full">
        <a href='index.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6 21V19C6 17.9391 6.42143 16.9217 7.17157 16.1716C7.92172 15.4214 8.93913 15 10 15H14C15.0609 15 16.0783 15.4214 16.8284 16.1716C17.5786 16.9217 18 17.9391 18 19V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <p class="text-base leading-4 border-b border-transparent hover:border-white focus:border-white">Home</p>
          </a>
        <a href='dashboard.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg class="fill-stroke" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 4H5C4.44772 4 4 4.44772 4 5V9C4 9.55228 4.44772 10 5 10H9C9.55228 10 10 9.55228 10 9V5C10 4.44772 9.55228 4 9 4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M19 4H15C14.4477 4 14 4.44772 14 5V9C14 9.55228 14.4477 10 15 10H19C19.5523 10 20 9.55228 20 9V5C20 4.44772 19.5523 4 19 4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M9 14H5C4.44772 14 4 14.4477 4 15V19C4 19.5523 4.44772 20 5 20H9C9.55228 20 10 19.5523 10 19V15C10 14.4477 9.55228 14 9 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M19 14H15C14.4477 14 14 14.4477 14 15V19C14 19.5523 14.4477 20 15 20H19C19.5523 20 20 19.5523 20 19V15C20 14.4477 19.5523 14 19 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4">Dashboard</p>
          </a>
          <a href='user_report.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4">User Report</p>
</a>
          <a href='shop.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6 21V19C6 17.9391 6.42143 16.9217 7.17157 16.1716C7.92172 15.4214 8.93913 15 10 15H14C15.0609 15 16.0783 15.4214 16.8284 16.1716C17.5786 16.9217 18 17.9391 18 19V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <p class="text-base leading-4 border-b border-transparent hover:border-white focus:border-white">Shop</p>
          </a>
          <a href='teacher_auth.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 6H7C6.46957 6 5.96086 6.21071 5.58579 6.58579C5.21071 6.96086 5 7.46957 5 8V17C5 17.5304 5.21071 18.0391 5.58579 18.4142C5.96086 18.7893 6.46957 19 7 19H16C16.5304 19 17.0391 18.7893 17.4142 18.4142C17.7893 18.0391 18 17.5304 18 17V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M17 10C18.6569 10 20 8.65685 20 7C20 5.34315 18.6569 4 17 4C15.3431 4 14 5.34315 14 7C14 8.65685 15.3431 10 17 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4 border-b border-transparent hover:border-white focus:border-white">AuthN</p>
          </a>
          <a href="profile.php?profile_username=<?php echo $userLoggedIn;?>" class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 5H6C4.89543 5 4 5.89543 4 7V19C4 20.1046 4.89543 21 6 21H18C19.1046 21 20 20.1046 20 19V7C20 5.89543 19.1046 5 18 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16 3V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M8 3V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M4 11H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M10 16H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4 border-b border-transparent hover:border-white focus:border-white">Profile</p>
          </a>
          <a href='../settings/user_settings.php' class="bg-slate-300/30 hover:bg-slate-300/40 transition ease-in px-3 py-3 rounded-2xl flex justify-start items-center w-full space-x-6 my-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10.325 4.317C10.751 2.561 13.249 2.561 13.675 4.317C13.7389 4.5808 13.8642 4.82578 14.0407 5.032C14.2172 5.23822 14.4399 5.39985 14.6907 5.50375C14.9414 5.60764 15.2132 5.65085 15.4838 5.62987C15.7544 5.60889 16.0162 5.5243 16.248 5.383C17.791 4.443 19.558 6.209 18.618 7.753C18.4769 7.98466 18.3924 8.24634 18.3715 8.51677C18.3506 8.78721 18.3938 9.05877 18.4975 9.30938C18.6013 9.55999 18.7627 9.78258 18.9687 9.95905C19.1747 10.1355 19.4194 10.2609 19.683 10.325C21.439 10.751 21.439 13.249 19.683 13.675C19.4192 13.7389 19.1742 13.8642 18.968 14.0407C18.7618 14.2172 18.6001 14.4399 18.4963 14.6907C18.3924 14.9414 18.3491 15.2132 18.3701 15.4838C18.3911 15.7544 18.4757 16.0162 18.617 16.248C19.557 17.791 17.791 19.558 16.247 18.618C16.0153 18.4769 15.7537 18.3924 15.4832 18.3715C15.2128 18.3506 14.9412 18.3938 14.6906 18.4975C14.44 18.6013 14.2174 18.7627 14.0409 18.9687C13.8645 19.1747 13.7391 19.4194 13.675 19.683C13.249 21.439 10.751 21.439 10.325 19.683C10.2611 19.4192 10.1358 19.1742 9.95929 18.968C9.7828 18.7618 9.56011 18.6001 9.30935 18.4963C9.05859 18.3924 8.78683 18.3491 8.51621 18.3701C8.24559 18.3911 7.98375 18.4757 7.752 18.617C6.209 19.557 4.442 17.791 5.382 16.247C5.5231 16.0153 5.60755 15.7537 5.62848 15.4832C5.64942 15.2128 5.60624 14.9412 5.50247 14.6906C5.3987 14.44 5.23726 14.2174 5.03127 14.0409C4.82529 13.8645 4.58056 13.7391 4.317 13.675C2.561 13.249 2.561 10.751 4.317 10.325C4.5808 10.2611 4.82578 10.1358 5.032 9.95929C5.23822 9.7828 5.39985 9.56011 5.50375 9.30935C5.60764 9.05859 5.65085 8.78683 5.62987 8.51621C5.60889 8.24559 5.5243 7.98375 5.383 7.752C4.443 6.209 6.209 4.442 7.753 5.382C8.753 5.99 10.049 5.452 10.325 4.317Z"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <p class="text-base leading-4 border-b border-transparent hover:border-white focus:border-white">Settings</p>
</a>
        </div>
      </div>
      <div class="pb-8 mx-6 pt-6 flex justify-start items-center space-x-2">
        <div>
        <a href="profile.php?profile_username=<?php echo $userLoggedIn;?>">
          <?php echo "<span class='bg-$color_array[0]-100 w-10 h-10 text-xl font-bold text-gray-700  rounded-full flex items-center justify-center font-mono'> $profile_symbol </span>";?>
        </a>
        </div>
        <div class="flex flex-col jusitfy-start items-start space-y-1">
          <a href="profile.php?profile_username=<?php echo $userLoggedIn;?>" class="cursor-pointer text-base leading-4 text-slate-700"><?php echo $user['first_name'] . " " . $user['last_name']; ?></a>
          <p class="text-xs leading-3 text-slate-500 break-all whitespace-nowrap"><?php echo $user['email']; ?></p>
        </div>
      </div>
    </div>
    
  
<script>
  function myFunction() {
  var x = document.getElementById("Main");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
  
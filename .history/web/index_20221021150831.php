
<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

if ($user['position'] == 'teacher') {
    $red = "Hey";
}

$points = $points + 50;
$gems = $gems + 10;


if(isset($_POST['user_submit'])){
  $filename = rand(999, 99999)."-".$_FILES["image"]["name"];
  $temp_name = $_FILES['image']['tmp_name'];
  $dir_target = "images";

if(!empty($_FILES['image']['name'])) {
  if(move_uploaded_file($temp_name, '../assets/event_images/'.$filename)){
};

  $post = new Teacher_Events($con, $userLoggedIn);
  $post->event_feed($_POST['user_title'],$_POST['user_type'], $_POST['user_date'], $_POST['user_start'], $_POST['user_end'], $_POST['user_desc'], $filename, 'none'); //do submitEvent function in Post_Events.php
}
header("Location: index.php");
}
?>


<!-- Terminal Command -->
<section id='section' class="flex">

<?php
    $item='Everything is awesome!!';
    $tmp = exec("main.py $item");
    echo $tmp;
?>

<?php 


  if(isset($_POST['getting_points'])){
    $points_query = mysqli_query($con," UPDATE users SET points = '$points' WHERE id = '$id'");
    $gems_query = mysqli_query($con," UPDATE users SET gems = '$gems' WHERE id = '$id'");
    
    $new_experience_growth = ($experience * 1.1);
    $experience_division = $new_experience_growth / 100;
    $level = floor($experience_division);
    $new_level_growth_percentage = $new_experience_growth - ($level * 100); //percentage they gave grown

    $experience_query = mysqli_query($con," UPDATE users SET experience = '$new_experience_growth' WHERE id = '$id'");
    $levels_query = mysqli_query($con," UPDATE users SET levels = '$level' WHERE id = '$id'");
    $percentage_growth = mysqli_query($con," UPDATE users SET percentage_growth = '$new_level_growth_percentage' WHERE id = '$id'");
    header("Location: index.php");
  }
?>


<div class="w-1/2 p-5">

<h1 class="text-4xl font-semibold">Welcome, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$full_name</a>";?></h1>
<p>Explore your school & community's events created by your teachers and administrators.</p>


<form action="index.php" method="POST" enctype="multipart/form-data">
<select name="user_type">
    <option value="Choose Type of Event" disabled>Choose Type of Event</option>
    <option value="Academic">Academic</option>
    <option value="Extracurricular">Extracurricular</option>
    <option value="Sports">Sports</option>
    <option value="Other">Other</option>
  </select>
  <input name="user_title" type="text" class="bg-red-100" placeholder="Event Title">
  <input type="date" name="user_date" id="">
  <input type="time" name="user_start" id="">
  <input type="time" name="user_end" id="">
  <textarea name="user_desc"></textarea>
  <input type="file" name="image" id="">
  <button name="user_submit" type="submit">Submit</button>
</form>


  <?php
      $post = new Teacher_Events($con, $userLoggedIn);
      $post->live_events();
      $post->load_regular_feed();
  ?>
</div>


<div class="w-1/2 p-5">
<?php
if($fetch_event_rows['num_event_rows'] > 0) {
   $check_requests = mysqli_query($con,"SELECT * FROM authentifications WHERE id='$event_id' AND requester='$userLoggedIn'");
   $match_request_rows = mysqli_num_rows($check_requests);
}
?>

<i class="uim uim-layer-group"></i>
  <header class='mb-2 ml-4'>
    <h1 class='inline text-xl font-bold leading-none text-gray-900'>Notification Center <svg onclick="toggleNotificationStack()" class='inline cursor-pointer' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill="#60a5fa" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" opacity=".4"></path><path fill="#60a5fa" d="M12 15.01c-.19 0-.38-.07-.53-.22l-3.53-3.53a.754.754 0 010-1.06c.29-.29.77-.29 1.06 0l3 3 3-3c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-3.53 3.53c-.15.15-.34.22-.53.22z"></path></svg></h1>
  </header>
<div id='toggle_notification_center' class="stack mb-4 w-100">
  <div id='noti_card' class="mb-3 grid rounded-2xl bg-slate-200/80 text-black border-0 backdrop-blur-xl">
    <div class="card-body">
      <h2 class="card-title">Notification 1</h2> 
      <p>You have 3 unread messages. Tap here to see.</p>
        <div class="-top-0 -right-0 absolute dropdown dropdown-end">
          <label tabindex="0" class="px-3 py-2 active:scale-125 cursor-pointer text-sm"><i class='uil uil-ellipsis-h'></i></label>
          <ul tabindex="0" class="dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52">
            <li><a>Save to Bookmarks</a></li>
            <li><a>Delete</a></li>
          </ul>
        </div>
    </div>
  </div> 
  <div class="mb-3 grid rounded-2xl bg-slate-200/80  text-black border-0 backdrop-blur-xl">
    <div class="card-body">
      <h2 class="card-title">Notification 1</h2> 
      <p>You have 3 unread messages. Tap here to see.</p>
      <button class='text-slate-700 cursor-pointer -top-0 -right-0 z-20 text-xs absolute px-3 py-3'><i class='uil uil-ellipsis-h'></i></button>
    </div>
  </div> 
  <div class="mb-3 grid rounded-2xl bg-slate-200/80  text-black border-0 backdrop-blur-xl">
    <div class="card-body">
      <h2 class="card-title">Notification 1</h2> 
      <p>You have 3 unread messages. Tap here to see.</p>
    </div>
  </div> 
</div>


<div class="p-4 w-full shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] bg-white rounded-2xl sm:p-8">
    <div class="flex justify-between items-center mb-2">
        <h5 class="text-xl font-bold leading-none text-gray-900">Activity</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline">
            View all
        </a>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200">
            <?php
            $post->load_requested_feed();
          ?>
        </ul>
   </div>
</div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-3xl font-bold tracking-wide leading-none text-gray-900 text-black" id="exampleModalLabel">Create an Event</h3>
        <a href="#" class="bg-blue-300 text-black font-normal px-3 py-3 rounded-full"><?php echo $user['first_name'][0] . "" . $user['last_name'][0]; ?></a>
      </div>
      <div class="modal-body">
   <form action="index.php" method="POST" enctype="multipart/form-data" class="w-full max-w-lg">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <input name="event_title" class="block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" type="text" placeholder="Event Title">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
    <select name="event_type" class="block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300">
      <option value="" class="" disabled selected>Type of Event</option>
        <option value="Academic">Academic</option>
         <option value="Club">Club</option>
         <option value="Sports">Sports</option>
        </select>
    </div>
  </div>
<div class="flex flex-wrap -mx-3 mb-6">
  <div class="w-full px-3">
    <input name="event_date" class='block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300' type="date"  value="2022-07-22">
    </div>
</div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <input name="event_start" class="block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" type="time" placeholder="Jane">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <input name="event_end" class="block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" type="time" placeholder="Doe">
    </div>
</div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <textarea name="event_desc" class="block w-full px-4 py-3 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-slate-100 focus:outline-none focus:ring focus:ring-blue-300" type="text" placeholder="Description of Event"></textarea>
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-6">
  <div class="w-full px-3">
  <div class="flex justify-center items-center w-full">
    <!-- <label for="event_file_zone" class="flex flex-col justify-center items-center w-full h-64 bg-slate-50 rounded-2xl border-2 border-gray-300 hover:border-green-300 border-dashed cursor-pointer">
        <div class="flex flex-col justify-center items-center pb-6">
            <i class="uil uil-image-upload text-7xl mb-3 text-gray-400"></i>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold text-green-300"> Upload Image</span> or drag and drop</p>
            <p class="text-xs mx-5 text-gray-500 dark:text-gray-400">Any image you upload will be visible on the event's post. SVG, PNG, JPG. Other formats will not function.</p>
        </div>
        <input method="POST" id="event_file_zone" name="image" type="file" class="hidden" /> -->
    </label>
    </div> 
  </div>
</div>

<div class="flex items-center">
<input id="link-checkbox" style="display: block !important;" type="checkbox" value="" class="w-4 h-4 mr-3 px-2">
    <label for="regulations_checkbox" class="ml-auto text-xs text-gray-500">
Keep in mind that school events should be school-related and ethical, and certainly may not infringe any <a href="#" class="text-green-300 hover:underline">Community Regulations</a>.</label>
</div>

</div>
      <div class="modal-footer">
        <button type="button" class="bg-slate-200 hover:bg-slate-300 text-black font-normal px-3.5 py-2 rounded-xl"  data-bs-dismiss="modal">Close</button>
        <button name="event_submit" type="submit" class="bg-green-300 hover:bg-green-400 text-black font-normal px-3.5 py-2 rounded-xl"><i class='bx bx-check'></i> Confirm</button>
      </form>
      </div>
    </div>
  </div>
</div>
  </main>
   </section>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>  



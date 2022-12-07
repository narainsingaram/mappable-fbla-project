<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

if(isset($_POST['user_submit'])) {
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

if(isset($_POST['create_space'])) {
  $name = $_POST['space_name'];
  $bio = $_POST['space_bio'];
  $create_spc_query = mysqli_query($con, "INSERT INTO spaces VALUES(NULL, '$name', '$bio', '$userLoggedIn', ',', ',', 'no')");
  header("Location: index.php");
}


?>

<div class="w-1/2 p-5">


<form action="index.php" method='POST'>
  <button name='getting_points' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-500 cursor-pointer rounded-xl' type="submit">Get Points</button>
</form>


<input type="checkbox" id="my-modal-5" class="modal-toggle" />
<div class="modal">
  <div class="modal-box bg-white relative">
    <label for="my-modal-5" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Create a Space</h3>
    <p class="py-1">
      <form class='inline' action="index.php" method='POST'>
        <input type="text" name="space_name">
        <input type="text" name="space_bio">
        <button name='create_space' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl' type="submit">Confirm</button>
      </form>
    </p>
  </div>
</div>

<h1 class='inline text-xl font-bold leading-none text-gray-900'>
  <svg class='inline' xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M2 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.9 2.36-5.25 5.25-5.25H9c.41 0 .75.34.75.75s-.34.75-.75.75H6.5c-2.07 0-3.75 1.68-3.75 3.75V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path d="M22 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.07-1.68-3.75-3.75-3.75H15c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h2.5c2.89 0 5.25 2.35 5.25 5.25V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path opacity=".4" d="M17.5 22.75H16c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h1.5c2.07 0 3.75-1.68 3.75-3.75V16c0-.41.34-.75.75-.75s.75.34.75.75v1.5c0 2.9-2.36 5.25-5.25 5.25Z" fill="#3b82f6"></path><path d="M9 22.75H6.5c-2.89 0-5.25-2.35-5.25-5.25V15c0-.41.34-.75.75-.75s.75.34.75.75v2.5c0 2.07 1.68 3.75 3.75 3.75H9c.41 0 .75.34.75.75s-.34.75-.75.75ZM8.501 11.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path><path opacity=".4" d="M7.501 18.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76ZM16.501 9.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76Z" fill="#3b82f6"></path><path d="M15.501 18.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path></svg>
Spaces
</h1>
<?php
  $spcs_list = '';
  $all_spcs_query = mysqli_query($con, "SELECT * FROM spaces");

    while($space = mysqli_fetch_array($all_spcs_query)) {
      $id = $space['space_id'];
      $date = date("Y-m-d");
      $space_name = $space['name'];
      $space_bio = $space['bio'];
      $founder = $space['founder'];
      $participant_arr = explode(',', $space['participants']);

      if(isset($_POST["$id-spaces-request"])) {
        $join_spc = mysqli_query($con, "UPDATE spaces SET participants=CONCAT(participants, '$userLoggedIn,') WHERE space_id='$id' AND founder='$founder'");
        $insert_spc_new_mem_msg = mysqli_query($con, "INSERT INTO spc_msgs VALUES (NULL,'$id', '$userLoggedIn', '', 'new_member', '$date', 'no')");
        header("Location: space.php?space=$id ");
      }
          if (in_array($userLoggedIn, $participant_arr))
            {
              $spcs_list .= "
              <div class='card rounded-2xl shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] border-none'>
                <div class='card-body'>
                  <h2 class='card-title'>Space $id</h2>
                  <p>If a dog chews shoes whose shoes does he choose?</p>
                  <div class='card-actions justify-end'>
                      <a href='space.php?space=$id' class='btn btn-circle btn-wide	 glass rounded-full' name='$id-spaces-request'>Go To Space</a>
                </div>
              </div>
            </div>
              ";
            }
          else
            {
              $spcs_list .= "
              <div id='spaces_div' class='my-3 card rounded-2xl shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] border-none'>
                <div class='card-body'>
                  <h2 class='card-title'>
                  $space_name</h2>
                  <p>$space_bio</p>
                  <div class='card-actions justify-end'>
                    <form name='index.php' method='POST'>
                    <button class='py-2 px-4 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75'> FDASF </button>
                      <button class='inline-flex py-2 px-3 font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl' name='$id-spaces-request'> 
                        <svg class='mr-1' width='20' height='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path d='M21.101 9.58786H19.8979V8.41162C19.8979 7.90945 19.4952 7.5 18.999 7.5C18.5038 7.5 18.1 7.90945 18.1 8.41162V9.58786H16.899C16.4027 9.58786 16 9.99731 16 10.4995C16 11.0016 16.4027 11.4111 16.899 11.4111H18.1V12.5884C18.1 13.0906 18.5038 13.5 18.999 13.5C19.4952 13.5 19.8979 13.0906 19.8979 12.5884V11.4111H21.101C21.5962 11.4111 22 11.0016 22 10.4995C22 9.99731 21.5962 9.58786 21.101 9.58786Z' fill='#3b82f6'></path>
                        <path d='M9.5 15.0155C5.45422 15.0155 2 15.6623 2 18.2466C2 20.8299 5.4332 21.5 9.5 21.5C13.5448 21.5 17 20.8532 17 18.2689C17 15.6846 13.5668 15.0155 9.5 15.0155Z' fill='#3b82f6'></path>
                        <path opacity='0.4' d='M9.49999 12.5542C12.2546 12.5542 14.4626 10.3177 14.4626 7.52761C14.4626 4.73754 12.2546 2.5 9.49999 2.5C6.74541 2.5 4.53735 4.73754 4.53735 7.52761C4.53735 10.3177 6.74541 12.5542 9.49999 12.5542Z' fill='#3b82f6'></path>
                        </svg>
                          Join
                      </button>
                    </form>
                </div>
              </div>
            </div>
              ";
            }
       }
    echo $spcs_list;
?>


<h1 class="text-4xl font-semibold">Welcome, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$full_name</a>";?></h1>
<p>Explore your school & community's events created by your teachers and administrators.</p>


<form action="index.php" method="POST" enctype="multipart/form-data"> 
  <input name="user_title" type="text" placeholder="Event Title" class='inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'>
  <select name="user_type" class='inline-flex items-center py-2 px-3 text-sm font-medium  text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'>
    <option value="Choose Type of Event">Choose Type of Event</option>
    <option value="Academic">Academic</option>
    <option value="Extracurricular">Extracurricular</option>
    <option value="Sports">Sports</option>
    <option value="Other">Other</option>
  </select> <br>
  <input type="date" name="user_date" id="" class='inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'>
  <input type="time" name="user_start" id="" class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'>
  <input type="time" name="user_end" id=""  class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'> <br>
  <input type="text" name="user_desc"  placeholder="Description of Your Event" class='inline-flex items-center py-2 px-3 text-sm font-medium text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl pt-12'>
  <input type="file" name="image" id="" class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl'> <br>
  <button name="user_submit" class='align-middle inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-500 bg-blue-200/60 cursor-pointer rounded-xl' type="submit">Submit</button>
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
   $check_requests = mysqli_query($con,"SELECT * FROM authentifications WHERE id='$event_id' AND requester='david_lastt'");
   $match_request_rows = mysqli_num_rows($check_requests);
}
?>

<i class="uim uim-layer-group"></i>
  <header class='mb-2 ml-4'>
    <h1 class='inline text-xl font-bold leading-none text-gray-900'>Notification Center
      <!-- <form class='inline' action="index.php" method='POST'> -->
        <button name='mark_noti_read' type='submit'>
          <svg onclick="toggleNotificationStack()" class='swap-off inline cursor-pointer active:scale-150' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill="#60a5fa" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" opacity=".4"></path><path fill="#60a5fa" d="M12 15.01c-.19 0-.38-.07-.53-.22l-3.53-3.53a.754.754 0 010-1.06c.29-.29.77-.29 1.06 0l3 3 3-3c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-3.53 3.53c-.15.15-.34.22-.53.22z"></path></svg>
        </button>
      <!-- </form> -->
  </h1>
  
  </header>

<div id='toggle_notification_center' class="stack mb-4 w-100">
  <?php 
    $add_notification = new Notify($con, $userLoggedIn);
    $add_notification->getNotifications();
  ?>
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
  </main>
    </section>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>  



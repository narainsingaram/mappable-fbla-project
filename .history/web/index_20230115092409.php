<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

if(isset($_POST['user_submit'])) {
  $post = new Teacher_Events($con, $userLoggedIn);
  $post->event_feed($_POST['user_title'],$_POST['user_type'], $_POST['user_date'], $_POST['user_start'], $_POST['user_end'], $_POST['user_desc'], $filename, 'none'); //do submitEvent function in Post_Events.php
header("Location: index.php");
}
?>
<section id='section' class="flex">
  <?php 
    if(isset($_POST['getting_points'])){
      $new_points = $points + 20;
      $new_gems = $gems + 5
      $experience_growth = $experience * 1.1; 
      $levels = floor($experience_growth / 100); 
      $percentage_growth = $experience_growth - ($levels * 100); 
        $points_query = mysqli_query($con,"UPDATE users SET points = '$new_points', gems = '', experience = '$experience_growth', levels = '$levels', percentage_growth = '$percentage_growth' WHERE id = '$id'"); 
      header("Location: index.php");
      }

    if(isset($_POST['create_space'])) {
      $create_spc_query = mysqli_query($con, "INSERT INTO spaces VALUES(NULL, '{$_POST['space_name']}', '{$_POST['space_bio']}', '$userLoggedIn', ',', ',', 'no')");
      header("Location: index.php");
    }
  ?>

<div class="w-1/2 p-5">
  <form action="index.php" method='POST'>
    <button name='getting_points' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-500 cursor-pointer rounded-xl' type="submit">Get Points</button>
  </form>

<input type="checkbox" id="create_space" class="modal-toggle" />
<div class="modal">
  <div class="modal-box bg-white relative">
    <label for="my-modal-5" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Create a Space</h3>
    <form class='inline' action="index.php" method='POST'>
        <input type="text" name="space_name">
        <input type="text" name="space_bio">
        <button name='create_space' class='inline-flex items-center py-2 px-3 text-sm font-medium text-center text-blue-500 bg-blue-200/60 cursor-pointer rounded-xl' type="submit">Confirm</button>
    </form>
  </div>
</div>




<h1 class='inline text-xl font-bold leading-none text-gray-900'>
  <svg class='inline' xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M2 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.9 2.36-5.25 5.25-5.25H9c.41 0 .75.34.75.75s-.34.75-.75.75H6.5c-2.07 0-3.75 1.68-3.75 3.75V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path d="M22 9.75c-.41 0-.75-.34-.75-.75V6.5c0-2.07-1.68-3.75-3.75-3.75H15c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h2.5c2.89 0 5.25 2.35 5.25 5.25V9c0 .41-.34.75-.75.75Z" fill="#3b82f6"></path><path opacity=".4" d="M17.5 22.75H16c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h1.5c2.07 0 3.75-1.68 3.75-3.75V16c0-.41.34-.75.75-.75s.75.34.75.75v1.5c0 2.9-2.36 5.25-5.25 5.25Z" fill="#3b82f6"></path><path d="M9 22.75H6.5c-2.89 0-5.25-2.35-5.25-5.25V15c0-.41.34-.75.75-.75s.75.34.75.75v2.5c0 2.07 1.68 3.75 3.75 3.75H9c.41 0 .75.34.75.75s-.34.75-.75.75ZM8.501 11.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path><path opacity=".4" d="M7.501 18.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76ZM16.501 9.381a1.88 1.88 0 1 0 0-3.76 1.88 1.88 0 0 0 0 3.76Z" fill="#3b82f6"></path><path d="M15.501 18.381a2.88 2.88 0 1 0 0-5.76 2.88 2.88 0 0 0 0 5.76Z" fill="#3b82f6"></path></svg>
Spaces
</h1>
<?php

?>


<h1 class="text-4xl font-semibold">Welcome, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$full_name</a>";?></h1>
<p>Explore your school & community's events created by your teachers and administrators.</p>
<?php
  $web = new Web();
  $space = new Spaces($con, $userLoggedIn);
  $post = new Teacher_Events($con, $userLoggedIn);
  $web->disp_evt_mo();
  $space->load_space_div();
  $post->live_events();
  $post->load_regular_feed();
?>
</div>



<div class="w-1/2 p-5">

<!-- <form id="myForm" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form>  -->
<!-- 
<script>
  function submitForm() {
  // Get the form data
  var name = $("#name").val();
  var email = $("#email").val();

  if (name === "" || email === "") {
    alert("Please fill out all fields.");
    return; // Return early to exit the function
  }

  // Make an AJAX request
  $.ajax({
    url: "index.php",
    type: "POST",
    data: { name: name, email: email },
    success: function(response) {
      console.log("Form submitted successfully!");
    },
    error: function(xhr, status, error) {
      console.log("There was an error submitting the form.");
    }
  });
}

$("#myForm").submit(function(event) {
  event.preventDefault(); // Prevent the form from resetting and the page from refreshing
  event.returnValue = false; // Stop form from submitting when page 
  submitForm(); // Call the function to submit the form
});



</script> -->


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



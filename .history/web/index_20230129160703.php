<?php
include("../template/web_defaults.php");
include("../template/navbar.php");


if(isset($_POST['user_submit'])) {
  $post = new Teacher_Events($connection, $userLoggedIn);
  $post->event_feed($_POST['user_title'],$_POST['user_type'], $_POST['user_date'], $_POST['user_start'], $_POST['user_end'], $_POST['user_desc'], $filename, 'none'); //do submitEvent function in Post_Events.php
header("Location: index.php");
}
?>


<header aria-label="Page Header" class="bg-slate-200 mx-8 rounded-xl">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="my-6">
      <h1 class="font-bold text-gray-900 text-4xl">
        Welcome Back, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-blue-600'>$first_name</a>";?>
      </h1>

      <p class="mt-1.5 text-sm text-gray-500">
      Explore your school & community's events created by your teachers and administrators. 🚀
      </p>
    </div>
  </div>
</header>


<section id='section' class="flex mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4">
<?php
if(isset($_POST['getting_points'])){
  increaseUserPointsGems($connection, $id, $points, $gems, $experience);
}
 if(isset($_POST['create_space'])) {
  mysqli_query($connection, "INSERT INTO spaces VALUES(NULL, '{$_POST['space_name']}', '{$_POST['space_bio']}', '$userLoggedIn', ',', ',', 'no')");
  increaseUserPointsGems($connection, $id, $points, $gems, $experience);
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

<?php
  $web = new Web();
  $space = new Spaces($connection, $userLoggedIn);
  $post = new Teacher_Events($connection, $userLoggedIn);
  $web->disp_evt_mo();
  $post->live_events();
  $post->load_regular_feed();
?>
</div>



<div class="w-1/2 p-5">
<div class="p-4 w-full shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] bg-white rounded-2xl sm:p-8">
    <div class="flex justify-between items-center mb-2">
        <h5 class="text-xl font-bold leading-none text-gray-900">Activity</h5>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200">
            <?php
            $post->load_requested_feed();
            $space->load_space_div();

          ?>
        </ul>
   </div>
  </div>
</div>
  </main>
    </section>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>  



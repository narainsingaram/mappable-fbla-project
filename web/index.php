<?php
include("../template/navbar.php");

if (isset($_POST['user_submit'])) {
  $post = new Teacher_Events($connection, $userLoggedIn);
  $post->event_feed(
      $_POST['user_title'],
      $_POST['user_type'],
      $_POST['user_date'],
      $_POST['user_start'],
      $_POST['user_end'],
      $_POST['user_desc'],
      $_POST['user_hours'],
      $_POST['user_spots'],
      $_POST['user_loc_1'],
      $_POST['user_loc_2'],
      $_POST['user_city'],
      $_POST['user_state'],
      $_POST['user_country'],
      '',
      'none'
  );
  header("Location: index.php");
}

?>

<header aria-label="Page Header" class="bg-emerald-100/60 mx-8 mt-4 rounded-xl">
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="my-6">
      <h1 class="font-bold text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 via-emerald-500 to-emerald-500 text-4xl">
        Welcome Home, <?php echo" <a href='profile.php?profile_username=$userLoggedIn' class='text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 via-emerald-500 to-emerald-500'>$first_name</a>";?>
      </h1>

      <p class="mt-1.5 text-sm text-transparent bg-clip-text bg-gradient-to-br from-gray-600 via-gray-500 to-gray-400">
      Explore your school & community's events created by your teachers and administrators. 🚀
      </p>
    </div>
  </div>
</header>




<section id='section' class="flex mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4">
<?php
 if(isset($_POST['create_space'])) {
  mysqli_query($connection, "INSERT INTO spaces VALUES(NULL, '{$_POST['space_name']}', '{$_POST['space_bio']}', '$userLoggedIn', ',', ',', 'no')");
  increaseUserPointsGems($connection, $id, $points, $gems, $experience);
  header("Location: index.php");
}


?>

<div class="w-2/3">

<input type="checkbox" id="create_space" class="modal-toggle hidden">
    <div class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="modal-box bg-white p-6 rounded-lg shadow-lg relative max-w-md w-full">
            <label for="create_space" class="btn btn-sm btn-circle absolute right-2 top-2 cursor-pointer text-white">✕</label>
            <h3 class="text-xl font-semibold mb-4">Create a Space</h3>
            <form action="index.php" method="POST">
                <div class="mb-4">
                    <label for="space_name" class="block text-sm font-medium text-gray-500">Space Name</label>
                    <input type="text" id="space_name" name="space_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-emerald-300" placeholder="Enter space name" requiemerald>
                </div>
                <div class="mb-4">
                    <label for="space_bio" class="block text-sm font-medium text-gray-500">Space Bio</label>
                    <input type="text" id="space_bio" name="space_bio" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-emerald-300" placeholder="Enter space bio" requiemerald>
                </div>
                <div class="flex justify-end">
                  <button type="submit" name="create_space" class="inline-flex items-center py-2 px-4 text-sm font-medium text-emerald-500 bg-emerald-200/60 hover:bg-emerald-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-200">Confirm</button>
                </div>
            </form>
        </div>
    </div>

<?php
  $web->disp_evt_mo();
  $post->live_events();
  $post->load_regular_feed("home");
?>
</div>



<div class="w-1/2 p-5">
<div class="p-4 w-full shadow-[rgba(7,_65,_50,_0.1)_0px_9px_100px] bg-white rounded-2xl sm:p-8">
    <div class="flex justify-between items-center mb-2">
        <h5 class="text-xl font-bold leading-none text-gray-900">Activity</h5>
   </div>
   <div class="flow-root">
        <ul role="list" class="my-2 divide-y divide-gray-200">
            <?php
            $post->load_requested_feed();
          ?>
        </ul>
   </div>
  </div>
  <?php 
    echo "<h1 class='font-bold text-gray-900 text-2xl mb-2 mt-8 mx-4'> Spaces </h1>";
    $space->load_space_div();
  ?>
</div>
  </main>
    </section>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>  
</html>
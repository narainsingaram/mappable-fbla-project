<?php 
  include("../template/navbar.php");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

$date = date('Y-m-d');

$space_id = (isset($_GET['space']) ? $_GET['space'] : '');

if($space_id == ''){
  header("Location: space_explore.php ");
}


if(isset($_POST['spc_msg_send'])) {
    $connectiontent = $_POST['spc_msg_input'];
    $type = $_POST['msg_type'];
    $update_spc_mgs = mysqli_query($connection, "INSERT INTO spc_msgs VALUES (NULL,'$space_id', '$userLoggedIn', '$connectiontent', '$type', '$date', 'no')");
    header("Location: space.php?space=$space_id");
}

$get_space_info = mysqli_query($connection,"SELECT * FROM spaces WHERE space_id='$space_id'");
$current_space = mysqli_fetch_array($get_space_info);

?>

<section id='section' class="flex">

<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<label for="my-modal-4" class="modal cursor-pointer">
  <label class="modal-box bg-white relative" for="">
    <h3 class="text-lg font-bold">Travel To A Space</h3>
    <?php
      $Space = new Spaces($connection, $userLoggedIn);
      $Space->load_space_menu_links();
    ?>
  </label>
</label>

<main class='w-full'>

<div class="navbar border-t-4 border-blue-400/50">
  <div class="navbar-start">
      <label for="my-modal-4" class="btn btn-ghost text-3xl btn-circle">
        <i class="uil uil-bars"></i>
      </label>
  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost normal-case text-xl">
      <?php echo $current_space['name']; ?>
    </a>
  </div>
  <div class="navbar-end">

  </div>
</div>

            <div class="messages w-full p-6">
                  <ul class="space-y-4 relative pb-5 h-1/4">
                    <?php
                        $Space->load_current_space($space_id);
                    ?>
                  </ul>
              </div>
            </div>
          </main>

            <form method='POST' id='chat_input' style='position:fixed; bottom:0px;' class='inline bg-slate-100 flex items-center justify-between w-full p-3' action="space.php?space=<?php echo $space_id; ?>">
                <input type="text" placeholder="Send a message"
                    class="block w-full px-3 py-2.5 text-slate-600 placeholder-gray-300 transition duration-150 ease-in-out transform rounded-xl bg-white focus:outline-none focus:ring focus:ring-blue-300 border-none"
                    name="spc_msg_input" autofocus autocomplete="off">
                    <input type='hidden' name="msg_type" value='default'>
                <button id='submit' name='spc_msg_send' class='btn btn-ghost px-2 py-1.5 rounded-xl ml-3' type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="m7.11 5.961 9.02-3.01c4.05-1.35 6.25.86 4.91 4.91l-3.01 9.02c-2.02 6.07-5.34 6.07-7.36 0l-.89-2.68-2.68-.89c-6.06-2.01-6.06-5.32.01-7.35Z" fill="#3b82f6"></path><path d="m12.12 11.629 3.81-3.82ZM12.12 12.38c-.19 0-.38-.07-.53-.22a.754.754 0 0 1 0-1.06l3.8-3.82c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-3.8 3.82c-.15.14-.34.22-.53.22Z" fill="#3b82f6"></path></svg>
                </button>
            </form>
            </div>
          </div>


  <button style='display:none;' onclick="moveToLatestMessages()" class='fixed bottom-24 right-4 rounded-xl text-blue-500 z-50' id="scrollBottomActionButton" title="Go to top">
    <span class='bg-blue-200 px-3 py-2 rounded-xl'> Jump To Latest Messages </span>
  </button>

<script type='text/javascript' src='../assets/js/bottom_page.js'></script>
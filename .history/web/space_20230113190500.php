<?php 
include("../template/web_defaults.php");
include("../template/navbar.php");
include("../includes/operators/spc_msg_operator.php");


$date = date('Y-m-d');

$space_id = (isset($_GET['space']) ? $_GET['space'] : '');

if($space_id == ''){
  header("Location: ../space.php ");
}


if(isset($_POST['spc_msg_send'])) {
    $content = $_POST['spc_msg_input'];
    $type = $_POST['msg_type'];
    $update_spc_mgs = mysqli_query($con, "INSERT INTO spc_msgs VALUES (NULL,'$space_id', '$userLoggedIn', '$content', '$type', '$date', 'no')");
    header("Location: space.php?space=$space_id");
}

$get_space_info = mysqli_query($con,"SELECT * FROM spaces WHERE space_id='$space_id'");
$current_space = mysqli_fetch_array($get_space_info);

?>
<section id='section' class="flex">

<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<label for="my-modal-4" class="modal cursor-pointer">
  <label class="modal-box bg-white relative" for="">
    <h3 class="text-lg font-bold">Travel To A Space</h3>
    <?php
      $Space = new Spaces($con, $userLoggedIn);
      $Space->load_space_menu_links();
    ?>
  </label>
</label>

<main class='w-full'>

<div class="navbar">
  <div class="navbar-start">
      <label for="my-modal-4" class="btn btn-ghost btn-circle">
      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M17.54 8.81a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#475569"></path><path d="M6.46 8.81a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92ZM17.54 21.111a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#475569"></path><path opacity=".4" d="M6.46 21.111a2.96 2.96 0 1 0 0-5.92 2.96 2.96 0 0 0 0 5.92Z" fill="#475569"></path></svg>
      </label>
  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost normal-case text-xl">
      <?php echo $current_space['name']; ?>
    </a>
  </div>
  <div class="navbar-end">
    <button class="btn btn-ghost btn-circle">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
    </button>
    <button class="btn btn-ghost btn-circle">
      <div class="indicator">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
        <span class="badge badge-xs badge-primary indicator-item"></span>
      </div>
    </button>
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
                <div class="dropdown flex dropdown-top mr-3">
                  <label tabindex="0" class="px-1 rounded-xl mr-3 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"><path opacity=".4" d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81v8.37C2 19.83 4.17 22 7.81 22h8.37c3.64 0 5.81-2.17 5.81-5.81V7.81C22 4.17 19.83 2 16.19 2Z" fill="#3b82f6"></path><path d="M16 11.25h-3.25V8c0-.41-.34-.75-.75-.75s-.75.34-.75.75v3.25H8c-.41 0-.75.34-.75.75s.34.75.75.75h3.25V16c0 .41.34.75.75.75s.75-.34.75-.75v-3.25H16c.41 0 .75-.34.75-.75s-.34-.75-.75-.75Z" fill="#3b82f6"></path></svg>
                  </label>
                  <ul tabindex="0" class="dropdown-content menu p-2 shadow-[rgba(7,_65,_50,_0.1)_0px_9px_50px] bg-white rounded-2xl w-52">
                    <li><a>Announcement</a></li>
                    <li><a>Question</a></li>
                  </ul>
                </div>
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
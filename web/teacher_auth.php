<?php
  include("../template/navbar.php");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

    $select_events_query = mysqli_query($connection, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

    $authentifications_content = "";
?>
<main class='mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4'>  
    <ol class='relative border-l mx-5 border-gray-200'> 
        <?php
            $post->loadAuthentifications();
        ?>
    </ol>
</main>
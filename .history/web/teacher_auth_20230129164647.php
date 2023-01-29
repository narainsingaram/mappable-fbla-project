<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

    $select_events_query = mysqli_query($connection, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

    $authentifications_content = "";
?>
<main class=''>  
    <ol class='mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-4'> 
        <?php
            $post->loadAuthentifications();
        ?>
    </ol>
</main>
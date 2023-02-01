<?php
include("../template/web_defaults.php");
include("../template/navbar.php");

    $select_events_query = mysqli_query($connection, "SELECT * from authentifications WHERE authentifier='$userLoggedIn' AND accepted='no' ORDER BY id");

    $authentifications_content = "";
?>
<main class=''>  

    <ol class='relative border-l mx-5 border-gray-200'> 
        
        <?php
            $post->loadAuthentifications();
        ?>
    </ol>
</main>
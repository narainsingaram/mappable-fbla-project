<?php 
    include("../template/web_defaults.php");
    include("../template/navbar.php");

    $post = new Teacher_Events($connection, $userLoggedIn);

    $post->live_events();

?>
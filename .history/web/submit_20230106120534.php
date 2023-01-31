<?php
$name = $_POST['name'];
$email = $_POST['email'];


$sql = "INSERT INTO notifications (user_to, user_from, not_message, datetime, viewed) VALUES ('$name', '$name', '$email', '2022-10-21 22:37:34', 'no')";

mysqli_query($connection, $sql);
?>

<?php
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO notifications (user_to, user_from, type, datetime, not_message, viewed) VALUES ('$name','$name', '$name', '2022-10-21 22:37:34', '$email', 'no')";
mysqli_query($connection, $sql);


?>

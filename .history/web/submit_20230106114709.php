<?php
$name = $_POST['name'];
$email = $_POST['email'];


$sql = "INSERT INTO notifications (user_to, user_from, not_message, datetime, viewed) VALUES ('$name', '$email', '$name', '')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
?>

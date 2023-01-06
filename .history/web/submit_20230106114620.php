<?php
$name = $_POST['name'];
$email = $_POST['email'];


$sql = "INSERT INTO notifications (user_to, user_from, not_message,) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

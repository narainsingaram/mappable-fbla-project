<?php
$name = $_POST['name'];
$email = $_POST['email'];


$sql = "INSERT INTO table (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

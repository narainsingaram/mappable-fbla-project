<?php
$name = $_POST['name'];
$email = $_POST['email'];

// Connect to the database
$connectionn = new mysqli('localhost', 'username', 'password', 'database');

// Check connection
if ($connectionn->connect_error) {
  die("Connection failed: " . $connectionn->connect_error);
}

$sql = "INSERT INTO table (name, email) VALUES ('$name', '$email')";

if ($connectionn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connectionn->error;
}

$connectionn->close();
?>

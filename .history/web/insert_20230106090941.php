<?php

// Connect to the database
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Get the form data
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

// Insert the information into the database
$sql = "INSERT INTO information (user_to, description) VALUES ('$name', '$description')";
mysqli_query($db, $sql);

// Get the inserted information from the database
$sql = "SELECT * FROM information WHERE name='$name' AND description='$description'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the information was inserted successfully
if ($row) {
  // If the information was inserted successfully, return a success message
  echo "Information inserted successfully!";
} else {
  // If the insertion failed, return an error message
  echo "Error: Information was not inserted.";
}

?>
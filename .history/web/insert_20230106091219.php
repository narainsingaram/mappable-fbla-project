<?php

// Get the form data
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

// Insert the information into the database
$sql = "INSERT INTO notifications (user_to, user_from, type, datetime, not_message, viewed) VALUES ('$name','$name', '$name', '$name', '$description', 'no')";
mysqli_query($con, $sql);



// // Get the inserted information from the database
// $sql = "SELECT * FROM information WHERE name='$name' AND description='$description'";
// $result = mysqli_query($db, $sql);
// $row = mysqli_fetch_assoc($result);

// // Check if the information was inserted successfully
// if ($row) {
//   // If the information was inserted successfully, return a success message
//   echo "Information inserted successfully!";
// } else {
//   // If the insertion failed, return an error message
//   echo "Error: Information was not inserted.";
// }

?>
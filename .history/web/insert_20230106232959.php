<?php
  // Get the form data
  if(!$name) {
    $name = $_POST["name"];
  }
  $email = $_POST["email"];

  // Insert the data into the database
  $sql = "UPDATE users SET first_name='$name', last_name='$email' WHERE username='$username'";


  if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>

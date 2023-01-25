<?php
  // Get the form data
  if(!$_POST[]) {
    $name = $_POST["name"];
  }
  $email = $_POST["email"];

  // Insert the data into the database
  $sql = "UPDATE users SET first_name='$name', last_name='$email' WHERE username='$username'";


  if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connectionn->error;
  }
?>

<?php
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];

  // Insert the data into the database
  $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

  if ($connectionn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connectionn->error;
  }

  $connectionn->close();
?>

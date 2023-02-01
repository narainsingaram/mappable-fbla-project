<?php
  // Connect to the database
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "myDB";

  // Create connection
  $connectionn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($connectionn->connect_error) {
    die("Connection failed: " . $connectionn->connect_error);
  }

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

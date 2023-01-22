<?php 
include("../template/web_defaults.php");
include("../template/navbar.php");

if (isset($variable) && preg_match('/^shop[1-8]$/', $variable)) {
    // The variable is set and has a name in the correct format
  } else {
    // The variable is not set or has a name in the incorrect format
  }

?>
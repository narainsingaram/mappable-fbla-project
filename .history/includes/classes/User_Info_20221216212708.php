<?php
class User_Info {
    private $user;
    private $connection;

public function __construct($connection, $user) {
    $this->con = $connection;
    $select_all_user_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$user'");
    $this->user = mysqli_fetch_array($select_all_user_query);
}

public function gettingUsername() {
    return $this->user['username'];
}

public function getFullName() {
    $username = $this->user['username'];
    $full_name_query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$username'");
    $user_row = mysqli_fetch_array($full_name_query);
    return $user_row['first_name'][0] ." ". $user_row['last_name'][0];
}

public function getPfpName() {
    $username = $this->user['username'];
    $full_name_query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$username'");
    $user_row = mysqli_fetch_array($full_name_query);
    return $user_row['first_name'] ." ". $user_row['last_name'];
}

public function didUserDeleteAccount() {
    $username = $this->user['username'];
    $deleted_query = mysqli_query($this->con, "SELECT user_deleted FROM users WHERE username='$username'");
    $row = mysqli_fetch_array($deleted_query);
    
    if($row['user_deleted'] == 'yes') {
        return true;
    }
    else {
        return false;
    }
}
}
?>
<?php session_start();?>
<?php include "db.php";?>
<?php include "../functions.php" ?>
<?php

  if(filter_has_var(INPUT_POST,'user_login')){
    $username      = escapse(clean($_POST['username']));
    $user_password = escapse(clean($_POST['user_password']));

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){

      $db_user_id          = ($row['user_id']);
      $db_username         = ($row['username']);
      $db_user_password    = ($row['user_password']);
      $db_user_firstname   = ($row['user_firstname']);
      $db_user_lastname    = ($row['user_lastname']);
      $db_user_role        = ($row['user_role']);

    }

   if(password_verify($user_password,$db_user_password)){
      if($db_user_role === 'admin'){
        $_SESSION['username']  = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname']  = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../admin/admin_index.php");
      }
      else {
        echo "<h4 class='text-danger'>Not a admin. If approved you will receive an email shortly.</h4>";
      }
    }
    else{
      header("Location: ../index.php");
    }
  }
?>

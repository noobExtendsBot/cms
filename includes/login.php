<?php include "db.php";?>
<?php session_start();?>
<?php
  if(isset($_POST['user_login'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    $username = mysqli_real_escape_string($connection, $username);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $query .= "AND user_password = '{$user_password}'";
    $result = mysqli_query($connection, $query);
    if(!$result){
      die("QUERY FAILED".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)){
      $db_user_id = $row['user_id'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];
      $db_user_firstname = $row['user_firstname'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_role = $row['user_role'];
    }
   if($username === $db_username && $user_password === $db_user_password){
          $_SESSION['username']=$db_username;
          $_SESSION['firstname']=$db_user_firstname;
          $_SESSION['lastname']=$db_user_lastname;
          $_SESSION['user_role']=$db_user_role;
          header("Location: ../admin/admin_index.php");
    }
    else{
      header("Location: ../index.php");
    }
  }
?>

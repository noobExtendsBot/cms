<?php

  if(isset($_POST['update_user'])){
    $user_id        =  escapse($_GET['u_id']);
    $username       =  escapse($_POST['username']);
    $user_firstname =  escapse($_POST['user_firstname']);
    $user_lastname  =  escapse($_POST['user_lastname']);
    $user_role      =  escapse($_POST['user_role']);
    $user_email     =  escapse($_POST['user_email']);
    $user_password  =  escapse($_POST['user_password']);

    $query = "SELECT user_password FROM users WHERE user_id = {$user_id}";
    $result = mysqli_query($connection,$query);

    if(!$result){
      die("QUERY FAILED".mysqli_error($connection));
    }

    $row = mysqli_fetch_array($result);
    $db_password = escapse($row['user_password']);

    //check if the password was changed
    if($user_password !== $db_password){
       $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
    }

    $query = "UPDATE users SET username = '$username', user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', user_role = '$user_role', user_email = '$user_email', ";
    $query .= "user_password = '$user_password' WHERE user_id = $user_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    header("Location: users.php");
  }

?>

<?php
  //EDIT A USER FROM ADMIN SECTION; FETCH INFO FOR THAT USER

  if($_SESSION['user_role'] === 'admin') {
      if(isset($_GET['u_id'])) {
          $user_id = escapse($_GET['u_id']);
          $query = "SELECT * FROM users WHERE user_id = $user_id";
          $result = mysqli_query($connection,$query);
          confirmQuery($result);
          if(mysqli_num_rows($result) == 0){
            header("Location: ../admin/users.php");
          }
          while($row = mysqli_fetch_assoc($result)){
              $username = $row['username'];
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
              $user_role = $row['user_role'];
              $user_email = $row['user_email'];
              $user_password = $row['user_password'];
          }
      }
      else {
          header("Location: ../admin/users.php");
      }
  }
  else {
      header("Location: ../admin/users.php");
  }
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
    <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="title">Last Name</label>
    <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="role">User Role</label>
    <select name="user_role" id="role" class="form-control">
      <option value='<?php echo $user_role?>'><?php echo ucfirst($user_role); ?></option>
      <?php
          if($user_role !== 'admin' ){
            echo "<option value='admin'>Admin</option>";
          }
          else {
            echo "<option value='subscriber'>Subscriber</option>";
          }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input value="<?php echo $username; ?>" type="text" name="username" id="username" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input value="<?php echo $user_password?>" type="password" name="user_password" id="password" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input value="<?php echo $user_email; ?>" type="email" name="user_email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" value="Update User" name="update_user" class="btn btn-primary">
  </div>
</form>

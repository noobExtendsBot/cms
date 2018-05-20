<?php
  //ADD A NEW USER FROM ADMIN SECTION
  if(isset($_POST['create_user'])){
      $username        = escapse($_POST['username']);
      $user_firstname  = escapse($_POST['user_firstname']);
      $user_lastname   = escapse($_POST['user_lastname']);
      $user_password   = escapse($_POST['user_password']);
      $user_email      = escapse($_POST['user_email']);
      $user_role       = escapse($_POST['user_role']);

      $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
      $query  = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) ";
      $query .= "VALUES('$username','$user_password','$user_firstname','$user_lastname','$user_email','$user_role')";
      $add_post_result = mysqli_query($connection, $query);
      confirmQuery($add_post_result);
      echo "<h3 class='text-success'>User Added</h3>"." <a class='btn btn-primary' href='../admin/users.php'>View All Users</a>";
  }
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" name="user_firstname" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" name="user_lastname" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="role">User Role</label>
    <select name="user_role" id="role" class="form-control">
      <option value="subscriber">Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="user_password" id="password" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="user_email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" value="Add User" name="create_user" class="btn btn-primary">
  </div>
</form>

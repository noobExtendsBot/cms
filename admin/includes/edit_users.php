<?php
  //EDIT A USER FROM ADMIN SECTION
  if(isset($_GET['u_id'])){
      $user_id = $_GET['u_id'];
      $query = "SELECT * FROM users WHERE user_id = $user_id";
      $result = mysqli_query($connection,$query);
      confirmQuery($result);
      while($row = mysqli_fetch_assoc($result)){
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
      }
  }
?>
<?php
  if(isset($_POST['update_user'])){
    $user_id = $_GET['u_id'];
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $query = "UPDATE users SET username = '$username', user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', user_role = '$user_role', user_email = '$user_email', ";
    $query .= "user_password = '$user_password' WHERE user_id = $user_id";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    header("Location: users.php");
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
      <option value="subscriber">Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
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
  <!-- <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" name="post_image">
  </div> -->
  <div class="form-group">
    <label for="email">Email</label>
    <input value="<?php echo $user_email; ?>" type="email" name="user_email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" value="Update User" name="update_user" class="btn btn-primary">
  </div>
</form>

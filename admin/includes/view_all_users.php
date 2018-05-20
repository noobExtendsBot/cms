<div>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Upgrade To Admin</th>
        <th>Make Subscriber</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $query = "SELECT * FROM users";
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
            ?>
            <tr>
            <td> <?php echo $user_id; ?></td>
            <td> <?php echo $username; ?></td>
            <td> <?php echo $user_firstname; ?></td>
            <td> <?php echo $user_lastname; ?></td>
            <td> <?php echo $user_email; ?></td>
            <td> <?php echo $user_role; ?></td>
            <td> <a href="users.php?ugadmin=<?php echo $user_id ?>">Upgrade To Admin</a></td>
            <td> <a href="users.php?subs=<?php echo $user_id ?>">Make Subscriber</a></td>
            <form action="" method="post">
                 <input type="hidden" name="user_id" value='<?php echo $user_id; ?>'>
                 <?php echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger'></td>"; ?>
            </form>
            <td> <a href="users.php?source=edit&u_id=<?php echo $user_id ?>">Edit</a></td>
          </tr>
        <?php  }?>
    </tbody>
  </table>
</div>

<?php

  //UPGRADE USER TO ADMIN
  if(isset($_GET['ugadmin'])) {
    if(isset($_SESSION['user_role'])) {
      if($_SESSION['user_role'] === 'admin') {
        $user_id = escapse($_GET['ugadmin']);
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        header("Location: users.php");
      }
    }
  }
  //DOWNGRADE USER TO SUBSCRIBER
  if(isset($_GET['subs'])) {
    if(isset($_SESSION['user_role'])) {
      if($_SESSION['user_role'] === 'admin') {
        $user_id = escapse($_GET['subs']);
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        header("Location: users.php");
      }
    }
  }

  //DELETE USER FROM ADMIN AREA
  if(isset($_POST['delete'])) {
    if(isset($_SESSION['user_role'])) {
      if($_SESSION['user_role'] === 'admin') {
        $user_id  = $_POST['user_id'];
        $query    = "DELETE FROM users WHERE user_id = ?";
        $stmt     = mysqli_stmt_init($connection);
        if(mysqli_stmt_prepare($stmt, $query)) {
          mysqli_stmt_bind_param($stmt, "i", $user_id);
          if(mysqli_stmt_execute($stmt)) {
            header("Location: users.php");
          }
        }
      }
    }
  }
?>

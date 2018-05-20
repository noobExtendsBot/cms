<?php
  function clean($string) {
    $string = trim($string);
    return htmlentities($string);
  }

  function escapse($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
  }
?>

<?php
function confirmQuery($result){
  global $connection;
  if(!$result){
    die("Query Could Not be completed".mysqli_error($connection));
  }
}
?>
<?php
function insert_table(){

  global $connection;
  if(!$connection){
    die("Could Not connect to database".mysqli_error());
  }
  $query  = "SELECT * FROM categories";
  $result = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($result)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
  ?>
    <tr>
      <td><?php echo $cat_id; ?> </td>
      <td><?php echo $cat_title; ?></td>
      <td><a href="admin_categories?delete=<?php echo $cat_id; ?>" class="btn btn-danger">Delete</a></td>
      <td><a class="btn btn-primary" href="admin_categories?edit=<?php echo $cat_id; ?>">Edit</a></td>
    </tr>
  <?php }
    if(isset($_GET['delete'])){
      $cat_id = $_GET['delete'];
      $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
      $result = mysqli_query($connection, $query);
      header("Location: admin_categories.php");

    }
}

function checkUsername($value) {
  global $connection;
  $id = '';
  $query = "SELECT user_id FROM users WHERE username = ?";
  $stmt = mysqli_stmt_init($connection);
  if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, "s", $value);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);
    if(empty($id)){
      return 1;
    }
    else{
      return 0;
    }
  }
}
function checkEmail($value) {

  global $connection;
  $email = '';
  $query = "SELECT user_id FROM users WHERE user_email = ?";
  $stmt = mysqli_stmt_init($connection);
  if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, "s", $value);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $email);
    mysqli_stmt_fetch($stmt);
    if(empty($email)){
      return 1;
    }
    else{
      return 0;
    }
  }

}

function register($username,$password,$email) {
  global $connection;
  $user_role = "subscriber";
  $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

  $query    = "INSERT INTO users(username, user_password, user_email,user_role)";
  $query   .= "VALUES( ?, ?, ?, ?)";
  $stmt     = mysqli_stmt_init($connection);
  if(mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, "ssss",$username, $password, $email, $user_role);
    if(mysqli_stmt_execute($stmt)) {
      mysqli_stmt_close($stmt);
      return 1;
    }
  }
}

function e($string) {
  return htmlspecialchars($string,ENT_QUOTES,"UTF-8");
}
?>

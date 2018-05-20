<?php
  function escapse($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
  }
?>

<?php
function users_online(){
  global $connection;
  $session = session_id();
  $time = time();
  $time_out_in_seconds = 60;
  $time_out = $time - $time_out_in_seconds;

  $query = "SELECT * FROM users_online WHERE session='$session'";
  $result = mysqli_query($connection,$query);
  $count = mysqli_num_rows($result);

  if($count == NULL) {
    mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");
  }
  else {
    mysqli_query($connection,"UPDATE users_online SET time='$time' WHERE session='$session'");
  }
  $users_online_result = mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'");
  return mysqli_num_rows($users_online_result);
}

function confirmQuery($result){
  global $connection;
  if(!$result){
    die("Query Could Not be completed".mysqli_error($connection));
  }
}

function insert_table(){

  global $connection;
  if(!$connection){
    die("Could Not connect to database".mysqli_error());
  }
  $query = "SELECT * FROM categories";
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
function recordCount($tableName) {
  global $connection;
  $query = "SELECT * FROM ".$tableName;
  $result = mysqli_query($connection,$query);
  return mysqli_num_rows($result);
}
/* checkStatus takes care of chart in admin section for categores, userRole, post, draft post and all */
function checkStatus($tableName,$columnName,$condition) {
  global $connection;
  $query = "SELECT * FROM {$tableName} WHERE {$columnName} = '{$condition}'";
  $result = mysqli_query($connection,$query);
  return mysqli_num_rows($result);
}

?>

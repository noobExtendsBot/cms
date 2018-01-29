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
?>

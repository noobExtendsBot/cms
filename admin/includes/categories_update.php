<?php
  if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
      $cat_title = $row['cat_title'];
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title">Edit Category</label>
            <input value="<?php echo $cat_title; ?>" type="text" name="cat_update" class="form-control" placeholder="Enter Category">
        </div>
        <div class="form-group">
          <input type="submit" name="update_submit" value="Update Category" class="btn btn-primary form-control">
      </div>
    </form>
    <?php }
  }
?>
<?php
  if(isset($_POST['update_submit'])){
    $cat_title = $_POST['cat_update'];
    if(empty($cat_title)){
      echo "<h4 class='text-danger'>Fill the form</h4>";
    }
    else{
      $query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = $cat_id";
      $result = mysqli_query($connection, $query);
      if(!$result){
        die("Query Failed".mysqli_error($connection));
      }
      header("Location: admin_categories.php");
    }
  }

?>

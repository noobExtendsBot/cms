<?php
  if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $value) {

      $bulk_options = $_POST['bulk_options'];

      switch($bulk_options){
        case 'published':
          $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $value";
          $publish_result = mysqli_query($connection,$query);
          confirmQuery($publish_result);
          break;
        case 'draft':
          $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $value";
          $draft_result = mysqli_query($connection,$query);
          confirmQuery($draft_result);
          break;
        case 'delete':
          $query = "DELETE FROM posts WHERE post_id = $value";
          $delete_result = mysqli_query($connection,$query);
          confirmQuery($delete_result);
          break;
      }
    }
  }

?>

<form action="" method="post">
  <table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class="col-xs-4">
      <div class="form-group">
        <select class="form-control" name="bulk_options" id="">
          <option value="">Select Options</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
        </select>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href='admin_post.php?source=add_posts'>Add New</a>
      </div>
    </div>
    <thead>
      <tr>
        <th><input type="checkbox" id="selectAllBoxes"></th>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $query = "SELECT * FROM posts";
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tag = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            ?>
            <tr>
            <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value='<?php echo $post_id;?>'></td>
            <td> <?php echo $post_id; ?></td>
            <td> <?php echo $post_author; ?></td>
            <td> <?php echo $post_title; ?></td>
            <td> <?php
                    $query_cat = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                    $result_cat = mysqli_query($connection,$query_cat);
                    while($row = mysqli_fetch_array($result_cat)){
                      echo $row['cat_title'];
                    }
             ?></td>
            <td> <?php echo $post_status; ?></td>
            <td> <img width="100" src='<?php echo "../images/$post_image" ; ?>' alt="image"></td>
            <td> <?php echo $post_tag; ?></td>
            <td> <?php echo $post_comment_count; ?></td>
            <td> <?php echo $post_date; ?></td>
            <td>  <a href="../post.php?p_id=<?php echo $post_id ?>">View Post</a></td>
            <td> <a href="admin_post.php?source=edit&p_id=<?php echo $post_id?>">Edit</a></td>
            <td> <a href="admin_post.php?delete=<?php echo $post_id?>">Delete</a></td>
          </tr>
        <?php  } ?>
    </tbody>
  </table>
</form>

<?php
  //DELETE POST FROM ADMIN AREA
  if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id={$post_id}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    header("Location: admin_post.php");

  }
?>

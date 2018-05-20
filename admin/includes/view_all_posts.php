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
        case 'clone':
          $query = "SELECT * FROM posts WHERE post_id = {$value}";
          $result = mysqli_query($connection,$query);
          confirmQuery($result);
          while($row = mysqli_fetch_array($result)){
            $post_title         = escapse($row['post_title']);
            $post_category_id   = escapse($row['post_category_id']);
            $post_date          = escapse($row['post_date']);
            $post_author        = escapse($row['post_author']);
            $post_status        = escapse($row['post_status']);
            $post_image         = escapse($row['post_image']);
            $post_tags          = escapse($row['post_tags']);
            $post_content       = escapse($row['post_content']);
          }
          $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";

      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}')";
                $copy_query = mysqli_query($connection, $query);
                confirmQuery($copy_query);
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
          <option value="clone">Clone</option>
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
        <th>Total Views</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $query  = "SELECT posts.post_id, posts.post_author, posts.post_title, posts.post_date, posts.post_image,";
          $query .=" posts.post_content, posts.post_tags, posts.post_comment_count, posts.post_status, posts.post_views_count, ";
          $query .="categories.cat_title ";
          $query .="FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id";
          $result = mysqli_query($connection, $query);
          confirmQuery($result);
          while($row = mysqli_fetch_assoc($result)){
            $post_id            = $row['post_id'];
            $post_author        = $row['post_author'];
            $post_title         = $row['post_title'];
            $post_date          = $row['post_date'];
            $post_image         = $row['post_image'];
            $post_content       = $row['post_content'];
            $post_tag           = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status        = $row['post_status'];
            $post_views_count   = $row['post_views_count'];
            $cat_title          = $row['cat_title'];
            ?>
            <tr>
            <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value='<?php echo $post_id;?>'></td>
            <td> <?php echo $post_id; ?></td>
            <td> <?php echo $post_author; ?></td>
            <td> <?php echo $post_title; ?></td>
            <td> <?php echo $cat_title;?></td>
            <td> <?php echo $post_status; ?></td>
            <td> <img width="100" src='<?php echo "../images/$post_image" ; ?>' alt="image"></td>
            <td> <?php echo $post_tag; ?></td>
            <td> <?php $res = mysqli_query($connection,"SELECT * FROM comments WHERE comment_post_id = $post_id");
                       $comment_count = mysqli_num_rows($res);?>
                       <a href="show_comment.php?p_id=<?php echo $post_id?>"><?php echo $comment_count;?></a>
                     </td>
            <td> <?php echo $post_date; ?></td>
            <td>  <a href="../post.php?p_id=<?php echo $post_id ?>">View Post</a></td>
            <td>  <a href="admin_post.php?reset=<?php echo $post_id;?>"><?php echo $post_views_count; ?></a></td>
            <td>  <a class="btn btn-info" href="admin_post.php?source=edit&p_id=<?php echo $post_id?>">Edit</a></td>
            <form action="" method="post">
              <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
              <?php echo "<td><input type='submit' class='btn btn-danger' value='Delete' name='delete'></td>"?>
            </form>
          </tr>
        <?php  } ?>
    </tbody>
  </table>
</form>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm Delete Modal</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete it?</p>
      </div>
      <div class="modal-footer">
        <a h type="button" class="btn btn-danger modal-del-link">Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
  //DELETE POST FROM ADMIN AREA
  if(isset($_POST['delete'])){
    $post_id = ($_POST['post_id']);
    $stmt = mysqli_stmt_init($connection);
    $query = "DELETE FROM posts WHERE post_id = ?";
    if(mysqli_stmt_prepare($stmt, $query)) {
      mysqli_stmt_bind_param($stmt, "i", $post_id);
      if(mysqli_stmt_execute($stmt)) {
          header("Location: admin_post.php");
      }
    }
  }
?>
<?php
  //RESET views feature
  if(isset($_GET['reset'])){
    $post_id = escapse($_GET['reset']);
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$post_id}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    header("Location: admin_post.php");
  }

?>
<script>
  let lists = document.querySelectorAll('.delete-post');
  lists = Array.from(lists);
  lists.forEach(function(list){
    list.addEventListener('click', delPost);
  });

  function delPost(e){
    let id = e.target.attributes[0].value;
    let link = "admin_post.php?delete="+id+" ";
    console.log(link);
    let modal = document.querySelector('.modal-del-link');
    modal.setAttribute('href', link);
    console.log(modal);
    e.preventDefault();
  }
</script>

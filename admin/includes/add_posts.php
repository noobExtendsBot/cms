<?php
  //ADD A NEW POST FROM ADMIN SECTION
  if(isset($_POST['create_post'])){
    if(isset($_FILES['post_image'])){
      $post_title       = escapse($_POST['post_title']);
      $post_author      = escapse($_POST['post_author']);
      $post_category_id = escapse($_POST['post_category_id']);
      $post_status      = escapse($_POST['post_status']);

      $post_tags      = escapse($_POST['post_tags']);
      $post_content   = escapse($_POST['post_content']);
      $post_date      = date('d-m-y');
      $post_image     = $_FILES['post_image']['name'];
      $post_image_tmp = $_FILES['post_image']['tmp_name'];

      if(move_uploaded_file($post_image_tmp,"../images/".$post_image));

      $query = "INSERT INTO posts(post_category_id, post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";

      $query .= "VALUES($post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";

      $add_post_result = mysqli_query($connection, $query);
      confirmQuery($add_post_result);
      $the_post_id = mysqli_insert_id($connection);
      echo "<p class='bg-success'>Post Uploaded. <a href='../post.php?p_id={$the_post_id}'>View Post </a>";

    }
  }
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="post_title" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="category">Post Category</label>
    <select name="post_category_id" id="category" class="form-control">
      <?php
             $query = "SELECT * FROM categories ";
             $select_categories = mysqli_query($connection,$query);

             confirmQuery($select_categories);

             while($row = mysqli_fetch_assoc($select_categories )) {
             $cat_id = $row['cat_id'];
             $cat_title = $row['cat_title'];
             echo "<option value='{$cat_id}'>{$cat_title}</option>";
             }
     ?>
    </select>
  </div>
  <div class="form-group">
    <label for="author">Post Author</label>
    <select name="post_author" id='author' class="form-control">
      <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        while($row = mysqli_fetch_assoc($result)){
          $username = $row['username'];
          echo "<option value='{$username}'>{$username}</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="status">Post Status</label>
    <select name="post_status" id="status" class="form-control">
      <option value="draft">Draft</option>
      <option value="published">Publish</option>
    </select>
  </div>
  <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" name="post_image">
  </div>
  <div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" name="post_tags" id="tags" class="form-control">
  </div>
  <div class="form-group">
           <label for="post_content">Post Content</label>
           <textarea  class="form-control "name="post_content" id="" cols="30" rows="10">
           </textarea>
        </div>
  <div class="form-group">
    <input type="submit" value="Publish" name="create_post" class="btn btn-primary">
  </div>
</form>

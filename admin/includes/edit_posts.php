<?php

    if(isset($_GET['p_id'])){
      $the_post_id =  escapse($_GET['p_id']);
    }

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
    $select_posts_by_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id            = escapse($row['post_id']);
        $post_author        = escapse($row['post_author']);
        $post_title         = escapse($row['post_title']);
        $post_category_id   = escapse($row['post_category_id']);
        $post_status        = escapse($row['post_status']);
        $post_image         = escapse($row['post_image']);
        $post_content       = escapse($row['post_content']);
        $post_tags          = escapse($row['post_tags']);
        $post_comment_count = escapse($row['post_comment_count']);
        $post_date          = escapse($row['post_date']);
    }


    if(isset($_POST['update_post'])) {

        $post_author         =  escapse($_POST['post_author']);
        $post_title          =  escapse($_POST['post_title']);
        $post_category_id    =  escapse($_POST['post_category']);
        $post_status         =  escapse($_POST['post_status']);
        $post_image          =  escapse($_FILES['image']['name']);
        $post_image_temp     =  escapse($_FILES['image']['tmp_name']);
        $post_content        =  escapse($_POST['post_content']);
        $post_tags           =  escapse($_POST['post_tags']);

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($select_image)) {
           $post_image = $row['post_image'];
        }
}
          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_category_id = '{$post_category_id}', ";
          $query .="post_date   =  now(), ";
          $query .="post_author = '{$post_author}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";

        $update_post = mysqli_query($connection,$query);
        confirmQuery($update_post);
        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
       <label for="title">Post Title</label>
        <input value="<?php echo (($post_title)); ?>"  type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
       <label for="categories">Categories</label>
       <select name="post_category" id="categories" class="form-control">
          <?php

              $query = "SELECT * FROM categories ";
              $select_categories = mysqli_query($connection,$query);

              confirmQuery($select_categories);

              while($row = mysqli_fetch_assoc($select_categories )) {
              $cat_id = $row['cat_id'];
              $cat_title = $row['cat_title'];

              if($cat_id == $post_category_id) {
                echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
              }
              else {
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
              }
            }
          ?>
       </select>

    </div>
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <select name="post_author" id="post_author" class="form-control">
          <option value="<?php echo $post_author?>"><?php echo $post_author; ?></option>
          <?php
            $query = "SELECT * FROM users";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            while($row = mysqli_fetch_assoc($result)) {
              $username = $row['username'];
              if($username!=$post_author) {
                echo "<option value='{$username}'>{$username}</option>";
              }
            }
          ?>
        </select>
      </div>
     <div class="form-group">
       <label for="status">Post Status</label>
        <select name="post_status" id="status">
            <option class="form-control" value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
            <?php
              if($post_status == 'draft'){
                echo "<option class='form-control' value='published'>Publish</option>";
              }else{
                echo "<option class='form-control' value='draft'>Draft</option>";
              }
            ?>
        </select>
      </div>

    <div class="form-group">
       <img width="150" src="../images/<?php echo $post_image; ?>" alt="">
    </div>
    <div class="form-group">
       <input  type="file" name="image">
    </div>

    <div class="form-group">
       <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>"  type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
             <label for="post_content">Post Content</label>
             <textarea  class="form-control "name="post_content" id="" cols="30" rows="10"><?php echo str_replace('\r\n','<br >',$post_content); ?>
             </textarea>
          </div>
     <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>

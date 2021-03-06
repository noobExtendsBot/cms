<?php
  include "includes/header.php";
  include "includes/db.php";
 ?>
 <?php include "functions.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- First Blog Post -->
                <?php
                if(isset($_GET['p_id'])){
                  $post_id   = escapse(clean($_GET['p_id']));
                  $query     = "SELECT * FROM posts WHERE post_id = {$post_id}";
                  $result    = mysqli_query($connection,$query);
                  if(mysqli_num_rows($result) == 0){
                    header("Location: index.php");
                  }
                  else {
                    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = {$post_id}";
                    $view_result = mysqli_query($connection,$view_query);

                    while($row = mysqli_fetch_array($result)){
                      $post_title   = e($row['post_title']);
                      $post_author  = e($row['post_author']);
                      $post_date    = $row['post_date'];
                      $post_image   = $row['post_image'];
                      $post_content = $row['post_content'];
                    ?>
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="authors.php?p_auth=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p>
                    <?php echo $post_content; ?></p>

                    <hr>
                  <?php
                      }
                    }
                  }
                else {
                  header("Location: index.php");
                }



                 ?>


                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php
                    if(isset($_POST['create_comment'])){
                      $post_id          = escapse(clean($_GET['p_id']));
                      $comment_author   = escapse(clean($_POST['comment_author']));
                      $comment_email    = escapse(clean($_POST['comment_email']));
                      $comment_content  = escapse(clean($_POST['comment_content']));

                      if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                        $query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                        $query.="VALUES ($post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";
                        $result=mysqli_query($connection,$query);
                        confirmQuery($result);

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= "WHERE post_id = $post_id";
                        $result = mysqli_query($connection, $query);
                        confirmQuery($result);
                      }
                      else{
                        echo "<script>alert('Fields can not be empty')</script>";
                      }

                    }
                  ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                          <label for="author">Author</label>
                          <input id="author" type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    //$post_id = $_GET['p_id'];
                    $query ="SELECT * FROM comments WHERE comment_post_id = $post_id ";
                    $query .="AND comment_status = 'approved' ";
                    $query .="ORDER BY comment_id DESC";
                    $result = mysqli_query($connection,$query);
                    confirmQuery($result);
                    while($row = mysqli_fetch_assoc($result)){
                      $comment_content   = $row['comment_content'];
                      $comment_date      = $row['comment_date'];
                      $comment_author    = $row['comment_author'];
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <!-- Comment -->
              <?php } ?>
            </div>
            <!-- Blog Sidebar Widgets Colum/includes/db.phpn -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
<?php include "includes/footer.php"; ?>

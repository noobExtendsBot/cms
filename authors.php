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
                if(isset($_GET['p_auth'])){
                  $post_author = $_GET['p_auth'];
                  $query = "SELECT * FROM posts WHERE post_author = '{$post_author}'";
                  $result = mysqli_query($connection,$query);
                  if(!$result){
                    die("QUERY FAILED".mysqli_error($connection));
                  }
                  while($row = mysqli_fetch_assoc($result)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                  ?>
                  <h2>
                      <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="#"><?php echo $post_author; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                  <hr>
                  <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                  <hr>
                  <p>
                  <?php echo $post_content; ?></p>

                  <hr>
                <?php }} ?>
            </div>

            <!-- Blog Sidebar Widgets Colum/includes/db.phpn -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>

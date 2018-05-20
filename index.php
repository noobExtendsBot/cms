<?php
  include "includes/header.php";
  include "includes/db.php";
  include "functions.php";
 ?>


    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- First Blog Post -->
                <?php
                  if(isset($_GET['page'])) {

                    $page = $_GET['page'];

                  }
                  else {
                    $page = "";
                  }
                  if($page == '' || $page == 1) {
                    $page_1 = 0;
                  }
                  else {
                    $page_1 = ($page * 5) - 5;
                  }

                  $query          = "SELECT COUNT(*) FROM posts";
                  $result         = mysqli_query($connection,$query);
                  $row            = mysqli_fetch_array($result);
                  $count          = $row['COUNT(*)'];
                  $count          = (int)$count / 5;
                  $query          = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, 5";
                  $result         = mysqli_query($connection,$query);
                  if(mysqli_num_rows($result) === 0){
                    echo "<h1 class='text-center text-danger'>No Posts Here</h1>";
                  }
                  else{
                    while($row = mysqli_fetch_assoc($result)){
                      $post_id      = e($row['post_id']);
                      $post_title   = e($row['post_title']);
                      $post_author  = e($row['post_author']);
                      $post_date    = ($row['post_date']);
                      $post_image   = ($row['post_image']);
                      $post_content = (substr($row['post_content'],0,100));
                    ?>
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                      <span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?>
                      / <a href="authors.php?p_auth=<?php echo $post_author; ?>"><?php echo ucfirst($post_author); ?></a>
                    </p>
                    <hr>
                    <a href='post.php?p_id=<?php echo $post_id;?>'><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                    <hr>
                    <p>
                    <?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href='post.php?p_id=<?php echo $post_id;?>'>Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                  <?php }} ?>
            </div>

            <!-- Blog Sidebar Widgets Colum/includes/db.phpn -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
          <?php
              for($i=1;$i<=$count;$i++){
                if($i == $page){
                  echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                }
                else {
                  echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }

              }
          ?>
        </ul>
<?php include "includes/footer.php"; ?>

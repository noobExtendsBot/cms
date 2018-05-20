<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List of all comments for specific post.
                        </h1>
                          <div>
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>

                                  <th>ID</th>
                                  <th>Author</th>
                                  <th>Comment</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>In response to</th>
                                  <th>Date</th>
                                  <th>Approve</th>
                                  <th>Unapprove</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if(isset($_GET['p_id'])) {
                                    $post_id = $_GET['p_id'];
                                    $post_id = mysqli_real_escape_string($connection,$post_id);
                                    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
                                    $result = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($result)){
                                      $comment_id = $row['comment_id'];
                                      $comment_author = $row['comment_author'];
                                      $comment_post_id = $row['comment_post_id'];
                                      $comment_date = $row['comment_date'];
                                      $comment_email = $row['comment_email'];
                                      $comment_status = $row['comment_status'];
                                      $comment_content = $row['comment_content'];
                                    ?>
                                      <tr>
                                      <td> <?php echo $comment_id; ?></td>
                                      <td> <?php echo $comment_author; ?></td>
                                      <td> <?php echo $comment_content; ?></td>
                                      <td> <?php echo $comment_email; ?></td>
                                      <td> <?php echo $comment_status; ?></td>
                                      <?php $query_post="SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                                            $result_post=mysqli_query($connection,$query_post);
                                            confirmQuery($result_post);
                                            while($row=mysqli_fetch_array($result_post)){
                                              $post_name=$row['post_title'];
                                              $post_id=$row['post_id'];
                                              echo "<td><a href='../post.php?p_id=$post_id'>$post_name</a></td>";
                                            }
                                      ?>
                                      <td> <?php echo $comment_date; ?></td>
                                      <td> <a href="show_comment.php?approve=<?php echo $comment_id?>&p_id=<?php echo $post_id?>">Approve</a></td>
                                      <td> <a href="show_comment.php?unapprove=<?php echo $comment_id?>&p_id=<?php echo $post_id?>">Unapprove</a></td>
                                      <td> <a href="show_comment.php?delete=<?php echo $comment_id?>&p_id=<?php echo $post_id?>">Delete</a></td>
                                    </tr>

                                  <?php }} else { header("Location: comments.php"); }?>
                              </tbody>
                            </table>
                          </div>
                          </div>
                          </div>
                          <!-- /.row -->

                          </div>
                          <!-- /.container-fluid -->

                          </div>
                          <!-- /#page-wrapper -->

                          </div>
                          <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>

<?php

  //APPROVE COMMENT STATUS
  if(isset($_GET['approve'])){
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
    $approve_result = mysqli_query($connection,$query);
    confirmQuery($approve_result);


    header("Location: show_comment.php?p_id=".$_GET['p_id']);
  }
  //UNAPPROVE COMMENT STATUS
  if(isset($_GET['unapprove'])){
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
    $unapprove_result = mysqli_query($connection,$query);
    confirmQuery($unapprove_result);

    header("Location: show_comment.php?p_id=".$_GET['p_id']);
  }

  //DELETE COMMENT FROM ADMIN AREA AND DECREMENT THE COMMENT COUNT
  if(isset($_GET['delete'])){
    $comment_id = $_GET['delete'];
    //decrement the comment count
    $comment_post_id_query = "SELECT * FROM comments WHERE comment_id = {$comment_id}";
    $result = mysqli_query($connection, $comment_post_id_query);
    confirmQuery($result);



    $query = "DELETE FROM comments WHERE comment_id =  {$comment_id}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    header("Location: show_comment.php?p_id=".$_GET['p_id']);

  }
?>

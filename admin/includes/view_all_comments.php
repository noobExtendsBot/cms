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
          $query = "SELECT * FROM comments";
          $result = mysqli_query($connection, $query);

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
            <!-- <td> <?php// echo $post_name; ?></td> -->
            <td> <?php echo $comment_date; ?></td>
            <td> <a href="comments.php?approve=<?php echo $comment_id?>">Approve</a></td>
            <td> <a href="comments.php?unapprove=<?php echo $comment_id?>">Unapprove</a></td>
            <td> <a href="comments.php?delete=<?php echo $comment_id?>">Delete</a></td>
          </tr>
        <?php  } ?>
    </tbody>
  </table>
</div>

<?php

  //APPROVE COMMENT STATUS
  if(isset($_GET['approve'])){
    if(isset($_SESSION['user_role'])){
      if($_SESSION['user_role'] === 'admin'){
        $comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
        $approve_result = mysqli_query($connection,$query);
        confirmQuery($approve_result);
        header("Location: comments.php");
      }
    }
  }

  //UNAPPROVE COMMENT STATUS
  if(isset($_GET['unapprove'])){
    if(isset($_SESSION['user_role'])){
      if($_SESSION['user_role'] === 'admin'){
        $comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
        $unapprove_result = mysqli_query($connection,$query);
        confirmQuery($unapprove_result);
        header("Location: comments.php");
      }
    }
  }

  //DELETE COMMENT FROM ADMIN AREA AND DECREMENT THE COMMENT COUNT
  if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
      if($_SESSION['user_role'] === 'admin'){
        $comment_id = $_GET['delete'];
        $comment_post_id_query = "SELECT * FROM comments WHERE comment_id = {$comment_id}";
        $result = mysqli_query($connection, $comment_post_id_query);
        confirmQuery($result);
        $comment_post_id = mysqli_fetch_object($result)->comment_post_id;
        $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
        $query .= "WHERE post_id = $comment_post_id";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        $query = "DELETE FROM comments WHERE comment_id =  {$comment_id}";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        header("Location: comments.php");
      }
    }
  }
?>

<div class="col-md-4">

    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
          <div class="input-group">
              <input name="search" type="text" class="form-control">
              <span class="input-group-btn">
                  <button class="btn btn-default" name="submit" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Blog Login Well -->

    <div class="well">
        <?php
          if(isset($_SESSION['username'])) { ?>
            <h4>Welcome <?php echo " ".ucfirst($_SESSION['user_role'])." ".ucwords($_SESSION['username']); ?></h4>
            <a href="admin/admin_index.php" class="btn btn-primary">Admin Section</a>
            <a href="includes/logout.php" class="btn btn-warning">Logout</a>
        <?php } else { ?>
          <h4>Login</h4>
          <form action="includes/login.php" method="post">
            <div class="form-group">
                <input placeholder="Username" name="username" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Password" name="user_password" type="password" class="form-control" required>
            </div>
            <input type="submit" name="user_login" value="Login" class="btn btn-primary btn-block">
          </form>
        <?php } ?>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <?php
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    ?>
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                      $cat_id = $row['cat_id'];
                      echo '<li><a href="category.php?cat_id='.$cat_id.'">'.ucfirst(strtolower($row['cat_title'])).'</a></li>';
                    }
                  ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php";?>
</div>

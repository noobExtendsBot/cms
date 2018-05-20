<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">WSBLOG</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
          $pageName = basename($_SERVER['PHP_SELF'],".php");

          $homeClass = '';
          $contactClass = '';
          $registerClass = '';
          $home = 'index';
          $contact = 'contact';
          $register = 'registration';
          if($pageName == $home) {
            $homeClass = 'active';
          }else if($pageName == $contact) {
            $contactClass = 'active';
          }else if($pageName == $register) {
            $registerClass = 'active';
          }
        ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="<?php echo $homeClass?>">
                  <a href="index">Home</a>
              </li>
                <li>
                    <a href="admin/admin_index">Admin</a>
                </li>
                <?php
                  if(isset($_SESSION['username'])) {
                    //echo "<li><a href='#'>Some Link</a></li>";
                    if(isset($_GET['p_id'])) {
                      echo "<li><a href='./admin/admin_post.php?source=edit&p_id={$_GET['p_id']}'>Edit Post</a></li>";
                    }
                  }
                ?>
                <li class="<?php echo $contactClass?>">
                  <a href="contact">Contact Us</a>
                </li>
                <li class="<?php echo $registerClass?>">
                  <a href="registration"><i class="fa fa-user" style="margin-right: 5px;"></i>Register</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

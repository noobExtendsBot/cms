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
                            Welcome Admin
                            <small><?php echo ucfirst($_SESSION['username']);?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

         <!-- /.row -->

                <div class="row">
                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-file-text fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                          <?php
                              $count_post = "SELECT * FROM posts";
                              $count_res = mysqli_query($connection,$count_post);
                              $posts_count = mysqli_num_rows($count_res);
                          ?>
                           <div class='huge'><?php echo $posts_count;?></div>
                                 <div>Posts</div>
                             </div>
                         </div>
                     </div>
                     <a href="admin_post.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>
                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-green">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-comments fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                   $count_post = "SELECT * FROM comments";
                                   $count_res = mysqli_query($connection,$count_post);
                                   $comments_count = mysqli_num_rows($count_res);
                               ?>
                              <div class='huge'><?php echo $comments_count;?></div>
                               <div>Comments</div>
                             </div>
                         </div>
                     </div>
                     <a href="comments.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>
                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-yellow">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-user fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                   $count_post = "SELECT * FROM users";
                                   $count_res = mysqli_query($connection,$count_post);
                                   $users_count = mysqli_num_rows($count_res);
                               ?>
                             <div class='huge'><?php echo $users_count;?></div>
                                 <div> Users</div>
                             </div>
                         </div>
                     </div>
                     <a href="users.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>
                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-red">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-list fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                   $count_post = "SELECT * FROM categories";
                                   $count_res = mysqli_query($connection,$count_post);
                                   $categories_count = mysqli_num_rows($count_res);
                               ?>
                                 <div class='huge'><?php echo $categories_count;?></div>
                                  <div>Categories</div>
                             </div>
                         </div>
                     </div>
                     <a href="admin_categories.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>
                </div>
         <!-- /.row -->
                <?php
                    $query_comment = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $count_comment = mysqli_query($connection,$query_comment);
                    $comments_unapproved_count = mysqli_num_rows($count_comment);

                    $query_posts = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $count_posts = mysqli_query($connection,$query_posts);
                    $posts_draft_count = mysqli_num_rows($count_posts);

                    $query_users = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $count_subs = mysqli_query($connection,$query_users);
                    $users_subscriber_count = mysqli_num_rows($count_subs);

                ?>
                <div class="row">
                  <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],
                        <?php
                          // $element_text = ['Active Posts','Categories','Users','Comments'];
                          // $element_data = [$posts_count,$categories_count,$users_count,$comments_count];
                          // for($i=0;$i<4;$i++){
                          //   echo "['{$element_text[$i]}'".","."{$element_data[$i]}],";
                          // }
                          $elements = ['Active Posts'=>$posts_count-$posts_draft_count,'Draft Posts'=>$posts_draft_count,'Approved Comments'=>$comments_count-$comments_unapproved_count,'Unapproved Comments'=>$comments_unapproved_count,'Admin Users'=>$users_count-$users_subscriber_count,'Subscribers '=>$users_subscriber_count,'Categories'=>$categories_count];
                          foreach ($elements as $key => $value) {
                            echo "['$key'".","."$value],";
                          }
                        ?>
                      ]);
                      var options = {
                        chart: {
                          title: 'Blog Statistics',
                          subtitle: '',
                        }
                      };

                      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                      chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>
                  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>

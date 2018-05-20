<?php include "includes/admin_header.php"; ?>
<?php //include_once "../functions.php"; ?>
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
                        <div class="col-xs-6">
                          <?php
                            if(isset($_POST['submit'])){
                              $cat_title = $_POST['cat_title'];
                              if(!empty($cat_title)){
                                $query = "INSERT INTO categories(cat_title)
                                VALUES ('$cat_title')";
                                $result = mysqli_query($connection, $query);
                                if(!$result){
                                  die("Could Not Complete the query".mysqli_error($connection));
                                }
                                else{
                                  echo "<h4 class='text-success'>Category Added</h4>";
                                }
                             }
                             else{
                               echo "<h4 class='text-danger'>Do not leave the field blank</h4>";
                             }

                            }
                          ?>
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add Category</label>
                              <input type="text" name="cat_title" class="form-control" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                              <input type="submit" name="submit" value="Add Category" class="btn btn-primary form-control">
                            </div>
                          </form>
                          <hr>
                          <?php if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/categories_update.php";
                          }
                          ?>
                        </div>
                        <div class="col-xs-6">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Category ID</th>
                                <th>Category Title</th>
                              </tr>
                            </thead>
                            <tbody>
                          <?php //include "../functions.php";
                                insert_table();
                          ?>
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

<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php  include "functions.php"; ?>


    <!-- Navigation -->

    <?php  include "includes/navigation.php"; ?>
    <?php

      if(filter_has_var(INPUT_POST,'submit')){
        if(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
          $username = $_POST['username'];
          $email    = $_POST['email'];
          $message  = $_POST['message'];

          if(!empty($username) && !empty($email) && !empty($message)){
            $to    = "nazishakhtar51@gmail.com";
            }

            $message = "<h4 class='text-center bg-success text-success'>Your query has been submitted.</h4>";
          }
        }

      else {
        $message = '';
      }
    ?>


    <!-- Page Content -->
<div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">

                <div class="form-wrap">
                <h1>Contact Us</h1>
                <?php echo $message; ?>
                    <form role="form" action="contact.php" method="post" id="contact-form" autocomplete="off">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="username" id="name" class="form-control" placeholder="Name" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea placeholder="Please place your message inside here" name="message" id="message" rows="10" class="form-control"></textarea>
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Subit Query">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

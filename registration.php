<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php  include "functions.php"; ?>

    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?>
    <?php
      if(filter_has_var(INPUT_POST,'submit')){
          if(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
            $username = clean($_POST['username']);
            $email    = clean($_POST['email']);
            $password = clean($_POST['password']);
            $error    = [
                'username' => "",
                'email'    => "",
                'password'  => ""
            ];
            if(strlen($username) < 5){
              $error['username'] = 'Username can not be small than 4 characters';
            }
            if($username == ''){
              $error['username'] = 'Username can not be empty';
            }
            if(!checkUsername($username)) {
              $error['username'] = 'Username is already taken';
            }
            if($email == ''){
              $error['email'] = 'Email can not be empty';
            }
            if(!checkEmail($email)) {
              $error['email'] = 'Email is already taken';
            }
            if(strlen($password) < 8){
              $error['password'] = 'Password should be at least 8 characters long';
            }
            if($password == ''){
              $error['password'] = 'Password can not be empty';
            }

            foreach ($error as $key => $value) {
              if(empty($value)) {
                unset($error[$key]);
              }
            }

            if(empty($error)) {
              if(register($username,$password,$email)) {
                $message = '<h4 style="padding:5px" class="text-success bg-success">Your registration has been submitted, you will receive conformation mail shortly.</h4>';
              }
            }

         }
        }
    ?>


    <!-- Page Content -->
<div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">

                <div class="form-wrap">
                <h1>Register</h1>
                      <?php if(!empty($message)){ echo $message;} ?>
                    <form role="form" action="registration.php" method="post" id="login-form">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" autocomplete="on" value="<?php  echo isset($username) ? $username: '' ;?>" class="form-control" min="5" max="20" placeholder="Username" required>
                            <p class="text-danger"><?php echo isset($error['username']) ? $error['username']: '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" autocomplete="on" value="<?php  echo isset($email) ? $email: '' ;?>" class="form-control" placeholder="somebody@example.com" required>
                            <p class="text-danger"><?php echo isset($error['email']) ? $error['email']: '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" min="8" max="32" placeholder="Password" required>
                            <p class="text-danger"><?php echo isset($error['password']) ? $error['password']: '' ?></p>
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<hr>
<?php include "includes/footer.php";?>

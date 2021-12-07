<?php 
session_start();
include 'loginCode.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.0.2/aos.css" integrity="sha512-ksbpl5EUb4HLEKUNItsPMT/Ih6KcISE53GbYOu3xFUVYvTSSX5AJxTI2aigdQm9uNSkSsRMHsSGNKppkt691lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <script src="vendor/js/all.min.js"></script>
    <title>Law Society of Azerbaijan</title>
</head>
<body>
<div class="container" data-aos="fade-up" data-aos-duration="550">
    <div class="row justify-content-center">
        <div class="col-lg-4">
          <h1 class="text-center text-dark mt-5 mb-4">Sign in to Account</h1>
           <?php if (count($errors) > 0): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php foreach($errors as $error): ?> 
                <li style="color: red"><?php echo $error; ?></li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
          <div class="w-100 shadow trans card">
           
            <form method="POST" action="login.php">
              <div class=" form-group mt-4 mr-4 ml-4">
                <label for="Username">Email address</label>
                <input type="text" class="form-control" name="email" value="<?= $email ?? '' ?>" required>
              </div>

              <div class=" form-group mr-4 ml-4">
              <div class="input-group" id="show_password">
                    <input type="password" class="form-control"  name="password" value="<?= $password ?? '' ?>" required aria-label="password" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                    </div>
                </div>
              </div>

              <div class="form-group mr-4 ml-4">
                <input type="submit" class="btn btn-success login w-100 mt-2 mb-3" name="submit" value="Sign in">
              </div>
            </form>
          </div>
          <div class="trans card w-100 mt-3 shadow">
            <p class="text-center mt-2">New here?  <a href="register.php">Create an account.</a></p>
          </div>
        </div>
    </div>
  </div>


    <script src="vendor/js/jquery-3.5.1.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.0.2/aos.js" integrity="sha512-678bHRnILWQudsPcjDbSoYtwimEk8yPq7BBWeJaFoSHPf7Ob7N7au8M49yY9Wbpmmi0PvDzf3Rca1mbmYQLAxQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  AOS.init();
</script>
    <script>
        $(document).ready(function() {
            $("#show_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_password input').attr("type") == "text"){
                    $('#show_password input').attr('type', 'password');
                    $('#show_password i').addClass( "fa-eye-slash" );
                    $('#show_password i').removeClass( "fa-eye" );
                }else if($('#show_password input').attr("type") == "password"){
                    $('#show_password input').attr('type', 'text');
                    $('#show_password i').removeClass( "fa-eye-slash" );
                    $('#show_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
</body>
</html>
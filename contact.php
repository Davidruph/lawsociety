<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'dbconn.php';

$errors = array();
$success = array();

$errorss = array();
$successs = array();

//if submit button is clicked and inputs are not empty
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $mail = new PHPMailer(true);

  try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;            
    $mail->Host = 'ssl://smtp.gmail.com:465';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = 'lawsocietyaze@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'L2021society'; // Gmail address Password
    $mail->Port = 465; //587
    $mail->SMTPSecure = 'ssl'; //tls
    $mail->addAddress('lawsocietyaze@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->setFrom('lawsocietyaze@gmail.com', 'Updates/Offers'); // Gmail address which you used as SMTP server
    //$mail->debug = 2;
    $mail->isHTML(true);
    $mail->Subject = 'Message Received From (Law Society of Azerbaijan)';
    $mail->Body = "
        <br>
        Name: $name
        <br>
        Email: $email
        <br>
        Message: $message
        <br>";
    $mail->AltBody = '';

    if ($mail->Send()) 
        $success['data'] = 'your message has been sent successfully';
    else
         $errors['mail'] = 'Email Not sent';
    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}


//if suscribe button is clicked
if (isset($_POST['suscribe'])) {
    $suscriber_email = $_POST['suscriber_email'];
    $postingdate = date("Y-m-d H:i:s", time());

    $sql = 'INSERT INTO suscribers(email, PostingDate) VALUES(:email, :postingdate)';
  $statement = $connection->prepare($sql);

  if ($statement->execute([':email' => $suscriber_email, ':postingdate' => $postingdate])) {
    $successs['data'] = 'Suscribed successfully';
  }else{
    $errorss['data'] = 'Ooops, an error occured';
  }
}

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
        <title>Law Society of Azerbaijan</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/css/style.css">
    
</head>
<body>

<section class="wrapper">

<div class="container-fluid" data-aos="fade-right" data-aos-duration="500">
    <nav class="navbar navbar-expand-lg navbar-light text-white bg-transparent">
    <a class="navbar-brand" href="index.php">
    <img src="img/loqo.main.png" alt="logo" class="img-fluid header__pic">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link mr-1 text-white font-weight-bold dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Home
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="aboutus.php">About us</a>
                    <a class="dropdown-item" href="partners.php">Partners</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-1 text-white font-weight-bold" href="anouncements.php">Announcements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-1 text-white font-weight-bold" href="event.php">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link mr-1 text-white font-weight-bold dropdown-toggle" href="publication.php" id="navbarDropdow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Publications
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdow">
                    <a class="dropdown-item" href="#">Policy Brief</a>
                    <a class="dropdown-item" href="#">Reports</a>
                    <a class="dropdown-item" href="#">Opinions</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-1 text-white font-weight-bold" href="blog.php">Blog</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link mr-1 text-white font-weight-bold dropdown-toggle" href="projects.php" id="navbarDropdo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Projects
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdo">
                    <a class="dropdown-item" href="#">Ongoing</a>
                    <a class="dropdown-item" href="#">Implemented</a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link mb-2 text-white font-weight-bold" href="contact.php">Contact</a>
            </li>
           

        </ul>
       <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link btn btn-danger btn-lg text-white" href="contact.php">Make an Appointment</a>
            </li>
       </ul>
    </div>
    </nav>
    <br>
    <br>

    <div class="text-left">
        <h1 class="text-white font-weight-bold ml-5 mt-5 page-title">Contact Us</h1>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8"></div>
        <div class="col-lg-3">
            <div class="card mt-5 border-0 text-right">
                <div class="card-body mt-5 mb-5">
                <a href="#" class="mr-3 text-secondary text-decoration-none">About</a>
                <a href="#" class="text-secondary text-decoration-none">Project</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
</section>




<div class="container" data-aos="fade-up" data-aos-duration="500">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-12">
        <section class="map">
            <div class="google__map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1XiRx8unkgBBdafWDegFuUnvAl_SOvT6g" width="100%" height="500px"></iframe>
            </div>
        </section>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="contact_color col-lg-8" data-aos="fade-left" data-aos-duration="500">
            <div class="mt-5">
                <h5 class=" ml-4 frm_text mb-3">CONTACT WITH US</h5>
                <h2 class="ml-4 title_text">SEND MESSAGE</h2>
                        <?php if (count($errors) > 0): ?>
                          <div class="alert alert-danger alert-dismissible fade show ml-4 mr-5" role="alert">
                          <?php foreach($errors as $error): ?> 
                          <li><?php echo $error; ?></li>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            
                          <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if (count($success) > 0): ?>
                          <div class="alert alert-success alert-dismissible fade show ml-4 mr-5" role="alert">
                          <?php foreach($success as $succes): ?> 
                          <li><?php echo $succes; ?></li>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            
                          <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                <form action="contact.php" method="post" class="mt-5">
                    <div class="form-group ml-4 mr-5">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your full name" required>
                    </div>

                    <div class="form-group ml-4 mr-5">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your email address" required>
                    </div>

                    <div class="form-group ml-4 mr-5">
                        <textarea class="form-control" name="message" id="message" placeholder="What you are looking for?" required></textarea>
                    </div>

                    <div class="form-group ml-4 mr-5 mt-4">
                        <input type="submit" class="btn btn-danger btn-lg btn-block" name="submit" value="Submit Now">
                    </div>
                </form>
            </div>
        </div>

        <div class="forum_right col-lg-4" data-aos="fade-right" data-aos-duration="500">
            <div class="mt-5">
                <h5 class="frm_text ml-4 mb-3 text-center">CONTACT INFO</h5>
                <h2 class="ml-4 title_text text-center">Details</h2>

                <h5 class="font-weight-bold p-text text-center">ADDRESS</h5>
                <p class="text-center p-text mt-4 mb-4">487 South Park Avenue United States, America </p>

                <h5 class="font-weight-bold p-text text-center">PHONE</h5>
                <p class="text-center p-text mt-4 mb-4">Local: 0 900 123.456.22 Mobile: 0 900 123.456.22 </p>

                <h5 class="font-weight-bold p-text text-center">EMAIL</h5>
                <p class="text-center p-text mt-4 mb-4">needhelp@puregiven.com <br>inquiry@puregiven.com</p>
                
                <div class="follow mb-5">
                    <h5 class="font-weight-bold p-text text-center">FOLLOW</h5>
                    <div class="row justify-content-center mt-4">
                        <a href="" class="btn btn-outline-danger border mr-2 icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="btn btn-outline-danger border mr-2 icon"><i class="fab fa-twitter"></i></a>
                        <a href="" class="btn btn-outline-danger border mr-2 icon"><i class="fab fa-dribbble"></i></a>
                        <a href="" class="btn btn-outline-danger border icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
                
        </div>
        </div>
    
</div>

<div class="footer" data-aos="fade-down" data-aos-duration="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 mt-5">
                <a class="navbar-brand" href="index.php">
                    <img src="img/loqo.main.png" alt="logo" class="img-fluid header__pic">
                </a>
                <p class="text-white footer-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum delenit augue duis dolore te feugait. <a class="text-decoration-none" href="aboutus.php">Read More &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a> </p>
            </div>

            <div class="col-lg-2 mt-5">
                <h3 class="text-white mb-5 text-justify">Explore</h3>
                <li class="mb-2 text-white text-justify ml-2"><a href="aboutus.php" class="text-white">About Us</a></li>
                <li class="mb-2 text-white text-justify ml-2"><a href="anouncements.php" class="text-white">Announcements</a></li>
                <li class="mb-2 text-white text-justify ml-2"><a href="event.php" class="text-white">Events</a></li>
                <li class="mb-2 text-white text-justify ml-2"><a href="publication.php" class="text-white">Publications</a></li>
                <li class="mb-2 text-white text-justify ml-2"><a href="contact.php" class="text-white">Contact</a></li>
            </div>

            <div class="col-lg-2 mt-5">
                <h3 class="text-white mb-5 text-justify">Activities</h3>
                <li class="mb-2 text-white text-justify"><a href="" class="text-white">Press Releases</a></li>
                <li class="mb-2 text-white text-justify"><a href="" class="text-white">Multimedia</a></li>
                <li class="mb-2 text-white text-justify"><a href="" class="text-white">Blog</a></li>
                <li class="mb-2 text-white text-justify"><a href="" class="text-white">LSA in the Media</a></li>
            </div>

            <div class="col-lg-4 mt-5">
                <h3 class="text-white mb-5 text-justify">Suscribe</h3>
                        <?php if (count($errorss) > 0): ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php foreach($errorss as $errorr): ?> 
                          <li><?php echo $errorr; ?></li>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            
                          <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if (count($successs) > 0): ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php foreach($successs as $succese): ?> 
                          <li><?php echo $succese; ?></li>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            
                          <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                <form action="contact.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="suscriber_email" required placeholder="Your email" aria-label="Recipient's email" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <input type="submit" name="suscribe" class="btn btn-danger" value="suscribe">
                        </div>
                    </div>
                </form>

                <p class="text-justify text-white mt-2 mb-2">Get latest updates and offers.</p>
                <hr class="bg-white">
                <div class="row justify-content-center mt-4 mb-4">
                    <a href="" class="btn btn-default border mr-2 icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="btn btn-default border mr-2 icon"><i class="fab fa-twitter"></i></a>
                    <a href="" class="btn btn-default border mr-2 icon"><i class="fab fa-dribbble"></i></a>
                    <a href="" class="btn btn-default border icon"><i class="fab fa-instagram"></i></a>
                </div>
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

</body>
</html>
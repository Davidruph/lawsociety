<?php
    require 'dbconn.php';
    $errorss = array();
    $successs = array();

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
    <title>Law Society of Azerbaijan</title>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/css/style.css">
    
</head>
<body>

<section class="wrapper">

<div class="container-fluid">
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
        <h1 class="text-white font-weight-bold ml-5 mt-5">Reports</h1>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8"></div>
        <div class="col-lg-3">
            <div class="card mt-5 border-0 text-right">
                <div class="card-body mt-5 mb-5">
                <a href="#" class="mr-3 text-secondary text-decoration-none">Home</a>
                <a href="#" class="text-secondary text-decoration-none">Case Studies</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
</section>


<div class="container mt-2 mb-5">
    <!-- Tabs -->
<section id="tabs">
    <div class="container">
        <h6 class="section-title h1"></h6>
        <div class="row">
            <div class="col-xs-12 ">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link gallery_tabs active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                        <a class="nav-item nav-link gallery_tabs" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Accidental</a>
                        <a class="nav-item nav-link gallery_tabs" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Financial</a>
                        <a class="nav-item nav-link gallery_tabs" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Violence</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <div class="row mb-3">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Nighmare-on-Wall-Street-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Nighmare on Wall Street</a>
                                      </div>
                                    </div>
                               </div>
                               
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Family1-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">FAMILY VIOLENCE</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Privacy-Matter-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">PRIVACY MATTER</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Public-Company-Fraud-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Public Company Fraud</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Giving-Million-Air-Its-Wings-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Giving Million Air Its Wings</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/MaTix-Tax-Invation-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">ACCIDENTAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">MaTix Tax Invation</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <div class="row mb-3">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Nighmare-on-Wall-Street-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Nighmare on Wall Street</a>
                                      </div>
                                    </div>
                               </div>
                               
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Family1-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">FAMILY VIOLENCE</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Privacy-Matter-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">PRIVACY MATTER</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Public-Company-Fraud-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Public Company Fraud</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Giving-Million-Air-Its-Wings-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Giving Million Air Its Wings</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/MaTix-Tax-Invation-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">ACCIDENTAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">MaTix Tax Invation</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row mb-3">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Nighmare-on-Wall-Street-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Nighmare on Wall Street</a>
                                      </div>
                                    </div>
                               </div>
                               
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Family1-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">FAMILY VIOLENCE</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Privacy-Matter-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">PRIVACY MATTER</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Public-Company-Fraud-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Public Company Fraud</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Giving-Million-Air-Its-Wings-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Giving Million Air Its Wings</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/MaTix-Tax-Invation-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">ACCIDENTAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">MaTix Tax Invation</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="row mb-3">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Nighmare-on-Wall-Street-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Nighmare on Wall Street</a>
                                      </div>
                                    </div>
                               </div>
                               
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Family1-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">Violence</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">FAMILY VIOLENCE</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Privacy-Matter-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">PRIVACY MATTER</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Public-Company-Fraud-600x600.jpeg" class="img-1 rounded img-fluid" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Public Company Fraud</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/Giving-Million-Air-Its-Wings-600x600.jpeg" class="img-fluid img-2 rounded" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">FINANCIAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">Giving Million Air Its Wings</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                           <div class="col-lg-4 mb-2 gallery">
                               <img src="img/MaTix-Tax-Invation-600x600.jpeg" class="img-fluid rounded img-3" alt="">
                               <div align="center" class="justify-content-center hide">
                                    <div class="card shadow public_card rounded">
                                      <div class="card-body">
                                        <p class="card-text p-text">ACCIDENTAL</p>
                                        <a href="#" class="stretched-link text-decoration-none card-text gallery_text">MaTix Tax Invation</a>
                                      </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>
<!-- ./Tabs -->
</div>


<div class="footer">
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

</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['email'])) {
        $id = $_SESSION['user'];
        $fullname = $_SESSION['fullname'];
        $role = $_SESSION['role'];
        $email = $_SESSION['email'];
    }

    require 'dbconn.php';
    $conn = mysqli_connect("localhost", "root", "", "narmin34");
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



//code for comments 

if (isset($_POST['leave_comment'])) {
    $post_id = $_POST['post_id'];
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    $comment = $_POST['comment'];
    $postingdate = date("Y-m-d H:i:s", time());

    //check if user is logged in
    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
    else{

    //initialize the session

    $id = $_SESSION['user'];
    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];

    $query = mysqli_query($conn, "SELECT post_id, email FROM tblcomments WHERE email='$email' AND post_id = $post_id");
        if(mysqli_num_rows($query) > 0){
           $errorss['pass'] = "You have already made a comment for this post";
        }else{

            $qry = 'INSERT INTO tblcomments(post_id, name, email, comments, PostingDate) VALUES(:post_id, :name, :email, :comments, :postingdate)';
            $statement = $connection->prepare($qry);
              if ($statement->execute([':post_id' => $post_id, ':name' => $fullname, ':email' => $email, ':comments' => $comment, ':postingdate' => $postingdate])) {
                $successs['data'] = 'Commented successfully';
                header("Location: index.php");

              }else{
                $errorss['data'] = 'Ooops, an error occured';
              }
        }

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

<div class="container-fluid" data-aos="fade-up" data-aos-duration="500">
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
        <h1 class="text-white font-weight-bold ml-5 mt-5">Blog Details</h1>
    </div>

</div>
</section>

<main role="main" class="bg-light" style="">

 <div class="container-fluid" data-aos="fade-left" data-aos-duration="500">
    
    <ol class="breadcrumb mb-4 d-block" style="margin-top: 80px;">
            <li class="breadcrumb-item active">blog Details Page</li>

    </ol>
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

      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
          <div class="col-md-8">

            <?php
                if(isset($_POST['btn_edit'])) {
                  $id = $_POST['edit_id'];
                   
                  $sql = 'SELECT * FROM tblblog WHERE id=:id';
                  $statement = $connection->prepare($sql);
                  $statement->execute([':id' => $id ]);
                  $blogs = $statement->fetchAll(PDO::FETCH_OBJ);

                  
                  foreach ($blogs as $blog) {
                    ?>

                       <div class="card mb-4">
      
                            <div class="card-body">
                              <h2 class="card-title"><b><?php echo $blog->blog_title;?></b></h2>
                              <p><b>Category : </b><?php echo htmlentities($blog->category);?><br>
                                <b> Posted on: </b><?php echo htmlentities($blog->PostingDate);?></p>
                                <b> Author: </b><?php echo htmlentities($blog->author);?></p>
                                <hr />

                                <img class="img-fluid rounded w-100" style="height: 300px;" src="admin/uploads/<?php echo htmlentities($blog->image);?>" alt="<?php echo htmlentities($blog->blog_title);?>">

                                            <p class="card-text"><?php 
                                                    echo $blog->blog_description;
                                            ?></p>
                             
                            </div>
                             <div class="card-footer">
                              <a href="index.php">Back to Homepage</a>
                          </div>
                          </div>
                         

                    <?php
          }
        }
        ?>
          </div>
           <div class="col-md-4">

            <?php
                if (!empty($blogs)) {
                    foreach ($blogs as $blog) {

                         $comment_id = $blog->id;
                          //var_dump($comment_id);

                          $qry = "SELECT * FROM tblcomments WHERE post_id = $comment_id";
                            $statement = $connection->prepare($qry);
                            $statement->execute();
                            $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
                            //var_dump($comments);
                    }

                    ?>
                         <p>
                              <a class="btn btn-outline-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                View comments
                              </a>
                            </p>
                            <div class="collapse mb-5" id="collapseExample">
                              <div class="card card-body">

                                <div class="table-responsive">
                                      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><small>#</small></th>
                                                <th><small>Date</small></th>
                                                <th><small>Name</small></th>
                                                <th><small>Comments</small></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            <?php 
                                            $counter = 0;
                                            foreach($comments as $comment): ?>
                                              <tr>
                                                <td><small>
                                            <p class="card-text"><?php echo ++$counter; ?></p></p>
                                        </small></td>
                                               

                                                <td><small>
                                            <p class="card-text"><?php echo htmlentities($comment['PostingDate']);?></p></p>
                                        </small></td>
                                               
                                                <td>
                                                     <small>
                                            <p class="card-text"><?php echo htmlentities($comment['name']);?></p></p>
                                        </small>
                                                </td>

                                                <td>
                                                   <small>
                                            <p class="card-text "><?php echo htmlentities($comment['comments']);?></p></p>
                                        </small>
                                                </td>
                                              </tr>

                                              <?php endforeach; ?>
                                          </tbody>
                                      </table>
                                  </div>

                                
                                <button onclick="myFunction()" id="comment_button" class="btn btn-outline-primary">add comment</button>
                              </div>
                            </div>

                    <?php
                }
            ?>
           

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
                  <div class="input-group">
               
                    <input type="text" name="searchcriteria" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" name="submit" type="submit">Go!</button>
                    </span>
                  </form>
              </div>
            </div>

          </div>

          <?php
                if(isset($_SESSION['email']) && !empty($blogs)) {
          ?>
          <div class="card mb-4">
            <h5 class="card-header">Leave a comment <?= $fullname ?? '' ?></h5>
            <div class="card-body">
                   <form name="search" action="blogs-details.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $id ?? '' ?>">

                    
                <div class="form-group">
                    <input type="hidden" name="name" class="form-control" value="<?= $fullname ?? '' ?>">
                </div>

                <div class="form-group">
                    <input type="hidden" name="email" class="form-control" value="<?= $email ?? '' ?>">
                </div>

                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control" placeholder="Your comment"></textarea>
                </div>
                <button class="btn btn-secondary" name="leave_comment" type="submit">Go!</button>

                </form>
            </div>

          </div>
                            <?php
                        }else{
                            ?>
                            <?php

                                if (!empty($blogs)) {
                                    ?>

                                        <div class="card mb-4">
                                        <h5 class="card-header">Leave a comment</h5>
                                        <div class="card-body">
                                        <form name="search" action="blogs-details.php" method="post">
                                                <input type="hidden" name="post_id" value="<?= $id ?? '' ?>">

                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your name" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your email" required>
                                        </div>

                                        <div class="form-group" id="comment">
                                            <textarea name="comment" class="form-control" placeholder="Your comment" required></textarea>
                                        </div>
                                        <button class="btn btn-secondary" name="leave_comment" type="submit">Go!</button>

                                        </form>
                                        </div>

                                      </div>

                                    <?php
                                }
                            ?>
                                

                            <?php
                        }

                    ?>
                  
                      
                   
              

      </div>


</div>


</main>


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
                        <input type="email" class="form-control" name="suscriber_email" required placeholder="Your email" aria-label="blogpient's email" aria-describedby="basic-addon2">
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

<script>
    function myFunction() {
     document.getElementById("comment").focus();
}
</script>
</body>
</html>
<?php 

ob_start();
session_start();

include("admin/inc/db.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />

    <title>Blue Chip | Blog Right Sidebar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>

  <body>

      <!-- :::::::::: Header Section Start :::::::: -->

    <header style="background-color:#0E2733;background:url(assets/images/main_menu.jpg);" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md">
                      <a class="navbar-brand" href="index.php"><strong style="color:#fff">HOME</strong></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">

                            <?php

                                $sql = "SELECT * FROM category ORDER BY cat_name ASC";

                                $readcat = mysqli_query($db,$sql);

                                while($row = mysqli_fetch_assoc($readcat)){
                                      $catid     = $row['catId'];
                                      $catname   = $row['cat_name'];
                                      $catdesc   = $row['cat_desc'];
                                      $catstatus = $row['cat_status'];
                                      ?>
                                      <li class="nav-item">
                                        <a class="nav-link" href="category.php?id=<?php echo $catid; ?>"><p style="color:#fff;"><?php echo $catname; ?></p></a>
                                      </li>

                               <?php 

                           }

                                 if(!empty($_SESSION['id'])){ ?>

                                  <li class="nav-item">
                                    <a class="nav-link" href="logout.php" style="color:#fff;">Logout</a>
                                  </li>

                                  <li class="nav-item">
                                    <?php

                                      $sql = "SELECT * FROM subscriber";

                                      $readimg = mysqli_query($db,$sql);

                                      while ($row =mysqli_fetch_assoc($readimg)){
                                        
                                        $subid = $row['sub_id'];
                                        $image = $row['image'];
                                        $name  = $row['name'];

                                        if($subid == $_SESSION['id']){?>

                                          <img src="img/subimage/<?php echo $image;?>" width="35" alt="" style="border-radius:50px;"> <span style="color:#fff;"><strong><?php echo $name; ?></strong></span>
                          <?php        }

                              
                                   }

                                  ?>

                                  </li>

                              <?php  }

                                else{ ?>
                                    

                                 
                                 
                           <?php     }

                                   ?>

                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span style="color:#FFF; border-radius:3px;background: #3D4147;font-weight: 600; padding: 5px;">LogIn/REG</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" data-toggle="modal" data-target="#loginmodal" name="login" id="login" href="#">LogIn </a>
                        
                                      <a class="dropdown-item" data-toggle="modal" data-target="#Registration" href="#">Registration</a>
                                      
                                      
                                    </div>
                                  </li>

                                  <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">User LogIn</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="login.php" method="POST">
                                              <div class="form-group">
                                              <input type="email" name="email" placeholder="Your Email" class="form-input" autocomplete="off" required="required">
                                              <i class="fa fa-user-o"></i>
                                          </div>
                                              <div class="form-group">
                                              <input type="password" name="password" placeholder="Your Password Address" class="form-input" autocomplete="off" required="required">
                                              <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="login" value="Log In">
                                            </div>
                                          </form>
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>

                                    



                                    <div class="modal fade" id="Registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">User Registration</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                         <div class="post-comments">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Register</h4>
                                                <form action="" method="POST" enctype="multipart/form-data" class="text-center">
                                                     <div class="form-group">
                                                    <input type="text" name="name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-user-o"></i>
                                                </div>
                                                 <div class="form-group">
                                                    <input type="email" name="email" placeholder="Your Email" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                 <div class="form-group">
                                                    <input type="password" name="password" placeholder="Your Password" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-user-o"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="number" placeholder="Your Number" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-user-o"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="image"  class="form-control-file" autocomplete="off" required="required">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Register" name="register" >
                                                </div>

                                                </form>


                                    <?php

                                        if(isset($_POST['register'])){
                                            $subId        = $post['id'];
                                            $name         = $_POST['name'];
                                            $email        = $_POST['email'];
                                            $password     = $_POST['password'];
                                            $number       = $_POST['number'];
                                            $hasspass     = sha1($password);

                                            $image        = $_FILES['image']['name'];
                                            $tmpimage     = $_FILES['image']['tmp_name'];

                                            $image = rand(0,5000000)."_".$image;
                                              move_uploaded_file($tmpimage,"img/subimage/".$image);
                                            
                                            $sql = "INSERT INTO subscriber(name,email,password,phone,image,sub_date) VALUES('$name','$email','$hasspass','$number','$image',now()) ";

                                            $subinsert =mysqli_query($db,$sql);

                                            if($subinsert){

                                                header("Location:index.php");
                                            }

                                            else{

                                                die("System Error".mysqli_error($db));
                                            }                                        }
                                    ?>
                                
                            </div>
                            </div>
                        </div>
                                        </div>
                                       
                                      </div>
                                    </div>
                                  </div>

         
                        </ul>
                       
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
    <!-- ::::::::::: Header Section End ::::::::: -->
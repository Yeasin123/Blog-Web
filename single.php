<?php include("inc/header.php");?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">

                    <div class="blog-single">
                        <!-- Blog Title -->

                        <?php

                            if(isset($_GET['id'])){

                               $postid = $_GET['id'];
                            

                            $sql = "SELECT * FROM post WHERE id='$postid'";

                            $readpost = mysqli_query($db,$sql);

                            while($row = mysqli_fetch_assoc($readpost)){

                            $id            = $row['id'];
                            $Title         = $row['title'];
                            $description   = $row['description'];
                            $image         = $row['image'];
                            $catagory      = $row['catagory_id'];
                            $author_id     = $row['author_id'];
                            $status        = $row['status'];
                            $tags          = $row['tags'];
                            $post_date     = $row['post_date'];
                            ?>

                        <a href="#">
                            <h3 class="post-title"><?php echo $Title ;?></h3>
                        </a>

                        <!-- Blog Categories -->
                        <div class="single-categories">

                            <?php

                                $sql = "SELECT * FROM category WHERE catId='$catagory'";
                                $readcat = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($readcat)){
                                    $catId        = $row['catId'];
                                    $cat_name     = $row['cat_name'];
                                    $cat_desc     = $row['cat_desc'];
                                    $cat_status    = $row['cat_status'];
                                    ?>
                                     <span><?php echo $cat_name ;?></span>

                            <?php    }

                            ?>
                           
                            
                        </div>
                        
                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
                            <a href="#">
                                <img src="admin/img/post/<?php echo $image;?>">
                            </a>
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
                        <p><?php echo $description;?></p>

                        <!-- Blog Description End -->
                    <?php 

                      }
                  }

                  ?>

                    </div>


                   
                        
                        <?php

                            if(!empty($_SESSION['email'])){?>

                     <!-- Post New Comment Section Start -->
                     <div class="post-comments">
                          <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                <h4>Post Your Comments</h4>
                                <div class="title-border"></div>
                                <p>Write Your Valuable Comments ..........</p>
                                <!-- Form Start -->
                                <form action="" method="POST" class="contact-form">
                                   

                                    <!-- Right Side Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                         
                                            <!-- Comments Textarea Field -->
                                            <div class="form-group">
                                                <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <!-- Post Comment Button -->
                                            <button type="submit" name="postcmmt" class="btn-main"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                                <!-- Form End -->

                                <?php

                                   if(isset($_POST['postcmmt'])){

                                    $name        = $_SESSION['name'];
                                    $comments    = mysqli_real_escape_string($db,$_POST['comments']);
                                    $postid      = $id;

                                   $sql = "INSERT INTO comments(name,comments,post_id,status,c_date) VALUES('$name','$comments','$postid','0',now()) ";

                                   
                                    $incomt = mysqli_query($db,$sql);

                                    if($incomt){

                                        header("Location:single.php?id=$postid");
                                    }
                                    else{

                                        die("SYStem Error".mysqli_error($db));
                                    }


                                  }

                                ?>
                              
                            </div>
                        </div>
       
                    </div>
                    <!-- Post New Comment Section End -->

                  <?php    }


                  else{ ?>
                    
                    <div class="col-md-12">
                        <div class="alert alert-warning"><a href="#login">Pleace Log In</a></div>
                    </div>

                <?php  }

                        ?>

                      

                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->

                        <?php

                            $sql ="SELECT * FROM comments WHERE post_id='$postid' AND (status='0') ORDER BY c_id DESC";
                            $readcmnt = mysqli_query($db,$sql);
                            $countcmt = mysqli_num_rows($readcmnt);

                        ?>
                        <div class="row"> 
                            <div class="col-md-12">
                                <h4>All Latest Comments (<?php echo $countcmt; ?>)</h4>
                                <div class="title-border"></div>
                                
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        <?php  

                            if($countcmt == 0){

                                echo "<div class='alert alert-warning'>Opps no comments found</div>";
                            }

                            else{ 

                                    while($row = mysqli_fetch_assoc($readcmnt)){

                                         $catid      = $row['c_id'];    
                                         $name       = $row['name'];
                                         $subcriber_id = $row['subcriber_id'];
                                         $reply_id    = $row['reply_id'];
                                         $comments   = $row['comments'];
                                         $status     = $row['status'];
                                         $c_date     = $row['c_date'];
                                         $post_id    = $row['post_id'];
                                         ?>


                     <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                       <?php

                                      $sql = "SELECT * FROM subscriber  ORDER BY sub_id DESC LIMIT 3";

                                      $readimg = mysqli_query($db,$sql);

                                      while ($row =mysqli_fetch_assoc($readimg)){
                                        $id    = $row['sub_id'];
                                        $image = $row['image'];
                                        $name  = $row['name']; 

                                       } ?>



                                            <img src="img/subimage/<?php echo $image;?>" width="35" alt="" style="border-radius:100px;">

                 
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name"><?php echo $name;?></li>
                                            <li class="post-by-hour"><?php echo$c_date;?></li>
                                        </ul>
                                    </div>
                                    <p><?php echo $comments;?></p>

                                    <a href="single.php?id=<?php echo $postid;?>&replyid=<?php echo $catid;?>"><i class="fa fa-comment"> Repley</i></a>
                     <?php

                            if(isset($_GET['replyid'])){ 

                                $replyid = $_GET['replyid'];

                                ?>

                            
                                 <!-- Form Start -->
                                <form action="" method="POST" class="contact-form">
                                   

                                    <!-- Right Side Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                         
                                            <!-- Comments Textarea Field -->
                                            <div class="form-group">
                                                <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <!-- Post Comment Button -->
                                            <button type="submit" name="postcmmt" class="btn-main"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                                <!-- Form End --> 

                         <?php   }

                        ?>


                                </div>


                
                                
                                <!-- Comment Box End -->
                            </div>
                        </div>

                        
                        <!-- Single Comment Post End -->
                 <?php        }


                           }

                        ?>

              
                    </div>
                    <!-- Single Comment Section End -->

                  
             
                </div>




                <!-- Blog Right Sidebar -->
                <?php include("inc/sidebar.php")?>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



 <?php include("inc/footer.php");?>
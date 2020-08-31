<?php include("inc/header.php"); ?>
    <!-- :::::::::: Header Section Start :::::::: -->
    
    <!-- ::::::::::: Header Section End ::::::::: -->

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Category Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Category</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">

                    <?php

                        if(isset($_GET['id'])){

                          $postId = $_GET['id'];

                          $sql = "SELECT * FROM post WHERE catagory_id='$postId' ORDER BY id DESC ";

                          $postSql = mysqli_query($db,$sql);

                          $totallpost = mysqli_num_rows($postSql);

                          if($totallpost == 0){ ?>

                            <div class="alert alert-warning">Opps... there are no post.Check it later</div>

                      <?php    }

                          else{

                            while($row = mysqli_fetch_assoc($postSql)){
                                $id            = $row['id'];
                                $Title         = $row['title'];
                                $image         = $row['image'];
                                $catagory_id      = $row['catagory_id'];
                                $author_id     = $row['author_id'];
                                $status        = $row['status'];
                                $tags          = $row['tags'];
                                $post_date     = $row['post_date'];
                                $description   = $row['description'];

                                ?>
                                <!-- Single Item Blog Post Start -->
                                <div class="blog-post">
                                    <!-- Blog Banner Image -->
                                    <div class="blog-banner">
                                        <a href="single.php">
                                            <img src="admin/img/post/<?php echo $image; ?>">
                                            <!-- Post Category Names -->
                                            <div class="blog-category-name">
                                                
                                                 
                                    <?php

                                        $sql = "SELECT * FROM category WHERE catId='$catagory_id'";

                                        $catsql = mysqli_query($db,$sql);

                                        while($row = mysqli_fetch_assoc($catsql)){

                                            $catid    = $row['catId'];
                                            $cat_name = $row['cat_name'];

                                            ?>
                                            <h6><?php echo $cat_name; ?></h6>
                                       <?php }
                                    ?>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Blog Title and Description -->
                                    <div class="blog-description">
                                        <a href="single.php">
                                            <h3 class="post-title"><?php echo $Title; ?></h3>
                                        </a>
                                        <p><?php echo substr($description,0,200); ?></p>
                                        <!-- Blog Info, Date and Author -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="blog-info">
                                                    <ul>
                                                        <li><i class="fa fa-calendar"></i>7th Nov, 2018</li>
                                                        <li><i class="fa fa-user"></i>by - admin</li>
                                                        <li><i class="fa fa-heart"></i>(50)</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 read-more-btn">
                                                <a href="single.php?id=<?php echo $id ;?>" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <!-- Single Item Blog Post End -->
                        <?php    }
                          }
                        }

                    ?>
                                   
                </div>



                <!-- Blog Right Sidebar -->
                <?php include("inc/sidebar.php");?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    

<?php include("inc/footer.php");?>
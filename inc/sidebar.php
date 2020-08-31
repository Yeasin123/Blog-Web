<div class="col-md-4">

                    <!-- Latest News -->
                    <div class="widget">
                        <h4>Latest News</h4>
                        <div class="title-border"></div>
                         <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">

                        <?php

                                $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 3";
                                $readpost = mysqli_query($db,$sql);

                                while($row = mysqli_fetch_assoc($readpost)){
                                $id            = $row['id'];
                                $Title         = $row['title'];
                                $image         = $row['image'];
                                $catagory      = $row['catagory_id'];
                                $author_id     = $row['author_id'];
                                $status        = $row['status'];
                                $tags          = $row['tags'];
                                $post_date     = $row['post_date'];
                                $description   = $row['description'];

                                ?>

                                   
                        
                            <!-- First Latest News Start -->
                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="#">
                                            <img src="admin/img/post/<?php echo $image; ?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5><?php echo $Title; ?></h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr($description,0,75); ?></p>
                                </div>
                            </div>
                            <!-- First Latest News End -->
                            
                       

                       <?php     }

                            ?>

                             </div>
                        <!-- Sidebar Latest News Slider End -->
                        
                        
                    </div>


                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Blog Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form action="search.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        <div class="title-border"></div>
                        <div class="recent-post">
                            <!-- Recent Post Item Content Start -->

                            <?php

                                $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 5";
                                $readpost = mysqli_query($db,$sql);

                                while($row = mysqli_fetch_assoc($readpost)){
                                $id            = $row['id'];
                                $Title         = $row['title'];
                                $image         = $row['image'];
                                $catagory      = $row['catagory_id'];
                                $author_id     = $row['author_id'];
                                $status        = $row['status'];
                                $tags          = $row['tags'];
                                $post_date     = $row['post_date'];
                                $description   = $row['description'];

                            ?>

                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    
                                    <div class="col-md-4">
                                        <img src="admin/img/post/<?php echo $image ;?>">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5><?php echo $Title ;?></h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date ;?></li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->
                    <?php

                        }

                        ?>


                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>

                                <?php

                                    $sql = " SELECT * FROM category ORDER BY catId DESC";

                                   $readcat = mysqli_query($db,$sql);

                                   while($row = mysqli_fetch_assoc($readcat)){

                                      $catid   = $row['catId'];
                                      $catname = $row['cat_name'];
                                      $catdesc = $row['cat_desc'];
                                      $catstatus = $row['cat_status'];


                                      $count=0;
                                      $query = "SELECT * FROM post WHERE catagory_id='$catid'";
                                      $postcount = mysqli_query($db,$query);

                                        while($row = mysqli_fetch_assoc($postcount)){
                                            $id            = $row['id'];
                                            $Title         = $row['title'];
                                            $image         = $row['image'];
                                            $catagory      = $row['catagory_id'];
                                            $author_id     = $row['author_id'];
                                            $status        = $row['status'];
                                            $tags          = $row['tags'];
                                            $post_date     = $row['post_date'];
                                            $description   = $row['description'];
                                            $count++;
                                        }
                                        

                                      ?>

                                      <li>
                                        <i class="fa fa-check"></i>
                                        <?php echo $catname; ?> 
                                        <span>[<?php echo $count; ?>]</span>
                                     </li>

                               <?php   }

                                ?>
                                <!-- Category Item -->
                                
                                
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>


                    

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">

                       
                            
                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">

                            
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    
                                    <!-- Comments Content -->
                            <?php

                            $query = "SELECT * FROM comments ORDER BY c_id DESC LIMIT 5";
                            $readcms = mysqli_query($db,$query);
                            $totalcmmts = mysqli_num_rows($readcms);

                            if($totalcmmts == 0){ ?>

                                    <div class="alert alert-warning"><strong>No Resent Comments</strong></div>
                           <?php }

                            else{ 
                                
                                while($row = mysqli_fetch_assoc($readcms)){

                                   $commetid   = $row['c_id'];
                                   $name       = $row['name'];
                                   $comments   = mysqli_real_escape_string($db,$row['comments']);
                                   $status     = $row['status'];
                                   $c_date     = $row['c_date'];
                                   $post_id    = $row['post_id'];
                                   

                                   ?>

                                   <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <div class="col-md-8 no-padding">
                                        <h5><?php echo $name ;?></h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"><?php echo $c_date ;?></i>
                                            </li>
                                        </ul>
                                    </div>

                                  <?php      }

                                            }
                                    

                                        ?>

                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

            

                        </div>
                    </div>

   

                    <!-- Meta Tag -->
                    <div class="widget">
                        <h4>Tags</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <?php

                            $sql = "SELECT * FROM post";

                            $readpost = mysqli_query($db,$sql);

                            while($row = mysqli_fetch_array($readpost)){

                                $tags  = $row['tags'];
                                ?>
                       <div class="meta-tags">
                            <span><?php echo $tags ;?></span>
                                     
                        </div>
                        <!-- Meta Tag List End -->

                         <?php   }

                        ?>  

                    </div>

                  

                </div>
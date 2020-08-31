 <?php include("inc/header.php"); ?>
 <?php include("inc/topmenu.php"); ?>
 <?php include("inc/leftmenu.php");
 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dasboard </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

                <?php

                   $do = isset($_GET['do']) ? $_GET['do'] : "Manage";


                  if($do == 'Manage'){ ?>

                    <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="card card-primary card-outline">
                            <div class="card-header ">
                              <h5 class="m-0">All User Post</h5>
                            </div>
                            <div class="card-body">
                             
                    <table id="example" class="table table-bordered table-stripped text-center">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#SL</th>       
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">catagory</th>
                        <th scope="col">Author</th>
                        <th scope="col">Status</th>
                        <th scope="col">Post date</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php

                      $sql = " SELECT * FROM post ORDER BY id DESC ";
                      $allpost = mysqli_query($db,$sql);
                      $i=0;

                      while($row = mysqli_fetch_assoc($allpost)){

                        $id            = $row['id'];
                        $Title         = $row['title'];
                        $image         = $row['image'];
                        $catagory_id      = $row['catagory_id'];
                        $author_id     = $row['author_id'];
                        $status        = $row['status'];
                        $tags          = $row['tags'];
                        $post_date     = $row['post_date'];
                        
                        $i++;
                        ?>
                        <tr>
                        <td scope="row"><?php echo $i;?></td>
                        <td>
                          <?php

                          if(!empty($image)){ ?>

                            <img src="img/post/<?php echo $image;?>"  width="50" alt="">

                         <?php }
                          else{ ?>
                            <img src="img/post/default.jpg"  width="50" alt="">

                        <?php  }

                          ?>
                        </td>
                        <td><?php echo $Title;?></td>
                        <td>
                          
                          <?php

                          $sql = " SELECT * FROM category ORDER BY cat_name ASC";
                          $cat_namecon = mysqli_query($db,$sql);

                          while($row = mysqli_fetch_assoc($cat_namecon)){
                            $cat_id  = $row['catId'];
                            $cat_name =$row['cat_name'];
                            
                            if($catagory_id == $cat_id){

                              echo $cat_name;
                            }                 
                              }
                          ?>

                        </td>
                        <td>
                          
                          <?php

                          $sql = " SELECT * FROM users ";
                          $cat_namecon = mysqli_query($db,$sql);

                          while($row = mysqli_fetch_assoc($cat_namecon)){
                            $userid  = $row['id'];
                            $fullname =$row['fullname'];
                            
                            if($author_id == $userid){

                              echo '<p>'.$fullname.'</p>';
                            }                 
                              }
                          ?>

                        </td>
                        <td>
                          
                          <?php

                            if($status==1){ ?>

                              <span class="badge badge-success">Active</span>

                          <?php  }
                            else{ ?>
                                
                                <span class="badge badge-danger">In-Active</span>                         

                          <?php  }

                          ?>

                        </td>
                        <td><?php echo $post_date;?></td>
                        <td>
                          <div class="action-bar">
                          <ul>
                            <l><a href="post.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></l>
                            <l><a href="" data-toggle="modal" data-target="#delleteid<?php echo $id; ?>"> <i class="fa fa-trash"></i></a></l>
                          </ul>
                         </div>
                        </td>  
                      

                       <div class="modal fade text-center" id="delleteid<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Post!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <ul>
                                        <li><a href="post.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a></li>
                                        <li><button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button></li>
                                    </ul>
                                      
                                  </div>
                                  
                                </div>
                              </div>
                            </div>

               <?php       }

                    ?>

                    </tbody>
                  </table>

               
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>

                <?php

                  }

                   
              else if($do == 'Add'){ ?>

                    <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="card card-primary card-outline">
                            <div class="card-header ">
                              <h5 class="m-0">Add New Post</h5>
                            </div>
                            <div class="card-body">
                               <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                      
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Title</label>
                                      <input type="text" class="form-control" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Choose Category</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="catagory" required="required">
                                              <option >Choose Your Category</option>
                                            <?php

                                              $sql = " SELECT * FROM category ORDER BY cat_name ASC";
                                              $cat_namecon = mysqli_query($db,$sql);

                                              while($row = mysqli_fetch_assoc($cat_namecon)){
                                                $cat_id  = $row['catId'];
                                                $cat_name =$row['cat_name'];
                                                ?>

                                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option> 
                                        <?php     }


                                              ?>
                                              
                                              
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                              <option value="1">Active</option>
                                              <option value="0">In-Active</option> 
                                            </select>
                                          </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Meta tag</label>
                                          <input type="text" class="form-control" name="tag">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Thubnail</label>
                                            <input type="file" class="form-control-file" name="image">
                                          </div>
                                  
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">Description</label>
                                            <textarea name="desc" class="form-control"  rows="10"></textarea>
                                          </div>
                                          
                                          <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-primary btn-flat" value="Publish post">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                             
                            </form>

                            </div>
                          </div>

                      </div>
                    </div>
                  </div>

                     
              <?php

                  }
                

                  else if($do == 'Insert'){
                    
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                      $title        =mysqli_real_escape_string($db,$_POST['title']);
                      $catagory     =$_POST['catagory'];        
                      $tag          =mysqli_real_escape_string($db,$_POST['tag']);
                      $desc         =mysqli_real_escape_string($db,$_POST['desc']);
                      $author_id    = $_SESSION['id'];
                      $status       =$_POST['status'];
                      $image        =$_FILES['image']['name'];
                      $tmp     =$_FILES['image']['tmp_name'];

                      
                      if(!empty($image)){

                        $image = rand(0,500000)."_".$image;

                        move_uploaded_file($tmp, "img/post/".$image);

                        $sql = " INSERT INTO post(title,description,image,catagory_id,author_id,status,tags,post_date) VALUES('$title','$desc','$image','$catagory','$author_id','$status','$tag', now()) ";

                        $addPost = mysqli_query($db,$sql);

                        if($addPost){
                          header("Location:post.php?do=Manage");
                        }
                        else{
                          die("MYsqli Erro".mysqli_error($db));
                        }
                      }


                      }

              }
                    

                  
                  else if($do == 'Edit'){ 

                    $editreadId = $_GET['id'];

                     $sql = " SELECT * FROM post  WHERE id='$editreadId' ";
                      $readsql = mysqli_query($db,$sql);
                    

                      while($row = mysqli_fetch_assoc($readsql)){
                        $Title         = $row['title'];
                        $catagory      = $row['catagory_id'];
                        $author_id     = $row['author_id'];
                        $desc          = $row['description'];
                        $status        = $row['status'];
                        $tags          = $row['tags'];
                        $image         = $row['image'];
                        

                      ?>

                  <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                      <div class="card-header ">
                        <h5 class="m-0">Featured</h5>
                      </div>
                      <div class="card-body">
                         <form action="post.php?do=Update" method="POST" enctype="multipart/form-data">
                
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $Title;?>">
                                  </div>
                                  <div class="form-group">
                                            <label for="exampleFormControlSelect1">Choose Category</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="catagory" required="required">
                                              <option >Choose Your Category</option>
                                            <?php

                                              $sql = " SELECT * FROM category ORDER BY cat_name ASC";
                                              $cat_namecon = mysqli_query($db,$sql);

                                              while($row = mysqli_fetch_assoc($cat_namecon)){
                                                $cat_id  = $row['catId'];
                                                $cat_name =$row['cat_name'];
                                                ?>

                                                <option 

                                                <?php

                                                  if($cat_id ==$catagory ){

                                                    echo "selected";
                                                } ?>

                                                value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option> 
                                        <?php     }


                                              ?>
                                              
                                            </select>
                                          </div>
                                          <div class="form-group">
                                      <label for="exampleFormControlSelect1">User Status</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        <option value="1" <?php if($status == 1){echo "selected";} ?>>Active</option>
                                        <option value="0" <?php if($status == 0){echo "selected";} ?> >In-Active</option> 
                                      </select>
                                    </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Meta tag</label>
                                    <input type="text" class="form-control" name="tags" value="<?php echo $tags; ?>">
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleFormControlInput1">Profile Picture</label>
                                      <input type="file" class="form-control-file" name="image"> 
                                      <?php 

                                        if(!empty($image)){ ?>

                                          <img src="img/post/<?php echo $image?>" width="50" alt="">

                                     <?php   }
                                        else{ ?>

                                          <img src="img/post/default.jpg" alt="">

                                     <?php   }

                                      ?>
                                    </div>
                      
                                  </div>

                                  <div class="col-lg-6">
                                      
                                    <div class="form-group">
                                     <textarea name="desc" class="form-control" rows="10"><?php echo $desc; ?></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                      <input type="hidden" class="form-control" name="updateId" value="<?php echo $editreadId; ?>">
                                      <input type="submit" class="btn btn-primary btn-flat" name="uppost" value="save change">
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                             </form>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>



             <?php       }

                  

                 }

                  else if($do == 'Update'){

                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                      $postid          =$_POST['updateId'];
                      $title           = mysqli_real_escape_string($db,$_POST['title']);
                      $catagory        =$_POST['catagory'];
                      $status          =$_POST['status'];
                      $tags            =mysqli_real_escape_string($db,$_POST['tags']);
                      $desc            =mysqli_real_escape_string($db,$_POST['desc']);
                     

                      $image        =$_FILES['image']['name'];
                      $tmpimage     =$_FILES['image']['tmp_name'];

                      if(!empty($image)){

        
                        $image = rand(0,500000)."_".$image;

                        move_uploaded_file($tmpimage, "img/post/".$image);

                        $imagesql = " SELECT * FROM post WHERE id='$postid'";

                        $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/post/".$imageexit);

                        $sql = "UPDATE post SET title='$title',description='$desc',image='$image',catagory_id='$catagory',status='$status', tags='$tags' WHERE id='$postid' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:post.php?do=Manage");
                        }
                        else{
                          die("error" .mysqli_error($db));
                        }
                      }

                      else if(empty($image)){

                        
                          $sql = "UPDATE post SET title='$title',description='$desc',catagory_id='$catagory',status='$status', tags='$tags' WHERE id='$postid' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:post.php?do=Manage");
                        }
                        else{

                          die("error" .mysqli_error($db));
                        }
                        
                      }

                         
                      else{

                        $sql = "UPDATE post SET title='$title',description='$desc',image='$image',catagory_id='$catagory',status='$status', tags='$tags' WHERE id='$postid' ";


                        $mainupdt = mysqli_query($db,$sql);

                        if($mainupdt){
                          header("Location:post.php?do=Manage");
                        }
                        else{
                          die("error" .mysqli_error($db));
                        }

                      }


                    }

                  }


                  else if($do == 'Delete'){

                    if(isset($_GET['id'])){

                      $delId= $_GET['id'];

                      $imagesql = " SELECT * FROM post WHERE id='$delId'";
                      $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/post/".$imageexit);

                       $sql = " DELETE FROM post WHERE id='$delId' ";

                      $delcon = mysqli_query($db,$sql);

                        if($delcon){

                      header("Location: post.php?do=Manage");
                    }
                    else{
                      die("MYSQLI ERROR" . mysqli_error($db));
                    }

                    }

                  }

                ?>


   </div>

 <?php include("inc/footer.php"); ?>
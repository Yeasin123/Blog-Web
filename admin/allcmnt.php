 <?php include("inc/header.php"); ?>
 <?php include("inc/topmenu.php"); ?>
 <?php include("inc/leftmenu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manages All Comments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

     <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header ">
                <h5 class="m-0">All  Comments</h5>
              </div>
              <div class="card-body">
                
                 <table class="table text-center">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Commet</th>
                    <th scope="col">Post Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Post_date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
               <?php
                  $sql = "SELECT * FROM comments ORDER BY c_id DESC";

                  $readcmt = mysqli_query($db,$sql);

                    $i=0;
                    while($row = mysqli_fetch_assoc($readcmt)){
   
                       $catid      = $row['c_id'];
                       $name       = $row['name'];
                       $comments   = $row['comments'];
                       $status     = $row['status'];
                       $c_date     = $row['c_date'];
                       $post_id    = $row['post_id'];

                       $i++;
                       ?>

                    <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $name; ?></td>
                    <td>
                        <?php

                              $query = "SELECT * FROM subscriber";

                              $readimg = mysqli_query($db,$query);

                              while ($row =mysqli_fetch_assoc($readimg)){
                                
                                $subid = $row['sub_id'];
                                $image = $row['image'];
                                $name  = $row['name'];
                             } 
                                 ?>

                                  <img src="../img/subimage/<?php echo $image;?>" width="35" alt="" style="border-radius:50px;">

                        
                      </td>

                    <td><?php echo $comments; ?></td>

                    <td>
                      <?php 

                        $sqls = "SELECT * FROM post WHERE id='$post_id' ";

                         $reabsub = mysqli_query($db,$sqls);

                         while($row = mysqli_fetch_assoc($reabsub)){

                            $id     = $row['id'];
                            $title  = $row['title'];

                            if($id == $post_id){

                              echo $title;
                            }
                         }
                     ?>
                       
                     </td>

                    <td>
                      <?php 

                        if($status ==2){ ?>
                            
                            <span class="badge badge-danger">Suspended</span>

                       <?php }

                        else if($status ==1){ ?>

                            <span class="badge badge-primary">Approved</span>
                       <?php }
                        if($status == 0){ ?>
                            
                            <span class="badge badge-warning">Pending</span>

                       <?php }

                     ?>
                       
                     </td>

                    <td><?php echo $c_date; ?></td>

                     <td>
                          <div class="action-bar">       
                            
                             <form action="" method="POST">
                                <a class="nav-link dropdown-toggle" style="background:#3D4147" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="color: #FFF;">Action</span>
                              </a>
                              <div class="dropdown-menu" name="sus" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="allcmnt.php?do=sus&susid=<?php echo $catid ?>">Suspended</a>
                                <a class="dropdown-item" href="allcmnt.php?do=apr&aprid=<?php echo $catid ?>">Approved</a>
                                <a class="dropdown-item" href="allcmnt.php?do=pen&penid=<?php echo $catid ?>">Pending</a>
                              </div>
                             </form> 
                          
                         </div>

                    

                        </td>
 
                  </tr>

                  <?php

                    }
                        ?>

                          <?php

                         
                            if(isset($_GET['do']) == "sus"){

                              if(isset($_GET['susid'])){

                                $susid = $_GET['susid'];

                                $susquery = "UPDATE comments SET status=2 WHERE c_id='$susid' ";

                              $suscon = mysqli_query($db,$susquery);

                              if($suscon){

                                header('Location:allcmnt.php');
                              }

                              }
     
                            }

                            if(isset($_GET['do']) == "apr"){

                              if(isset($_GET['aprid'])){

                                $aprid = $_GET['aprid'];

                                $aprquery = "UPDATE comments SET status=1 WHERE c_id='$aprid' ";

                              $aprcon = mysqli_query($db,$aprquery);

                              if($aprcon){

                                header('Location:allcmnt.php');
                              }

                              }
     
                            }

                             if(isset($_GET['do']) == "pen"){

                              if(isset($_GET['penid'])){

                                $penid = $_GET['penid'];

                                $penquery = "UPDATE comments SET status=0 WHERE c_id='$penid' ";

                              $pencon = mysqli_query($db,$penquery);

                              if($pencon){

                                header('Location:allcmnt.php');
                              }

                              }
     
                            }

                      ?>
                 
                </tbody>
              </table>

              </div>
            </div>

        </div>
      </div>
    </div>

      

      

  </div>

         
                
  
              


 <?php include("inc/footer.php"); ?>
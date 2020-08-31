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
            <h1 class="m-0 text-dark">Catagories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">User Profile Information</h5>
              </div>
              <div class="card-body">


                
                <table class="table table-bordered table-stripped table-striped">
                  <tbody> 

                  <?php
                  $uthid = $_SESSION['id'];

                  $sql = " SELECT * FROM users WHERE id='$uthid' ";

                  $userreaad = mysqli_query($db,$sql);
                  

                  while( $row = mysqli_fetch_assoc($userreaad)){
                        $id = $row['id'];
                        $fullname = $row['fullname'];
                        $image = $row['image'];
                        $email = $row['email'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $Phone = $row['phone'];
                        $address = $row['address'];
                        $role = $row['role'];
                        $status = $row['status'];
                        $join_date = $row['join_date'];
                      
                        ?>
                    <tr>
                      <th scope="row">Fullname</th>
                      <td><?php echo $fullname; ?></td>
                    </tr>

                    <tr>
                      <th scope="row">Image</th>
                      <td><?php 

                        if(!empty($image)){ ?>
                          <img src="img/users/<?php echo $image; ?>" alt="" width="50">

                    <?php    }

                       ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Email</th>
                      <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">UserName</th>
                      <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Phone</th>
                      <td><?php echo $Phone; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Address</th>
                      <td><?php echo $address; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Role</th>
                      <td>
                        
                        <?php

                          if($role ==1 ){ ?>
                            <span class="badge badge-primary">Super Admin</span>

                        <?php  }
                          else if($role ==2){ ?>
                            <span class="badge badge-success">Editor</span>

                        <?php  }

                        ?>

                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Status</th>
                      <td>
                         <?php

                          if($status ==1 ){ ?>
                            <span class="badge badge-primary">Active</span>

                        <?php  }
                          else if($status ==0){ ?>
                            <span class="badge badge-success">In-Active</span>

                        <?php  }

                        ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Join_Date</th>
                      <td><?php echo $join_date; ?></td>
                    </tr>

                     <div class="modal fade text-center" id="delid<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Profile!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                     
                                  <a href="userpro.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                    
                                      
                                  </div>
                                  
                                </div>
                              </div>
                            </div>

                    <tr>
                      <td scope="col">
                        <a href="updateUser.php?id=<?php echo $id; ?>" class="btn btn-success btn-succes" >Update</a>
                        <a href="" data-toggle="modal" data-target="#delid<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                      </td>
                      <td scope="col">
                        
                      </td>
                    </tr>

               <?php   }


                ?>
                    
                  </tbody>
                </table>

                <?php 

                  if(isset($_GET['id'])){
                    $delids = $_GET['id'];

                    $sql = " DELETE FROM users WHERE id='$delids' ";

                    $delcon = mysqli_query($db,$sql);
                    if($delcon){

                      header("Location:userpro.php");
                    }
                    
                  }



                ?>
              </div>
            </div>

        </div>
        
      </div>
    </div>

  </div>




 <?php include("inc/footer.php"); ?>
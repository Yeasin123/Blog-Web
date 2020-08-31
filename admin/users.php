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

                 if($_SESSION['role'] == 1){

                   $do = isset($_GET['do']) ? $_GET['do'] : "Manage";


                  if($do == 'Manage'){ ?>

                    <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="card card-primary card-outline">
                            <div class="card-header ">
                              <h5 class="m-0">All User List</h5>
                            </div>
                            <div class="card-body">
                             
                    <table id="example" class="table table-bordered table-stripped text-center">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Image</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php

                      $sql = " SELECT * FROM users ORDER BY id DESC ";
                      $readsql = mysqli_query($db,$sql);
                      $i=0;

                      while($row = mysqli_fetch_assoc($readsql)){

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
                        
                        $i++;
                        ?>
                        <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $fullname;?></td>
                        <td>
                          <?php

                          if(!empty($image)){ ?>

                            <img src="img/users/<?php echo $image;?>"  width="50" alt="">

                         <?php }
                          else{ ?>
                            <img src="img/users/default.jpg"  width="50" alt="">

                        <?php  }

                          ?>
                        </td>
                        
                        <td><?php echo $username;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $Phone;?></td>
                        <td><?php echo $address;?></td>
                        <td>
                          <?php

                            if($role == 1){ ?>
                              <span class="badge badge-primary">Super Admin</span>

                           <?php }
                            else if($role ==2){ ?>
                               <span class="badge badge-success">Editor</span>

                           <?php }

                          ?>
                        </td>
                         <td>
                          <?php

                            if($status == 1){ ?>
                              <span class="badge badge-primary">Active</span>

                           <?php }
                            else{ ?>
                               <span class="badge badge-success">In-Active</span>

                           <?php }

                          ?>
                        </td>
                        <td>
                          <div class="action-bar">
                          <ul>
                            <l><a href="users.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></l>
                            <l><a href="" data-toggle="modal" data-target="#delleteid<?php echo $id; ?>"> <i class="fa fa-trash"></i></a></l>
                          </ul>
                         </div>
                        </td>  
                      </tr> 

                       <div class="modal fade text-center" id="delleteid<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Users!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <ul>
                                        <li><a href="users.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Confirm</a></li>
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
                              <h5 class="m-0">Add New Users</h5>
                            </div>
                            <div class="card-body">
                               <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                      
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Full Name</label>
                                      <input type="text" class="form-control" name="fullname">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">User Name</label>
                                          <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Email</label>
                                          <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Password</label>
                                          <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Re-Password</label>
                                          <input type="password" class="form-control" name="re_password">
                                        </div>
                                  
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="exampleFormControlInput1">Phone</label>
                                            <input type="text" class="form-control" name="phone">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">Address</label>
                                            <input type="text" class="form-control" name="address">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">User Role</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                              <option value="1">Super Admin</option>
                                              <option value="2">Editor</option> 
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">User Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                              <option value="1">Active</option>
                                              <option value="0">In-Active</option> 
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">Profile Picture</label>
                                            <input type="file" class="form-control-file" name="image">
                                          </div>
                                          <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-flat" value="submit">
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

                      $fullname     =$_POST['fullname'];
                      $username     =$_POST['username'];
                      $email        =$_POST['email'];
                      $password     =$_POST['password'];
                      $re_password  =$_POST['re_password'];
                      $phone        =$_POST['phone'];
                      $role         =$_POST['role'];
                      $status       =$_POST['status'];
                      $address      =$_POST['address'];

                      $image        =$_FILES['image']['name'];
                      $tmpimage     =$_FILES['image']['tmp_name'];

                      if($password == $re_password){

                        $hasedpass = sha1($password);

                        $imageran = rand(0,5000000)."_". $image;
                        move_uploaded_file($tmpimage,"img/users/".$imageran);


                         $sql = " INSERT INTO users(fullname,email,username,password,phone,address,role,status,image,join_date) VALUES('$fullname','$email','$username','$hasedpass','$phone','$address','$role','$status','$imageran', now()) ";
                         
                         $insertcon = mysqli_query($db,$sql);

                         if($insertcon){
                        header("Location: users.php?do=Manage");
                      }
                      else{
                        die("error");
                      }

                      }

              
                    }

                  }
                  else if($do == 'Edit'){ 

                    $editreadId = $_GET['id'];

                     $sql = " SELECT * FROM users  WHERE id='$editreadId' ";
                      $readsql = mysqli_query($db,$sql);
                    

                      while($row = mysqli_fetch_assoc($readsql)){

                       
                        $fullname  = $row['fullname'];
                        $image     = $row['image'];
                        $email     = $row['email'];
                        $username  =$row['username'];
                        $password  = $row['password'];
                        $phone     = $row['phone'];
                        $address   = $row['address'];
                        $role      = $row['role'];
                        $status    = $row['status'];

                      ?>

                  <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                      <div class="card-header ">
                        <h5 class="m-0">Update Your Info</h5>
                      </div>
                      <div class="card-body">
                         <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?php echo $fullname;?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">User Name</label>
                                    <input type="text" class="form-control" name="username" disabled value="<?php echo $username?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input type="password" class="form-control" name="password">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Re-Password</label>
                                    <input type="password" class="form-control" name="re_password">
                                  </div>
                            
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                      <label for="exampleFormControlInput1">Phone</label>
                                      <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Address</label>
                                      <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">User Role</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="role">
                                        <option value="1" <?php if($role == 1){echo "selected";} ?>>Super Admin</option>
                                        <option value="2" <?php if ($role == 2){ echo "selected";} ?>>Editor</option> 
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
                                      <label for="exampleFormControlInput1">Profile Picture</label>
                                      <input type="file" class="form-control-file" name="image"> 
                                      <?php 

                                        if(!empty($image)){ ?>

                                          <img src="img/users/<?php echo $image?>" width="50" alt="">

                                     <?php   }
                                        else{ ?>

                                          <img src="img/users/default.jpg" alt="">

                                     <?php   }

                                      ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="hidden" class="form-control" name="updateId" value="<?php echo $editreadId; ?>">
                                      <input type="submit" class="btn btn-primary btn-flat" name="upID" value="save change">
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
                      
                      $updateId     = $_POST['updateId'];
                      $fullname     =$_POST['fullname'];
                      $email        =$_POST['email'];
                      $password     =$_POST['password'];
                      $re_password  =$_POST['re_password'];
                      $phone        =$_POST['phone'];
                      $role         =$_POST['role'];
                      $status       =$_POST['status'];
                      $address      =$_POST['address'];

                      $image        =$_FILES['image']['name'];
                      $tmpimage     =$_FILES['image']['tmp_name'];

                      if(!empty($password) && !empty($image)){

                        if($password == $re_password){
                          $hasedpass = sha1($password);
                        }

                        $image = rand(0,500000)."_".$image;

                        move_uploaded_file($tmpimage, "img/users/".$image);

                        $imagesql = " SELECT * FROM users WHERE id='$updateId'";

                        $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/users/".$imageexit);

                        $sql = "UPDATE users SET fullname='$fullname',email='$email',password='$hasedpass', phone='$phone',role='$role',status='$status',image='$image' WHERE id='$updateId' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:users.php?do=Manage");
                        }
                        else{
                          die("error" .mysqli_error($db));
                        }
                      }

                      else if(!empty($password) && empty($image)){

                        if($password == $re_password){

                          $hasedpass = sha1($password);

                          $sql = "UPDATE users SET fullname='$fullname',email='$email',password='$hasedpass', phone='$phone',role='$role',status='$status' WHERE id='$updateId' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:users.php?do=Manage");
                        }
                        else{

                          die("error" .mysqli_error($db));
                        }


                        }
                      }

                      else if(empty($password) && !empty($image)){

                         $image = rand(0,500000)."_".$image;

                        move_uploaded_file($tmpimage, "img/users/".$image);

                        $imagesql = " SELECT * FROM users WHERE id='$updateId'";

                        $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/users/".$imageexit);

                        $sql = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',role='$role',status='$status',image='$image' WHERE id='$updateId' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:users.php?do=Manage");
                        }

                        else{
                          die("error" .mysqli_error($db));
                        }

                      }

                      else if(empty($image)){

                        $sql = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',role='$role',status='$status' WHERE id='$updateId' ";

                        $mainupdte = mysqli_query($db,$sql);

                        if($mainupdte){
                          header("Location:users.php?do=Manage");
                        }

                        else{
                          die("error" .mysqli_error($db));
                        }

                      }

                      

                      else{

                        $sql = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',role='$role',status='$status',image='$image' WHERE id='$updateId' ";

                        $mainupdt = mysqli_query($db,$sql);

                        if($mainupdt){
                          header("Location:users.php?do=Manage");
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

                      $imagesql = " SELECT * FROM users WHERE id='$delId'";
                      $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/users/".$imageexit);

                       $sql = " DELETE FROM users WHERE id='$delId' ";

                      $delcon = mysqli_query($db,$sql);

                        if($delcon){

                      header("Location: users.php?do=Manage");
                    }
                    else{
                      die("MYSQLI ERROR" . mysqli_error($db));
                    }

                    }

                  }
                 }

                
                ?>


   </div>

 <?php include("inc/footer.php"); ?>
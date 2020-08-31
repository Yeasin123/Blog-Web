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
            <h1 class="m-0 text-dark">User Info</h1>
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
              <div class="card-header ">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                
				<?php
                  
                  if(isset($_GET['id'])){

                  	$editId = $_GET['id'];
                  	$uthid = $_SESSION['id'];

                  $sql = " SELECT * FROM users WHERE id='$editId' ";

                  $userreaad = mysqli_query($db,$sql);
                  

                  while( $row = mysqli_fetch_assoc($userreaad)){
                  	    $id       =$row['id'];
                        $fullname = $row['fullname'];
                        $image    = $row['image'];
                        $email    = $row['email'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $Phone    = $row['phone'];
                        $address  = $row['address'];
                        $role     = $row['role'];
                        $status   = $row['status'];
                        $join_date= $row['join_date'];
                      
                        ?>
        
                       <div class="card-body">
		               <form action="" method="POST" enctype="multipart/form-data">
		      
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
		                            <input type="text" class="form-control" name="phone" value="<?php echo $Phone;?>">
		                          </div>
		                          <div class="form-group">
		                            <label for="exampleFormControlInput1">Address</label>
		                            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
		                          </div>
		                          <div class="form-group">
		                            <label for="exampleFormControlSelect1">User Role</label>
		                            <select class="form-control" id="exampleFormControlSelect1" disabled="" name="role">
		                              <option value="1" <?php if($role == 1){echo "selected";} ?>>Super Admin</option>
		                              <option value="2" <?php if ($role == 2){ echo "selected";} ?>>Editor</option> 
		                            </select>
		                          </div>
		                          <div class="form-group">
		                            <label for="exampleFormControlSelect1">User Status</label>
		                            <select class="form-control" id="exampleFormControlSelect1" disabled="" name="status">
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
		                            <input type="hidden" class="form-control" name="upID" value="<?php echo $id; ?>">
		                            <input type="submit" class="btn btn-primary btn-flat" name="up" value="save change">
		                          </div>
		                        </div>
		                      </div>
		                    </div>
                             
                             </form>
                            </div>
               <?php   }


               		if(isset($_POST['upID'])){

               		  $id           =$_POST['upID'];
                      $fullname     =$_POST['fullname'];
                      $email        =$_POST['email'];
                      $password     =$_POST['password'];
                      $re_password  =$_POST['re_password'];
                      $phone        =$_POST['phone'];
                      $address      =$_POST['address'];
                      $image        =$_FILES['image']['name'];
                      $tmpimage     =$_FILES['image']['tmp_name'];

                      

                        if(!empty($password) && !empty($image)){

                        if($password == $re_password){

                          $hasedpass = sha1($password);
                        }

                        $image = rand(0,500000)."_".$image;

                        move_uploaded_file($tmpimage, "img/users/".$image);

                        $imagesql = " SELECT * FROM users WHERE id='$id'";

                        $imagecon = mysqli_query($db,$imagesql);

                        while($row = mysqli_fetch_assoc($imagecon)){
                          $imageexit = $row['image'];
                        }
                        unlink("img/users/".$imageexit);

                        $sql = "UPDATE users SET fullname='$fullname',email='$email',password='$hasedpass', phone='$phone',address='$address', image='$image' WHERE id='$id' ";

                        $read = mysqli_query($db,$sql);

                        if($read){
                        	header("Location:userpro.php");
                        }
                    
                   }

                   else if(!empty($password) && empty($image)){

                    	if($password == $re_password){

                          $hasedpass = sha1($password);
                        }

                   	$sql = "UPDATE users SET fullname='$fullname',email='$email',password='$hasedpass', phone='$phone',address='$address' WHERE id='$id' ";

                        $read = mysqli_query($db,$sql);

                        if($read){
                        	header("Location:userpro.php");
                        }
                   	
                   }
                   else if(empty($password) && !empty($image)){

                    $image = rand(0,5000000).$image;
                    move_uploaded_file($tmpimage,"img/users/".$image);

                    $query = " SELECT * FROM users WHERE id='$id' ";

                    $img2 = mysqli_query($db,$query);
                    while($row = mysqli_fetch_assoc($img2)){
                    	$readimg = $row['image'];
                    }
                    unlink("img/users/".$readimg);

                   	$sql = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',address='$address',image='$image' WHERE id='$id' ";

                        $read = mysqli_query($db,$sql);

                        if($read){
                        	header("Location:userpro.php");
                        }
                   	
                   }
                   else if(empty($image)){

                   	if($password == $re_password){

                          $hasedpass = sha1($password);
                        }


                        $sql = "UPDATE users SET fullname='$fullname',email='$email',password='$hasedpass', phone='$phone',address='$address' WHERE id='$id' ";

                        $read = mysqli_query($db,$sql);

                        if($read){
                        	header("Location:userpro.php");
                        }
                   }
                   else{

                   	$sql = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',password='$hasedpass',address='$address',image='$image' WHERE id='$id' ";

                   	$read = mysqli_query($db,$sql);

                        if($read){
                        	header("Location:userpro.php");
                        }
                   }

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
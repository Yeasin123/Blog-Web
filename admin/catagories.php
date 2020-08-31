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
            <h1 class="m-0 text-dark">Manages All Category</h1>
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
        <!-- First Collom Start -->
        <div class="col-md-6">
          <!-- card start -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 >ADD Category</h5>
              </div>
              <div class="card-body">
                
                  <form action="catagories.php" method="POST">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name</label>
                    <input type="text" class="form-control" name="catname">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category Description</label>
                    <textarea class="form-control" name="catdesc" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category status</label>
                    <select class="form-control" name="catstatus">
                      <option value="1">Active</option>
                      <option value="0">In-Active</option> 
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="insert" value="submit" class="btn btn-primary">
                  </div>
                </form>

                <?php

                  if(isset($_POST['insert'])){
                    
                    $catname = $_POST['catname'];
                    $catdesc = mysqli_real_escape_string($db,$_POST['catdesc']);
                    $catstatus = $_POST['catstatus'];

                    $sql = " INSERT INTO category(cat_name,cat_desc,cat_status) VALUES('$catname','$catdesc','$catstatus') ";

                    $the_insert = mysqli_query($db,$sql);

                    if($the_insert){

                      header("Location: catagories.php");
                    }
                    else{
                      die("MYSQLI ERROR" . mysqli_error($db));
                    }
                  
                  }

                ?>

              </div>
            </div>

            <?php

              if(isset($_GET['edit'])){

               $upid = $_GET['edit'];

               $sql = " SELECT * FROM category WHERE catid='$upid'  ";

               $upcon = mysqli_query($db,$sql);

               while($row = mysqli_fetch_assoc($upcon)){

                  $catid   = $row['catId'];
                  $catname = $row['cat_name'];
                  $catdesc = $row['cat_desc'];
                  $catstatus = $row['cat_status'];

                  ?>
                  <div class="card">
                    <div class="card-header">
                      <h5 >ADD Category</h5>
                    </div>
                    <div class="card-body">
                      
                        <form action="<?php  $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Category Name</label>
                          <input type="text" class="form-control" name="catname" value="<?php echo $catname; ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Category Description</label>
                          <textarea class="form-control" name="catdesc" rows="3"><?php echo $catdesc; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Category status</label>
                          <select class="form-control" name="catstatus" value="<?php echo $catstatus; ?>">
                            <option value="1" <?php if($catstatus == 1 ){echo "selected" ;} ?>>Active</option>
                            <option value="0" <?php if($catstatus == 0 ){echo "selected" ;} ?>>In-Active</option> 
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="updata" value="save change" class="btn btn-primary">
                        </div>
                      </form>

                    </div>

                   </div>
             <?php }

             if(isset($_POST['updata'])){

                $catname = $_POST['catname'];

                $catdesc = mysqli_real_escape_string($db,$_POST['catdesc']);

                $catstatus = $_POST['catstatus'];



              $sql =" UPDATE  category SET cat_name='$catname',cat_desc='$catdesc',cat_status='$catstatus' WHERE catid='$upid' ";

               $connetdb = mysqli_query($db,$sql);

               if($connetdb){

                      header("Location: catagories.php");
                    }
                    else{
                      die("MYSQLI ERROR" . mysqli_error($db));
                    }

             }

            }

             ?>     
         
        </div>
       
           
            
        
      
        <!-- First Collom End -->

        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-primary card-outline">
                <h5 class="m-0">ADD Category</h5>
              </div>
              <div class="card-body">

                <?php

                  $sql = "SELECT * FROM category ORDER BY cat_name ASC ";

                  $the_read = mysqli_query($db,$sql);

                  $total_read = mysqli_num_rows($the_read);

                   $i=0;

                  if($total_read == 0){
                    echo "No Category Found";
                  }

                  else{
                    ?>
                       <table id="example" class="table table-bordered table-stripped text-center">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Cat Name</th>
                            <th scope="col">Cat Desc</th>
                            <th scope="col">Cat Sta</th>
                            <th scope="col">Cat Act</th>

                          </tr>
                        </thead>
                        <tbody>

                          <?php

                              while($row = mysqli_fetch_assoc($the_read)){

                                $catid   = $row['catId'];
                                $catname = $row['cat_name'];
                                $catdesc = $row['cat_desc'];
                                $catstatus = $row['cat_status'];
                                $i++;
                              
                          ?>
                          <tr>
                            <td scope="row"><?php echo $i; ?></td>
                            <td><?php echo $catname; ?></td>
                            <td><?php echo $catdesc; ?></td>
                            <td><?php if($catstatus == 1){
                              ?>
                              <span class="badge badge-success">Active</span>
                         <?php   }

                                else{
                                  ?>
                                  <span class="badge badge-danger">In-Active</span>
                          <?php      }

                          ?>
                        
                          </td>

                            <td>
                              <div class="action-bar">
                                <ul>
                                  <l><a href="catagories.php?edit=<?php echo $catid; ?>"><i class="fa fa-edit"></i></a></l>
                                  <l><a href="" data-toggle="modal" data-target="#delleteid<?php echo $catid; ?>"> <i class="fa fa-trash"></i></a></l>
                                </ul>
                              </div>
                            </td>
                          </tr>

                            <div class="modal fade text-center" id="delleteid<?php echo $catid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Category!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <ul>
                                        <li><a href="catagories.php?delete=<?php echo $catid; ?>" class="btn btn-danger">Confirm</a></li>
                                        <li><button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button></li>
                                    </ul>
                                      
                                  </div>
                                  
                                </div>
                              </div>
                            </div>

               

                   <?php    }


                       if(isset($_GET['delete'])){
                        $delID=$_GET['delete'];



                        $sql = " DELETE FROM category WHERE catid='$delID' ";

                        $delcon = mysqli_query($db,$sql);

                         if($delcon){

                      header("Location: catagories.php");
                    }
                    else{
                      die("MYSQLI ERROR" . mysqli_error($db));
                    }

                       }

                            ?>
                        </tbody>
                      </table>

             <?php     }

                ?>
                
              </div>
            </div>

            

        </div>

      </div>
    </div>

  </div>




 <?php include("inc/footer.php"); ?>
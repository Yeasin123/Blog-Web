
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          <?php

              $sql = "SELECT * FROM users";
              $result = mysqli_query($db,$sql);

              while($row = mysqli_fetch_assoc($result)){
                $id       = $row['id'];
                $image    = $row['image'];
                $fullname = $row['fullname'];

                if($id == $_SESSION['id']){ ?>

                  <img src="img/users/<?php echo $image ?>" class="img-circle elevation-2" alt="User Image">

            
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname; ?></a>
        </div>
           <?php }
              }

          ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
           
          </li>
          
         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-id-card"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="catagories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage all categories </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-clipboard"></i>
              <p>
                All Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Post </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="post.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Post </p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-comment"></i>
              <p>
                All Comments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="allcmnt.php?do='Add'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Comments </p>
                </a>
              </li>
                
            </ul>
          </li>
          
          <?php 

            if($_SESSION['role'] ==1){ ?>

              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-mail-bulk"></i>
              <p>
                All Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage all Users </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new Users</p>
                </a>
              </li>      
            </ul>
          </li>

            <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link">
              <i class="fas fa-cogs"></i>
              <p>
                Parform Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="settings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="settings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>general Settings </p>
                </a>
              </li>
              
            </ul>
          </li>
        <?php    }

          ?>

          <?php

            if($_SESSION['role'] == 2){ ?>

              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fas fa-users"></i>
              <p>
                User Profile Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="userpro.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Profile </p>
                </a>
              </li>
                
            </ul>
          </li>
          <?php  }

          ?>

          <li class="nav-item">
          <a href="LogOut.php" class="nav-link">
            <i class="fa fa-sign-out"></i>
            <p>Sign Out </p>
          </a>
         </li>
       
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

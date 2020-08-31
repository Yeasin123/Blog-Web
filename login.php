<?php 

ob_start();
session_start();

include("admin/inc/db.php");

?>

<?php

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		$hasspas = sha1($password);

		$sql =" SELECT * FROM subscriber WHERE email='$email' ";

          $user = mysqli_query($db,$sql);

          while($row = mysqli_fetch_array($user)){

              $_SESSION['id']       = $row['sub_id'];
              $_SESSION['name']     = $row['name'];
              $_SESSION['email']    = $row['email'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['phone']    = $row['phone'];
              $_SESSION['sub_date'] = $row['sub_date'];
              $_SESSION['image'] = $row['image'];
            
              if($email == $_SESSION['email'] && $hasspas == $_SESSION['password']){

                  header("Location:index.php");
              }
              else if(empty($email) || empty($password)){
                header("Location:index.php");
              }
              else{
                header("Location:index.php");
              }

          }
        }


?>


 <?php include("admin/inc/footer.php");?>
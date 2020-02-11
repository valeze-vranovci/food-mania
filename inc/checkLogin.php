<?php include'dbconn.php'; ?>
 <?php
    ob_start();

    $inputEmail=$_POST['inputEmail']; 
    $inputPassword=$_POST['inputPassword']; 

    $inputEmail = mysqli_real_escape_string($conn, $_POST['inputEmail']);
    $inputPassword = mysqli_real_escape_string($conn, $_POST['inputPassword']);

   $sql="SELECT * FROM users WHERE inputEmail = '" . $inputEmail . "' AND inputPassword = '" . md5($inputPassword) . "' ";

  $result = mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

  $row = mysqli_fetch_array($result);
    if($count==1){
        session_start();
    //Ruaj te dhena ne session
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['inputEmail'] = $row['inputEmail'];
        $_SESSION['inputPassword'] = $row['inputPassword'];
        header("location:../user_profile.php");
    }
    else {
     echo "Kontrollo te dhenat";
    }
 ?>

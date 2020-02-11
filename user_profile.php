<?php
    include 'user_parts/header.php';
    include 'dbconfig.php';
?>

<?php
if (isset($_SESSION['logged_in'])) {
?>
<div class="container">
      <div class="row">
        <div class="col-md-12 toppad" >
 <?php
}
$userilog=$_SESSION['inputEmail'];
$pdo = Database::connect();
$sql = "SELECT * FROM users where inputEmail='$userilog'";

foreach ($pdo->query($sql) as $row) {
    $user_id = $row['id'];

         echo '<div class="panel panel-info">';
            echo'<div class="panel-heading">';
              echo'<h3 class="panel-title">'. $row['Firstname'] .' </h3>';
            echo'</div>';
            echo'<div class="panel-body">';
              echo'<div class="row">';
                echo'<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>';
                echo'<div class=" col-md-9 col-lg-9 "> '; 
              echo'<table class="table table-user-information">';
                    echo'<tbody>';
                      echo'<tr>';
                        echo'<td>First Name:</td>';
                        echo'<td>'.$row['Firstname'].'</td>';
                      echo'</tr>';
                      echo'<tr>';
                        echo'<td>Last Name</td>';
                        echo'<td>'.$row['Lastname'].'</td>';
                      echo'</tr>';
                      echo'<tr>';
                        echo'<td>Company:</td>';
                        echo'<td>'.$row['Company'].'</td>';
                      echo'</tr>';
                   
                      echo'<tr>';
                        echo'<tr>';
                        echo'<td>Date of Birth:</td>';
                        echo'<td>'.$row['DOB'].'</td>';
                      echo'</tr>';
                        echo'<tr>';
                        echo'<td>Phone Number</td>';
                        echo'<td>+'.$row['PhoneNumber'].'</td>';
                      echo'</tr>';
                      echo'<tr>';
                        echo'<td>Address:</td>';
                        echo'<td>'.$row['Address'].'</td>';
                      echo'</tr>';
                      echo'<tr>';
                        echo'<td>Email</td>';
                        echo'<td><a href="mailto:valeze.vranovci@gmail.com">'.$row['inputEmail'].'</a></td>';
                      echo'</tr>';
                           
                      echo'</tr>';
                     
                    echo'</tbody>';
                  echo'</table>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
                 echo'<div class="panel-footer">';
                        echo'<span class="pull-right">';
                            echo'<a href="edit.html" data-original-title="Edit my data" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>';
                        echo'</span>';
                    echo'</div>';
            
          echo'</div>';
        echo'</div>';
      echo'</div>';
    echo'</div>';
}
?>

<?php
    include 'user_parts/footer.php';
?>
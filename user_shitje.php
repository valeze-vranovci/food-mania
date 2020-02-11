<?php
include 'user_parts/header.php';
include 'dbconfig.php';
?>

  <div class="container">
  <?php
  $inputemaili=$_SESSION['inputEmail'];
if (isset($_SESSION['logged_in'])) {
?>
 <div class="row">
   <div class="col-md-offset-3 col-md-6">
          <a class="btn btn-success" type="button" href="addPlate.php">Add new plate</a>
      </div>
  </div>

  <?php
    echo '<div class="margin-bottom"></div>';
}
$pdo = Database::connect();

$sql = "SELECT * FROM pjata  where inputemail='$inputemaili' order by data desc";

foreach ($pdo->query($sql) as $row) {
    $pjata_id = $row['pjata_id'];
    
    echo '<div class="row blerjet">';
    
    echo '<div class="col-md-3">';
    echo '<img src = "' . $row['photo'] . '" />';
    echo '</div>';
    
    echo '<div class="col-md-6 pershkrim">';
    echo '<p class="titulli">' . $row['Titull'] . '</p>';
    
    echo '<p class="description">' . $row['Description'] . '<a href="" class="btn btn-theme"> <span class="text-city">Read More<i class="fa fa-chevron-right"></i></span></a>
        </p>';
    
    echo '<p><span class="cmimi"><i class="fa fa-eur" aria-hidden="true">' . $row['Cmimi'] . '</i></span></p>';
    echo '</div>';
    
    echo '<div class="col-md-2 te-dhena">';
    echo '<p><i class="fa fa-calendar" aria-hidden="true">' . $row['Data'] . '</i></p>';
    
    echo '<p><i class="fa fa-clock-o" aria-hidden="true">' . $row['Ora'] . '</i></p>';
          $Qyteti_id = $row['Qyteti_id'];
          $qytetisql = 'SELECT emri,id FROM qyteti where id ='.$Qyteti_id.'';
                        foreach ($pdo->query($qytetisql) as $key) {
                          echo "<p><i class='fa fa-map-marker' aria-hidden='true'".$key['id'].">".$key['emri']."</i></p>";
                        }
    
      echo'</div>';
    
    echo '<div class="col-md-1">';
    echo '<br>';
    if (isset($_SESSION['logged_in'])) {
        echo '<p><a class="btn btn-primary" href="editPlate.php?id='.$row['pjata_id'].'">Edit</a></p>';
        echo ' ';
        echo '<p><a class="btn btn-danger" href="deletePlate.php?id=' . $row['pjata_id'] . '">Delete</a></p>';
    }
    echo '</div>';
    echo '</div>';
    
    echo '<div class="margin-top"></div>';
}
?>
 </div>
<?php
include 'user_parts/footer.php';
?>
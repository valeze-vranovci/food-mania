<?php
    include 'eat_parts/header.php';
?>



        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="dessert">Dessert</button>
            <button class="btn btn-default filter-button" data-filter="gjelle">Gjelle</button>
            <button class="btn btn-default filter-button" data-filter="sallate">Sallate</button>
            <button class="btn btn-default filter-button" data-filter="shendetesore">Shendetesore</button>
            <button class="btn btn-default filter-button" data-filter="vegjetaria-vegane">Vegjetarian/Vegan</button>
        </div>

<div style="margin-top:50px;"></div>


<?php
    echo '<div class="margin-bottom"></div>';

echo '<section id="postimet">';
echo '<div class="container">';
$i   = 0;
$pdo = Database::connect();
$sql = 'SELECT * FROM receta';
foreach ($pdo->query($sql) as $row) {
    if ($i == 0) {
        echo '<div class="row">';
        $closed = false;
    }
    $receta_id = $row['receta_id'];
    echo '<div class="col-md-4 filter';
    echo' studio " style="opacity: 1;">';
    echo '<div class="studio-box">';
    echo '<div class="studio-info">';
      $kateg = $row['Kategoria_id'];
                    $kategorisql = 'SELECT emri,id FROM kategoria where id ='.$kateg.'';
                    foreach ($pdo->query($kategorisql) as $key) {
                        echo "<p id='white'".$key['id'].">".$key['emri']."</p>";
                    }
    echo '</div>';
    
    echo '<figure class="effect-phoebe"> <img src="' . $row['photo'] . '">';
    echo '<figcaption>';
    echo '<p>';
    echo '<a class="nivo-lightbox" href="' . $row['photo'] . '"><i class="fa fa-search effect-3"></i></a>';
    echo '</p>';
    echo '</figcaption>';
    echo '</figure>';
    echo '<div class="clearfix"></div>';
    echo '<div class="photo-title2 text-left2">';
    echo '<h5><span class="text-theme">'.$row['titull'].'</span></h5>';
    echo '<p class="text-body">'.$row['description'].'.</p>';
    echo '<p><a href="more_mode_receta.html" class="btn btn-theme" data-toggle="modal" data-target="#myModal"><span class="text-city">Read More<i class="fa fa-chevron-right"></i></span></a></p>';
    if (isset($_SESSION['logged_in'])) {
        echo '<p><a class="btn btn-primary" href="editReceta.php?id=' . $row['receta_id'] . '">Edit</a>';
        echo ' ';
        echo '<a class="btn btn-danger" href="deleteReceta.php?id=' . $row['receta_id'] . '">Delete</a></p>';
    }
    echo '</div>';
    
    echo '</div>';
    
    echo '</div>';
    
    $i++;
    if ($i == 3) {
        $i = 0;
        echo '</div>';
        echo '<div class="margin-bottom"></div>';
        $closed = true;
    }
}
if ($closed == false) {
    echo '</div>';
}
Database::disconnect();
  echo '</div>';

echo '</section>';

echo '</div>';
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" href=".text-theme"></h4>
      </div>
      <div class="modal-body" href=".text-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php
    include 'eat_parts/footer.php';
?>
<?php
   include 'user_parts/header.php';
   include 'dbconfig.php';
?>
<?php

     $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    else{
      header("Location: user_shitje.php");
    }

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM pjata  WHERE pjata_id = ? LIMIT 1";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if (!((isset($photo) && ($photo!=null)))) {
      $photo = $row['photo'];
    }
    if (!((isset($titull) && ($titull!=null)))) {
      $titull = $row['Titull'];
    }
    if (!((isset($description) && ($description!=null)))) {
      $description = $row['Description'];
    }
    if (!((isset($cmimi) && ($cmimi!=null)))) {
      $cmimi = $row['Cmimi'];
    }
    if (!((isset($data) && ($data!=null)))) {
      $data = $row['Data'];
    }
    if (!((isset($ora) && ($ora!=null)))) {
      $ora = $row['Ora'];
    }

    if (!empty($_POST)) {
        // keep track validation errors
        $photoError = null;
        $titullError = null;
        $descriptionError = null;
        $cmimiError = null;
        $dataError = null;
        $oraError = null;

         
        // keep track post values
        $titull = $_POST['titull'];
        $description = $_POST['description'];
        $cmimi = $_POST['cmimi'];
        $data = $_POST['data'];
        $ora = $_POST['ora'];
        $photo = $_FILES['photo']['name'];
        $target = "images/".basename($_FILES["photo"]["name"]);


        // validate input 
        $valid = true;        
        if (empty($titull)) {
            $titullError = 'Ju duhet te shtypni nje emer';
            $valid = false;
        } 
        if (empty($description)) {
            $descriptionError = 'Ju duhet te shtypni nje pershkrim';
            $valid = false;
        } 
        if (empty($cmimi)) {
            $cmimiError = 'Ju duhet te shtypni nje cmim';
            $valid = false;
        } 
        if (empty($data)) {
            $dataError = 'Ju duhet te zgjedhni daten';
            $valid = false;
        } else if (empty($ora)) {
            $oraError = 'Ju duhet te shtypni nje oren';
            $valid = false;
        } 
        
        if((!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) && !((isset($photo) && ($photo!=null))))
        {
            $photoError = 'Ju duhet te zgjedhni nje foto';
            $valid = false;
        }
        else if(isset($_FILES['photo']) && $_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE){
          unlink($photo);
        }
        else if((!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE)) {
           $target = $photo;
        }
        // insert data
        if ($valid) {
            // move_uploaded_file($_FILES['photo']['tmp_name'], $target); 
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $q = $pdo->prepare('UPDATE pjata 
              SET 
               Titull=:utitull, 
               Description=:udescription, 
               Cmimi=:ucmimi,
               Data=:udata,
               Ora=:uora,
               photo=:uphoto 
               WHERE pjata_id=:uid');
            $q->bindParam(':utitull',$titull);
            $q->bindParam(':udescription',$description);
            $q->bindParam(':ucmimi',$cmimi);
            $q->bindParam(':udata',$data);
            $q->bindParam(':uora',$ora);
            $q->bindParam(':uphoto',$target);
            $q->bindParam(':uid',$id);
            $q->execute();
            Database::disconnect();
            echo "
             <script>
              window.location.href='user_shitje.php';
              </script>
             ";

        }
    }
?>
<br>
<br>
<br>
  <main class="createSponsors">
    <div class="container">
     <?php 
      if(!isset($_SESSION['logged_in'])){
        echo "<div class='noPermission'>You don't have the permission to view this page.</div>";
      }
      else
      { ?>
          <div class="span10 offset1">
              <div class="row">
                  <h3>Edit shitje</h3>
              </div>
             
              <form class="form-horizontal" action="editPlate.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">

              <div class="control-group <?php echo !empty($QytetiError)?'error':'';?>">
                        <label class="control-label">Qyteti:</label>
                        <?php 
                        $pdo = Database::connect();
                        $sql = "SELECT emri,id FROM qyteti ";
                        
                        echo  "<select name='select'>";

                        foreach ($pdo->query($sql) as $row) {
                          echo "<option value=".$row['id'].">".$row['emri']."</option>";
                        }
                        echo "</select>";
                        ?>
                    </div>


                <div class="control-group <?php echo !empty($titullError)?'error':'';?>">
                  <label class="control-label">Titull</label>
                  <div class="controls">
                      <input name="titull" type="text"  placeholder="titull" value="<?php echo !empty($titull)?$titull:'';?>">
                      <?php if (!empty($titullError)): ?>
                          <span class="help-inline"><?php echo $titullError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                  <label class="control-label">Description</label>
                  <div class="controls">
                      <input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                      <?php if (!empty($descriptionError)): ?>
                          <span class="help-inline"><?php echo $descriptionError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($cmimiError)?'error':'';?>">
                  <label class="control-label">Cmimi</label>
                  <div class="controls">
                      <input name="cmimi" type="number"  placeholder="Cmimi" value="<?php echo !empty($cmimi)?$cmimi:'';?>">
                      <?php if (!empty($cmimiError)): ?>
                          <span class="help-inline"><?php echo $cmimiError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($dataError)?'error':'';?>">
                  <label class="control-label">Data</label>
                  <div class="controls">
                      <input name="data" type="date"  placeholder="titull" value="<?php echo !empty($data)?$data:'';?>">
                      <?php if (!empty($dataError)): ?>
                          <span class="help-inline"><?php echo $dataError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($oraError)?'error':'';?>">
                  <label class="control-label">Ora</label>
                  <div class="controls">
                      <input name="ora" type="time"  placeholder="titull" value="<?php echo !empty($ora)?$ora:'';?>">
                      <?php if (!empty($oraError)): ?>
                          <span class="help-inline"><?php echo $oraError;?></span>
                      <?php endif; ?>
                  </div>
                </div>


                <div class="control-group <?php echo !empty($photoError)?'error':'';?>">
                  <label class="control-label">Logo</label>
                  <div class="controls">
                      <input name="photo" type="file" accept="image/*" placeholder="Upload logo photo" id="uploaded">
                      <span id="currentPhoto">Current: <i for="uploaded"><?php echo $photo ?></i></span>
                      <?php if (!empty($photoError)): ?>
                          <span class="help-inline"><?php echo $photoError;?></span>
                      <?php endif; ?>
                  </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Ruaj</button>
                    <a class="btn btn-default" href="user_shitje.php">Mbrapa</a>
                  </div>
              </form>
          </div>
                 <?php } ?>
      </div> <!-- /container -->
    </main>
<?php
   include 'user_parts/footer.php';
?>
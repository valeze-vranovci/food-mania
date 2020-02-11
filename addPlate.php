<?php
   include 'user_parts/header.php';
    include 'dbconfig.php';
?>
<?php
    
 $emaili=$_SESSION['inputEmail'];

   if ( !empty($_POST)) {
        // keep track validation errors
        $QytetiError = null;
        $photoError = null;
        $titullError = null;
        $descriptionError=null;
        $cmimiError=null;
        $dataError = null;
        $oraError = null;
        
        // keep track post values
        $Qyteti = $_POST['select'];
        $titull  = $_POST['titull'];
        $description  = $_POST['description'];
        $cmimi  = $_POST['cmimi'];
        $data  = $_POST['data'];
        $ora  = $_POST['ora'];
        $photo = $_FILES['photo']['name'];
        $target = "images/".basename($_FILES["photo"]["name"]);
         
        // validate input
        $valid = true;
         if (empty($Qyteti)) {
            $QytetiError = 'Ju duhet te zgjedhni qytetin';
            $valid = false;
        }
        
        if (empty($titull)) {
            $titullError = 'Ju duhet te shtypni titullin';
            $valid = false;
        }
        
        if (empty($description)) {
            $descriptionError = 'Ju duhet te shtypni pershkrim';
            $valid = false;
        }

        if(empty($cmimi)) {
            $cmimiError = 'Ju duhet te shtypni cmimin';
            $valid = false;
        }
        if(!is_numeric($cmimi)) {
            $cmimiError = 'Cmimi duhet te jete nje numer';
            $valid = false;
        }
        
        if (empty($data)) {
            $dataError = 'Ju duhet te zgjedhni daten';
            $valid = false;
        }
         
         if (empty($ora)) {
            $oraError = 'Ju duhet te zgjedhni oren';
            $valid = false;
        }
        
        if(!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE)
        {
            $photoError = 'Ju duhet te zgjedhni nje foto';
            $valid = false;
        }
         
         // insert data
         if ($valid && move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO pjata (Qyteti_id, titull,description,cmimi,data,ora, photo, inputemail) values(?, ?, ?, ?, ?, ?, ?,?) ";
                 $q = $pdo->prepare($sql);
                $q->execute(array($Qyteti,$titull,$description, $cmimi, $data, $ora, $target, $emaili));
            Database::disconnect();
            header("Location: user_shitje.php");
        }
         
      
    }
?>

  <main class="createSchedule">
    <div class="container createSchedule">
            <?php 
      if(!isset($_SESSION['logged_in'])){
        echo "<div class='noPermission'>You don't have the permission to view this page.</div>";
      }
      else
      { ?>
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="orange">Krijoni nje pjate te re.</h3>
                    </div>
                    <?php
                        if(isset($id)){
                            echo '<form class="form-horizontal" action="addPlate.php?id='.$id.'" method="post" enctype="multipart/form-data">';
                        }
                        else{
                    
             
                        echo '<form class="form-horizontal" action="addPlate.php" method="post" enctype="multipart/form-data">';
                    
                        }
                    ?>
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
                      <input name="titull" type="text"  placeholder="titull" required value="<?php echo !empty($titull)?$titull:'';?>">
                      <?php if (!empty($titullError)): ?>
                          <span class="help-inline"><?php echo $titullError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                  <label class="control-label">Description</label>
                  <div class="controls">
                      <textarea name="description" type="text"  placeholder="description" required value="<?php echo !empty($description)?$description:'';?>"></textarea>
                      <?php if (!empty($descriptionError)): ?>
                          <span class="help-inline"><?php echo $descriptionError;?></span>
                      <?php endif; ?>
                  </div>
                </div>
                 

                <div class="control-group <?php echo !empty($cmimiError)?'error':'';?>">
                  <label class="control-label">Cmimi</label>
                  <div class="controls">
                      <input name="cmimi" type="number" step="0.01" placeholder="Cmimi" required value="<?php echo !empty($cmimi)?$cmimi:'';?>">
                      <?php if (!empty($cmimiError)): ?>
                          <span class="help-inline"><?php echo $cmimiError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($dataError)?'error':'';?>">
                  <label class="control-label">Data</label>
                  <div class="controls">
                      <input name="data" type="date"  placeholder="Data" required value="<?php echo !empty($data)?$data:'';?>">
                      <?php if (!empty($dataError)): ?>
                          <span class="help-inline"><?php echo $dataError;?></span>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="control-group <?php echo !empty($oraError)?'error':'';?>">
                  <label class="control-label">Ora</label>
                  <div class="controls">
                      <input name="ora" type="time"  placeholder="Ora" required value="<?php echo !empty($ora)?$ora:'';?>">
                      <?php if (!empty($oraError)): ?>
                          <span class="help-inline"><?php echo $oraError;?></span>
                      <?php endif; ?>
                  </div>
                </div>


                <div class="control-group <?php echo !empty($photoError)?'error':'';?>">
                  <label class="control-label">Photo</label>
                  <div class="controls">
                      <input name="photo" type="file" accept="image/*" placeholder="Upload event photo" id="uploaded">
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
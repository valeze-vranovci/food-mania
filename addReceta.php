<?php
ob_start();
   include 'user_parts/header.php';
    include 'dbconfig.php';
?>
<?php
    
    $emaili=$_SESSION['inputEmail'];


 
   if ( !empty($_POST)) {
        // keep track validation errors
        $kategoriaError = null;
        $photoError = null;
        $titullError = null;
        $descriptionError=null;

        
        // keep track post values
        $kategoria = $_POST['select'];
        $titull  = $_POST['titull'];
        $description  = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $target = "images/".basename($_FILES["photo"]["name"]);
         
        // validate input
        $valid = true;
         if (empty($kategoria)) {
            $kategoriaError = 'Ju duhet te zgjedhni kategorine';
            $valid = false;
        }
        if (empty($photo)) {
            $photoError = 'Ju duhet te zgjedhni foto';
            $valid = false;
        }
        if (empty($titull)) {
            $titullError = 'Ju duhet te shtypni nje emer';
            $valid = false;
        }
        if (empty($description)) {
            $descriptionError = 'Ju duhet te shtypni nje pershkrim';
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
            $sql = "INSERT INTO receta (kategoria_id, titull,description, photo,inputemail) values(?, ?, ?, ?,?)";
                 $q = $pdo->prepare($sql);
                $q->execute(array($kategoria,$titull,$description, $target,$emaili));
            Database::disconnect();
            header("Location: user_receta.php");
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
                        <h3 class="orange">Shto nje recete</h3>
                    </div>
                    <?php
                        if(isset($id)){
                            echo '<form class="form-horizontal" action="addReceta.php?id='.$id.'" method="post" enctype="multipart/form-data">';
                        }
                        else{
                    
             
                        echo '<form class="form-horizontal" action="addReceta.php" method="post" enctype="multipart/form-data">';
                    
                        }
                    ?>
                    <div class="control-group <?php echo !empty($KategoriaError)?'error':'';?>">
                        <label class="control-label">Kategoria::</label>
                        <?php 
                        $pdo = Database::connect();
                        $sql = "SELECT emri,id FROM kategoria ";
                        
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
                          <button type="submit" class="btn btn-primary">Save</button>
                          <a class="btn btn-default" href="user_receta.php">Back</a>
                        </div>
                    </form>
                </div>
                <?php } ?>
                 
    </div> <!-- /container -->
    </main>
<?php
   include 'user_parts/footer.php';
?>
<?php
   include 'user_parts/header.php';
   include 'dbconfig.php';
?>
<?php
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM pjata  WHERE pjata_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        // header("Location: user_shitje.php");
        echo "
             <script>
              window.location.href='user_shitje.php';
              </script>
             ";
         
    }
?>
 
<body>
    <div class="container">
     <?php 
      if(!isset($_SESSION['logged_in'])){
        echo "<div class='noPermission'>You don't have the permission to view this page.</div>";
      }
      else
      { ?>
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Schedule</h3>
                    </div>
                     
                    <form class="form-horizontal" action="deletePlate.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">A jeni i sigurt qe deshironi te fshini kete pjate?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Po, vazhdo.</button>
                          <a class="btn" href="user_shitje.php">Jo, me kthe mbrapa.</a>
                        </div>
                    </form>
                </div>
                 <?php } ?>
    </div> <!-- /container -->
<?php
   include 'user_parts/footer.php';
?>
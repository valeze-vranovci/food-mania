<!DOCTYPE html>
<html>
<head>
    <title>FoodMania</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

 

<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <div id="error">
                            <?php
                                if(isset($error))
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                       <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                    </div>
                                    <?php
                                }
                            ?>
                            </div>
                            <!-- =============Start of LOGIN form============ -->
                                <form class="form-signin" id="login-form" method="post" action="inc/checkLogin.php" >
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <p></p>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                                    <div class="checkbox">
                                      <!-- <label>
                                        <input type="checkbox" value="remember-me"> Remember me
                                      </label> -->
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit"  id="register-submit" class="form-control btn btn-register" value="Login Now">
                                            </div>
                                </form>
                                <!-- =============END of LOGIN form============ -->





                                <!-- =============Start of registration form============ -->
                                <form id="register-form" method = "POST" action = "inc/checkRegister.php" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" id="inputUserFirstName" name="inputUserFirstName" class="form-control" placeholder="First Name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                         <input type="text" id="inputUserLastName" name="inputUserLastName" class="form-control" placeholder="Last Name" required autofocus>
                                    </div>



                                    <div class="form-group">
                                        <input type="text" id="inputKompania" name="inputKompania" class="form-control" placeholder="Company"  autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="inputDOB" name="inputDOB" class="form-control" placeholder="Date Of Birth" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" id="inputPhone" name="inputPhone" class="form-control" placeholder="Phone Number" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="address" id="inputAdresa" name="inputAdresa" class="form-control" placeholder="Address" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="UserPassword" name="inputPassword" class="form-control" placeholder="Password" required autofocus>
                                    </div>                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; Copyright @ 2017</p>
                </div>
            </div>
        </div>
    </footer>
 -->







<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script src="js/login.js"></script>

</body>
</html>
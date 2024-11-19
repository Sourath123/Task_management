<?php 
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] != ''){
	
	header('Location: list_tasks.php');
	 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      
        <title>Login </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                                <!-- Social login form-->
                                <div class="card my-5">
                                    <div class="card-body p-4 text-center">
                                        <div class="h3 font-weight-light mb-3" id="signin" >Sign In</div> 
                                        <div class="h3 font-weight-light mb-3" style="display:none;" id="register" >Register</div> 

                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <!-- Login form-->
										<?php if(isset($_GET['err'])){ ?>
										<div class="alert alert-red alert-icon" role="alert">
										<button class="close" type="button" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<div class="alert-icon-aside">
											<i data-feather="alert-circle"></i>
										</div>
										<div class="alert-icon-content">
										<?php if($_GET['err']==1) {echo "<h6 class='alert-heading'>Please enter email</h6>";}
											else if($_GET['err']==2){ echo "<h6 class='alert-heading'>Please enter password</h6>";}
											else if($_GET['err']==3){ echo "<h6 class='alert-heading'>Please enter valid username/password</h6>"; } ?>
										</div>
										</div>
										<?php } ?>
                                        <form role="form" action="" method="POST" id="register_form">
										  
                                         <!-- Form Group (First Name)-->
                                         <div class="form-group fname" style="display:none;">
                                                <label class="small mb-1" for="f_username">First name</label>
                                                <input class="form-control py-4" id="f_username" name="f_username" type="text" placeholder="Enter First name" />
                                            </div>
                                            <!-- Form Group (Last Name)-->
                                           <div class="form-group lname" style="display:none;">
                                                <label class="small mb-1" for="l_username">Last name</label>
                                                <input class="form-control py-4" id="l_username" name="l_username" type="text" placeholder="Enter Last name" />
                                            </div>
                                            <div class="form-group gender" style="display:none;">
                  <label for="sex">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" id="blankRadio1" value="male">
                    Male
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="blankRadio2" value="female">
                    Female
                  </div>
                                            <!-- Form Group (email address)-->
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" placeholder="Enter email address" aria-label="Email Address" />
                                            </div>
                                            <!-- Form Group (password)-->
                                           <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="inputPassword" type="password" placeholder="Enter password" aria-label="Password" aria-describedby="passwordExample" />
                                            </div>
                                            <div class="form-group confirm"  style="display:none;">
                                                <label class="small mb-1" for="inputPassword">Confirm Password</label>
                                                <input class="form-control py-4" id="inputCPassword" name="inputCPassword" type="password" placeholder="Enter password again" />
                                                <span id="password-error" style="color: red;"></span>
                                            </div>
                                            <!-- Form Group (forgot password link)-->
                                            <div class="form-group" id="fpassword"><a class="small" href="#">Forgot your password?</a></div>
                                            <!-- Form Group (login box)-->
                                            <div class="form-group d-flex justify-content-center">
                                               
                                                <button class="btn btn-primary"  type="button" id="login" >Login</button>&nbsp;
                                                <button class="btn btn-primary"  type="button" id="signup">Signup</button>
                                                <button class="btn btn-primary"  type="submit" id="register_btn" style="display:none;">Register</button>
                                        </div>
                                        
                                                <div class="form-group" id="prev_login" style="display:none"><a class="small" href="#">Already have an account?</a></div>
                                            </div>
                                        </form>
                                    </div> 
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; Task Management 2024</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/login.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        


    </body>
</html>

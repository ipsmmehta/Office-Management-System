 
<?php include('../navbar.php'); 
?> 
<div class="container-fluid " >
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <center>
                 <?php
					 if(empty($_GET["err"]))
					 {
						 // echo "<a href='' style='font-size:19px;'>  Enter username and password combination !  </a><br>";
					 }else{
					$DF = $_GET["err"];
					
					switch($DF)
					{
						case "1":
								echo"<a href='#' style='font-size:19px;'> Invalid combination of username and password  ! </a>";
						break;
						case"2":
								echo"<a href='#' style='font-size:19px;'> Please Login to Access this Area! </a>";
                        break;
                        case "3":
                            ?>
                                <div class="alert alert-success">
                                    <h4 style='color:red'> Password reset link has been forwarded to your Email ! </h4>  
                                        <span > Please follow the link for password reset..... </span> 
                                 </div>
                            <?php 
						break; 
					}
							/*if($DF=="1")
							{
								echo"<a href='#' style='font-size:19px;'> Invalid combination of username and password  ! </a>";
							} */
					 }
             ?>
              </center><br>
                    <form class="form-horizontal" method="POST" onsubmit="return validate_Login_5();" action="authentication.php">
                        <input type="hidden" name="_token" value="YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  >

                                                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" name="login_authi7d55" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="../Reset/">
                                    Forgot Your Password?
                                </a>
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
<!--
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
                    -->

 
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>

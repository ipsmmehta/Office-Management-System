<?php include('../navbar.php'); ?> 
<div class="container">
                   <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b> Reset Password</b></div>

                <div class="panel-body">
                    
                <script type="text/javascript">
 
 function Checkpassword()
	   {
		 var pass_1 = document.getElementById('passwd_1');
         var pass_2 = document.getElementById('passwd_2');
         var a1 = a2 = "";
         a1 = pass_1.value;
         a2 = pass_2.value;
		  if(a1.length > 4  && a1.length<15)
			 {
			 //	 return( true );
			 }
			 else {
				 alert("New password Must be between 5 To 15! ");
                 document.getElementById('passwd_1').style.backgroundColor = '#bfa';
				 return false;
			 }
		  
		  if(a2.length > 4  && a2.length<15)
			 {
			 //	 return( true );
			 }
			 else {
				 alert("Confirm password Must be between 5 To 15!");
				 document.getElementById('passwd_2').style.backgroundColor = '#bfa';
				 return false;
			 }
             if(a1==a2){

             }else{ 
                 alert("New password & Confirm password Must be same!");
                 document.getElementById('passwd_1').style.backgroundColor = '#bfa';
				 document.getElementById('passwd_2').style.backgroundColor = '#bfa';
				 return false;
             }
  
		  return( true );
	   } 
  //End of Validation
  </script>
 
                 <?php
					 if(empty($_GET["section"]))
					 {
						  ?>

                          <form class="form-horizontal" method="POST" action="reset.php">
                                <input type="hidden" name="_token" value="YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq">

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" required >

                                                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" name="reset_passwd" class="btn btn-primary">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>

                          <?php 
					 }else{
                    
                    include('../apps/config.php');  
                    $DATA_token = $_GET["section"];
                    $Data_id = $_GET["id"];
                    $user_id ="";
                        $SSK_g="SELECT id FROM password_resets WHERE email='$Data_id' AND token ='$DATA_token' ";
                        foreach($dbo->query($SSK_g)AS $hgf5){
                           $user_id = $hgf5["id"];
                        }

                        if(!$user_id==""){ 
                            ?>
                            <form method="post" onsubmit="return Checkpassword();" action="reset.php" >
                                	<table class="table" style="width:99%;" >
								<tr> 
									<td style='width:25%;' > Enter new password  </td>
									<td> <input type="password" id="passwd_1" name="passwd_1" required="required" class="form-control" /> </td>
								</tr>
								<tr> 
									<td style='width:25%;' > Confirm new passwordd  </td>
									<td> <input type="password" id="passwd_2" name="passwd_2" required="required" class="form-control" /> </td>
								</tr>
								</table>	
                                <input type="password" value="<?php echo $Data_id; ?>" name="User_ID" readonly hidden style='display:none;' required="required" class="form-control" />
                                <center> 
                                <button type="submit" name="SaveUpdatedassword" class="btn btn-warning">Submit</Button>
                                </center> 
                                </form>
                            <?php 
                        }

                            
					 
							/*if($DF=="1")
							{
								echo"<a href='#' style='font-size:19px;'> Invalid combination of username and password  ! </a>";
							} */
					 }
             ?>
               

                    
                </div>
            </div>
        </div>
    </div>
</div>
       </div>
    </div>


  
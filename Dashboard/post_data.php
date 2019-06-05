
<?php 
   include('../apps/config.php'); 
 //session_start();
	 
	 // START OF SESSION FEILD
	 $_SESSION['timeout'] = time();
	 
		 if(!isset($_SESSION['sess_username'])){
		   header('Location: ../index.php');
		 }
		 $sess_userid =  $_SESSION['sess_userid'] ;
		 $sess_username =  $_SESSION['sess_username'] ;
		 $sess_name = $_SESSION['sess_name'];
		 $sess_userrole =  $_SESSION['sess_userrole'] ;
		 $sess_designation =   $_SESSION['sess_designation'] ;
		 $sess_lastlogin_at =   $_SESSION['sess_lastlogin_at'] ;
		 $sess_userlogincountt =   $_SESSION['sess_userlogincountt'] ;
		 $sess_useractive =   $_SESSION['sess_useractive'] ;
		 $sess_created_at = $_SESSION['sess_created_at'];
  
	 // END   OF SESSION FEILD
	 // session_destroy(); 
 ?>

   <?php 
        if(isset($_POST["permission_error"])){
          ?>
		  	<div class="panel panel-danger">
				<div class="panel-heading"> <b>Unauthorized Access </b>   </div>
				<div class="panel-body"> <h5> You are not authorized to access this section, please contact administrator for more information.</h5> </div>
			</div>
		  <?php 
        }
    ?>

<?php 
	if(isset($_POST['Update_profile_savedata']))
	{
		$user_name = $_POST['user_name'];
		$user_id = $_POST['user_id'];
		$Contact = $_POST['Contact'];
		$Location = $_POST['Location'];
		$about_me = $_POST['about_me'];
		$SQL_UPDATE5="UPDATE users_description SET about='$about_me', contact='$Contact', location='$Location' WHERE users_id='$user_id' ";
		if($dbo->query($SQL_UPDATE5)){
			echo "<script type= 'text/javascript'> alert('Your Profile has been Updated Successfully');	</script>";
		}else{
			echo "<script type= 'text/javascript'> alert('Error while Profile updation ');	</script>";
		}
	}
?>

 <?php 
	function fun_Usersetting($dbo,$base,$user_search){
		if( $base=="disable"){
		$SQJ_545=" SELECT * FROM users WHERE name LIKE '%".$user_search."%' AND NOT status='Deactivated' ORDER BY id DESc ";
		}else{ $SQJ_545=" SELECT * FROM users WHERE id = '$user_search' "; }
		foreach($dbo->query($SQJ_545) AS $hf45 ){
			$USRID = $hf45["id"];
			$name = $hf45["name"];
			$email = $hf45["email"];
			$designation = $hf45["designation"];
			$status = $hf45["status"];
			$log_count = $hf45["log_count"];
			$role = $hf45["role"];
			$lastlogin_at = $hf45["lastlogin_at"];
			$created_at = $hf45["created_at"];
			?>
				<div class="panel panel-default">
					<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6"><strong> <?php echo $name; ?> </strong></div>
								<div class="col-sm-6" style="color:#999999;" align="right"><?php echo $designation; ?></div>
							</div>
					</div>
					<div class="panel-body"> 
					
					<div class="row">
						<div class="col-sm-6"><span style="color:#999999;" >User Id: <?php echo $email; ?></span></div>
						<div class="col-sm-6" align="right">  <?php if($status=="disable") { echo "<span style='color:red;' > $status "; }else{ echo "<span style='color:green;' > $status ";  } ?></span></div>
					</div>
					

					<div class="row">
						<div class="col-sm-6" > Role: <span style="color:#660000;"><?php echo $role; ?></span> </div>
						<div class="col-sm-6" align="right" ><span style="color:red;" ><?php echo $log_count; ?></span></div>
					</div>

					
					<div class="row">
					<div class="col-sm-6"  > Last Active: <span style="color:#999999;" > <?php echo $lastlogin_at; ?></span> </div>
					<div class="col-sm-6" align="right" > Register at : <span style="//color:#999999;" ><?php echo $created_at; ?></span></div>
					</div>

					<hr> 
					<?php if( $base=="disable"){ ?>
					<div class="row" >
					<div class="col-sm-6"  >
					  Reporting to:  <br><div style="margin-left:2%;"> 
					<?php $IDB="";
							$gd_df="SELECT user_report_to_id FROM users_reporting WHERE user_report_by_id='$USRID'  ";
							foreach($dbo->query($gd_df)AS $dyf45){
								$IDB = $dyf45["user_report_to_id"];
								$user_name = get_user_name($dbo,$IDB);
								?>
								<input id="disabledInput" disabled type="checkbox" name="Reporting_emp" <?php  if(!$IDB==""){  ?> value="<?php echo $IDB; ?>" checked <?php  } ?> > <?php echo $user_name; ?> &nbsp;&nbsp; 
								<?php 
							}
					?></div> 
					</div> 
					<div class="col-sm-6" align="right" >
					 
						<form method="post"  >
							<button type="submit" class="btn btn-warning btn-xs" value="<?php echo $USRID; ?>" name="user_setting" > Settings</button>
						</form>
					</div>	</div>		
					</div>
						<?php }else{

							?> 
							<form method="post" >

							<label> Status:</label><br> &nbsp;
							<input  type="radio" name="user_status" <?php  if($status=="enable"){  ?>checked <?php  } ?>  value="enable"  > <span style='color:green'> enable </span>&nbsp;&nbsp; 
							<input  type="radio" name="user_status" <?php  if($status=="disable"){  ?>  checked <?php  } ?> value="disable" > <span style='color:red'> disable  </span> &nbsp;&nbsp; 
							<hr>
							<label> Reporting to:</label><br> &nbsp;	
							
							<table class="table" style="width:99%;" >
								<tr> 
									<td style='width:25%;' > Update Existing employee  </td>
									<td> 
									<?php $cntp = $IDB="";
											$gd_df="SELECT user_report_to_id FROM users_reporting WHERE user_report_by_id='$USRID'  ";
											foreach($dbo->query($gd_df)AS $dyf45){
												$IDB = $dyf45["user_report_to_id"];
												$user_name = get_user_name($dbo,$IDB);
												$cntp = $cntp+1;
												?>
												<input type="checkbox" name="Reporting_emp<?php echo $cntp; ?>" <?php  if(!$IDB==""){  ?> value="<?php echo $IDB; ?>"  <?php  } ?> > <?php echo $user_name; ?> &nbsp;&nbsp; 
												<?php 
											}
									?>
									<input type="text" name="delete_count" value="<?php echo $cntp; ?>" style='display:none;' readonly hidden/>
									<br><small style="color:#999999;" > &nbsp; Please check the user you want to delete !</small>
									</th>
								</tr> 	
								<tr> 
									<td style='width:25%;' > Add new employee  </td>
									<td> 
									<select name="user_name"  class="form-control" style="width:100%;"  >
										<option value="">--Select User--</option>
										<?php 
											$SKJH_dsf="SELECT id,email,name,designation FROM users WHERE status='enable' ";
											foreach($dbo->query($SKJH_dsf)AS $UHF)
											{
												?> <option value="<?php echo $UHF['id']; ?>"><?php echo $UHF['name']; ?> (<?php echo $UHF['designation']; ?>)</option><?php 
											}
										?>	
									</select>
									</td>
								</tr>
						</table>

						<hr>
							<label> Change Password:</label><hr> &nbsp; 	
							<input type="checkbox" name="Chanhe_passwd" id="myCheck"  onclick="myFunctionchk()" />  Change password 
							<br><small style="color:#999999;" > &nbsp; &nbsp; Please select, if  you want to change the password !</small>
							<script>
								function myFunctionchk() {
									var checkBox = document.getElementById("myCheck");
									var text = document.getElementById("text");
									if (checkBox.checked == true){
										text.style.display = "block";
									} else {
									text.style.display = "none";
									}
								}
							</script>
							<div id="text" style="display:none">
							<table class="table" style="width:99%;" >
								<tr> 
									<td style='width:25%;' > Enter new password  </td>
									<td> <input type="text" name="passwd_1" class="form-control" /> </td>
								</tr>
								<tr> 
									<td style='width:25%;' > Confirm new passwordd  </td>
									<td> <input type="text" name="passwd_2" class="form-control" /> </td>
								</tr>
								</table>	
							</div>	

						<center>
							<button type="submit" class="btn btn-warning" value="<?php echo $USRID; ?>" name="Upadte_user_setting" > Update</button>
						</center>
						 	</form>

							<?php 
						} ?>
				</div>
			<?php 
		}
	}
 ?>

 
 <?php  
	if(isset($_POST['Upadte_user_setting']))
	{  
		$USRID = $_POST["Upadte_user_setting"];
		$userStatus = $_POST["user_status"];
		
		if(empty($_POST["user_name"])){	 $ReportingNewUserName ="";   }else 	{  $ReportingNewUserName = $_POST["user_name"];  }
		if(empty($_POST["delete_count"])){	 $delete_count ="";   }else 	{  $delete_count = $_POST["delete_count"];  }
		if(empty($_POST["passwd_1"])){	 $passwd_1 ="";   }else 	{  $passwd_1 = $_POST["passwd_1"];  }
		if(empty($_POST["passwd_2"])){	 $passwd_2 ="";   }else 	{  $passwd_2 = $_POST["passwd_2"];  }
		
		
		for($i=0;$i<$delete_count;$i++){
			  $Fjh="Reporting_emp";
			  $Post_variable = $Fjh.$i;
			  if(empty($_POST["$Post_variable"])){	 $PostVariable ="";   }else 	{  $PostVariable = $_POST["$Post_variable"];  }   
			 	$dfjhg="DELETE FROM users_reporting WHERE  user_report_by_id='$USRID' AND user_report_to_id='$PostVariable' ";
				if($dbo->query($dfjhg)){	}
			}
		// Reporting_emp
 
		$SHGF_565=" UPDATE users SET status='$userStatus' WHERE id='$USRID'  "; 
		    if($dbo->query($SHGF_565)){
				// echo "Success ! ";
			}

		if(!$ReportingNewUserName==""){
				$dgf="";
			$SQL_4y65="SELECT count(id) FROM users_reporting WHERE user_report_by_id='$USRID' AND user_report_to_id='$ReportingNewUserName' ";
			foreach($dbo->query($SQL_4y65) AS $HG5){
				$dgf =$HG5["0"];
			}if($dgf==0){
			$AHGF_ini="INSERT INTO users_reporting (user_report_to_id,user_report_by_id) VALUE ('$ReportingNewUserName','$USRID') ";	
			if($dbo->query($AHGF_ini)){
				// echo "Success ! ";
			}
		}
		}

		if(!$passwd_1=="" ){
		$var_cmp2=strcmp($passwd_1,$passwd_2);
		if($var_cmp2==0)
				{
					$hash_password = password_hash($passwd_1, PASSWORD_BCRYPT); 
					try
						{
								$sql="UPDATE users set 
						   		password	='$hash_password',
								updated_at  ='$aajki_date' 
								WHERE id ='$USRID' ";
							
								$stmt = $dbo->prepare($sql);
								$stmt->execute();
								echo "<script type= 'text/javascript'> alert('Your Password Updated Successfully');</script>";
						}
						catch(PDOException $e)
								{
								echo $sql . "<br>" . $e->getMessage();
								}
						 
				}
			}


			$base="Setting";
			fun_sucess();
			fun_Usersetting($dbo,$base,$USRID);
	
	}
?>

 <?php  
	if(isset($_POST['search_people']))
	{  
		if(empty($_POST["usersearch"])){	 $user_search ="";   }else 	{  $user_search = $_POST["usersearch"];  }
		   // echo $user_search; 
		   $base="disable";
		   fun_Usersetting($dbo,$base,$user_search);
		
	}
?>

 <?php  
	if(isset($_POST['basic_people_search']))
	{  
		if(empty($_POST["usersearch"])){	 $user_search ="";   }else 	{  $user_search = $_POST["usersearch"];  }
		   // echo $user_search; 
		   $base="disable";
		   fun_basicUsersetting($dbo,$base,$user_search);
		
	}
?>

<?php 
	function fun_basicUsersetting($dbo,$base,$user_search){
		$SQJ_545=" SELECT * FROM users WHERE name LIKE '%".$user_search."%' AND NOT status='Deactivated' ORDER BY id DESc ";
		
		foreach($dbo->query($SQJ_545) AS $hf45 ){
			$USRID = $hf45["id"];
			$name = $hf45["name"];
			$email = $hf45["email"];
			$designation = $hf45["designation"];
			$status = $hf45["status"];
			$log_count = $hf45["log_count"];
			$role = $hf45["role"];
			$lastlogin_at = $hf45["lastlogin_at"];
			$created_at = $hf45["created_at"];
			?>
			<div class="panel panel-default">
					<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6"><strong> <?php echo $name; ?> </strong></div>
								<div class="col-sm-6" style="color:#999999;" align="right"><?php echo $designation; ?></div>
							</div>
					</div>
					<div class="panel-body"> 
					
					<div class="row">
						<div class="col-sm-6"><span style="color:#999999;" >User Id: <?php echo $email; ?></span></div>
						<div class="col-sm-6" align="right">  <?php if($status=="disable") { echo "<span style='color:red;' > $status "; }else{ echo "<span style='color:green;' > $status ";  } ?></span></div>
					</div>
					

					<div class="row">
						<div class="col-sm-6" > Role: <span style="color:#660000;"><?php echo $role; ?></span> </div>
						<div class="col-sm-6" align="right" ><span style="color:red;" ><?php echo $log_count; ?></span></div>
					</div>

					
					<div class="row">
					<div class="col-sm-6"  > Last Active: <span style="color:#999999;" > <?php echo $lastlogin_at; ?></span> </div>
					<div class="col-sm-6" align="right" > Register at : <span style="//color:#999999;" ><?php echo $created_at; ?></span></div>
					</div>
					</div>
					</div>
			<?php  
		}
	}
?>

<?php 
	if(isset($_POST["user_setting"])){
		$USRID = $_POST["user_setting"];
		$base="Setting";
		fun_Usersetting($dbo,$base,$USRID);
		?>

		<?php 
	}
?>

<?php 
	if(isset($_POST['update_profile']))
	{
		?>

		<div class="panel panel-default">
  <div class="panel-heading"><b> Update Profile </b> </div>
  <div class="panel-body" >
  
	 <form  id="submitForm2" name="myForm"  onsubmit="return(validate());" action='' method="post"  >
<table  class="table">
				 
	 <?php $SQL_GEF="SELECT about,contact,location FROM users_description WHERE users_id='$sess_userid'  "; 
		 foreach($dbo->query($SQL_GEF) AS $DJHG87 )
			{
				$about = $DJHG87['about'];
				$contact = $DJHG87['contact'];
				$location = $DJHG87['location'];
			
	 		?>
				<tr>
					<td><label> Name :</label></td>
					<td><label><b><?php  echo  $sess_name;?> </b></label>
						<input type="text"  name="user_name" required="required" value="<?php echo  $sess_username ; ?>" readonly hidden style='display:none;'/>
						<input type="text"  name="user_id" required="required" value="<?php echo  $sess_userid ; ?>" readonly hidden style='display:none;'/>
					</td>
				</tr>
				
				<tr>
					<td><label> E-mail Id :</label></td>
					<td><label><b><?php  echo  $sess_username;?> </b></label>  </td>
				</tr>
				
				
				<tr>
					<td><label> Contact :</label></td>
					<td><input type="text" class="form-control"  name="Contact" value="<?php  echo  $contact;?>" required="required" placeholder="Contact number "/> </td>
				</tr>
				<tr>
					<td><label>Location/Address :</label></td>
					<td><input type="text"  class="form-control"  name="Location" value="<?php  echo  $location;?>"  required="required" placeholder="Location/Address "/> </td>
				</tr>
				<tr>
					<td><label>About me :</label>
				
				</td>
					<td>
						<textarea name="about_me" required="required" Placeholder="Description about me.... " class="form-control" /><?php  echo  $about;?></textarea>
						<script> CKEDITOR.replace( 'about_me' );	</script>
				</td>
				</tr>
			<?php }	?>
</table>
 
<br>
 <center> 
 <input class="btn btn-warning" type="submit" value="Update " name="Update_profile_savedata"/>
  </center> 
</div>
 
</form>
 </div>
 <?php   dashboardProfileOptions($dbo,$sess_userid); ?> 



		<?php 
	}
?> 

<?php 
/*
view_profile
update_profile
change_password

view_task
update_task
task_summary

view_document
add_document
update_document

apply_leaves
view_leaves
history_leaves

Stationery_apply_leaves
Stationery_view_leaves
Stationery_history_leaves

upcoming_events
past_events

*/

if(isset($_POST['change_password']))
{
?>

<script type="text/javascript">
 
 function validate()
	   {
	   
		  if( (document.myForm.Old_Password.value =="" )  )
		  {
			 alert( "Please Enter Your old password !" );
			 document.myForm.project_id.focus() ;
			 return false;
		  }
		  
		   
		 // var a = document.myform.achivements.value;
		 
		 a=document.myForm.New_Password1.value;
		  if(a.length > 4  && a.length<15)
			 {
			 //	 return( true );
			 }
			 else {
				 alert("New password Must be between 5 To 15! ");
				 document.myForm.New_Password1.focus() ;
				 return false;
			 }
		  a2=document.myForm.New_Password2.value;
		  if(a2.length > 4  && a2.length<15)
			 {
			 //	 return( true );
			 }
			 else {
				 alert("New password Must be between 5 To 15!");
				 document.myForm.New_Password2.focus() ;
				 return false;
			 }
  
		   
		  
		   
		  return( true );
	   }
  
 
 //End of Validation
 
  
 </script>
 
				
<div class="panel panel-default">
  <div class="panel-heading"><b> Change Password </b> </div>
  <div class="panel-body" >
  
	 <form  id="submitForm2" name="myForm"  onsubmit="return(validate());" action='' method="post"  >
<table  class="table">
				 
	 
				<tr>
					<td><label> User Name :</label></td>
					<td><label><b><?php  echo  $sess_name;?> </b></label>
						<input type="text"  name="user_name" required="required" value="<?php echo  $sess_username ; ?>" readonly hidden style='display:none;'/>
						<input type="text"  name="user_id" required="required" value="<?php echo  $sess_userid ; ?>" readonly hidden style='display:none;'/>
					</td>
				</tr>
				<tr>
					<td><label>Old Password :</label></td>
					<td><input type="password"  class="form-control" name="Old_Password" required="required" placeholder="Old Password  "/> </td>
				</tr>
				<tr>
					<td><label>New Password :</label></td>
					<td><input type="password" class="form-control"  name="New_Password1" required="required" placeholder="New Password "/> </td>
				</tr>
				<tr>
					<td><label>Confirm New Password :</label></td>
					<td><input type="password"  class="form-control"  name="New_Password2" required="required" placeholder="Confirm New Password "/> </td>
				</tr>
		 
				 
			  

 

</table>
 
<br>
 <center> 
 <input class="btn btn-warning" type="submit" value="Submit " name="change_password_update"/>
  </center> 
</div>
 
</form>
 </div>
 
<h2>Profile options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
			<div class="col-sm-3"> <button type="submit" name="view_profile" style="width:100%; height:95px;" class="btn btn-warning">View profile</button> </div>
			<div class="col-sm-3"> <button type="submit" name="update_profile"  style="width:100%; height:95px;" class="btn btn-primary">Update profile </button> </div>
			<div class="col-sm-3"> <button type="submit" name="task_summary" style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" name="view_document" style="width:100%; height:95px;" class="btn btn-info">View Documents </button> </div>
		</form>
	</div>

<?php 
}
?>


<?php 

if(isset($_POST['change_password_update']) ) 
{
	
		$passdVariable = $user_hash_passwd = $varNewpassword2 = NULL ;
		$counter="0";
		$user_name =$_POST["user_name"];
		$user_id =$_POST["user_id"]; 
		$varOldpassword =$_POST["Old_Password"];
		$varNewpassword1 =$_POST["New_Password1"];
		$varNewpassword2 =$_POST["New_Password2"];
		
		 $sql=" SELECT password FROM `users` WHERE id ='$user_id' AND email ='$user_name'  "; 
					foreach ($dbo->query($sql) as $row) 
						{
					 	$user_hash_passwd = $passdVariable = $row['password'];
						 
						//echo $passdVariable;
						}
						
						//echo "<br> password enter by you : ";
						//echo $varOldpassword;
					//	echo"<br>";
					
						if(password_verify($varOldpassword,$user_hash_passwd))
							{
								
							}
							
						$var_cmp=strcmp($varOldpassword,$passdVariable);
						$var_cmp2=strcmp($varNewpassword1,$varNewpassword2); 
						
						//echo"VALE OF THE : $var_cmp <BR>";
						//echo"VALE OF THE : $var_cmp2 <BR>";
						 
			 if(password_verify($varOldpassword,$user_hash_passwd))
			{
				if($var_cmp2==0)
				{
					 $hash_password = password_hash( $varNewpassword1, PASSWORD_BCRYPT); 
					try
						{
							 
								$sql="UPDATE users set 
						   		password	='$hash_password',
								updated_at  ='$aajki_date' 
								WHERE id ='$user_id' AND email ='$user_name' ";
								 
						 
							  // Prepare statement
							$stmt = $dbo->prepare($sql);
		
							// execute the query
							$stmt->execute();
		
							// echo a message to say the UPDATE succeeded
							//echo  "  <script type= 'text/javascript'> parent.location.reload(); </script> ";  
									 echo "<script type= 'text/javascript'> alert('Your Password Updated Successfully');
											 
										</script>";
						}
							catch(PDOException $e)
								{
								echo $sql . "<br>" . $e->getMessage();
								}
						 
				}
				else
					{
						echo"<h3 align='center' style='color:red;'> New password and confirm new password must be same </h3>";
					}
			}
			else
			{
			 
				echo"<h3 align='center' style='color:red;'> invalid Old password ! </h3>";
		 
			}
		
		  
		//header("Location:blank.php");
		 	
}

?>


<?php 
if(isset($_POST['view_profile']))
{

	fun_DefaulView($sess_userid,$dbo,$sess_name,$sess_designation,$sess_username,$sess_created_at, $sess_lastlogin_at,$sess_userrole);
	
}

?>

<?php
	function fun_DefaulView($sess_userid,$dbo,$sess_name,$sess_designation,$sess_username,$sess_created_at, $sess_lastlogin_at,$sess_userrole){

		 
 $about = $contact = $location = NULL;
	$SQL_SJ=" SELECT about,contact,location FROM users_description WHERE users_id='$sess_userid' ";
		 foreach($dbo->query($SQL_SJ) AS $HF35)
		 {
			 $about = $HF35['about'];
			 $contact = $HF35['contact'];
			 $location = $HF35['location'];
		 }
	?>
	<div class="row">
		<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-image: url(../img/bg.png);" >
				<img src="https://www.w3schools.com/w3images/nature.jpg" width="55px;" height="55px;" class="img-circle" alt="Cinque Terre"> 
				<br><span style="font-size:25px;">  <?php echo $sess_name; ?> </span>
			</div>
			<div class="panel-body"> <span style="font-size:18px; color:#757575;"> About Me:  </span><br>
				<?php echo $about; ?>
			 <hr>

			<table class="table table-condensed">
				<tr>
					<td style="width:45%;"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;&nbsp; Designation  </td>
					<td> <b style="color:#616161;"><?php echo $sess_designation; ?></b> </td>
				</tr>
				
				<tr>
					<td><span class="glyphicon glyphicon-phone"></span> &nbsp;&nbsp; Contact Number </td>
					<td> <b style="color:#616161;"><?php echo $contact; ?></b> </td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;  E-mail </td>
					<td><b style="color:#616161;"><?php echo $sess_username; ?></b></td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;  Location  </td>
					<td><b style="color:#616161;"><?php echo $location; ?></b></td>
				</tr>
				

			</table>
		 
			
			
			

		</div>
		</div>

		</div>
		<div class="col-sm-6">
		<div class="panel panel-default">
			 
			<div class="panel-body"> 
				<span style="font-size:25px;" > My recent task's:  </span>
					<hr>
					<?php $base="limit"; View_My_recent_task ($sess_userid,$dbo,$base); ?>
			</div>
		</div>


		</div>
		
	</div> 
  
	<?php
		 if($sess_userrole=="admin")
		 {
			Admin_option($sess_userid,$dbo); 
		 }
	?>	
<br>
	<?php farwordAppCount($sess_userid,$dbo); ?>
	<h5><span class="glyphicon glyphicon-time"></span> joined on, <?php echo $sess_created_at; ?>. last updated on  <?php echo $sess_lastlogin_at; ?> </h5>
   <!-- <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5> -->
  
	<h2>Profile options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
			 <div class="col-sm-3"> <button type="submit" <?php $val_name ="update_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_profile" <?php  } else{ ?> name="permission_error" <?php } ?>    style="width:100%; height:95px;" class="btn btn-warning">Update profile</button> </div>
			 <div class="col-sm-3"> <button type="submit" <?php $val_name ="change_password";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="change_password" <?php  } else{ ?> name="permission_error" <?php } ?>    style="width:100%; height:95px;" class="btn btn-primary">  Change password </button> </div>
			 <div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>    style="width:100%; height:95px;" class="btn btn-success">  View Task Summary</button> </div>
			 <div class="col-sm-3"> <button type="submit" <?php $val_name ="view_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_document" <?php  } else{ ?> name="permission_error" <?php } ?>    style="width:100%; height:95px;" class="btn btn-info">  View Documents</button> </div>
		</form>
	</div>

	 
<br>
	<!--  <a href="http://foxythemes.net/preview/products/beagle/pages-profile.html#" target="_blank" > http://foxythemes.net/preview/products/beagle/pages-profile.html# </a> 
	 --> <br>
	<?php  
	 
	}
	

?>

<?php 
// echo $sess_userid ;
	function View_My_recent_task($sess_userid,$dbo,$base)
	{
		
		?>
			<form  name="dsf" method="post" >
		<table class="table" style="width:100%;">
							<tr> 
							 
								<th style="width:55%;"> Task </th>
								<th> Status </th>
								 
								<th> View  </th>
							</tr>
		<?php 
		$task_title = $extraother= NULL;
		if($base=="no_limit"){
			$SQL_DHG="SELECT task_name,task_remarks,task_status,id FROM task_status WHERE assign_to='$sess_userid'  ORDER BY on_date  ";
		
		}else{	 
			$SQL_DHG="SELECT task_name,task_remarks,task_status,id FROM task_status WHERE assign_to='$sess_userid'  ORDER BY on_date DESC LIMIT 5 ";
		}
		foreach($dbo->query($SQL_DHG)AS $HGF5){
			$taskname = $HGF5["task_name"]; 
			$task_remarks = $HGF5["task_remarks"];
			$task_status = $HGF5["task_status"];
			?>
			<tr> 
				<TD> <?PHP ECHO $taskname; ?><br><small style='color:gray'><?php if($base=="no_limit"){ echo substr($task_remarks ,0,115); } else { echo substr($task_remarks ,0,39); } ?>....</small> </TD>
				<TD> <?PHP if($task_status=="Complete"){ echo"<span  style='color:green'> $task_status </span> ";}else { echo"<span  style='color:red'> $task_status </span> ";  }  ?> </TD>
				<TD> <button type="submit" name="view_individual_task" value="<?php   echo $HGF5["id"];  ?>" class="btn btn-warning btn-sm" > View </button>   </TD>
			 </tr>
			<?php 
			}

			
		  
			 ?> 

		</table>
		</form>					
		<?php

	}
?>

<?php
	function farwordAppCount($sess_userid,$dbo)
	{
		$Shbg="SELECT id,user_id FROM leave_applications  WHERE leave_forward='$sess_userid' AND NOT leave_status IN ('ARCHIVED','Revoke','Approve') ORDER BY id DESC";
		foreach($dbo->query($Shbg)AS $HGF5){
			  $Count_farwordApp= $HGF5["id"];
			  $id= $HGF5["id"];
			  $user_id= $HGF5["user_id"];
			if($Count_farwordApp==0){ }else 
			{  
				?>
				<div class="panel panel-default">
				<div class="panel-body"> <form method="post">
				<button type="submit" value="<?php echo $id; ?>" name="Pending_leave_application" style="background-color:transparent; border:0px; width:100%; text-align:left;" > 
				<!-- <span class="label label-danger">New</span> -->
				<?php echo get_user_name($dbo,$user_id); ?>, has applied for a leave   <img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image ">   
				 </button> 
				 </form>
				</div>
				</div>
				   <?php 
			}
		
		}

	}

?>

<?php 
	if(isset($_POST["Pending_leave_application"])){
		$LID = $_POST["Pending_leave_application"];
		approve_Leave_application($LID,$dbo);
	}
?>

<?php 
	function approve_Leave_application($LID,$dbo)
		{
			?> 
			<div class="panel panel-default">
				<div class="panel-heading"> <b> Forwarded Leave Application </b> </div>
				<div class="panel-body"> 
				<form method="post" >
				<?php 
						
					$Shbg="SELECT * FROM leave_applications  WHERE id='$LID' AND NOT leave_status IN ('ARCHIVED','Revoke') ORDER BY id DESC";
					foreach($dbo->query($Shbg)AS $hgdc5){
						$Count_farwordApp= $hgdc5["0"];
						if($Count_farwordApp==0){ }else 
						{  
							?>
								<table class="table">
					<tr> 	
						<td style="width:35%;"> Date of Leave Application:     </td>
						<td > <?php  echo $hgdc5["on_date"]; ?> </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Name of Applicant:    </td>
						<td > <?php $user_id = $hgdc5["user_id"];  echo get_user_name($dbo,$user_id); ?> </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Designation:    </td>
						<td > <?php  $column ="designation"; echo get_user_Data($dbo,$user_id,$column); ?> </td>
					</tr> 

					 
					<tr> 	
						<td style="width:35%;"> Nature of Leave:    </td>
						<td > <?php  echo $hgdc5["leave_type"]; ?>  </td>
					</tr> 
					<tr> 	
						<td style="width:35%;"> No. of Days:     </td>
						<td > <?php  echo $hgdc5["leave_days"]; ?>  </td>
					</tr> 	
					<tr> 	
						<td style="width:35%;"> From Date:     </td>
						<td > <?php  echo $hgdc5["leave_from"]; ?>  </td>
					</tr> 	
					<tr> 	
						<td style="width:35%;"> To Date:     </td>
						<td > <?php  echo $hgdc5["leave_to"]; ?>  </td>
					</tr> 
					<tr> 	
						<td style="width:35%;"> Saturday(s)/Sunday(s)/Holiday(s), <br>if any to be prefixed or suffixed to leave:     </td>
						<td > <?php  echo $hgdc5["leave_prefix"]; ?>  </td>
					</tr> 
					<tr> 	
						<td style="width:35%;"> Date of Return:     </td>
						<td > <?php  echo $hgdc5["leave_returnday"]; ?>  </td>
					</tr> 
					<tr> 	
						<td style="width:35%;"> Remarks:     </td>
						<td > <?php  echo $hgdc5["leave_remarks"]; ?>  </td>
					</tr> 
					<tr> 	
						<td style="width:35%;"> Status:     </td>
						<td > <?php  echo $hgdc5["leave_status"]; ?>  </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Action:     </td>
						<td > 
						<select name="action" required class="form-control"> 
							<option value="">--Select Action --</option>
							<option value="Approve">Approve</option>
							<!--	<option value="Return back">Return back</option> -->
							<option value="Discard">Discard </option>
						</select> 
						</td>
					</tr> 

						<tr> 	
						<td style="width:35%;"> Comments:     </td>
						<td >  <textarea name="Comments" palceholder="Comment if any ...." class="form-control"></textarea> </td>
					</tr> 


						</table> 
						 
					 

			 
							<?php 
						}
					}
				?>
				<input type="text" name="LID" value="<?php  echo $hgdc5["id"]; ?> "  readonly hidden style="display:none" >
				<center> 
				
					<input type="submit" name="action_OnLEAVE"  class="btn btn-warning" >
				</center>
				
				</form>
				<form name="dsf" method="post"> 
				<input type="submit" name="view_profile" value="Back" class="btn btn-info" />  
				</form>
				</div>
			</div>
			<?php 
		}
	?>

	 <?php 
		if(isset($_POST["action_OnLEAVE"])){
			$action = $_POST["action"];
			$Comments = $_POST["Comments"];
			$LID = $_POST["LID"];
			  $dsjhghj_567="UPDATE leave_applications SET leave_status='$action', Comments='$Comments' WHERE id='$LID' ";
	if($dbo->query($dsjhghj_567)){
		echo"<script>alert('  Leave Action done Successfully ! '); </script>";
		fun_sucess();	
		fun_DefaulView($sess_userid,$dbo,$sess_name,$sess_designation,$sess_username,$sess_created_at, $sess_lastlogin_at,$sess_userrole);
	
		}
			}
	 ?>

 <?php  function dashboardProfileOptions($dbo,$sess_userid){
	 ?>
	 	<h2>Profile options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
			<div class="col-sm-3"> <button type="submit"   <?php $val_name ="view_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_profile" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View profile</button> </div>
			<div class="col-sm-3"> <button type="submit"   <?php $val_name ="update_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_profile" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update profile </button> </div>
			<div class="col-sm-3"> <button type="submit"   <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit"   <?php $val_name ="view_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_document" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">View Documents </button> </div>
		</form>
	</div>
	 <?php 
 }
  ?> 

	 <?php 
	 	function 	Admin_option($sess_userid,$dbo){

			?>
				 
			<form method="post">
				
				<div class="row">
				
				<form  method="post">
                                <div class="col-sm-3"> <button type="submit" name="View_AllUser" style="width:100%; height:95px;" class="btn btn-default">  View users    
								<?php $dd77=NULL; $sdhgf="SELECT count(*) FROM users WHERE status='disable' "; foreach($dbo->query($sdhgf) AS $uh5){ $dd77 = $uh5["0"]; } if($dd77>0){ ?> <img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "> <?php } ?>  
								 </button> </div>
                                <div class="col-sm-2"> <button type="submit" name="taskViewAdmin"  style="width:100%; height:95px;" class="btn btn-default"> Task of users    </button> </div>
                                <div class="col-sm-2"> <button type="submit" name="Leavesofusers" style="width:100%; height:95px;" class="btn btn-default"> Leaves of users</button> </div>
                                <div class="col-sm-2"> <button type="submit" name="add_Category" style="width:100%; height:95px;" class="btn btn-default">Add category </button> </div>
								<div class="col-sm-3"> <button type="submit" name="Create_task" style="width:100%; height:95px;" class="btn btn-default">Add Task/Subtask </button> </div>
			     </form>
			</div>
			 
			<?php 
		 }
	 ?>

	<?php 
		if(isset($_POST["taskViewAdmin"])){
			fun_taskViewAdmin($dbo);
			dashboardProfileOptions($dbo,$sess_userid);
		}
	 ?>

	<?php 
		if(isset($_POST["Leavesofusers"])){
			$base="multiple";
			fun_ViewLeaveAdmin($sess_userid,$dbo,$base);
		}
	 ?>

	 <?php 
	function fun_ViewLeaveAdmin($sess_userid,$dbo,$base)
	{ ?>
	<div class="panel panel-default">
		<div class="panel-heading"> <label>Leave Application Detail </label> </div>
		<div class="panel-body"> <form name="sfd" method="post">
		 <table class="table" style="width:99%;" > 
	  	<tr> 
			<th> Sr.No. </th>
			<th> Applicant Name </th>
			<th> Days <span style="color:lightgray">(Type)</span> </th>
			<th> Application Date</th>
			<th> Leave From Date</th>
			<th> Leave To Date</th>
			<th> Current Status</th> 
			<th> Action </th> 
		</tr>
	  <?php 
	  $cnt=0;
		switch($base)
		{
			case"single":
				$SJH_sd="SELECT * FROM leave_applications WHERE user_id='$sess_userid' AND NOT leave_status='Revoke' ORDER BY id DESC LIMIT 7 "; 
					
			break;
			case"multiple":
				$SJH_sd="SELECT * FROM leave_applications WHERE  NOT leave_status='Revoke'  ORDER BY id DESC ";
			break;
		}

		foreach($dbo->query($SJH_sd) AS $Sjhg45){
			$cnt = $cnt+1;
			$leave_type = $Sjhg45["leave_type"];
			?> <tr> 
					<td>  <?php echo $cnt; ?> </td>
					<td> <?php $user_id = $Sjhg45["user_id"];  echo get_user_name($dbo,$user_id); ?> </td>
					<td>  <?php echo $Sjhg45["leave_days"]; ?> <span style="color:lightgray"> (<?php echo $Sjhg45["leave_type"]; ?>)</span> </td>
					<td>  <?php echo $Sjhg45["on_date"]; ?> </td>
					<td>  <?php echo $Sjhg45["leave_from"]; ?> </td>
					<td>  <?php echo $Sjhg45["leave_to"]; ?> </td>
					<td>  <?php   $leave_status = $Sjhg45["leave_status"];    ?>
				          <?php if($leave_status=="New"){ echo" <span style='color:red'>";}else { echo" <span style='color:green'> ";} echo $leave_status;  ?> </span>
					 </td>
					<td> <button type="submit" name="View_LeaveDATA" value=" <?php echo $Sjhg45["id"]; ?>" class="btn btn-warning btn-sm" >View </button>  
						 	</td>
				</tr>
			<?php 
		}

		?>  </table> 
		</form>
		</div>
		</div>
		 <?php 
	}
?>

	 <?php 
		if(isset($_POST["View_AllUser"])){
			 fun_ViewAllUser($dbo);
			 dashboardProfileOptions($dbo,$sess_userid);
		}
	 ?>

	 <?php 
		function fun_ViewAllUser($dbo){ $djh=0;
			?>  
			<div class="panel panel-default">
			<div  class="panel-heading"> <b> User List</b>  </div>
			<div class="panel-body">  <form  method="post">
			<table class="table"> 
					<th> Sr.No.</th>  
					<th> Name</th>  
					<th> E-mail</th>  
					<th> Designation</th>  
					<th> Registered on</th>  
					<th> Status </th>  
					<th> Action </th> 
			</tr> <?php 
			$SSKJH_5="SELECT id,name,email,created_at,designation,status FROM  users WHERE NOT status='Deactivated' ORDER BY id DESC  ";
			foreach($dbo->query($SSKJH_5)AS $duhg){
				$id = $duhg["id"];
				$name = $duhg["name"];
				$email = $duhg["email"];
				$created_at = $duhg["created_at"];
				$designation = $duhg["designation"];
				$status = $duhg["status"];
				$djh = $djh+1;
				?> <tr> 
					<td> <?php echo $djh;  ?></td>
					<td> <?php echo $name;  ?></td>
					<td> <?php echo $email;  ?></td>
					<td> <?php echo $designation;  ?></td>
					<td> <?php echo $created_at;  ?></td>
					<td> <?php if($status=="disable"){ echo" <span style='color:red'>";}else { echo" <span style='color:green'> ";} echo $status;  ?> </span> </td>
					<td> 
					<?php   if($status=="disable"){  
						?> 	<button type="submit" name="Activate_user" value=" <?php echo $id ; ?>" class="btn btn-warning btn-sm" >Activate </button> <?php 
					} else{ 
						?>  <button type="submit" name="DeActivate_user" onclick="return confirm('Are you sure  about Deactivate ?');" t value=" <?php echo $id; ?>" class="btn btn-danger btn-sm"> Deactivate </button> <?php 
					}  ?>
				    
						 
					</td>
				 </tr>  <?php 
			}
			?> </table> </form> </div>
			</div>  <?php 
			
		}
	 ?>

	 <?php 
		if(isset($_POST["DeActivate_user"])){
			$DeActivate_user = $_POST["DeActivate_user"];
			$SHjk="UPDATE users SET status='Deactivated' WHERE id='$DeActivate_user' "; 
			if($dbo->query($SHjk)){
				// echo"<script>alert('  Leave Application Revoked Successfully ! '); </script>";
				fun_sucess();	
				fun_ViewAllUser($dbo);
				dashboardProfileOptions($dbo,$sess_userid);
			}else{
				// echo"<script>alert('  Leave Application Revoked Successfully ! '); </script>";
				fun_fail();	
				fun_ViewAllUser($dbo);
				dashboardProfileOptions($dbo,$sess_userid);
			}
		}
	 ?>
	 
	 <?php 
		if(isset($_POST["Activate_user"])){
			$Activate_user = $_POST["Activate_user"];
			$SHjk="UPDATE users SET status='enable' WHERE id='$Activate_user' "; 
			if($dbo->query($SHjk)){
				// echo"<script>alert('  Leave Application Revoked Successfully ! '); </script>";
				fun_sucess();	
				fun_ViewAllUser($dbo);
				dashboardProfileOptions($dbo,$sess_userid);
			}else{
				// echo"<script>alert('  Leave Application Revoked Successfully ! '); </script>";
				fun_fail();	
				fun_ViewAllUser($dbo);
				dashboardProfileOptions($dbo,$sess_userid);
			}
		}
	 ?>

	 <?php 
		function fun_taskViewAdmin($dbo){
			$djh=0;
				?>  
				<div class="panel panel-default">
				<div  class="panel-heading"> <b> User's Task list</b>  </div>
				<div class="panel-body">  <form  method="post">
				<table class="table"> 
						<th> Sr.No.</th>  
						<th> Name</th>  
						<th> Designation</th>  
						<th> Total time Spent /<br> No. of days   </th>  
						<th> Summary </th> 
				</tr> <?php 
				$SSKJH_5="SELECT id,name,email,created_at,designation,status FROM  users WHERE NOT status='Deactivated' ORDER BY id DESC  ";
				foreach($dbo->query($SSKJH_5)AS $duhg){
					$id = $duhg["id"];
					$name = $duhg["name"];
					$email = $duhg["email"];
					$created_at = $duhg["created_at"];
					$designation = $duhg["designation"];
					$status = $duhg["status"];
					$djh = $djh+1;
					?> <tr> 
						<td> <?php echo $djh;  ?></td>
						<td> <?php echo $name;  ?></td>
					 	<td> <?php echo $designation;  ?></td>
						<td>  <span style='color:red'>
						<?php 	$SQL_sum_time="SELECT sec_to_time(sum(time_to_sec(timespent))) AS timespt FROM task_status WHERE assign_to='$id' ";
						 	foreach($dbo->query($SQL_sum_time) AS $HJFGH89)
								{
									echo "<b>".$HJFGH89["timespt"]."</b>";
								}
								?> </span>  <?php 
								$Shj77="SELECT count( DISTINCT LEFT(on_date , 10) ) FROM task_status WHERE assign_to='$id'  ";
								foreach($dbo->query($Shj77) AS $fgdf)
								{
									echo "<b> / ".$fgdf["0"]."</b>";
								}
						?>
						</span> </td>
						<td> 
						  <button type="submit" name="ViewTASKSUMMARY"   value="<?php echo $id; ?>" class="btn btn-warning btn-sm"> View </button>
							 
						</td>
					 </tr>  <?php 
				}
				?> </table> </form> </div>
				</div>  <?php 
				
			}
		
	 ?>

	 <?php 
		function fun_selectAcces_user($dbo){
			?> 
			 
				<form name="zssd45" method="post">
				<b>Select User:</b> <br>
				<div style="margin-left:1%;" >
						<select name="user_name" required="required" class="form-control">
							<option value="">--Select User--</option>
							<?php
								$SQL_ehx5="SELECT name,id FROM users WHERE status='enable' ORDER BY id DESC ";
								foreach($dbo->query($SQL_ehx5)AS $HGFD5)
									{
										$name = $HGFD5["name"];
										$id = $HGFD5["id"];
										?> <option value="<?php echo $id; ?>"><?php echo $name; ?></option> <?php 
									}
							?>
						</select>
				</div><br>
				<center> 
				<button type="submit" name="ViewUserPermission"  class="btn btn-warning btn-sm"> View </button>
					
				</center> 
				</form> 
			 
		<?php 
		}
	 ?>

	<?php 
		if(isset($_POST["Aby_user"])){
			?> 
			<div class="panel panel-primary">
			<div class="panel-heading"> <b> Accessibility Control By User </b> </div>
			<div class="panel-body">
			<?php 
				fun_selectAcces_user($dbo);
			?> 
				</div>
				</div>
			<?php 
		}
	?>
	<?php 
	function fun_AppsAccesData($dbo){
		?> 
		<div class="panel panel-primary">
		<div class="panel-heading"> <b> Accessibility Control By Apps. </b> </div>
		<div class="panel-body">
		<form name="dfs" method="post">
		 <table class="table" style="width:95%;" >
			<tr>
				<th style="width:5%;"><h4><b>Sr.No.</b></h4></th>
				<th style="width:15%;"><h4><b>Apps. List</b></h4></th>
				<th style="width:5%;"><h4><b>Enable</b></h4></th>
				<th style="width:5%;"><h4><b>Disbale</b></h4></th>
			</tr>
			<?php 
				$dgh2=0;
				$SQL_sf2="SELECT id,status FROM user_permission GROUP BY status ";
				foreach($dbo->query($SQL_sf2)AS $jh4w25){
					$dgh2 = $dgh2+1;
					$status = $jh4w25["status"];
					$id = $jh4w25["id"];
					?>
					<tr>
							<td><?php echo $dgh2; ?> </td>
							<td><?php echo $status; ?> </td>
							<td> <input type="radio" name="CHK_<?php echo $dgh2;?>"  value="onn<?php echo $id; ?>" > &nbsp; <span style=" color:green;" >On </span> </td>
							<td> <input type="radio" name="CHK_<?php echo $dgh2;?>"  value="off<?php echo $id; ?>" > &nbsp; <span style=" color:red;" > Off </span> </td>
					</tr>
				<?php 
				}
			?>
			
		</table><hr>
		  </div>
		 <center><button type="submit" value="<?php echo $dgh2; ?>" name="UpdatePermisstionAppps" class="btn btn-success"> Update Accessibility Setting </Button>
		</center><br> 
		</form>
		</div>
		</div>
		<?php 
	}
	?>

	<?php 
		if(isset($_POST["Aby_apps"])){

			fun_AppsAccesData($dbo);
			
		}
	?>

	<?php 
		if(isset($_POST["UpdatePermisstionAppps"])){
			$Limit_count = $_POST["UpdatePermisstionAppps"]; 
			for($i=0; $i<=$Limit_count; $i++){
				$dat1= "CHK_";
				$permission =$status ="";
				$dat3=$dat1.$i;
				if(empty($_POST["$dat3"])){	 $data_id ="";   }else 	{   $data_id = $_POST["$dat3"];  }
				  
				//	data_Reset($dbo,$user_id);
				//$SxdgdQK_fj3="UPDATE user_permission SET permission='on' WHERE  user_id='$user_id' AND id='$data_id'  ";
				//if ($dbo->Query($SxdgdQK_fj3)) {  }
				// echo $data_id;  echo"<br>";
			  $Data_part = substr($data_id,0,3)."<br>";
				  $vfgh ="onn"."<br>"; 
				  $jhg = strcmp($Data_part,$vfgh); 
				if( $jhg == 0 ){   $permission="on"; }else{  $permission = "off";  }
					// echo" <b style='color:red'> $permission </b>";
					// echo $permission."<br>";
				$ID_part = substr($data_id,3);	
				$SQL_hdf="SELECT status FROM user_permission WHERE id='$ID_part' ";
				foreach($dbo->query($SQL_hdf)AS $d57vj){
					$status = $d57vj["status"];
				}
				$SxdgdQK_fj3="UPDATE user_permission SET permission='$permission' WHERE  status='$status'  ";
				if ($dbo->Query($SxdgdQK_fj3)) {  }
			}
			
				
				fun_sucess();
			//	fun_AppsAccesData($dbo);
			?> 
			<div class="panel panel-primary">
			<div class="panel-heading"> <b> Accessibility Control By User </b> </div>
			<div class="panel-body">
			<?php 
				fun_selectAcces_user($dbo);
			?> 
				</div>
				</div>
			<?php 
		}
	?> 

	<?php 
		if(isset($_POST["ViewUserPermission"])){
			?> 
			
			<?php  
				$user_name = $_POST["user_name"];
				fun_UserAccesData($dbo,$user_name);
			?> 
				
			<?php 
		}
	?>

	<?php 
		function fun_UserAccesData($dbo,$user_name){
			  
			?> 
			<div class="panel panel-primary">
			<div class="panel-heading"> <b> Accessibility Control By User </b> </div>
			<div class="panel-body">
			<?php fun_selectAcces_user($dbo); ?>
			<div style='margin-left:2%;'> <h3 style='color:green;'> <?php echo get_user_name($dbo,$user_name); ?> </h3> 
			<form name="dfs" method="post">
			<input type="text" name="user_id" value="<?php echo $user_name; ?>" readonly hidden style='display:none;' />
			<table class="table" style="width:95%;" >
			
			<tr>
				<th style="width:5%;"><h4>Sr.No.</h4></th>
				<th style="width:15%;"><h4>Apps. List</h4></th>
				<th style="width:5%;"><h4>Enable</h4></th>
				<th style="width:5%;"><h4>Disbale</h4></th>
			</tr>
				<?php 

					$dgh2=0;
					$SQL_sf2="SELECT id,name,permission,status FROM user_permission WHERE user_id='$user_name'  ";
					foreach($dbo->query($SQL_sf2)AS $jh4w25){
						$dgh2 = $dgh2+1;
						$name = $jh4w25["name"];
						$permission = $jh4w25["permission"];
						$status = $jh4w25["status"];
						$id = $jh4w25["id"];
						?>
						<tr>
								<td><?php echo $dgh2; ?> </td>
								<td><?php echo $status; ?> </td>
								<td> <input type="radio" name="CHK_<?php echo $dgh2;?>" <?php  if($permission=="on"){ ?>  checked <?php  } ?> value="onn<?php echo $id; ?>" > &nbsp; <span style=" color:<?php  if($permission=="on"){ echo"green"; }else{ echo"red"; } ?>;" >On </span> </td>
								<td> <input type="radio" name="CHK_<?php echo $dgh2;?>" <?php  if($permission=="off"){ ?>  checked <?php  } ?> value="off<?php echo $id; ?>" > &nbsp; <span style=" color:<?php  if($permission=="on"){ echo"red"; }else{ echo"green"; } ?>;" > Off </span> </td>
						</tr>
							
						<?php 
					}

				?>
				
			</table><hr>
			<?php /*
			$dgh=0;
			$SQL_sf="SELECT id,name,permission,status FROM user_permission WHERE user_id='$user_name'  ";
			foreach($dbo->query($SQL_sf)AS $jh4w5){
				$dgh = $dgh+1;
				$name = $jh4w5["name"];
				$permission = $jh4w5["permission"];
				$status = $jh4w5["status"];
				$id = $jh4w5["id"];
				?>
					<input type="checkbox" name="CHK_<?php echo $dgh;?>" <?php  if($permission=="on"){ ?>  checked <?php  } ?> value="<?php echo $id; ?>" > &nbsp; <span style=" color:<?php  if($permission=="on"){ echo"green"; }else{ echo"red"; } ?>;" >  <?php echo $status; ?></span> &nbsp;&nbsp; <br>
				<?php 
			} */
			?> </div>
			<br> <center><button type="submit" value="<?php echo $dgh2; ?>" name="UpdatePermisstionUser" class="btn btn-success"> Update Accessibility Setting </Button>
			</center>
			</form>

			</div>
			</div>
			<?php 
		}
	?>

	<?php
		if(isset($_POST["UpdatePermisstionUser"])){
			 	$Limit_count = $_POST["UpdatePermisstionUser"]; 
				$user_id = $_POST["user_id"]; 
				
			for($i=0; $i<=$Limit_count; $i++){
				$dat1= "CHK_";
				$permission ="";
				$dat3=$dat1.$i;
				if(empty($_POST["$dat3"])){	 $data_id ="";   }else 	{   $data_id = $_POST["$dat3"];  }
				  
				//	data_Reset($dbo,$user_id);
				//$SxdgdQK_fj3="UPDATE user_permission SET permission='on' WHERE  user_id='$user_id' AND id='$data_id'  ";
				//if ($dbo->Query($SxdgdQK_fj3)) {  }
				// echo $data_id;  echo"<br>";
			  $Data_part = substr($data_id,0,3)."<br>";
				  $vfgh ="onn"."<br>"; 
				  $jhg = strcmp($Data_part,$vfgh); 
				if( $jhg == 0 ){   $permission="on"; }else{  $permission = "off";  }
					// echo" <b style='color:red'> $permission </b>";
					// echo $permission."<br>";
				$ID_part = substr($data_id,3);	
				$SxdgdQK_fj3="UPDATE user_permission SET permission='$permission' WHERE  user_id='$user_id' AND id='$ID_part'  ";
				if ($dbo->Query($SxdgdQK_fj3)) {  }
			}
			
				
				fun_sucess();
				fun_UserAccesData($dbo,$user_id);
				
		}
	?>
	<?php
		Function data_Reset($dbo,$user_id){
				 
					$SQK_fj1="UPDATE user_permission SET permission='off' WHERE user_id='$user_id' ";
					if ($dbo->Query($SQK_fj1)) {
					//echo $data_id;  echo"<br>";
					}   
		}
	?>
	<?php
		 	/*
				for($i=0;$i<$delete_count;$i++){
					$Fjh="Reporting_emp";
					$Post_variable = $Fjh.$i;
					if(empty($_POST["$Post_variable"])){	 $PostVariable ="";   }else 	{  $PostVariable = $_POST["$Post_variable"];  }   
						$dfjhg="DELETE FROM users_reporting WHERE  user_report_by_id='$USRID' AND user_report_to_id='$PostVariable' ";
						if($dbo->query($dfjhg)){	}
					}
			*/
	?>
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
// $doc_date = new DateTime($GYD5['doc_date']);
// echo $doc_date->format('d-m-Y H:i:s'); 
// apply_leaves
// view_leaves
// history_leaves


?>
  <!-- Date Source is daterangepicker.com --> 
 <!--  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>  -->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?php 
    if(isset($_POST["apply_leaves"])){
		fun_applyLeave($sess_userid,$dbo);
		fun_optionLeave($dbo,$sess_userid);
		 
    }
?>

<?php 
    if(isset($_POST["view_leaves"])){
		$base="single";
		fun_ViewLeave($sess_userid,$dbo,$base);
		fun_optionLeave($dbo,$sess_userid);
    }
?>

<?php 
    if(isset($_POST["history_leaves"])){
		$base="single";
		fun_LeaveHistory($sess_userid,$dbo,$base);
		fun_optionLeave($dbo,$sess_userid);
    }
?>
<?php 
    if(isset($_POST["add_leaves"])){
		//$base="single";
		fun_addLeaves($sess_userid,$dbo,$base);
		fun_optionLeave($dbo,$sess_userid);
    }
?>

<?php 
	function fun_addLeaves ($sess_userid,$dbo,$base){
			?>
				<div class="panel panel-default">
		<div class="panel-heading"> <label>Add Leaves </label> </div>
			<div class="panel-body">
			 <form name="sfd" method="post">
			 <table class="table" style="width:99%;" > 
	  			<tr> 
					<th> Select user  </th>
					<td> 
					<select name="user_name"  required class="form-control" style="width:100%;"  >
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
			<center> <input type="submit" name="add_leave_data_1" class="btn btn-warning" value="View" /> </center>	
				</form>
			</div>
		</div>
			<?php 

	}
?>

<?php 

function fun_addLeaves_2($dbo,$base,$user_name){
	?>
		<form name="sfd" method="post">

<table class="table">
			<tr> 	
				<th style="width:35%;"> Name of Applicant:    </th>
				<td > <?php echo get_user_name($dbo,$user_name); ?> </td>
			</tr> 

			<tr> 	
				<th style="width:35%;"> Designation:    </th>
				<td >  <?php $column="designation"; echo get_user_Data($dbo,$user_name,$column); ?> </td>
			</tr> 

			<tr> 	
				<th style="width:35%;"> Available Leave as on date:    </th>
				<td >
				<table class="table-bordered"    > 
					<tr> 
						<td style=" padding: 5px; "  width="5px">CL</td>
						<td style=" padding: 5px; "  width="5px">EL/PL</td>
						<td style=" padding: 5px; "  width="5px">SL</td>
						<td style=" padding: 5px; "  width="5px">RH</td>
						<td style=" padding: 5px; "  width="px">Others</td>
						<td style=" padding: 5px; "  width="px">Others Leave Nature</td>	
					</tr>
					<tr> 
						<th style=" padding: 5px; "> <?php $leave_type="CL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$user_name); echo $hl; ?> </th>
						<th style=" padding: 5px; "> <?php $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$user_name); echo $hl; ?> </th>	 
						<th style=" padding: 5px; "> <?php $leave_type="SL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$user_name); echo $hl; ?> </th>
						<th style=" padding: 5px; "> <?php $leave_type="RH";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$user_name); echo $hl; ?> </th>	 
						<th style=" padding: 5px; "> <?php $leave_type="Others";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$user_name); echo $hl; ?> </th>
						<th style=" padding: 5px; "> <?php // $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
					
					</tr>
					

				</table> 
				 
				 </td>
			</tr> 
		 
	   

		<tr> 
			<th> Select Leav type </th>
			<td> 
			<select name="Leav_type"  required class="form-control" style="width:100%;"  >
				<option value="">--Select Leav type--</option>
				<option value="CL">CL</option>
				<option value="EL">EL/PL</option>
				<option value="SL">SL</option>
				<option value="RH">RH</option>
				<option value="Others">Others</option>
				 
			</select>
			 </td>
		</tr>

		<tr> 
			<th> Enter no. of leaves </th>
			<td>  <input type="number" min="0" max="36"  name="number_of_leaves" class="form-control" required placeholder="Enter numbers of leaves " /> </td>
		</tr>

		<tr> 
			<th> Comment if any </th>
			<td> <textarea name="comments" paceholder=" comments if any " class="form-control" ></textarea> </td>
		</tr>


	</table>
		 <input type="text" name="user_name" value="<?php echo $user_name;?>" readonly hidden style="display:none;";/>
<center> 

<input type="submit" name="add_leave_data_2" class="btn btn-warning" /> </center>	
		</form>
		<form method="post" >
			<left> <input type="submit" name="add_leaves" class="btn btn-default" value="Back" /> </left>
		 </form>
	<?php 
}

?>

<?php 
	if(isset($_POST["add_leave_data_1"])){
		$user_name = $_POST["user_name"];
		?>
		<div class="panel panel-default">
		<div class="panel-heading"> <label>Add Leaves </label> </div>
			<div class="panel-body">
			<?php fun_addLeaves_2($dbo,$base,$user_name); ?>
		
				</div>
		</div>		
		<?php 
		fun_optionLeave($dbo,$sess_userid);
	}
?>


 
<?php 
	 
	if(isset($_POST["add_leave_data_2"])){
		$user_name = $_POST["user_name"];
		$Leav_type = $_POST["Leav_type"];
		$number_of_leaves = $_POST["number_of_leaves"];
		$comments = $_POST["comments"];
		$laeve_amount = $leave_id ="";
		$SHGFS_ds="SELECT id,laeve_amount FROM leaves_available WHERE user_id='$user_name' AND leave_type='$Leav_type' ";
		foreach($dbo->query($SHGFS_ds)AS $djkfh) { 
			$leave_id = $djkfh["id"];
			$laeve_amount = $djkfh["laeve_amount"];
		} 
		if($leave_id==""){
			$SHG545="INSERT INTO leaves_available (leave_type,laeve_amount,laeve_comment,user_id) VALUE ('$Leav_type','$number_of_leaves','$comments','$user_name')  ";
			if($dbo->query($SHG545)){
			//	echo "<h2> Success ! at Insert </h2>"; 	
			}else { 
			//	echo "<h2> Error ! at Insert </h2>"; 	
			} 
	}else{
		 $Newlaeve_amount = $laeve_amount + $number_of_leaves;
		$DHD_hd="UPDATE leaves_available SET laeve_amount ='$Newlaeve_amount', laeve_comment='$comments' WHERE user_id='$user_name' AND leave_type='$Leav_type' ";
		if($dbo->query($DHD_hd) ){
			//echo "<h2> Success ! at Update </h2>"; 
		}else { //echo "<h2> Error ! at Insert </h2>"; 
			 }
	}
		
		fun_sucess();
		fun_addLeaves_2($dbo,$base,$user_name);
		fun_optionLeave($dbo,$sess_userid);
    }
?>

<?php 
	function fun_ViewLeave($sess_userid,$dbo,$base)
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
					<td>  <?php echo $leave_status = $Sjhg45["leave_status"]; ?> </td>
					<td> <button type="submit" name="View_LeaveDATA" value=" <?php echo $Sjhg45["id"]; ?>" class="btn btn-warning btn-sm" >View </button> /  
						 <button type="submit" name="Revoke_Leave" onclick="return confirm('Are you sure  about Revoke ?');" t value=" <?php echo $Sjhg45["id"]; ?>" class="btn btn-danger btn-sm <?php if($leave_status=="Revoke"){ echo "disabled"; } ?> ">Revoke </button> 
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
	function fun_LeaveHistory($sess_userid,$dbo,$base)
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
				$SJH_sd="SELECT * FROM leave_applications WHERE user_id='$sess_userid' ORDER BY id DESC "; 
					
			break;
			case"multiple":
				$SJH_sd="SELECT * FROM leave_applications  ORDER BY id DESC ";
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
					<td>  <?php echo $leave_status = $Sjhg45["leave_status"]; ?> </td>
					<td> <button type="submit" name="View_LeaveDATA" value=" <?php echo $Sjhg45["id"]; ?>" class="btn btn-warning btn-sm" >View </button> /  
						 <button type="submit" name="Revoke_Leave" onclick="return confirm('Are you sure  about Revoke ?');" t value=" <?php echo $Sjhg45["id"]; ?>" class="btn btn-danger btn-sm <?php if($leave_status=="Revoke"){ echo "disabled"; } ?> ">Revoke </button> 
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
	if(isset($_POST["View_LeaveDATA"])){ 
		$View_Leave = $_POST["View_LeaveDATA"];
		$base="single";
		View_LeaveApp($View_Leave,$dbo,$sess_userid,$base);
		fun_optionLeave($dbo,$sess_userid);
	}
?>

<?php 
	function View_LeaveApp($View_Leave,$dbo,$sess_userid,$base)
	{
		switch($base)
		{
			case"single":
				
			break;
			case"multiple":
				$sess_userid ="";
			break;
		}
		?>
		<div class="panel panel-default">
			<div class="panel-heading"><label> Leave Application Status </label>  </div>
			<div class="panel-body"> 
			<form method="post"> 
			<?php 
				$dgfv_45="SELECT user_id,leave_type,leave_days,leave_from,leave_to,leave_prefix,leave_returnday,leave_remarks,leave_forward,leave_status,on_date FROM leave_applications WHERE id='$View_Leave' ";
				foreach($dbo->query($dgfv_45)AS $hgdc5){
						
				}
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
						<td style="width:35%;"> Available Leave as on date:    </td>
						<td >
						<table class="table-bordered"    > 
							<tr> 
								<td style=" padding: 5px; "  width="5px">CL</td>
								<td style=" padding: 5px; "  width="5px">EL/PL</td>
								<td style=" padding: 5px; "  width="5px">SL</td>
								<td style=" padding: 5px; "  width="5px">RH</td>
								<td style=" padding: 5px; "  width="px">Others</td>
								<td style=" padding: 5px; "  width="px">Others Leave Nature</td>	
							</tr>
							<tr> 
								<th style=" padding: 5px; "> <?php $leave_type="CL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
								<th style=" padding: 5px; "> <?php $leave_type="SL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php $leave_type="RH";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
								<th style=" padding: 5px; "> <?php $leave_type="Others";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php // $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
							
							</tr>
							</table>
							</td >
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


						</table> 
						 
						 </td>
					</tr> 

				</table>
				<?php

				?>
				<center> <input type="submit" name="view_leaves" value="Back" class="btn btn-info" /> </center>
				</form>	 
			</div>
			</div>
		<?php 
	}
?>



<?php 
	if(isset($_POST["Revoke_Leave"])){
		$Revoke_Leave = $_POST["Revoke_Leave"];
		$DSH_dsg=" Update  leave_applications SET leave_status='Revoke' WHERE id='$Revoke_Leave' ";
		if($dbo->query($DSH_dsg) ){
			echo"<script>alert('  Leave Application Revoked Successfully ! '); </script>";
			fun_sucess();	
			$base="single";
			fun_ViewLeave($sess_userid,$dbo,$base);
		}else{ }
		
		
	}
?>

<?php 
	function fun_applyLeave($sess_userid,$dbo){
		$SJhg_465=" SELECT designation,name FROM users WHERE id='$sess_userid' ";
		foreach($dbo->query($SJhg_465) AS $ygfd5 ){
			$designation = $ygfd5["designation"];
			$name = $ygfd5["name"];
		 
		// designation
		?>
			<?php   $CURNTdate = date("m/d/Y");  ?>
		<div class="panel panel-default" style="margin-top:-1.5%;">
  <div class="panel-heading"> <b> Leave Application Form </b> </div>
  <div class="panel-body">    
			<form method="post"> 
				<table class="table">
					<tr> 	
						<td style="width:35%;"> Name of Applicant:    </td>
						<td > <?php echo $name; ?> </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Designation:    </td>
						<td > <?php  echo $designation; ?> </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Available Leave as on date:    </td>
						<td >
						<table class="table-bordered"    > 
							<tr> 
								<td style=" padding: 5px; "  width="5px">CL</td>
								<td style=" padding: 5px; "  width="5px">EL/PL</td>
								<td style=" padding: 5px; "  width="5px">SL</td>
								<td style=" padding: 5px; "  width="5px">RH</td>
								<td style=" padding: 5px; "  width="px">Others</td>
								<td style=" padding: 5px; "  width="px">Others Leave Nature</td>	
							</tr>
							<tr> 
								<th style=" padding: 5px; "> <?php $leave_type="CL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
								<th style=" padding: 5px; "> <?php $leave_type="SL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php $leave_type="RH";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
								<th style=" padding: 5px; "> <?php $leave_type="Others";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>
								<th style=" padding: 5px; "> <?php // $leave_type="EL";  $hl = fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); echo $hl; ?> </th>	 
							
							</tr>
							

						</table> 
						 
						 </td>
					</tr> 

						<tr> 	
						<td style="width:35%;"> Last Availed Leave:    </td>
						<td > <?php    ?> </td>
					</tr> 

					

					<tr> 	
						<td style="width:35%;"> Nature of Leave:    </td>
						<td >
							<table class="table"> 
								<tr>
									<td> Leave Nature: </td>  
									<td> No. of Days: </td>  
								</tr> 
								<tr>
									<td> <select name="leave_type" redquired="required" class="form-control" >
											<option value="">-- Select Leave Nature--</option> 
											<option value="CL">CL</option> 
											<option value="EL">EL/PL</option> 
											<option value="SL">SL</option> 
											<option value="RH">RH</option> 
											<option value="Others">Others</option> 
										</select>
									 </td>  
									<td>  <input type="number" min="1" max="15" name="leaves_days" class="form-control" required="required" placeholder="Enter No. of Days " > </td>  
								</tr>  
							</table>
						 <?php  ?> </td>
					</tr> 

					
					 
					
					<tr> 	
						<td style="width:35%;"> From-To Date: </td>
						<td >
						 

							<script>
							$(function() {
							$('input[name="FromToDate"]').daterangepicker({
								opens: 'left'
							}, function(start, end, label) {
								console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
							});
							});
							</script>
						 <input type="text" name="FromToDate" class="form-control" required="required" placeholder="Enter From Date " > 
						  </td>
					</tr> 

					  

					<tr> 	
						<td style="width:35%;">Saturday(s)/Sunday(s)/Holiday(s),  <br> if any to be prefixed or suffixed to leave: </td>
						<td > <textarea  name="prefixed_suffixed" class="form-control"   placeholder=" If any to be prefixed or suffixed to leave, Please specify here !" ></textarea> </td>
					</tr> 

					<tr> 	
						<td style="width:35%;"> Date of Return: </td>
						<td >
							
								
								<script>
									$(function() {
									$('input[name="ReturnDate"]').daterangepicker({
										"singleDatePicker": true,
										"startDate": " <?php   echo $CURNTdate;  ?>",
										"endDate": "10/01/2018"
									}, function(start, end, label) {
										console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
									});
									});
								</script>

							 
						 <input type="text"  name="ReturnDate" class="form-control" required="required" placeholder="Enter Date of return " >
						   </td>
					
					</tr> 

					<tr> 	
						<td style="width:35%;">Remarks:</td>
						<td > <textarea  name="RemarksforLeave" class="form-control"   placeholder=" " ></textarea> </td>
					</tr> 
					
					 
					<tr> 	
						<td style="width:35%;">Forward to:</td>
						<td >  
								<select name="Forward_To" redquired="required" class="form-control" >
										<option value="">-- Select Forward  To --</option> 
										 <?php
										 	 $DJHG_5="SELECT user_report_to_id FROM users_reporting WHERE user_report_by_id='$sess_userid' "; 
										 		foreach($dbo->query($DJHG_5)AS $DSYGF45){
													$user_report_to_id = $DSYGF45["user_report_to_id"];
													// $id = $DSYGF45["id"];
													?> <option value="<?php echo $user_report_to_id; ?>" ><?php  echo get_user_name($dbo,$user_report_to_id);  ?></option>  <?php 
												 }
										 ?>
									</select>
						 </td>
					</tr> 
				</table>
		<center> <button name="Apply_forL"  class="btn btn-success" type="submit" > Apply </center>
			</form>  
			</div>
</div>
		<?php 
		}
	}
?>

<?php 
//$leave_type="EL";
 
 //echo  fun_GETlaeve_amount($dbo,$leave_type,$sess_userid); 
	function fun_GETlaeve_amount($dbo,$leave_type,$sess_userid)
	{
		$SQL_3g5="SELECT laeve_amount FROM leaves_available WHERE user_id ='$sess_userid' AND leave_type='$leave_type' AND laeve_status='Active' ";
				foreach($dbo->query($SQL_3g5)AS $DH5){
					 	echo $DH5['laeve_amount'];
				}
	}
?>

<?php 
	if(isset($_POST["Apply_forL"])){
		if(empty($_POST["leave_type"])){	 $leave_type ="";   }else 	{  $leave_type = $_POST["leave_type"];  }
        if(empty($_POST["leaves_days"])){	 $leaves_days ="";   }else 	{  $leaves_days = $_POST["leaves_days"];  }
        if(empty($_POST["FromToDate"])){	 $FromToDate =""; 	 }else 	{  $FromToDate = $_POST["FromToDate"];  }
        if(empty($_POST["prefixed_suffixed"])){	 $prefixed_suffixed ="";   }else 	{  $prefixed_suffixed = $_POST["prefixed_suffixed"];  }
        if(empty($_POST["ReturnDate"])){	 $ReturnDate ="";   }else 	{  $ReturnDate = $_POST["ReturnDate"];  }
		if(empty($_POST["RemarksforLeave"])){	 $RemarksforLeave =""; 	 }else 	{  $RemarksforLeave = $_POST["RemarksforLeave"];  }
		// if(empty($_POST["AddressDuringLeave"])){	 $AddressDuringLeave ="";   }else 	{  $AddressDuringLeave = $_POST["AddressDuringLeave"];  }
		if(empty($_POST["Forward_To"])){	 $Forward_To =""; 	 }else 	{  $Forward_To = $_POST["Forward_To"];  }
		
		//echo $FromToDate; 	echo"<br>";
		 		$FromDate_1 = substr($FromToDate, 0, 10) ;
				$FromDate = new DateTime($FromDate_1);
			    $From_Date = $FromDate->format('Y-m-d'); 

		//echo"<br>";
			$ToDate_1 = substr($FromToDate, -10) ;
				$ToDate = new DateTime($ToDate_1);
			    $To_Date = 	$ToDate->format('Y-m-d'); 
		//echo"<br>";
		//$doc_date = new DateTime($GYD5['doc_date']);
		$ReturnDate_1 = new DateTime($ReturnDate);
		 $leave_returnday =  $ReturnDate_1->format('Y-m-d');

		 
		$SGFD_saf="INSERT INTO leave_applications (user_id,leave_type,leave_days,leave_from,leave_to,leave_prefix,leave_returnday,leave_remarks,leave_forward,on_date) 
					 VALUES  ('$sess_userid','$leave_type','$leaves_days','$From_Date','$To_Date','$prefixed_suffixed','$leave_returnday','$RemarksforLeave','$Forward_To','$aajki_date') ";
		 
		if($dbo->query($SGFD_saf)){
				echo"<script>alert('  Leave Application submitted  Successfully ! '); </script>";
				fun_sucess();	
				$base="single";
				fun_ViewLeave($sess_userid,$dbo,$base);

			}else{
			//	echo" Error while Entry !";
				fun_fail();
				fun_optionLeave($dbo,$sess_userid);
			}								  
	}
?>

 
 <?php 
        function fun_optionLeave($dbo,$sess_userid){
                        ?>
                                <br>   
                    <h2>Leave(s) option </h2>
                        <div class="row"  style="margin-left:2%;" >
                            <form name="dfg" method="post">
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="apply_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="apply_leaves" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">Apply leaves    </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="view_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_leaves" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">View Applications   </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="history_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="history_leaves" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">Applications History </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="view_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_profile" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">Dashboard </button> </div>
                            </form>
                        </div>
                        <?php 
                    }
                ?>



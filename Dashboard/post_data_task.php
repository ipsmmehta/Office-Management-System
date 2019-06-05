
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
	if(isset($_POST["update_task"]))
		{
			?>
			 <SCRIPT TYPE="text/JavaScript">
	
	function Checkfiles()
	{
	var fup = document.getElementById('tsknm');
	var fup2 = document.getElementById('time_id');
	var status = document.getElementById('tsknm2');
	var remarks = document.getElementById('task_remarks');
	var Time_val = Other_cat = Task_name = Task_status = task_remarks= "";

	Task_status = status.value;
	Task_name = fup.value;
	Time_val = fup2.value;
	task_remarks = remarks.value;
	/*
	if(task_remarks=="")
	{
		alert("Please specify Remarks  for Task ! ");
			document.getElementById('task_remarks').style.backgroundColor = '#bfa';
					
					return false;
	}
	else
	{ }
	*/

	if(Task_name=="")
	{
		// return true;
		var val2 = document.getElementById('other_catagory');
		Other_cat = val2.value;
		
		if(Other_cat=="")
				{
					alert("Please specify Details for Task / Other task  ");
					document.getElementById('other_catagory').style.backgroundColor = '#bfa';
					document.getElementById('tsknm').style.backgroundColor = '#bfa';
					return false;
				}
	}
	else
	{ }

	
	if(Task_status=="")
	{
		// return true;
		var val22 = document.getElementById('other_catagory2');
		Other_cat2 = val22.value;
		
		if(Other_cat2=="")
				{
					alert("Please specify Details for, Task Status or If pending with someone else ");
					document.getElementById('tsknm2').style.backgroundColor = '#bfa';
					document.getElementById('other_catagory2').style.backgroundColor = '#bfa';
					return false;
				}
	}
	else
	{ }


			
	if(Time_val=="")
	{
		alert("Enter Valid value for Time in hh:mm Format !");
		document.getElementById('time_id').style.backgroundColor = '#bfa';
		return false;
	}else {
		var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(fup2.value);
		if (isValid) {
				 
				document.getElementById('time_id').style.backgroundColor = '#bfa';
			} else {
				document.getElementById('time_id').style.backgroundColor = '#bfa';
				alert("Enter Valid value for Time in hh:mm Format  !");
				return false;
			}
	}

	
	}
</script>
			<div class="panel panel-default">
				<div class="panel-heading"> 
				 <label> Update Task</label>
				</div>
				<div class="panel-body">
				<form  name="sdgsdf" method="post" onsubmit="return Checkfiles();"  >
	<table class="table table-hover">
     
    <tbody>
      <tr>
        
        <td>
			<label> Task <b style="color:red;">*</b></label><BR> <div style="margin-left:2%;">
			<select name="task_name" class="form-control" id="tsknm" >
				<option value="" >--Select Options--</option>
				<?php 
					//$SQL_hgd="SELECT * FROM task_list WHERE NOT extra ='Complete' ORDER BY ID DESC "; $sess_userid
					$SQL_hgd="SELECT task_name,id FROM task_list WHERE id IN (SELECT task_ID FROM task_assign WHERE assign_to='$sess_userid' ) ORDER BY ID DESC ";
					foreach($dbo->query($SQL_hgd) AS $GFG45)
						{
							?> <option value="<?php echo $GFG45["id"]; ?>" ><?php echo $GFG45["task_name"]; ?></option> <?php 
					 	}
				?>
				<option value="" >Other </option> 			
			</select>
			 
			<p>If Other, Specify here
			<input type="text" name="Issuedby_other" id="other_catagory" Placeholder="If Other Enter Details here" class="form-control" /></p> 
		 </div>
		</td>
       </tr>
 
      <tr>
       
        <td>
		<label> Task Status  <b style="color:red;">*</b></label> <br> <div style="margin-left:2%;">
			<select name="task_status" class="form-control" id="tsknm2">
				<option value="" >--Select Options--</option>
				<option value="Complete" >Complete</option>
			 	<option value="Pending with self (<?php echo $sess_name; ?>)" >Pending with self (<?php  echo $sess_name; ?>) </option>
				 <option value="" >Pending with someone else </option>
     		</select>
				<p>If pending with someone else, Specify here
			<input type="text" name="Status_other" id="other_catagory2"  Placeholder="If pending with someone else, Enter Details here" class="form-control" /></p> </div>
		</td>
       </tr>
      <tr>
         
        <td>
		<label> Time Spent on the Task ( in Hrs for eg: 01:05) <b style="color:red;">*</b></label> <br> <div style="margin-left:2%;">
	 	<input name="task_time" required="required" Placeholder="For eg: 01:05 " class="form-control"  id="time_id" />
		
		</td>
       </tr> <tr>
        
        <td>
			<label> Remarks <b style="color:red;">*</b></label> <br> <div style="margin-left:2%;">
		<textarea name="task_remarks"  id="task_remarks" required="required" Placeholder="Enter Remarks here " class="form-control" /></textarea>
				<script>	CKEDITOR.replace( 'task_remarks' );	</script> </div>
		</td>
       </tr>
    </tbody>
  </table>
  <center> <input type="submit" name="add_my_task" class="btn btn-success" /> </center>

  </form>
				</div>
			</div> 
	
			<h2>Task's options </h2>
		<div class="row"  style="margin-left:2%;" >
			 <form name="dfg" method="post">
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_assign";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_assign" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">Assign Task </button> </div>
			</form>
		</div>
	
	<br>
			 <?php 
		}
?>

<?php 
	if(isset($_POST["add_my_task"]))
	{
		if(empty($_POST["task_name"]))	    {	$task_name =NULL; $Issuedby_other = $_POST["Issuedby_other"];	 }else 	{  $task_name = $_POST["task_name"];  }
		if(empty($_POST["task_status"]))	{	$task_status = $_POST["Status_other"]; 	 }else 	{  $task_status = $_POST["task_status"];  }
		if(empty($_POST["task_time"]))	    {	$task_time = ""; 	 }else 	{  $task_time = $_POST["task_time"];  }
		if(empty($_POST["task_remarks"]))	{	$task_remarks = "";  }else 	{  $task_remarks = $_POST["task_remarks"];  }
		//echo $task_remarks."@@".$task_time."<@@>".$task_status."<@@>".$task_name."<br>";
		if($task_name==NULL){
			//echo" ghass ";
			$SQL_ini25="INSERT INTO task_status (task_ID, assign_to,task_status,task_remarks,on_date,timespent,task_name,subtask_name) 
				VALUE ('00','$sess_userid','$task_status','$task_remarks','$aajki_date','$task_time','$Issuedby_other','Other') "; 
					if($dbo->query($SQL_ini25)){ fun_sucess(); }else{ fun_fail(); }

		}else{
			$Count_Get="";
			$SQl_GEtcount="SELECT id FROM task_status WHERE task_ID='$task_name' AND assign_to='$sess_userid' AND task_status IS NULL AND task_remarks IS NULL ";
			foreach($dbo->query($SQl_GEtcount)AS $gf7){
				  $Count_Get = $gf7["id"];
			}
			
			if($Count_Get=="")
			{ 
				 $task_name_org = $associated = $id_tsk = NULL;
				 // Weite here Insert Query 
				//$Update_hhg75="UPDATE task_status SET task_remarks='$task_remarks', task_status='$task_status',timespent='$task_time' WHERE id='$Count_Get'  ";
				$SQL_ghfd="SELECT task_name,associated,id FROM task_list WHERE id='$task_name' ";
				foreach($dbo->query($SQL_ghfd) AS $SGHJ5 ){
					 $id_tsk = $SGHJ5["id"];
					  $task_name_org = $SGHJ5["task_name"];
					  $associated = $SGHJ5["associated"]; }
					 
				if($associated=="self"){  $associated=NULL; 
					
					$SQL_ini="INSERT INTO task_status (task_ID,assign_to,task_status,task_remarks,on_date,timespent,task_name,subtask_name) 
					VALUE ('$task_name','$sess_userid','$task_status','$task_remarks','$aajki_date','$task_time','$task_name_org','$associated') "; 
					if($dbo->query($SQL_ini)){ fun_sucess(); }else{ fun_fail(); }
				}else{
					//echo" ghass ";
					//echo "'$task_name','$sess_userid','$task_status','$task_remarks','$aajki_date','$task_time','$associated hh ','$task_name_org gg ' ";
					$SQL_ini2="INSERT INTO task_status (task_ID,assign_to,task_status,task_remarks,on_date,timespent,task_name,subtask_name) 
					VALUE ('$task_name','$sess_userid','$task_status','$task_remarks','$aajki_date','$task_time','$associated','$task_name_org') "; 
					if($dbo->query($SQL_ini2)){ fun_sucess(); }else{ fun_fail(); }
				}
				
				
			}else{ 
				//echo" Write here update Query ";
				 
				$Update_hhg7="UPDATE task_status SET task_remarks='$task_remarks', task_status='$task_status',timespent='$task_time',on_date='$aajki_date' WHERE id='$Count_Get'  ";
				if($dbo->query($Update_hhg7)){ fun_sucess(); }else{ fun_fail(); }
			}

			$SQL_Update_task="";
		}
		$base="no_limit";
		View_My_recent_task($sess_userid,$dbo,$base);
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
	if(isset($_POST['Create_task']))
	{
		 
		 ?>
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<FORM method="post" >
					<input type="submit" name="Create_task" value="Create Task" class="btn btn-default" / >
					<input type="submit" name="Crate_Subtask" value="Create Sub-Task" class="btn btn-default" / >
				</form>
			</div>
			<div class="panel-body">
			<form class="form-inline" name="sdffd" method="post">
				<label>Enter task  Name: <span id="require">*</span></label> <br>
				<div style="margin-left:1%; width:97%;">
					<input style="width:100%;" type="text" name="task_name" class="form-control"   placeholder="Enter task name...." required />
				 </div>
				
<br>
				<center> <input type="submit" name="Create_taskdata" class="btn btn-warning" / >  </center>
			</form>
			</div>
		</div> 

		<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
		 	<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_assign";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_assign" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">Assign Task </button> </div>
		</form>
	</div>

<br>
		 <?php 
	}
?>

<?php 
	if(isset($_POST["task_assign"]))
	{ 
		?>
	<script type="text/javascript">
 
 function Checkdata()
	   {
		//alert(" Please specify Details for at least one option i.e. for Task or SubTask !");

		
		var fup = document.getElementById('task_name');
		var val2 = document.getElementById('subtask_name');
		
		var Time_val = Other_cat = Task_name = "";
		
		Task_name = fup.value;
		Other_cat = val2.value;
		
		if(Task_name=="")
		{
			
			if(Other_cat=="")
					{
						alert(" Please specify Details for at least one option i.e. for Task or SubTask !");
						document.getElementById('subtask_name').style.backgroundColor = '#bfa';
						document.getElementById('task_name').style.backgroundColor = '#bfa';
						return false;
					}
		}
		else
		{ }
	  

		//	return( true );
	   }
 </script>

<script type="text/javascript" src="myj.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#task_name").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	//alert(id);
		$.ajax
		({
			type: "POST",
			url: "get_subTask.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#subtask_name").html(html);
			} 
		});
	});
	
	
	
	
});
</script>
		 
		<div class="panel panel-default">
			<div class="panel-heading"> 
		 		<label> Assign Task </label> 
			</div>
			<div class="panel-body">
			<form class="form-inline" name="sdffd" method="post" onsubmit="return Checkdata();"  >
	
			<label>Select User: <span id="require">*</span></label> <br>
				<div style="margin-left:1%; width:97%;">
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
				</div>
				<p>Select at least one option from Task and Sub-Task List</p>
			<label>Select task: </label> <br>
				<div style="margin-left:1%; width:97%;">
					<select name="task_name" id="task_name"  class="form-control" style="width:100%;"  >
						<option value="">--Select task--</option>
						<?php 
							$SKJH_dsf="SELECT task_name FROM task_list WHERE task_type='parent' ORDER BY id DESC";
							foreach($dbo->query($SKJH_dsf)AS $UHF)
							{
								$task_name = $UHF['task_name'];
								 ?> <option value="<?php echo $task_name; ?>"><?php echo $task_name; ?></option><?php 
							}
						?>	
					</select>
				</div>

				<label>Select Sub-task: </label> <br>
				<div style="margin-left:1%; width:97%;">
					<select name="subtask_name" id="subtask_name"  class="form-control" style="width:100%;"  >
						<option value="">--Select sub-task--</option>
						<?php 
							$SKJH_dsf="SELECT task_name FROM task_list WHERE task_type='sub' ORDER BY id DESC";
							foreach($dbo->query($SKJH_dsf)AS $UHF)
							{
								$task_name = $UHF['task_name'];
								 ?> <option value="<?php echo $task_name; ?>"><?php echo $task_name; ?></option><?php 
							}
						?>	
					</select>
				</div>

				 
				
<br>
				<center> <input type="submit" name="Assign_taskdata" class="btn btn-warning" / >  </center>
			</form>
			</div>
		</div> 
		<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
		 		<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
				<div class="col-sm-3"> <button type="submit" <?php $val_name ="Create_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="Create_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">  Create Task / Sub-Task </button> </div>
			</form>
	</div>
		 <?php 
		 
	}
?>

<?php 
	if(isset($_POST["Assign_taskdata"])){

		//$user_name = $_POST["user_name"];
		//$task_name = $_POST["task_name"];
		//$subtask_name = $_POST["subtask_name"];
		$task_ID = NULL;
		if(empty($_POST["user_name"]))	{	$user_name = ""; 	 }else 	{  $user_name = $_POST["user_name"];  }
		if(empty($_POST["task_name"]))	{	$task_name = ""; 	 }else 	{  $task_name = $_POST["task_name"];  }
		if(empty($_POST["subtask_name"]))	{	$subtask_name = ""; 	 }else 	{  $subtask_name = $_POST["subtask_name"];  }
		// echo $user_name."<br>".$task_name."<br>".$subtask_name; 
	
		if(!$subtask_name==""){ $SQL_get_task="SELECT id FROM task_list WHERE task_name='$subtask_name' ";  }
			else{ $SQL_get_task="SELECT id FROM task_list WHERE task_name='$task_name' "; }
			foreach($dbo->query($SQL_get_task) AS $HGF65 ){
				 	$task_ID = $HGF65["id"];
				}
 
		$SSS_UPDATE=" INSERT INTO task_status (task_name,subtask_name,on_date,task_ID,assign_to) VALUE
			('$task_name','$subtask_name','$aajki_date','$task_ID','$user_name') ";
			if($dbo->query($SSS_UPDATE))
			{
			/*	if(!$subtask_name==""){ $SQL_tskupdate="UPDATE task_list SET assign_to='$user_name' WHERE task_name='$subtask_name' "; }
				else{ $SQL_tskupdate="UPDATE task_list SET assign_to='$user_name' WHERE task_name='$task_name' "; }
				if($dbo->query($SQL_tskupdate)){}
				*/
			$SJWK_77="INSERT INTO task_assign (task_ID,assign_to,on_date)VALUE ('$task_ID','$user_name','$aajki_date') ";
			if($dbo->query($SJWK_77)){}
				fun_sucess();	
			}else{
				fun_fail();
			}
		 
	}
?> 


<?php 
	if(isset($_POST['Crate_Subtask']))
	{
		 
		 ?>
		<div class="panel panel-default">
			<div class="panel-heading"> 
			<FORM method="post" >
					<input type="submit" name="Create_task" value="Create Task" class="btn btn-default" / >
					<input type="submit" name="Crate_Subtask" value="Create Sub-Task" class="btn btn-default" / >
				</form>
			</div>
			<div class="panel-body">
			<form class="form-inline" name="sdffd" method="post">
			<label>Select task  Name: <span id="require">*</span></label> <br>
				<div style="margin-left:1%; width:97%;">
					<select name="task_name" required class="form-control" style="width:100%;"  >
						<option value="">--Select Sub-tasks--</option>
						<?php 
							$SKJH_dsf="SELECT task_name FROM task_list WHERE task_type='parent' ORDER BY id DESC";
							foreach($dbo->query($SKJH_dsf)AS $UHF)
							{
								$task_name = $UHF['task_name'];
								 ?> <option value="<?php echo $task_name; ?>"><?php echo $task_name; ?></option><?php 
							}
						?>	
					</select>
				</div>
				<label>Enter Sub-task  Name: <span id="require">*</span></label> <br>
				<div style="margin-left:1%; width:97%;">
					<input style="width:100%;" type="text" name="subtask_name" class="form-control"   placeholder="Enter Sub-task name...." required />
				 </div>
				
<br>
				<center> <input type="submit" name="Create_subtaskdata" class="btn btn-warning" / >  </center>
			</form>
			</div>
		</div> 
		<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
		 	<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_assign";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_assign" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">   Assign Task </button> </div>
		</form>
	</div>
		 <?php 
	}
?>

<?php
	if(isset($_POST['Create_subtaskdata']))
	{	$task_name = $_POST['task_name'];
		$subtask_name = $_POST['subtask_name'];
		$ID_Avialable = NULL;
		$SQL_hdsg="SELECT id FROM task_list WHERE task_name='$subtask_name' AND task_type='sub' ";
		foreach($dbo->query($SQL_hdsg)AS $hggf)
		{
			$ID_Avialable =	$hggf['id'];
		}
		if($ID_Avialable==NULL)
		{
		  $SQL_jhfk="INSERT INTO task_list (associated,task_name,on_date,created_by,task_type) VALUES 
		  			('$task_name','$subtask_name','$aajki_date','$sess_username','sub') ";
			if($dbo->query($SQL_jhfk))
			{
					fun_sucess();
			}else
			{
				fun_fail();
			}
		}else{
			fun_allreadyExit();
		}
		
	}
?>

<?php
	if(isset($_POST['Create_taskdata']))
	{	$task_name = $_POST['task_name'];
		$ID_Avialable = NULL;
		$SQL_hdsg="SELECT id FROM task_list WHERE task_name='$task_name'";
		foreach($dbo->query($SQL_hdsg)AS $hggf)
		{
			$ID_Avialable =	$hggf['id'];
		}
		if($ID_Avialable==NULL)
		{
			
			$SQL_jhfk="INSERT INTO task_list (task_name,created_by,on_date) VALUES ('$task_name','$sess_username','$aajki_date') ";
			if($dbo->query($SQL_jhfk))
			{
					fun_sucess();
			}else
			{
				fun_fail();
			}
		}else{
			fun_allreadyExit();
		}
		
	}
?>

<?php 
	if(isset($_POST['view_task']))
	{
		//searc_view_task ($sess_username,$dbo);
		
		 ?>
		<div class="panel panel-default">
		<div class="panel-heading"><strong> Task : </strong> </div>
		<div class="panel-body"> 
		<?php 
		$base="no_limit";
		 View_My_recent_task($sess_userid,$dbo,$base);
		 
		?>
		<hr><br>
		</div>
	</div>
			<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
		 	<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_profile" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">    View Profile </button> </div>
		</form>
	</div>

		 <?php 
	}
?>



<?php 
	if(isset($_POST['task_summary']))
	{  
		fun_task_summary($dbo,$sess_userid);
		funTask_options ();
		
	}
?>

 <?php 
		if(isset($_POST["ViewTASKSUMMARY"])){
			    $TASKSUMMARYuserid = $_POST["ViewTASKSUMMARY"];
				fun_task_summary($dbo,$TASKSUMMARYuserid);
				dashboardProfileOptions();

				?>	

				<?php 
		}
	 ?>

<?php 
	function fun_task_summary($dbo,$sess_userid){
		?> 
		<div class="panel panel-default">
		<div class="panel-heading"><strong> Task Summary </strong> </div>
		<div class="panel-body">   
		<?php 
		 $SSQ_dfj="SELECT id,task_name FROM task_status WHERE assign_to='$sess_userid' GROUP BY task_name ";
		 foreach($dbo->query($SSQ_dfj)AS $DF45){
			//	echo $DF45["id"]; echo "-----".$DF45["task_name"]; echo"<br>";
			   $task_name = $DF45["task_name"];
			?>
			 
			<div class="row" >
				<div class="col-sm-6"><span style="font-size:25px; color:green;"> <?php echo $task_name; ?></span>  </div>
				<div class="col-sm-6" align="right" > Total Time Spent: 
					<?php 	$SQL_sum_time="SELECT sec_to_time(sum(time_to_sec(timespent))) AS timespt FROM task_status WHERE task_name='$task_name' ";
						 	foreach($dbo->query($SQL_sum_time) AS $HJFGH89)
								{
									echo "<b>".$HJFGH89["timespt"]."</b>";
								}
					?>
				</div>
			</div>
			<span style='font-size:15px;' ><b>Details:</b></span>
			<?php 
			$SSQ_dfj5="SELECT id FROM task_status WHERE task_name='$task_name' ";
			foreach($dbo->query($SSQ_dfj5)AS $DF455){
				 $task_ID = $DF455["id"]; //echo"<br>";
				 
				 $base ="Summary";
				
				 display_task_report($task_ID,$dbo,$base);
				
			}
			echo"<br><br>  	 ";
			
		 }
		// display_task_report($tasktitle_asid,$dbo);
		?>
		</div>
		</div>
 		<?php 
	}
?>


<?php 
	function funTask_options (){
			?>
				<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
			<div class="col-sm-3"> <button type="submit" name="view_task" style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
			<div class="col-sm-3"> <button type="submit" name="update_task"  style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
			<div class="col-sm-3"> <button type="submit" name="task_summary" style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" name="view_profile" style="width:100%; height:95px;" class="btn btn-info">View Profile  </button> </div>
		</form>
	</div>
			<?php 
	}
?>

<?php 
	if(isset($_POST['view_individual']))
	{
		echo $user_name = $_POST['view_individual'];

	}
?>


 


 

<?php  
	if(isset($_POST["view_individual_task"])){
		?> 
		<div class="panel panel-default">
		<div class="panel-heading"><strong> Task : </strong> </div>
		<div class="panel-body"> 
		<?php 

		$Task_ID = $_POST["view_individual_task"];
		$base ="Single";
		display_task_report($Task_ID,$dbo,$base);
		?>
		<hr><br>
		</div>
	</div>
			<h2>Task's options </h2>
	<div class="row"  style="margin-left:2%;" >
	 	<form name="dfg" method="post">
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Task</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Task </button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-success">View Task Summary</button> </div>
			<div class="col-sm-3"> <button type="submit" <?php $val_name ="view_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_profile" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">    View Profile </button> </div>
		 </form>
	</div>

	
		<?php

	}
?>

<?php
	function display_task_report($tasktitle_asid,$dbo,$base)
	{
		//echo $base;

		$SQL_ehx="SELECT * FROM task_status WHERE id ='$tasktitle_asid' ";
		foreach($dbo->query($SQL_ehx)AS $HGFD5)
			{
				$task_name = $HGFD5["task_name"];
				$subtask_name = $HGFD5["subtask_name"];
				$on_date = $HGFD5["on_date"];
				$timespent = $HGFD5["timespent"];
				$task_remarks = $HGFD5["task_remarks"];
				$task_status = $HGFD5["task_status"];
				
				$assign_to = $HGFD5["assign_to"];
				$newdate = date("Y-m-d", strtotime($on_date));
				$bywhome5 = get_user_name($dbo,$assign_to);
				
				$created_by = $org_on_date =NULL;
				$sql_HF="SELECT created_by,on_date FROM task_list WHERE task_name='$task_name' ";
				foreach($dbo->query($sql_HF)AS $HG45){
					$created_by = $HG45['created_by'];
					$org_on_date = $HG45['on_date'];
				}
				$bywhome = get_user_name($dbo,$created_by);
				$orgnewdate = date("Y-m-d", strtotime($org_on_date));
				if($base=="Single"){
						?><h3 style="color:green;"> <?php echo $task_name; ?></h3>
						<div style="color:#A9A9A9;"  title="   Task is created by <?php echo $bywhome; ?> on <?php echo $on_date; ?> " > <?php echo $bywhome5;  ?>, <?php echo $orgnewdate; ?></div>
						<hr> 
			<table class="table-hover" style="width:100%;">
					<tr>
						<td style="width:20%;" > Status: </td>
						<td>  <?php 
							 
										switch($task_status)
										{
											
											case"Complete":
												echo" <span style='color:green;' > ";
											break;
											
											case"Initial State":
												echo" <span style='color:red;' > ";
											break;
											default:
											echo" <span style='color:orange;' > ";
											break;
										}
										echo $task_status."</span>";
								 
								 
							  ?> </td>
						<td> Total Time Spent: </td>
						<td> <?php 
						echo $timespent;
							 /*	$SQL_sum_time="SELECT sec_to_time(sum(time_to_sec(timespent))) AS timespt FROM task_status WHERE parent_task='$tasktitle_asid' ";
						 	foreach($dbo->query($SQL_sum_time) AS $HJFGH89)
								{
									echo "<b>".$HJFGH89["timespt"]."</b>";
								}
								*/
						?> </td>
					</tr>
			
			</table>
			<hr>
			<span style="font-size:15px;" ><b>Details:</b></span>			
						<?php 
				}
			?> 
			
			 
			
			
			
				
			  <?php 
			  
					 ?> 
						 
						 	<div class="row" style="margin-left:2%;">
							  <div class="col-sm-1" style="//color:#A9A9A9;" > 
								<?php 
									 $submittion_date5 =$on_date; 
									 $newday = date("d", strtotime($submittion_date5));
									 $newmonth = date("M", strtotime($submittion_date5));
									 echo "<span style='color:#A9A9A9; font-size:25px;'>".strtoupper($newmonth)."</SPAN>";
									 echo "<br><span style='font-size:25px;'>".$newday."</span>";
									
								
								?>
							  </div>
							  <div class="col-sm-11">
							  <br>
								<?php 
								
								 if(!$subtask_name==""){
										?>  <b style="color:green;"> Sub-Task: </b> <b><?php echo $subtask_name; ?></b> <?php 
								 } 
								
								?> 
								 <div style="margin-left:1%;"><?php echo $task_remarks; ?></div>
								<div class="row">
								  <div class="col-sm-3" style="color:#A9A9A9;" title="Time Spent" > <span  class="glyphicon glyphicon-time"></span> <?php echo $timespent; ?> 
								  <br><div style="margin-left:-2%;">	<?php 
							 
									switch($task_status)
									{ case"Complete": echo" <span style='color:green;' > ";
										break;
										case"Initial State": echo" <span style='color:red;' > ";
										break;
										default: echo" <span style='color:orange;' > ";
										break;  } echo $task_status."</span>";   ?>
									</div>
								   </div>
								  <div class="col-sm-9"><div align="right" style="color:#A9A9A9;"  title=" <?php echo $bywhome5; ?> has updated task on <?php echo $submittion_date5; ?> " > <span class="glyphicon glyphicon-user"></span> <?php echo $bywhome5; ?>, <?php echo $submittion_date5; ?></div> </div>
								</div>
							  </div>
							</div>
							
						<hr>
					 <?php 
	}		  
		 
	}
?>
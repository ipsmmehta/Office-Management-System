
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
	function get_user_ID($dbo,$user_name)
	{
		
		$SQL_ehx="SELECT id FROM users WHERE name ='$user_name' ";
		foreach($dbo->query($SQL_ehx)AS $HGFD5)
			{
				return	$id = $HGFD5["id"];
			}
			   
	}
?>
 
 <?php 
	function get_user_name($dbo,$user_id)
	{
		
		$SQL_ehx="SELECT name,email FROM users WHERE id ='$user_id' ";
		foreach($dbo->query($SQL_ehx)AS $HGFD5)
			{
				return	$name = $HGFD5["name"];
				$email = $HGFD5["email"];
			}
			   
	}
?>

<?php 
	function get_user_Data($dbo,$user_id,$column)
	{
		
		$SQL_ehx="SELECT $column FROM users WHERE id ='$user_id' ";
		foreach($dbo->query($SQL_ehx)AS $HGFD5)
			{
				return	$name = $HGFD5["$column"];
			}
			   
	}
?>

<?php 
    function fun_sucess()
    {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong>  
        </div>
        <?php 
	}
	
    function fun_fail()
    {
    ?>
    <div class="alert alert-danger">
        <strong>Error While Action</strong>
     </div>
    <?php 
	}
	function fun_allreadyExit()
	{
		?>
		<div class="alert alert-info">
			<strong> Record already exists in database with specified key </strong>
		</div>
		<?php 
	} 
?>


<?php 
  		function fun_permission($dbo,$val_name,$sess_userid){
              $SQL_permission="SELECT permission FROM user_permission WHERE user_id='$sess_userid' AND name='$val_name'  ";
             	 foreach($dbo->query($SQL_permission)AS $P_data){
              		return  $permission = $P_data["permission"];
			  }
			}

?>



<?php /*
  function permission_dump($dbo,$user_id,$name,$status){
       $SFBf="INSERT INTO user_permission (user_id,name,status) VALUES ('$user_id','$name','$status') ";
       if($dbo->query($SFBf)){ echo"Success";  }else{ echo"Error while exe."; }
  }*/
?>
	
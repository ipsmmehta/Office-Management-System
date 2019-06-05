 
<?php 
    include('../apps/config.php'); 
?> 
<?php 
	$username =  $password = $user_hash_passwd = NULL;
		if(isset($_POST["login_authi7d55"])) 
		{
			session_start();

			
			if(isset($_POST['email'])){
				   $username = $_POST['email'];
			}
			if (isset($_POST['password'])) {
				   $password = $_POST['password'];

			}
			//echo"<br>";
			$Counter_val = $cnt = $Available =0;
			
			$SQL_access_check_avail=" SELECT count(*) FROM users WHERE email='$username' AND status = 'enable' ";
				foreach($dbo->query($SQL_access_check_avail)AS $GH5)
				{
					$Available = $GH5["0"];
				}
				if($Available==0)
				{
                   // echo "I am here";
					// header('location:http://172.16.1.63/OMS_2/Login/?err=1');
					header('location:'.$Assress_IP.'/Login/?err=1');
				}else{
			
				$SQL_access=" SELECT * FROM users WHERE email='$username' AND status = 'enable' ";
				foreach($dbo->query($SQL_access) AS $GE_T)
					{
						   $user_hash_passwd = $GE_T["password"];
					
					//echo"<br>";
						if(password_verify($password,$user_hash_passwd))
							{
								// $cnt=$cnt+1;
								// echo "TRUE ";
								session_regenerate_id();
								$_SESSION['sess_userid'] = $GE_T['id'];
								$_SESSION['sess_name'] = $GE_T['name'];
								$_SESSION['sess_username'] = $GE_T['email'];
							 	$_SESSION['sess_userrole'] = $GE_T['role'];
							    $_SESSION['sess_designation'] = $GE_T['designation'];
								$_SESSION['sess_lastlogin_at'] = $GE_T['lastlogin_at'];
								$_SESSION['sess_created_at'] = $GE_T['created_at'];
                                $_SESSION['sess_userlogincountt'] = $GE_T['log_count'];
                                $_SESSION['sess_useractive'] = $GE_T['active'];
                                
								session_write_close();
								$role_x = $GE_T['role'];
								$username_x =  $GE_T['email'];
								$id_x =  $GE_T['id'];
								$Counter_val =  $GE_T['log_count'];
								$Counter_val = $Counter_val+1;
                               
                                $sql=" UPDATE users set
												lastlogin_at ='$aajki_date',				
												log_count ='$Counter_val'
												WHERE id ='$id_x' ";
											if($dbo->query($sql))
												{
                                                     // header('location: index_doc.php?my_post=f');
                                                   //  echo"updated  data ";						
												}
												else{
												//	echo"Errr while data updation";
                                                }
                                                 header('location: ../Dashboard/');	  
                               /*                 
								switch($role_x)
									{   
										case"admin":
										case"itra":
										case"pi":
										case"co_pi":
										case"institute_pi":
										case"student":
											$sql="UPDATE itradataadmin set
												last_log ='$aajki_date',				
												log_count ='$Counter_val'
												WHERE  id ='$id_x' ";
											if($dbo->query($sql))
												{
													 // header('location: index_doc.php?my_post=f');						
												}
												else{
													//echo"Errr while data updation";
												}
										//	include('../../adminhome.php');
										   header('location: ../../adminhome.php');	
										break;
										
                                    }
                                    */
							}
							else
								{
								  //  header('location:http://172.16.1.63/OMS_2/Login/?err=1');
								  header('location:'.$Assress_IP.'/Login/?err=1');
								}
					}	
				}					
	
		}
 ?>
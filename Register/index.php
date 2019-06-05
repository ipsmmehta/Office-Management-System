<?php  ob_start(); ?>
<?php include('../navbar.php'); ?> 
<?php include('../apps/config.php');   ?>

<div class="container">
                   <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" onsubmit="return validate_Registerdata(); "  >
                        <input type="hidden" name="_token" value="YbKZ9PlSvBXNoz0fV79iDnoP9XIvo7TtgxdyVWhq">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required  autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value=""  required  >

                                                            </div>
                        </div>
                        
                      

                        <div class="form-group">
                            <label for="Designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                            <select name="designation" id="designation" class="form-control"  required >
                                 <option value="">-- Select Designation here --</option>
                                  <?php 
                                        $SQL_GET_Desg="SELECT designation FROM action_list ORDER BY action_list.id ASC ";
                                        foreach($dbo->query($SQL_GET_Desg) AS $HGF)
                                        {
                                            ?><option value="<?php echo $HGF['designation']; ?>"><?php echo $HGF['designation']; ?></option> <?php 
                                        }
                                  ?>
                             </select>
                                
                        </div>
                        </div>



                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required  >

                                                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="hash_Registernew"  >
                                    Register
                                </button>
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
    <?php 
        if(isset($_POST['hash_Registernew']))
        {
            $token = $_POST['_token'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $designation = $_POST['designation'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];

            $availability = NULL;
            $Check_availability ="SELECT count(*) FROM users WHERE email='$email' ";
            foreach($dbo->query($Check_availability) AS $DG5 )
            { $availability = $DG5['0']; }
             if($availability==0)
             {
               //  echo $availability;
               $var_cmp2=strcmp($password,$password_confirmation); 
               if($var_cmp2==0){
                   $hash_password = password_hash( $password, PASSWORD_BCRYPT);
                   try
                   {
                    $SQL_REGs="INSERT INTO users ( name, email,designation,password,remember_token,created_at,updated_at,lastlogin_at,status) 
                        VALUES ('$name','$email','$designation','$hash_password','$token','$aajki_date','$aajki_date','$aajki_date','disable') ";
                         if($dbo->query($SQL_REGs))
                         {
                            echo "<script type= 'text/javascript'> alert(' Your registration is Successful ! Please contact your admin activate the profile  '); </script>"; 
                            $SQL_access=" SELECT * FROM users WHERE email='$email' AND status = 'disable' ";
                            foreach($dbo->query($SQL_access) AS $GE_T){
                                $user_id = $users_id =  $GE_T['id'];
                                $Dcvx="INSERT INTO users_description (users_id) VALUES ('$users_id') "; 
                                if($dbo->query($Dcvx)){ }else { echo"Error While users_description Creation ! "; }

                                ?> 
                                <?php $name="view_profile"; $status="View Profile";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="update_profile"; $status="Update Pofile";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="change_password"; $status="Change Password";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="view_task"; $status="View Task";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="update_task"; $status="Update Task";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="task_summary"; $status="Task Summary";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="Create_task"; $status="Create Task";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="view_document"; $status="View Documents ";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="add_document"; $status="Add Documents";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="update_document"; $status="Update Document";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="apply_leaves"; $status="Apply for Leaves ";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="view_leaves"; $status="View Leaves ";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="history_leaves"; $status="Leaves History";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="add_leaves"; $status="Add Leaves to user account ";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="view_calender"; $status="View Calender";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="add_events"; $status="Add Events";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="upcoming_events"; $status="Upcoming Events";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="past_events"; $status="Past Events";  permission_dump($dbo,$user_id,$name,$status); ?>  
                                <?php $name="search_people"; $status="Update User reporting & password";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="task_assign"; $status="Assign Task";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="add_Category"; $status="Add Category";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="View_Download"; $status="View Download";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="Events_disp"; $status="Events Display at app. Sections ";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="Aby_user"; $status="Accessibility Control By User";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                <?php $name="Aby_apps"; $status="Accessibility Control By Applications";  permission_dump($dbo,$user_id,$name,$status); ?> 
                                 <?php 

                                /* session_regenerate_id();
                                $_SESSION['sess_userid'] = $GE_T['id'];
                                $_SESSION['sess_username'] = $GE_T['email'];
							 	$_SESSION['sess_userrole'] = $GE_T['role'];
							    $_SESSION['sess_designation'] = $GE_T['designation'];
								$_SESSION['sess_lastlogin_at'] = $GE_T['lastlogin_at'];
                                $_SESSION['sess_userlogincountt'] = $GE_T['log_count'];
                                $_SESSION['sess_useractive'] = $GE_T['active'];
                                session_write_close();
                                */
                               // header('location: ../Dashboard/index.php');
                               echo "<script> var timer = setTimeout(function() { window.location='../Dashboard/index.php'}, 3000); </script> ";    
                              
                         } 
                        }else{  echo "<script type= 'text/javascript'> alert(' Error while registration  ! ');		</script>";}
                         // $stmt = $dbo->prepare($SQL_REGs);
                         //  $stmt->execute();

                          
                   }
                       catch(PDOException $e)
                           {
                           echo $SQL_REGs . "<br>" . $e->getMessage();
                           }
               }else{
                   echo"<h3 align='center' style='color:red;'> new password and confirm new password must be same ! </h3>";
               }
              
             }else{echo"<script> alert(' Given E-mail adress already exists, Please choose another one ! '); </script> ";}
          

        }
    ?>
   
   <?php 
    function permission_dump($dbo,$user_id,$name,$status){
        $SFBf="INSERT INTO user_permission (user_id,name,status) VALUES ('$user_id','$name','$status') ";
        if($dbo->query($SFBf)){   }else{  }
        }
    ?>

    <?php ob_end_flush(); ?>
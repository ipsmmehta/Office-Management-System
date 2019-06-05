<?php include('../apps/config.php');   ?>
<?php 
    if(isset($_POST["reset_passwd"])){
       //echo "we are workin on it ! ";
        $email = $_POST["email"];
        $Userid = "";
        $ghfgs="SELECT id FROM users WHERE email='$email' AND status ='enable' ";
        foreach($dbo->query($ghfgs) AS $jhdg ){
          $Userid =  $jhdg["id"];
        }
        if(!$Userid==""){
              
            // echo "<br>";
            $Charlength = 55;
            echo $Value_rnd = randomString($Charlength);
            $SGF_55="INSERT INTO password_resets (email,token,created_at) VALUE ('$email','$Value_rnd','$aajki_date') ";
           
            if($dbo->query($SGF_55) ){
              
                // Link tob shared with mail ! 
                $link = $Assress_IP."/Reset/?section=".$Value_rnd."&id=".$email;
                 
                // START OF send mail Code 
                $to = $email;
                $subject = "OMS Password reset ";
                $txt = "Please follow the link to reset your password: ".$link;
                $headers = "From: admin@oms.com" . "\r\n";

                mail($to,$subject,$txt,$headers);
                // End of send mail code 

               header('location:'.$Assress_IP.'/Login/?err=3');
            }
        }
    }

   

?>

 <?php 
	// Random String for password reset & others 
	 function randomString($Charlength) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $Charlength; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
 ?>


     <?php
    if(isset($_POST["SaveUpdatedassword"])){
        $USRID = $_POST["User_ID"];
        if(empty($_POST["passwd_1"])){	 $passwd_1 ="";   }else 	{  $passwd_1 = $_POST["passwd_1"];  }
        if(empty($_POST["passwd_2"])){	 $passwd_2 ="";   }else 	{  $passwd_2 = $_POST["passwd_2"];  }
        if(!$passwd_1=="" ){
             $hash_password = password_hash($passwd_1, PASSWORD_BCRYPT); 
                        try
                            {
                                    $sql="UPDATE users set 
                                       password	='$hash_password',
                                       updated_at  ='$aajki_date' 
                                    WHERE email ='$USRID' ";
                                
                                    $stmt = $dbo->prepare($sql);
                                    $stmt->execute();
                                    echo "<script type= 'text/javascript'> alert('Your Password Updated Successfully');</script>";
                                    echo "<script type= 'text/javascript'> window.location.assign('$Assress_IP/Login/');</script>";
                       
                                }
                            catch(PDOException $e)
                                    {
                                    echo $sql . "<br>" . $e->getMessage();
                                    }
                             
                    
                }
		
    }
    ?>
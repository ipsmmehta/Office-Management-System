
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
?>

<?php
if(isset($_POST["View_Download"])){
     
        ?>  <div class="panel panel-default">
        <div class="panel-heading"><label> Downloads </label>   </div>             
         <div class="panel-body">   <?php 
      //  fun_dispDocuments($dbo,$id,$Assress_IP);
       
        $SQj_dfh="SELECT id FROM dms_data WHERE doc_category ='Office forms' AND doc_status='New' ";
        foreach($dbo->query($SQj_dfh) AS $GYD5){
            $doc_id = $GYD5["id"];
            $base ="Download";
            fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);
        }
        ?>  </div>   </div>    <?php 
    }
?> 

<?php 
    if(isset($_POST["view_document"])){
        
        ?> 
        <?php fun_view_document($dbo,$sess_userid); ?> 
        
        <?php fun_option($sess_userrole,$dbo,$sess_userid); ?> 
        <?php
    }
?>

<?php 
    if(isset($_POST["update_document"])){
        
        ?> 
        <?php fun_view_document($dbo,$sess_userid); ?> 
        
        <?php fun_option($sess_userrole,$dbo,$sess_userid); ?> 
        <?php
    }
?>

<?php 
    if(isset($_POST["add_document"])){
        
        ?> 
        <?php add_documents(); ?> 
        <?php fun_option($sess_userrole,$dbo,$sess_userid); ?> 
        <?php
    }
?>

<?php 
    if(isset($_POST["edit_doc"])){
        $edit_doc = $_POST["edit_doc"];
       $SHGD_sfh="SELECT * FROM dms_data WHERE id='$edit_doc' ";
       foreach($dbo->query($SHGD_sfh)AS $sdfjh)
       {
            $doc_title = $sdfjh["doc_title"];
            $doc_category = $sdfjh["doc_category"];
            $doc_task = $sdfjh["doc_task"];
            $doc_by = $sdfjh["doc_by"];
            $doc_date = $sdfjh["doc_date"];
            $doc_remarks = $sdfjh["doc_remarks"];
            $doc_date = $sdfjh["doc_date"];

        
        ?> 

         <div class="panel panel-default">
              <div class="panel-heading"><label>Edit Documents </label> 
               </div>             
               <div class="panel-body"> 
               <form name="dcgsd" method="post">                                  
        <table class="table" >
        <tr>
              
                <td style="width:25%;"><label> Document Title: <br> </td>
                 <td>
                            <input type="text" style='width:100%;'  name='doc_title' value="<?php echo $doc_title; ?>" class="form-control" placeholder="File title... " required='required' >
                   
                    <td  >
            </tr>
            

            <tr>
            <td><label> Remarks: <br> </td>
            <td >   <input type="text" style='width:100%;'  name='doc_remarks' value="<?php echo $doc_remarks; ?>" class="form-control" placeholder="File Remarks... " required='required' >
                      </td> 
            </tr>
            <tr>
            <td><label> Category: <br> </td>

                          
             

                   <td>     <select name="doc_category" style='width:100%;' class="form-control" id='country' required="required"> 
                                 <option Value='<?php echo $doc_category; ?>'><?php echo $doc_category; ?></option> 
                                  <?php
                                    $SJHG_s="SELECT cat_title FROM dms_category WHERE cat_status='true' ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["cat_title"]; ?>'> <?php  echo $Slk45["cat_title"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                            </select> 
            </tr>  

             <tr>
                <td style="width:25%;"><label>  Related Task <br> </td>   
                    <td>    <select name="doc_task" style='width:100%; font-size:11px;' class="form-control" > 
                                <option   Value='<?php  if (!$doc_task==""){ echo $doc_task; }else{ echo ""; } ?>'><?php  if (!$doc_task==""){ echo $doc_task; }else{ echo "-- Related Task --"; } ?></option> 
                                           
                                    <?php
                                    $SJHG_s="SELECT task_name FROM task_list ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["task_name"]; ?>'> <?php  echo $Slk45["task_name"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                                          
                            </select> 
                    </td>
            </tr>
           
            </table>             
                            
                            <div style="padding:5%;">
                            <label>Permission</label><br>
                            <div style="margin-left:5%; text-align:left; ">
                            <?php
                              $doc_view = $doc_download = $doc_remove=NULL;
                                $SHGf_fdsj="SELECT * FROM dms_permission WHERE doc_id='$edit_doc' ";
                                foreach($dbo->query($SHGf_fdsj)AS $jhf){
                                    $doc_view = $jhf["doc_view"];
                                    $doc_download = $jhf["doc_download"]; 
                                    $doc_remove = $jhf["doc_remove"];
                                }       
                                    ?>
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" <?php if($doc_view=="true"){ echo"checked"; } ?> name="chk_view" > &nbsp; View </a> 
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" <?php if($doc_download=="true"){ echo"checked"; } ?> name="chk_Download" > &nbsp; Download </a>  
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" <?php if($doc_remove=="true"){ echo"checked"; } ?> name="chk_Delete" > &nbsp; Delete </a> 


                                    <?php 
                                
                            ?>
                                
                             </div>
                            </div>
                             
                            <input type="text" name="docID"  readonly hidden style="display:none;" value="<?php echo $edit_doc ; ?> " />
                     
                                    <center> <input type="submit" name="UpdateDocument" class="btn btn-warning" value="Update " /> </center>
           </form>
                            </div>                                
            </div> 
        <?php
    }
    fun_option($sess_userrole,$dbo,$sess_userid); 
}
?>

<?php 
if(isset($_POST["UpdateDocument"])){

       // $chk_view = $_POST["chk_view"];
        //$chk_Download  = $_POST["chk_Download"];
        //$chk_Delete  = $_POST["chk_Delete"];

       if(empty($_POST["chk_view"]))	{	$chk_view = "";   }else 	{   $chk_view =  $_POST["chk_view"];  }
       if(empty($_POST["chk_Download"]))	{	$chk_Download = "";   }else 	{   $chk_Download =  $_POST["chk_Download"];  }
       if(empty($_POST["chk_Delete"]))	{	$chk_Delete = "";   }else 	{   $chk_Delete =  $_POST["chk_Delete"];  }
       if(empty($_POST["doc_task"]))	{	$doc_task = "";   }else 	{   $doc_task =  $_POST["doc_task"];  }
       // $doc_task  = $_POST["doc_task"];

        $doc_category  = $_POST["doc_category"];
        $doc_remarks  = $_POST["doc_remarks"];
        $doc_title  = $_POST["doc_title"];
        $docID  = $_POST["docID"];
        $SN_vdg="UPDATE dms_data SET doc_title='$doc_title',doc_remarks='$doc_remarks', doc_category='$doc_category',doc_task ='$doc_task' WHERE id='$docID' ";
        
        if($dbo->query($SN_vdg)){
           // echo"Update";
            $HDGHjk_sf="UPDATE dms_permission SET doc_view='$chk_view',doc_download='$chk_Download',doc_remove='$chk_Delete' WHERE doc_id='$docID' ";
            if($dbo->query($HDGHjk_sf)){ }
        }else{
            // echo"Error While data updations ! ";
        }
         fun_sucess();
         fun_view_document($dbo,$sess_userid); 
         fun_option($sess_userrole,$dbo,$sess_userid); 
    }
?>

<?php 
    if(isset($_POST["delete_doc"])){
        $delete_doc = $_POST["delete_doc"];
         $SQL_jhdf="SELECT doc_remove FROM dms_permission WHERE doc_id='$delete_doc' ";
         foreach($dbo->query($SQL_jhdf) AS $HGFD) {
           $idoc_removed =  $HGFD["doc_remove"];
           if($idoc_removed=="true"){
               $DWJH_sel="DELETE FROM dms_data WHERE id='$delete_doc' ";
               if($dbo->query($DWJH_sel)){
                   echo "<script> alert('Document has been deleted successsfully ! ');</script>";
                   fun_sucess();
               }else{
                echo "<script> alert('Error while document delection! ');</script>";
                fun_fail();
               }

           }else{
            echo "<script> alert(' You Do not have permissions to delete this document ! ');</script>";
           }
         }
        ?> 
        
        <?php
    }
?>


<?php
    function fun_view_document($dbo,$sess_userid)
    { 
        ?>
               
       
                     <div class="panel panel-default">
                                                                <div class="panel-heading"><label>View Documents </label> 
                                                                
                                                                <div align="right" style='margin-top:-2%;' >
                                                                
                                                             
                                                                <h4  align="right" class="btn btn-success"  id="adv_1" onclick="document.getElementById('Table_adv').style.display = 'block'; document.getElementById('adv_1').style.display = 'none'; document.getElementById('adv_2').style.display = 'block';" style=' width:25%; //color:#26a5db; font-size:17px;'> Advanced Search</h4> 
                                                                <h4  align="right" class="btn btn-warning" href="" id="adv_2" onclick="document.getElementById('Table_adv').style.display = 'none';  document.getElementById('adv_2').style.display = 'none'; document.getElementById('adv_1').style.display = 'block';" style=' width:25%; display:none; //color:red; font-size:17px;'> Basic Search</h4>
                                                                 
                                                                </div> 
                                                                
                                        
                                         
                                    </div>
                                                                     
                                                                     <div class="panel-body"> 
                                                    
                                                                        <form name="dcgsd" method="post">
                                                                        <link rel="stylesheet" href="auto_fill/jquery-ui.css">
                                                                        <script src="auto_fill/jquery-1.10.2.js"></script>
                                                                        <script src="auto_fill/jquery-ui.js"></script> 	
																		
																		<!-- START OF AUTO SEARCH In Search Documents textarea -->
																		<!-- You can enables or disable auto search just by commenting this below listed script -->
                                                                      
																	   <script type="text/javascript">
                                                                         
                                                                                     $(function() {
                                                                                        $( "#tit" ).autocomplete({
                                                                                          source: 'search_file_title.php'
                                                                                        });
                                                                                      }); 

                                                                                       $(function() {
                                                                                        $( "#tit_2" ).autocomplete({
                                                                                          source: 'search_Authors.php'
                                                                                        });
                                                                                      }); 


                                                                        </script>
                                                                       
																		
																			<!-- END  OF AUTO SEARCH In Search Documents textarea -->
                                                                         <label>Enter documents title: </label><br>
                                                                            
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" id="tit" name="fileTitle" placeholder="Enter documents title ... " style='width:100%;' >
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-default" type="submit" name="viewData" >
                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                    </button>
                                                                                </span>
                                                                                </div> 
                                                                        <br>
                                                                        <div style='display:none;' id="Table_adv"  >

                                                                       <label>Date:</label>
                                                                       <table class="table table-hover">
     
         <tr>
        <td><small><b>Start date:</b></small><input type="date"name="startDate" class="form-control" placeholder="Start date"> </td>
        <td><small><b>End date:</b></small><input type="date"name="endDate" class="form-control" placeholder="End date"> </td>
        </tr> 
        </table>     
        <table class="table table-hover">   
            <tr>
             <td><small><b>Authors:</b></small><input type="text"name="authorsName" id="tit_2" class="form-control" placeholder="Authors name"> </td>  
            </tr>
        </table>                                                    
                                                                        <table class="table table-hover" style=' width:99%; //display:none; '  >
                                                                        
                                                                        <tr>
                                                                        <td> 
                                                                        <select name="categoryName" style='width:100%;' class="form-control" > 
                                                                        <option Value=''>--Category--</option> 
                                  <?php
                                    $SJHG_s="SELECT cat_title FROM dms_category WHERE cat_status='true' ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["cat_title"]; ?>'> <?php  echo $Slk45["cat_title"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                                                                                                 
                                                                        </select>
                                                                        </td>
                                                                        
                                                                        <td> <select name="taskName" style='width:100%;' id='country1' class="form-control"  > 
                                                                        <option Value=''>-- Related Task --</option> 
                                            <?php
                                    $SJHG_s="SELECT task_name FROM task_list ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["task_name"]; ?>'> <?php  echo $Slk45["task_name"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                                                                                                 
                                                                        </select> </td>
                                                                        
                                                                       
                                                                        
                                                                        
                                                                        </table>
                                                                        <center>    
                                                                        <button class="btn btn-default" type="submit" name="viewData" >
                                                                            <span class="glyphicon glyphicon-search"></span> Search
                                                                        </button>
                                                                        </center> 
                                                                        </div> <br>
                                                                       
                                                                        </form>
                                                                        
                                                                     
                                           </div>  </div> 
                      
                     
        <?php 
    }
?>

<?php
    if(isset($_POST["viewData"])){
        fun_view_document($dbo,$sess_userid);
        if(empty($_POST["taskName"])){	 $taskName ="";   }else 	{  $taskName = $_POST["taskName"];  }
        if(empty($_POST["categoryName"])){	 $categoryName ="";   }else 	{  $categoryName = $_POST["categoryName"];  }
        if(empty($_POST["authorsName"])){	 $authorsName =""; 	 }else 	{  $authorsName = $_POST["authorsName"];  }
        if(empty($_POST["startDate"])){	 $startDate ="";   }else 	{  $startDate = $_POST["startDate"];  }
        if(empty($_POST["endDate"])){	 $endDate ="";   }else 	{  $endDate = $_POST["endDate"];  }
        if(empty($_POST["fileTitle"])){	 $fileTitle =""; 	 }else 	{  $fileTitle = $_POST["fileTitle"];  }
        $base ="search";
        
        if((!$fileTitle=="") && (!$startDate=="") && (!$endDate=="") && (!$authorsName=="") && (!$categoryName=="") && (!$taskName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%' AND doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_task  ='$taskName' AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$fileTitle=="") && (!$startDate=="") && (!$endDate=="") && (!$authorsName=="") && (!$categoryName=="")   ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%' AND doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate'  AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$fileTitle=="") && (!$startDate=="") && (!$endDate=="") && (!$authorsName=="") && (!$taskName=="")   ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%' AND doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate'  AND doc_task  ='$taskName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$fileTitle=="") && (!$startDate=="") && (!$endDate=="") && (!$authorsName=="")    ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%' AND doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate'    AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }

       

         elseif((!$startDate=="") && (!$endDate=="") && (!$authorsName=="") && (!$categoryName=="") && (!$taskName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_task  ='$taskName' AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$startDate=="") && (!$endDate=="") && (!$authorsName=="") && (!$categoryName=="")  ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate'   AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$startDate=="") && (!$endDate=="") && (!$authorsName=="")   && (!$taskName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_task  ='$taskName'  AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
         
         elseif((!$startDate=="") && (!$endDate=="") && (!$authorsName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_by ='$User_id' AND doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        
         
         elseif((!$categoryName=="") && (!$taskName=="") && (!$authorsName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_by ='$User_id' AND doc_task  ='$taskName' AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }

        elseif((!$startDate=="") && (!$endDate=="") && (!$fileTitle=="") ){
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_title LIKE '%".$fileTitle."%' AND doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        
        elseif((!$startDate=="")   && (!$fileTitle=="") ){
              $SQj_dfh="SELECT id FROM dms_data WHERE  doc_title LIKE '%".$fileTitle."%' AND doc_date  LIKE '%".$startDate."%' AND doc_status='New' ORDER BY doc_date DESC ";
                 foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
         }

         elseif( (!$endDate=="") && (!$fileTitle=="") ){
              $SQj_dfh="SELECT id FROM dms_data WHERE  doc_title LIKE '%".$fileTitle."%' AND doc_date  LIKE '%".$endDate."%' AND doc_status='New' ORDER BY doc_date DESC ";
                 foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
         }

        
        elseif((!$fileTitle=="") && (!$authorsName=="") ){
            $User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE  doc_by ='$User_id' AND doc_title LIKE '%".$fileTitle."%'  AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
         
        elseif((!$startDate=="") && (!$endDate=="") ){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_date  BETWEEN  '$startDate' AND '$endDate' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }

         elseif((!$categoryName=="") && (!$taskName=="") ){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_task  ='$taskName' AND doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }

      

        elseif((!$fileTitle=="") && (!$startDate=="") ){
            //$User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%'  AND  doc_date  LIKE '%".$startDate."%'    AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif((!$fileTitle=="") && (!$endDate=="") ){
            //$User_id =  get_user_ID($dbo,$authorsName);
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%'   AND  doc_date  LIKE '%".$endDate."%'      AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }


        elseif(!$fileTitle==""){
            fun_GetDocuments($dbo,$fileTitle,$Assress_IP);
           //  fun_dispDocuments($dbo,$taskName);
          }

        elseif(!$startDate==""){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_date  LIKE '%".$startDate."%' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }elseif(!$endDate==""){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_date  LIKE '%".$endDate."%' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }
        elseif(!$authorsName==""){
            $User_id =  get_user_ID($dbo,$authorsName);
         
           $SQj_dfh="SELECT id FROM dms_data WHERE doc_by ='$User_id' AND doc_status='New' ORDER BY doc_date DESC ";
              foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }elseif(!$categoryName==""){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_category  ='$categoryName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }elseif(!$taskName==""){
            $SQj_dfh="SELECT id FROM dms_data WHERE doc_task  ='$taskName' AND doc_status='New' ORDER BY doc_date DESC ";
                foreach($dbo->query($SQj_dfh) AS $GYD5){  $doc_id = $GYD5["id"]; fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);}
        }



        
        fun_option($sess_userrole,$dbo,$sess_userid);
       
    }
?>

<?php 
    function fun_GetDocuments($dbo,$fileTitle,$Assress_IP)
    {
        $SQj_dfh="SELECT id FROM dms_data WHERE doc_title LIKE '%".$fileTitle."%' AND doc_status='New' ";
        foreach($dbo->query($SQj_dfh) AS $GYD5){
           $doc_id = $GYD5["id"];
           $base ="search";
           fun_dispDocuments($dbo,$doc_id,$base,$Assress_IP);
        }
    }
?>

<?php 
    function fun_dispDocuments($dbo,$id,$base,$Assress_IP)
    {
       // if($base =="Download"){   }
        ?>
        <Table class="table table-hover">
        <!--<tr>
            <td></td>
        </tr>-->
        <?php 
        $SQj_dfh="SELECT * FROM dms_data WHERE id ='$id' AND doc_status='New' ORDER BY doc_date DESC ";
        foreach($dbo->query($SQj_dfh) AS $GYD5){
            $doc_title = $GYD5["doc_title"];
            $doc_remarks = $GYD5["doc_remarks"];
            $doc_category = $GYD5["doc_category"];
            $doc_task = $GYD5["doc_task"];
            $doc_by = $GYD5["doc_by"];
            $doc_date = new DateTime($GYD5['doc_date']);
            //$doc_date = $GYD5["doc_date"];
            $doc_version = $GYD5["doc_version"];
            $doc_path = $GYD5["doc_path"];
            $doc_id = $GYD5["id"];
            ?>
           
            <tr>
                <td>
                <div class="row">
                    <div class="col-sm-6"> <span style='font-size:23px;'> <a href="<?php echo $Assress_IP."/".$doc_path;  ?>" target="_blank" style="color:black;"><span class="glyphicon glyphicon-duplicate"></span></a> <a href="<?php echo $Assress_IP."/".$doc_path;  ?>" target="_blank" ><?php echo $doc_title; ?></a></span> </div>
                    <div class="col-sm-6" align="right">
                      
                    
                    <!-- <a href="<?php echo  $doc_path;  ?>" target="_blank" title="Click to download" ><span class="glyphicon glyphicon-download-alt"></span></a></span>
                       --> 
                     <div class="dropdown">
                     <form name="dffd" method="post">
                     <span style='color:#9e9e9e;' > Version : <?php echo $doc_version; ?> 
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <a href="#"> <span class="glyphicon glyphicon-cog"></span></a>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                        <li> <a href="<?php echo  $doc_path;  ?>" target="_blank" title="Click to download" ><span class="glyphicon glyphicon-download-alt"></span> &nbsp; Download </a></span> </li>
                      <?php 
                       if($base =="Download"){   }else{
                      ?>
                        <li> <a href="#"> <span class="glyphicon glyphicon-trash"></span>   <button type="submit" value="<?php echo $doc_id; ?>" name="delete_doc" style="border:0px solid white; background-color:transparent;">Delete </button> </a></li>
                        <li> <a href="#"> <span class="glyphicon glyphicon-edit"></span>   <button type="submit" value="<?php echo $doc_id; ?>" name="edit_doc" style="border:0px solid white; background-color:transparent;">Edit properties </button> </a></li>
                         <?php } ?> 
                        <li><a href="#" title="Created by "> <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo  get_user_name($dbo,$doc_by);  ?>    </a></li>
                        <li><a href="#" title="Related task "> <span class="glyphicon glyphicon-tasks"></span>&nbsp; <?php echo  $doc_task;  ?>    </a></li>
                        <li><a href="#" title="Category of Documents  "> <span class="glyphicon glyphicon-subtitles"></span>&nbsp; <?php echo  $doc_category;  ?>    </a></li>
                        <li><a href="#" title="Created on  "> <span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php  echo $doc_date->format('d-m-Y H:i:s');  ?>    </a></li>
                       
                        <li><a href="#" title="Created on  "> <span class="glyphicon glyphicon-superscript"></span>&nbsp; Version :  <?php echo $doc_version; ?>  </a></li>
                        </ul>
                        </form>
                    </div>
                      </div>
                </div>
                
                    <div style="margin-left:3%;">
                        <span style='color:#616161 ;'> <?php echo $doc_remarks; ?> </span><br>
                        <span style='color:#9e9e9e;' > Created on : <?php  echo $doc_date->format('d-m-Y H:i:s');  ?> by  <?php echo  get_user_name($dbo,$doc_by);  ?> </span><br>
                         
                    </div>
                </td>
            </tr>
            <?php 
        }
        ?> </Table>
        <?php
    }
?>



<?php 
    function add_documents()
    {
        ?>
        <div class="panel panel-default">
        <div class="panel-heading"> <strong> Add  Document's </strong> </div>
        <div class="panel-body">
        <form method='post' class="form-inline" enctype="multipart/form-data" >
						 <table class='table'> 
                         <tr>
                         <td style="width:25%;"><LABEL>Select Document (s)</LABEL> </td>
                            <td>
                            <input type="file" required="required" style="width:100%;" class="form-control" name="upload[]" id="filesToUpload" multiple="" onChange="makeFileList();" />
                            <ul id="fileList"><li>No Document Selected</li></ul>
                            <script type="text/javascript">
                                function makeFileList() {
                                    var input = document.getElementById("filesToUpload");
                                    var ul = document.getElementById("fileList");
                                    while (ul.hasChildNodes()) {
                                        ul.removeChild(ul.firstChild);
                                    }
                                    for (var i = 0; i < input.files.length; i++) {
                                        var li = document.createElement("li");
                                        li.innerHTML = input.files[i].name;
                                        ul.appendChild(li);
                                    }
                                    if(!ul.hasChildNodes()) {
                                        var li = document.createElement("li");
                                        li.innerHTML = 'No Files Selected';
                                        ul.appendChild(li);
                                    }
                                }
                            </script>
                           
                            </td>
                         </tr>
                         </table>
                 <center> <button type="submit" name="step2_upload" class="btn btn-warning" > <span style="font-size:19px;" class="glyphicon glyphicon-cloud-upload"></span> <b>Upload</b> </Button> </center>         
        </form>               
        
        </div>
        </div>
        <?php 
    }
?>
 <?php
        if(isset($_POST["add_Category"])){
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong> Add Category </strong></div>
                <div class="panel-body"> 
                <?php  create_category($dbo); ?>
                

                </div>
            </div>
                <?php fun_option($sess_userrole,$dbo,$sess_userid); ?>
               
    
            <?php 
        }
 ?>

<?php
    if(isset($_POST["create_CAT"])){
        $cat_name = $_POST["cat_name"]; $ID=NULL;
        $SQL_hdf="SELECT id FROM dms_category WHERE cat_title='$cat_name' ";
        foreach($dbo->query($SQL_hdf) AS $GH55){
            $ID = $GH55["id"];
        }if($ID==""){
            $SQHD_in="INSERT INTO dms_category (cat_title,cat_by,cat_date,cat_status)  VALUES ('$cat_name','$sess_userid','$aajki_date','true') ";
            if($dbo->query($SQHD_in)){
                if (!is_dir('../Documents/'.$cat_name)) {
                    mkdir('../Documents/'.$cat_name, 0777, true);
                }
                echo"<script>alert(' Category created Successfully ! '); </script>";
                fun_sucess();	
                create_category($dbo); 
                fun_option($sess_userrole,$dbo,$sess_userid);
            }else{
                fun_fail();
                create_category($dbo); 
                fun_option($sess_userrole,$dbo,$sess_userid);
            } 
        }else{ 
            //echo"<script>alert(' Category created Successfully ! '); </script>";
            fun_allreadyExit();
            create_category($dbo); 
            fun_option($sess_userrole,$dbo,$sess_userid);
                 
        }
       
    }
?>

<?php
    if(isset($_POST["Delete_CAT"])){
            $CAT_ID = $_POST["Delete_CAT"];
            // DELETE FROM `dms_category` WHERE id='1'
            $SQL_DEl=" DELETE FROM dms_category WHERE id ='$CAT_ID' ";
            if($dbo->query($SQL_DEl)){
                fun_sucess();	
                create_category($dbo); 
                fun_option($sess_userrole,$dbo,$sess_userid);
            } else{
                fun_fail();
                create_category($dbo); 
                fun_option($sess_userrole,$dbo,$sess_userid);
            } 
        
    }
?>

<?php 
   function create_category($dbo){
        ?> 
        <table class="table" > 
                <tr>
                    <th> Category name</th>
                    <th> Action  </th>
                </tr>
                    <form name="sfdsd" method="post" >
                    
                        <tr>
                            <td>    <input type="text" required="required" Placeholder="Enter Category name here..." name="cat_name" class="form-control" ></td>
                            <td> <Button type="submit" name="create_CAT" class="btn btn-success">Create new </Button> </td>
                        </tr>
                    </form>
                    <form name="sfdsd_2" method="post" >
                        <?php 
                                $SNHS_5="SELECT id,cat_title,cat_by,cat_date FROM dms_category WHERE cat_status='true' ";
                                foreach($dbo->query($SNHS_5)AS $HG55){
                                  $id =   $HG55["id"];
                                  $cat_title =   $HG55["cat_title"];
                                  $cat_by    =   $HG55["cat_by"];
                                  $cat_date  =   $HG55["cat_date"];
                                  ?>
                                    <tr>
                                        <td>  <?php echo $cat_title; ?> <br>
                                        <div  style="margin-left:2%;"> <span style="color:gray;"><?php echo get_user_name($dbo,$cat_by); ?> <small> (<?php echo $cat_date; ?>)</small> </span> </div>
                                        </td>
                                        <td> <Button type="submit" name="Delete_CAT" value="<?php echo $id; ?>" class="btn btn-warning">Delete  </Button> </td>
                                    </tr>
                                 <?php 
                                }
                        ?>
                       
                    </form>

        </table>
        <?php 
    }
?>



<?php 
    	if(isset($_POST["step2_upload"]))
        {
            
            
        if(count($_FILES['upload']['name']) > 0)
        {
            //Loop through each file
            for($i=0; $i<count($_FILES['upload']['name']); $i++) {
              //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                //Make sure we have a filepath
                if($tmpFilePath != ""){
                
                    //save the filename
                    $shortname = date('YmdHis-').$_FILES['upload']['name'][$i];

                    //save the url and the file
                    $N_NME =  date('YmdHis').'-'.$_FILES['upload']['name'][$i];
                    $filePath = "temp_data/" .$N_NME;

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $filePath)) {

                        $files[] = $shortname;
                        //insert into db 
                        //use $shortname for the filename
                        //use $filePath for the relative url to the file

                    }
                  }
            }
        }


//show success message
if(empty($files))
{

}else {

?>
     
<form method='post' class="form-inline" enctype="multipart/form-data" >
<table class="table" style='width:100%;'> 
           <tr>
                 <th style='font-size:15px; ' >Sr. No.</th>
                 <th style='font-size:15px; ' >Selected File :</th>
                 <th style='font-size:15px; '>File Tilte <b id="require">*</b></th>
                 <th style='font-size:15px; '>File Remarks <b id="require">*</b></th>
                 <th style='font-size:15px; ' >Category <b id="require">*</b></th>
                
                 <th style='font-size:15px; '> Related Task </th>
                 <th style='font-size:15px; '>  <span class="glyphicon glyphicon-cog"></span> </th>
           </tr>
<?php 
}

$cnuj=0;
if(is_array($files)){
// echo "<ul>";
foreach($files as $file){
    $cnuj = $cnuj+1;
  //  echo "<li>$file</li>";
    ?>
          <tr  >
                 <input type='text' name='org_file_<?php echo $cnuj; ?>' value="<?php echo $file; ?>" readonly hidden style="display:none;" >
                   <td ><b><?php echo $cnuj; ?></b></td>
                   <td style='  font-size:11px;'  ><?php echo substr($file ,15,225); ?> </td>
                   <td  > 
                            <input type="text" style='width:100%;'  name='filetitle_<?php echo $cnuj; ?>' class="form-control" placeholder="File title... " required='required' >
                    </td>
                    <td  > 
                            <input type="text" style='width:100%;'  name='doc_remarks_<?php echo $cnuj; ?>' class="form-control" placeholder="File Remarks... " required='required' >
                    </td>
                   <td>     <select name="Catagery_nm<?php echo $cnuj; ?>" style='width:100%;' class="form-control" id='country<?php echo $cnuj; ?>' required="required"> 
                                  <option Value=''>--Category--</option> 
                                  <?php
                                    $SJHG_s="SELECT cat_title FROM dms_category WHERE cat_status='true' ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["cat_title"]; ?>'> <?php  echo $Slk45["cat_title"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                            </select> 
                    
                    <td>    <select name="task_<?php echo $cnuj; ?>" style='width:95%; font-size:11px;' class="form-control" > 
                                            <option Value=''>-- Related Task --</option> 
                                            <?php
                                    $SJHG_s="SELECT task_name FROM task_list ORDER BY id DESC  ";
                                    foreach($dbo->query($SJHG_s)AS $Slk45)
                                    {
                                       
                                        ?>  <option Value='<?php  echo $Slk45["task_name"]; ?>'> <?php  echo $Slk45["task_name"]; ?> </option> 
                                        <?php   
                                    }
                                  ?>
                                             
                            </select> 
                    </td>

                     <td> 
                         <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="glyphicon glyphicon-option-vertical"></span>
                             </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                            <div style="padding:5%;">
                            <label>Permission</label><br>
                            <div style="margin-left:5%; text-align:left; ">
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" checked name="chk_view<?php echo $cnuj; ?>" > &nbsp; View </a> 
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" checked name="chk_Download<?php echo $cnuj; ?>" > &nbsp; Download </a>  
                                <a href="#" class="list-group-item"><input type="checkbox"   value="true" name="chk_Delete<?php echo $cnuj; ?>" > &nbsp; Delete </a> 

                             </div>
                            </div>
                            </ul>
                          </div>
                     </td>   
                   
            </tr>
<?php 
    
}
 
}
?>
	<input type='text' name='total_lopping' value="<?php echo $cnuj ; ?>" readonly hidden style="display:none;" >
    </table><hr>
         <center>  <button type="submit" name="save_org" class="btn btn-warning">Submit</button> </center>
	</form>
        <?php  fun_option($sess_userrole,$dbo,$sess_userid); ?>
<?php
	    }
?>


<?php
    if(isset($_POST["save_org"]))
    {
        $total_lopping = $_POST["total_lopping"];
         
        
        for($ixt =1; $ixt<=$total_lopping; $ixt++ )
            {
                $file_name = "org_file_".$ixt; 
                $Catagery_nm = "Catagery_nm".$ixt; 
                $chk_view = "chk_view".$ixt; 
                $chk_Download = "chk_Download".$ixt;
                $chk_Delete = "chk_Delete".$ixt;  
                $task_ = "task_".$ixt; 
                $filetitle = "filetitle_".$ixt; 
                $doc_remarks = "doc_remarks_".$ixt; 
                
                if(empty($_POST["$file_name"]))	{	$file_name_x = "";   }else 	{   $file_name_x =  $_POST["$file_name"];  }
                if(empty($_POST["$Catagery_nm"]))	{	$Catagery_nm_x = "";   }else 	{   $Catagery_nm_x =  $_POST["$Catagery_nm"];  }
                if(empty($_POST["$chk_view"]))	{	$chk_view_x = "";   }else 	{   $chk_view_x =  $_POST["$chk_view"];  }
                if(empty($_POST["$chk_Download"]))	{	$chk_Download_x = "";   }else 	{   $chk_Download_x =  $_POST["$chk_Download"];  }
                if(empty($_POST["$chk_Delete"]))	{	$chk_remove = "";   }else 	{   $chk_remove =  $_POST["$chk_Delete"];  }
                if(empty($_POST["$task_"]))	{	$task_x = "";   }else 	{   $task_x =  $_POST["$task_"];  }
                if(empty($_POST["$filetitle"]))	{	$filetitle_x = "";   }else 	{   $filetitle_x =  $_POST["$filetitle"];  }
                if(empty($_POST["$doc_remarks"]))	{	$doc_remarks_x = "";   }else 	{   $doc_remarks_x =  $_POST["$doc_remarks"];  }
                
                /*
                $SubCatagery_nm = "SubCatagery_nm".$ixt; 
                $SubCatagery_nm_x =  $_POST["$SubCatagery_nm"];
                */
                 
                $doc_version =1;
                $SQL_SELTver="SELECT doc_version FROM dms_data WHERE doc_title='$filetitle_x' ";
                foreach($dbo->query($SQL_SELTver)AS $SGHF){
                   $docversion = $SGHF["doc_version"];
                   $doc_version = $docversion+1;
                }
                if( ($doc_version==0) || ($doc_version=="") ){
                    $doc_version =1;
                }
                //echo"<h5> $file_name_x  ";
                //echo"<i> $file_catagery_x </i>";
                //echo"<b> $type_x </b>";
                //echo"<s> $date_x </s> </h5>";
                //rename("temp_data/$file_name_x", "../../../data/$Projectshorttitle7/$file_name_x");

                $doc_path = "Documents/$Catagery_nm_x/$file_name_x";

                rename("temp_data/$file_name_x", "../Documents/$Catagery_nm_x/$file_name_x"); 	

                $on_date=date("Y-m-d"); 
                 

                $SQL_insi="INSERT INTO dms_data (doc_title,doc_category,doc_task,doc_by,doc_date,doc_version,doc_path,doc_remarks)
                           VALUES('$filetitle_x','$Catagery_nm_x','$task_x','$sess_userid','$aajki_date','$doc_version','$doc_path','$doc_remarks_x')";
                if($dbo->query($SQL_insi))
                {
                   
                    $docid=NULL;
                    $SQl_hdfidget="SELECT id FROM dms_data WHERE doc_title='$filetitle_x' AND doc_category ='$Catagery_nm_x' AND doc_by='$sess_userid' AND doc_path='$doc_path' AND doc_remarks='$doc_remarks_x' ";
                    foreach($dbo->query($SQl_hdfidget) AS $FGYD5){
                         $docid =  $FGYD5["id"];
                    }
                     
                    if( ($docid==0) || ($docid=="") ){
                       // $doc_version =1;
                    } else {
                     
                    // echo $docid."<br>".$chk_view_x."<br>".$chk_Download_x."<br>".$chk_remove."<br>";
                   // $SQL_INI_perm=" INSERT INTO dms_permission (doc_id,doc_view,doc_download,doc_delete) 
                  //  VALUES ('$docid','$chk_view_x','$chk_Download_x','$chk_Delete_x') ";
                  $SQL_INI_perm=" INSERT INTO dms_permission (doc_id,doc_view,doc_download,doc_remove)  VALUES ('$docid','$chk_view_x','$chk_Download_x','$chk_remove') ";

                        if($dbo->query($SQL_INI_perm))
                            {
                             // echo" Successfull Operation ";
                            }else 
                            {
                             //   echo"Error While Data Entry ";
                            } 
                        }
                }else 
                    {
                        echo"Error While Data Entry ";
                    } 
            }
              echo"<script>alert(' Document (s) Uploaded Successfully ! '); </script>";
          fun_sucess();	
          add_documents();
          fun_option($sess_userrole,$dbo,$sess_userid);
    }
?>

 <?php 
                    function fun_option($sess_userrole,$dbo,$sess_userid){
                        ?>
                                <br>   
                    <h2>Document's option </h2>
                        <div class="row"  style="margin-left:2%;" >
                            <form name="dfg" method="post">
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="view_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_document" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-warning">View Documents  </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="add_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="add_document" <?php  } else{ ?> name="permission_error" <?php } ?>  style="width:100%; height:95px;" class="btn btn-success">Add Documents </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="update_document"; $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_document" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-primary">Update Documents </button> </div>
                                <div class="col-sm-3"> <button type="submit"  <?php $val_name ="add_Category";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="add_Category" <?php  } else{ ?> name="permission_error" <?php } ?>   style="width:100%; height:95px;" class="btn btn-info">Add Category</button> </div>
                                
                            </form>
                        </div>
                        <?php 
                    }
                ?>



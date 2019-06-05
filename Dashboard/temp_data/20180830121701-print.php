 
<body>
<div id="regForm"> 
<?php  require "../config.php";// connection to database  ?>
 <?php  ob_start(); ?>
 
 <?php 
	if(isset($_GET["print"])){
	 	$data = $_GET["print"];
		if(!$data==""){
			?> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><?php 
			preview_form_ANZ1 ($data,$dbo);
			?>
			 
			<script type="text/javascript">
				  window.onload = function() { window.print(); }
			 </script>
			 
			<?php 
		}
	}
 ?>
 
	<?php 
		if(isset($_POST["get_exelAnex_1_excel"]))
		{
			$User_name = $_POST["User_name"]; 
			preview_form_ANZ1 ($User_name,$dbo);
			// get_exelAnex_1_data($dbo,$User_name);
			header("Content-Type: application/vnd.ms-excel");
			header("Expires: 0");
			$date = date('Y-m-d-Hi');
			header("content-disposition: attachment;filename=Survey_on$date.xls");
		}
	?>
	
	<?php 
		if(isset($_POST["get_exelAnex_1_word"]))
		{
			$User_name = $_POST["User_name"]; 
			preview_form_ANZ1 ($User_name,$dbo);
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			 
		//	header("Content-Type: application/vnd.ms-excel");
			header("Expires: 0");
			$date = date('Y-m-d-Hi');
			header("content-disposition: attachment;filename=Survey_doc$date.doc");
		}
	?>
 <?php 
		if(isset($_POST["get_exelAnex_1_pdf"]))
		{
			$User_name = $_POST["User_name"]; 
			preview_form_ANZ1 ($User_name,$dbo);
			//header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			header("Content-type:application/pdf");
			// It will be called downloaded.pdf
			header("Content-Disposition:attachment;filename='downloaded.pdf'");
			header("Expires: 0");
			$date = date('Y-m-d-Hi');
			header("content-disposition: attachment;filename=Survey_pdf$date.pdf");
		}
	?>
 
	
	 <?php
	function preview_form_ANZ1 ($sess_userid,$dbo){
		?>
		
		<b style="font-size:19px;"> 1.	Basic Information: </b><br><br>
				<?php 
					$SQL_HGDG="SELECT * FROM survey_user WHERE id='$sess_userid'";
					foreach($dbo->query($SQL_HGDG) AS $HGF5)
					{
						$name = $HGF5["name"];
						$designation = $HGF5["designation"];
						$Affiliation = $HGF5["Affiliation"];
						$email = $HGF5["email"];
						$Telephone = $HGF5["Telephone"];
						$Place = $HGF5["Place"];
						$Place = $HGF5["Place"];
						$updated_at = $HGF5["updated_at"];
						?>
						<table class="table table-striped">
						<tr>
						<td style="width:25%;"> Name </td>
						<td> 	<?php   echo $name; ?>	</td> 
					   </tr><tr>
						<td style="width:25%;"> Designation </td>
						<td> 	<?php   echo $designation; ?>	</td> 
					   </tr><tr>
						<td style="width:25%;"> Affiliation </td>
						<td> 	<?php   echo $Affiliation; ?>	</td> 
					   </tr><tr>
						<td style="width:25%;"> Email </td>
						<td> 	<?php   echo $email; ?>	</td> 
					   </tr><tr>
						<td style="width:25%;"> Telephone </td>
						<td> 	<?php   echo $Telephone; ?>	</td> 
					   </tr><tr>
						<td style="width:25%;"> Place </td>
						<td> 	 <?php   echo $Place; ?>	</td> 
					   </tr>
				    </table> 
						<div align="right"> Date: <?php echo $updated_at; ?> </div>
						<?php 
					}
					
				?>
				
				  <b style="font-size:19px;"> 2.	Area of research </b><br><br>
	
		 <b style="font-size:19px;"> A.	What is your broad area of research? </b><br> <br> 
		 
		  
		<div style="margin-left:2%;" class="panel panel-default" id="ResearcherA" > 
			<div class="panel-body">
			 <div class="row"  >
				<div class="col-sm-3">
					<input type="checkbox"  style="width:auto;" id="ResearcherA_1"  name="ResearcherA_1" value ="ICT"  <?php $Q_title="ResearcherA_1"; $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid); if($Ifb=="ICT"){ echo"checked";} ?>> ICT  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
					<input type="checkbox"  style="width:auto;" id="ResearcherA_2"  name="ResearcherA_2" value ="Electronics"  <?php $Q_title="ResearcherA_2"; $Ifb =  get_currentdata_anx2($dbo,$Q_title,$sess_userid); if($Ifb=="Electronics"){ echo"checked";} ?>>Electronics   &nbsp;  
				
					</div>
				
				<div class="col-sm-9">
				  
					  <input type="checkbox"  style="width:auto;" id="ResearcherA_3"  name="ResearcherA_3" value ="Others"  <?php $Q_title="ResearcherA_3"; $Ifb =  get_currentdata_anx2($dbo,$Q_title,$sess_userid); if($Ifb=="Others"){ echo"checked";} ?>> 
					 
					  <?php $Q_title="ResearcherA_4"; $Ifb =  get_currentdata_anx2($dbo,$Q_title,$sess_userid); if($Ifb=="Others"){ echo"checked";} ?> 
					 
				 
					
					</div>
			</div>
		</div>
		</div>
	
	<b style="font-size:19px;">B. Please rank your focus on the following categories:  </b><br> <br> 		
			
	<table class="table table-striped">
	 <tr>
        <th style="width:25%;">  </th>
        <th> 	Priority  	</th>
        <th> 	Remarks (if any) </th>
	  
      <tr>
        <th style="width:25%;"> Imparting Education / Knowledge </th>
        <td> 		 
					<?php $Q_title="ResearcherB_1";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				  </td> 
        <td> 	
			  <?php $Q_title="ResearcherB_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>  	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;"> Undertaking Basic Research </th>
        <td> 	  
					<?php $Q_title="ResearcherB_3";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
					</td>
        <td> 	 <?php $Q_title="ResearcherB_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;"> Undertaking Applied Research </th>
        <td> 	 
					<?php $Q_title="ResearcherB_5";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
					</td>
        <td> 	 <?php $Q_title="ResearcherB_6"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	    <tr>
        <th style="width:25%;"> Research translation in terms of Publications </th>
        <td> 	 
					<?php $Q_title="ResearcherB_7";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="ResearcherB_8"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  <tr>
        <th style="width:25%;"> Research translation in terms of IPR/Patents </th>
        <td> 		 
					<?php $Q_title="ResearcherB_9";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="ResearcherB_10"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr>
	  <tr>
        <th style="width:25%;"> Research translation in terms of Products/Services </th>
        <td> 		 
					<?php $Q_title="ResearcherB_11";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="ResearcherB_12"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	   <tr>
        <td> Others :   <?php $Q_title="ResearcherB_13"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>   </td>
        <td> 
			 
					<?php $Q_title="ResearcherB_14";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		  </td>
        <td> 	 <?php $Q_title="ResearcherB_15"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr>
  
    </table> 
	 
   <b style="font-size:19px;">C. Please mention the number of ICT&E R&D projects undertaken by you  from various budgetary resources:  </b><br> <br> 
		
		  <table class="table table-striped">
	 <tr>
        <th style="width:25%;"> Using <span class="caret"></span>  </th>
        <th> 	Number of Single institution projects	 </th>
        <th> 	Number of Joint (multi-institutional) projects  </th>
        <th  style="width:35%;" > 	Remarks (eg. name of scheme or agency) </th>
	  
      <tr>
        <th style="width:25%;"> Internal Resources with focus on basic research </th>
        <td> 	 <?php $Q_title="Researcher1C_1"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
        <td> 	 <?php $Q_title="Researcher1C_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1C_3"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
      </tr>
	   <tr>
        <th style="width:25%;"> Internal Resources with focus on applied research  </th>
        <td> 	 <?php $Q_title="Researcher1C_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_5"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_6"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;">  Govt Funds/funding Agencies with focus on basic research </th>
        <td> 	 <?php $Q_title="Researcher1C_7"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_8"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_9"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>  
	  <tr>
        <th style="width:25%;"> Govt Funds/funding Agencies with focus on applied research </th>
        <td> 	<?php $Q_title="Researcher1C_10"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	<?php $Q_title="Researcher1C_11"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	<?php $Q_title="Researcher1C_12"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
 
	   <tr>
        <th style="width:25%;"> Industry funds with focus on basic research </th>
        <td> 	 <?php $Q_title="Researcher1C_13"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1C_14"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1C_15"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
      </tr>  
	  <tr>
        <th style="width:25%;"> Industry funds with focus on applied research </th>
        <td> 	 <?php $Q_title="Researcher1C_16"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_17"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_18"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
 
	   <tr>
        <th style="width:25%;"> International funds with focus on basic research </th>
        <td> 	 <?php $Q_title="Researcher1C_19"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_20"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_21"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>  
	  <tr>
        <th style="width:25%;"> International funds with focus on applied research  </th>
        <td> 	 <?php $Q_title="Researcher1C_22"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_23"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        <td> 	 <?php $Q_title="Researcher1C_24"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
 
  
    </table> 
	<b style="font-size:19px;">D.	Please mention numbers for various R&D output indicators for you:  </b><br> <br> 
	
	<table class="table table-striped">
	 <tr>
         
        <th> 	Output indicators	</th>
       <th> 	Number (Remarks National/International)   </th>
	  </tr>
      <tr>
        <th style="width:25%;">Publication (referred journals)  </th>
        <td> 	 <?php $Q_title="Researcher1D_1"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
        </tr>
	   <tr>
        <th style="width:25%;"> Patent Filed </th>
        <td> 	 <?php $Q_title="Researcher1D_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	   <tr>
        <th style="width:25%;"> Patent Granted </th>
        <td> 	 <?php $Q_title="Researcher1D_3"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr> <tr>
        <th style="width:25%;">Copyright Obtained</th>
        <td> 	 <?php $Q_title="Researcher1D_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  <tr>
        <th style="width:25%;"> New products developed </th>
        <td> 	 <?php $Q_title="Researcher1D_5"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  <tr>
        <th style="width:25%;"> New processes developed </th>
        <td> 	 <?php $Q_title="Researcher1D_6"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	   <tr>
        <th style="width:25%;"> Design prototypes developed </th>
        <td> 	 <?php $Q_title="Researcher1D_7"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr> <tr>
        <th style="width:25%;"> Transfer of Technologies (ToT)</th>
        <td> 	 <?php $Q_title="Researcher1D_8"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr> <tr>
        <th style="width:25%;"> Licensing</th>
        <td> 	 <?php $Q_title="Researcher1D_9"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr><tr>
		<td style="width:25%;">   Others : <?php $Q_title="Researcher1D_10"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>  </td>
        <td> 	 <?php $Q_title="Researcher1D_11"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr>
  
    </table> 
   
   <b style="font-size:19px;">E. Please mention the number of new ICT&E Technology(s)/ Prototype(s)/ Startup(s)/ Service(s) developed by you for various agencies which were intended for Indian/ Global markets:  </b><br> <br> 
   
     <table class="table table-striped">
	  <tr>
        <th>   	</th>
        <th>  Indian market    	</th>
        <th>  Global market    </th>
        <th>  Remarks (eg. broad domain of type) </th>
	  </tr>
	 
	  <tr>
        <th style="width:25%;"> Government </th>
        <td> 	 <?php $Q_title="Researcher1E_1"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1E_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
		<td> 	 <?php $Q_title="Researcher1E_3"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr>  <tr>
        <th style="width:25%;"> Industry </th>
        <td> 	 <?php $Q_title="Researcher1E_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1E_5"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1E_6"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
      </tr><tr>
	   <td style="width:25%;">  Others :    <?php $Q_title="Researcher1E_7"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>   </td>
       <td> 	 <?php $Q_title="Researcher1E_8"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
        <td> 	 <?php $Q_title="Researcher1E_9"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
       <td> 	 <?php $Q_title="Researcher1E_10"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>	</td>
      </tr>
	 
	</table> 
	
	 <b style="font-size:19px;">F. Has  output of your past R&D carried out in ICT&E domain been used by Industry? </b><br> <br> 
		<div class="panel panel-default">
		  <div class="panel-body">
		   
			 <?php $Q_title="Researcher1F_1"; echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> 
			 
		  </div>
		</div>
		
		
	 <br> <b style="font-size:19px;">G.	Do you think that the ICT&E Technology(s)/ Prototype(s)/ Product(s)/ Service(s) developed by you    has a potential for commercial/social translation?    </b><br> <br> 	
		
		<div class="panel panel-default">
		  <div class="panel-body">
		  
		 
		 
		 
			  <div class="col-sm-2">
				<label>(a). Your choice:</label> <br>
				  <?php $Q_title="Researcher1G_1";  echo  $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> 				 
			  </div>
			  <div class="col-sm-3">
			  <label> (b). If yes, then how many: </label> <br>
					 <?php $Q_title="Researcher1G_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 
			 
			  </div>
			<div class="col-sm-7">
				  <label> (c).  If yes, then their broad application area(s): </label>  <br>
			
					<?php $Q_title="Researcher1G_3"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 
			 
			  </div>
		</div> </div>
		
		<br><b style="font-size:19px;"> H.	Please rank the Basis/Need, on which the your research problems/ projects were ascertained/ proposed: </b><br><br>
			<table class="table table-striped">
				<tr>
					<th></th>
					<th>Rank the relevant cells   </th>
				</tr>
			  
			 <tr>
				<th style="width:25%;">  Market survey  </th>
				<td> 	 
				<?php $Q_title="Researcher1H_1";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr> <tr>
				<th style="width:25%;">  Literature review  </th>
				<td> 	 
				<?php $Q_title="Researcher1H_2";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr> <tr>
				<th style="width:25%;">  IPR survey   </th>
				<td>  
				<?php $Q_title="Researcher1H_3";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr> <tr>
				<th style="width:25%;">  Industry interactions  </th>
				<td> 	 
				<?php $Q_title="Researcher1H_4";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr> <tr>
				<th style="width:25%;">  Social interactions   </th>
				<td> 	 
				<?php $Q_title="Researcher1H_5";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr> <tr>
				<th style="width:25%;">  Self-instincts  </th>
				<td> 	 
				<?php $Q_title="Researcher1H_6";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				</td>
			 </tr>
			 </table>
		<br><b style="font-size:19px;"> I.	How many schemes for translations of research into products/ services from Goverment of India and other souces are known to you:   </b><br><br>
					
	<table class="table table-striped">
	 <tr>
        <th style="width:25%;">  </th>
        <th> 	Numbers  	</th>
        <th> 	Remarks (if any) </th>
	  
      <tr>
        <th style="width:25%;"> Known and received funding: </th>
        <td> 	 <?php $Q_title="Researcher1I_1"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
          </td> 
        <td> 	
			  <?php $Q_title="Researcher1I_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>  	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;"> Known but not received funding </th>
        <td>  <?php $Q_title="Researcher1I_3"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
         </td>
        <td> 	 <?php $Q_title="Researcher1I_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	  </table>
			<br> 
					
							 
	 	<b style="font-size:19px;"> 3. Institutional Support: </b><br> <br> 
	<b style="font-size:19px;"> A.	What in your opion is the major focus of your Institution/ University/ Organization </b><br>
	<br>
	 		
	<table class="table table-striped">
	 <tr>
        <th style="width:25%;">  </th>
        <th> 	Priority  	</th>
        <th> 	Remarks (if any) </th>
	  
      <tr>
        <th style="width:25%;"> Imparting Education / Knowledge </th>
        <td> 		 
					<?php $Q_title="Researcher2B_1";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
				  </td> 
        <td> 	
			  <?php $Q_title="Researcher2B_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>  	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;"> Undertaking Basic Research </th>
        <td> 	 
					 
					<?php $Q_title="Researcher2B_3";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
					</td>
        <td> 	 <?php $Q_title="Researcher2B_4"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	   <tr>
        <th style="width:25%;"> Undertaking Applied Research </th>
        <td> 	 
					 
					<?php $Q_title="Researcher2B_5";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> </td>
        <td> 	 <?php $Q_title="Researcher2B_6"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  
	    <tr>
        <th style="width:25%;"> Research translation in terms of Publications </th>
        <td> 	 
					<?php $Q_title="Researcher2B_7";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="Researcher2B_8"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  <tr>
        <th style="width:25%;"> Research translation in terms of IPR/Patents </th>
        <td> 	 
					<?php $Q_title="Researcher2B_9";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="Researcher2B_10"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	  <tr>
        <th style="width:25%;"> Research translation in terms of Products/Services </th>
        <td> 		 
					<?php $Q_title="Researcher2B_11";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 </td>
        <td> 	 <?php $Q_title="Researcher2B_12"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 	</td>
      </tr>
	   <tr>
        <td style="width:25%;">   Others : <?php $Q_title="Researcher2B_13"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?>  </td>
        <td> 
			 
					<?php $Q_title="Researcher2B_14";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		  </td>
        <td> 	 <?php $Q_title="Researcher2B_15"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> </td>
      </tr>
  
    </table> 
    
	 
	<br>
	
	
	  <b style="font-size:19px;">  B.	Does your institution's rules/policies/schemes support its researchers in undertaking the following activities: </b><br>
		
		 <table class="table table-striped">
		  
		  <tr>
		   <th style="width:25%;">   </th>	
		   <th >  please rank them in order of their priority   </th>	
		  </tr>
		 
      <tr>
        <th style="width:29%;"> R&D   </th>
        <td> 	 
				<?php $Q_title="Researcher2Bb_1";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 	</td>
      </tr>
	   <tr>
        <th  > IPR filing  </th>
        <td> 	 <?php $Q_title="Researcher2Bb_2";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
	 	</td>
      </tr>
	   <tr>
        <th > Publication  </th>
        <td> 
				 <?php $Q_title="Researcher2Bb_3";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		  </td>
      </tr> <tr>
        <th  > Research Translation in products/services/startups  </th>
        <td> 	 <?php $Q_title="Researcher2Bb_4";   $GSBV= get_currentdata_anx2($dbo,$Q_title,$sess_userid); 
							switch($GSBV){ 
							case "Can not say":  echo "Can't say"; break; 
							case "0-No focus": echo "0-No focus"; break;
							case "1": echo "1- Low Priority"; break;
							case "2": echo "2";  break;
							case "3": echo "3"; break;
							case "4": echo "4"; break;
							case "5":  echo "5 - High Priority"; break; }
						 ?> 
		 	</td>
      </tr>
	   
    </table>
  
	<br>
	
	  <b style="font-size:19px;">  C.	Are researchers (scientists and inventors) at your Institution/ University/ Organisation  given any sort of incentive for successful research or obtaining patent or product development or Transfer of technology </b> <br><br>
	 		<div class="panel panel-default">
			  <div class="panel-body">
			 
			  <div class="col-sm-2">
				 <?php $Q_title="Researcher2C_1";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> 
				 
			  </div>
			  <div class="col-sm-10">
				 <?php $Q_title="Researcher2C_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 
	     
			  </div>
				 </div>
			</div>
			 
			<br>
			
	  <b style="font-size:19px;">  D.	Has industry setup a research  facility/laboratory in ICT&E domain at your institution   </b> <br><br>
	 		 <div class="panel panel-default">
  <div class="panel-body">  

			  <div class="col-sm-2">
				 <?php $Q_title="Researcher2D_1";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
				 
			  </div>
			  <div class="col-sm-10"> If yes, please give details:
				 <?php $Q_title="Researcher2D_2"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> 
	     
			  </div>
			  </div>
				
			</div><br>
		<b style="font-size:19px;"> E.	Does your Institution/ University/ Organisation provide access of the following to its researchers? </b> <br>
	<table class="table table-striped">
	 <tr>
        <th style="width:50%;">  </th>
        <th > 	Is access provided to researchers? 	  </th>
        <th style="text-align:center;"> 	Location with reference to your   institution (ignore if previous option is No)</th>
	  
      <tr>
        <th style="width:25%;"> Rapid prototyping facility (Hardware and/or Software) </th>
        <td> 	  <?php $Q_title="Researcher2E_1";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> 
				 </td> 
        <td style="text-align:center;" > 	
				  <?php $Q_title="Researcher2E_2";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		 	</td>
      </tr>
	   <tr>
        <th style="width:25%;"> Hardware and/or Software testing facility(s) </th>
         <td> 	 <?php $Q_title="Researcher2E_3";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> </td>
        <td style="text-align:center;"> 	
			<?php $Q_title="Researcher2E_4";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		</td></tr>
	   <tr>
        <th style="width:25%;"> Standardization/ Certification Body(s) </th>
          <td>	 <?php $Q_title="Researcher2E_5";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		  </td>
        <td style="text-align:center;"> 	
			 <?php $Q_title="Researcher2E_6";  echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		</td></tr> <tr>
        <th style="width:25%;"> IPR office </th>
         <td> 	 <?php $Q_title="Researcher2E_7";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
			 	</td>
        <td style="text-align:center;"> 
				<?php $Q_title="Researcher2E_8";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 		
		 </td> </tr>
	  <tr>
        <th style="width:25%;"> Technology Transfer Office </th>
          <td> 
				<?php $Q_title="Researcher2E_9";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
				
		 </td>
        <td style="text-align:center;"> 

			<?php $Q_title="Researcher2E_10";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
	 	</td> </tr>
	  <tr>
        <th style="width:25%;"> Platform for Industry Interactions </th>
		
         <td>
			<?php $Q_title="Researcher2E_11";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		 </td>
        <td style="text-align:center;"> 	
			<?php $Q_title="Researcher2E_12";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);  ?> 
		 	</td> </tr>
	  </table> 	
    
	
	<b style="font-size:19px;">5.	Insight</b><br><br>
				<b style="font-size:19px;"> A.	Based on some known successful examples of ICT&E R&D translation, what is your opinion/ suggestion that will boost translation of R&D into Technologies / Products/ Solutions /Startups having commercial/societal value: </b><b class="red">*</b><br>
				   <?php $Q_title="Researcher4A"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> <br><br>
				<b style="font-size:19px;">	B.	Views on issues/ problem faced (if any) that hinders in translation of research into Technologies/ Products/ Services/ Start-ups having commercial/societal value:</b><b class="red">*</b><br>
				 <?php $Q_title="Researcher4B"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> <br><br>
				<b style="font-size:19px;"> C.	Do you think their are factors/ barriers which are hampering Industry academia linkages and Transfer of Technologies? If yes, your views on the same: </b><b class="red">*</b><br><br>
				 <?php $Q_title="Researcher4C"; echo get_currentdata_anx2($dbo,$Q_title,$sess_userid); ?> <br><br>
				
				<br>
				
				<b style="font-size:19px;">5. Would you like to be participate in similar surveys next year?  </b><b class="red">*</b> <br> 
				<div class="panel panel-default">
					<div class="panel-body">
						 <?php $Q_title="Researcher4D";   echo $Ifb = get_currentdata_anx2($dbo,$Q_title,$sess_userid);   ?> 
					 	</div>
				</div>
			 
			<br> <br>
		<?php 
	}
 ?>
	
	 
	
	 

	
	 

<?php 
function get_currentdata_anx2($dbo,$Q_title,$sess_userid)
	{	 
		$SJHDKJ_FD="SELECT Q_details FROM survey_questions WHERE user_id='$sess_userid' AND Q_title='$Q_title' AND Annexure='2'";
			foreach($dbo->query($SJHDKJ_FD) AS $YTFG7)
			{
					return $A2rea1 = $YTFG7["Q_details"];
			}
	}
?>

	
    <?php ob_end_flush(); ?>
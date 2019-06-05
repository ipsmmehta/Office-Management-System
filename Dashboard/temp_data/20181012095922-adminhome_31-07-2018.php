 
<?php 
 
require "config.php";// connection to database 	
require "functions.php";// connection to database 	

	

?>
 
 <script>
 
 
 
 
 
 /*
 var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
     var myevent = (isNS) ? e : event;
     var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }
 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
 */
 </script>
  
<?php 
 
session_start();
    $role = $_SESSION['s_userrole'];
    $user_name = $_SESSION['s_username'];
	
	
			if(!isset($_SESSION['s_username'])){
			  header('Location: index.php?p=login');
			}
			$s_id	       = $_SESSION['s_id'];
			$s_username = $_SESSION['s_username'];
	// session_destroy(); 
	
	// START OF  MIS SESSION FEILD
		
		$_SESSION['timeout'] = time();
		 
		$role = $_SESSION['sess_userrole'];
		if(!isset($_SESSION['sess_username'])){
		  header('Location: index.php?p=login');
		}
		$id	       = $_SESSION['sess_user_id'];
		$loginuser = $_SESSION['sess_username'];
		$userparent_table_id = $_SESSION['sess_userparentid'];
		$myparent_table_id=$userparent_table_id;
		$userparent_table_name = $_SESSION['sess_userTable_name']; 
		$myparent_table_name=$userparent_table_name;
		date_default_timezone_set("Asia/Kolkata");
		$c_date = date("d/m/Y");
	  
	// END   OF  MIS SESSION FEILD
	
	$current_userName ="";
 switch($myparent_table_name)
	 {
		 case"itra_member":
				$SQL_getname="SELECT Name FROM itra_member WHERE id ='$myparent_table_id' ";
					foreach($dbo->query($SQL_getname) AS $NM)
						{
							$current_userName = $NM["Name"];
						}
		 break;
		 
		 case"pidata":
				$SQL_getname="SELECT piname FROM pidata WHERE id ='$myparent_table_id' ";
					foreach($dbo->query($SQL_getname) AS $NM)
						{
							$current_userName = $NM["piname"];
						}
		 break;
		 
		 case"itra_faculty":
				$SQL_getname="SELECT full_name FROM itra_faculty WHERE id ='$myparent_table_id' ";
					foreach($dbo->query($SQL_getname) AS $NM)
						{
							$current_userName = $NM["full_name"];
						}
		 break;
	 
		 case"studentresearch":
				$SQL_getname="SELECT studentname FROM studentresearch WHERE id ='$myparent_table_id' ";
					foreach($dbo->query($SQL_getname) AS $NM)
						{
							  $current_userName = $NM["studentname"];
						}
		 break;
	 }

?>
 
<?php

	// include('header.php');
	// load_menu_admin($user_name,$role,$dbo);
?>

<?php // START OF HEADER SECTION ?>

 
<!DOCTYPE html>
<html lang="en">
<head>

  <title>ITRA-MIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="https://itra.medialabasia.in/wp-content/uploads/2014/08/logo5-1.ico"><script></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	
 <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
  
  

    <!-- START OF DROP DOWN SECTION -->
	
	<style>


// facebook and twitter styls

.fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

</style>

   <!-- END OF DROP DOWN SECTION -->
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="img/menustyle.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
  

.navbar-brand { 
  width: 70px;
  height: 50px;
 // background: url('https://www.itra.com/uploads/img/img1.png') no-repeat center center;
  background-size: 50px;  
}

.nav-tabs {
  display: inline-block;
  border-bottom: none;
  padding-top: 15px;
  font-weight: bold;
}
.nav-tabs > li > a, 
.nav-tabs > li > a:hover, 
.nav-tabs > li > a:focus, 
.nav-tabs > li.active > a, 
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
  border: none;
  border-radius: 0;
}

.nav-list { border-bottom: 1px solid #eee; }
.nav-list > li { 
  padding: 20px 15px 15px;
  border-left: 1px solid #eee; 
}
.nav-list > li:last-child { border-right: 1px solid #eee; }
.nav-list > li > a:hover { text-decoration: none; }
.nav-list > li > a > span {
  display: block;
  font-weight: bold;
  text-transform: uppercase;
}

.mega-dropdown { position: static !important; }
.mega-dropdown-menu {
  padding: 20px 15px 15px;
  text-align: center;
  width: 100%;
  
}
.icon_img{
	height:85px; 
	width:85px;
}
    </style>

			
<!--	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>  
     <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
	 
    <script src="img/jquery.js"></script>
    <script src="img/bootstrap.js"></script>
	
  <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
 


 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="startTime()" >
 
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >

	  <div align="right"> 
				 <span  style=" font-size:15px; //color:fff;"><?php echo $c_date; ?></span>&nbsp; <span  style=" font-size:15px; //color:fff;" id="txt" ></span> 
				&nbsp; <?php if ($user_name == NULL)
						{
							// echo "WELCOME $user_name ";
						}else
						{
							?>   
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b  style='color:green;'>Welcome <?php echo $user_name; ?></b></a> &nbsp; 
             <ul class="dropdown-menu" role="menu" style=" margin-left:75%; margin-top:-0%;"> 
               	<?php if ($user_name == NULL)
					{
						?>
							<li><a href="index.php?p=login">Sign-In</a></li>
							<li class="divider"></li>
							<li><a href="index.php?p=Singup">Sign-Up</a></li>
						<?php 
					}else
					{
						?>	 
							<li><a href="logout.php">Log-Out</a></li>
						<?php 
					}
				?>
				
              </ul>
					<span class="glyphicon glyphicon-log-in"> </span> <a href='logout.php'>Log-Out</a>		
							<?php 
						}
						
						?>
						
				
            
           
		   
			   
			<!-- <a href="mailto:itraweb@medialabasia.in" style="color:gray;" ><span class="glyphicon glyphicon-envelope"></span> itraweb@medialabasia.in</a> -->
			 &nbsp;&nbsp;
			 <span class="glyphicon glyphicon-earphone"></span> <a target="_blank" href="index.php?p=6" style="color:gray;" >Contact Us</a>  &nbsp; &nbsp;
				<a href="#" style="width:1%;" class="fa fa-facebook">.</a> &nbsp; &nbsp;
				<a href="#" class="fa fa-twitter"></a> &nbsp;&nbsp;

				 <a href="#"  style="color:gray;" >&nbsp;&nbsp;&nbsp;</a>
				 
				 
		</div>
		
		
	<div class="row">
	  <div class="col-sm-2"  style='margin-top:-2%;' >
		  <a class="navbar-brand" href='https://itra.medialabasia.in' ><img    src='img/logo.png'/></a>&nbsp;<br>
	  </div>
	  <div class="col-sm-10">
	  
	     <div   align="right"  >
   <div class="row" style='//background-color:#F5F5F5;' align="right"  >
    
			<div class="col-sm-6"> 
			 
			</div>
			<div class="col-sm-6"> 
		 
			 
			</div>
  </div>
  
  </div>  
  
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> </a>
    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
	 
 
        <ul class="nav navbar-nav">  
            
            <li><a href="#"> &nbsp;</a></li>
            <li><a href="adminhome.php">HOME</a></li>
              <li class="dropdown">
              <a href="index.php?p=1" class="dropdown-toggle" data-toggle="dropdown"> ANALYTICS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
			   <?php
				switch($role)
				{
					
					case"admin":
					if($loginuser=="ipsm")
					{
						?>	<li><a target='MainWindow' href='../MIS/home_old_MIS_Grid.php' style='color:blue;' >OLD-MIS-HOME</a></li> <?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/manage_project_admin.php' style='color:blue;' > Manage Projects nd other Data </a></li><?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/mapping.php' style='color:blue;' >Mapping of username and password</a></li> <?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/alldata/Budget/Performance_content.php?dsg_ViewData' style='//color:blue;' >Quantitative Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/Performance_parameters_numbers.php' style='//color:blue;' >Project Performance Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						
						?>	 
							<!-- <li><a href='adminhome.php?pid=View_Budget_Outlay' style='//color:blue;' > Budget Analysis </a></li>-->
							<li><a target='MainWindow' href='../MIS/alldata/Budget/Analysis_View.php' style='//color:blue;' > Budget Analysis </a></li>
							<li class="divider"></li>
							<li><a target='MainWindow' href="../MIS/middle/Manage_user.php"  >Manage User's</a></li>
							<!-- <li><a href="adminhome.php?pid=manage_user"  >Manage User's</a></li>-->
						<?php
						?>  <li class="divider"></li> <?php 
						
					}else{}
					
						?>	<!-- <li><a href="adminhome.php?pid=publication_Analytics" style='//color:blue;' >Publications Analytics</a></li> --> <?php
						?>	<li> <a target='MainWindow' href='../MIS/admin/Publication_by_Advance.php' style='//color:blue;' > Publications Analytics</a></li><?php
						?>  <li class="divider"></li> <?php 
						?>	
							<!-- <li><a href="adminhome.php?pid=People_Analytics" style='//color:blue;' >People Analytics</a></li>  -->
							 <li><a target='MainWindow' href="../MIS/admin/People_by_Advance.php" style='//color:blue;' >People Analytics</a></li>  
							  
						
						<?php
						?>  <li class="divider"></li> <?php 
					break;
					case"itra":
						?>	
						<li><a target='MainWindow' href='../MIS/admin/Publication_by_Advance.php' style='//color:blue;' >Publications Analytics</a></li>
						<li class="divider"></li>
						<li><a target='MainWindow' href='../MIS/admin/People_by_Advance.php' style='//color:blue;' >People Analytics</a></li>
						<li class="divider"></li>
						<li><a target='MainWindow' href='../MIS/alldata/Budget/Performance_content.php?dsg_ViewData' style='//color:blue;' >Quantitative Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/Performance_parameters_numbers.php' style='//color:blue;' >Project Performance Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						
						  
						
					break;
					case"pi":
					case"institute_pi":
					case"co_pi":
					case"student":
							?>
							
							 <li><a target='MainWindow' href="../MIS/admin/People_by_Advance.php" style='//color:blue;' >People Analytics</a></li> 
							 <li class="divider"></li> 
							  <li><a target='MainWindow' href="../MIS/middle/Contact_List.php" style='//color:blue;' >Search People </a></li> 
							<!--	
                				<a target='MainWindow' href="alldata/add_Conferences/">List of Conferences</a>
								<a target='MainWindow' href="alldata/add_Conferences/add_Conferences.php">Conferences Inclusions </a>
							-->
							<?php 
					break;
					
				}
			?>
                
              </ul>
            </li>
			   
            <li class="dropdown">
              <a href="index.php?p=1" class="dropdown-toggle" data-toggle="dropdown"> PROJECT <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <?php
				switch($role)
				{
					
					case"admin":
							?><li>	<a target='MainWindow' href="../MIS/alldata/create_mentor/index.php?my_post=on">Add Mentors </a> </li> <?php 
							?>  <li class="divider"></li> <?php 
					case"itra":
						?>	<li><a target='MainWindow' href='../MIS/alldata/Budget/Performance_content.php?dsg_ViewData' style='//color:blue;' >Quantitative Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href='../MIS/Performance_parameters_numbers.php' style='//color:blue;' >Project Performance Parameters</a></li> <?php
						?>  <li class="divider"></li> <?php 
						
						?> <!--	<li><a target='nn' href='../MIS/Performance_parameters_numbers.php'   >Performance parameters Numbers </a> </li>
							<li class="divider"></li>  
							<li><a target='nn' href='../MIS/Performance_parameters_content.php'   >Performance parameters content </a> </li> 
						  <li class="divider"></li> 
						  -->
						<?php 
						
						?>	<li><a target='MainWindow' href="../MIS/admin_about_project.php">About Project</a> </li> <?php 
						?>  <li class="divider"></li> <?php 
						?>	<li><a target='MainWindow' href="../MIS/middle/team.php">Team </a> </li><?php 
						?>  <li class="divider"></li> <?php 
					break;
					case"pi":
					case"institute_pi":
					case"student":
					case"co_pi":
							?>
								<li> <a target='MainWindow' href="../MIS/about_project.php">About Project</a></li>
								<li class="divider"></li>  
								<li> <a target='MainWindow' href="../MIS/middle/team.php">Team </a></li>
							<?php 
							?>  <li class="divider"></li> <?php 
					break;
					
				}
			?>
				
			<?php
				switch($role)
				{
					
					case"admin":
						?>	<li><a target='MainWindow' href="../MIS/about_project_accordian.php">About Project Accordion Style</a></li><?php 
						?>  <li class="divider"></li> <?php 
						?>	
							<li><a target='MainWindow' href="../MIS/create_add.php" >Create/Add</a></li>
							 
						 
						<?php 
						?>  <li class="divider"></li> <?php 
					 
					break;
					case"pi":
						?> <li><a target='MainWindow'href="../MIS/add_approve_faculty.php" >Add/Approve Faculty</a> </li><?php 
						?>  <li class="divider"></li> <?php 
						?> <li><a target='MainWindow' href="../MIS/add_approve.php" >Add/Approve Student</a> </li><?php 
						?>  <li class="divider"></li> <?php 
					break;
					
					case"institute_pi":
					case"co_pi":
						?>	<li> <a target='MainWindow' href="add_approve.php">Add Student </a> </li> <?php 
						?>  <li class="divider"></li> <?php 
					break;
					case"student":
						?> <?php 
					break;
							
					
				}
			?>
			
              </ul>
            </li>
			 
			 
		 
			
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> FINANCIAL <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <?php
			   	switch($role)
					{ 
					case"admin":
					case"itra":
						?>
							<!-- <li><a target='MainWindow' href='../MIS/alldata/Budget/add_releases.php' style='//color:blue;' >Add Budget Data multiple entry</a></li>
							<li><a target='MainWindow' href='alldata/Budget/Analysis_View.php' style='//color:blue;' >Add Budget Data multiple entry</a></li>
							<li class="divider"></li>
							--> 
							
							<li><a target='MainWindow' href='../MIS/alldata/Budget/add_budget.php' style='//color:blue;' > Administrative Approval Data </a></li>
							<li class="divider"></li>
						 	<li><a target='MainWindow' href='../MIS/alldata/Budget/add_releases_view.php?showall' style='//color:blue;' > Releases Data </a></li>
							<li class="divider"></li>
						 	<li><a target='MainWindow' href='../MIS/alldata/Budget/Expenditure.php?showall' style='//color:blue;' > Expenditure Data </a></li>
							<li class="divider"></li>
							<li><a target='MainWindow' href='../MIS/alldata/Budget/Analysis_View.php' style='//color:blue;' > Budget Analysis </a></li>
							<li class="divider"></li>
						<?php
						break;
						case"pi":
						case"institute_pi":
						case"co_pi":
						case"student":
							?>
							
						 <!-- 	 <li><a target='MainWindow' href='../MIS/manage_project.php' style='//color:blue;' >Budget Outlay</a></li> -->
							 <li class="divider"></li>
						<?php
						break;
						
					}
					if($loginuser=="ipsm")
					{
						?>
							<!-- <li><a href='adminhome.php?pid=View_Budget_Outlay' style='//color:blue;' > View Budget Outlay </a></li> 
							<li><a href='../MIS/alldata/Budget/Analysis_View.php' target='MainWindow' style='//color:blue;' >Budget Analysis </a></li>
							<li class="divider"></li>--> 
							<li><a target='MainWindow' href='../MIS/alldata/Budget/Budget.php' style='//color:blue;' >Old Budget Outlay</a></li>
							<li class="divider"></li>
							<li><a target='MainWindow' href='../MIS/alldata/Budget/releases_view.php' style='//color:blue;' > Old Funds Release Outlay</a></li>
							<li class="divider"></li>
							<li><a target='MainWindow' href='../MIS/alldata/Budget/finance.php' style='//color:blue;' > Old Add Releases Data for Project</a></li>
							<li class="divider"></li>
						<?php
						 
					}else{}
				?>
				 
              </ul>
            </li>
			
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">  UPLOAD <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
				switch($role)
				{
					
					case"admin":
					 	?>	
						<li><a target='MainWindow' href="../MIS/admin/docs/index.php?my_post=Search">Upload/View files</a> </li>
						<li class="divider"></li>
						<li><a target='MainWindow' href="../MIS/alldata/add_publication/Admin_upload_Publication.php">Upload Publication</a> </li>
						<li class="divider"></li>
						<li><a target='MainWindow' href="../MIS/middle/add_news.php?my_post=delect_news">Upload News</a> </li>
						<li class="divider"></li>
						<?php 
						 
					break;
					case"itra":
						?>
						<li><a target='MainWindow' href="../MIS/admin/docs/index.php?my_post=Search">Upload/View files</a> </li>
						<li class="divider"></li>	
						<li><a target='MainWindow' href="../MIS/alldata/add_publication/Admin_upload_Publication.php">Upload Publication</a> </li>	
						<?php 
					break;
					case"pi":
						?>
						<li><a target='MainWindow' href="../MIS/admin/docs/index.php?my_post=Search">Upload Doc's</a> </li>
						<li class="divider"></li>
						<li><a target='MainWindow' href="../MIS/alldata/add_publication/add_form.php">Upload Publication</a> </li>
						<li class="divider"></li>
						<li><a target='MainWindow' href="../MIS/news/">Upload News</a> </li>
						<li class="divider"></li>
						<?php
					break;
					case"institute_pi":
					case"co_pi":
					case"student":
							?> 
						<li><a target='MainWindow' href="../MIS/admin/docs/index.php?my_post=Search">Upload Doc's</a> </li>
						<li class="divider"></li>
						<!-- <a target='MainWindow' href="alldata/add_publication/add_form.php">Add Publication</a>
						<li class="divider"></li>
						-->
							
							<?php 
					break;
					
				}
			?>
				 
              </ul>
            </li>
			
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">  DOWLOADS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
				switch($role)
				{
					
					case"admin":
					case"itra":
						 
						
						?><li><a target='MainWindow' href="../MIS/admin/docs/index.php?my_post=Search">Download Projects Doc's (DMS) </a></li> <?php 
						?><li class="divider"></li> <?php 
						?><li><a target='MainWindow' href="../MIS/middle/down.php">Add Doc's for Download </a> </li> <?php 
						?><li class="divider"></li> <?php 
					break;
					
					case"pi":
					case"institute_pi":
					case"co_pi":
					case"student":
							?><li><a target='MainWindow' href="../MIS/middle/down_project_pi.php">Project related doc's</a> </li> <?php 
							?><li class="divider"></li> <?php 
							?><li><a target='MainWindow' href="../MIS/middle/down.php">Other doc's</a> </li> <?php 
							?><li class="divider"></li> <?php 
					break;
					
				}
			?>
              </ul>
            </li>
			
			<?php 

				if(($role=="itra") || ($role=="admin") )
				{
					?>
					   <li><a href="../../MIS/middle/task.php" target='MainWindow' href="javascript:window.location.href=window.location.href" >TASK's</a></li> 
						 
						<!--  <li>
							<a href="adminhome.php?pid=task"   href="javascript:window.location.href=window.location.href" >TASK's</a>
 						</li>
					   -->
					<?php 
				}
			
			?>
			 
        </ul>
		 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  
  
	  </div>
	</div><!-- END OF partiation  -->
  
</nav>
 
	<script type="text/javascript">
	$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
	</script>
	
	
	
</head>

  


<?php // END   OF HEADER SECTION ?>
 	
<body>
 
<br><br><br><br>
 
<div class="container-fluid">
 <!--  START OF ADMIN  Portion-->
 <div class="row">
 
  <div class="col-sm-9"  >
   
   <?php 
     // echo $pid_data = $_GET["pid"];
	// START OF HIDE the post Method if not called 
	
		if(  empty($_POST["testimonial"]) && empty($_POST["Delete_testimonials"]) && empty($_POST["Update_testimonials"])  && empty($_POST["add_testimonials"])&& empty($_POST["update_testimonials_todatabase"])&& empty($_POST["add_testimonials_todatabase"])  && empty($_POST["posts"])&& empty($_POST["View"])&& empty($_POST["Delete"])&& empty($_POST["Update"])&& empty($_POST["Update_add_post"])&& empty($_POST["add_posts"])&& empty($_POST["add_post"]) ) 
					{
						 
						// if(isset($_GET['pid'])){ unset($_GET['pid']); }
						// else { echo" Hello !@ "; }
						 
						
						if(empty($_GET["pid"]))
						{
						 	$pid_data = "NOValue";
							 
						}else {
							$pid_data = $_GET["pid"];
							 
						}

					 
						
						  // echo $pid_data; 
						 switch($pid_data)
						 {
							case"task":
								include('/container/middle/task.php');
								 
							break;
							case"View_Budget_Outlay":
								include('../MIS/../MIS/alldata/Budget/Analysis_View.php');
							break;
							case"manage_user":
								include('../MIS/middle/Manage_user.php');
							break;
							case"changepwd":
								include('../MIS/profile/change_password.php');
							break;
							
							case"publication_Analytics":
								 include('../MIS/admin/Publication_by_Advance_NewMIS.php');
							break;
							
							case"People_Analytics":
								   include('../MIS/admin/People_by_Advance_NewMIS.php');
							break;
							
							case"Profile":
								 include('../MIS/profile/Profile.php');
							break;
							
							case"profileupdate":
								
								switch($role)
								{
									case"admin":
									case"itra":
										// include('../../MIS/profile/itra/profileupdate.php');
									break;
									
									case"pi":
										// ../MIS/profile/pi_profile/profileupdate.php
									break;
									case"institute_pi":
									case"co_pi":
										// ../MIS/profile/co_pi_profile/profileupdate.php
									break;
									
									case"student":
										// ../MIS/alldata/create_student/update_student.php
									break;
									
									
								}
							break;
							
							case"NOValue":
							
								// unset($_GET['pid']); 
								 
										?>
										   
											
										<div  class="embed-responsive embed-responsive-16by6" style="height:100%; position:relative; border:0px solid yellow;"    >  
											<!-- <iframe id="frm" name="MainWindow" allowfullscreen align="bottom" style="height:100%; position:relative; border:0px solid red;" onload="this.style.height=this.contentDocument.documentElement.scrollHeight+1+'px'; "  class="embed-responsive-item" frameborder="0" id="t" name="MainWindow" scrolling="no" src="" title="projects"   ></iframe> -->
											<iframe id="fraDisabled"  name="MainWindow"   align="bottom"      frameborder="0"   name="MainWindow" scrolling="yes"   title="projects"   ></iframe> 
										 
										</div> 
										
										<?php 
									break;
							
						 }
						
						?>
				<!-- 	   
				  	<div class="embed-responsive embed-responsive-16by6" style="height:100%; position:relative; border:2px solid yellow;"    >  
						<iframe allowfullscreen align="bottom" style="height:100%; position:relative; border:1px solid red;" onload="this.style.height=this.contentDocument.documentElement.scrollHeight+1+'px';" class="embed-responsive-item" frameborder="0" id="t" name="MainWindow" scrolling="no" src="project_selection.php?aggfood" title="projects"   ></iframe>
				 	</div>  
				 	</div> -->
						<?Php 
					}
				else {	 
	// END   OF HIDE the post Method if not called 
			
   ?>
	  
   
	<?php 
		
		}
		// END OF ADMIN HOME SECTIION with POST METHOD 
	?>
	  
   
  </div>
  
   <?php
			$my_img="";
				$SQl_img ="SELECT my_photo FROM $myparent_table_name WHERE id = '$myparent_table_id' ";
				foreach($dbo->query($SQl_img)as $sq)
				{
					   $my_img = $sq["my_photo"];
					 //  $iod = $sq["id"];
				}
				if($my_img=="")
				{
					$my_img="default.png";
				}
				else
				{
					//Do Nothing 
				}
	?> 
   
  <div class="col-sm-3" >
	<br>
	
    <div class="panel panel-primary">
		
      <div class="panel-heading">
	     <a  target="MainWindow"  href="../MIS/profile/Profile.php"  style="color:white; font-size:15px; "   > <img src="../MIS/profile/itra/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; " ><b><?php echo $current_userName; ?></b></a>
					
	  
			<?php
			
			
			/*
				switch($role)
				{
					case"admin":
						?>  <a  href="adminhome.php?pid=Profile"  style="color:white; font-size:15px; "   > <img src="../MIS/profile/itra/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; " ><b><?php echo $current_userName; ?></b></a><?php
					break;
					case "itra":
						?> <a   href="adminhome.php?pid=Profile" style="color:white; font-size:15; "  > <img src="../MIS/profile/itra/member/<?php echo  $my_img ;?>" class="img-circle" alt="MY Image" style="width:55px; height:55px; " ><b><?php echo $current_userName; ?></b></a> <?Php
					break;
					case "pi":
						?> <a   href="adminhome.php?pid=Profile" style="color:white; font-size:15;"  > <img src="../MIS/profile/pi_profile/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; "> <b><?php echo $current_userName; ?></b></a> <?Php
					break;
					case "institute_pi":
						?> <a  href="adminhome.php?pid=Profile" style="color:white; font-size:15px; "  > <img src="../MIS/profile/co_pi_profile/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; "> <b><?php echo $current_userName; ?></b></a> <?Php
					break;
					case "co_pi":
						?> <a  href="adminhome.php?pid=Profile" style="color:white; font-size:15px;"  > <img src="../MIS/profile/co_pi_profile/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; "> <b><?php echo $current_userName; ?></b></a> <?Php
					break;
					case "student":
						?> <a  href="adminhome.php?pid=Profile" style="color:white; font-size:15px;"  > <img src="../MIS/alldata/create_student/member/<?php echo  $my_img ;?>" alt="MY Image" style="width:55px; height:55px; "> <b><?php echo $current_userName; ?></b></a> <?Php
					break;
				}
				*/
			?>
		
		<div align="right" style="margin-top:-9%;" ><label><a href="logout.php" style="color:white;" >Logout</a></label></div>
		 <?php  $c_date = date("d/m/Y"); ?>
		 
		  </div>
      <div class="panel-body">
			<ul class="list-group">
			
			<a target="MainWindow" href="../MIS/profile/Profile.php"  ><li class="list-group-item">View Profile </li></a>
			<?php
				switch($role)
				{
					case"admin":
						?>
							<!--  <a href="adminhome.php?pid=Profile"  ><li class="list-group-item">View Profile </li></a> 
						 	 <a href="adminhome.php?pid=profileupdate"    ><li class="list-group-item">Update Profile  </li></a> --> 
						 	 <a  target="MainWindow"   href="../MIS/profile/itra/profileupdate.php" target="MainWindow"  ><li class="list-group-item">Update Profile  </li></a>  
						 <?php
					break;
					case"itra":
						?>
						 <a  target="MainWindow"   href="../MIS/profile/itra/profileupdate.php" target="MainWindow"  ><li class="list-group-item">Update Profile  </li></a> 
						<?php
					break;
					
					case"pi":
						?>  	 <a  target="MainWindow"   href="../MIS/profile/pi_profile/profileupdate.php" target="MainWindow"  ><li class="list-group-item">Update Profile  </li></a> 
						 <?php
					break;
					
					case"institute_pi":
					case"co_pi":
						?> 
							 <a  target="MainWindow"   href="../MIS/profile/co_pi_profile/profileupdate.php" target="MainWindow"  ><li class="list-group-item">Update Profile  </li></a> 
					    <?php
					break;
					
					case"student":
						?>  <a  target="MainWindow"   href="../MIS/alldata/create_student/update_student.php" target="MainWindow"  ><li class="list-group-item">Update Profile  </li></a> 
						<?php
					break;
					
				}
			?>
				 <!-- <a href="adminhome.php?pid=changepwd"   ><li class="list-group-item"> Change Password  </li></a>-->
				 <a  target="MainWindow" href="../MIS/profile/change_password.php"   ><li class="list-group-item"> Change Password  </li></a>
							 
		 		 
						  
		<?php if(($role == "admin")OR ($role == "itra")){
			//Do Nothing 
		}else{
			?>				
	<form action="itr/itr.php" name="check_approval" method="post"  target="MainWindow" >

			 
				<?php
		// Start OF Endorser Committee 
		
		$va_19="";
		$va_17="";
		
		$SQL5="SELECT * FROM travel_aprovel WHERE Endorser_id='$myparent_table_id' AND Endor_ser_table='$myparent_table_name' AND pi_committee='NA' AND Endorse_approval='Pending' ";
																						foreach($dbo->query($SQL5) as $r5)
																						{
																							 
																							$va_17= $r5["id"];
																							 
																						}
											if($va_17=="")
											{
												//Do Nothing 
											}
											else
											{
												?> <img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "> <input class="button button5" type="submit" name="Endorser_Committee" value= "Endorser Committee"> <?php 
											}
			// End  OF Endorser Committee 																			
		?>
		
		<?php 
		 
	//End of PI Committe and Chair 
	
	$SQL15="SELECT * FROM $myparent_table_name WHERE id='$myparent_table_id'";
	{
		Foreach($dbo->query($SQL15) as $r15)
		{
			$committe_id = $r15["pi_committee"];
			$myfa = $r15["focusareashortname"];
		}
		
	}	
	
	$SQL16="SELECT focus_area_id FROM focusareadata WHERE  focusareashortname='$myfa'";
		foreach($dbo->query($SQL16) as $r16)
		{
			$My_FA_id=$r16["focus_area_id"];
		}
		
		//echo" $committe_id <br>$myfa <br> $My_FA_id";
		
		switch($committe_id)
		{
			case 5:
					$SQL17="SELECT nominee_ID FROM international_travel WHERE focus_area_id='$My_FA_id' AND stage = limit_committee ";
						foreach($dbo->query($SQL17)as $r17)
							{
								
								  $cur_id = $r17["nominee_ID"];
								  ?><input type="text" name="cur_id_for_pi_committ" value="<?php echo $cur_id; ?>" hidden /><?php 
								//echo"<br>";
								
								$SQL19="SELECT * FROM travel_aprovel WHERE nominee_ID ='$cur_id' AND Endorser_id='$myparent_table_id' AND Endor_ser_table='$myparent_table_name' AND pi_committee_approval = 'Pending' AND date='committee'";
									
								foreach($dbo->query($SQL19)as $r19)
								{
									$my_id_of_approval = $r19["id"];
								 ?> <input type="text" name="my_id_of_approval" value="<?php echo $my_id_of_approval; ?>" hidden /> <input class="button button5" type="submit" name="PI_Committee" value= "PI Committee" ><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image ">  <?php 
								}
								
							}
			
			break;
			
			case 7:
			
				 $SQL21="SELECT nominee_ID FROM international_travel WHERE focus_area_id='$My_FA_id' AND forwarded = counter ";
						foreach($dbo->query($SQL21)as $r21)
							{
								
								  $cur_id21 = $r21["nominee_ID"];
								  ?><input type="text" name="cur_id_for_pi_chair" value="<?php echo $cur_id21; ?>" hidden /><?php 
								//echo"<br>";
								
								$SQL22="SELECT * FROM travel_aprovel WHERE nominee_ID ='$cur_id21' AND Endorser_id='$myparent_table_id' AND Endor_ser_table='$myparent_table_name' AND pi_committee_approval = 'Pending' AND date='committee'";
									
								foreach($dbo->query($SQL22)as $r22)
								{
									$my_id_of_approval22 = $r22["id"];
								 ?> <input type="text" name="my_id_of_approval_chair" value="<?php echo $my_id_of_approval22; ?>" hidden /> <input class="button button5" type="submit" name="PI_Committee_chair" value= "PI Committee Chair" ><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image ">  <?php 
								}
								
							}
 
				$SQL26="SELECT nominee_ID FROM international_travel WHERE parent_table_id='$myparent_table_id' AND parent_table='$myparent_table_name' AND forwarded = counter  AND chair_approval ='NA'";
						foreach($dbo->query($SQL26)as $r26)
							{
								  $My_id_of_it = $r26["nominee_ID"];
								 //echo"I am chair for my application";
								$SQL27="UPDATE international_travel set chair_approval ='approve' WHERE nominee_ID='$My_id_of_it'";
								if($dbo->query($SQL27))
								{
									// Do Nothing 
								}
								else
								{
									//Do Nothing 
								}
							}	
					
			break;
		}
		
	 echo"</form>";
	 }
	//End of PI Committe and Chair 
			 
		 
	 ?>
	 
	 
	 <?php 
	   $SQl_SQ="SELECT Active FROM $userparent_table_name WHERE id='$myparent_table_id'  ";
	foreach($dbo->query($SQl_SQ)as $r_sq)
	{
		$my_active = $r_sq["Active"];
		
	}
	switch($my_active)
	{
		case"false":
		case"NO":
		
	//	Echo"<div align='center' ><h2> Contact Your Team P.I. or Co. P.I. For your Account Activation  <h2> <div>";
		
		break;
		
		case"YES":
		case"true":	
		
						//echo "iiiii hjjjj";
					switch($role)
	{
		case "admin":
				
				?>
						 
	 
			<div    style="background-image: url(img/bg.jpg)">
			 
				   
				    <a href="#" style ="color:#3399cc;"><strong> </strong></a> 
				   <?php
					 $var_count0="0";
				 $sql1="SELECT count(*) FROM pidata WHERE Active ='false'";
									foreach ($dbo->query($sql1) as $row1) 
									{
									$var_count0 = "$row1[0]";
									}
									if($var_count0>=1)
									{
										?>
										 
										<a href="../MIS/alldata/FOR_ACTIVATION/activate_student/list_user.php" target="MainWindow">
											<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  
											P.I. Pending for Activation  <span class="badge"><?php echo $var_count0; ?></span> </li>
											</a>
										
										<?php
									}
									else
									{
										// Do Nothing 
									}
				
				?> 
				
				<?php
				 $var_count="0";
				 $sql1="SELECT count(*) FROM itradataadmin WHERE status ='disable'";
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo " $row1[0]  ";
									$var_count="$row1[0]";
								//	echo $var_count;
									}
						if($var_count>=1)
						{
							
						?> 
							<a href="../MIS/alldata/FOR_ACTIVATION/activate_teampi/account_list_user.php" target="MainWindow">
							<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  <br>
								Log-in Request Pending for Activation  <span class="badge"><?php echo $var_count; ?></span> </li>
								</a>
								    
						<?php
						}
						else
						{
							// Do Nothing 
						}
				
				?> 
				 
			</div>
				  
					
	 
				<?php			
			break;
			
			case "itra":
			?>
			
				 
				 
			 
			<?php
		    break;
		case "pi":
				?>
				 
						
						 
					 
				 <div    style="background-image: url(img/bg.jpg)">
				  
				    <?php
						
					?> 
					 
			 
					
					
					
					 <?php
						$piFA="";
						$piProject="";
						$pi_committee="";
						$Current_login= $userparent_table_id;
						//echo $Current_login;
						$sql0="SELECT focusareashortname, Projectshorttitle,pi_committee FROM pidata Where id ='$Current_login'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
							$piFA = $row0['focusareashortname'];
							$piProject=$row0['Projectshorttitle'];
							$pi_committee=$row0['pi_committee'];
							//echo"$piFA";
							}
						}
					//	echo "this is ($pi_committee) hai ";
					?>
				 
				 </div>
				  
				 <div    style="background-image: url(img/bg.jpg); ">
						 
<?php
						$piFA="";
						$piProject="";
					 
					//	 echo $userparent_table_id;
						$sql0="SELECT * FROM $myparent_table_name Where id ='$userparent_table_id'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
						 	$piFA = $row0['focusareashortname'];
						 	$piProject=$row0['Projectshorttitle'];
					     	$Instituteshortname=$row0['Instituteshortname'];
							//echo"$role_itra";
							}
						}
						
					?>
					
					
					 <?php
					 
					$var_j="";
					$sql1="SELECT count(*) FROM studentresearch WHERE focusareashortname ='$piFA' AND Active ='false'  AND Projectshorttitle ='$piProject'  ";  
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo 
									$var_j ="$row1[0]";
									// echo $var_j;
									}
									
							if($var_j=="0")
							{
								// Do Nothing 
							}
							else
							{
								?>
								<a href="../MIS/alldata/FOR_ACTIVATION/activate_student/list_user.php" target="MainWindow">
								<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  <br> 
								Students Request Pending for Activation <span class="badge"><?php echo $var_j; ?></span> </li>
								</a>
									 	<?php   
							}
					?>
					
					 <?php
					 
					$var_j="";
					$sql1="SELECT count(*) FROM itra_faculty WHERE focusareashortname ='$piFA' AND Active ='NO'  AND Projectshorttitle ='$piProject'  ";  
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo 
									$var_j ="$row1[0]";
									// echo $var_j;
									}
									
							if($var_j=="0")
							{
								// Do Nothing 
							}
							else
							{
								?>
								<a href="../MIS/alldata/FOR_ACTIVATION/activate_copi/list_user.php" target="MainWindow">
								<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  <br>
								Faculty Request Pending for Activation <span class="badge"><?php echo $var_j; ?></span> </li>
								</a>
							  <?php   
							}
					?>
					 
					 
					
					 
				
						  
					</div>
		 
	
				<?php
			break;
		
			case "institute_pi":
     		
				?>
	 
	 					<div style="background-image: url(img/bg.jpg)">
				 
					
					
<?php
						$piFA="";
						$piProject="";
						$role_itra="";
						$pi_committee="";
						$Current_login= $userparent_table_id;
						//echo $Current_login;
						$sql0="SELECT focusareashortname, Projectshorttitle, role_itra,pi_committee FROM itra_faculty Where id ='$Current_login'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
							$piFA = $row0['focusareashortname'];
							$piProject=$row0['Projectshorttitle'];
							$role_itra=$row0['role_itra'];
							 $pi_committee=$row0['pi_committee'];
							//echo"$role_itra";
							}
						}
						
					?>
					
					
		
  </div>
					 
				
				<?php
		
				?>
				 
					<div    style="background-image: url(img/bg.jpg)">
						 
<?php
						$piFA="";
						$piProject="";
						$role_itra="";
						$pi_committee="";
						$Current_login= $userparent_table_id;
						//echo $Current_login;
						$sql0="SELECT focusareashortname,Instituteshortname, Projectshorttitle, role_itra,pi_committee FROM itra_faculty Where id ='$Current_login'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
							$piFA = $row0['focusareashortname'];
							$piProject=$row0['Projectshorttitle'];
							$role_itra=$row0['role_itra'];
							 $pi_committee=$row0['pi_committee'];
							 $Instituteshortname=$row0['Instituteshortname'];
							//echo"$role_itra";
							}
						}
						
					?>
					
					
					 <?php
					 
					$var_j="";
					$sql1="SELECT count(*) FROM studentresearch WHERE focusareashortname ='$piFA' AND Active ='false'  AND Projectshorttitle ='$piProject' AND Instituteshortname='$Instituteshortname'";  
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo 
									$var_j ="$row1[0]";
									//echo $var_j;
									}
									
							if($var_j=="0")
							{
								// Do Nothing 
							}
							else
							{
								?>
								<a href="../MIS/alldata/FOR_ACTIVATION/activate_student/list_user.php" target="MainWindow">
								<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  
								Student Request Pending for Activation <span class="badge"><?php echo $var_j; ?></span> </li>
								</a>
									 <?php   
							}
					?>
					 
					 
					 <?php
					 
					$var_j="";
					$sql1="SELECT count(*) FROM itra_faculty WHERE focusareashortname ='$piFA' AND Active ='NO'  AND Projectshorttitle ='$piProject' AND role_itra='co_pi'  ";  
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo 
									$var_j ="$row1[0]";
									// echo $var_j;
									}
									
							if($var_j=="0")
							{
								// Do Nothing 
							}
							else
							{
								?>
									<a href="../MIS/alldata/FOR_ACTIVATION/activate_copi/list_user.php" target="MainWindow">
								<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  
								Faculty Request Pending for Activation <span class="badge"><?php echo $var_j; ?></span> </li>
								</a> 
								<?php   
							}
					?>
					 
				
						  
					</div> 
					 
				<?php
		
			break;
		case "co_pi":
		?>
	 
	 					<div    style="background-image: url(img/bg.jpg)">
					 
					
					
					 
<?php
						$piFA="";
						$piProject="";
						$role_itra="";
						$pi_committee="";
						$Current_login= $userparent_table_id;
						//echo $Current_login;
						$sql0="SELECT focusareashortname, Projectshorttitle, role_itra,pi_committee FROM itra_faculty Where id ='$Current_login'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
							$piFA = $row0['focusareashortname'];
							$piProject=$row0['Projectshorttitle'];
							$role_itra=$row0['role_itra'];
							 $pi_committee=$row0['pi_committee'];
							//echo"$role_itra";
							}
						}
						
					?>
					
					
		
					 
					 
					 
				
				<?php
		
				?>
				 
					 
						 
<?php
						$piFA="";
						$piProject="";
						$role_itra="";
						$pi_committee="";
						$Current_login= $userparent_table_id;
						//echo $Current_login;
						$sql0="SELECT focusareashortname,Instituteshortname, Projectshorttitle, role_itra,pi_committee FROM itra_faculty Where id ='$Current_login'";
						{
							foreach($dbo->query($sql0)as $row0)
							{
							//	echo "$piFA = $row0[focusareashortname]";
							$piFA = $row0['focusareashortname'];
							$piProject=$row0['Projectshorttitle'];
							$Instituteshortname=$row0['Instituteshortname'];
							$role_itra=$row0['role_itra'];
							 $pi_committee=$row0['pi_committee'];
							//echo"$role_itra";
							}
						}
						
					?>
					
					
					 <?php
					 
					$var_j="";
					$sql1="SELECT count(*) FROM studentresearch WHERE focusareashortname ='$piFA' AND Active ='false'  AND Projectshorttitle ='$piProject' AND Instituteshortname='$Instituteshortname'";  
									foreach ($dbo->query($sql1) as $row1) 
									{
									//echo 
									$var_j ="$row1[0]";
									//echo $var_j;
									}
									
							if($var_j=="0")
							{
								// Do Nothing 
							}
							else
							{
								?>
								<a href="../MIS/alldata/FOR_ACTIVATION/activate_student/list_user.php" target="MainWindow">
								<li class="list-group-item"><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image" />  
								Request Pending for Activation  <span class="badge"><?php echo $var_j; ?></span> </li>
								</a>
								  <?php   
							}
					?>
					 
					 
					
					 
				
						  
					</div>
					
			
				<?php
		break;
		
		case "faculity":
				?>
				
				<?php
		
			break;
		
		case "student":
				?>
				 			 
					 
				 
				  
				<?php
		
			break;
	 
			
		case "Award_reviewer":
				?>
				 
						 
					 
				 <div    style="background-image: url(img/bg.jpg)">
				  
				    <?php
						
					?> 
					 
					 
					
					
					<?php
						
					?>
				 </div>
				 
		 
				
				<?php
		
			break;
		
		default:
        echo "Invalid account type talk to Web-development Team .......";
		
		
	}
	
		break;
	
	}
	

				?>
	  </ul>
	  </div>
    </div>

	
	
		<div class="panel panel-primary">
			  <div class="panel-heading"><label style="font-size:20px;">News</label></div>
			  <div class="panel-body">
			  
					
			 <marquee direction="up" scrolldelay="199" align="center" onmouseover="this.stop();" onmouseout="this.start();" height=" 125px" >
				  <?php
				  $val=0;
				  $val_description="xxx";
				  $val_filelocation="";
				  $val_link="";
				  $sq9="SELECT val_range FROM news WHERE id='1'";
								foreach($dbo->query($sq9) as $row9) 
									{
										$val=$row9["val_range"];
										$val_old_range =$row9['val_range'];
									}
									
									
									$sql="SELECT * FROM news  WHERE status='ok' ORDER BY id DESC LIMIT $val";
																 
											foreach($dbo->query($sql) as $row) 
												{
											    $val_id = $row['id'];
											   $val_link = $row['link'];
											  $val_description = $row['description'];
											  $val_filelocation = $row['filelocation'];
											   $date_time = $row['date_time'];  
												        $mm   =   $date_time{3}.$date_time{4};  
												        $dd   = substr($date_time, 0, 2); 
												        $yyyy = $date_time{6}.$date_time{7}.$date_time{8}.$date_time{9}; 
														$news_date_tot = $yyyy.$mm.$dd;  
														$news_date_tot2 = $yyyy."-".$mm."-".$dd;   
														$curr_date = date('Y-m-d'); 
														$days = (strtotime($curr_date) - strtotime($news_date_tot2)) / (60 * 60 * 24);
												
											  if(empty($val_description))
											  {
												   if(($val_link !=="")AND($val_filelocation !==""))
												 {
							 ?>
							 
							 <img src="http://itra.medialabasia.in/MIS/img/arrow-right.gif" alt="Right Arrow" >  <a  target="_blank" href="news.php?n_id=<?php echo $row['id']; ?>" style ="color:#180000; " class="subtitle"><?php echo $row['heading']; if($days<37) {   ?><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "><?php	} else{} ?></a> <br><br>
							 
							 
							<?php
												 }
												 elseif(empty($val_filelocation))
												 {
													?> 
											<img src="http://itra.medialabasia.in/MIS/img/arrow-right.gif" alt="Right Arrow">  <a target="_blank" href="<?php echo $row['link']; ?>" style ="color:#180000; " class="subtitle" target="blank"><?php echo $row['heading']; if($days<37) {   ?><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "><?php	} else{} ?></a> <br><br>
							  <?php
												 }
												 else{
													 ?>
													 <img src="http://itra.medialabasia.in/MIS/img/arrow-right.gif" alt="Right Arrow">  <a target="_blank" href=" ../MIS/news/<?php echo $row['filelocation']; ?>" target="blank" style ="color:#180000; " class="subtitle"><?php echo $row['heading']; if($days<37) {   ?><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "><?php	} else{} ?></a> <br><br>
														  
													 <?php 
												 }
											  }
											  else 
											  {
												 ?> 
								 <img src="http://itra.medialabasia.in/MIS/img/arrow-right.gif" alt="Right Arrow" >  <a target="_blank" href="news.php?n_id=<?php echo $row['id']; ?>"   style ="color:#180000; " class="subtitle"><?php echo $row['heading']; if($days<37) {   ?><img src="https://itra.medialabasia.in/MIS/img/new1_e0.gif" alt="New Blinking Image "><?php	} else{} ?></a> <br><br>
							 
												 <?php 
												
											  }
								}
								
						//echo" 	</table>";	 
			   
			  ?>
			  </marquee> 
			  
			  </div>
  </div>
 
   <?PHP 
	if($loginuser=="ipsm")
	{
		?>
			<div class="panel panel-primary">
			  <div class="panel-heading"> <label style="font-size:20px;"> Dashboard </label></div>
			  <div class="panel-body">
				<form name="das" method="post"  target="MainWindow" action="container/admin/post.php" >
				
				<button  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="posts"   > Posts </button>
					<button  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="posts" >  Pages </button>
					 
					<button  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="testimonial"  > Testimonial </button>
					<button  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="User"  > User </button>
					<button  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="links"  >  Links </button>
					
				<!--
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="posts" value="Posts" />
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="posts" value="Pages" />
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="Gallery" value="Gallery " />
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="testimonial" value="Testimonial" />
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="User" value="User" />
					<input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="links" value="Links" />
				--> 
				</form>
	 
				</div>
			</div>
			
		<?php
	}
  ?>
  
</div>


 <!--  END OF ADMIN  Portion-->
</div>


<?php

// 	include('footer.php');
?>
<?php // START OF FOTTER PART ?>
</div>
<footer  class="container-fluid text-center" style=" border:1px solid #e3e3e3;">
		<div class="row">
				  <div class="col-sm-8" style=" border:0px solid lightgray;">
				  
					<div class="row">
					<!-- 
					<div class="col-sm-4" style=" border:0px solid lightgray;"> 
						 		
					</div>
					--> 
					
						<div class="col-sm-3" style=" border:0px solid lightgray;"> 
								<div class="top10" align="left" >
									<h4 >PROJECTS</h4>
									<div style="margin-left:5%;">
										  
										  <?php
												switch($role)
												{
													
													case"admin":
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/focusarea/focusarea.php"><span class="glyphicon glyphicon-link"></span> Create Focus Area  </a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/create_project/index.php"><span class="glyphicon glyphicon-link"></span> Create Project</a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../alldata/create_institute/create_institute.php"><span class="glyphicon glyphicon-link"></span> Create Institute</a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/create_teampi/create_teampi.php"><span class="glyphicon glyphicon-link"></span> Create Team P.I.</a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/create_faculty/create_faculty.php"><span class="glyphicon glyphicon-link"></span> Create Faculty</a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/create_mentor/index.php"><span class="glyphicon glyphicon-link"></span> Create Mentors</a><br>  <?php 
															?> 	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/Gallery.php"><span class="glyphicon glyphicon-link"></span> Create/Add Gallery</a><br>  <?php 
															echo"<br>";
													case"itra":
														?>	 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/admin_about_project.php"><span class="glyphicon glyphicon-link"></span>About Project</a><br>   <?php 
													 	?>	 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/middle/team.php"><span class="glyphicon glyphicon-link"></span>Team</a> <br> <?php 
													break;
													case"pi":
													case"institute_pi":
													case"student":
													case"co_pi":
															?>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/about_project.php"><span class="glyphicon glyphicon-link"></span>About Project</a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/middle/team.php"><span class="glyphicon glyphicon-link"></span>Team</a><br>
															<?php 
													break;
													
												}
											?> 
										  
									 </div>
								</div>
						
						</div>
						
						<div class="col-sm-3" style=" border:0px solid lightgray;"> 
								<div class="top10" align="left" >
									<h4 >FINANCIAL</h4>
									<div style="margin-left:5%;">
										  
										   <?php
												switch($role)
													{ 
													case"admin":
													case"itra":
														?>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/add_releases.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Add Budget Data multiple entry</a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/Analysis_View.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Budget Analysis</a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/add_releases_view.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Add Releases Data for Project</a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/Expenditure.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Expenditure Data </a><br>
															 
														<?php
														break;
														case"pi":
														case"institute_pi":
														case"co_pi":
														case"student":
															?>
															 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='manage_project.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Budget Outlay</a><br>
														<?php
														break;
														
													}
													if($loginuser=="ipsm")
													{
														?><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/Analysis_View.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>New Budget Summary	 </a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/Budget.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Old Budget </a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/releases_view.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Old Funds Release  </a><br>
															<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/alldata/Budget/finance.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Old Add Releases Data </a><br>
														<?php
														 
													}else{}
												?>
									 </div>
								</div>
						
						</div>
						
						<div class="col-sm-3" style=" border:0px solid lightgray;">
							<div class="top10" align="left" >
								<h4>CONFERENCES</h4>
									<div style="margin-left:5%;">
									<?php
										switch($role)
										{
											
											case"admin":
											case"itra":
												?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/add_Conferences/"> <span class="glyphicon glyphicon-link"></span> List of Conferences</a >  <br> <?php 
												?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)"href="../MIS/alldata/add_Conferences/add_Conferences.php"> <span class="glyphicon glyphicon-link"></span> Conferences Inclusions</a>  <br> <?php 
												?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/itr/itr_admin_itra.php"> <span class="glyphicon glyphicon-link"></span> International Travel Requests</a> <BR><?php 
											break;
											case"pi":
											case"institute_pi":
											case"co_pi":
											case"student":
													?>
														 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/itr/itr.php"> <span class="glyphicon glyphicon-link"></span> International Travel Request</a><br>
														 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/add_Conferences/"> <span class="glyphicon glyphicon-link"></span> List of Conferences</a>  <br>
														 <a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href="../MIS/alldata/add_Conferences/add_Conferences.php"><span class="glyphicon glyphicon-link"></span> Conferences Inclusions </a>  <br>
													<?php 
											break;
											
										}
									?>
										 
									 </div>
								 							
							</div>
						</div>
						
							
						<div class="col-sm-3" style=" border:0px solid lightgray;"> 
								<div class="top10" align="left" >
								<h4>ANALYTICS</h4>
									<div style="margin-left:5%;">
										  <?php
				switch($role)
				{
					
					case"admin":
					if($loginuser=="ipsm")
					{
						?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/home_old_MIS_Grid.php' style='color:blue;' ><span class="glyphicon glyphicon-link"></span>OLD-MIS-HOME</a><BR><?php
					   
					}else{}
					
						?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/admin/Publication_by_Advance.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Publications Analytics</a><BR><?php
						?>	<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/admin/People_by_Advance.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>People Analytics</a><BR>

						<?php
						
					break;
					case"itra":
						?>	
						<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/admin/Publication_by_Advance.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>Publications Analytics</a><BR>
						<a target='MainWindow' onclick="window.parent.parent.scrollTo(0,0)" href='../MIS/admin/People_by_Advance.php' style='//color:blue;' ><span class="glyphicon glyphicon-link"></span>People Analytics</a><BR>
						
						<?php 
						
					break;
					case"pi":
					case"institute_pi":
					case"co_pi":
					case"student":
							?>
							<!--	
                				<a target='MainWindow' href="alldata/add_Conferences/">List of Conferences</a>
								<a target='MainWindow' href="alldata/add_Conferences/add_Conferences.php">Conferences Inclusions </a>
							-->
							<?php 
					break;
					
				}
			?>
					<a  href="../MIS/middle/Contact_List.php" onclick="window.parent.parent.scrollTo(0,0)" target='MainWindow'  ><span class="glyphicon glyphicon-link"></span>Search People's</a> <br>
										 					 
									 </div>
									 
								 
								
								
							</div>
						
						</div>
				 	
					 
				 	
						
				 
						
						
					</div> 
					
					 
					
				
				  </div>
				
				  <div class="col-sm-4" style=" border:0px solid lightgray;">
				  
					<!-- START OF CONTACT US -->
					<forM name="gjg8" method="post">
						<div id="contact" class="container-fluid bg-grey" style="margin-top:-2.7%;">
						  <h4 class="text-center"><b>CONTACTS</b></h4>
							  <div class="row">
							<div class="col-sm-5"  >
							<div style=' text-align:left;'> 
							  <p> Information Technology Research Academy</p>
							  <p><span class="glyphicon glyphicon-map-marker"></span> Block 4, 2nd Floor C/O CDoT Campus Chhatarpur, Mehrauli New Delhi, 110030 </p>
							  <p><span class="glyphicon glyphicon-phone"></span> 91-11-24301284  </p>
							  <p><span class="glyphicon glyphicon-envelope"></span> itraweb@medialabasia.in</p>
							  </div>
							</div>
							<div class="col-sm-7 slideanim">
							  <div class="row">
								<div class="col-sm-6 form-group">
								  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
								</div>
								<div class="col-sm-6 form-group">
								  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
								</div>
							  </div>
							  <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
							  <div class="row">
								<div class="col-sm-12 form-group">
								  <button class="btn btn-default pull-right" name="send_mail"  type="submit">Send</button>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					</form>

					
					<!-- END   OF CONTACT US -->
				  
				  </div>
			</div>
			  <!-- START OF OTHER LINKS At FOTTER-->
				 <p style="font-size:11px; text-align:justify;"> This website belongs to <a href="#" title="Information Technology Research Academy"> ITRA</a>. Content displayed on this website is managed by ITRA and are for reference purpose only. All efforts have been made to make the information as accurate as possible. The ITRA will not be responsible for any loss or harm, direct or consequential or any violation of laws that may be caused by inaccuracy in the information available on this website. Any discrepancy found may be brought to the notice of ITRA. This Website is Designed and Developed by  <span title ="Avinash (JWD) " > ITRA </span> & Hosted at Digital India Corporation (formerly Media Lab Asia) web server.
				 </p>
				  
				   <!-- END OF OTHER LINKS At FOTTER-->
			<br>
     <br>
	 
			
	 
       	<div align="left" class="row" style='margin-top:-1.7%; //border:1px solid red;' >
    <div class="col-sm-4" style='//margin-left:-25;' ><a href='https://meity.gov.in' target='_black'><img    src="img/Untitled-1.png"   alt="Deity Logo "></a> </div>
    <div class="col-sm-4"  align='center'><a href='https://itra.medialabasia.in' target='_black'><img src="img/logo.png" align="center" alt="ITRA Logo"></a></div>
    <div class="col-sm-4"  ><a href='https://medialabasia.in' target='_black'><img align="right" style='height:auto;' src="img/transparent_bg.png" alt="Media Lab Asia Logo"></a></div>
    
  </div>
  
Last updated on: <?php
				$user_activation_key	= NULL;
				$SFgh=" SELECT user_lastlogin,user_activation_key	 FROM itra_users WHERE user_email='ipsm' ";
								foreach($dbo->query($SFgh)AS $VF){ 
								echo $VF["user_lastlogin"]; 
								$user_activation_key=  $VF["user_activation_key"]; 
								}
 ?>

Visitor No: <?php echo $user_activation_key; ?>



</footer>
<?php // END   OF FOTTER PART ?>

</body>
</html>
 
 

		 
 
<?php 
 function my_page_action ()
	{
		?> <form name="das" method="post" action="" >
					<table> 
						<tr>
							<td> <input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="add_posts" value=" Add New Posts" /> </td>
							<td> <input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="View" value="View " /> </td>
							<td> <input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="Media" value="Update " /> </td>
							<td> <input  class="btn btn-default" style="width:100%; text-align:left;" type="submit" name="posts" value="Delete" /> </td>
						</tr>
					</table>
					 
			</form>
		<?php 
	}
 
?>

<?php 
 
session_start();
    
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
        $sess_created_at = $_SESSION['sess_created_at'];
        $sess_userlogincountt =   $_SESSION['sess_userlogincountt'] ;
        $sess_useractive =   $_SESSION['sess_useractive'] ;
 
    // END   OF SESSION FEILD
    // session_destroy(); 
?>
<?php include('function.php');  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title> OMS Dashboard </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script> 	
 
</head>

<body>
  <!-- include('header.navbar') <br> -->
  <!--START OF NAV SECTION -->
  
<nav class="navbar navbar-default navbar-fixed-top" style=" -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
-webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
box-shadow: 1px 2px 4px rgba(0, 0, 0, .5); "  >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      
      <!--
        <button type="button" id="sidebarCollapse" class="navbar-brand"  style="background-color: transparent; border:none; color:#3978B8;" >
                <span class="glyphicon glyphicon-th-list"></span>
            <b class="fas fa-align-left" > WELLCOME TO {{config('app.name','OMS')}} </b>
              <span>  </span>
        </button>
    -->
    <button type="button" id="sidebarCollapse"   class="btn btn-warning navbar-btn" style="background-color: transparent; border:none; color:#3978B8; font-size:20px;"><span class="glyphicon glyphicon-th-list">  </span> Welcome to  OMS </button>
      
        &nbsp;&nbsp;&nbsp;&nbsp;
    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-center">
            
            <li><a href="" class="navbar-brand" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
          <!--
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> DASHBOARD <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>-->
           
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <button type="button" id="ggg"  class="navbar-brand"  style="background-color: transparent; border:none; " >
                    <span  class="glyphicon glyphicon-th"></span>
                    </button> 
            </li>
               
          <li>
                <div class="media-left" >
                        <img data-toggle="dropdown" src="https://www.w3schools.com/bootstrap/img_avatar3.png" class="media-object" style="width:45px">
                        <ul class="dropdown-menu" style=" background-color: #2196F3; padding: 2px; padding-top:15px; "  >
                        <form name="fgf" method="post" >
                         <button  name="view_profile" type="submit"  id="red_txt" > <span class="glyphicon glyphicon-user"></span>&nbsp; Account </button>
                         <button  <?php $val_name ="change_password";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="change_password" <?php  } else{ ?> name="permission_error" <?php } ?>   type="submit"  id="red_txt" > <span class="glyphicon glyphicon-lock"></span>&nbsp;Password </button> 
                         <a href="logout.php"  id="red_txt"  class="list-group-item"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log out </a>
                        </form>
                        </ul>
                    </div>
           </li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav><br>

  <!-- START OF POPOVER SECTION -->
  <script>
        $(document).ready(function(){
            $('#ggg').popover({title: "  <div style='width:299px;'><h3> <span  class='glyphicon glyphicon-th'></span> Apps</h3>  </div>  ",
             content: "<form name='dddd' method='post'> <div class='row'> <br>   <div class='col-sm-4'>  <center> <button  name='view_profile'  type='submit' id='red_txt2' > <span  class='glyphicon glyphicon-cog'></span> Dashboard </button> </center> </div>   <div class='col-sm-4'>  <center>  <button    <?php $val_name ='update_profile';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='update_profile' <?php  } else{ ?> name='permission_error' <?php } ?> type='submit' id='red_txt2' ><span  class='glyphicon glyphicon-user'></span> Profile Update </button> </center> </div> <div class='col-sm-4'> <center>  <button  <?php $val_name ='View_Download';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='View_Download' <?php  } else{ ?> name='permission_error' <?php } ?> type='submit' id='red_txt2' > <span  class='glyphicon glyphicon-download-alt'></span>   Downloads  </button> </center>  </div>  </div> <br> <div class='row'> <div class='col-sm-4'> <center> <button <?php $val_name ='apply_leaves';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='apply_leaves' <?php  } else{ ?> name='permission_error' <?php } ?> type='submit' id='red_txt2' ><span  class='glyphicon glyphicon-comment'></span>  Leave's </button> </center></div> <div class='col-sm-4'>  <center> <button <?php $val_name ='view_document';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='view_document' <?php  } else{ ?> name='permission_error' <?php } ?>   type='submit' id='red_txt2' ><span  class='glyphicon glyphicon-book'></span>  Documents </button> </center> </div>  <div class='col-sm-4'><center> <button  <?php $val_name ='task_summary';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='task_summary' <?php  } else{ ?> name='permission_error' <?php } ?>   type='submit' id='red_txt2' ><span  class='glyphicon glyphicon-tasks'></span>  Task </button> </center> </div></div><br> <div class='row'> <div class='col-sm-4'> <center> <button  <?php $val_name ='view_calender';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='view_calender' <?php  } else{ ?> name='permission_error' <?php } ?>   type='submit' id='red_txt2' ><span  class='glyphicon glyphicon-calendar'></span>  Calendar </button> </center> </div> <div class='col-sm-4'> <center> <button <?php $val_name ='Events_disp';   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name='Events_disp' <?php  } else{ ?> name='permission_error' <?php } ?>   type='submit' id='red_txt2' > <span  class='glyphicon glyphicon-blackboard'></span>  Events </button> </center> </div>  </div> </form>", html: true, placement: "bottom"}); 
        });
  </script>
  <!-- END OF POPOVER SECTION -->
  <!-- END OF NAVBAR SECTION -->
<div class="container-fluid " >
  <div class="wrapper"  >
      
    <div  id="TEST_side" > 
        <br><br>
        <div class="panel panel-default" id="sidebar" style="height:90%;" >
        <form method="post" name="action"  >
        
            <div class="panel-heading"><span class="glyphicon glyphicon-menu-hamburger"></span> <b>MENU</b> 
             
            </div>
            <div class="panel-body" >
                <nav  > 
                    
                    <ul class="nav nav-pills nav-stacked" >
                      <li><a href="" class="btn btn-primary" style="text-align:left;" > <span class="glyphicon glyphicon-home"></span> Home</a></li>
                      
                      <li>
                          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle "> <span class="glyphicon glyphicon-user"> </span> User Profile <span class="caret"></span></a>
                          <ul class="collapse list-unstyled " id="pageSubmenu">
                             <?php $val_name ="view_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> <li> <button  name="view_profile"  type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>  View Profile </button>  </li>  <?php  } else{ ?><li> <button  name="permission_error" type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>  View Profile </button>  </li> <?php } ?> 
                             <?php $val_name ="update_profile";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> <li> <button  name="update_profile"  type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>   Update Profile </button>  </li>  <?php  } else{ ?><li> <button  name="permission_error" type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>   Update Profile </button>  </li> <?php } ?> 
                             <?php $val_name ="change_password";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> <li> <button  name="change_password"  type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>  Change Password </button>  </li>  <?php  } else{ ?><li> <button  name="permission_error" type="submit"  id='red_txt' > <span class="glyphicon glyphicon-link"></span>  Change Password </button>  </li> <?php } ?> 
                          </ul>
                      </li>

                   <!--   <li><a href=""> <span class="glyphicon glyphicon-user"> </span> User Profile  </a></li> -->
                      
                      <li>
                          <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-tasks"></span> Task's <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu2">
                             <li> <button <?php $val_name ="Create_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="Create_task" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   Create Task/Subtask  </button>  </li>
                             <li> <button <?php $val_name ="view_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_task" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  View Task's </button>  </li>
                             <li> <button <?php $val_name ="update_task";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_task" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  Update Task's </button>  </li>
                             <li> <button <?php $val_name ="task_summary";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="task_summary" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  Task Summary </button>  </li>
                             
                           </ul>
                      </li>

                      <li>
                          <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-book"></span> Documents <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu3">
                              <li> <button <?php $val_name ="view_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_document" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  View Documents </button>  </li>
                              <li> <button <?php $val_name ="add_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="add_document" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  Add Documents </button>  </li>
                              <li> <button <?php $val_name ="update_document";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="update_document" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span> Update Documents </button>  </li>
                          </ul>
                      </li>

                      <li>
                          <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-edit"></span> Leave Application <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu4">
                              
                              <li> <button <?php $val_name ="apply_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="apply_leaves" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span> Apply </button>  </li>
                              <li> <button <?php $val_name ="view_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_leaves" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   View Applications </button>  </li>
                              <li> <button <?php $val_name ="history_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="history_leaves" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   Applications History </button>  </li>
                              <li> <button <?php $val_name ="add_leaves";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="add_leaves" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   Add  Leave </button>  </li>
                          </ul>
                       </li>
                        

                      

                        <!-- 
                      <li>
                          <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-file"></span> Stationery Application <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu5">
                              <li> <button  name="Stationery_apply_leaves" type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  New Application </button>  </li>
                              <li> <button  name="Stationery_view_leaves"  type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  View Applications </button> </li>
                              <li> <button  name="Stationery_history_leaves"  type="submit"   id="red_txt" > <span class="glyphicon glyphicon-link"></span> Applications History </button> </li>
                           </ul>
                      </li> -->

                     <li>
                          <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-blackboard"></span> Events  <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu6">

                             <li> <button <?php $val_name ="view_calender";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="view_calender" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  View Calendar </button>  </li>
                             <li> <button <?php $val_name ="add_events";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="add_events" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   Add Events </button>  </li>
                             <li> <button <?php $val_name ="upcoming_events";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="upcoming_events" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   Upcomming Events </button>  </li>
                             <li> <button <?php $val_name ="past_events";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="past_events" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>  Past Events </button>  </li>
                         
                          </ul>
                      </li>
                  <?php 
                    if($sess_userrole=="admin"){
                      ?>
                         <li>
                          <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="glyphicon glyphicon-edit"></span>   Accessibility Control <span class="caret"></span></a>
                          <ul class="collapse list-unstyled" id="pageSubmenu7">
                             <li> <button <?php $val_name ="Aby_user";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="Aby_user" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span> By Users </button>  </li>
                              <li> <button <?php $val_name ="Aby_apps";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="Aby_apps" <?php  } else{ ?> name="permission_error" <?php } ?> type="submit"  id="red_txt" > <span class="glyphicon glyphicon-link"></span>   By Applications </button>  </li>
                             </ul>
                         </li>
                      <?php 
                    }
                  ?>
                      
                      <li> </li> 

                    </ul>
                    <br>
                    
                    <div class="input-group">
                      <input type="text" name="usersearch" class="form-control" placeholder="Search Peoples... " />
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" <?php $val_name ="search_people";   $valpermission = fun_permission($dbo,$val_name,$sess_userid); if($valpermission=="on"){ ?> name="search_people" <?php  } else{ ?> name="basic_people_search" <?php } ?> >
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>

                    <br>
                 </nav>
            </div>
            </form>
          </div>
        
        </div>
     


    <div id="content" >
      <hr>
<!-- 
      <div id="mySidenav" class="sidenav">
          <a href="#" id="about">About</a>
          <a href="#" id="blog">Blog</a>
      </div>

      <button type="button" id="sidebarCollapse" class="btn btn-info" >
          <i class="fas fa-align-left">Toggle</i>
            <span> Sidebar</span>
      </button>
 -->
    
    <?php include('post_data.php');  ?> 
    <?php include('post_data_task.php');   ?> 
    <?php include('post_data_documents.php');   ?> 
    <?php include('post_data_events.php');   ?> 
    <?php include('post_leaves.php');   ?> 
                  
       <?php 
        if(empty($_POST)){
          fun_DefaulView($sess_userid,$dbo,$sess_name,$sess_designation,$sess_username,$sess_created_at, $sess_lastlogin_at,$sess_userrole);
         }
       ?>
     
    <!-- <a target="_blank" href="https://mdbootstrap.com/css/colors/"> https://mdbootstrap.com/css/colors/ M</a> 
    --></div>
  </div>
 
</div>

<footer class="container-fluid">
  <center> <p title="This Application is Design & Developed by Avinash (#.No-8988058729, E-mail-avimehta.mehta@gmail.com) " > Copyright @ -- 2018 </p> </center>
</footer>


 
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>


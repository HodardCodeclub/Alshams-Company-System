<?php 
include_once("../common_assets/DB_Commands/Connect_DB.php");
include_once("../common_assets/DB_Commands/admin.class.php");
include_once("../common_assets/DB_Commands/userTypes.class.php");
include_once("../common_assets/DB_Commands/project_Manager.class.php");
include_once("../common_assets/DB_Commands/Project_Class.php");


$all_URL_Names = pagesURLs::getAllURLnames();
$all_user_types = userTypes::getAlluserTypes();
$Allusers = Admin::count_users();
$all_Admin_pages = User::get_URL_pages(1);
$projects = project::get_project_names();
$Recent_Reports = Admin::GetAllReports();


$mycall = ServerCommunications::getInstance();



 // echo "count:  " . count($all_Admin_pages) . "<br/>";
 // echo "<br/> hhhh: " . $all_Admin_pages[0]->physicalAddress ;

/*because admin is 1*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 1){

    header("location: ../../index.php");
}

 $Administrator_s = $_SESSION["userDetails"];

$monthName = date('F', strtotime($Administrator_s->DateofAccess)); // July
$yearNumber = date('Y', strtotime($Administrator_s->DateofAccess)); // 2017

//echo "result: " . $yearNumber;
//echo "result: " . $Administrator_s->FirstName;

// for($i=0;$i< count($all_user_types);$i++)
// {
// echo '<input type="checkbox" name="Users[]" value="$all_user_types[$i]->id" >'.$all_user_types[$i]->userType_name .'<br/>';
// }

?>


<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="../common_assets/dist/css/AdminLTE.min.css"> 
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../common_assets/dist/css/skins/skin-blue.min.css">

   
<script type="text/javascript">

        function replaceContentInContainer(target,source) {
        document.getElementById(target).innerHTML  = document.getElementById(source).innerHTML;
      //console.log("hello ysta");
      }
</script>




<script type="text/javascript">

/*-------------- search for users using ajax -------------------*/

  function showUser(str) {
    if (str == "") {
        document.getElementById("showResult").innerHTML = "";
        return;
    }else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
   	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showResult").innerHTML = this.responseText;
             }
        };
        xmlhttp.open("GET","includes/Show_users.php?Searchbar="+str,true);
        xmlhttp.send();
    }
 }


 /*-------------- end of search for user ajax -------------------*/


// $(document).ready(function(){
//     $("Add_user_Type").click(function(){
//     	$("#usertype_EchoResult").load("hello_commander", function(responseTxt, statusTxt, xhr){
//   			  if(statusTxt == "success")
//             		    alert("External content loaded successfully!");
//             if(statusTxt == "error")
//                 alert("Error: " + xhr.status + ": " + xhr.statusText);
//         });
//     });
// });





 //  function add_user_type_Result(str) {
 //    if (str == "") {
 //        document.getElementById("usertype_EchoResult").innerHTML = "";
 //        return;
 //    }else { 
 //        if (window.XMLHttpRequest) {
 //            // code for IE7+, Firefox, Chrome, Opera, Safari
 //            xmlhttp = new XMLHttpRequest();
 //        } else {
 //            // code for IE6, IE5
 //            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 //         }
 //   	xmlhttp.onreadystatechange = function() {
 //            if (this.readyState == 4 && this.status == 200) {
 //                document.getElementById("usertype_EchoResult").innerHTML = this.responseText;
 //             }
 //        };
 //        xmlhttp.open("GET","includes/Show_users.php",true);
 //        xmlhttp.send();
 //    }
 // }



 </script>



<script type="text/javascript">

/* prevent page from reloading */

	
$("#users_table").submit(function(e) {
    e.preventDefault();
});


</script>




<style type="text/css">
  
  .hiddenBackground {
            color: white;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
            border: 0;
            background: transparent;
        }

</style>


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SH</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Elshams</b>CORP</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"><!--Toggle navigation--></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../common_assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $Administrator_s->FirstName. " ". $Administrator_s->LastName  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../common_assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $Administrator_s->FirstName. " ". $Administrator_s->LastName;  ?> - Administrator
                  <small>Member since <?php echo $monthName. ".". $yearNumber;?></small>
                </p>
              </li>
              <!-- Menu Body -->
 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat " disabled><span class="fa fa-gears"></span> Setting</a>
                </div>
                <div class="pull-right">
                  <a href="../common_assets/DB_Commands/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <?php include("Includes/SidebarNavigator.php"); ?> <!-- THE LEFT NAVIGATION BAR -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content_Goes_Here">
 <?php include("../common_assets/includes/Dashboard.php");?>
  </div>

  
  <div class="content-wrapper hide" id="admin_Home" >
 <?php include("../common_assets/includes/Dashboard.php");?>
  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <!-- Main Footer -->
 <?php include('../common_assets/includes/employee_footer.php'); ?> 




<!-- Latest compiled and minified CSS -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../common_assets/dist/js/app.min.js"></script>
<!-- for dynamic divs -->
<script type="text/javascript" src="assets/js/dynamic_div.js"></script>

<!---------------------- Developer ahmed divs -------------------------->



<div id="search_for_user" class="hide">

         <div class="row">
              <div class="col-lg-3 col-sm-offset-4"> 
              <br/>

              <form action="" method="get" id="users_table">
              <div class="input-group">
                    <input type="text" id="U_nahme" name="Searchbar" class="form-control" onkeyup="showUser(this.value)">
                     <span class="input-group-btn">
                      <input type="submit" class="btn btn-default" name="Search_Now" value="search">
                 </span>
              </div>
              </form>
          </div>
          </div>
          <br/>
          <div id="showResult">
          </div>


</div> <!-- end of searching for user -->


<div id="invoicee" class="hide">

         <div class="row">
              <div class="col-lg-3 col-sm-offset-4"> 
              <br/>

              <form action="includes/invoice.php" method="POST" id="users_table">

              <select name="projects_invoice">
                                <?php for($i=0;$i <count($projects);$i++)
                                  {
                                    echo "<option  value='" . $projects[$i]->Id."' >" . $projects[$i]->ProjectName  . "</option>";
                                  } 
                                ?>
                                  
                                </select>
              <input type="submit" name="select_invoice" value="select project">

              </form>
          </div>
          </div>
          <br/>

</div> <!-- end of searching for user -->


<div id="Report_X" class="hide">

  <div class="col-md-4">
    <h3>Recent Reports: </h3>
    <?php 
      echo "<form action='includes/Request_Report.php' method='post' >";
    for($i=0;$i<count($Recent_Reports); $i++)
    {
      echo "<button type='button' class='btn btn-success btn-lg btn-block' value='" . $Recent_Reports[$i]  . "'>" . $Recent_Reports[$i] . "
                </button> ";

    }
    echo "<input type='submit' value='show_Report' name='Show Report'>";
      echo "</form>";
    ?>
    
  </div> <!-- ./col -->

  <div class="col-md-8">
  <h4>Create Report: </h4>
<h4>table 1: </h4>
<form action='includes/Request_Report.php' method='post'>
<label>Table name :</label> 
              <select name="projects_invoice">
<!--                                 <?php for($i=0;$i <count($tables_Array);$i++)
                                  {
                                    echo "<option  value='" . $tables_Array[$i]."' >" . $tables_Array[$i]  . "</option>";
                                  } 
                                ?> -->
              </select>


<label>Row name: </label> 
              <select name="projects_invoice">
<!--                                 <?php for($i=0;$i <count($rows_array);$i++)
                                  {
                                    echo "<option  value='" . $rows_array[$i]."' >" . $rows_array[$i]  . "</option>";
                                  } 
                                ?> -->
                </select>
<br/><br/>
<label>operation: </label>
        <select name="projects_invoice">
      <option  value="LIKE" >like</option>;
      <option  value="BETWEEN" >between</option>;
      <option  value="NOT BETWEEN" >not between</option>;
      <option  value="=" >exactly as</option>;
        </select>
<input type="text" name="value_name_1">
<br/><br/>
<label>extra option: </label> 
      <select name="projects_invoice">
      <option  value="AND" >and</option>;
      <option  value="OR" >or</option>;
        </select>
                      <select name="projects_invoice">
        <!--                         <?php for($i=0;$i <count($rows_array);$i++)
                                  {
                                    echo "<option  value='" . $rows_array[$i]."' >" . $rows_array[$i]  . "</option>";
                                  } 
                                ?> -->
                </select>
<br/><br/>
<label>operation: </label>
        <select name="projects_invoice">
      <option  value="LIKE" >like</option>;
      <option  value="BETWEEN" >between</option>;
      <option  value="NOT BETWEEN" >not between</option>;
      <option  value="=" >exactly as</option>;
        </select>
<input type="text" name="value_name_1">
<br/><br/><br/>
<input type="submit" value="create_Report" name="Show Report">

</form>
<br/><br/><br/>


    
  </div> <!-- ./col -->







</body>




<!-- successfully added user type -->

      <script type="text/javascript">

		// 	document.getElementById("UT").onclick = function () {
		// 	 e.preventDefault();
		//     var ResultAdded = "user type: [" + document.getElementById("Utype").value + "] is successfully added";	
		// 	var zzz = "Utype="+document.getElementById("Utype").value;
		// 	console.log("i'm in");
		// 	// ajax start
		// 	var xhr;
		// 	if (window.XMLHttpRequest) xhr = new XMLHttpRequest(); // all browsers 
		// 	else xhr = new ActiveXObject("Microsoft.XMLHTTP"); 	// for IE
		// 	var url = "../common_assets/DB_Commands/startPoint.php?Add_user_Type=start"; /*after questionmark is the isset field*/
		// 	xhr.open('POST', url, true);
		// 	//Send the proper header information along with the request
		// 		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// 	xhr.onreadystatechange = function () {
		// 		if (xhr.readyState===4 && xhr.status===200) {
		// 			var div = document.getElementById('usertype_EchoResult');
		// 			div.innerHTML = xhr.responseText;
		// 		}
		// 	}
		// 	xhr.send(zzz);
		// 	// ajax stop
		// 	return false;
		// }
    </script>


</html>

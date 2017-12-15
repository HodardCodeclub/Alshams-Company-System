 <?php 
include_once("../../common_assets/DB_Commands/userTypes.class.php");

$all_URL_Names = pagesURLs::getAllURLnames();
$all_user_types = userTypes::getAlluserTypes();

?>
<!DOCTYPE html> 
<html>
<head>  
	<title>change permission</title>

  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script type="text/javascript">

/*-------------- search for usertypes using ajax -------------------*/

  function show_Webpages(str) {
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
        xmlhttp.open("GET","user_onpage_permission.php?Searchbar="+str,true);
        xmlhttp.send();
    }
 }

</script>


<style type="text/css">
  .page_columns{
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;
}
</style>


</head>
<body>


<br/> <br/> <br/>
  <form  action="../../common_assets/DB_Commands/startPoint.php" method="post">

<div class="row">

<div class="col-md-3 col-md-offset-1">
<div id="chang_users_permission">



                       
      user type: 
      <select id="choices" class="selectpicker" name="which_user" onchange="show_Webpages(this.value)">
      <?php
      for($i=0;$i< count($all_user_types);$i++)
      {
      echo "<option  value='" . $all_user_types[$i]->id . "'  >" .$all_user_types[$i]->userType_name ."</option>";
      }
      ?></select>



    
</div> <!-- end of change user permission -->

</div>
  <div  class="col-md-2 col-md-offset-1">
  <h2>URLs types:</h2>

  <div id="showResult"></div>

  </div>

 <input type="submit" name="update_permissions" value="update">

</div> <!--./row -->

      </form>






</body>
</html>
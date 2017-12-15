<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php include("../../common_assets/DB_Commands/includes_header.php");?>
<div id="search_for_user" >

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




</body>
</html>

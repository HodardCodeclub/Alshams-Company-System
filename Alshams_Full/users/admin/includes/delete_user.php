<!DOCTYPE html>
<html>
<head>
  <title>delete user</title>

    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../common_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body>

<div id="Delete_user" >
  <div class="row">
          <div class="col-lg-3 col-sm-offset-4"> 
          <br/>

   <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
            <div class="form-group">
                                <label for="Utype">delete user: </label>
                                <input type="text" class="form-control" id="Utype" name="Utype" placeholder="enter username">
             </div>
                           <input type="submit" name="Delete_user" id="DUT" value="delete" class="col-sm-4 col-sm-offset-4 btn btn-primary "></input>
   </form>
   </div>
   </div>
</div> <!-- end of Delte user div-->



</body>

<!-- jQuery 2.2.3 -->
<script src="../../common_assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../common_assets/bootstrap/js/bootstrap.min.js"></script>

</html>

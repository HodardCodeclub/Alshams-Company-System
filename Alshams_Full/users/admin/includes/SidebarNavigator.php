

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../common_assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $Administrator_s->FirstName. " ". $Administrator_s->LastName  ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." onClick="replaceContentInContainer('content_Goes_Here', 'search_for_user')"  onkeyup="showUser(this.value)" >
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
      <li onClick="replaceContentInContainer('content_Goes_Here', 'admin_Home')"><a ><i class="fa fa-dashboard active"></i> <span>Dashboard</span></a></li>
        <li ><a href="includes/add_new_URL.php"  ><i class="fa fa-external-link"></i> <span>add new URL</span></a></li>
        <li  ><a href="includes/view_project_stages.php" ><i class="fa fa-list-alt"></i> <span>view project stages</span></a></li>


        <!-- projects , stages  & contract types -->
                <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>main types</span>
            <span class="pull-right-container">   
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="includes/edit_project_stages.php"><i class="fa fa-circle-o"></i> add project stages</a></li>
            <li ><a href="includes/edit_stage_types.php" ><i class="fa fa-circle-o"></i> add stage types</a></li>
            <li ><a href="includes/edit_contract_types.php"  ><i class="fa fa-circle-o"></i> add  contract types</a></li>
          </ul>
        </li>


        <!-- users -->
         <li class="header">Users</li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>user control</span>
            <span class="pull-right-container">   
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="includes/add_new_user.php"><i class="fa fa-circle-o"></i> add user</a></li>
            <li ><a href="includes/change_permission.php"  ><i class="fa fa-circle-o"></i> change permissions</a></li>
          </ul>
        </li>
        <li ><a href="includes/add_new_usertype.php" ><i class="fa fa-file-text"></i> <span>add new user Type</span></a></li>
                <li  ><a href="includes/view_marksheet.php" ><i class="fa fa-file-text"></i> <span>view Mark Sheet</span></a></li>

      <!-- froms  -->
      <li class="header">Flexible Data</li>
        <li ><a href="includes/add_new_form.php" ><i class="fa fa-list-alt"></i> <span>add new form</span></a></li>
        <li onClick="replaceContentInContainer('content_Goes_Here', 'Report_X')"  ><a><i class="fa fa-list-alt"></i> <span>Reports</span></a></li>


         <li class="header">Quick links</li>
        <li onClick="replaceContentInContainer('content_Goes_Here', 'invoicee')"><a ><i class="fa fa-dashboard active"></i> <span>select invoice</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Make Announcement.!!</span></a></li>
        <li ><a href="includes/companyInformation.php"><i class="fa fa-circle-o text-aqua"></i> <span>update company information </span></a></li>
        <li class="header">other links: </li>
        <?php 
          for($i=0;$i<count($all_Admin_pages);$i++)
          {
            echo " <li><a href='includes" . $all_Admin_pages[$i]->physicalAddress . "'><i class='fa fa-circle-o text-aqua'></i> <span>" . $all_Admin_pages[$i]->friendly_name ."</span></a></li> ";
        }

        ?>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

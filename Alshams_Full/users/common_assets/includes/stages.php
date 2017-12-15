<?php
include_once("../../common_assets/DB_Commands/project_Manager.class.php");
include_once("../../common_assets/DB_Commands/admin.class.php");

// $stage1_projects =  Timeplan_stage::select_stage(1);
// $stage2_projects = Timeplan_stage::select_stage(2);
// $stage3_projects= Timeplan_stage::select_stage(3);
// $stage4_projects=Timeplan_stage::select_stage(4);
// $stage5_projects = Timeplan_stage::select_stage(5);
// $stage6_projects = Timeplan_stage::select_stage(6);

// echo "stage1 count: " . count($stage1_projects);
// echo "<br/>stage2 count: " . count($stage2_projects);
// echo "<br/>stage3 count: " . count($stage3_projects);
// echo "<br/>stage4 count: " . count($stage4_projects);
// echo "<br/>stage5 count: " . count($stage5_projects);
?>

     <center><h3 class="box-title">Latest update for each stage</h3></center>

          <br/><br/>


          <!------------------ first ROW (1,2) ---------------->

     <div class="row">
            
            <div class="col-md-5 col-md-offset-1">
              
              <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">stage I</h3> <center>drilling</center>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed no-margin">
                  <thead>
                    <tr>
        		          <th>id</th>
                      <th>Description</th>
                      <th>duration</th>
                      <th>From</th>
                      <th>to</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php for($i=0;$i<count($stage1_projects);$i++)
                  {
                    if($i==5) { break;}
                    echo '<tr>
                    <td><a href="">' . $stage1_projects[$i]->id . '</a></td>
                    <td>' . $stage1_projects[$i]->Description . '</td>
                    <td>' . $stage1_projects[$i]->duration . '</td>
                    <td>' . $stage1_projects[$i]->from . '</td>
                    <td>' . $stage1_projects[$i]->to . '</td>
                    </tr>';
                  }
                   ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" disabled>view all stage projects</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

            </div> <!-- end of first table -->      <!-- /.col -->
            <div class="col-md-5">
              
              <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">stage II</h3> <center>pilling</center>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed no-margin">
                  <thead>
                    <tr>
        		          <th>id</th>
                      <th>Description</th>
                      <th>duration</th>
                      <th>From</th>
                      <th>to</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php for($i=0;$i<count($stage2_projects);$i++)
                  {
                    if($i==5) { break;}
                   echo '<tr>
                    <td><a href="">' . $stage2_projects[$i]->id . '</a></td>
                    <td>' . $stage2_projects[$i]->Description . '</td>
                    <td>' . $stage2_projects[$i]->duration . '</td>
                    <td>' . $stage2_projects[$i]->from . '</td>
                    <td>' . $stage2_projects[$i]->to . '</td>
                    </tr>';
                  }
                   ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" disabled>view all stage projects</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
          </div> <!-- end of second table-->

          </div> <!-- end of the row -->


          <!------------------ second ROW (3,4) ---------------->
        <div class="row">
            
            <div class="col-md-5 col-md-offset-1">
              
              <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">stage III</h3> <center>concrete structure</center>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed">
                  <thead>
                    <tr>
        		           <th>id</th>
                      <th>Description</th>
                      <th>duration</th>
                      <th>From</th>
                      <th>to</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php for($i=0;$i<count($stage3_projects);$i++)
                  {
                    if($i==5) { break;}
                    echo '<tr>
                    <td><a href="">' . $stage3_projects[$i]->id . '</a></td>
                    <td>' . $stage3_projects[$i]->Description . '</td>
                    <td>' . $stage3_projects[$i]->duration . '</td>
                    <td>' . $stage3_projects[$i]->from . '</td>
                    <td>' . $stage3_projects[$i]->to . '</td>
                    </tr>';
                  }
                   ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" disabled>view all stage projects</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

            </div> <!-- end of first table -->      <!-- /.col -->
            <div class="col-md-5">
              
              <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">stage IV</h3> <center>construction division</center>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed no-margin">
                  <thead>
                    <tr>
        		          <th>id</th>
                      <th>Description</th>
                      <th>duration</th>
                      <th>From</th>
                      <th>to</th>
                  </tr>
                  </thead>
                  <tbody>
                         <?php for($i=0;$i<count($stage4_projects);$i++)
                  {
                    if($i==5) { break;}
                    echo '<tr>
                    <td><a href="">' . $stage4_projects[$i]->id . '</a></td>
                    <td>' . $stage4_projects[$i]->Description . '</td>
                    <td>' . $stage4_projects[$i]->duration . '</td>
                    <td>' . $stage4_projects[$i]->from . '</td>
                    <td>' . $stage4_projects[$i]->to . '</td>
                    </tr>';
                  }
                   ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" disabled>view all stage projects</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
          </div> <!-- end of second table-->

          </div> <!-- end of the row -->




          <!------------------ third ROW (5) ---------------->
        <div class="row">
            
            <div class="col-md-5 col-md-offset-3">
              
              <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">stage V</h3> <center>health,Electricity and finished</center>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed no-margin">
                  <thead>
                    <tr>
        		          <th>id</th>
                      <th>Description</th>
                      <th>duration</th>
                      <th>From</th>
                      <th>to</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php for($i=0;$i<count($stage5_projects);$i++)
                  {
                    if($i==5) { break;}
                    echo '<tr>
                    <td><a href="">' . $stage5_projects[$i]->id . '</a></td>
                    <td>' . $stage5_projects[$i]->Description . '</td>
                    <td>' . $stage5_projects[$i]->duration . '</td>
                    <td>' . $stage5_projects[$i]->from . '</td>
                    <td>' . $stage5_projects[$i]->to . '</td>
                    </tr>';
                  }
                   ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right" disabled>view all stage projects</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

            </div> <!-- end of first table -->      <!-- /.col -->
         


          </div> <!-- end of the row -->







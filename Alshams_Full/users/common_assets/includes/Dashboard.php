 <?php 

$stage1_projects =  Timeplan_stage::select_stage(1,5);
$stage2_projects = Timeplan_stage::select_stage(2,5);
$stage3_projects = Timeplan_stage::select_stage(3,5);
$stage4_projects = Timeplan_stage::select_stage(4,5);
$stage5_projects = Timeplan_stage::select_stage(5,5);
$stage6_projects = Timeplan_stage::select_stage(6,5);


 $working_Projects = count($stage1_projects) + count($stage2_projects) + count($stage3_projects) + count($stage4_projects) + count($stage5_projects);

$Registed_users =Admin::count_users();


?>
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Informations
      </h1>

      <!-- dashboard tab contect -->
      <div id="base-dashboard">
              <div class="row">
        <div class="col-lg-3 col-xs-4 col-lg-offset-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $working_Projects; ?></h3>
              <p>working projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-gear-b"></i>
            </div>
                          <!-- if admin , show else hide -->
        <!--<a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->

          </div>
        </div>






               <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($stage6_projects); ?></h3>
              <p> completed projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $Registed_users; ?></h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        </div> <!-- end of row-->


        <div class="row">
        <center><h3> project stages: </h3></center>
        <br/>
        <div class="col-lg-2 col-xs-6 col-lg-offset-1">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($stage1_projects); ?></h3>

              <p>stage I</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-graph-up-right"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
 
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($stage2_projects); ?></h3>

              <p>stage II</p>
            </div>
            <div class="icon">
              <i class="ion  ion-arrow-graph-down-right"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

            <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo count($stage3_projects); ?></h3>

              <p>stage III</p>
            </div>
            <div class="icon">
              <i class="ion ion-wand"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

                 <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo count($stage4_projects); ?></h3>

              <p>stage IV</p>
            </div>
            <div class="icon">
              <i class="ion ion-wand"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->


                 <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo count($stage5_projects); ?></h3>

              <p>stage V</p>
            </div>
            <div class="icon">
              <i class="ion ion-wand"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

      </div>
      </div>

<!-- end of first information bar in dashboard -->

    </section>

  
<br/><br/><br/><br/>
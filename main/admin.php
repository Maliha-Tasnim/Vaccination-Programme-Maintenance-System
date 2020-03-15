<?php
  $page_title = 'Dashboard';
  require_once('../load.php');
  page_require_level(3);
?>

<?php
  $c_user = count_by_id('users');
?>

<?php include_once('../header.php'); ?>

<div id="page-wrapper">
	<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard</h1>
      <hr>
    </div>
    <div class="row">
                <!-- 4 Boxes Start -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM division");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Divisions</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/Division.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bars fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM district");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Districts</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/District.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-columns fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM upazila");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Upazilas</div>
                                </div>
                            </div>
                        </div>
                        <a href="./data_info/Upazilla.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-codepen fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM union_council");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Union Councils</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/Union.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 4 Boxes End -->
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <th>Age for Vaccine</th>
                            <th>Name of Vaccine</th>
                            <th>Preventive Disease</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>After Birth</td>
                                <td>BCG</td>
                                <td>Tuberculosis</td>
                            </tr>
                            <tr>
                                <td>6 Weeks</td>
                                <td>Penta-1, BOPV-1, PCV-1, IPV-1</td>
                                <td rowspan="3">Diphtheria, Whooping Cough, Tetanus, Hepatitis B, Haemophilus Influenzae Type B, Poliomyelitis, Pneumococcal Pneumonia</td>
                            </tr>
                            <tr>
                                <td>10 Weeks</td>
                                <td>Penta-2, BOPV-2, PCV-2</td>
                            </tr>
                            <tr>
                                <td>14 Weeks</td>
                                <td>Penta-3, BOPV-3, PCV-3, IPV-2</td>
                            </tr>
                            <tr>
                                <td>9 Mothns</td>
                                <td>MR-1</td>
                                <td>Ham, Rubella</td>
                            </tr>
                            <tr>
                                <td>15 Months</td>
                                <td>MR-2</td>
                                <td>Ham, Rubella</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-area-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Statistics
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../vaccine_statistics/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Application
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Document
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>

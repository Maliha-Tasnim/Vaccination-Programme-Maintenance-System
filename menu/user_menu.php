<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">
  <li class="sidebar-search">
    <div class="input-group custom-search-form">
      <span class="h5">
        <?php
        $date = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
        echo $date->format('F j, Y | ');
        echo $date->format('l');
        echo $date->format(', g:i A');
        ?>
        </span>
    </div>
  </li>
  <li>
    <a>
      <i class="glyphicon glyphicon-circle-arrow-up"></i> Upload Data<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../data_info/Epi_Center.php">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Upload EPI Center List</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a>
      <i class="glyphicon glyphicon-list-alt"></i> EPI Center Scheduler<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../view_center_scheduler/index.php">
          <i class="glyphicon glyphicon-tasks"></i>
          <span>View Center Scheduler</span>
        </a> 
      </li>
      <li>
        <a href="../modify_center_scheduler/index.php">
          <i class="glyphicon glyphicon-tasks"></i>
          <span>Modify Center Scheduler</span>
        </a> 
      </li>
      <li>
        <a href="../change_center_scheduler/division_selection.php">
          <i class="glyphicon glyphicon-tasks"></i>
          <span>Change Center Scheduler</span>
        </a> 
      </li>
    </ul>
  </li>
  <li>
    <a href="../print_schedule/division_selection.php">
      <i class="glyphicon glyphicon-print"></i>
      <span>Print EPI Schedule</span>
    </a> 
  </li> 
  <li>
    <a>
      <i class="glyphicon glyphicon-folder-close"></i> Child Information<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../epi_details_reg/index.php">
          <i class="glyphicon glyphicon-collapse-up"></i>
          <span>Registration</span>
        </a> 
      </li>
      <li>
        <a href="../epi_details_reg/child_mod.php">
          <i class="glyphicon glyphicon-collapse-down"></i>
          <span>Modification</span>
        </a> 
      </li>
    </ul>
  </li>
  <li>
    <a href="../important_link/index.php">
      <i class="glyphicon glyphicon-star"></i>
      <span>Important Links</span>
    </a>
  </li>
  <li>
    <a href="../report_bugs/index.php">
      <i class="glyphicon glyphicon-send"></i>
      <span>Bugs & Reports</span>
    </a>
  </li>
  <li>
    <a href="../download/index.php">
      <i class="glyphicon glyphicon-download-alt"></i>
      <span>Downloads</span>
    </a>
  </li>
</ul>
</div>
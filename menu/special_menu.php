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
      <a href="../main/admin.php">
        <i class="glyphicon glyphicon-home"></i>
        <span>Dashboard</span>
      </a>
  </li>
  <li>
    <a>
      <i class="glyphicon glyphicon-circle-arrow-up"></i> Upload Data<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../data_info/Division.php">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Upload Division List</span>
        </a>  
      </li>
      <li>
        <a href="../data_info/District.php">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Upload District List</span>
        </a>
      </li>
      <li>
        <a href="../data_info/Upazilla.php">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Upload Upazila List</span>
        </a>
      </li>
      <li>
        <a href="../data_info/Union.php">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Upload Union List</span>
        </a>
      </li>
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
      <i class="glyphicon glyphicon-th-list"></i> Govt. Holiday Scheduler<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../holiday_info/holiday.php">
          <i class="glyphicon glyphicon-plus-sign"></i>
          <span>Create Holiday Schedule</span>
        </a> 
      </li>
      <li>
        <a href="../holiday_info/view_holiday.php">
          <i class="glyphicon glyphicon-screenshot"></i>
          <span>View Holiday Schedule</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a>
      <i class="glyphicon glyphicon-calendar"></i> EPI Session Scheduler<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
      <li>
        <a href="../schedule_info/mr_start.php">
          <i class="glyphicon glyphicon-check"></i>
          <span>Create Mon-Thu Schedule</span>
        </a> 
      </li>
      <li>
        <a href="../schedule_info/sw_start.php">
          <i class="glyphicon glyphicon-check"></i>
          <span>Create Sun-Wed Schedule</span>
        </a> 
      </li>
      <li>
        <a href="../schedule_info/at_start.php">
          <i class="glyphicon glyphicon-check"></i>
          <span>Create Sat-Tue Schedule</span>
        </a> 
      </li>
      <li>
        <a href="../view_epi_schedule/index.php">
          <i class="glyphicon glyphicon-screenshot"></i>
          <span>View EPI Schedule</span>
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
      <li>
        <a href="../year_wise_scheduler/move_yearly_scheduler.php">
          <i class="glyphicon glyphicon-tasks"></i>
          <span>Year Wise Scheduler</span>
        </a> 
      </li>
    </ul>
  </li>
  <li>
    <a href="../rechange_epi_schedule/rechange_epi_scheduler.php">
      <i class="glyphicon glyphicon-repeat"></i>
      <span>Rechange EPI Schedule</span>
    </a> 
  </li>
  <li>
    <a href="../print_schedule/division_selection.php">
      <i class="glyphicon glyphicon-print"></i>
      <span>Print EPI Schedule</span>
    </a> 
  </li>   
  <li>
    <a href="../vaccine_statistics/index.php">
      <i class="glyphicon glyphicon-equalizer"></i>
      <span>Vaccine Statistics</span>
    </a>
  </li>
  <li>
    <a href="../auth_info/users.php">
      <i class="glyphicon glyphicon-user"></i>
      <span>User Management</span>
    </a>
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
</ul>
</div>
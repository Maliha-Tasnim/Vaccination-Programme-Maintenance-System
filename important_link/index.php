<?php
  $page_title = 'Important Links';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Important Links</h1>
      <hr>
      <table class="table table-bordered" width="100%">
      	<thead>
      		<th width="5%">#</th>
      		<th width="80%">Organization</th>
      		<th width="15%">URL</th>
      	</thead>
      	<tbody>
      		<tr>
      			<td>1</td>
      			<td>Ministry of Health and Family Welfare</td>
      			<td><a href="http://www.mohfw.gov.bd/">Click Here</a></td>
      		</tr>
      		<tr>
      			<td>2</td>
      			<td>Directorate General of Health Services - DGHS</td>
      			<td><a href="www.dghs.gov.bd/index.php/en/home">Click Here</a></td>
      		</tr>
      		<tr>
      			<td>3</td>
      			<td>UNICEF Bangladesh - Health and Nutrition - Expanded Immunization</td>
      			<td><a href="https://www.unicef.org/bangladesh/health_nutrition_468.htm">Click Here</a></td>
      		</tr>
      		<tr>
      			<td>4</td>
      			<td>World Health Organization, Immunization and Vaccine Development</td>
      			<td><a href="www.searo.who.int/bangladesh/areas/immunizationvaccine/en/">Click Here</a></td>
      		</tr>
      		<tr>
      			<td>5</td>
      			<td>North South University</td>
      			<td><a href="www.northsouth.edu">Click Here</a></td>
      		</tr>
      		<tr>
      			<td>6</td>
      			<td>Expanded Program on Immunization - Wikipedia</td>
      			<td><a href="https://en.wikipedia.org/wiki/Expanded_Program_on_Immunization">Click Here</a></td>
      		</tr>
      	</tbody>
      </table>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
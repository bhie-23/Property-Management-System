<?php
require ('scripts/phpMaster.php');
$auth = new Auth(); //Creates objects for Auth methods.
$auth->adminland(); //Options: shareland, adminland, userland, loginland. This opens the session if one exists.
echoDefaultHTML();
echoJavaScript();

//FUNCTION ZONE
function echoDefaultHTML() {
	echo '
		<!DOCTYPE html>
<html>
	<head>
		<title>Manage Tenants</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Application">
		<meta name="author" content="E.Schwanke">
		<link rel="stylesheet" type="text/css" href="styles/mystyle.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
		<!-- jQuery -->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- DataTables -->
		<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
		'; echo echoJavaScript(); echo'
		<script>
		$(document).ready(function() {
			$(\'#BuildingTable\').dataTable({
				"initComplete": function() {
					var api = this.api();
					api.$(\'td\').click( function () {
						api.search( this.innerHTML ).draw();
					} );
				},
				"data": buildingData,
				"columns": [
					{ "title": "ID", "data": "building_id" },
					{ "title": "Name", "data": "name" },
					{ "title": "Address", "data": "address" },
					{ "title": "City", "data": "city" },
					{ "title": "Province", "data": "province" },
					{ "title": "Notes", "data": "building_notes" }
				]
			});
			$(\'#UnitTable\').dataTable({
				"initComplete": function() {
					var api = this.api();
					api.$(\'td\').click( function () {
						api.search( this.innerHTML ).draw();
					} );
				},
				"data": unitData,
				"columns": [
					{ "title": "ID", "data": "unit_id" },
					{ "title": "Building ID", "data": "building_id" },
					{ "title": "Unit Number", "data": "unit_number" },
					{ "title": "Notes", "data": "unit_notes" }
				]
			});
			$(\'#TenantTable\').dataTable({
				"initComplete": function() {
					var api = this.api();
					api.$(\'td\').click( function () {
						api.search( this.innerHTML ).draw();
					} );
				},
				"data": tenantData,
				"columns": [
					{ "title": "Tenant ID", "data": "account_id" },
					{ "title": "First Name", "data": "firstname" },
					{ "title": "Last Name", "data": "lastname" },
					{ "title": "Home Phone", "data": "home_phone" },
					{"title": "Email", "data": "email"},
					{"title": "Notes", "data": "tenant_notes"}
					]
			});
		});
	</script>
	</head>';
	include 'libs/header.html';
	include 'libs/menuButtons.html';
	echo '
	<body>
		<div class = "container">
			<div class "row">
				<div class = "col-xs-12">
					<h1> Manage Tenants </h1>
				</div>
			</div>
			<div class "row">
				<div class = "col-xs-9">
					Select a Building
				</div>
				<div class = "col-xs-3">
					<button type="button" class="btn btn-primary" id ="ClearSelection">Clear Selection</button>
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12">
					<table id="BuildingTable">
					</table>
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12">
					Select a Unit
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12" id="TbuildingTable">
					<table id="UnitTable">
					</table>
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12">
					Select a Tenant to Manage
				</div>
			</div>
			<div class = "row">
				<div class = "col-xs-12">
					<table id="TenantTable">
					</table>
				</div>
			</div>
			<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="manageTenants.php">Applicants</a></li>
			<li><a href="manageApplicants.php">Current Tenant Actions</a></li>
			<li><a href="manageNotices.php">Notices</a></li>
			<li><a href="manageAccounts.php">Manage Accounts</a></li>        
			</ul>
			<div class = "row">
				<div class = "col-xs-12">
					</br>
					<button type="button" class="btn btn-primary" id ="ViewApplication">View Application</button>
					<button type="button" class="btn btn-primary" id ="ApproveApplication">Approve Application</button>
					<button type="button" class="btn btn-primary" id ="LeaseAgreement">Lease Agreement</button>
				</div>
			</div>
			
		</div>
	</body>
</html>
	';
}

function echoJavaScript() {
$sqlLib = new SQL();
$string = $sqlLib->getAllBuildingRecordsInJson();
$string2 = $sqlLib->getAllUnitRecordsInJson();
$string3 = $sqlLib->getAllTenantsInJson();

echo '<script>
';
echo $string;
echo $string2;
echo $string3;
echo '
</script>';
}
?>
<?php
   require ('scripts/phpMaster.php');
   $auth = new Auth(); //Creates objects for Auth methods.
   $auth->adminland(); //Options: shareland, adminland, userland, loginland. This opens the session if one exists.
   echoDefaultHTML();

   //FUNCTION ZONE
   function echoDefaultHTML() {
	  echo '
	  <!DOCTYPE html>
	  <html>
		 <head>
			<title>Edit Work Orders</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="Edit Workorders">
			<meta name="author" content="Richard O">
			<link rel="stylesheet" type="text/css" href="styles/mystyle.css">
			<script src="../scripts/script.js"> </script>

			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			<!-- DataTables CSS -->
			<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">

			<!-- jQuery -->
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

			<!-- DataTables -->
			<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>';


			// This loads the dataTable API
			echo '
		 </head>
		 <body>
			';

			include 'libs/header.html'; 
			include 'libs/menuButtons.html'; 
			echo '
			<div class="container">
			   <div class="row">
			   <h1>Edit A Work Order</h1>
			   <div>
				  <div class="row">	
			   <div class="col-sm-12">
				  <p><textarea cols="100" rows="4" name="workOrderText">Address of building will go here: it is posted from the "Manage Workorders" form.</textarea></p>
			   </div>
			</div>

			   <hr></hr>
			   <h1>Work Order Details</h1>
			   <div class="row">
				  <div class="col-sm-3">
					 <p>Work Order ID:</p>
				  </div>
				  <div class="col-sm-9">
					 <p id="workOrderID"> 1234 </p>
				  </div>
			   </div>
			   <div class="row">
				  <div class="col-sm-3">
					 <p>Work Order #:</p>
				  </div>
				  <div class="col-sm-9">
					 <p><input type="text" name="workOrderNumber" value="1234341234"></input></p>
				  </div>
			   </div>
			   <div class="row">
				  <div class="col-sm-3">
					 <p>Work to be done:</p>
				  </div>
				  <div class="col-sm-9">
					 <p><textarea cols="100" rows="10" name="workOrderText">blah blah blah lots of work to be done.</textarea></p>
				  </div>
			   </div>


			   <!--control buttons -->
				  <div class = "row">
					 <div class = "col-sm-12 btn-group">
						<br>
						<br>
						<!--function calls here for changing the status field -->
						<!-- we might be able to just use the dataTables to change the status thorugh OnClick()-->
						<a href="/createWorkorder.php" class="btn-lg btn-primary" role="button">Submit</a>
						<a href="/admin/home.php" class="btn-lg btn-primary" role="button">Exit</a>
					 </div>
				  </div>


			   

			</body>
		 </html> ';
	  }// end echoDefaultHTML()

   ?>

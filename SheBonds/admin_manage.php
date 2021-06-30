<?php
//Connect database
	include "database/connect.php";

	//Read session
	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}

	//input
		//Manage user
		if (isset($_POST['adduser'])) {
			header('Refresh: 0; user_manage.php#add');
		}
		else if (isset($_POST['edituser'])) {
			header('Refresh: 0; user_manage.php#edit');
		}
		else if (isset($_POST['deleteuser'])) {
			header('Refresh: 0; user_manage.php#delete');
		}
		else if (isset($_POST['viewuser'])) {
			header('Refresh: 0; user_manage_view.php');
		}
		//Manage Event
		else if (isset($_POST['addevent'])) {
			header('Refresh: 0; event_manage.php#add');
		}
		else if (isset($_POST['editevent'])) {
			header('Refresh: 0; event_manage_edit.php');
		}
		else if (isset($_POST['deleteevent'])) {
			header('Refresh: 0; event_manage.php#delete');
		}
		else if (isset($_POST['viewevent'])) {
			header('Refresh: 0; event_manage_view.php');
		}
		//Manage Venue
		else if (isset($_POST['addvenue'])) {
			header('Refresh: 0; venue_manage.php#add');
		}
		else if (isset($_POST['editvenue'])) {
			header('Refresh: 0; venue_manage.php#edit');
		}
		else if (isset($_POST['deletevenue'])) {
			header('Refresh: 0; venue_manage.php#delete');
		}
		else if (isset($_POST['viewvenue'])) {
			header('Refresh: 0; venue_manage_view.php');
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TARUC Events- Admin Management</title>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Life Care - Responsive HTML5 Multi Page Template</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
	<style type="text/css">
		a:hover{
			font-size: 24px;
		}
		a{
			color: blue;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			text-align: center;
			background-color: white;
			font-size: 28px;
			font-weight: 900;
			width: 850px;
		}
		input[type=submit]{
			padding: 10px;
			color: black;
			border: none;
			background-color: #66CDAA;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 28px;
			text-align: center;
			width: 150px;
		}
		input[type=submit]:hover{
			background-color: #20B2AA;
		}
		.dropdown{
			display: inline-block;
			position: relative;
		}
		.dropdown-content{
			display: none;
			position: absolute;
			z-index: 1;
			min-width: 250%;
			background: #E0FFFF;
		}
		.dropdown-button{
			display: inline-block;
			min-width: 45%;
			padding: 5px 5px;
			font-family: Times New Roman;
			font-size: 20px;
			background: #E0FFFF;
			border-top: none;
			border-left: none;
			border-right: none;
			border-bottom: 2px #66CDAA solid;
		}
		.dropdown-button:hover{
			background-color: #66CDAA;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	        $(".dropdown").mouseleave(function(){
	        	$(".dropdown-content").hide();
	        });
	    });
		$(document).ready(function(){
	        $(".dropdown").mouseenter(function(){
	        	$(".dropdown-content").show();
	        });
	    });
	    $(document).ready(function(){
	        $("#ename").click(function(){
	        	window.location="event_manage_edit.php#editname";
	        });
	    });
	    $(document).ready(function(){
	        $("#edate").click(function(){
	        	window.location="event_manage_edit.php#editdate";
	        });
	    });
	    $(document).ready(function(){
	        $("#etime").click(function(){
	        	window.location="event_manage_edit.php#edittime";
	        });
	    });
	    $(document).ready(function(){
	        $("#ecategory").click(function(){
	        	window.location="event_manage_edit.php#editcategory";
	        });
	    });
	    $(document).ready(function(){
	        $("#edescription").click(function(){
	        	window.location="event_manage_edit.php#editdescription";
	        });
	    });
	    $(document).ready(function(){
	        $("#evenue").click(function(){
	        	window.location="event_manage_edit.php#editvenue";
	        });
	    });
	    $(document).ready(function(){
	        $("#eprice").click(function(){
	        	window.location="event_manage_edit.php#editticketprice";
	        });
	    });
	    $(document).ready(function(){
	        $("#etotal").click(function(){
	        	window.location="event_manage_edit.php#edittickettotal";
	        });
	    });
	</script>
</head>
<body background="image\service-bg.png">
	<hr width="auto" size="10" style="background: #808000"><br>
	<form action="" method="POST">
		<table align="center" cellspacing="20px">
			<tr>
				<td colspan="5" style="text-decoration: underline;font-size: 30px">Admin Management</td>
			</tr>
		</table>
		<table align="center" cellspacing="20px" style="border-bottom: 2px solid">
			<tr>
				<td width="300px">User:</td>
				<td><input type="submit" name="adduser" value="Add"></td>
				<td><input type="submit" name="edituser" value="Edit"></td>
				<td><input type="submit" name="deleteuser" value="Delete"></td>
				<td><input type="submit" name="viewuser" value="View"></td>
			</tr>
		</table>
		<table align="center" cellspacing="20px" style="border-bottom: 2px solid">
			<tr>
				<td width="300px">Event:</td>
				<td><input type="submit" name="addevent" value="Add"></td>
				<td>
					<div class="dropdown">
						<input type="submit" name="editevent" value="Edit">
						<div class="dropdown-content">
							<input type="button" class="dropdown-button" id="ename" value="Name">
							<input type="button" class="dropdown-button" id="edate" value="Date">
							<input type="button" class="dropdown-button" id="etime" value="Time">
							<input type="button" class="dropdown-button" id="ecategory" value="Category">
							<input type="button" class="dropdown-button" id="edescription" value="Description">
							<input type="button" class="dropdown-button" id="evenue" value="Venue">							
							<input type="button" class="dropdown-button" id="eprice" value="Ticket Price">
							<input type="button" class="dropdown-button" id="etotal" value="Number of Ticket">
						</div>
					</div>
				</td>
				<td><input type="submit" name="deleteevent" value="Delete"></td>
				<td><input type="submit" name="viewevent" value="View"></td>
			</tr>
		</table>
		
	</form>
		<br><hr width="auto" size="10" style="background: #808000">
</body>
</html>
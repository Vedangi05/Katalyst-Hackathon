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
?>

<!DOCTYPE html>
<html>
<head>	
	<title>TARUC Events - My Booking</title>
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
			max-width: 1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			text-align:center;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
		}
		th{
			background-color: #66CDAA;
			border:1px solid #66CDAA;
			font-size: 20px;
			text-align: center;
			padding: 5px 10px;
		}
		td{
			border:1px solid black;
			font-size: 18px;
			font-family: Times New Roman;
			padding: 5px 5px;
		}
		div{
			margin: auto;
			padding-bottom: 5px;
			min-width: 50%;
			max-width: 80%;
			background-color: white;
		}
		hr{
			border-top: 5px dotted grey;
			border-bottom: none;
			border-left: none;
			border-right: none;
			width: 95%;
			padding-top: 10px
		}
	</style>
</head>
<body background="image\service-bg.png">
	<div id="view" align="center">
		<p style="padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 900">My Booking</p>
		<hr>
		<h2>Upcoming Bookings</h2>
		<table align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Booking<br>Date & Time</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Event Time</th>
				<!-- <th>Venue</th> -->
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT * FROM booking_details as b, event_details as e WHERE b.UserID='$uid'AND b.EventID=e.EventID AND e.EventDate >= CURDATE()";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['BookingTimeStamp']."</td>";
						//Read event detail
						$read_event_detail = "SELECT * FROM event_details WHERE EventID='$eid' AND EventDate >= CURDATE()";
						$result_read_event_detail = mysqli_query($conn, $read_event_detail);
						if ($result_read_event_detail){
							while($row1 = mysqli_fetch_array($result_read_event_detail, MYSQLI_ASSOC)){
								$vid=$row1['VenueID'];
								echo "<td>".$row1['EventName']."</td>";
								echo "<td>".$row1['EventDate']."</td>";
								echo "<td>".$row1['EventTime']."</td>";
								//Read venue detail
								// $read_venue_detail = "SELECT * FROM venue_details WHERE VenueID='$vid'";
								// $result_read_venue_detail = mysqli_query($conn, $read_venue_detail);
								// if ($result_read_event_detail){
								// 	while($row2 = mysqli_fetch_array($result_read_venue_detail, MYSQLI_ASSOC)){
								// 		echo "<td>".$row2['VenueName']."</td>";
								// 	}
								// }
							}
						}
						echo "</tr>";
					}
				}
			?>
		</table>



		<h2>Previous Bookings</h2>

		<table align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Booking<br>Date & Time</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Event Time</th>
				<!-- <th>Venue</th> -->
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT * FROM booking_details as b, event_details as e WHERE b.UserID='$uid'AND b.EventID=e.EventID AND e.EventDate <= CURDATE()";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['BookingTimeStamp']."</td>";
						//Read event detail
						$read_event_detail = "SELECT * FROM event_details WHERE EventID='$eid' AND EventDate <= CURDATE()";
						$result_read_event_detail = mysqli_query($conn, $read_event_detail);
						if ($result_read_event_detail){
							while($row1 = mysqli_fetch_array($result_read_event_detail, MYSQLI_ASSOC)){
								$vid=$row1['VenueID'];
								echo "<td>".$row1['EventName']."</td>";
								echo "<td>".$row1['EventDate']."</td>";
								echo "<td>".$row1['EventTime']."</td>";
								//Read venue detail
								// $read_venue_detail = "SELECT * FROM venue_details WHERE VenueID='$vid'";
								// $result_read_venue_detail = mysqli_query($conn, $read_venue_detail);
								// if ($result_read_event_detail){
								// 	while($row2 = mysqli_fetch_array($result_read_venue_detail, MYSQLI_ASSOC)){
								// 		echo "<td>".$row2['VenueName']."</td>";
								// 	}
								// }
							}
						}
						echo "</tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>
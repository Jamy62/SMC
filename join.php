<?php 
	session_start();
	include('dbConnect.php');

	$mID = '0';
	if (isset($_SESSION['MID']))
	{
		$mID = $_SESSION['MID'];
	}

	$hSch = '0';

	if (isset($_POST['btnSearch'])) 
	{
	    $hSch = $_POST['txtSearch'];
	}
	
	if (!isset($_SESSION['MID'])) 
	{
		echo "<script>window.alert('Cannot Access member data, please login again')</script>";
		echo "<script>window.location='memberLogin.php'</script>";
	}

	if (isset($_GET['cID'])) 
	{
		$CID = $_GET['cID'];
		$select = "SELECT * FROM campaigntb
				   WHERE CampaignID = '$CID'";

		$query = mysqli_query($dbConnect, $select);
		$result = mysqli_fetch_array($query);

		$cID = $result['CampaignID'];
		$cName = $result['CampaignName'];
		$cStartDate = $result['CampaignStartDate'];
		$cEndDate = $result['CampaignEndDate'];
	}

	if (isset($_POST['btnJoin'])) 
	{
		$jDate = $_POST['txtJDate'];
		$jStatus = 'Pending';
		$jEmail = $_POST['txtJEmail'];
		$jPh = $_POST['txtJPh'];
		$jDes = $_POST['txtJDes'];
		$jPt = $_POST['rdoPayment'];
		$mID = $_POST['txtmID'];
		$cID = $_POST['txtcID'];

		$checkJoin = "SELECT * FROM jointb WHERE CampaignID = '$cID' AND MemberID = '$mID'";
		$result = mysqli_query($dbConnect, $checkJoin);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('You have already applied to this campaign.')</script>";
			echo "<script>window.location='information.php'</script>";
		}

		else
		{
			$insert = "INSERT INTO jointb (JoinDate, Status, Email, PhoneNo, Description, PaymentType,       		MemberID, CampaignID)
					   VALUES ('$jDate', '$jStatus', '$jEmail', '$jPh', '$jDes', '$jPt', '$mID', '$cID')";

			$insertQuery = mysqli_query($dbConnect, $insert);

			if ($insertQuery) 
			{
				echo "<script>window.alert('Successfully applied to the campaign')</script>";
				echo "<script>window.location='information.php'</script>";
			}
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="userStyle.css">
 	<title></title>
 </head>
 <body>
 	<div class="formAddContainer">
 		<h3>Join the Campaign!</h3>
	 	<form action="join.php" method="POST">

	 		<label class="formAddLabel">Participation Date</label>
	 		<input class="formAddInput" type="date" name="txtJDate" value="<?php echo ('Y-m-d'); ?>" required><br><br>

	 		<label class="formAddLabel">Member Email</label>
	 		<input class="formAddInput" type="text" name="txtJEmail" value="<?php echo $_SESSION['MEMAIL'] ?>" required><br><br>

	 		<label class="formAddLabel">Member PhoneNo</label>
	 		<input class="formAddInput" type="text" name="txtJPh" value="<?php echo $_SESSION['MPH']; ?>" required><br><br>

	 		<label class="formAddLabel">Description</label>
	 		<textarea name="txtJDes"></textarea><br><br>

	 		<script type="text/javascript">
		 		function showPaymentTable()
		 			{
		 				document.getElementById('paymentTable').style.visibility='visible';
		 			}

		 		function hidePaymentTable()
		 			{
		 				document.getElementById('paymentTable').style.visibility='hidden';
		 			}
	 		</script>

	 		<h1>PaymentType</h1><br>
	 		<input type="radio" name="rdoPayment" value="MPU" onclick="showPaymentTable()" checked> MPU
	 		<input type="radio" name="rdoPayment" value="VISA" onclick="showPaymentTable()"> VISA
	 		<input type="radio" name="rdoPayment" value="IP" onclick="hidePaymentTable()"> Inperson Payment

	 		<table id="paymentTable">
	 			<tr>
	 				<td>
	 					<input class="formAddInput" type="test" name="txtCardNo" placeholder="Enter Card Number">
	 					<input class="formAddInput" type="text" name="txtCardcvc" placeholder="Enter Card CVC">
	 				</td>
	 			</tr>
			</table><br>

	 		<input class="formAddInput" type="hidden" name="txtmID" value="<?php echo $_SESSION['MID'] ?>">
	 		<input class="formAddInput" type="hidden" name="txtcID" value="<?php echo $cID ?>">

	 		<label class="formAddLabel">Campaign Name</label>
	 		<input class="formAddInput" type="" value="<?php echo $cName ?>" readonly><br><br>

	 		<label class="formAddLabel">Campaign Start Date</label>
	 		<input class="formAddInput" type="" value="<?php echo $cStartDate ?>" readonly><br><br>

	 		<label class="formAddLabel">Campaign End Date</label>
	 		<input class="formAddInput" type="" value="<?php echo $cEndDate ?>" readonly><br><br><br>

	 		<h2>Default information</h2>

	 		<label class="formAddLabel">Member Name</label>
	 		<input class="formAddInput" type="text" value="<?php echo $_SESSION['MNAME'] ?>" readonly><br><br>

	 		<label class="formAddLabel">Member Email</label>
	 		<input class="formAddInput" type="text" value="<?php echo $_SESSION['MEMAIL'] ?>" readonly><br><br>

	 		<label class="formAddLabel">Member PhoneNo</label>
	 		<input class="formAddInput" type="text" name="txtJPh" value="<?php echo $_SESSION['MPH']; ?>" readonly><br><br>

	 		<input class="formAddInput" type="submit" name="btnJoin" value="Join">
	 	</form>
	</div>
	<br><br><br>
 </body>
 </html>
<?php 
	include('dbConnect.php');

	$mID = $_GET['mID'];

	$delete = "DELETE FROM membertb WHERE MemberID = '$mID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Member deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the Member.</p>";
	}
 ?>
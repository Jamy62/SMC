<?php 
	include('dbConnect.php');

	$jID = $_GET['jID'];

	$delete = "DELETE FROM jointb WHERE JoinID = '$jID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Participation request rejected.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with rejecting the request.</p>";
	}
 ?>
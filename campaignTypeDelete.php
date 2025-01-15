<?php 
	include('dbConnect.php');

	$ctID = $_GET['ctID'];

	$delete = "DELETE FROM campaigntypetb WHERE CampaignTypeID = '$ctID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('CampaignType deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the CampaignType</p>";
	}
 ?>
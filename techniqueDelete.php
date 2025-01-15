<?php 
	include('dbConnect.php');

	$tID = $_GET['tID'];

	$delete = "DELETE FROM techniquetb WHERE TechniqueID = '$tID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Technique deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the Technique.</p>";
	}
 ?>
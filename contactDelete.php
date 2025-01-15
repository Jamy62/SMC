<?php 
	include('dbConnect.php');

	$coID = $_GET['coID'];

	$delete = "DELETE FROM contacttb WHERE ContactID = '$coID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Contact deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the contact.</p>";
	}
 ?>
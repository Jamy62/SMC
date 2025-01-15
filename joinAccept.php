<?php 
	include('dbConnect.php');
	
	if (isset($_GET['jID'])) 
	{
		$jID = $_GET['jID'];

		$update = "UPDATE jointb SET Status = 'Accepted'
		WHERE JoinID = '$jID'";

		$result = mysqli_query($dbConnect, $update);

		if ($result) 
		{
			echo "<script>window.alert('Participation request accepted.')</script>";
			echo "<script>window.location='listing.php'</script>";
		}

		else
		{
			echo "<p>Something went wrong with accepting the request.";
		}
	}
 ?>
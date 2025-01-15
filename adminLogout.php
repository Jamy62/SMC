<?php  
	session_destroy();
 
	echo "<script>window.alert('Logged out.')</script>";
	echo "<script>window.location ='adminLogin.php'</script>";
?>
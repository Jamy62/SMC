<?php 
	session_start();
	include('dbConnect.php');

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('You cannot Access admin dashboard. Please login again.')</script>";
		echo "<script>window.location='adminLogin.php'</script>";
	}

	$adminName = $_SESSION['ANAME'];

	$selectCtType = "SELECT * FROM campaignTypetb";
	$queryCtType = mysqli_query($dbConnect, $selectCtType);
	$Ctcount = mysqli_num_rows($queryCtType);

	$selectM = "SELECT * FROM mediatb";
	$queryM = mysqli_query($dbConnect, $selectM);
	$Mcount = mysqli_num_rows($queryM);

	$selectC = "SELECT * FROM campaigntb";
	$queryC = mysqli_query($dbConnect, $selectC);
	$Ccount = mysqli_num_rows($queryC);

	$selectT = "SELECT * FROM techniquetb";
	$queryT = mysqli_query($dbConnect, $selectT);
	$Tcount = mysqli_num_rows($queryT);

	$selectMb = "SELECT * FROM membertb";
	$queryMb = mysqli_query($dbConnect, $selectMb);
	$Mbcount = mysqli_num_rows($queryMb);

	$selectCo = "SELECT * FROM contacttb";
	$queryCo = mysqli_query($dbConnect, $selectCo);
	$Cocount = mysqli_num_rows($queryCo);

	$selectA = "SELECT * FROM admintb";
	$queryA = mysqli_query($dbConnect, $selectA);
	$Acount = mysqli_num_rows($queryA);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="adminStyle.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<title></title>
 </head>
 <body>
 	<nav class="sideBar">
        <h2 id="adminPanel">Admin Panel</h2>
        <ul>
        	<li id="currentPage"><a href="adminDash.php"><i class="fa-solid fa-chart-line" style="color: #ffffff;"></i> Admin Dashboard</a></li>
            <li><a href="campaignType.php"><i class="fa-solid fa-book" style="color: #ffffff;"></i> Campaign Type</a></li>
            <li><a href="media.php"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i> Social Media</a></li>
            <li><a href="campaign.php"><i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i> Campaign</a></li>
            <li><a href="technique.php"><i class="fa-solid fa-wrench" style="color: #ffffff;"></i> Technique</a></li>
            <li><a href="listing.php"><i class="fa-solid fa-list" style="color: #ffffff;"></i> Listing</a></li>
            <li><a href="adminLogin.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="mainContent">
        <header>
        	<a id="logo" href="home.php">
	            <img src="webImg/logo.png">
	        </a>
        </header><br><br>

	    <div>
	    	<div class="headTitle">
		    	<div class="left">
	                <h1>Admin Panel</h1>
	                <ul class="title">
	                    <li>
	                        <a href="#">Dashboard</a>
	                    </li>
	                    <li>
	                        <i class="fa-solid fa-angle-right"></i>
	                    </li>
	                    <li>
	                        <a href="#">Stats</a>
	                    </li>
	                </ul>
	            </div>
	        </div>

			<section class="dashBoxes">
				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-solid fa-book"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Ctcount ?></span>Campaign types
					</div>
				</div>
				
				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-brands fa-instagram"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Mcount ?></span>Social medias
					</div>
				</div>
				
				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-regular fa-calendar-days"></i> 
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Ccount ?></span>Campaigns
					</div>
				</div>

				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-solid fa-wrench"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Tcount ?></span>Techniques
					</div>
				</div>
				
				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-regular fa-user"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Mbcount ?></span>Members
					</div>
				</div>

				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-solid fa-address-book"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Ccount ?></span>Contacts
					</div>
				</div>

				<div class="dashBox">
					<div class="dashBoxIcon">
						<i class="fa-regular fa-user"></i>
					</div>
					
					<div class="dashBoxContent">
						<span class="bigNumber"><?php echo $Acount ?></span>Admins
					</div>
				</div>
			</section>
		</div>
		<br><br><br><br><br><br><br><br>
	</div>
 </body>
 </html>

<?php 
	session_start();
	include 'dbConnect.php';

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('Login Again.')</script>";
		echo "<script>window.location='adminLogin.php'</script>";
	}
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
 <body">
 	<nav class="sideBar">
        <h2 id="adminPanel">Admin Panel</h2>
        <ul>
        	<li><a href="adminDash.php"><i class="fa-solid fa-chart-line" style="color: #ffffff;"></i> Admin Dashboard</a></li>
            <li><a href="campaignType.php"><i class="fa-solid fa-book" style="color: #ffffff;"></i> Campaign Type</a></li>
            <li><a href="media.php"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i> Social Media</a></li>
            <li><a href="campaign.php"><i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i> Campaign</a></li>
            <li><a href="technique.php"><i class="fa-solid fa-wrench" style="color: #ffffff;"></i> Technique</a></li>
            <li id="currentPage"><a href="listing.php"><i class="fa-solid fa-list" style="color: #ffffff;"></i> Listing</a></li>
            <li><a href="adminLogin.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="mainContent">
        <header>
        	<a id="logo" href="home.php">
	            <img src="webImg/logo.png">
	        </a>
        </header><br><br>

    	<div class="headTitle">
		    <div class="left">
	            <h1>Admin Panel</h1>
	            <ul class="title">
	                <li>
	                    <a href="#">Listing</a>
	                </li>
	                <li>
	                    <i class="fa-solid fa-angle-right"></i>
	                </li>
	                <li>
	                    <a href="#">Data</a>
	                </li>
	            </ul>
	        </div>
	    </div>

	    <div class="tabs">
			<button class="tabButton" data-tab-target="tab1">Admin Listings</button>
			<button class="tabButton" data-tab-target="tab2">Member Listings</button>

			<div id="tab1" class="tabContent">
				<h2 class="listingTitle scroll">Admin listing</h2><br>
			    <div>
			 		<h3 class="listingTitle">Campaign Type Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>CampaignTypeID</th>
				 			<th>CampaignTypeName</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$campaignTypeSelect = "SELECT * FROM campaigntypetb";
			 			$result = mysqli_query($dbConnect, $campaignTypeSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$ctID = $array['CampaignTypeID'];
			 				$ctName = $array['CampaignTypeName'];

			 				echo "<tr>";
			 					echo "<td>$ctID</td>";
			 					echo "<td>$ctName</td>";
			 					echo "<td>
			 					<a href='campaignTypeUpdate.php?ctID=$ctID'>Edit</a>|
			 					<a href='campaignTypeDelete.php?ctID=$ctID'>Delete</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>

			 	<div>
			 		<h3 class="listingTitle">Media Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>MediaID</th>
				 			<th>MediaLogo</th>
				 			<th>MediaAppName</th>
				 			<th>MediaLink</th>
				 			<th>MediaRating</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$mediaSelect = "SELECT * FROM mediatb";
			 			$result = mysqli_query($dbConnect, $mediaSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$mID = $array['MediaAppID'];
			 				$mName = $array['MediaAppName'];
			 				$mLogo = $array['MediaLogo'];
			 				$mLink = $array['MediaLink'];
			 				$mRate = $array['MediaRating'];

			 				echo "<tr>";
			 					echo "<td>$mID</td>";
			 					echo "<td><img src='$mLogo' width='20px' height='20px'></td>";
			 					echo "<td>$mName</td>";
			 					echo "<td>$mLink</td>";
			 					echo "<td><i class='fa-solid fa-star' style='color: #f5d42e;'></i>$mRate</td>";
			 					echo "<td>
			 					<a href='mediaUpdate.php?mID=$mID'>Edit</a>|
			 					<a href='mediaDelete.php?mID=$mID'>Delete</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>

			 	<div>
			        <h3 class="listingTitle">Technique Listing</h3>
			        <table class="listingTable">
			            <tr>
			                <th>TechniqueID</th>
			                <th>TechniqueImg</th>
			                <th>TechniqueName</th>
			                <th>Tip1</th>
			                <th>Tip2</th>
			                <th>Tip3</th>
			                <th>Status</th>
			                <th>MediaID</th>
			                <th>Action</th>
			            </tr>
			            <?php 
			                $techniqueSelect = "SELECT * FROM techniquetb";
			                $result = mysqli_query($dbConnect, $techniqueSelect);

			                $count = mysqli_num_rows($result);

			                for ($i=0; $i < $count; $i++) 
			                { 
			                    $array = mysqli_fetch_array($result);
			                    $tID = $array['TechniqueID'];
			                    $tImg = $array['TechniqueImg'];
			                    $tName = $array['TechniqueName'];
			                    $tTip1 = $array['Tip1'];
			                    $tTip2 = $array['Tip2'];
			                    $tTip3 = $array['Tip3'];
			                    $tStatus = $array['Status'];
			                    $mediaID = $array['MediaAppID'];

			                    echo "<tr>";
			                        echo "<td>$tID</td>";
			                        echo "<td><img src='$tImg' width='20px' height='20px'></td>";
			                        echo "<td>$tName</td>";
			                        echo "<td>$tTip1</td>";
			                        echo "<td>$tTip2</td>";
			                        echo "<td>$tTip3</td>";
			                        echo "<td>$tStatus</td>";
			                        echo "<td>$mediaID</td>";
			                        echo "<td>
			                        <a href='techniqueUpdate.php?tID=$tID'>Edit</a>|
			                        <a href='techniqueDelete.php?tID=$tID'>Delete</a>|
			                        </td>";
			                    echo "</tr>";
			                }
			             ?>
			        </table>
			    </div><br>

			 	<div>
			 		<h3 class="listingTitle">Campaign Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>CampaignID</th>
				 			<th>CampaignImage</th>
				 			<th>CampaignName</th>
				 			<th>Aim</th>
				 			<th>Vision</th>
				 			<th>Description</th>
				 			<th>StartDate</th>
				 			<th>EndDate</th>
				 			<th>Fee</th>
				 			<th>Status</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$campaignSelect = "SELECT * FROM campaigntb";
			 			$result = mysqli_query($dbConnect, $campaignSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$cID = $array['CampaignID'];
			 				$cImg = $array['CampaignImage1'];
			 				$cName = $array['CampaignName'];
			 				$cAim = $array['CampaignAim'];
			 				$cVision = $array['CampaignVision'];
			 				$cDes = $array['CampaignDescription'];
			 				$cSDate = $array['CampaignStartDate'];
			 				$cEDate = $array['CampaignEndDate'];
			 				$cFee = $array['CampaignFee'];
			 				$cStatus = $array['Status'];

			 				echo "<tr>";
			 					echo "<td>$cID</td>";
			 					echo "<td><img src='$cImg' width='125px' height='125px'></td>";
			 					echo "<td>$cName</td>";
			 					echo "<td>$cAim</td>";
			 					echo "<td>$cVision</td>";
			 					echo "<td>$cDes</td>";
			 					echo "<td>$cSDate</td>";
			 					echo "<td>$cEDate</td>";
			 					echo "<td>$cFee</td>";
			 					echo "<td>$cStatus</td>";
			 					echo "<td>
			 					<a href='campaignUpdate.php?cID=$cID'>Edit</a>|
			 					<a href='campaignDelete.php?cID=$cID'>Delete</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>
			</div>

			<div id="tab2" class="tabContent">
			    <h2>Member listing</h2>
			    <div class="scrollContainer">
			 		<h3 class="listingTitle scroll">Member info Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>MemberID</th>
				 			<th>MemberFirstName</th>
				 			<th>MemberLastName</th>
				 			<th>MemberUserName</th>
				 			<th>MemberEmail</th>
				 			<th>MemberPhone</th>
				 			<th>MemberPassword</th>
				 			<th>MemberRegisterMonth</th>
				 			<th>MemberProfile</th>
				 			<th>MemberAddress</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$memberSelect = "SELECT * FROM membertb";
			 			$result = mysqli_query($dbConnect, $memberSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$mID = $array['MemberID'];
			 				$mFName = $array['MemberFirstName'];
			 				$mLName = $array['MemberLastName'];
			 				$mUName = $array['MemberUserName'];
			 				$mEmail = $array['MemberEmail'];
			 				$mPh = $array['MemberPh'];
			 				$mPass = $array['MemberPassword'];
			 				$mRegisterMonth = $array['MemberRegisterMonth'];
			 				$mProfile = $array['MemberProfile'];
			 				$mAddress = $array['MemberAddress'];

			 				echo "<tr>";
			 					echo "<td>$mID</td>";
			 					echo "<td>$mFName</td>";
			 					echo "<td>$mLName</td>";
			 					echo "<td>$mUName</td>";
			 					echo "<td>$mEmail</td>";
			 					echo "<td>$mPh</td>";
			 					echo "<td>$mPass</td>";
			 					echo "<td>$mRegisterMonth</td>";
			 					echo "<td><img src='$mProfile' width='70px' height='70px'></td>";
			 					echo "<td>$mAddress</td>";
			 					echo "<td>
			 					<a href='memberDelete.php?mID=$mID'>Delete</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>

			 	<div class="scrollContainer">
			 		<h3 class="listingTitle">Member Contact Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>Contact ID</th>
				 			<th>Contact Message</th>
				 			<th>Subject</th>
				 			<th>Member ID</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$contactSelect = "SELECT * FROM contacttb";
			 			$result = mysqli_query($dbConnect, $contactSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$coID = $array['ContactID'];
			 				$coMessage = $array['ContactMessage'];
			 				$coSubject = $array['Subject'];
			 				$mbID = $array['MemberID'];

			 				echo "<tr>";
			 					echo "<td>$coID</td>";
			 					echo "<td>$coMessage</td>";
			 					echo "<td>$coSubject</td>";
			 					echo "<td>$mbID</td>";
			 					echo "<td>
			 					<a href='contactDelete.php?coID=$coID'>Delete</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>

			 	<div class="scrollContainer">
			 		<h3 class="listingTitle">Joining member Listing</h3>
			 		<table class="listingTable">
			 			<tr>
				 			<th>JoinID</th>
				 			<th>JoinDate</th>
				 			<th>Status</th>
				 			<th>MemberEmail</th>
				 			<th>MemberPhoneNo</th>
				 			<th>Description</th>
				 			<th>PaymentType</th>
				 			<th>MemberID</th>
				 			<th>CampaignID</th>
				 			<th>Action</th>
			 			</tr>
			 		<?php 
			 			$joinSelect = "SELECT * FROM jointb";
			 			$result = mysqli_query($dbConnect, $joinSelect);

			 			$count = mysqli_num_rows($result);

			 			for ($i=0; $i < $count; $i++) 
			 			{ 
			 				$array = mysqli_fetch_array($result);
			 				$jID = $array['JoinID'];
			 				$jDate = $array['JoinDate'];
			 				$jStatus = $array['Status'];
			 				$jEmail = $array['Email'];
			 				$jPh = $array['PhoneNo'];
			 				$jDes = $array['Description'];
			 				$jPt = $array['PaymentType'];
			 				$jMID = $array['MemberID'];
			 				$jCID = $array['CampaignID'];

			 				echo "<tr>";
			 					echo "<td>$jID</td>";
			 					echo "<td>$jDate</td>";
			 					echo "<td>$jStatus</td>";
			 					echo "<td>$jEmail</td>";
			 					echo "<td>$jPh</td>";
			 					echo "<td>$jDes</td>";
			 					echo "<td>$jPt</td>";
			 					echo "<td>$jMID</td>";
			 					echo "<td>$jCID</td>";
			 					echo "<td>
			 					<a href='joinAccept.php?jID=$jID'>Accept</a>|
			 					<a href='joinDelete.php?jID=$jID'>Reject</a>|
								</td>";
			 				echo "</tr>";
			 			}
			 		 ?>
			 		 </table>
			 	</div><br>
			</div>
		</div>

		<script>
		    document.addEventListener('DOMContentLoaded', function() {
		      	const tabButtons = document.querySelectorAll('.tabButton');
		     	const tabContents = document.querySelectorAll('.tabContent');

		     	tabButtons.forEach((button) => {
			      	button.addEventListener('click', () => {
			        const target = button.dataset.tabTarget;
			        tabButtons.forEach((btn) => btn.classList.remove('active'));
			        button.classList.add('active');
			        tabContents.forEach((content) => content.classList.remove('active'));
			        document.getElementById(target).classList.add('active');
		        	});
		      	});

		      	tabButtons[0].click();
		    });
		</script>
    </div>
 </body>
 </html>
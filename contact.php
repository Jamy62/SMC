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
		echo "<script>window.alert('Login Again.')</script>";
		echo "<script>window.location='memberLogin.php'</script>";
	}

	if (isset($_POST['btnSubmit'])) 
	{
		$txtSubject = $_POST['txtSubject'];
		$txtMessage = $_POST['txtMessage'];
		$txtMID = $_POST['txtMID'];

		$insert = "INSERT INTO contacttb (ContactMessage, Subject, MemberID)
				   VALUES ('$txtMessage', '$txtSubject', '$txtMID')";
		$query = mysqli_query($dbConnect, $insert);

		if ($query) 
		{
			echo "<script>window.alert('Message sent successfully.')</script>";
			echo "<script>window.location='contact.php'</script>";
		}

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="userStyle.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<title></title>
 </head>
 <body id="contactBack">
 	<header>
	 	<nav>
	 		<a id="logo" href="home.php">
	            <img src="webImg/logo.png">
	        </a>

	        <div id="navButtons">
	        	<ul>
		            <li><a href="home.php" class="navButton hoverUnderlineAnimation"><b>HOME</b></a></li>
		            <li><a href="about.php" class="navButton hoverUnderlineAnimation">ABOUT</a></li>
		            <li class="dropdown"><a href="information.php" class="navButton hoverUnderlineAnimation nav-link">INFORMATION <i class="fa-solid fa-caret-down"></i></a>
		            	<div class="dropdownbox">
							<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
							<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
							<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
							<a href="legislation.php" class="hoverUnderlineAnimation">Legislation</a>
						</div>
		            </li>
		            <li><a href="contact.php" class="navButton hoverUnderlineAnimation navHere"><b>CONTACT</b></a></li>
		            <li><a href="#" class="navButton">&nbsp</a></li>
	            </ul>

	            <?php
		            if ($mID == '0') 
		            {
		            	echo '<div id="logInOutButton">';
		                echo '<a href="memberLogin.php" class="navButton hoverUnderlineAnimation floatRight"><i class="fa-solid fa-arrow-right-to-bracket" style="color: #000000;"></i> Login</a>';
		                echo '</div>';
		            } 
		            else 
		            {
		            	echo '<div id="logInOutButton">';
		                echo '<a href="memberLogout.php" class="navButton hoverUnderlineAnimation floatRight"><i class="fa-solid fa-arrow-right-from-bracket" style="color: black;"></i> Logout</a>';
		                echo '</div>';
		            }
		        ?>

	            <div id="menuIcon">
		        	<a href="#" id="open"><img src="webImg/menu.png"></a>
		        	<a href="#sideNav" id="close"><img src="webImg/menu.png"></a>
		        </div>

			    <div id="searchContainer">
			        <form action="home.php" method="POST">
		            	<input id="searchGrow" type="text" name="txtSearch" placeholder="">
		            	<input type="submit" name="btnSearch" id="btnSave" hidden>
		            	<a href="#" id="search" class="search"><i class="fa-solid fa-magnifying-glass"></i></a>
		     			<?php 
		     				echo "<a href='app.php?hSch=$hSch' id='toSearch'></a>"
		     			?>
		     		</form>
		     	</div>
	        </div>
	 	</nav>

	 	<nav class="sideDropDown" id="sideNav"><br>
			<div class="relative"><a href="home.php" class="sideLink hoverUnderlineAnimation">HOME</a></div><br>
			<div class="relative"><a href="about.php" class="sideLink hoverUnderlineAnimation">ABOUT</a></div><br>
			<div class="relative"><a href="contact.php" class="sideLink hoverUnderlineAnimation navHere2"><b>CONTACT</b></a></div><br>
			<div class="relative dropdown"><a href="information.php" class="sideLink hoverUnderlineAnimation">INFORMATION <i class="fa-solid fa-caret-down"></i></a>
				<div class="dropdownbox">
					<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
					<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
					<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
					<a href="legislation.php" class="hoverUnderlineAnimation">Legislation</a>
				</div>
			</div><br>
			<?php
		        if ($mID == '0') 
		        {
		          	echo '<div id="sideLogInOutButton" class="relative">';
		            echo '<a href="memberLogin.php" class="sideLink hoverUnderlineAnimation"><i class="fa-solid fa-arrow-right-to-bracket" style="color: white;"></i> Login</a>';
		            echo '</div>';
		        } 
		        else 
		        {
		          	echo '<div id="sideLogInOutButton" class="relative">';
		            echo '<a href="memberLogout.php" class="sideLink hoverUnderlineAnimation""><i class="fa-solid fa-arrow-right-from-bracket" style="color: white;"></i> Logout</a>';
		            echo '</div>';
		        }
		    ?>
		</nav>

		<script type="text/javascript">
			document.getElementById('open').addEventListener('click', function() {
				document.getElementById('sideNav').style.display = 'block'; 
				document.getElementById('close').style.display = 'block';
				this.style.display = 'none';
			});

			document.getElementById('close').addEventListener('click', function() {
				setTimeout(function() {
	            document.getElementById('sideNav').style.display = 'none';
	        	}, 300);
				document.getElementById('open').style.display = 'block';
				this.style.display = 'none';
			});

			document.getElementById('searchGrow').addEventListener('focus', function () {
			    var navButtons = document.querySelectorAll('#navButtons li');
			    for (var i = 0; i < (navButtons.length - 1); i++) {
			        navButtons[i].style.display = 'none';
			    }
			});

			document.getElementById('searchGrow').addEventListener('blur', function () {
			    var navButtons = document.querySelectorAll('#navButtons li');

			    if (window.innerWidth > 940) {
			        for (var i = 0; i < navButtons.length; i++) {
			            navButtons[i].style.display = 'block';
			        }
			    }
			});

			document.getElementById('search').addEventListener('click', function(event) {
			    event.preventDefault();
			    document.getElementById('btnSave').click();
			    setTimeout(function() {
			        document.getElementById('toSearch').click();
			    }, 300);
			});

			const contentContainers = document.querySelectorAll('.contentContainer');
		</script>
 	</header>

	<div>
		<img src="webImg/contact1.jpg" id="contactImg1">
	</div>

	<div>
		<img src="webImg/contact2.jpg" id="contactImg2">
	</div><br><br><br><br><br><br><br>

 	<div class="formAddContainer contactForm">
 		<h2>Contact Form</h2>
	 	<form action="contact.php" method="POST">
	 		<label class="formAddLabel">Contact Subject</label>
	 		<input class="formAddInput" type="text" name="txtSubject" placeholder="Enter contact subject" required><br><br>

	 		<label class="formAddLabel">Contact Message</label>
	 		<textarea class="formAddInput" name="txtMessage"  rows="10" cols="auto" required></textarea><br><br>

	 		<input type="hidden" name="txtMID" value="<?php echo $_SESSION['MID'] ?>">

	 		<input type="checkbox" name="" required> <a href="policies.php">Agree Terms and Conditions</a><br>
	 		<input class="formAddSubmit" type="submit" name="btnSubmit" value="Contact"><br>
	 	</form>
 	</div>
 	<br><br><br><br><br>

 	<br><br><br><br><br>

 	<div id="google_translate_element"></div>
 
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElement"></script>
 
	<script>
		function googleTranslateElement()
			{
				new google.translate.TranslateElement({pageLanguage:'en'},'google_translate_element')
			}
	</script>

	<footer>
	  	<div class="footerContainer">
	  	 	<div class="row">
	  	 		<div class="footerColumn">
	  	 			<h4>Organization</h4>
	  	 			<ul>
	  	 				<li><a href="#">about us</a></li>
	  	 				<li><a href="#">our services</a></li>
	  	 				<li><a href="termsAndConditions.php">privacy policy</a></li>
	  	 				<li><a href="#">partners</a></li>
	  	 			</ul>
	  	 		</div>
	  	 		<div class="footerColumn">
	  	 			<h4>get help</h4>
	  	 			<ul>
	  	 				<li><a href="#">FAQ</a></li>
	  	 				<li><a href="#">reviews</a></li>
	  	 				<li><a href="#">payment options</a></li>
	  	 			</ul>
	  	 		</div>
	  	 		<div class="footerColumn">
	  	 			<h4>follow us</h4>
	  	 			<div class="mediaLinks">
	  	 				<a href="#"><i class="fa-brands fa-facebook"></i></a>
	  	 				<a href="#"><i class="fa-brands fa-twitter"></i></a>
	  	 				<a href="#"><i class="fa-brands fa-instagram"></i></a>
	  	 				<a href="#"><i class="fa-brands fa-discord"></i></a>
	  	 			</div>
	  	 		</div>
	  	 	</div>
	  	 </div>

	  	 <p class="copyRight">© 2024 SMC Ltd. | All Rights Reserved</p>
	  </footer>
 </body>
 </html>
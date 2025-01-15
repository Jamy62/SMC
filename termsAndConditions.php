<?php 
	session_start();

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
 <body>
 	<header>
	 	<nav>
	 		<a id="logo" href="home.php">
	            <img src="webImg/logo.png">
	        </a>

	        <div id="navButtons">
	        	<ul>
		            <li><a href="home.php" class="navButton hoverUnderlineAnimation"><b>HOME</b></a></li>
		            <li><a href="about.php" class="navButton hoverUnderlineAnimation">ABOUT</a></li>
		            <li class="dropdown"><a href="information.php" class="navButton hoverUnderlineAnimation nav-link navHere"><b>INFORMATION</b> <i class="fa-solid fa-caret-down"></i></a>
		            	<div class="dropdownbox">
							<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
							<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
							<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
							<a href="legislation.php" class="hoverUnderlineAnimation navHere3"><b>Legislation</b></a>
						</div>
		            </li>
		            <li><a href="contact.php" class="navButton hoverUnderlineAnimation">CONTACT</a></li>
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
		                echo '<a href="memberLogin.php" class="navButton hoverUnderlineAnimation floatRight"><i class="fa-solid fa-arrow-right-from-bracket" style="color: black;"></i> Logout</a>';
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
			<div class="relative"><a href="contact.php" class="sideLink hoverUnderlineAnimation">CONTACT</a></div><br>
			<div class="relative dropdown"><a href="information.php" class="sideLink hoverUnderlineAnimation navHere2"><b>INFORMATION</b> <i class="fa-solid fa-caret-down"></i></a>
				<div class="dropdownbox">
					<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
					<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
					<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
					<a href="legislation.php" class="hoverUnderlineAnimation navHere4"><b>Legislation</b></a>
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
		            echo '<a href="memberLogin.php" class="sideLink hoverUnderlineAnimation""><i class="fa-solid fa-arrow-right-from-bracket" style="color: white;"></i> Logout</a>';
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
	 	<div class="lText smcTextAnimation">Terms and<br>Conditions</div>

		<img src="webImg/law.png" id="headerImg">
	</div><br><br>

	<div class="termContainer">
 		<div class="termP">
 			<h1>Terms and Conditions</h1><br>
 			You and SMC enter into an agreement when you use our website and services, therefore it's important to know the rules that apply to this relationship. Key elements of our Terms and Conditions, such as online login instructions and our dedication to protecting your privacy, are outlined here.
 		</div><br><br><br><br><br><br>

 		<div class="termP">
 			<h2>Website Log-in Procedures: Accessing Your SMC Account</h2><br>
 			By using the SMC website, you consent to the following terms being followed:<br><br>

			<b>Account Responsibility:</b> You have the obligation to protect the privacy of all account information, including your password and username. You are in charge of everything that happens on your account.<br>

			<b>Accurate Information:</b> By registering, you pledge to supply true, comprehensive, and up-to-date information, as well as to keep it updated.<br>

			<b>Unauthorized Access:</b> It is your duty to alert us right away if you believe there has been an unauthorized use of your account or a security breach.<br>

			<b>Age Verification:</b> By opening an account, you attest that, in accordance with all relevant laws and regulations, you are of legal age to use our services.<br>
 		</div><br><br><br><br><br>

 		<div class="termP">
 			<h2>Privacy Policy: Information Protection</h2><br>
 			Our Privacy Policy contains information about our dedication to safeguarding your privacy. The following are important points:<br><br>

			<b>Data Collection:</b> In accordance with our Privacy Policy, we gather and handle personal data. This includes data gathered through cookies, use statistics, and information you provide during registration.<br>

			<b>Data Usage:</b> We use your information to improve our services, tailor content for you, and improve your experience. Your personal information is never sold to outside parties by us.<br>

			<b>Data Security:</b> We use security protocols to guard against unwanted access, disclosure, change, and destruction of your data.<br>

			<b>Cookie Usage:</b> You agree to the usage of cookies as outlined in our Cookie Policy by using our website. Cookies improve your online experience and aid in our traffic analysis.<br>
 		</div><br><br><br><br><br>

 		<div class="termP">
 			<h2>User Behavior: Preserving Digital Integrity</h2><br>
 			By using SMC services, you consent to the following terms:<br><br>

			<b>Use of Our Services Responsibly:</b> You shall utilize our services in a way that upholds the privacy and rights of others.<br>

			<b>Compliance:</b> When using SMC services, you agree to abide by all relevant laws and regulations.<br>

			<b>Content rules:</b> To ensure that your interactions with others benefit the online community, you shall abide by the content rules specified in our terms and on the site.<br>
 		</div><br><br><br><br><br>

 		<div class="termP">
 			<h2>Modifications and Updates: Adjusting to the Digital Environment</h2><br>
 			These Terms and Conditions may be updated and modified by SMC at any time. Important updates will be communicated to users, and their continuing use of our services indicates their agreement to the revised terms.<br><br>

			You accept that you have read, comprehended, and are in agreement with these Terms & Conditions as well as our Privacy Policy by using SMC services. It is recommended that you periodically go over these materials in order to be aware of your rights and obligations when using our site. Please do not hesitate to contact our support team with any queries or worries. We appreciate your participation in the SMC community.
 		</div><br><br><br><br><br>
 	</div><br><br><br>

	<br><br>
	<footer>
	  	<div class="footerContainer">
	  	 	<div class="row">
	  	 		<div class="footerColumn">
	  	 			<h4>Organization</h4>
	  	 			<ul>
	  	 				<li><a href="#">about us</a></li>
	  	 				<li><a href="#">our services</a></li>
	  	 				<li><a href="#">privacy policy</a></li>
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
	</footer>
 </body>
 </html>
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
	 	<div class="lText smcTextAnimation">Legislation<br>Guidance</div>

		<img src="webImg/law.png" id="headerImg">
	</div><br><br><br><br>

	<div class="lawContainer">
 		<div class="lawP">
 			<h1>Legislation and Guidance</h1><br>
 			unravel the complex web of pertinent laws and best practice guidelines, giving you the information you need to safely navigate the digital realm. Let's explore the moral and legal structures that influence our interactions on the internet.
 		</div><br><br><br><br><br><br><br>

 		<div class="lawP">
 			<h2>Data Protection Laws</h2><br>
 			Data protection rules act as sentinels protecting your personal information in a time of digital interconnection. Principles for the equitable and transparent handling of personal data are outlined in laws like the General Data Protection Regulation (GDPR). Your privacy is our first priority at SMC, and we align our procedures with these international standards to guarantee the security of your digital identity.
 			<i class="fa-solid fa-link" style="color: #0251d9;"></i> <a href="https://www.gov.uk/data-protection">Check Out UK Data Protection Laws</a>
 		</div><br><br><br><br>

 		<div class="lawP">
 			<h2>Combat Cyberbullying</h2><br>
 			There is an increasing need for regulation pertaining to cyberbullying as the internet realm grows. Around the world, laws are enacted to prevent and punish online harassment, promoting a respectful digital environment. SMC is adamantly opposed to cyberbullying and supports everyone taking responsibility for fostering a welcoming and encouraging online environment.
 			<i class="fa-solid fa-link" style="color: #0251d9;"></i> <a href="https://lawstuff.org.uk/online-safety/cyber-bullying">Check Out UK Cyberbullying Laws</a>
 		</div><br><br><br><br>

 		<div class="lawP">
 			<h2>Age Restrictions and COPPA Compliance</h2><br>
 			Legislation like the Children's Online Privacy Protection Act (COPPA) sets age limitations and rules to safeguard kids online because it recognizes the vulnerability of our young ones online. SMC is dedicated to COPPA compliance, providing our younger users with a safe sanctuary online. We urge parents to actively participate in their child's internet experience by offering direction and assistance.
 			<i class="fa-solid fa-link" style="color: #0251d9;"></i> <a href="https://nuedusec.com/coppa-compliance.php">Check Out COPPA Compliance</a>
 		</div><br><br><br><br>

 		<div class="lawP">
 			<h2>Platform-Specific Policies</h2><br>
 			Social media companies have their own guidelines and standards that specify what constitutes appropriate behavior. It is important that you become acquainted with platform-specific policies in order to have a great online experience. At SMC, we support responsible digital citizenship and advise users to read and abide with the platform's terms of service.
 		</div><br><br><br><br>

 		<div class="lawP">
 			<h2>Defamation and Online Harassment Laws</h2><br>
 			Laws that prohibit online harassment and defamation act as a barrier against bad actions that endanger people's reputations and general well-being. Maintaining internet ethics is essential to fostering a polite and respectful culture. SMC opposes cyberbullying and is in favor of taking legal action to protect a welcoming and constructive online environment.
 			<i class="fa-solid fa-link" style="color: #0251d9;"></i> <a href="https://harassmentlawyer.co.uk/tag/internet-harassment-uk#">Check Out UK Online Harassment Laws</a>
 		</div><br><br><br><br>
 	</div><br><br><br><br><br>

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
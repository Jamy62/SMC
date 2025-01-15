<?php
	include('dbConnect.php');
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
		            <li><a href="home.php" class="navButton hoverUnderlineAnimation navHere"><b>HOME</b></a></li>
		            <li><a href="about.php" class="navButton hoverUnderlineAnimation">ABOUT</a></li>
		            <li class="dropdown"><a href="information.php" class="navButton hoverUnderlineAnimation nav-link">INFORMATION <i class="fa-solid fa-caret-down"></i></a>
		            	<div class="dropdownbox">
							<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
							<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
							<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
							<a href="legislation.php" class="hoverUnderlineAnimation">Legislation</a>
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
			<div class="relative"><a href="home.php" class="sideLink hoverUnderlineAnimation navHer2"><b>HOME</b></a></div><br>
			<div class="relative"><a href="about.php" class="sideLink hoverUnderlineAnimation">ABOUT</a></div><br>
			<div class="relative"><a href="contact.php" class="sideLink hoverUnderlineAnimation">CONTACT</a></div><br>
			<div class="relative dropdown"><a href="information.php" class="sideLink hoverUnderlineAnimation">INFORMATION <i class="fa-solid fa-caret-down"></i></a>
				<div class="dropdownbox">
					<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
					<a href="parents.php" class="hoverUnderlineAnimation">Parents</a>
					<a href="liveStreaming.php" class="hoverUnderlineAnimation">LiveStreaming</a>
					<a href="legislation.php" class="hoverUnderlineAnimation">Legislation and Guidance</a>
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
	 	<div class="smcText smcTextAnimation">SOCIAL MEDIA<br>CAMPAIGNS</div>

		<img src="webImg/heroImg.png" id="headerImg">
	</div><br><br><br><br>

	<section>
		<div class="ourPurpose">
			<h1>Our Purpose</h1><br>
			<p>Welcome to Your Secure Online Space, SMC. Safely guiding young people through the social media maze is our aim. At Social Media Campaigns Ltd., safety comes first. We provide an intuitive design, insights from popular apps, and interactive suggestions. Join our community, subscribe to our updates, and stay up to speed on the most recent changes. Our mobile-friendly website demonstrates our dedication to accessibility and enables you to easily browse our content from any device. Come along on this journey with us as we work together to create a safer digital future and provide young people the skills and resources they need to succeed online. We are committed to ensuring your security, and by working together, we can positively influence how young people use social media. Welcome to Your Secure Online Space! Together, let's create a digital world that is safer and better educated!</p>
		</div><br>

		<div  id="ourPurposeGif">
			<img src="webImg/ourPurposeGif1.gif" width="500px">
		</div>
	</section><br><br>

	<section>
		<div class="contentContainer">
			<div class="imageSelection skewLeft">
		    	<img src="webImg/home1.jpg" alt="Image description">
		 	</div>
		  	<div class="textSelection">
		    	<h1><span class="darkGray">Discover</span> Popular Campaigns</h1>
		    	<p>Here at SMC, we understand the importance of staying safe on social media. Explore our campaign to empower teenagers with the knowledge they need to navigate the online world securely.</p>
		  	</div>
		</div>
		<div class="contentContainer switch">
			<div class="imageSelection skewRight">
		    	<img src="webImg/home2.jpg" alt="Image description">
		  	</div>
		  	<div class="textSelection">
		    	<h1><span class="darkGray">How to</span> Stay Safe Online</h1>
		    	<p>Examine the dangers that major social media applications pose to teenagers. These platforms provide difficulties, ranging from addictive behaviors to cyberbullying. Delve into the effects on psychological well-being, privacy issues, and the fine line that parents must traverse. Understanding the advantages of connection as well as any possible risks for teens is necessary to navigate this digital environment.</p>
		  	</div>
		</div>
		<div class="contentContainer">
			<div class="imageSelection skewLeft">
		    	<img src="webImg/home3.jpg" alt="Image description">
		  	</div>
		  	<div class="textSelection">
		    	<h1><span class="darkGray">Stay Informed with</span><br> Latest Trends</h1>
				<p>It’s essential to stay updated with the constantly changing social media scene. Updates on the newest apps, trends, and possible dangers are often provided by SMC. In order to keep you educated and prepared to mentor youth through the ever-changing realm of social media, our committed staff keeps an eye on the digital landscape.</p>
		  	</div>
		</div>
	</section>

	<section>
		<?php
 			$query2 = "SELECT * FROM campaigntb WHERE Status = 'Active' LIMIT 2";

 			$result2 = mysqli_query($dbConnect, $query2);
 			$count2 = mysqli_num_rows($result2);

 			echo "<div  class='campaignPreview'>";

 			for ($j=0; $j < $count2; $j++) 
 			{ 
 				$data = mysqli_fetch_array($result2);

 				$cID = $data['CampaignID'];
 				$cName = $data['CampaignName'];
 				$cImg = $data['CampaignImage1'];
 				$cFee = $data['CampaignFee'];
 				$cStartDate = $data['CampaignStartDate'];
 				 ?>

 				<p>
 					<img src="<?php echo $cImg; ?>" width="400px" height="200px"><br><br>
 					<b>Campaign Name: </b><?php echo $cName ?>
 					<a class="seeMoreBtn" href="informationDetail.php?cID=<?php echo $cID ?>">See More</a><br>
 					<b>Start Date: </b><?php echo $cStartDate ?><br>
 					<b>Fee: </b><?php echo $cFee ?>$<br>
 				</p>
 				<?php
 			}
 			echo "</div>";
 		 ?>
	</section><br><br><br>

	<div class="checkMoreCamp">     
		<a href="Information.php">Checkout More Campaigns ></a>
	</div>

	<div  id="edGif">
		<img src="webImg/3dGif.gif" width="500px">
	</div>

	<section class="popSocials">
		<ul>
			<li class="stats">
				<div class="statsText">User Count<br><br>3.049 billion</div>
			    <a href="#" class="facebookLogo">
			    <span></span>
			    <span></span>
			    <span></span>
			    <span></span>
			    <i class="fa-brands fa-facebook"></i>
			    </a>
			</li>
			<li class="stats">
				<div class="statsText">User Count<br><br>528.3 million</div>
			    <a href="#" class="twitterLogo">
			    <span></span>
			    <span></span>
			    <span></span>
			    <span></span>
			    <i class="fa-brands fa-twitter"></i>
			    </a>
			</li>
			<li class="stats">
				<div class="statsText">User Count<br><br>1.4 billion</div>
			    <a href="#" class="instagramLogo">
			    <span></span>
			    <span></span>
			    <span></span>
			    <span></span>
			    <i class="fa-brands fa-instagram"></i>
			    </a>
			</li>
			<li class="stats">
				<div class="statsText">User Count<br><br>812 million</div>
			    <a href="#" class="redditLogo">
			    <span></span>
			    <span></span>
			    <span></span>
			    <span></span>
			    <i class="fa-brands fa-reddit"></i>
			    </a>
			</li>
		</ul>
		<div>
			<h2>Most Popular Social Medias</h2>
		</div>
	</section>

	<br><br><br><br><br><br><br><br></br>

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
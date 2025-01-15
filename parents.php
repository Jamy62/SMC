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
							<a href="parents.php" class="hoverUnderlineAnimation navHere3"><b>Parents</b></a>
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
			<div class="relative"><a href="home.php" class="sideLink hoverUnderlineAnimation">HOME</a></div><br>
			<div class="relative"><a href="about.php" class="sideLink hoverUnderlineAnimation">ABOUT</a></div><br>
			<div class="relative"><a href="contact.php" class="sideLink hoverUnderlineAnimation">CONTACT</a></div><br>
			<div class="relative dropdown"><a href="information.php" class="sideLink hoverUnderlineAnimation navHere2"><b>INFORMATION</b> <i class="fa-solid fa-caret-down"></i></a>
				<div class="dropdownbox">
					<a href="app.php" class="hoverUnderlineAnimation">Social Medias</a>
					<a href="parents.php" class="hoverUnderlineAnimation navHere4"><b>Parents</b></a>
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
	 	<div class="smcText smcTextAnimation">SOCIAL MEDIA<br>CAMPAIGNS</div>

		<img src="webImg/heroImg.png" id="headerImg">
	</div><br><br><br><br>

	<div class="parentContainer">
 		<div class="parentP">
 			<h1>How to ensure The Safety of Your Child Online</h1><br>
 			As parMedia Campaigns Ltd. (SMC) is a website whose mission is to provide youth with the information and resources they need to securely surf the internet. As parents, our first concern is making sure our kids are secure online. The following crucial advice will assist you in guiding your teenagers through the internet world:
 		</div><br><br><br><br>

 		<img src="webImg/parent.jpg">
 		<br><br><br><br>

 		<div class="parentP">
 			<h2>1. Open Communication</h2><br>
 			To begin, make sure you and your teenagers have open lines of communication. Invite them to talk about their friends, experiences, and any worries they may have about the internet.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>2. Set Boundaries</h2><br>
 			Clearly define the guidelines and limitations for using social media. Talk about reasonable time constraints, the kinds of material kids may interact with, and the value of privacy.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>3. Educate on Privacy Settings</h2><br>
 			Inform your teenagers on the social networking sites' privacy settings. Make sure they know how to manage their online profile, who can send them friend requests, and who may view their postings.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>4. Monitor Online Activity</h2><br>
 			Keep a regular eye on what your adolescent is doing online. Observe the social media sites they frequent, the friends they have, and the stuff they share. Keeping an eye on their web presence enables you to remain informed and take early action to resolve any possible problems.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>5. Cyberbullying Awareness</h2><br>
 			Talk about the value of online courtesy and respect. Ensure that your teenagers are aware of the effects of cyberbullying and how to respond to it. Urge them to come out with any bullying incidents.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>6. Be Tech-Savvy</h2><br>
 			Keep up with the newest applications, social media trends, and internet hazards. With this information, you'll be able to mentor your teenagers and deal with new issues as they arise.
 		</div><br><br><br>

 		<div class="parentP">
 			<h2>7. Make Use of Parental Controls</h2><br>
 			Look into and make use of the parental control tools that are accessible on gadgets and social media sites. You may prohibit and regulate access to unsuitable content with the aid of these tools.
 		</div><br><br><br><br><br><br>

 		<h1>Feedbacks</h1>
 	</div><br>

	<div class="replyBtn">
		<a href="#">Leave a Review</a>
	</div><br><br><br><br><br>

	<div class="reviewContainer">
 		<div class="reviewBoxes">
 			<div class="reviewBox">
	 			<span class="ratingShow">
					<input type="radio" name="ratings" value="5" id="star5" disabled checked>
					<label for="star5"></label>

					<input type="radio" name="ratings" value="4" id="star4" disabled>
					<label for="star4"></label>

					<input type="radio" name="ratings" value="3" id="star3" disabled>
					<label for="star3"></label>

					<input type="radio" name="ratings" value="2" id="star2" disabled>
					<label for="star2"></label>

					<input type="radio" name="ratings'" value="1" id="star1" disabled>
					<label for="star1"></label>
				</span>
				<span class="reviewDate">
					- 27/1/2023
				</span><br><br>

	 			<b>Stewart Pitts</b><br>
				<p>I am very appreciative of Social Media Campaigns Ltd. that I cannot say enough. Our family now relies heavily on this site as a resource. In addition to being thorough, the material is presented in a style that appeals to youngsters. It is quite admirable how committed the crew is to maintaining a secure online environment. Parents looking for advice on overcoming the difficulties of social media use turn to it because of its interactive features, perceptive material, and user-friendly layout. I am grateful that SMC has provided parents and kids with the necessary knowledge!</p><br>
				<span class="reply">
					<i class="fa-solid fa-thumbs-up" style="color: #878787;"></i>
					<i class="fa-solid fa-thumbs-down" style="color: #878787;"></i>
					<i class="fa-solid fa-reply" style="color: #878787;"></i>
				</span>
	 		</div>

	 		<div class="reviewBox">
	 			<span class="ratingShow">
					<input type="radio" name="ratings2" value="5" id="star5" disabled>
					<label for="star5"></label>

					<input type="radio" name="ratings2" value="4" id="star4" disabled checked>
					<label for="star4"></label>

					<input type="radio" name="ratings2" value="3" id="star3" disabled>
					<label for="star3"></label>

					<input type="radio" name="ratings2" value="2" id="star2" disabled>
					<label for="star2"></label>

					<input type="radio" name="ratings2" value="1" id="star1" disabled>
					<label for="star1"></label>
				</span>
				<span class="reviewDate">
					- 5/6/2023
				</span><br><br>

	 			<b>Serena Carson</b><br>
				<p>Parents who are worried about their teen's safety online may definitely benefit from Social Media Campaigns Ltd. Excellent information is offered, and the platform's user-friendly layout is praiseworthy. But I think the experience might be improved overall if more tailored information was included based on user profiles. The platform may be even more useful in meeting the individual needs of every family if recommendations were customized to fit particular age groups or hobbies.</p><br><br>
				<span class="reply">
					<i class="fa-solid fa-thumbs-up" style="color: #878787;"></i>
					<i class="fa-solid fa-thumbs-down" style="color: #878787;"></i>
					<i class="fa-solid fa-reply" style="color: #878787;"></i>
				</span>
	 		</div>
 		</div>
 	</div><br><br><br>

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
	  	 				<li><a href="#">Legislation and Guidance</a></li>
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
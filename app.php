<?php 
	include ('dbConnect.php');
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

	$homeSearch = '0';

	if (isset($_SESSION['SCH']))
	{
		$homeSearch = $_SESSION['SCH'];
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
		            <li><a href="home.php" class="navButton hoverUnderlineAnimation">HOME</a></li>
		            <li><a href="about.php" class="navButton hoverUnderlineAnimation">ABOUT</a></li>
		            <li class="dropdown"><a href="information.php" class="navButton hoverUnderlineAnimation nav-link navHere"><b>INFORMATION</b> <i class="fa-solid fa-caret-down"></i></a>
		            	<div class="dropdownbox">
							<a href="app.php" class="hoverUnderlineAnimation navHere3"><b>Social Medias</b></a>
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
			<div class="relative"><a href="home.php" class="sideLink hoverUnderlineAnimation">HOME</a></div><br>
			<div class="relative"><a href="about.php" class="sideLink hoverUnderlineAnimation">ABOUT</a></div><br>
			<div class="relative"><a href="contact.php" class="sideLink hoverUnderlineAnimation">CONTACT</a></div><br>
			<div class="relative dropdown"><a href="information.php" class="sideLink hoverUnderlineAnimation navHere2"><b>INFORMATION</b> <i class="fa-solid fa-caret-down"></i></a>
				<div class="dropdownbox">
					<a href="app.php" class="hoverUnderlineAnimation navHere4"><b>Social Medias</b></a>
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

			document.getElementById('search').addEventListener('click', function(event) {
				document.getElementById('SearchBtn').click();
			});
		</script>
 	</header>

	<div>
	 	<div class="smText smcTextAnimation">SOCIAL MEDIAS<br>APPS</div>

		<img src="webImg/socialMediaHead.png" id="headerImg">
	</div><br><br><br><br><br><br>

	<section class="mostPopSocial">
		<h1>Most Popular Social Medias</h1><br><br>
			<?php
	 			$query = "SELECT * FROM mediatb";

	 			$result = mysqli_query($dbConnect, $query);
	 			$count = mysqli_num_rows($result);

	 			if ($count > 0) 
	 			{
	 				echo "<div>";

	 				$query2 = "SELECT * FROM mediatb";

	 				$result2 = mysqli_query($dbConnect, $query2);
	 				$count2 = mysqli_num_rows($result2);

	 				echo "<div  class='medias'>";

	 				for ($j=0; $j < $count2; $j++) 
	 				{ 
	 					$data = mysqli_fetch_array($result2);

	 					$mID = $data['MediaAppID'];
	 					$mName = $data['MediaAppName'];
	 					$mLogo = $data['MediaLogo'];
	 					$mLink = $data['MediaLink'];
	 					$mRating = $data['MediaRating'];
	 					 ?>

	 					<p>
	 						<img src="<?php echo $mLogo; ?>" width="100px" height="100px"><br><br>
	 						<b><?php echo $mName ?></b><br><br><br>

	 						<?php 
	 							if ($mRating == 1) 
	 							{
	 								echo '
	 								<span class="ratingShow">
							 			<input type="radio" name="ratings'. $j .'" value="5" id="star5" disabled>
							 			<label for="star5"></label>

							 			<input type="radio" name="ratings'. $j .'" value="4" id="star4" disabled>
							 			<label for="star4"></label>

							 			<input type="radio" name="ratings'. $j .'" value="3" id="star3" disabled>
							 			<label for="star3"></label>

							 			<input type="radio" name="ratings'. $j .'" value="2" id="star2" disabled>
							 			<label for="star2"></label>

							 			<input type="radio" name="ratings'. $j .'" value="1" id="star1" disabled checked>
							 			<label for="star1"></label>
							 		</span><br>';
	 							}

	 							if ($mRating == 2) 
	 							{
	 								echo '
	 								<span class="ratingShow">
							 			<input type="radio" name="ratings'. $j .'" value="5" id="star5" disabled>
							 			<label for="star5"></label>

							 			<input type="radio" name="ratings'. $j .'" value="4" id="star4" disabled>
							 			<label for="star4"></label>

							 			<input type="radio" name="ratings'. $j .'" value="3" id="star3" disabled>
							 			<label for="star3"></label>

							 			<input type="radio" name="ratings'. $j .'" value="2" id="star2" disabled checked>
							 			<label for="star2"></label>

							 			<input type="radio" name="ratings'. $j .'" value="1" id="star1" disabled>
							 			<label for="star1"></label>
							 		</span><br>';
	 							}

	 							if ($mRating == 3) 
	 							{
	 								echo '
	 								<span class="ratingShow">
							 			<input type="radio" name="ratings'. $j .'" value="5" id="star5" disabled>
							 			<label for="star5"></label>

							 			<input type="radio" name="ratings'. $j .'" value="4" id="star4" disabled>
							 			<label for="star4"></label>

							 			<input type="radio" name="ratings'. $j .'" value="3" id="star3" disabled checked>
							 			<label for="star3"></label>

							 			<input type="radio" name="ratings'. $j .'" value="2" id="star2" disabled>
							 			<label for="star2"></label>

							 			<input type="radio" name="ratings'. $j .'" value="1" id="star1" disabled>
							 			<label for="star1"></label>
							 		</span><br>';
	 							}

	 							if ($mRating == 4) 
	 							{
	 								echo '
	 								<span class="ratingShow">
							 			<input type="radio" name="ratings'. $j .'" value="5" id="star5" disabled>
							 			<label for="star5"></label>

							 			<input type="radio" name="ratings'. $j .'" value="4" id="star4" disabled checked>
							 			<label for="star4"></label>

							 			<input type="radio" name="ratings'. $j .'" value="3" id="star3" disabled>
							 			<label for="star3"></label>

							 			<input type="radio" name="ratings'. $j .'" value="2" id="star2" disabled>
							 			<label for="star2"></label>

							 			<input type="radio" name="ratings'. $j .'" value="1" id="star1" disabled>
							 			<label for="star1"></label>
							 		</span><br>';
	 							}

	 							if ($mRating == 5) 
	 							{
	 								echo '
	 								<span class="ratingShow">
							 			<input type="radio" name="ratings'. $j .'" value="5" id="star5" disabled checked>
							 			<label for="star5"></label>

							 			<input type="radio" name="ratings'. $j .'" value="4" id="star4" disabled>
							 			<label for="star4"></label>

							 			<input type="radio" name="ratings'. $j .'" value="3" id="star3" disabled>
							 			<label for="star3"></label>

							 			<input type="radio" name="ratings'. $j .'" value="2" id="star2" disabled>
							 			<label for="star2"></label>

							 			<input type="radio" name="ratings'. $j .'" value="1" id="star1" disabled>
							 			<label for="star1"></label>
							 		</span><br>';
	 							}
	 						 ?><br>

	 						<b>Website Link: </b><br><a href="<?php echo $mLink ?>"><?php echo $mLink ?></a><br>
	 					</p>

	 					<?php
	 				}
	 			echo "</div>";
	 			}

	 			else
	 			{
	                echo "<p>No Social Media Found</p>";
	 			}
	 		 ?>
		</section>

		<br><br><br><br><br><br><br>

	<section class="techniqueSearchContainer">
		<form action="app.php" method="POST">
 		<h2>Search Safety Techniques</h2><br><br><br>
 		<?php 
 			if ($homeSearch == '0') 
 			{
 				echo '<div id="searchTechniqueContainer">
 						<input id="searchTechnique" type="text" name="txtSearch" placeholder="Search By Name" required>
		            	<input type="submit" name="btnSearch" id="SearchBtn" hidden>
		            	</div>';
 			}

 			else
 			{
 				echo '<div id="searchTechniqueContainer">
 						<input id="searchTechnique" type="text" name="txtSearch" placeholder="Search By Name" value="<?php echo $homeSearch ?>">
		            	<input type="submit" name="btnSearch" id="SearchBtn" hidden>
		            	</div>';
 			}
 		 ?><br><br><br>

	 		<?php 
	 			if (isset($_POST['btnSearch'])) 
	 			{
	 				$search = $_POST['txtSearch'];

	 				$query = "SELECT * FROM techniquetb WHERE Status = 'Latest'
	 						  AND TechniqueName LIKE '%$search%'";

	 				$result = mysqli_query($dbConnect, $query);
	 				$count = mysqli_num_rows($result);

	 				if ($count > 0) 
	 				{
	 					echo "<div class='techniques'><table>";

	 					for ($i=0; $i < $count; $i+=5) 
	 					{ 
	 						$query2 = "SELECT * FROM techniquetb WHERE Status = 'Latest'
	 						  AND TechniqueName LIKE '%$search%' LIMIT $i,5";

	 						$result2 = mysqli_query($dbConnect, $query2);
	 						$count2 = mysqli_num_rows($result2);

	 						echo "<tr>";

	 						for ($j=0; $j < $count2; $j++) 
	 						{ 
	 							$data = mysqli_fetch_array($result2);

	 							$tID = $data['TechniqueID'];
	 							$tName = $data['TechniqueName'];
	 							$tImg = $data['TechniqueImg'];
	 							$tTip1 = $data['Tip1'];
	 							$tTip2 = $data['Tip2'];
	 							$tTip3 = $data['Tip3'];
	 							 ?>

	 							<p>
	 								<img src="<?php echo $tImg; ?>" width="200px">
	 								<span>
	 									<b><?php echo $tName; ?></b><br><br>
		 								<b>Tip 1: <?php echo $tTip1; ?></b><br><br>
		 								<b>Tip 2: <?php echo $tTip2; ?></b><br><br>
		 								<b>Tip 3: <?php echo $tTip3; ?></b><br><br>
	 								</span>
	 							</p>

	 							<?php
	 						}
	 						echo "</tr>";
	 					}
	 					echo "</table></div>";
	 				}

	 				else
	 				{
	 					echo "<h3>Searched Technique Does Not Exist</h3>";
	 				}
	 			}
	 		 ?>
	 	</form>
	</section>

 	<br><br><br><br><br><br><br><br><br>

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


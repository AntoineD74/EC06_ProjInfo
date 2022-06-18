<!DOCTYPE Html>


<html>

	<head> <!--head of the page-->
		<?php
			$light_mode = "";
			$mode_dark = False;

			if(!empty($_POST)) 
		    {
		        if(!empty($_POST['mode_light']))
		        {
					$light_mode = $_POST['mode_light'];
				}
		    }

		    if(isset($_POST['mode_light']) && $_POST['mode_light'] == 'checked')
		    {
		        $mode_dark = True;
		    }
		?>

		<meta charset="utf-8" />

		<?php
			if($mode_dark==False){echo '<link rel="stylesheet" href="stylesheet.css" />';}		//displaying according to the choice of the user
			else{echo '<link rel="stylesheet" href="stylesheet_dark.css" />';}
		?>

		<title> CyberSecuritySchool </title>

	</head>

<!---------------------------------------------------------------------------- Body ----------------------------------------------------------------------------->

	<body> 

		<header> <!--Header of the page-->

				<a href="index.php" title="logo_image">
					<img src="Image/logo.png" class="logo_site">
				</a>

				<h1 class="name_site">Cyber Security School </h1>


				<img src="Image/logo_ecam.png" class="logo_student_main" alt="Logo ECAM">

				

<!-- ------------------------------------------------------Light/dark selector-------------------------------------------------------------- -->


			<?php
				if($mode_dark==True) 
				{
					echo "<p class='dl_text_main_page'> Dark </p>";
				}
				elseif($mode_dark==False)
				{
					echo "<p class='dl_text_main_page'> Light </p>";
				}	 
			?>

			<!-- Light/dark switch -->
			<div class = "dl_button_main_page">
				<form id="form_light" method="post" action="">
					<label for="mode_light" class="switch">

				  		<input id="mode_light" name="mode_light" type="checkbox" value= "checked" <?php if(isset($_POST['mode_light'])) echo "checked='checked'"; ?> onclick="validate()" />

				  		<?php
				  			if($mode_dark== False)
				  			{
				  				echo '<span class="slider round"></span>';
				  			}
							elseif ($mode_dark==True) 
							{
								echo '<span class="darkSlider round"></span>';
							}


						?>

					</label>
				</form>
			</div>


			<script type=text/javascript>
				function validate()
				{
				    var mode_light = document.getElementById('mode_light');
				    var form_light = document.getElementById('form_light');

				    form_light.submit();
				}
			</script>

<!------------------------------------ nav ------------------------------------>

		


				<nav>
				 	<ul>
					    <li class="menu-deroulant">
					      <a href="index.php">Home</a>
					    </li>


					    <li class="menu-deroulant">
					      <a href="vpn_lesson"> Course</a>
					      <ul class="sous-menu">
					        <li><a href="vpn_lesson.php">VPN</a></li>
					        <li><a href="database_lesson.php">DATABASE</a></li>
					        <li><a href="crypto_lesson.php">CRYPTO</a></li>
					        <li><a href="network_lesson.php">NETWORK</a></li>
					      </ul>
					    </li>


					     <li class="menu-deroulant">
					      <a href="vpn_exercise"> Exercise</a>
					      <ul class="sous-menu">
					        <li><a href="vpn_exercise.php">VPN</a></li>
					        <li><a href="database_exercise.php">DATABASE</a></li>
					        <li><a href="crypto_exercise.php">CRYPTO</a></li>
					        <li><a href="network_exercise.php">NETWORK</a></li>
					      </ul>
					    </li>


					    <li class="menu-deroulant">
					    	<a href="#">About us</a>
					    </li> 
					</ul>

				</nav>




		</header>
<!------------------------------------ VPN ------------------------------------>

				<div id="vpn_div_presentation"> 

					<div id="picture_vpn_presentation_div">
						<img src="Image/vpn.png" id="picture_vpn_presentation" alt="VPN">
					</div>

					<div id="title_vpn">
						<a id="vpn_link" href="vpn_lesson.php" title="VPN"> VPN : How it works ?</a>
					</div>

				</div>

<!------------------------------------ Database ------------------------------------>

				<div id="database_div_presentation">

					<div id="picture_database_presentation_div">
						<img src="Image/database.png" id="picture_database_presentation" alt="Database">
					</div>

					<div id="title_database">
						<a id="database_link" href="database_lesson.php" title="Databases"> Databases </a>
					</div>

				</div>


<!------------------------------------ Cryptography ------------------------------------>

				<div id="crypto_div_presentation">

					<div id="picture_crypto_presentation_div">
						<img src="Image/crypto.png" id="picture_crypto_presentation" alt="Crypto">
					</div>

					<div id="title_crypto">
						<a id="crypto_link" href="crypto_lesson.php" title="Cryptography"> Cryptography : how to encrypt ? </a> 
					</div>

				</div>

<!------------------------------------ Network ------------------------------------>
		
				<div id="network_div_presentation">

					<div id="picture_network_presentation_div">
						<img src="Image/network.png" id="picture_network_presentation" alt="Networks">
					</div>
	
					<div id="title_network">
						<a id="network_link" href="network_lesson.php" title="Network"> Discover networks </a> 
					</div>
				
				</div>

<!------------------------------------ CyberNews ------------------------------------>

					<!--<aside> 
						<section id="news">
							<marquee behavior="scroll" direction="up" width="100%" height="100%" scrollamount="10" scrolldelay="170">
								<h2 id="news1">NEWS 1: The US charity Breastcancer.org suffered a misconfigured bucket exposure of over 350,000 files containing sensitive images of users.<br/>

								<p id="p1">
								The SafetyDetectives cybersecurity team discovered 150 GB of exposed data in the bucket with over 50,000 user avatars. Two separate databases contained different types of information, including user avatars (profile pictures on the website) and post images.
								“While this is publicly available information, user avatars could be used in conjunction with EXIF data to identify vulnerable users,” the report explains.
								
								
								Post images, in turn, were uploaded by users separately to the charity’s website. The researchers detected over 300,000 such files and EXIF data attached to each post image. Such data can expose additional details about the user, including the image’s GPS location and information about the device which took the image. No contact details of website users seem to be affected.</h2>
								</p>
								<h2 id="news2">NEWS 2: While extremely limited, the culture of hacking has taken root in one of the most isolated places on the planet.<br>
								
								<p>Despite North Korea’s draconian efforts to keep its population away from outside-the-country media, some still find ways to bypass state controls.
								According to a report by Lumen, a US-based non-profit, even though outsiders assume North Koreans are cut off from the global internet and are unable to access the hacking know-how, the reality on the ground is different. Escapees told researchers how groups of friends and associates help each other to get around state controls on smartphones.
								“The scale of the hacking still appears to be minor, but recent changes to North Korean law indicate national authorities view it as a serious problem,” reads the report.</p></h2>
							</marquee>
						</section>

					</aside> -->

	</body>

</html>

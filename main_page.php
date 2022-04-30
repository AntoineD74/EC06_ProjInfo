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


	<body> <!--body of the page-->

		<header> <!--Header of the page-->

				<a id="return_main" href="main_page.php" title="logo_image">
					<img src="Image/Logo.png" id="logo-site" alt="Logo site">
				</a>
				
				<h1 id="titre"> CyberSecuritySchool </h1>

				<img src="Image/logo_ecam.png" id="logo-student-main" alt="Logo ECAM">


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

	<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->

		</header>


			<section id="Menu">
			
						<div id="a">
							<p> <a id="Home" href="index.php" title="Home"> Home </p>
						</div>

						<div id="b">
							<p> <a id="Course" href="main_page.html" title="Course"> Course </p>
						</div>

						<div id="c">
							<p> <a id="Exercise" href="Main_page.html" title="Exercise"> Exercise </p>
						</div>

						<div id="d">
							<p> <a id="About" href=".html" title="Aboutus"> About us </p>
						</div>

			</section>




				<section id="V"> <!--VPN-->

					<a id="VPN" href="vpn_lesson.html" title="VPN"> VPN : How it works ?</a>

				</section>



				<section id="D"><!--Databases-->

					<a id="Data" href="data.html" title="Databases"> Database : How to set one up ? </a>

				</section>



				<section id="C"><!--Criptography-->

						<a id="Crypto" href="crypto.html" title="Cryptography"> Cryptography : How it works ? </a> 

				</section>



					<aside> <!--Aside used to give breaking news on the cyber security-->
						<section id="News">
							<marquee behavior="scroll" direction="up" width="100%" height="100%" scrollamount="10" scrolldelay="170">
								<h2 id="n1">NEWS 1: The US charity Breastcancer.org suffered a misconfigured bucket exposure of over 350,000 files containing sensitive images of users.<br/>

								<p id="p1">
								The SafetyDetectives cybersecurity team discovered 150 GB of exposed data in the bucket with over 50,000 user avatars. Two separate databases contained different types of information, including user avatars (profile pictures on the website) and post images.
								“While this is publicly available information, user avatars could be used in conjunction with EXIF data to identify vulnerable users,” the report explains.
								
								
								Post images, in turn, were uploaded by users separately to the charity’s website. The researchers detected over 300,000 such files and EXIF data attached to each post image. Such data can expose additional details about the user, including the image’s GPS location and information about the device which took the image. No contact details of website users seem to be affected.</h2>
								</p>
								<h2 id="n2">NEWS 2: While extremely limited, the culture of hacking has taken root in one of the most isolated places on the planet.<br>
								
								<p>Despite North Korea’s draconian efforts to keep its population away from outside-the-country media, some still find ways to bypass state controls.
								According to a report by Lumen, a US-based non-profit, even though outsiders assume North Koreans are cut off from the global internet and are unable to access the hacking know-how, the reality on the ground is different. Escapees told researchers how groups of friends and associates help each other to get around state controls on smartphones.
								“The scale of the hacking still appears to be minor, but recent changes to North Korean law indicate national authorities view it as a serious problem,” reads the report.</p></h2>
							</marquee>
						</section>

					</aside>





		<footer id="info"> <!--Footer of the page-->

			<div id="us">
							<h2> About us </h2>
			</div>

			<div id="contact">
							<h2> Contact</h2>
			</div>

			<div id="Social">
							<h2> Social network </h2>
			</div>

		</footer>

	</body>

</html>

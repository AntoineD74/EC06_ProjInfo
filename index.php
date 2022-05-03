<!DOCTYPE Html>


<html>

	<head> 
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


	<body> <!--Corps de la page-->

		<header>

			<div class="inline_blocks">
			
				<div id= stripes_block>
					<img src="Image/Stripes.png" id="stripes" alt="Left stripes">
				</div>

				<div id= "ecam_logo">
					<img src="Image/logo_ecam.png"  id="logo_student" alt="Logo ECAM">
				</div>

			</div>

		<!-- ------------------------------------------------------Light/dark selector-------------------------------------------------------------- -->


			<?php
				if($mode_dark==True) 
				{
					echo "<p class='dl_text'> Dark </p>";
				}
				elseif($mode_dark==False)
				{
					echo "<p class='dl_text'> Light </p>";
				}	 
			?>

			<!-- Light/dark switch -->
			<div class = "dl_button">
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


		<div class = "inline_blocks">

			<div>
				<img src="Image/Logo.png" id="logo" alt="image flottante"></p>
			</div>

			<div id="intro">

				<h1 > Cyber Security School Website </h1>
				<p> Learn basics </p>

			</div>
		</div>


				<p id="Discover"> <a id="discover" href="main_page.php" title="menu"> Discover</a> </p>

	</body>

</html>

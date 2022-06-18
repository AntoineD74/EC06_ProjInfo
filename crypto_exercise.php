<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="stylesheet.css">
      <title> CyberSecuritySchool-Cryptographie </title>


      <?php
        $mode_dark = False;

         if(isset($_POST['mode_light']) && $_POST['mode_light'] == 'checked')
          {
            $mode_dark = True;
          }

          else
          {
            $mode_dark = False;
          }
      ?>


      <?php
        if($mode_dark==False){echo '<link rel="stylesheet" href="stylesheet.css" />';}    //displaying according to the choice of the user
        else{echo '<link rel="stylesheet" href="stylesheet_dark.css" />';}

      ?>
  </head>


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

        $_SESSION['mode_dark'] = $mode_dark; 
      ?>

      <!-- Light/dark switch -->
      <div class = "dl_button_main_page">
        <form id="form_light" method="post" action="">
          <label for="mode_light" class="switch">

              <input id="mode_light" name="mode_light" type="checkbox" value= "checked" <?php if($mode_dark==True) echo "checked='checked'"; ?> onclick="validate()" />

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

	 <?php
        $error = array();

        $string_inv = "";
		$string_cesar = "";
		$string_clef = "";
		$inv = False;
		$cesar = False;
		$key = False;
        if(!empty($_POST)) 
        {
			if($_POST["submit"] == "Encrypt_inv"){$inv = True;}
			elseif($_POST["submit"] == "Encrypt_cesar"){$cesar = True;}
			elseif($_POST["submit"] == "Encrypt_key"){$key = True;}
	
            if(!empty($_POST['string_inv']))
            {
            	$string_inv = trim($_POST['string_inv']);
            }
            else
            {
            	$error['string_inv'] = 'You need to enter a sentance before submitting !';

            }


  			if(!empty($_POST['string_cesar']))
        {
  				$string_cesar = trim($_POST['string_cesar']);
        }
              
        else
        {
  				$error['string_cesar'] = 'You need to enter a sentance before submitting !';
        }

  			if(!empty($_POST['string_clef']))
        {
  				$string_clef = trim($_POST['string_clef']);
        }
        else
        {
  				$error['string_clef'] = 'You need to enter a sentance before submitting !';
        }
      }
    ?>

<body>

  <div id="crypto_first_part">
    
    <h2  class="insider_titles_black_exo1">Inverse alphabet encryption</h2>


      <p class="text_black"> Here we have a simple encryption by inversion of the alphabet. Each letter is replace by its opposite letter in the alphabet for example the letter A is replace by the letter Z</p>
      <p class="text_black">Enter a sentance:</p>
	  
		<form method="post" action="" id="form1">
			
			
				<input type="text" class= "input_inv" name="string_inv" value="<?php echo $string_inv; ?>"><br/>

				 <?php
                    if(!empty($error['string_inv']) && $inv == True)
                    {
                        echo "<div class='error_form'>".$error['string_inv']."</div>";
                    }
                ?>

                <input  type="submit" class="submit" name="submit" value="Encrypt_inv">

			<br/>
		
		</form>
	

		
			
			<?php

				if(!empty($error) && $string_inv != "" && $inv == True)
				{
          echo '<div class="results1-outer">';
            echo '<div class="results1-inner">';

  					$command = '"crypto_exercises\crypt_alpha_inv\dist\crypt_alpha_inv\crypt_alpha_inv" ' .$string_inv;
  					$output = shell_exec($command);
  					echo "<pre>".$output."</pre>";

            echo '</div>';
          echo '</div>';
				}
			?>
			

		
	</div>
	
<div class="second_part">

  <div id="crypto_types_text">

      
    <h2 class="insider_titles_exo2">Cesar encryption </h2>
	
      <p class = "text_white">Here we have a simple Cesar encryption. Each letter is replace by the letter wich is at a given gap of it. For example if we have a gap of 3 the letter A will be replace by the letter D.</p>
      <p class = "text_white">Enter a word and a gap with a space beetween them:</br> if you want to enter a sentance please add " before and after you're sentence</p>

		<form method="post" action="" id="form2">
		
				<input type="text" class= "input_cesar" name="string_cesar" value="<?php echo $string_cesar; ?>"><br/>

				 <?php
            if(!empty($error['string_cesar']) && $cesar == True)
            {
                echo "<div class='error_form'>".$error['string_cesar']."</div>";
            }
          ?>

          <input  type="submit" class="submit" name="submit" value="Encrypt_cesar">

			<br/>
		
		</form>

		
		
					<?php
  						if(!empty($error) && $string_cesar != "" && $cesar == True)
  						{                   
                echo '<div class="results2-outer">';
                  echo '<div class="results2-inner">';

  							   $command = '"crypto_exercises\cryptage_cesar\dist\cryptage_cesar\cryptage_cesar" '.$string_cesar . ' 3';
  							   $output = shell_exec($command);
  							   echo '<pre>'.$output.'</pre>';

                  echo '</div>';
                echo '</div>';
  						}
             
					?>
					
	</div>
</div>

<div class="div_white">		
	<h2  class="insider_titles_black_exo3">Symetric encryption </h2>


    <p class="text_black">
      Here we have a symertrics encryption. It use en encryption key in order to encrypt the message<br/>
      Enter a word, if you want to enter a sentance you must add " before and after your sentance. </br> if you want to decrypt you're senteance you must add the key given after encryption
    </p>

		<form method="post" action="" id="form3">
			
			
				<input type="text" class= "input_key" name="string_clef" value="<?php echo $string_clef; ?>"><br/>

				 <?php
                    if(!empty($error['string_clef']) && $key == True)
                    {
                        echo "<div class='error_form'>".$error['string_clef']."</div>";
                    }
                ?>

                <input  type="submit" class="submit" name="submit" value="Encrypt_key">

			<br/>
		
		</form>
	

		
			<?php
          
    		if(!empty($error) && $string_clef != "" && $key == True)
    		{

          echo '<div class="results3-outer">';
            echo '<div class="results3-inner">';

      			$command = '"crypto_exercises\cryptage_avec_clef\dist\cryptage_avec_clef\cryptage_avec_clef" ' .$string_clef;
      			$output = shell_exec($command);
      			echo "<pre>".$output."</pre>";

           echo '</div>';
          echo '</div>'; 
    		}

			?>
			
</div>
</body>


</html>
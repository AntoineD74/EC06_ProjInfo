<!DOCTYPE html>

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


<body>

  <div id="crypto_first_part">
    
    <h1  class="big_titles_black">Qu'est-ce que la cryptographie ? </h1>


      <p class="text_black">
	  En général, la cryptographie est une technique d'écriture où un message chiffré est écrit à l'aide de codes secrets ou de clés de chiffrement.
	  La cryptographie est principalement utilisée pour protéger un message considéré comme confidentiel. Cette méthode est utilisée dans un grand nombre de domaines,
	  tels que la défense, les technologies de l'information, la protection de la vie privée, etc. Il existe de nombreux algorithmes cryptographiques 
	  qui peuvent être utilisés pour chiffrer (et déchiffrer pour le destinataire) le message. Certains sont considérés comme basiques (par exemple,
	  la lettre de l'alphabet est décalée vers la droite ou la gauche avec un certain nombre de notes), d'autres offrent un niveau de sécurité presque absolu.
	  Elle est utilisée depuis l'Antiquité, mais certaines de ses méthodes les plus modernes, comme la cryptographie asymétrique, datent de la fin du XXe siècle.
      </p>

    <h1 class="big_titles_black">Algorithmes et protocoles</h1>

      <h2 class = "insider_titles_black">a) Chiffrement faible  </h2>

        <p class="text_black">
		Les premiers algorithmes utilisés pour le chiffrement d'une information étaient assez rudimentaires dans leur ensemble. Ils consistaient notamment au remplacement de caractères par d'autres. La confidentialité de l'algorithme de chiffrement était donc la pierre angulaire de ce système pour éviter un décryptage rapide.
		Exemples d'algorithmes de chiffrement faibles :
		<ul>
          <li class="list_black">ROT13 (rotation de 13 caractères, sans clé) </li>
              
          <li class="list_black">Chiffre de César (décalage de trois lettres dans l'alphabet sur la gauche)</li>
        </ul><br/>

         </p>



        
      <h2 class = "insider_titles_black">b) Cryptographie symétrique (à clé secrète)</h2>

        <p class="text_black">
		Les algorithmes de chiffrement symétrique se fondent sur une même clé pour chiffrer et déchiffrer un message.
		L'un des problèmes de cette technique est que la clé, qui doit rester totalement confidentielle, doit être transmise au correspondant de façon sûre. 
		La mise en œuvre peut s'avérer difficile, surtout avec un grand nombre de correspondants car il faut autant de clés que de correspondants.</br>
		Quelques algorithmes de chiffrement symétrique très utilisés :

		<ul>
          <li class="list_black">Chiffre de Vernam (le seul offrant une sécurité théorique absolue, à condition que la clé ait au moins la même longueur que le message à chiffrer,
		  qu'elle ne soit utilisée qu'une seule fois et qu'elle soit totalement aléatoire)</li>
              
          <li class="list_black">DES</li>
		  
		  <li class="list_black">3DES </li>
		  
		  <li class="list_black">AES</li>
		  
		  <li class="list_black">RC4 </li>
		  
		  <li class="list_black">RC5 </li>
		  
		  <li class="list_black">MISTY1</li>
        </ul><br/>
        </p>

  </div>

<div class="second_part">

  

  <div id="crypto_types_text">
      
    <h2 class="insider_titles">c) Algorithmes de cryptographie asymétrique (à clé publique et privée) </h2>
	
	<div id="div_crypto_types_img">
    <img id="types_crypto_img" src="Image/schemas_chiffrement_asymetrique.webp" alt="chiffrement asymétrique"/>
	</div>

      <p class = "text_white">
        Pour résoudre le problème de l'échange de clés, la cryptographie asymétrique a été mise au point dans les années 1970. </br> Elle se base sur le principe de deux clés :
		</p>
		 <ul>
		 <li class="list_white">Une publique, permettant le chiffrement</li>
		  
		  <li class="list_white">Une privée, permettant le déchiffrement </li>
        </ul><br/>
		<p class = "text_white">
		Comme son nom l'indique, la clé publique est mise à la disposition de quiconque désire chiffrer un message. Ce dernier ne pourra être déchiffré qu'avec la clé privée, qui doit rester confidentielle.
		</br> Quelques algorithmes de cryptographie asymétrique très utilisés :
		</p>
		<ul>
		 <li class="list_white">RSA (chiffrement et signature)</li>
		  
		  <li class="list_white">DSA (signature) </li>
		  
		  <li class="list_white">Protocole d'échange de clés Diffie-Hellman (échange de clé) </li>
        </ul><br/>
		<p class = "text_white">
		Le principal inconvénient de RSA et des autres algorithmes à clés publiques est leur grande lenteur par rapport aux algorithmes à clés secrètes. RSA est par exemple 1000 fois plus lent que DES. En pratique, dans le cadre de la confidentialité, on s'en sert pour chiffrer un nombre aléatoire qui sert ensuite de clé secrète pour un algorithme de chiffrement symétrique. 
		La cryptographie asymétrique est également utilisée pour assurer l'authenticité d'un message. L'empreinte du message est chiffrée à l'aide de la clé privée et est jointe au message. Les destinataires déchiffrent ensuite le cryptogramme à l'aide de la clé publique et retrouvent normalement l'empreinte. Cela leur assure que l'émetteur est bien l'auteur du message. On parle alors de signature ou encore de scellement.
		La plupart des algorithmes de cryptographie asymétrique sont vulnérables à des attaques utilisant un calculateur quantique, à cause de l'algorithme de Shor. La branche de la cryptographie visant à garantir la sécurité en présence d'un tel adversaire est la cryptographie post-quantique.

      </p>


    </div>

</div>


  <div class="div_white">

    <h2 class="big_titles_black">Fonctions de hachage</h2>
    <p class = "text_black">
      Une fonction de hachage est une fonction qui convertit un grand ensemble en un plus petit ensemble, l'empreinte. Il est impossible de la déchiffrer pour revenir à l'ensemble d'origine, ce n'est donc pas une technique de chiffrement.
		</br>Quelques fonctions de hachage très utilisées :
		</p>
		<ul>
		    <li class="list_black">MD5</li>
			
		    <li class="list_black">SHA-1</li>

		    <li class="list_black">SHA-256</li>
		<p class = "text_black">
		L'empreinte d'un message ne dépasse généralement pas 256 bits et permet de vérifier son intégrité.

		</p>


  

</div>



<div class='go_to_exercises_div'>
  <a id="bouton_exo" href="crypto_exercise.php" title="exercise"> Let's do some encryption !</a>
</div>


</body>

</html>
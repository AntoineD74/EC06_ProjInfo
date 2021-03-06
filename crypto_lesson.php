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
	  En g??n??ral, la cryptographie est une technique d'??criture o?? un message chiffr?? est ??crit ?? l'aide de codes secrets ou de cl??s de chiffrement.
	  La cryptographie est principalement utilis??e pour prot??ger un message consid??r?? comme confidentiel. Cette m??thode est utilis??e dans un grand nombre de domaines,
	  tels que la d??fense, les technologies de l'information, la protection de la vie priv??e, etc. Il existe de nombreux algorithmes cryptographiques 
	  qui peuvent ??tre utilis??s pour chiffrer (et d??chiffrer pour le destinataire) le message. Certains sont consid??r??s comme basiques (par exemple,
	  la lettre de l'alphabet est d??cal??e vers la droite ou la gauche avec un certain nombre de notes), d'autres offrent un niveau de s??curit?? presque absolu.
	  Elle est utilis??e depuis l'Antiquit??, mais certaines de ses m??thodes les plus modernes, comme la cryptographie asym??trique, datent de la fin du XXe si??cle.
      </p>

    <h1 class="big_titles_black">Algorithmes et protocoles</h1>

      <h2 class = "insider_titles_black">a) Chiffrement faible  </h2>

        <p class="text_black">
		Les premiers algorithmes utilis??s pour le chiffrement d'une information ??taient assez rudimentaires dans leur ensemble. Ils consistaient notamment au remplacement de caract??res par d'autres. La confidentialit?? de l'algorithme de chiffrement ??tait donc la pierre angulaire de ce syst??me pour ??viter un d??cryptage rapide.
		Exemples d'algorithmes de chiffrement faibles :
		<ul>
          <li class="list_black">ROT13 (rotation de 13 caract??res, sans cl??) </li>
              
          <li class="list_black">Chiffre de C??sar (d??calage de trois lettres dans l'alphabet sur la gauche)</li>
        </ul><br/>

         </p>



        
      <h2 class = "insider_titles_black">b) Cryptographie sym??trique (?? cl?? secr??te)</h2>

        <p class="text_black">
		Les algorithmes de chiffrement sym??trique se fondent sur une m??me cl?? pour chiffrer et d??chiffrer un message.
		L'un des probl??mes de cette technique est que la cl??, qui doit rester totalement confidentielle, doit ??tre transmise au correspondant de fa??on s??re. 
		La mise en ??uvre peut s'av??rer difficile, surtout avec un grand nombre de correspondants car il faut autant de cl??s que de correspondants.</br>
		Quelques algorithmes de chiffrement sym??trique tr??s utilis??s :

		<ul>
          <li class="list_black">Chiffre de Vernam (le seul offrant une s??curit?? th??orique absolue, ?? condition que la cl?? ait au moins la m??me longueur que le message ?? chiffrer,
		  qu'elle ne soit utilis??e qu'une seule fois et qu'elle soit totalement al??atoire)</li>
              
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
      
    <h2 class="insider_titles">c) Algorithmes de cryptographie asym??trique (?? cl?? publique et priv??e) </h2>
	
	<div id="div_crypto_types_img">
    <img id="types_crypto_img" src="Image/schemas_chiffrement_asymetrique.webp" alt="chiffrement asym??trique"/>
	</div>

      <p class = "text_white">
        Pour r??soudre le probl??me de l'??change de cl??s, la cryptographie asym??trique a ??t?? mise au point dans les ann??es 1970. </br> Elle se base sur le principe de deux cl??s :
		</p>
		 <ul>
		 <li class="list_white">Une publique, permettant le chiffrement</li>
		  
		  <li class="list_white">Une priv??e, permettant le d??chiffrement </li>
        </ul><br/>
		<p class = "text_white">
		Comme son nom l'indique, la cl?? publique est mise ?? la disposition de quiconque d??sire chiffrer un message. Ce dernier ne pourra ??tre d??chiffr?? qu'avec la cl?? priv??e, qui doit rester confidentielle.
		</br> Quelques algorithmes de cryptographie asym??trique tr??s utilis??s :
		</p>
		<ul>
		 <li class="list_white">RSA (chiffrement et signature)</li>
		  
		  <li class="list_white">DSA (signature) </li>
		  
		  <li class="list_white">Protocole d'??change de cl??s Diffie-Hellman (??change de cl??) </li>
        </ul><br/>
		<p class = "text_white">
		Le principal inconv??nient de RSA et des autres algorithmes ?? cl??s publiques est leur grande lenteur par rapport aux algorithmes ?? cl??s secr??tes. RSA est par exemple 1000 fois plus lent que DES. En pratique, dans le cadre de la confidentialit??, on s'en sert pour chiffrer un nombre al??atoire qui sert ensuite de cl?? secr??te pour un algorithme de chiffrement sym??trique. 
		La cryptographie asym??trique est ??galement utilis??e pour assurer l'authenticit?? d'un message. L'empreinte du message est chiffr??e ?? l'aide de la cl?? priv??e et est jointe au message. Les destinataires d??chiffrent ensuite le cryptogramme ?? l'aide de la cl?? publique et retrouvent normalement l'empreinte. Cela leur assure que l'??metteur est bien l'auteur du message. On parle alors de signature ou encore de scellement.
		La plupart des algorithmes de cryptographie asym??trique sont vuln??rables ?? des attaques utilisant un calculateur quantique, ?? cause de l'algorithme de Shor. La branche de la cryptographie visant ?? garantir la s??curit?? en pr??sence d'un tel adversaire est la cryptographie post-quantique.

      </p>


    </div>

</div>


  <div class="div_white">

    <h2 class="big_titles_black">Fonctions de hachage</h2>
    <p class = "text_black">
      Une fonction de hachage est une fonction qui convertit un grand ensemble en un plus petit ensemble, l'empreinte. Il est impossible de la d??chiffrer pour revenir ?? l'ensemble d'origine, ce n'est donc pas une technique de chiffrement.
		</br>Quelques fonctions de hachage tr??s utilis??es :
		</p>
		<ul>
		    <li class="list_black">MD5</li>
			
		    <li class="list_black">SHA-1</li>

		    <li class="list_black">SHA-256</li>
		<p class = "text_black">
		L'empreinte d'un message ne d??passe g??n??ralement pas 256 bits et permet de v??rifier son int??grit??.

		</p>


  

</div>



<div class='go_to_exercises_div'>
  <a id="bouton_exo" href="crypto_exercise.php" title="exercise"> Let's do some encryption !</a>
</div>


</body>

</html>
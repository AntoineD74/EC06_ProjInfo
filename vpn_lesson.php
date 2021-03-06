<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="stylesheet.css">
      <title> CyberSecuritySchool-VPN </title>


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


    <?php
      if($mode_dark==False){echo '<link rel="stylesheet" href="stylesheet.css" />';}    //displaying according to the choice of the user
      else{echo '<link rel="stylesheet" href="stylesheet_dark.css" />';}
    ?>
  </head>


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




  <div id="vpn_first_part">
    
    <h1  class="big_titles_black">Le principe </h1>


      <p class="text_black">
        Un r??seau VPN repose sur un protocole appel?? ?? protocole de tunneling ??. Ce protocole permet de faire circuler les informations de l???entreprise de fa??on crypt??e d???un bout ?? l???autre du tunnel. Ainsi, les utilisateurs ont l???impression de se connecter directement sur le r??seau de leur entreprise.
      </p>

    <h1 class="big_titles_black">Le Tunneling </h1>

      <h2 class = "insider_titles_black">a) Introduction </h2>

        <p class="text_black">
          Le principe de tunneling consiste ?? construire un chemin virtuel apr??s avoir identifi?? l?????metteur et le destinataire. Par la suite, la source chiffre les donn??es et les achemine en empruntant Ce chemin virtuel. Afin d???assurer un acc??s ais?? et peu co??teux aux intranets ou aux extranets d???entreprise, les r??seaux priv??s virtuels d???acc??s simulent un r??seau priv??, alors qu???ils utilisent en r??alit?? une infrastructure d???acc??s partag??e, comme Internet.
        </p>

        <div id = "div_tunneling_image">
          <img id="tunneling_image" src="Image/vpn_illustration1.gif" alt="types de VPN"/>
        </div>

        
      <h2 class = "insider_titles_black">b) Pour aller plus loin </h2>

        <p class="text_black">
          Un tunnel, dans le contexte des r??seaux informatiques, est une encapsulation de donn??es d'un protocole r??seau dans un autre, situ?? dans la m??me couche du mod??le en couches, ou dans une couche de niveau sup??rieur.(principes de couche
          D'abord, le paquet est envelopp?? dans un en-t??te suppl??mentaire, c'est ce qu'on appelle l'encapsulation. Cet en-t??te suppl??mentaire contient les informations de routage n??cessaires pour envoyer le paquet encapsul?? ?? travers l'inter-r??seau interm??diaire. Cette information est tr??s importante car les donn??es utiles sont envoy??es dans un protocole diff??rent de celui dans lequel les donn??es ont ??t?? cr????es. Ensuite, un tunnel, qui est un chemin interconnectant 2 points, est cr???? et le paquet est transmis au point final. ?? ce moment, le paquet est d??sencapsul?? pour "retrouver sa forme initiale".
        </p>

  </div>
        

  <div id="vpn_second_part">

    <div id = "vpn_second_part_text">
        <h2 class = "insider_titles_black">c) Principe des couches</h2>

        <p class="text_black"> 
          Le principe des couches d??coule du mod??le OSI.
          Le mod??le OSI (de l'anglais Open Systems Interconnection) est une norme de communication, en r??seau, de tous les syst??mes informatiques. C'est un mod??le de communications entre ordinateurs propos?? par l'ISO (Organisation internationale de normalisation) qui d??crit les fonctionnalit??s n??cessaires ?? la communication et l'organisation de ces fonctions.
          Le mod??le comporte sept couches succinctement pr??sent??es ci-dessus de bas en haut et d??taill??es dans leurs articles respectifs. Ces couches sont parfois r??parties en deux groupes.
          Les trois couches inf??rieures sont plut??t orient??es communication et sont souvent fournies par un syst??me d'exploitation et par le mat??riel.
          Les quatre couches sup??rieures sont plut??t orient??es application et plut??t r??alis??es par des biblioth??ques ou un programme sp??cifique. Dans le monde IP, ces quatre couches sont rarement distingu??es. Dans ce cas, toutes les fonctions de ces couches sont consid??r??es comme faisant partie int??grante du protocole applicatif.
          Par ailleurs, les couches basses sont normalement transparentes pour les donn??es ?? transporter, alors que les couches sup??rieures ne le sont pas n??cessairement, notamment au niveau pr??sentation.
        </p>
    </div>

    <div id="vpn_osi_model_div">
      <img class="vpn_osi_model_img" src="Image/osi_model.png" alt="types de VPN"/>
    </div>

  </div>

    

    
</div>

<div class="second_part">

  <div id="div_vpn_types_img">
    <img id="types_vpn_img" src="Image/types_vpn.jpg" alt="types de VPN"/>
  </div>

  <div id="vpn_types_text">

    <h1 class="big_titles_white">Les types de VPN </h1>
      
    <h2 class="insider_titles">a) VPN d???acc??s ?? distance</h2>

      <p id = "vpn_types_part1">
        Le VPN d???acc??s est utilis?? pour permettre ?? des utilisateurs itin??rants d???acc??der au r??seau priv??. L???utilisateur se sert d???une connexion Internet pour ??tablir la connexion VPN. Il existe deux cas :

        <ul>
          <li class="list_white">L???utilisateur demande au fournisseur d???acc??s de lui ??tablir une connexion crypt??e vers le serveur distant : il communique avec le Nas (Network Access Server/Serveur d???acc??s r??seau) du fournisseur d???acc??s et c???est le Nas qui ??tablit la connexion crypt??e.</li><br/>
              
          <li class="list_white">L???utilisateur poss??de son propre logiciel client pour le VPN auquel cas il ??tablit directement la communication de mani??re crypt??e vers le r??seau de l???entreprise. </li>
        </ul><br/>
      </p>

      <p id = "vpn_types_part2">
        Les deux m??thodes poss??dent chacune leurs avantages et leurs inconv??nients :
        <ul>
          <li class="list_white">La premi??re permet ?? l???utilisateur de communiquer sur plusieurs r??seaux en cr??ant plusieurs tunnels, mais n??cessite un fournisseur d???acc??s proposant un Nas compatible avec la solution VPN choisie par l???entreprise. De plus, la demande de connexion par le Nas n???est pas crypt??e Ce qui peut poser des probl??mes de s??curit??.</li><br/>
              
          <li class="list_white">Sur la deuxi??me m??thode Ce probl??me dispara??t puisque l???int??gralit?? des informations sera crypt??e d??s l?????tablissement de la connexion. Cependant, cette solution n??cessite que chaque client transporte avec lui le logiciel, lui permettant d?????tablir une communication crypt??e.</li><br/>
                
          <li class="list_white">  Quelle que soit la m??thode de connexion choisie, Ce type d???utilisation montre bien l???importance dans le VPN d???avoir une authentification forte des utilisateurs. Cette authentification peut se faire par une v??rification ?? login / mot de passe ??, par un algorithme dit ?? Tokens s??curis??s ?? (utilisation de mots de passe al??atoires) ou par certificats num??riques.</li>
        </ul>
      </p>

    </div>

</div>


  <div class="div_white">

    <h2 class="insider_titles_black">b) L???intranet VPN</h2>
    <p class = "text_black">
      L???intranet VPN est utilis?? pour relier au moins deux intranets entre eux. Ce type de r??seau est particuli??rement utile au sein d???une entreprise poss??dant plusieurs sites distants. Le plus important dans Ce type de r??seau est de garantir la s??curit?? et l???int??grit?? des donn??es. Certaines donn??es tr??s sensibles peuvent ??tre amen??es ?? transiter sur le VPN (base de donn??es clients, informations financi??res???). Des techniques de cryptographie sont mises en ??uvre pour v??rifier que les donn??es n???ont pas ??t?? alt??r??es. Il s???agit d???une authentification au niveau paquet pour assurer la validit?? des donn??es, de l???identification de leur source ainsi que leur non-r??pudiation. La plupart des algorithmes utilis??s font appel ?? des signatures num??riques qui sont ajout??es aux paquets. La confidentialit?? des donn??es est, elle aussi, bas??e sur des algorithmes de cryptographie. La technologie en la mati??re est suffisamment avanc??e pour permettre une s??curit?? quasi parfaite. Le co??t mat??riel des ??quipements de cryptage et d??cryptage ainsi que les limites l??gales interdisent l???utilisation d???un codage ?? infaillible ?? G??n??ralement pour la confidentialit??, le codage en lui-m??me pourra ??tre moyen ?? faible, mais sera combin?? avec d???autres techniques comme l???encapsulation Ip dans Ip pour assurer une s??curit?? raisonnable.
    </p>

  

    <h1 class="big_titles_black">Les caract??ristiques d???un bon VPN</h1>
      <p class = "text_black">
        Un syst??me de VPN doit pouvoir mettre en ??uvre les fonctionnalit??s suivantes :
      </p>

      <ul>
        <li class="list_black">Authentification d???utilisateur. Seuls les utilisateurs autoris??s doivent pouvoir s???identifier sur le r??seau virtuel. De plus, un historique des connexions et des actions effectu??es sur le r??seau doit ??tre conserv??.</li>

        <li class="list_black">Gestion d???adresses. Chaque client sur le r??seau doit avoir une adresse priv??e. Cette adresse priv??e doit rester confidentielle. Un nouveau client doit pouvoir se connecter facilement au r??seau et recevoir une adresse.</li>

        <li class="list_black">Cryptage des donn??es. Lors de leurs transports sur le r??seau public les donn??es doivent ??tre prot??g??es par un cryptage efficace.</li>

        <li class="list_black">Gestion de cl??s. Les cl??s de cryptage pour le client et le serveur doivent pouvoir ??tre g??n??r??es et r??g??n??r??es.</li>

        <li class="list_black">Prise en charge multiprotocole. La solution VPN doit supporter les protocoles les plus utilis??s sur les r??seaux publics en particulier Ip.</li>
      </ul>

      <p class = "text_black">
        Le VPN est un principe : il ne d??crit pas l???impl??mentation effective de ces caract??ristiques. C???est pourquoi il existe plusieurs produits diff??rents sur le march?? dont certains sont devenus standard, et m??me consid??r??s comme des normes.
      </p>


  <h1 class="big_titles_black">Les protocoles d???un VPN</h1>
    <p class = "text_black">
      Nous pouvons classer les protocoles que nous allons ??tudier en deux cat??gories:
    </p>

    <ul class="">
      <li class="list_black">Les protocoles de niveau 2 comme PPTP et L2TP. (D??pendant du protocole PPP)</lo>
      <li class="list_black">Les protocoles de niveau 3 comme IPSec ou MPLS.</li>
    </ul>

</div>


  <div class='go_to_exercises_div'>
    <a id="bouton_exo" href="network_exercise.php" title="exercise"> Install your own vpn !</a>
  </div>

</body>

</html>
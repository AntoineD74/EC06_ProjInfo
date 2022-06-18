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
        Un réseau VPN repose sur un protocole appelé « protocole de tunneling ». Ce protocole permet de faire circuler les informations de l’entreprise de façon cryptée d’un bout à l’autre du tunnel. Ainsi, les utilisateurs ont l’impression de se connecter directement sur le réseau de leur entreprise.
      </p>

    <h1 class="big_titles_black">Le Tunneling </h1>

      <h2 class = "insider_titles_black">a) Introduction </h2>

        <p class="text_black">
          Le principe de tunneling consiste à construire un chemin virtuel après avoir identifié l’émetteur et le destinataire. Par la suite, la source chiffre les données et les achemine en empruntant Ce chemin virtuel. Afin d’assurer un accès aisé et peu coûteux aux intranets ou aux extranets d’entreprise, les réseaux privés virtuels d’accès simulent un réseau privé, alors qu’ils utilisent en réalité une infrastructure d’accès partagée, comme Internet.
        </p>

        <div id = "div_tunneling_image">
          <img id="tunneling_image" src="Image/vpn_illustration1.gif" alt="types de VPN"/>
        </div>

        
      <h2 class = "insider_titles_black">b) Pour aller plus loin </h2>

        <p class="text_black">
          Un tunnel, dans le contexte des réseaux informatiques, est une encapsulation de données d'un protocole réseau dans un autre, situé dans la même couche du modèle en couches, ou dans une couche de niveau supérieur.(principes de couche
          D'abord, le paquet est enveloppé dans un en-tête supplémentaire, c'est ce qu'on appelle l'encapsulation. Cet en-tête supplémentaire contient les informations de routage nécessaires pour envoyer le paquet encapsulé à travers l'inter-réseau intermédiaire. Cette information est très importante car les données utiles sont envoyées dans un protocole différent de celui dans lequel les données ont été créées. Ensuite, un tunnel, qui est un chemin interconnectant 2 points, est créé et le paquet est transmis au point final. À ce moment, le paquet est désencapsulé pour "retrouver sa forme initiale".
        </p>

  </div>
        

  <div id="vpn_second_part">

    <div id = "vpn_second_part_text">
        <h2 class = "insider_titles_black">c) Principe des couches</h2>

        <p class="text_black"> 
          Le principe des couches découle du modèle OSI.
          Le modèle OSI (de l'anglais Open Systems Interconnection) est une norme de communication, en réseau, de tous les systèmes informatiques. C'est un modèle de communications entre ordinateurs proposé par l'ISO (Organisation internationale de normalisation) qui décrit les fonctionnalités nécessaires à la communication et l'organisation de ces fonctions.
          Le modèle comporte sept couches succinctement présentées ci-dessus de bas en haut et détaillées dans leurs articles respectifs. Ces couches sont parfois réparties en deux groupes.
          Les trois couches inférieures sont plutôt orientées communication et sont souvent fournies par un système d'exploitation et par le matériel.
          Les quatre couches supérieures sont plutôt orientées application et plutôt réalisées par des bibliothèques ou un programme spécifique. Dans le monde IP, ces quatre couches sont rarement distinguées. Dans ce cas, toutes les fonctions de ces couches sont considérées comme faisant partie intégrante du protocole applicatif.
          Par ailleurs, les couches basses sont normalement transparentes pour les données à transporter, alors que les couches supérieures ne le sont pas nécessairement, notamment au niveau présentation.
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
      
    <h2 class="insider_titles">a) VPN d’accès à distance</h2>

      <p id = "vpn_types_part1">
        Le VPN d’accès est utilisé pour permettre à des utilisateurs itinérants d’accéder au réseau privé. L’utilisateur se sert d’une connexion Internet pour établir la connexion VPN. Il existe deux cas :

        <ul>
          <li class="list_white">L’utilisateur demande au fournisseur d’accès de lui établir une connexion cryptée vers le serveur distant : il communique avec le Nas (Network Access Server/Serveur d’accès réseau) du fournisseur d’accès et c’est le Nas qui établit la connexion cryptée.</li><br/>
              
          <li class="list_white">L’utilisateur possède son propre logiciel client pour le VPN auquel cas il établit directement la communication de manière cryptée vers le réseau de l’entreprise. </li>
        </ul><br/>
      </p>

      <p id = "vpn_types_part2">
        Les deux méthodes possèdent chacune leurs avantages et leurs inconvénients :
        <ul>
          <li class="list_white">La première permet à l’utilisateur de communiquer sur plusieurs réseaux en créant plusieurs tunnels, mais nécessite un fournisseur d’accès proposant un Nas compatible avec la solution VPN choisie par l’entreprise. De plus, la demande de connexion par le Nas n’est pas cryptée Ce qui peut poser des problèmes de sécurité.</li><br/>
              
          <li class="list_white">Sur la deuxième méthode Ce problème disparaît puisque l’intégralité des informations sera cryptée dès l’établissement de la connexion. Cependant, cette solution nécessite que chaque client transporte avec lui le logiciel, lui permettant d’établir une communication cryptée.</li><br/>
                
          <li class="list_white">  Quelle que soit la méthode de connexion choisie, Ce type d’utilisation montre bien l’importance dans le VPN d’avoir une authentification forte des utilisateurs. Cette authentification peut se faire par une vérification « login / mot de passe », par un algorithme dit « Tokens sécurisés » (utilisation de mots de passe aléatoires) ou par certificats numériques.</li>
        </ul>
      </p>

    </div>

</div>


  <div class="div_white">

    <h2 class="insider_titles_black">b) L’intranet VPN</h2>
    <p class = "text_black">
      L’intranet VPN est utilisé pour relier au moins deux intranets entre eux. Ce type de réseau est particulièrement utile au sein d’une entreprise possédant plusieurs sites distants. Le plus important dans Ce type de réseau est de garantir la sécurité et l’intégrité des données. Certaines données très sensibles peuvent être amenées à transiter sur le VPN (base de données clients, informations financières…). Des techniques de cryptographie sont mises en œuvre pour vérifier que les données n’ont pas été altérées. Il s’agit d’une authentification au niveau paquet pour assurer la validité des données, de l’identification de leur source ainsi que leur non-répudiation. La plupart des algorithmes utilisés font appel à des signatures numériques qui sont ajoutées aux paquets. La confidentialité des données est, elle aussi, basée sur des algorithmes de cryptographie. La technologie en la matière est suffisamment avancée pour permettre une sécurité quasi parfaite. Le coût matériel des équipements de cryptage et décryptage ainsi que les limites légales interdisent l’utilisation d’un codage « infaillible » Généralement pour la confidentialité, le codage en lui-même pourra être moyen à faible, mais sera combiné avec d’autres techniques comme l’encapsulation Ip dans Ip pour assurer une sécurité raisonnable.
    </p>

  

    <h1 class="big_titles_black">Les caractéristiques d’un bon VPN</h1>
      <p class = "text_black">
        Un système de VPN doit pouvoir mettre en œuvre les fonctionnalités suivantes :
      </p>

      <ul>
        <li class="list_black">Authentification d’utilisateur. Seuls les utilisateurs autorisés doivent pouvoir s’identifier sur le réseau virtuel. De plus, un historique des connexions et des actions effectuées sur le réseau doit être conservé.</li>

        <li class="list_black">Gestion d’adresses. Chaque client sur le réseau doit avoir une adresse privée. Cette adresse privée doit rester confidentielle. Un nouveau client doit pouvoir se connecter facilement au réseau et recevoir une adresse.</li>

        <li class="list_black">Cryptage des données. Lors de leurs transports sur le réseau public les données doivent être protégées par un cryptage efficace.</li>

        <li class="list_black">Gestion de clés. Les clés de cryptage pour le client et le serveur doivent pouvoir être générées et régénérées.</li>

        <li class="list_black">Prise en charge multiprotocole. La solution VPN doit supporter les protocoles les plus utilisés sur les réseaux publics en particulier Ip.</li>
      </ul>

      <p class = "text_black">
        Le VPN est un principe : il ne décrit pas l’implémentation effective de ces caractéristiques. C’est pourquoi il existe plusieurs produits différents sur le marché dont certains sont devenus standard, et même considérés comme des normes.
      </p>


  <h1 class="big_titles_black">Les protocoles d’un VPN</h1>
    <p class = "text_black">
      Nous pouvons classer les protocoles que nous allons étudier en deux catégories:
    </p>

    <ul class="">
      <li class="list_black">Les protocoles de niveau 2 comme PPTP et L2TP. (Dépendant du protocole PPP)</lo>
      <li class="list_black">Les protocoles de niveau 3 comme IPSec ou MPLS.</li>
    </ul>

</div>


  <div class='go_to_exercises_div'>
    <a id="bouton_exo" href="network_exercise.php" title="exercise"> Install your own vpn !</a>
  </div>

</body>

</html>
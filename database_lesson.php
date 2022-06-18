<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="stylesheet.css">
      <title> CyberSecuritySchool-Databases </title>

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




  

  <div class="div_white">

      <h1 class="big_titles_black"> What is database? </h1>

      <p class="text_black">
        A database is a way to centralize data and to stock it on a computer which can be accessible online for external users (then called a server). Stocking data is nowadays inevitable, it can be used for industries, games, websites, or data backups and through a wide range of application. 
        The data are there structured to be stored efficiently without useless repetition. To enter and retrieve data from this database, we use a software called a DBMS (Database Management System) which can interact with the database and change or access its content. Here are some examples of DBMS: MySQL, Oracle, SQL Server, or Microsoft Access.
      </p>

        <div id="database_what_img_div">
          <img src="Image/database_what.jpg" id="database_what_img" alt="Image of a database">
        </div>

      <p class="text_black">
        Databases are widely used in today’s world to massively stock data and they are everywhere which make them a potential target possibly containing sensitive data.
        For example, databases of big groups are often attacked and if they are compromised, they can be encrypted, deleted, or sold on the dark web. These attacks can be used by someone or a group to make money through ransom or a sell online or even try to harm a company. With the loss of their data, big companies can fall pretty quickly, it then come in handy to know how these attacks work and how to be protected against them.
      </p>

  </div>


  <div class="div_blue">

      <h1 class="big_titles_white">The possible breaches</h1>
      <p class="text_white">
        This list of attack is non exhaustive, there is plenty of possible attack and the list evolve constantly when new vulnerabilities are discovered and potentially exploited. We will then try here to understand the most used and famous attacks.
      </p>

        <ul class="list_white">
          <li class="list_white"> <b>Cloud database configuration errors</b><br/>
              This attack result from a potential bad configuration of a client of its cloud environment and there is thousands a possible mistakes. These bad configurations can lead to a security breach which can be exploited to retrieve data stored on a cloud. For example, the <a class="database_lesson_links" href="https://www.darkreading.com/cloud/capital-one-breach-affects-100m-us-citizens-6m-canadians" target="_blank">Capital One data breach</a> in 2019 caused the leak of 100 million credit cards of customers because of a misconfiguration in the firewall of the store.</li><br/>

          <li class="list_white"><b>SQL injection </b><br/>
              The SQL injections are a type of attack which inject sql query into a user input on a website to corrupt its normal function and access other data in the database. There is several way and goals for this attack, but we can see two different attacks: the access by corruption of HTTP request (first order) and the injection in a user input (second order). <br/>
              This kind a attack is still, most of the times on small business with a small budget for security. However, the <a href="https://www.theguardian.com/technology/2019/oct/25/7-eleven-fuel-app-data-breach-exposes-users-personal-details" target="_blank" class="database_lesson_links" >7-Eleven breach</a> shows this kind of vulnerability can even happen to big groups. The practical exercise of this section will be about SQL injection and their internal functioning.</li><br/>

              <div id="sql_injection_1_div">
                <img src="Image/sql_injection_1.gif" id="sql_injection_1" alt="Illustration SQL injection">
              </div>

          <li class="list_white"><b>Weak authentication </b><br/>
              We can divide this type into 3 different types:
              <ol start="1">
                <li>Brute force: automation of connection attempts to try a lot a password or username until the connection is successful and the password/username is found.</li>
                <li>Insufficient Authentication: Lack of authentication leading to easy access to sensitive data on a website.</li>
                <li>Weak password recovery validation: allow someone to recover or change another user’s password without enough verification.</li>
              </ol></li><br/>

          <li class="list_white"><b>Privilege abuse </b><br/>
              On a DMBS, there is a thing name privileges. The owner of the database will give authorization to some users which will need to access or modify database. With these users having privileges more or less important we can easily imagine that a hacker could access a computer and use the privileges to have access to the database. An insider could also use his privileges for malicious purposes. <br/>
              This kind of vulnerability comes often with social engineering breach(phishing). Indeed, this kind of attack is easier, people behind the computer are often bigger breach than the system they work with. The 2017 <a href="https://www.darkreading.com/threat-intelligence/anthem-hit-with-data-breach-of-18-580-medicare-members" target="_blank" class="database_lesson_links" >Anthem Breach</a> shows us and insider can be as much a danger as an outsider attacker.</li><br/>

          <li class="list_white"><b>Denial of Service (DoS) </b><br/>
              To stay simple, a DoS attack send a lot of requests to a targets server to saturate it. The goal of this attack is not the data but to slow or take down a website to cause harm to a company, an organization or even a country. <br/>
              The current variation of this attack is the DDOS (Distributed Denial of Service). This technique now uses a lot of previously hacked computers to send requests at the same time to saturate the servers.<br/>
              In March 2022, a “massive” DDoS attack temporarily took down the Israeli government websites. </li><br/>

            <div id="ddos_illustration_1_div">
              <img src="Image/ddos_illustration_1.png" id="ddos_illustration_1" alt="Illustration DDOS attacks">
            </div>

        </ul>

  </div>


  <div class="div_white">
    <h1 class="big_titles_black">Secure your database </h1>

    <p class="text_black">


    </p>
      <ul>
        <li class="list_black">Check regularly for breach/mistakes.</li><br/>
        <li class="list_black">Queries can be prepared to avoid injections</li><br/>
        <li class="list_black">The more the users have privileges and the more the access must be protected.</li>
      </ul>

  </div>


  <div class='go_to_exercises_div'>
    <a id="bouton_exo" href="database_exercise.php" title="exercise"> Discover sql injection !</a>
  </div>

</body>

</html>
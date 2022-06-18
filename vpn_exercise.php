<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title> CyberSecuritySchool </title>

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
	<div class="div_white">
		<h1  class="big_titles_black">Installation of a VPN</h1>
		
		<p class="text_black">
		For this practical part, we will install a software named « OpenVpn » which will allow us to use a free and public-code VPN.</p>
			<ul>
			<li class="list_black">1.	First, follow this link to go on the website : https://openvpn.net/client-connect-vpn-for-windows/</li>
			<li class="list_black">2.	Next, click on the download OpenVpn button, it should start to download a file in .msi format.</li>
			<li class="list_black">3.	When the download is finished, you can double-click on the file and launch the installation once you accepted the terms of use.</li>	
				<div class="VPN_exercise_installation_1_2">
					<img class = "vpn_img_step1_2" src="Image/installation_step1.png" alt="Step 2 of the installation process" >
					<img class ="vpn_img_step1_2" src="Image/installation_step2.png" alt="Step 3 of the installation process" >
				 </div>
			<li class="list_black">4.	Once the installation is completed, you can launch the software and access the main page. You should see something like this:</li>
				<div class ="VPN_exercise_installation_process">
					<img src="Image/main_page.png" alt="Step 4 : Main page" >
				 </div>
			<li class="list_black">5.	The next step is to add a server to which we will connect. To find this server, click this link: https://www.vpnbook.com/freevpn. In the middle block of this website, you will find a list of available free server configured with OpenVpn protocol. Choose one of these Vpn and click on the link, it will download the files of the server.</li>
				<div class ="VPN_exercise_installation_process">
					<img src="Image/download_site.png" alt="Step 5 : Adding a server" >
				 </div>
			<li class="list_black">6.	The link you clicked on will download a zip folder with different files ovpn inside.</li>
				<div class ="VPN_exercise_installation_process">
					<img src="Image/download_files.png" alt="Step 6 : VPN files  " >
				</div>
		
		
		
	</div>
	
	
	<div class="second_part_vpn_exercise">
		<p class = "text_white">
			These files are the different ports available and the protocol they use. Without going too much into details, it’s better to use the port 80 with the tcp protocol (the first file in the list). Tu use this vpn, go back on OpenVpn, click on the file tab and browse the wanted file you just downloaded.</br>
		</p>	
			<div class ="VPN_exercise_setting_process">
				<img src="Image/setting_port.png" alt="Step 7 : Setting the port" >
			</div>
			
		<p class = "text_white">
			You can get the username and the password on the VpnBook page:</br>
		</p>
			<div class ="VPN_exercise_setting_process">
				<img src="Image/username_password.png" alt="Step 6 : Username and Password" >
			</div>
			
		<p class = "text_white">
			And finally, you can finish by clicking on connect and there you go, your VPN is installed and ready to use. You can use it just by clicking on it.
		</p>
            <div class ="VPN_exercise_setting_process">
				<img src="Image/VPN_added.png" alt="Step 6 : Congrats you're VPN is added" >
			</div>
		</p>
			
			
			
			
			
			
	</div>
</body>


    </body>

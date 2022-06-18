<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css"/>

      <title> CyberSecuritySchool-Networks </title>

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


  <div><h1 class="big_titles_black">The OSI model</h1></div>

  <div id="ddiv_white_network_part1">

    <div id="network_parallel_text_div">

      <p class="text_black">
        The OSI model was created in 1984. It is a norm that detail how computers should communicate altogether. This model is built in layers, each of them representing a defined   role to achieve a communication. All in all, there is 7 layers in this model. <br/>
        Layer and role:
      </p>

        <ul class="list_black">
          <li class="list_black">First layer: “Physical”</li>
          <li class="list_black">Second layer: “Data link”</li>
          <li class="list_black">Third layer: “Network”</li>
          <li class="list_black">Fourth layer: “Transport”</li>
          <li class="list_black">Seventh layer: Application</li>
        </ul>

      <p class="text_black">
        As you can see there is two layers missing on the above list. This is not a mistake, this due to the fact that the OSI model is only a theoretical model, and that internet is nowadays using the TCP/IP model which doesn’t use the 6th and 7th layer.
      </p>

      <p class="text_black">
        The use of the OSI model have some rules: this is a norm so every devices on the network have to respect this norm. Every layer also have to be independent and can only communicate with an adjacent layer.
      </p>
    </div>

      <div id="network_lesson_osi_model_div">
        <img src="Image/osi_model_2.png" id="network_lesson_osi_model" alt="Osi model">
      </div>

  </div>


  <div class="div_blue">

    <h1 class="big_titles_white">The first layer: Physical </h1>

    <p class="text_white">
      His role is to have a physical communication material, this layer will transmit electrical signals carrying information in binary (0 and 1). At first, this layer was using coaxial cables and it was progressively replaced with twisted cables (see RJ45 connectors). These connectors are connected to a hub or a switch to distribute the information. The networks created can be organized in different ways as respectively: in bus topology, in ring topology and in star topology.
    </p>

      <div id="all_topology_pictures">

        <div id="network_types_local_network_div1">
          <img src="Image/network_types_local_network_1.png" id="network_types_local_network_1" alt="Token bus topology">
        </div>
  
        <div id="network_types_local_network_div2">
          <img src="Image/network_types_local_network_2.png" id="network_types_local_network_2" alt="Token ring topology">
        </div>
  
        <div id="network_types_local_network_div3">
          <img src="Image/network_types_local_network_3.png" id="network_types_local_network_3" alt="Token star topology">
        </div>

      </div>

  </div>



  <div class = "div_white">

    <h1 class= "big_titles_black">The second layer: Data link</h1>

    <p class="text_black">
      The goal of this layer is now to link devices together and establish communication between these devices on a local network. 
      This layer uses an identifier which is called “MAC address”. This address identifies a specific device on the network and even in the world as the address come with your network card and then it will be unique. To finish about the MAC address, it is programmed on 6 octets (=48 bits) in hexadecimal, it looks like that:
    </p>

      <div id="network_example_mac_adress_div">
        <img src="Image/network_example_mac_adress.png" id="network_example_mac_adress" alt="Example mac adress">
      </div>

    <p class="text_black">
      There are several languages used by second layer but the most used is the Ethernet protocol. The goal of this language is to establish a shared language between the devices with probably different OS. Then, devices will share messages called packets, they contain:
    </p>

      <ul class="list_black">
        <li class= "list_black"> Sender's adress</li>
        <li class= "list_black"> Receiver's adress </li>
        <li class = "list_black"> The message </li>
      </ul>

    <p class="text_black">
      In this format, defined by the ethernet protocol:
    </p>

      <div id="network_example_packet_div">
        <img src="Image/network_example_packet.png" id="network_example_packet" alt="Example packet">
      </div>

    <p class="text_black">
      That’s a simplified scheme, the real packet will already contain several other elements, it will rather look like something like this:
    </p>

      <div id="network_example_packet_div_2">
        <img src="Image/network_example_packet_2.png" id="network_example_packet_2" alt="Example complete packet">
      </div>

    <p class="text_black">
      We invite you to search by yourself to learn more about these new elements =).
      Before we move on, there is one more thing to see: the broadcast address. This is a special layer 2 adress which allows us to send a message to every network card on our network in one time. Every one of the devices that receive a message with this address will consider the message is for him. This is the broadcast address:  ff:ff:ff:ff:ff:ff, every one of its bit is equal to one. <br/>
      This last information will be useful for the practical part!
    </p>


  </div>



  <div class="div_blue">

    <h1 class="big_titles_white">Third layer: Network </h1>
    
    <p class="text_white">
      The task of the third layer is to interconnect the networks. On internet, all networks are interconnected, then to join a specific network you will have to find a path. This is what allows the third layer, you can move through the networks by “jumping” between one another to join a specific network.
    </p>

      <div id="network_example_layer3_div">
        <img src="Image/network_example_layer3.png" id="network_example_layer3" alt="Image layer 3 network">
      </div>
 
    <p class="text_white">
      You can see a path example by entering “tracert example.com” into your windows terminal.
      The third layer use a new address, the internet protocol (IP) idress. This adress is programmed on 4 octets (=32 bits). Originally, this address is written in binary but to make it easier for humain, it is written in decimal number like 192.168.10.1. The interval is between 0.0.0.0 and 255.255.255.255.
      But there is a second address: the mask. This second address always comes with the IP and design the network part of the IP and the machine part of the IP.
      For example: Here the mask is 255.255.0.0 and the IP 192.168.0.1.
    </p>

      <div id="network_example_ip_mask_div">
        <img src="Image/network_example_ip_mask.png" id="network_example_ip_mask" alt="IP and mask_example">
      </div>
 
    <p class="text_white">
      The complete address above can be written 192.168.0.1/255.255.0.0 or 192.168.0.1/16 (16 being the number of bits equal to 1).
    </p>



    <h2 class="insider_titles">The router</h2>

      <p class="text_white">
        This type of device is used in layer 3 to steer the packets to the network they are sent to. <br/>
        Here are the types of packets the router receives (layer 3 information were added):
      </p>

        <div id="network_router_example_packet_div">
          <img src="Image/network_router_example_packet.png" id="network_router_example_packet" alt="Example packet raceived by router">
        </div>

      <p class="text_white">
        The router will relay them after he deleted the layer 2 information. Your computer will then keep a table, named routing table that will keep the destination addresses and the router gateway to pass by to access the destination. This table will speed up the recurrent connection to some addresses.
      </p>

        <div id="network_example_table_routage_div">
          <img src="Image/network_example_table_routage.png" id="network_example_table_routage" alt="Example routing table">
        </div>

      <p class="text_white">
        The router will be the link between networks:
      </p>

        <div id="network_example_router_linking_div">
          <img src="Image/network_example_router_linking.png" id="network_example_router_linking" alt="Example routing table">
        </div>

      <p class="text_white">
        We can note that the third layer used some other protocol such as ARP or ICMP, but we will not explain them here.
      </p>

  </div>


  <div class="div_white">

    <h1 class="big_titles_black">Fourth and seventh layer: Transport & application </h1>

    <div id="network_ports">
      <p class="text_black">
        The role of this layer is to allow application to communicate between them on internet. For a server/client application we need a server that will listen the networks and requests and a client is a program that will connect to a service to use it (for example a mail service as outlook). Nowadays the internet mainly uses the concept a server/client. <br/>
        As usual, this layer uses an address: the port. This address is much simpler as it is just a decimal value going from 0 to 65536. It is representing the address of an application on a machine. Some of these ports have specific use and some others a free. For example, the port 80 is dedicated to web servers.
      </p>

      <div id="network_table_reserved_ports_div">
        <img src="Image/network_table_reserved_ports.png" id="network_table_reserved_ports" alt="Example routing table">
      </div>
    </div>

    <p class="text_black">
      The fourth layer mainly uses 2 protocols: TCP and UDP. 
    </p>

      <ul class="list_black">

        <li class="list_black">The first one, TCP, is highly reliable as each packets’ reception must by acknowledged. This protocol is used for mail services, online games or ssh. </li>

        <li class="list_black">On the opposite side, the UDP is very quick but less reliable as packets are just sent as soon as possible. This protocol is used for example, by streaming services as radio, TV, live retransmission…</li>

      </ul>

    <p class="text_black">
      And finally, to finish the cycle, the seventh layer is doing the link between the user and the web. Therefore, it contains “high level” protocols. Its use is directly linked to the transport protocol we choose for layer 4.
    </p>

  </div>


  <div class='go_to_exercises_div'>
    <a id="bouton_exo" href="database_exercise.php" title="exercise"> Learn to scan a network !</a>
  </div>

  </body>

</html>
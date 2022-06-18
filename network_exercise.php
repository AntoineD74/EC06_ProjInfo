<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="stylesheet.css">
      <link rel="stylesheet" href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css"/>

      <title> CyberSecuritySchool-Networks </title>

      <?php
        $light_mode = "";
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







  <?php
    $display_graph = False;

    if(isset($_COOKIE['code']))
    {  //$commande = "python scan_network.py";
      $commande = '"network_scan/dist/scan_network/scan_network.exe"' ;
      $output = shell_exec($commande);

      setcookie("code", "", time()-3600); //deleting the cookie

      $display_graph = True;
    }
  ?>


  <div class="div_white">

    <h1 class="title_goals">Goals of this exercise:</h1>
      <ul class="list_black">
        <li>Use python to exploit the function of the third layer</li>
        <li>Program a network scanner to scan your local network</li>
        <li>Create an inetractive map with your scanned network</li>
        <li>Learn how to launch and use that program</li>
      </ul>
    <p class="text_black">
      It’s better to know python before starting this exercise, but you can always read it to understand the concept and the logic. However if you haven't red the lesson before starting this, it's better to read it <a href="vpn_lesson.php">here</a>, then coming back on this exercice.<br/>
      And here is an example of what we could obtain with this program (a more interactive version of course): 
    </p>


      <div id="networks_example_map_div">
        <img src="Image/example_network_map.png" id="networks_example_map" alt="Example of graph">
      </div>

  </div>


  <div class="div_white">

    <h1 class="big_titles_black">Packages we will use</h1>
    <ul class="list_black">
      <li>scapy: provides us some useful tools to create and manage packets.</li>
      <li>socket: allows us to get information about our connection</li>
      <li>networks: we will use it to create the network.</li>
      <li>pyvis: This last package is the one that will map the network and export it.</li>
      <li>subprocess: this one will allow us to execute CMD lines and retrieve the data.</li>
    </ul>
 
    <img src="Image/networks_packages.png" class="image_centered_white" alt="Packages">
 </div>


 <div class="div_blue">

    <h1 class="big_titles_white">Scan the network</h1>
    <p class="text_white">    
      First, we retrieve the IP addresses of the host and the gateway. We will need this information later.
    </p>

    <div id="network_scan_1_div">
      <img src="Image/networks_scan_1.png" id="network_scan_1" alt="Scanning 1">
    </div>

    <p class="text_white"> 
      Then, thanks to scapy we can create an ARP packet request.
      Next, we create a broadcast request with scapy.Ether() and by changing the argument dst with ‘ff:ff:ff:ff:ff:ff’, the request will be sent to all people on the network.
      We will then use the composition operator “/” to compose our broadcast request, with an upper and a lower layer, that we will send to everyone on the network with the srp() function that send layer 2 packets. We add some argument to that: timeout is the time in minutes before the packets expire and verbose is the number of times the packets will be sent.
    </p>

    <div class="image_centered_blue">
      <img src="Image/networks_scan_2.png" id="network_scan_2" alt="Scanning 2">
    </div>

    <p class="text_white">
      We then sort our results contained in clients into different arays :<br/>
      (Note: you can delete the # before the print to display the information of people you found)
    </p>

    <div class="image_centered_blue">
      <img src="Image/networks_scan_3.png" id="network_scan_3" alt="Scanning 3">
    </div>

  </div>




  <div class="div_white">
    <h1 class="big_titles_black">Mapping the network</h1>

    <p class="text_black">
      And now we can start mapping the network. We start by creating a network with Network() and the characteristics we want as parameters. Right after we create the graph with nx.Grapgh() function.
      The next step is to add a point for our gateway. As there is a chance our gateway doesn’t respond to our broadcast, we will have to always add this point and if his information come up in the clients arrays, we will just ignore it.
      Hence, we enter all complementary information (IP and mac) in the title variable with some html tags to style the result. And finally with create a new node with the add_node() method of the graph with the name of the machine and the title we created. (Notre: we will use this method again later for the other points)
    </p>

      <div class="network_mapping_1_div">
        <img src="Image/networks_mapping_1.png" id="network_mapping_1" alt="Mapping 1">
      </div>

    <p class="text_black">
      By adding a new loop, we can now create a point in the graph for each machine we found (except for the gateway) with its information. If device’s name is too long, we will cut it down to 10 characters.
    </p>

      <div class="network_mapping_2_div">
        <img src="Image/networks_mapping_2.png" id="network_mapping_2" alt="Mapping 2">
      </div>

  </div>


 <div class="div_blue">
    <p class="text_white">
      With the last loop we added all the points to the graph. We can now write a very similar loop to connect all the dots with the add_edge() method. This method takes two arguments, the source point, and the target point.
    </p>

      <div class="network_mapping_3_div">
        <img src="Image/networks_mapping_3.png" id="network_mapping_3" alt="Mapping 3">
      </div>

    <p class="text_white">
      It’s now already time to finalize our program. With from_nx() we take the networkx network and convert it into a pyvis graph. After that, we used repulsion() and toggle_physics() methods to create a more realistic and fluent graph. And finally we export our graph result in an html file with show().
    </p>

      <div class="network_mapping_4_div">
        <img src="Image/networks_mapping_4.png" id="network_mapping_4" alt="Mapping 3">
      </div>

  </div>


  <div class="div_white">
    <h1 class="big_titles_black">Use that program</h1>
    
    <p class="text_black">
      Once you will have rewritten or downloaded the program, you will need to launch it via the CMD terminal of your computer. To learn how to do that, we recreated hereafter a very simple terminal to help you learn basics before you do it on your own computer.
    </p>

    <p class="text_black">
      <u>Goal:</u> The file is in python_program in the Downloads folder, find it and launch this file with :
    </p>  
      <ul class="list_black">
        <li>“cd”: print you current location, “cd + folder_name” name to move to another location.</li>
        <li>“dir”: print the files and folders in the current direction.</li>
        <li>“python + file_name.py”: launch the python program if it is in the current location.</li>
      </ul>

    <p class="text_black">
      New it's your time to shine, good luck !
    </p>

<!-- -------------------------------------------------------Terminal------------------------------------------------ -->
    


<?php
        // $display_graph = False;

        // if(isset($_COOKIE['code']))
        //  {  //$commande = "python scan_network.py";
        //   $commande = '"network_scan/dist/scan_network/scan_network.exe"' ;
        //   $output = shell_exec($commande);

        //     setcookie("code", "", time()-3600); //deleting the cookie

        //     $display_graph = True;
        // }
      ?>

    <!-- <div>    -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

      <div class="terminal">
        <div id="history">
        </div>

        <div class="line">
            <span id="path">C:/&nbsp;&gt;&nbsp;</span>
            <input type="text" id="input">
        </div>
      </div>


      <script>

        $(function() 
        {
          
          let currentPath = "";
          

          // Get content of the cookie with the path name
          let name = "path=";
          let path_in_cookie = "";
          let content_cookie = document.cookie.split(';');
          
          path_in_cookie = content_cookie[0].substring(5);
          
          
          if(path_in_cookie == "")
          {
            currentPath = "C:/";
          }
          else
          {
            currentPath = path_in_cookie;
            $('#path').html(currentPath + '&nbsp;>&nbsp;');

            document.cookie = "path=";  //delete the cookie
          }



            $('.terminal').on('click', function() 
            {
                $('#input').focus();
            });

            $('#input').on('keydown', function search(e) 
            {
                if (e.keyCode == 13) 
                {
              
                  let listRoot = ["Documents", "Downloads", "Desktop"];
                  let listDownloads = ["pdf_infos", "trip_planning", "python_program"];
                  let listPrograms = ["scan_network.py"];
                  


                    // append output to the history
                    $('#history').append($(this).val() + '<br/>');

                    
                    if ($(this).val().substring(0, 3) === 'cd ')          //implementation changement of path with cd
                    {
                      if($(this).val().substring(3, $(this).val().length) === 'Downloads' || $(this).val().substring(3, $(this).val().length ) === 'python_program')    
                      {
                        //path change only if the right folder is chosen
                        if(currentPath === "C:/")
                        {
                    $('#path').html(currentPath + $(this).val().substring(3) + '&nbsp;>&nbsp;');
                    currentPath = currentPath + $(this).val().substring(3);
                        }
                        else
                        {
                          $('#path').html(currentPath + "/" + $(this).val().substring(3) + '&nbsp;>&nbsp;');
                          currentPath = currentPath + "/" + $(this).val().substring(3);
                        }
                          

                          $('#history').append('<br/>');
                          
                      }


                      else if($(this).val().substring(3, $(this).val().length ) === 'Documents' || $(this).val().substring(3, $(this).val().length ) === 'Desktop')
                      {
                        $('#history').append('&emsp;&emsp;&emsp;&emsp;[+] The program is not in this folder, try another one !' + '<br/> <br/>');
                      }


                      else if($(this).val().substring(3, $(this).val().length ) === '..')
                      {
                        if(currentPath != "C:/")
                        {
                          for(let i = currentPath.length; i>0; i--)
                          {
                            if(currentPath.charAt(i-1) == "/")
                            {
                              break;
                            }
                            else
                            {
                              currentPath = currentPath.slice(0,-1);
                            }
                          }

                          if(currentPath != "C:/"){currentPath = currentPath.slice(0,-1);}  //delete the '/'
                          
                          $('#path').html(currentPath + '&nbsp;>&nbsp;');
                        }
                      }

                      else
                      {
                        $('#history').append('&emsp;&emsp;&emsp;&emsp;[+] Specified path not found !' + '<br/> <br/>');
                      }
                    }

                    else if($(this).val().substring(0, 3) === 'cd')
                    {
                      $('#history').append('&emsp;&emsp;&emsp;&emsp;[+] ' + currentPath + '<br/> <br/>');
                    }



                    else if($(this).val().substring(0, 3) === 'dir')  //print content of a folder with dir
                    {
                let documents = "";

                      if(currentPath === "C:/Downloads")
                      {
                        
                        for(let i in listDownloads)
                        { 
                          documents += '&emsp;&emsp;&emsp;&emsp;';
                          documents += "[+] ";                    
                          documents += listDownloads[i];
                          documents += " <br/>";
                        }
                        $('#history').append(documents + '<br/>');
                      }


                      else if(currentPath === "C:/Downloads/python_program")
                      {
                        
                        for(let i in listPrograms)
                        {
                          documents += '&emsp;&emsp;&emsp;&emsp;';
                          documents += "[+] ";
                          documents += listPrograms[i];
                          documents += " <br/>";
                        }
                        $('#history').append(documents + '<br/>');
                      }

                      else if(currentPath === "C:/")
                      {
                        
                        for(let i in listRoot)
                        {
                          documents += '&emsp;&emsp;&emsp;&emsp;';
                          documents += "[+] ";
                          documents += listRoot[i];
                          documents += " <br/>";
                        }
                        $('#history').append(documents + '<br/>');
                      }
                      
                    }


                    else if($(this).val() === "python scan_network.py" && currentPath === "C:/Downloads/python_program")
                    {
                      document.cookie = "code = 0;";
                      document.cookie = "path=" + currentPath + ";";
                      // document.cookie = ; 
                      location.reload();
                    }

                    else
                    {
                      $('#history').append("&emsp;&emsp;&emsp;&emsp;[+] '" + $(this).val() + "' not recognised as a command or a programm"+ '<br/> <br/>');
                    }

                    // clear the input
                    $('#input').val('');

                }
            });

          var div = $('.terminal');
            div.animate({scrollTop: div[0].scrollHeight}, 10);
        });

      </script>



<!-- -------------------------------------------  Integration of the graph ---------------------------------------- -->
       

       <?php

          if($display_graph)
          {
            echo "And here is what the program gives for the current network: <br/>";
            echo '<br/>';
            echo '<div id="graph">';
              echo '<iframe width="1000" height="800" src="graph.html" id="graph_included"></iframe>';
          echo '</div>';
          }
      ?>



<!-- ----------------------------------------------------------------------------------------------------------------- -->





  <!-- </div> -->



<footer>
</footer>

</body>

</html>
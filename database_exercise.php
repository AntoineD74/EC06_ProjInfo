<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="stylesheet.css">
      <link rel="stylesheet" href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css"/>

      <title> CyberSecuritySchool-Databases </title>
  



      <?php 

        try
        {
            $bdd = new PDO('mysql:host=localhost; dbname=projInfo_database; charset=utf8', 'root', '');     //Connectiion to the database
            // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

      ?>

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


  <?php

    $login= False;
    $register= False;

    $infos= array();
    if(!empty($_POST))                                //Sorting the form's information
    {
        foreach ($_POST as $key => $value) 
        {
            if($key=='submit'){}
            else{$infos[$key]= $value;}

        }

        if($_POST["submit"]=="login"){$login= True;}
        elseif($_POST["submit"]=="register"){$register= True;}
    }

  ?>


  <?php

    $errors= array();

    $name= "";
    $lastName= "";

    if(!empty($_POST))                                      //checking if all form's inputs are filled
    {
        if(!empty($_POST['name'])) 
        {
            $username = trim($_POST['name']);
        }
        if(empty($username) && $login==True) 
        {
            $errors['name'] = 'The name is required';
        }

        if(!empty($_POST['lastName'])) 
        {
            $lastName = trim($_POST['lastName']);
        }
        if(empty($lastName) && $login==True) 
        {
            $errors['lastName'] = 'The last Name is required';
        }
    }

  ?>


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

  <h1 class="big_titles_black">SQL injection</h1>

  <p class="text_black">
    This exercise will be about the understanding and the first steps into what’s called the SQL injection. As we’ve seen before there is two types of sql injection: the HTTP request exploitation or the user input injection, the second attack is what we will see today.<br/>

    The goal of this attack is to access data through the connection of the website with the database. We will consider here a simple database containing sensitive information about the employee of a society. To simplify this exercise and to give example of a database structure, here is the database scheme:
  </p>


    <div id="database_our_database_1_div">
      <img src="Image/database_our_database_1.png" id="database_our_database_1" alt="Our database UML">
    </div>

     <div id="database_our_database_2_div">
      <img src="Image/database_our_database_2.png" id="database_our_database_2" alt="Our database table UML">
    </div>

  <p class="text_black">
    &emsp; *This database isn’t protected on purpose, and all data insides are entirely fictive. You can easily protect your database by using prepared queries.
  </p>


  <p class="text_black">
    In a real-life situation, you won’t this scheme and you will have to explore the database all by yourself. <br/>
    Now, we can consider the user input which will be a simple form with two fields to enter: the name and the surname of the employee. In all cases, you will have to fill these two fields, or the form won’t be submitted! We chose to use the surname as second field to simplify this website but, in most case, the second field would be a password field. We will therefore learn here how to bypass the surname or whatever the second field could be (like a password).
    When the form is submitted, the php will send this sql query to the DBMS (database management system):
  </p>

    <p class="sql_injection_request_examples">
      $query = SELECT * FROM employee WHERE name='" . $_POST['name'] . "' AND surname='" . $_POST['lastName'] . "'";
    </p>


  <p class="text_black">
    The $_POST[‘name’] and $_POST[‘surname’] will be replaced with what you entered in the input fields. To corrupt this query, we can enter any name we know to be in the database followed by a #. The query then become:
  </p>

    <p class="sql_injection_request_examples">
      $query = SELECT * FROM employee WHERE name='henri' #’ AND surname=''whatever_you_want";
    </p>


  <p class="text_black">
    In the php, everything after the # will then be considered as a comment and the DBMS will search only result corresponding to the name entered. You can try here with the name henri as previously shown:
  </p>



<!-- --------------------------------------------------------------------------- Form ----------------------------------------------------------------- -->



    <form id="sql_ex" method="post" action="">

      <div class="accountText">Enter your name: <input type="text" id="name_input" name="name" value="<?php echo $name; ?>"></div>

      <?php
          if(!empty($errors['name']) && $login==true)
          {
              echo "<p class='errorMessage'>".$errors['name']."</p>";
          }
          else
          {
              echo '</br>';
          }
      ?>



      <div class="accountText">Enter the last name: <input type="text" id="surname_input" name="lastName"></div>

      <?php
          if(!empty($errors['lastName']) && $login==true) {
              echo "<p class='errorMessage'>".$errors['lastName']."</p>";
          }
          else
          {
              echo '</br>';
          }
      ?>

      <input  type="submit" id="submit" name="submit" value="login">

    </form>


<!-- --------------------------------------------------------Treatement data form----------------------------------------------- -->

    <?php

            if(!empty($_POST) && $login==true)
            {
                if(empty($errors))
                {

                    
                    $request = "";
                    $request = "SELECT * FROM employee WHERE name='" . $_POST['name'] . "' AND surname='" . $_POST['lastName'] . "'";

                    echo 'This request is being sent to mySQL: &emsp; '.$request. '<br/>';
                    echo '<br/> And here the result mySQL returned: <br/>';
                    
                    $req = $bdd -> query($request);

                    echo '<div id=results_display>';


                        $i=0;
                        while($result = $req->fetch())
                        {
                            $i++;
                            foreach ($result as $key => $value) 
                            {
                                if(!is_numeric($key))
                                {
                                    // echo $i;
                                    // if($i!=1){echo '    ,jkhgf';}
                                    echo $key.":".$result[$key]. '  ';
                                }
                            }

                            echo '<br/>';   
                        }

                        if($i==0)
                        {
                            echo 'No results found in the database !';
                        }
                    
                    echo '</div>';
               


                    $req ->closeCursor(); 
                }

                else{}
            }

        ?>


<!-- --------------------------------------------------------------------------------------------------------------------------- -->
    
    <p class="text_black">
      In that case it’s not a big vulnerability. But, on an online seller, that kind of vulnerability could lead to someone connecting as everyone he wants and buying things with registered bank information.
    </p>

    <p class="text_black">
      We can now try to go further. Here we can already connect as another user. Let’s now try to get the list of all employees in the database. To do so, we need to insert another query joined with the already existing one using the keywords UNION ALL. As example:
    </p>

      <p class="sql_injection_request_examples">
        SELECT * FROM employee WHERE name='Henri' UNION ALL SELECT * FROM employee #' AND surname='fhj'
      </p>


    <p class="text_black">
     You can try this in the same form as before. <br/>
    </p>

    <p class="text_black">
     <u>To go further</u>: You can continue to explore the database by yourself. Here are some ideas to try:
    </p>

      <ul class="list_black">
        <li class="list_black">Get all employee with a random name OR and 1=1.</li>
        <li class="list_black">See the tables in the database with show TABLES.</li>
        <li class="list_black">Use JOINT LEFT to get bank details information of one or all employees.</li>
        <li class="list_black">Get a list of all employees and their status with right joint.</li>
      </ul>


  </div>


<footer>
</footer>

</body>

</html>
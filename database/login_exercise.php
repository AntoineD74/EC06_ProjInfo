 
<html>

    <link rel="stylesheet" href="/EC06-ProjInfo/stylesheet.css">


    <?php 
                try
                {
                    $bdd = new PDO('mysql:host=localhost; dbname=projInfo_database; charset=utf8', 'root', '');
                    // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }

                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
    ?>



    <?php
        $login= False;
        $register= False;

        $infos= array();
        if(!empty($_POST))
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

                if(!empty($_POST)) 
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
                    echo $request;
                    
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
                                    echo $i;
                                    if($i!=1){echo '    ,jkhgf';}
                                    echo $key.":".$result[$key]. '  ';
                                }
                            }   
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


</html>
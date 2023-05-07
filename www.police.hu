<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="first.css"> 
    </head>

    <body>

        <h2>KALMÁR JÁNOS</h2>
        <h2 class="neptun">VEX8FB</h2>
        

        <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "adatok";
            // Kapcsolat letrehozasas
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Kapcsolat check
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
           // echo "Connected successfully<br>";

            
            // Formhoz tartozo php
            $usernameErr = $passwordErr = "";
            $login_username = $login_password = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["login_username"])) {
                $usernameErr = " *Felhasználónév kötelező";
            } else {
                $login_username = $_POST["login_username"];
               // echo $login_username;
            }
            
            if (empty($_POST["login_password"])) {
                $passwordErr = " *Jelszó kötelező";
            } else {
                $login_password =$_POST["login_password"];
               // echo $login_password;
            }
            }

            // --VISSZAFEJTES--

            $long_string = "";
            $myfile = fopen("password.txt", "r") or die("Unable to open file!");
            // Output one character until end-of-file
            while(!feof($myfile)) 
            {
                $long_string = $long_string .fgetc($myfile);
               // echo fgetc($myfile);
            }
            fclose($myfile);
           // echo $long_string;

            $myfile_write = fopen("decrypted.txt", "w") or die("Unable to open file!");
            $i = 0;
            $values = array();
            while ($i < strlen($long_string)) {
                $num = ord($long_string[$i]);
                array_push($values, $num);
               // echo $num. ", ";
                $i++;
                
            }

           // print_r ($values);
            
            $up_to_five = 0;
            $other_array = array();
            $n = 0;

            foreach ($values as $value) {
               // echo $up_to_five. "<br>";
                $asd = 0;
                if ($value == 10) {
                    array_push($other_array, 500);
                    $up_to_five = 0;
                    continue;
                }
                
                switch ($up_to_five) {
                    case 0:
                        $n = $value - 5;
                        array_push($other_array, $n);
                        break;
                    case 1:
                        $n = $value + 14;
                        array_push($other_array, $n);
                        break;
                    case 2:
                        $n = $value -31;
                        array_push($other_array, $n);
                        break;
                    case 3:
                        $n = $value + 9;
                        array_push($other_array, $n);
                        break;
                    case 4:
                        $n = $value - 3;
                        array_push($other_array, $n);
                        $up_to_five = 0;
                        $asd = $asd - 1;
                        break;
                    default:

                  }

                  if ($asd == 0) {
                    $up_to_five++;
                  }
                  
                  
            }

           // echo "<br><br>";
           // print_r($other_array);

            foreach ($other_array as $v) {
                if ($v == 500) {
                    fwrite($myfile_write, chr(10));
                }
                else {
                    fwrite($myfile_write, chr($v));
                }
                
            }
    
            
            fclose($myfile_write);


            //--FELHASZNALONEV ES JELSZO KULCSERTEKPAR--

            $line= "";
            $temp_array = array();
            $key_value = array();
            $file = fopen("decrypted.txt", "r") or die("Unable to open file!");
            // Output one character until end-of-file
            while(!feof($file)) 
            {
                $line = fgets($file);
                $temp_array = explode("*", $line);
                //echo $temp_array[0]. ", " .$temp_array[1];
                if (count($temp_array) != 2) {
                    break;
                }
                $tempvar = $temp_array[1];
                $key = $temp_array[0];
                $valuee = substr_replace($tempvar,"",-1);
               // echo $key. "," .$valuee. ",";
                $key_value[$key] = $valuee;
            }
        
            fclose($file);

           // print_r($key_value);
            //--FELHASZNALONEV JELSZO EGYEZIK-E--
            $wrongpassword_counter = 0;
            $wrongusername_counter = 0;
            foreach($key_value as $k => $v) {
                if ($login_password != "" and $login_username != "") {
                    if ($login_password == $v and $login_username == $k) {
                        break;
                    }
                    if ($login_password != $v) {
                        $wrongpassword_counter++;
                        
                    }
                    if ($login_username != $k) {
                        $wrongusername_counter++;
                    }

                }
            }

            $username_problem = "";
            $password_problem = "";


            if ($wrongpassword_counter == count($key_value)) {
                echo "<h3>Hibás jelszó!</h3>";
                header("refresh: 3; url=http://www.police.hu");
                exit();
                
            }
            if ($wrongusername_counter == count($key_value)) {
                $username_problem = " *Nincs ilyen felhasználó";
            }
            
            // --SQL FOLYTATÁS--
            if ($login_password != "" and $login_username != "" and $wrongusername_counter != count($key_value)) 
            {
            
                if ($login_username == "katika@gmail.com") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='katika@gmail.com'";
                }
                elseif ($login_username == "arpi40@freemail.hu") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='arpi40@freemail.hu'";
                }
                elseif ($login_username == "zsanettka@hotmail.com") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='zsanettka@hotmail.com'";
                }
                elseif ($login_username == "hatizsak@protonmail.com") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='hatizsak@protonmail.com'";
                }
                elseif ($login_username == "terpeszterez@citromail.hu") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='terpeszterez@citromail.hu'";
                }
                elseif ($login_username == "nagysanyi@gmail.hu") {
                    $sql = "SELECT Titkos FROM tabla WHERE Username='nagysanyi@gmail.hu'";
                }
                else {
                    # code...
                }

                $red = $green = $yellow = $blue = $black = $white = "";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    if ($row["Titkos"] == "piros") {
                        $red = '<img src="496-main.jpg" alt="red" class="the_image">';
                        echo $red;
                    }
                    elseif ($row["Titkos"] == "zold") {
                        $green = '<img src="what-colors-make-light-green.jpg" alt="green" class="the_image">';
                        echo $green;
                    }
                    elseif ($row["Titkos"] == "sarga") {
                        $yellow = '<img src="Benjamin-Moore-Sunshine-bffa6a6682a84af0aaaf7a3c532d5f2d.jpg" alt="yellow" class="the_image">';
                        echo $yellow;
                    }
                    elseif ($row["Titkos"] == "kek") {
                        $blue = '<img src="NEW-BLUE-1-superJumbo.jpg" alt="blue" class="the_image">';
                        echo $blue;
                    }
                    elseif ($row["Titkos"] == "fekete") {
                        $black = '<img src="mancha-color-negro.png" alt="black" class="the_image">';
                        echo $black;
                    }
                    elseif ($row["Titkos"] == "feher") {
                        $white = '<img src="10148-large_default.jpg" alt="white" class="the_image">';
                        echo $white;
                    }
                    else {
                        # code...
                    }
                    }
                }
                else {
                    echo "NEMJO";
                }
            
            }    

            $conn->close();

        ?>

        <div class="form">
            <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
                <div class="textarea">
                <label for="fname">Felhasználónév:</label>  
                <input type="text" name="login_username" class="text"">
                <span class="error"><?php echo $usernameErr;?></span>
                <span class="error"><?php echo $username_problem;?></span>
                <div class="secondline">
                <label for="pass">Jelszó:</label>  
                <input type="password" name="login_password" class="text">
                </div>
                <span class="error"><?php echo $password_problem;?></span>
                <span class="error"><?php echo $passwordErr;?></span>
                </div>
                <input type="submit" name="submit" value="Bejelentkezés" class="login_button">
                
            </form>
        </div>

    </body>
</html>
<!DOCTYPE html>
<html>
    <body>
        <?php
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


            



        ?>
    </body>
</html>
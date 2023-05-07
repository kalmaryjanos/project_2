<!DOCTYPE html>
<html>
    <body>
        <?php
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
            echo $key. "," .$valuee. ",";
           // print_r($temp_array);
            $key_value[$key] = $valuee;
        }

        /*
        foreach($key_value as $x => $x_value) {
            echo "Key=" . $x. ", Value=" . $x_value. "todo";
            echo "<br>";
          }
        */

       

       
        fclose($file);
        
        ?>
    </body>
</html>
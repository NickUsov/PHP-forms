<?php
    $country = $_GET['country'];

    if($country != ''){
        $open = 0;
        if(file_exists('dictionary.txt')){
            $fo = fopen('dictionary.txt', 'r');
            while($line = fgets($fo))
            {
                if(trim($line) == $_GET['country']){
                    $open = 1;
                    break;
                }
            }
            fclose($fo);
        }
        if($open == 1){
            if(file_exists('countries.txt')){
                $fr = fopen('countries.txt', 'r');
                $flag = 0;
                while($line = fgets($fr))
                {
                    if(trim($line) == $_GET['country']){
                        $flag = 1;
                        break;
                    }
                }
                fclose($fr);
                if($flag == 0){
                    $fa = fopen('countries.txt', 'a');
                    fwrite($fa, $_GET['country'].PHP_EOL);
                    fclose($fa);
                }
            }
            else{
                $fp = fopen('countries.txt', 'w');
                fwrite($fp, $_GET['country'].PHP_EOL);
                fclose($fp);
            }
        }
    }

    if(file_exists('countries.txt')){
        $fp = file('countries.txt');
        $str = '<select form="form" id="select">';
        for($i = 0; $i < count($fp); $i++)
        {
            $str .= sprintf('<option value="%s">%s</option>', $i, $fp[$i]);
        }
        $str .= '</select>';
        echo $str;
    }
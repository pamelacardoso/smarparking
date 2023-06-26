<?php

    function data_convert ($date){
        if (!strstr($date, '/')){
            sscanf($date, '%d-%d-%d', $y, $m, $d);
            return sprintf('%02d/%02d/%04d', $d, $m, $y);
        } 
        else {
            sscanf($date, '%d/%d/%d', $d, $m, $y);
            return sprintf('%02d-%02d-%04d',  $y, $m, $d);
        }

        return false;
    }
?>
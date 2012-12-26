<?php
/**
 * Created by JetBrains PhpStorm.
 * User: italianpride15
 * Date: 10/19/12
 * Time: 4:38 AM
 * To change this template use File | Settings | File Templates.
 */

//function borrowed from http://php.net/manual/en/book.simplexml.php

    //no flat - for log parser
    function toArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);

        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = toArray($value);
        }

        return $array;
    }
?>
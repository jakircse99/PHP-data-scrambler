<?php

//encryption

function encryptData($text,$key) {
    $mainKey = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $data = '';
    $length = strlen($text);
    for($i = 0; $i < $length; $i++) {
        $currentChar = $text[$i];
        $position = strpos($mainKey, $currentChar);
        
        if($position !== false) {
            $data .= $key[$position];
        }else {
            $data .= $currentChar;
        }
    } return $data;
}

//decryption

function decryptData($text,$key) {
    $mainKey = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $data = '';
    $length = strlen($text);
    for($i = 0; $i < $length; $i++) {
        $currentChar = $text[$i];
        $position = strpos($key, $currentChar);
        
        if($position !== false) {
            $data .= $mainKey[$position];
        }else {
            $data .= $currentChar;
        }
    } return $data;
}
<?php

function allowedCharactersTest($str) {

    $modifiedStr = strtolower($str);
    
    $allowed = "abcdefghijklmnopqrstuvwxyz1234567890- '@.";
    
    for($i = 0; $i < strlen($modifiedStr); $i++) {
        
        $character = $modifiedStr{$i};
        $isValid = (strpos($allowed, $character) !== false);
        
        if ($isValid === false) {
            return false;
        }
    }
    
    return true;
}

function maxLengthTest($str, $maxLength = 75) {
    return (strlen($str) < $maxLength);
}

function minLengthTest($str, $minLength = 2) {
    return (strlen($str) > $minLength);
}

?>
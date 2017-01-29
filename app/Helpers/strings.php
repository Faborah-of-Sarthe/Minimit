<?php

/**
 * Strongify a part of a string
 */
function strongify($needle, $haystack)
{
    $pos = strpos(strtolower($haystack), strtolower($needle));

    if ($pos !== false){
        $nbChar = strlen($needle);
        $elementToStrongify = substr($haystack, $pos, $nbChar);
        $haystack = str_replace($elementToStrongify, "<strong>".$elementToStrongify."</strong>", $haystack);
    }

    return $haystack;
}


 ?>

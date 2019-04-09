<?php
if (!function_exists('assoc')) {

    function assoc(&$parentArray, $key)
    {
        $newArray = [];
        foreach ($parentArray as $v => $array) {
            $newArray[$array[$key]][] = $array;
        }
        $parentArray = $newArray;
    }
}
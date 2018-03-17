<?php
/**
 * Validation for player input.
 * Users: Elizabeth Kanzler, Jarod Bose
 * Date: 2/21/2018
 */

function validName($name){
    if(strlen($name) <= 0){
        return "Names must be at least one character long!";
    }
    elseif(preg_match("/[\W]/", $name)){
        return "Names can not contain special characters!";
    }
    else return "Name is valid";
}
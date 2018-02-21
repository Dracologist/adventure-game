<?php
/**
 * Validation for player input.
 * Users: Elizabeth Kanzler, Jarod Bose
 * Date: 2/21/2018
 */

function validName($name){
    return strlen($name) > 0;
}

function validGender($gender){
    return $gender == "male" || $gender == "female" || $gender == "other";
}
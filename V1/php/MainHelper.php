<?php
//Function to check if a field is set and not empty
function checkFilled($input)
{
    if (isset($input) && !empty($input) && $input != "") {
        return true;
    } else {
        return false;
    }
}

//Function to check text inputs on special characters and lenght
function checkIndexUrl($input)
{
    $regex = "/^[0-9a-zA-Z\?\=\&]{1,}$/";
    if (preg_match($regex, $input)) {
        return false;
    } else {
        return true;
    }
}
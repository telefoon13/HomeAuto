<?php
$on = $_POST['onoffswitch'];
$id = $_POST['spotId'];
if($on == "on"){
    $on = true;
    $color = $_POST['color'];
} else {
    $on = false;
}
include_once("php/hue.php");
$update = updateLight($id, $on,$color);
if ($update == "200"){
    echo "OK";
    header('Location: index.php?page=hueSpots');
} else {
    echo $update;
}
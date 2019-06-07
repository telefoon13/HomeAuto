<?php
include_once("php/hue.php");

$on = $_POST['onoffswitch'];
$update = 600;
if($on == "on"){
    $on = true;
    $color = $_POST['color'];
} else {
    $on = false;
}

if (checkFilled($_POST['spotId'])){
	$id = $_POST['spotId'];
	$update = updateLight($id,$on,$color);
} elseif (checkFilled($_POST['groupId'])){
	$id = $_POST['groupId'];
	$update = updateGroup($id,$on,$color);
} else {
	header('Location: index.php');
}

if ($update == "200"){
    echo "OK";
    header('Location: index.php?page=hueSpots');
} else {
    echo $update;
}
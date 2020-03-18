<?php
include_once("homeAssistant.php");
postStateEntity("input_boolean.voordeurbel","on");
header("Location: http://192.168.178.207/index.php?page=camera&camid=4");
?>
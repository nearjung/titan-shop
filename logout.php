<?php
session_start();
include_once("include/config.php");
session_destroy();
$api->go("index.php");
?>
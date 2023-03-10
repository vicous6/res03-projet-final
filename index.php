<?php 
session_start();
require "autoload.php";

//  var_dump($_GET);
$leRouter = new Router();
// unset($_POST);
$leRouter->checkRoute();

?>
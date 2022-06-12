<?php
require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$name = $_GET['oname'];
if(oneAds($name)){
    location("category_add.php");
}
<?php

function conn (){
    return mysqli_connect("localhost","root","","blog");
 }

$info = array(
    "name" => "Daniel Scott",
    "Title" => "Moon",
    "description" => "Make it comes true",
);
$role=["Admin","Editor","User"];

$url = "http://{$_SERVER['HTTP_HOST']}/sample_blog/";

date_default_timezone_set('Asia/Yangon');

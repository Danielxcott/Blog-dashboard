<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once "../core/base.php";
require_once "../core/functions.php";

$sql = "SELECT * FROM Category WHERE 1";

if(isset($_GET['id'])){
    $id = textFilter($_GET['id']);
    $sql .= " AND id = $id";
}

if(isset($_GET['title'])){
    $title = textFilter($_GET['title']);
    $sql .= " title = $title";
}

function categorId ($id){
    $sql = "SELECT * FROM posts WHERE category_id = $id";
    return fetch($sql);
}

$rows = [];
$query = mysqli_query(conn(),$sql);
while($row = mysqli_fetch_assoc($query)){
    $arr = [
        "id" => $row['id'],
        "title" => $row['title'],
        "category" => categorId($row['id']),
    ];
    array_push($rows,$arr);
}

apiOutput($rows);
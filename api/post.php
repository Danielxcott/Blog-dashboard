<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); //it can allow u to fetch any data with difference domains but if you use fetch in javascript you have to use Json.parse(result) in .then -> fetch('link').then(response => response.text).then result => console.log(Json.parse(result)))

 require_once "../core/base.php";
 require_once "../core/functions.php";

 $sql = "SELECT * FROM posts WHERE 1";

if(isset($_GET['id'])){
    $id = textFilter($_GET['id']);
    $sql .= " AND id=$id";
}
if(isset($_GET['limit'])){
    $limit = textFilter($_GET['limit']);
    $sql .= " LIMIT $limit";
}
if(isset($_GET['offset'])){
    $offset = textFilter($_GET['offset']);
    $sql .= " OFFSET $offset";
}


 $rows =[];
 $query = mysqli_query(conn(),$sql);
 while($row = mysqli_fetch_assoc($query)){
    $custom = [
        'id' => $row['id'],
        'title' => $row['title'],
        'category' => category($row['category_id'])['title'],
    ];
    array_push($rows,$custom);
 }
 apiOutput($rows);
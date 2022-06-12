<?php
require_once "base.php";

//commom start
function alert($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql){
    $con = conn();
    if( mysqli_query($con,$sql)){
        return true;
    }else{
        die("query fail: ".mysqli_error($con));
    }
}

function fetch($sql){
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(conn(),$sql);
    $rows=[];
    while($row = mysqli_fetch_assoc($query)){
      array_push($rows,$row);  
    }
    return $rows;
}

function redirect($l){
    header("location:$l");
}

function location($l){
    echo "<script>location.href='$l'</script>";
}

function showTime($time,$format="d-m-y"){
    return date($format,strtotime($time));
}

function counts($table,$condition=1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition ";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function countTableWithId($table){
    $currentId = $_SESSION['user']['id'];
    $sql = "SELECT COUNT(id) FROM $table WHERE user_id = $currentId";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function countTransition($table1,$condition=1){
    $currentId = $_SESSION['user']['id'];
   $sql = "SELECT COUNT(amount) FROM $table1 WHERE $table1.to_user = $currentId AND $condition ";
//    SELECT COUNT(amount) FROM payment WHERE payment.to_user = 2 AND CAST(created_at AS DATE) = "2022-06-11";
   $total = fetch($sql);
   return $total['COUNT(amount)'];
}

function short($str,$length=100){
    return substr($str,0,$length)."...";
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES); //if there is a quote or double quotes in the text, will change it into entities 
    $text = stripslashes($text); //for slashes filter
    return $text;
}
//commom end

//user start
function user($id){
    $sql = "SELECT * FROM users WHERE id=$id";
    return fetch($sql);
    
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

function userUpdate(){
    $id  = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $money = $_POST['money'];
    $sql = "UPDATE users SET name = '$name', role ='$role',money='$money' WHERE id =$id ";
    if(runQuery($sql)){
        location("user_list.php");
      }
}
//user end

//auth start
function register(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password == $cpassword){
        $sPass = password_hash($password,PASSWORD_DEFAULT); //change their password into encrypt code to database
        $sql = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$sPass')";
        if(runQuery($sql)){
         redirect("login.php");
        };
    }else{
        return alert("password don't match");
    }
};

function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_assoc($query);

    if(!$row){
        return alert("Email or Password don't match, please try again."); //verifying email account.
    }else{
        if(!password_verify($password,$row['password'])){
            return alert("Email or Password don't match, please try again."); //verifying password.
        }else{
            session_start();
            $_SESSION['user'] = $row;
            redirect("dashboard.php");
        }
    }
}
//auth end

//category start
function categoryAdd(){
    $title = $_POST['title'];
    $color = $_POST['color'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO category (title,color,user_id) VALUES ('$title','$color','$user_id')";
    if(runQuery($sql)){
        location("category_add.php");
   }

}

function category($id){
    $sql = "SELECT * FROM category WHERE id=$id";
    return fetch($sql);
} 

function categories(){
    $sql = "SELECT * FROM category ORDER BY ordering DESC";
    return fetchAll($sql);
}

function deleteCate($id){
$sql = "DELETE FROM category WHERE id = $id";
 return runQuery($sql);
}

function categoryUpdate(){
    $title = $_POST['title'];
    $id  = $_POST['id'];
    $sql = "UPDATE category SET title='$title' WHERE id=$id";
  if(runQuery($sql)){
    location("category_add.php");
  }    
}
function categoryPin($id){
    $sql = "UPDATE category SET ordering = '0'"; //all ordering turn into 0
    mysqli_query(conn(),$sql);

    $sql = "UPDATE category SET ordering = '1' WHERE id = $id"; 
   return runQuery($sql);
}
function categoryRemovePin($id){
    $sql = "UPDATE category SET ordering = '0' WHERE id = $id" ;
    return runQuery($sql); 
}
//category end

//Post start
function postAdd(){
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,description,user_id,category_id) VALUES ('$title','$description','$user_id','$category_id')";
    if(runQuery($sql)){
        location("post_add.php");
   }
}
function post($id){
    $sql = "SELECT * FROM posts WHERE id=$id";
    return fetch($sql);
} 

function posts($limit=999999){
    if($_SESSION['user']['role']==2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = $current_user_id LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts LIMIT $limit ";
    }
    return fetchAll($sql);
}

function deletePost($id){
$sql = "DELETE FROM posts WHERE id = $id";
 return runQuery($sql);
}

function postUpdate(){
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $id  = $_POST['id'];
    $sql = "UPDATE posts SET title='$title',description='$description',category_id='$category_id' WHERE id=$id";
  if(runQuery($sql)){
    location("post_list.php");
  } 
}
//Post end

//Front pannel start
function fPosts($order_by='id',$orderType='DESC'){
    $sql = "SELECT * FROM posts ORDER BY $order_by $orderType";
    return fetchAll($sql);
}
function fCategories(){
    $sql = "SELECT * FROM category ORDER BY ordering DESC";
    return fetchAll($sql);
}
function fPostsByCate($cate_id,$limit="9999",$post_id=0){
    $sql = "SELECT * FROM posts WHERE category_id = $cate_id AND id != $post_id ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}   
function fSearch($letter){
    $sql="SELECT * FROM posts WHERE title LIKE  '%$letter%' OR description LIKE '%$letter%' ORDER BY id DESC";
    return fetchAll($sql);
}
function fSearchByDate($start,$end){
    $sql="SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}
//Front pannel end

//viewer counts start
    function viewerRecord($userId,$postId,$device){
        $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$userId','$postId','$device')";
        return runQuery($sql);
    }

    function viewerCounts($postId){
        $sql="SELECT * FROM viewers WHERE post_id = $postId";
        return fetchAll($sql);

    }

    function viewers($limit=5){
        $sql="SELECT * FROM viewers ORDER BY created_at DESC LIMIT $limit ";
        return fetchAll($sql);
    }

    function viewerCountByUsers($userId){
        $sql="SELECT * FROM viewers WHERE user_id = $userId";
        return fetchAll($sql);
    }

   
//viewer counts end

//Ads Start
function adsMaker(){
    // $tmpfile = $_FILES['adsimage']['tmp_name'];
    // $savefolder = "assets/img/ads/";
    $oname = $_POST['oname'];
    // $adsimage = $_FILES['adsimage']['name'];
    $adsimage = $_POST['adsimage'];
    $adslink = $_POST['adslink'];
    $adsdatestart = $_POST['adsdatestart'];
    $adsdateend = $_POST['adsdateend'];
    $sql="INSERT INTO ads(owner_name,photo,link,start,end) VALUES ('$oname','$adsimage','$adslink','$adsdatestart','$adsdateend')";
    // move_uploaded_file($tmpfile,$savefolder.$adsimage);
    if(runQuery($sql)){
        location("category_add.php");
   }
}
function ads(){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today' ";
    return fetchAll($sql);
}

//Ads End

//Payment Start
function payNow(){
    $amount = $_POST['amount'];
    $describe = $_POST['description'];
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];

    //From user (-)
    $fromUserDetail = user($from);
    $leftMoney= $fromUserDetail['money'] - $amount;
    
    if($fromUserDetail['money'] >= $amount){
    $sql = "UPDATE users SET money=$leftMoney WHERE id = $from";
    mysqli_query(conn(),$sql);
    //To user (+)
    $toUserDetail = user($to);
    $updateMoney = $toUserDetail['money'] + $amount;
    $sql = "UPDATE users SET money=$updateMoney WHERE id = $to";
    mysqli_query(conn(),$sql);

    //transition table
    $sql = "INSERT INTO payment (from_user,to_user,amount,description) VALUES('$from','$to','$amount','$describe')";
    if(runQuery($sql)){
        location("payment_transfer.php");
    }
    }

}
function transitions(){
    $currentId =  $_SESSION['user']['id'];
    if($_SESSION['user']['id']==0){
        $sql = "SELECT * FROM payment ORDER BY id  DESC";
    }else{
        $sql = "SELECT * FROM payment WHERE from_user = $currentId OR to_user = $currentId ORDER BY id  DESC";
    }
    return fetchAll($sql);
}
function transition($id){
    $sql = "SELECT * FROM payment WHERE id = $id ";
    return fetch($sql);
}
//Payment End

//Dashboard Start
function dPosts($limit=999999){
    if($_SESSION['user']['role']==2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = $current_user_id ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit ";
    }
    return fetchAll($sql);
}
//Dashboard End
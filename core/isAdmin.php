<?php
// if($_SESSION['user']['role'] == 0){
//     return true;
// }else{
//     header("location:index.php");
// }
if($_SESSION['user']['role']!=0){
    header("location:dashboard.php");
}
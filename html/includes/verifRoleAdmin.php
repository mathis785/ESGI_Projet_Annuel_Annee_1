<?php   
   session_start();

   include 'includes/userInfo.php';
   if($role != 2 && $role != 3){
    header('location: index.php');
    exit;
 }
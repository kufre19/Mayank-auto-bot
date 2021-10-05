<?php
session_start();
include 'config.php';

function clear_session($conn){
    $list = "upload/list.csv";
    $filename = $_SESSION['file_name'];
   

    
    if(file_exists($list)) {
        unlink($list);
    } 

    $sql = "TRUNCATE TABLE prepared_list";
    mysqli_query($conn,$sql);

    unset($_SESSION['file_name']);
    unset($_SESSION['tbl_header']);
    unset($_SESSION['get_new_list']);
    


}
clear_session($conn);
header("location:views/index.php");    
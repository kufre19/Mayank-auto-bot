<?php
session_start();


$_SESSION['get_account_number'] = 'show accounts';
$_SESSION['tbl_header'] = array('Id','Account No.','Supplier Name','QBO Names','Sort Code');
if(isset($_SESSION['get_new_list'])){
    unset($_SESSION['file_name']);
    unset($_SESSION['get_new_list']);
}
header("location:views/index.php");

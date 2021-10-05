<?php
session_start();
include 'config.php';

function make_pay_run($conn){

    $sql = "SELECT * FROM prepared_list ";
    $run = mysqli_query($conn,$sql);

    $time = time();
    $name = "files/new_pay_run". $time . ".txt";
    $handle = fopen($name,'w');
    
    $headers = <<<HEADER
    amount_pounds,recipient_name,account_no,sort_code,reference

    HEADER;
    fwrite($handle,$headers);
    while ($row = mysqli_fetch_assoc($run)) {
        
        $new = <<<NEWLINE
        {$row['open_balance']},{$row['payee']},{$row['bank_acc']},{$row['sort_code']},{$row['ref_no']}\n

        NEWLINE;
        fwrite($handle,$new);
        
    }
    fclose($handle);
    $_SESSION['file_name'] = $name;


}

make_pay_run($conn);

function clear_session($conn){
    $list = "upload/list.csv";
    $filename = $_SESSION['file_name'];
   

    
    if(file_exists($list)) {
        unlink($list);
    } 

    $sql = "TRUNCATE TABLE prepared_list";
    mysqli_query($conn,$sql);

    
    unset($_SESSION['tbl_header']);
    unset($_SESSION['get_new_list']);
    


}
clear_session($conn);
header("location:views/index.php");    
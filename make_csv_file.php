<?php
session_start();
include_once 'config.php';



$logged = $_SESSION['logged'];
if($logged != true){
    header("location:index.php");
}


if(isset($_POST['go'])){

    $filetmp = $_FILES["list"]["tmp_name"];
    $filename = $_FILES["list"]["name"];
    $dir = "upload/list.csv";
    move_uploaded_file($filetmp,$dir);
    

    $file1 = fopen($dir,'r');
    // $data = fgetcsv($file1, 1000, ",");

    while (($data = fgetcsv($file1, 1000, ",")) !== FALSE){

        $count = count($data);
       
       
        $payee = $data[0];
        $ref_no = $data[1];
        $due_date = $data[2];
        $open_balance = $data[3];
        $credit = $data[4];
        $payment = $data[5];
        $total = $data[6];
        

        $sql = "INSERT INTO prepared_list (payee,ref_no,due_date,open_balance,credit_applied,payment,total_amount) VALUES('$payee','$ref_no','$due_date','$open_balance','$credit','$payment','$total')";
        $run = mysqli_query($conn,$sql);

    
    }

    function fix_payment($conn){
        $sql = "SELECT id,ref_no FROM prepared_list ";
        $run = mysqli_query($conn,$sql);
        $pattern = array('/\./','/_/');
    
        while($row = mysqli_fetch_assoc($run)){
            $data =  $row['ref_no'];
            $id = $row['id'];
            $string = preg_replace($pattern, '-',$data);
            $sqls = "UPDATE prepared_list SET  ref_no = '$string' WHERE id = '$id' ";
            mysqli_query($conn,$sqls);
    
            
        }
    }
    
    fix_payment($conn);

    function fix_payment_two($conn){
        $sql = "SELECT id,open_balance FROM prepared_list ";
        $run = mysqli_query($conn,$sql);
    
        while($row = mysqli_fetch_assoc($run)){
            $data =  $row['open_balance'];
            $id = $row['id'];
            $string = preg_replace("/,/", '',$data);
            $string = substr($string,1);
            $sqls = "UPDATE prepared_list SET  open_balance = '$string' WHERE id = '$id' ";
            mysqli_query($conn,$sqls);
    
            
        }
    }
    
    fix_payment_two($conn);


    function match_accounts($conn){
        $sql= "select payee from prepared_list ";
        $run = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_assoc($run) ) {
            $payee = $data['payee'];
            $sql2 = "select account_number,sort_code from account_numbers where supplier_name = '$payee' ";
            $run2 = mysqli_query($conn,$sql2);
    
            $acc = mysqli_fetch_assoc($run2);
            $acct = $acc['account_number'];
            $sort = $acc['sort_code'];
            $sql3 = "update prepared_list set bank_acc = '$acct', sort_code = '$sort' where payee = '$payee' ";
            mysqli_query($conn,$sql3);
        }

        $_SESSION['get_new_list'] = "show list";
        $_SESSION['tbl_header'] = array('Id','Amount','Recipient','Account No','Sort Code','refrence');
        // if(isset($_SESSION[''])){
        //     unset($_SESSION['']);
        // }

        if(isset($_SESSION['get_account_number'])){
            unset($_SESSION['get_account_number']);
        }

    
    }
    
    
    match_accounts($conn);




 
    
    



    
    header("location:views/index.php");
    
}


<?php
// include_once 'config.php';

// include 'vendor/autoload.php';



// $file1 = fopen("files/original2.csv",'r');
// $row = 1;
// $data = fgetcsv($file1, 1000, ",");

// while (($data = fgetcsv($file1, 1000, ",")) !== FALSE){

//     $count = count($data);
//     // for ($i=0; $i < $count ; $i++) { 
//     //     echo $data[1] . "<br>";
//     //     echo $data[2] . "<br>";
//     //     echo $data[3] . "<br>";
//     //     echo $data[4] . "<br>";
//     // }
//         echo $data[0] . "<br>";
//         echo $data[1] . "<br>";
//         echo $data[2] . "<br>";
//         echo $data[3] . "<br>";
//         echo $data[4] . "<br>";
//         echo $data[5] . "<br>";

//         $payee = $data[0];
//         $ref_no = $data[1];
//         $due_date = $data[2];
//         $open_balance = $data[3];
//         $credit = $data[4];
//         $payment = $data[5];
//         $total = $data[6];
        

//         $sql = "INSERT INTO prepared_list (payee,ref_no,due_date,open_balance,credit_applied,payment,total_amount) VALUES('$payee','$ref_no','$due_date','$open_balance','$credit','$payment','$total')";
//         $run = mysqli_query($conn,$sql);

   
// }


// function fix_payment($conn){
//     $sql = "SELECT id,open_balance FROM prepared_list ";
//     $run = mysqli_query($conn,$sql);

//     while($row = mysqli_fetch_assoc($run)){
//         $data =  $row['open_balance'];
//         $id = $row['id'];
//         $string = preg_replace("/\?/", '',$data);
//         $sqls = "UPDATE prepared_list SET  open_balance = '$string' WHERE id = '$id' ";
//         mysqli_query($conn,$sqls);
//         // for ($i=0; $i < $count; $i++) { 
//         //     $string = preg_replace("/?/", '', $row['open_balance']);
//         //     $sql = "UPDATE prepared_list SET  open_balance = '$string' ";
//         //     $run = mysqli_query($conn,$sql);
//         // }
        
//     }
// }

// fix_payment($conn);


// function make_pay_run($conn){
    
//     $sql = "SELECT * FROM prepared_list ";
//     $run = mysqli_query($conn,$sql);

//     $time = time();
//     $name = "files/new_pay_run". $time . ".txt";
//     $handle = fopen($name,'w');
    
//     $headers = "amount_pounds,recipient_name,account_no,sort_code,reference".PHP_EOL;

   
//     fwrite($handle,$headers);
//     while ($row = mysqli_fetch_assoc($run)) {
//         // ","
//         // $new = <<<NEWLINE
//         // {$row['open_balance']},{$row['payee']},{$row['bank_acc']},{$row['sort_code']},{$row['ref_no']}

//         // NEWLINE;
//         $new = "{$row['open_balance']},{$row['payee']},{$row['bank_acc']},{$row['sort_code']},{$row['ref_no']}".PHP_EOL;
//         fwrite($handle,$new);
        
//     }
//     fclose($handle);


// }



// make_pay_run($conn);


// for($i = 0; $i < $count; $i++){
   
// }




// $sql = "select * from sessionss ";
// $run = mysqli_query($conn,$sql);

// $datas = mysqli_fetch_assoc($run);

// $data = explode("Not available",$datas['copied_text']);
// $new = implode(",",$data);

// $count =  count($data);
// $new2 = explode(",",$new);

// $first = explode(" ",$new2[2]);

// echo $datas['copied_text'];





// $file1 = fopen("files/accounts2.csv",'r');
// $row = 1;
// $data = fgetcsv($file1, 1000, ",");

// while (($data = fgetcsv($file1, 1000, ",")) !== FALSE){

//     $count = count($data);
//     // for ($i=0; $i < $count ; $i++) { 
//     //     echo $data[1] . "<br>";
//     //     echo $data[2] . "<br>";
//     //     echo $data[3] . "<br>";
//     //     echo $data[4] . "<br>";
//     // }
//         echo $data[0] . "<br>";
//         echo $data[1] . "<br>";
//         echo $data[2] . "<br>";
//         echo $data[3] . "<br>";


//         $payee = $data[0];
//         $ref_no = $data[1];
//         $due_date = $data[2];
//         $open_balance = $data[3];
       
        

//         $sql = "INSERT INTO account_numbers (supplier_name,qbo_names,sort_code,account_number) VALUES('$payee','$ref_no','$due_date','$open_balance')";
//         $run = mysqli_query($conn,$sql);

   
//  }

// function match_accounts($conn){
//     $sql= "select payee from prepared_list ";
//     $run = mysqli_query($conn,$sql);
    
//     while ($data = mysqli_fetch_assoc($run) ) {
//         $payee = $data['payee'];
//         $sql2 = "select account_number,sort_code from account_numbers where supplier_name = '$payee' limit 1";
//         $run2 = mysqli_query($conn,$sql2);

//         $acc = mysqli_fetch_assoc($run2);
//         $acct = $acc['account_number'];
//         $sort = $acc['sort_code'];
//         $sql3 = "update prepared_list set bank_acc = '$acct', sort_code = '$sort' where payee = '$payee' ";
//         mysqli_query($conn,$sql3);
//     }

// }


// match_accounts($conn);

echo "/\£/";
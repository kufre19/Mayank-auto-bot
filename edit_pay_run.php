<?php
include 'config.php';

if(isset($_POST)){
    $data = $_POST;
    $id = $data['id'];
    $colunm = $data['column'];
    $new = $data['new_value'];
    

    $sql = "UPDATE prepared_list SET {$colunm} = {$new} WHERE id= {$id} ";
    $run = mysqli_query($conn,$sql);
    if($run){
        echo "update successful";
    }else{
        echo "error occured";
    }
}
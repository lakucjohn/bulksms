<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/23/18
 * Time: 6:28 PM
 */

$CustomerTel = '';
$CustomerID = 0;
$CustomerName = '';

    if(isset($_POST['CustomerPhone'])&&isset($_POST['CustomerId'])){
        $CustomerPhone = $_POST['CustomerPhone'];
        $CustomerId = $_POST['CustomerId'];
        if(!empty($CustomerPhone)&&!empty($CustomerId)){
            $CustomerTel =  $CustomerPhone;
            $CustomerID = $CustomerId;
        }else if(empty($CustomerPhone)&&!empty($CustomerId)){
            $CustomerID = $CustomerId;
        }else if(!empty($CustomerPhone)&&empty($CustomerId)){
            $CustomerTel =  $CustomerPhone;
        }
    }
    if(isset($_POST['CustomerName'])){
        $CustName = $_POST['CustomerName'];
        if(!empty($CustName)){
            $CustomerName = $CustName;
        }
    }


#Getting customer type
$Customer_type_sql = "SELECT pupose FROM visitation_purpose WHERE contact_person='$CustomerTel'";

if($Customer_type_run = mysqli_query($conn, $Customer_type_sql)){
    $rs = mysqli_fetch_assoc($Customer_type_run);
    if ($rs['pupose'] == 1){
        include 'Record.Data/consultation.php';
    }else if($rs['pupose'] ==  2){
        include 'Record.Data/patient-info.php';

    }
}
?>
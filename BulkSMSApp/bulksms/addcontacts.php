<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bulksmsdb';

$conn = new mysqli($hostname, $username, $password, $database);

if(!$conn){
    echo mysqli_error($conn);
}
if(isset($_POST['AddContact'])){
if(isset($_POST['Name']) && isset($_POST['Telephone']) && isset($_POST['Address'])){
    $Name = $_POST['Name'];
    $Telephone = $_POST['Telephone'];
    $Address = $_POST['Address'];

    require_once '../CONTACTS/Contacts/contact.add.php';
    addcontact($Name,$Telephone,$Address);
    if(isset($_POST['Purpose'])){
        $purpose_id = $_POST['Purpose'];
        $formatted_phone = preg_replace('/0/', 256, $Telephone, 1);
        $insert_purpose_sql = "INSERT INTO visitation_purpose(pupose, contact_person) VALUES ($purpose_id,'$formatted_phone')";

        if (!mysqli_query($conn, $insert_purpose_sql)){
            die(mysqli_error($conn));
        }else{
            $Get_Purpose_Name_Sql = "SELECT id,purpose FROM selectable_purpose WHERE id=$purpose_id";

            if($Get_Purpose_Name_run = mysqli_query($conn, $Get_Purpose_Name_Sql)){
                $rs = mysqli_fetch_assoc($Get_Purpose_Name_run);
                if($rs['purpose'] == 'Consultation'){
                    header('Location: Record.Data/consultation.php');
                }else if($rs['purpose'] == 'Antenatal Care'){
                    header('Location: Registration.Forms/Antenatal-Care/index.php');
                }
            }
        }
    }
    $Check_Address_sql = "SELECT address FROM addresses WHERE address='$Address'";
    if($Check_Address_run = mysqli_query($conn,$Check_Address_sql)){
        if(mysqli_num_rows($Check_Address_run)==0){
            $Save_Address_sql = "INSERT INTO addresses(address) VALUES ('$Address')";
            if(!mysqli_query($conn,$Save_Address_sql)){
                die(mysqli_error($conn));
            }
        }
    }

    #header('Location: contacts.php');
    }
    }else{
        header('Location: contacts.php');
}
?>


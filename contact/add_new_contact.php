<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-Requested-With");

#include database and object files
include_once "../config/db_config.php";
include_once "../object/contact.php";
//an array to display response
$response = array();
#instantiate database and object
$database = new Database();
$db = $database->connect();

#initialize object
$contact = new Contact($db);

#set property values
$contact->UserId = $_POST["UserId"];

$Image = $_POST["ContactImage"];
$dir = "contact_images";
if(empty($_POST['ContactImage'])){
    $contact->ContactImage = "https://test.baity.com.br/contact/contact_images/user.webp";
}else{
    $_img = time()."_".rand(1000,9999).".webp";
    $targetDir =  $dir."/".$_img;
    file_put_contents($targetDir, base64_decode($Image));
    $contact->ContactImage = "https://test.baity.com.br/contact/contact_images/".$_img;

}    
    $contact->ContactName = $_POST["ContactName"];
    $contact->ContactEmail = $_POST["ContactEmail"];
    $contact->ContactPhone = $_POST["ContactPhone"];
    $contact->ContactDateBirth = $_POST["ContactDateBirth"];
    $contact->ContactGender = $_POST["ContactGender"];
    $contact->ContactNote = $_POST["ContactNote"];
 
    #create the contact
    if($contact->addNewContact()){
        $response["error"] = false;
        $response["message"] = "Request successfully completed";
    }
    else{
        $response["error"] = true;
        $response["message"] = "Request error";
    }
    echo json_encode($response);    
?>

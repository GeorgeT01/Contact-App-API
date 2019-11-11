<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: X-Requested-With");
#include database and object files
include_once "../config/db_config.php";
include_once "../object/contact.php";
//an array to display response
$response = array();
#instantiate database and contact object
$database = new Database();
$db = $database->connect();

#initialize object
$contact = new Contact($db);

#set user property values
$contact->UserId = $_POST["UserId"];
$res = $contact->readUserContacts();
if($res){
    $response["error"] = false;
    $response["message"] = "Request successfully completed";
    $response["contacts"] = $res;
}else{
    $response["error"] = true;
    $response["message"] = "Request error";
}
echo json_encode($response);   

?>
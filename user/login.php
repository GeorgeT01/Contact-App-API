<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: X-Requested-With");
#include database and object files
include_once "../config/db_config.php";
include_once "../object/user.php";
//an array to display response
$response = array();
#instantiate database and user object
$database = new Database();
$db = $database->connect();

#initialize object
$user = new User($db);

#set user property values
$user->UserEmail = $_POST["UserEmail"];
$user->UserPassword = $_POST["UserPassword"];

if($user->login()){
    $response["error"] = false;
    $response["message"] = "Login successfully completed";
    $response["user_info"] = $user->getUserInfo();
    http_response_code(201);
}else{
    $response["error"] = true;
    $response["message"] = "Login error";
    http_response_code(503);
}
echo json_encode($response);   

?>
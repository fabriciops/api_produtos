<?php

//requied headers

header("Acess-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/product.php';

//get database coonection

$database = new Database();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

//get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set product property values
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->category_id = $data->category_id;

// update the poduct
if($product->update()){

    //set response code - 200 ok
    http_response_code(200);

    //tell the user
    echo json_encode(array("message"=>"Product was updated."));
}

else{

    // 503 service unavailable
    http_response_code(503);

    echo json_encode(array("message"=>"Unable to update Product."));
}

?>



<?php
require_once "../libs/load.php";

$client = new Client();

$id = $client->create([
    "company_id" => 1,
    "name" => $_POST['name'],
    "phone" => $_POST['phone'],
    "email" => $_POST['email'],
    "address" => $_POST['address']
]);

echo json_encode([
  "status"=>"success",
  "client_id"=>$id
]);
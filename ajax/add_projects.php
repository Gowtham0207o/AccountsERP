<?php
require_once "../libs/load.php";

$project = new Project();

$id = $project->create([
    "company_id" => 1,
    "client_id" => $_POST['client_id'],
    "project_name" => $_POST['project_name'],
    "contract_value" => $_POST['contract'],
    "start_date" => $_POST['start'],
    "status" => "open"
]);

echo json_encode([
 "status"=>"success",
 "project_id"=>$id
]);
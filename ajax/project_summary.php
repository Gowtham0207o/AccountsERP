<?php
require_once "../libs/load.php";

$conn = database::get_connection();

$id = $_GET['id'];

$q = $conn->prepare("
SELECT
(SELECT IFNULL(SUM(total_amount),0) FROM invoices WHERE project_id=?) income,
(SELECT IFNULL(SUM(amount),0) FROM site_expenses WHERE project_id=?) expense,
(SELECT IFNULL(SUM(wage_amount),0) FROM labour_entries WHERE project_id=?) labour
");

$q->bind_param("iii",$id,$id,$id);
$q->execute();

$res=$q->get_result()->fetch_assoc();

$res['profit']=$res['income']-($res['expense']+$res['labour']);

echo json_encode($res);
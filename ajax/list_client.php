<?php
require_once "../libs/load.php";

$c=new Client();
echo json_encode($c->all());
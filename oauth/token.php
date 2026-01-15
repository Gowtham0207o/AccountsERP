<?php
require $_SERVER['DOCUMENT_ROOT'] . '/accounts/libs/load.php';

$db = database::get_connection();

$grant = $_POST['grant_type'] ?? '';

if ($grant !== 'authorization_code') {
    http_response_code(400);
    exit('Unsupported grant type');
}

$code      = $_POST['code'] ?? '';
$client_id = $_POST['client_id'] ?? '';

$stmt = $db->prepare("
    SELECT * FROM oauth_authorization_codes
    WHERE code = ?
      AND client_id = ?
      AND expires_at > NOW()
      AND is_used = 0
");
$stmt->bind_param("ss", $code, $client_id);
$stmt->execute();

$auth = $stmt->get_result()->fetch_assoc();
if (!$auth) {
    http_response_code(400);
    exit('Invalid authorization code');
}

$access  = bin2hex(random_bytes(32));
$refresh = bin2hex(random_bytes(32));

$stmt = $db->prepare("
    INSERT INTO oauth_access_tokens
    (user_id, client_id, access_token, expires_at)
    VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 30 MINUTE))
");
$stmt->bind_param("iss", $auth['user_id'], $client_id, $access);
$stmt->execute();

$accessId = $db->insert_id;

$stmt = $db->prepare("
    INSERT INTO oauth_refresh_tokens
    (access_token_id, refresh_token, expires_at)
    VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))
");
$stmt->bind_param("is", $accessId, $refresh);
$stmt->execute();

$db->query(
    "UPDATE oauth_authorization_codes 
     SET is_used = 1 
     WHERE id = {$auth['id']}"
);

header('Content-Type: application/json');
echo json_encode([
    'access_token'  => $access,
    'token_type'    => 'Bearer',
    'expires_in'    => 1800,
    'refresh_token' => $refresh
]);

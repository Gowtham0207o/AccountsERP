<?php
require $_SERVER['DOCUMENT_ROOT'] . '/accounts/libs/load.php';

$header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

if (!preg_match('/Bearer\s(\S+)/', $header, $m)) {
    http_response_code(401);
    exit;
}

$token = $m[1];
$db = database::get_connection();

$stmt = $db->prepare("
    SELECT u.id, u.name, u.email
    FROM oauth_access_tokens t
    JOIN users u ON u.id = t.user_id
    WHERE t.access_token = ?
      AND t.expires_at > NOW()
      AND t.is_revoked = 0
");
$stmt->bind_param("s", $token);
$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();
if (!$user) {
    http_response_code(401);
    exit;
}

$GLOBALS['AUTH_USER'] = $user;

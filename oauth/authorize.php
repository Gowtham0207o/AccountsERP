<?php
require $_SERVER['DOCUMENT_ROOT'] . '/accounts/libs/load.php';

$db = database::get_connection();

$client_id = $_GET['client_id'] ?? '';
$redirect  = $_GET['redirect_uri'] ?? '';

$stmt = $db->prepare(
    "SELECT id FROM oauth_clients
     WHERE client_id = ? AND redirect_uri = ? AND is_active = 1"
);
$stmt->bind_param("ss", $client_id, $redirect);
$stmt->execute();

if (!$stmt->get_result()->fetch_row()) {
    exit('Invalid OAuth client');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';

    $userId = user::authenticate($email, $pass);
    if (!$userId) {
        exit('Invalid credentials');
    }

    $code = bin2hex(random_bytes(32));

    $stmt = $db->prepare("
        INSERT INTO oauth_authorization_codes
        (user_id, client_id, code, expires_at)
        VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))
    ");
    $stmt->bind_param("iss", $userId, $client_id, $code);
    $stmt->execute();

    header("Location: {$redirect}?code={$code}");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
<h3>Hera Accounts Login</h3>
<form method="post">
    <input name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>

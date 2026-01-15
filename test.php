<?php
echo password_hash("Admin@123", PASSWORD_BCRYPT, ['cost' => 12]);
echo "<h1>Welcome to Hera Accounts</h1>";
echo "<p>User: " . htmlspecialchars($GLOALS['AUTH_USER']['name']) . "</p>";
?>
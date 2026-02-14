<?php
/**
 * Accounts Login Page (UI ONLY)
 * -----------------------------
 * - Renders login UI
 * - Sends credentials to central auth system
 * - Does NOT validate passwords
 * - Does NOT create sessions
 */

$error = $_GET['error'] ?? null;

/**
 * After successful login, user will be redirected here
 * This is app-specific and MUST stay in the external app
 */
$redirectTo = '/accounts/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Accounts</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Optional font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="neural-login">
  <div class="neural-bg"></div>

  <div class="neural-panel">

    <div class="neural-header">
      <img src="assets/images/logo.png" alt="Logo">
      <h1>Secure Access</h1>
      <span>Authorized users only</span>
    </div>

    <!-- ERROR MESSAGE -->
    <?php if ($error === 'invalid'): ?>
        <div class="login-error">Invalid email or password</div>
    <?php elseif ($error === 'missing'): ?>
        <div class="login-error">Please fill all required fields</div>
    <?php endif; ?>

    <!-- 🔑 IMPORTANT PART: FORM POSTS TO AUTH SYSTEM -->
    <form
        class="neural-form"
        method="POST"
        action="/auth/public/web_login.php"
    >

      <!-- Redirect target after successful login -->
      <input
          type="hidden"
          name="redirect_to"
          value="<?= $redirectTo ?>"
      >

      <div class="neural-field">
        <input type="email" name="email" required>
        <label>Email</label>
        <div class="neural-line"></div>
      </div>

      <div class="neural-field">
        <input type="password" name="password" required>
        <label>Password</label>
        <div class="neural-line"></div>
      </div>

      <button type="submit" class="neural-btn">
        <span>AUTHENTICATE</span>
        <div class="pulse"></div>
      </button>

    </form>

  </div>
</div>

</body>
</html>

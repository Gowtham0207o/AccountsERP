<?php
require_once __DIR__ . '/libs/load.php';

// 2️⃣ AUTHENTICATION
require_once __DIR__ . '/auth/auth_guard.php';

// 3️⃣ AUTHORIZATION
require_once __DIR__ . '/auth/require_role.php';
require_role_or_redirect(
    ['Developer', 'Owner'],
    '/accounts/test.php'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hera Constructions Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="hera-bg text-light">
<h1>Welcome to Hera Accounts</h1>
<p>User: <?= htmlspecialchars($GLOBALS['AUTH_USER']['name']) ?></p>
<div class="container-fluid">
  <div class="row">
    
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar p-3">
      <h4 class="brand">Hera</h4>
      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Accounts</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Expenses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
      </ul>
    </nav>

    <!-- Main -->
    <main class="col-md-10 ms-sm-auto px-md-4 py-4">
      <h2 class="mb-4">Dashboard</h2>

      <div class="row g-4">
        <div class="col-md-3">
          <div class="card hera-card">
            <div class="card-body">
              <p>Total Balance</p>
              <h4>₹32,45,000</h4>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card hera-card">
            <div class="card-body">
              <p>Income</p>
              <h4>₹12,90,000</h4>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card hera-card">
            <div class="card-body">
              <p>Expenses</p>
              <h4>₹5,84,000</h4>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card hera-card">
            <div class="card-body">
              <p>Transactions</p>
              <h4>142</h4>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

</body>
</html>

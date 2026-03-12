<?php
require_once __DIR__ . '/libs/load.php';
if(isLoggedIn()){
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hera Constructions Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>

  <div class="container-fluid">

    <!-- Sidebar -->
    <nav class="sidebar">
      <div>
        <div class="logo">Hera Vault</div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span class="icon">📊</span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon">💳</span>
              Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon">🏗️</span>
              Projects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon">💸</span>
              Expenses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon">📈</span>
              Reports
            </a>
          </li>
        </ul>
      </div>

      <div class="footer-text">
        <p>© 2024 Hera Constructions</p>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      
      <!-- Header -->
      <header class="header">
        <div class="header-left">
          <h1>Welcome back, Hera Team 👷‍♂️</h1>
          <p>Here's your financial summary of the week</p>
        </div>
        <div class="header-right">
          <div class="notification-btn">🔔</div>
          <div class="date-picker">
            <span>📅</span>
            <span>April 14, 2024 - April 21, 2024</span>
          </div>
        </div>
      </header>

      <!-- Chart Section with Metrics -->
      <section class="chart-section">
        <div class="metrics-row">
          <div class="metric-card">
            <div class="metric-icon balance">💰</div>
            <div class="metric-label">Total Balance</div>
            <div class="metric-value">₹32,495.24</div>
            <div class="metric-change positive">+₹2,607.32 Since last week</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon income">📈</div>
            <div class="metric-label">Income</div>
            <div class="metric-value">₹12,904.17</div>
            <div class="metric-change positive">+15.4%</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon expenses">📉</div>
            <div class="metric-label">Expenses</div>
            <div class="metric-value">₹5,846.12</div>
            <div class="metric-change negative">-8.2%</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon transactions">✓</div>
            <div class="metric-label">Transactions</div>
            <div class="metric-value">142</div>
            <div class="metric-change positive">+12.9%</div>
          </div>
        </div>

        <div class="chart-area">
          <div class="chart-placeholder">
            <div class="chart-line">
              <svg viewBox="0 0 1000 200" preserveAspectRatio="none">
                <defs>
                  <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#3d5afe;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#6c8aff;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#82b1ff;stop-opacity:1" />
                  </linearGradient>
                  <linearGradient id="areaGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" style="stop-color:#6c8aff;stop-opacity:0.5" />
                    <stop offset="100%" style="stop-color:#3d5afe;stop-opacity:0" />
                  </linearGradient>
                </defs>
                <path class="chart-fill" d="M 0,150 L 0,120 Q 100,80 200,100 T 400,90 T 600,70 T 800,85 T 1000,60 L 1000,150 Z" />
                <path class="chart-path" d="M 0,120 Q 100,80 200,100 T 400,90 T 600,70 T 800,85 T 1000,60" />
                <circle class="chart-dot" cx="200" cy="100" r="6" fill="#6c8aff" style="animation-delay: 0.8s;">
                  <animate attributeName="r" values="6;9;6" dur="2s" repeatCount="indefinite"/>
                </circle>
                <circle class="chart-dot" cx="600" cy="70" r="6" fill="#82b1ff" style="animation-delay: 1.2s;">
                  <animate attributeName="r" values="6;9;6" dur="2s" repeatCount="indefinite"/>
                </circle>
                <circle class="chart-dot" cx="1000" cy="60" r="6" fill="#3d5afe" style="animation-delay: 1.6s;">
                  <animate attributeName="r" values="6;9;6" dur="2s" repeatCount="indefinite"/>
                </circle>
              </svg>
            </div>
          </div>
        </div>
      </section>

      <!-- Bottom Panels -->
      <div class="panels-grid">

        <!-- Accounts Panel -->
        <div class="panel">
          <div class="panel-header">
            <h5 class="panel-title">Your Accounts</h5>
            <a href="#" class="view-all">View All →</a>
          </div>
          <div class="accounts-grid">
            <div class="account-card">
              <div class="account-header">
                <div class="account-logo">🏦</div>
                <div class="account-menu">⋮</div>
              </div>
              <div class="account-name">CHASE</div>
              <div class="account-balance">₹15,268.38</div>
              <div class="account-details">
                <span>Chase Bank - 3782</span>
              </div>
            </div>
            <div class="account-card">
              <div class="account-header">
                <div class="account-logo">🏦</div>
                <div class="account-menu">⋮</div>
              </div>
              <div class="account-name">Bank of America</div>
              <div class="account-balance">₹10,526.12</div>
              <div class="account-details">
                <span>Chase Bank - 8120</span>
                <span>--86.01</span>
              </div>
            </div>
            <div class="account-card">
              <div class="account-header">
                <div class="account-logo">💳</div>
                <div class="account-menu">⋮</div>
              </div>
              <div class="account-name">VISA</div>
              <div class="account-balance">₹5,846.12</div>
              <div class="account-details">
                <span>Chase Bank - 9201</span>
                <span>--36.07</span>
              </div>
            </div>
            <div class="add-account-btn">
              <span style="font-size: 1.5rem;">+</span>
              <span>Add Account</span>
            </div>
          </div>
        </div>

        <!-- Transactions Panel -->
        <div class="panel">
          <div class="panel-header">
            <h5 class="panel-title">Recent Transactions</h5>
            <a href="#" class="view-all">View All →</a>
          </div>
          <div>
            <div class="transaction-item">
              <div class="transaction-left">
                <div class="transaction-icon">🍎</div>
                <div class="transaction-info">
                  <div class="transaction-name">Crane Purchase (L&T)</div>
                  <div class="transaction-date">Bank - 3782</div>
                </div>
              </div>
              <div class="transaction-amount negative">-₹1,20,999</div>
            </div>
            <div class="transaction-item">
              <div class="transaction-left">
                <div class="transaction-icon">💳</div>
                <div class="transaction-info">
                  <div class="transaction-name">Payment Received - Client Omega</div>
                  <div class="transaction-date">Bank - 9201</div>
                </div>
              </div>
              <div class="transaction-amount positive">+₹5,00,000</div>
            </div>
            <div class="transaction-item">
              <div class="transaction-left">
                <div class="transaction-icon">🔧</div>
                <div class="transaction-info">
                  <div class="transaction-name">Material Supply - UltraTech</div>
                  <div class="transaction-date">Bank - 2047</div>
                </div>
              </div>
              <div class="transaction-amount negative">-₹49,999</div>
            </div>
            <div class="transaction-item">
              <div class="transaction-left">
                <div class="transaction-icon">🎮</div>
                <div class="transaction-info">
                  <div class="transaction-name">Architect Consultation</div>
                  <div class="transaction-date">Bank - 3201</div>
                </div>
              </div>
              <div class="transaction-amount positive">+₹1,99,999</div>
            </div>
          </div>
        </div>

      </div>

    </main>
  </div>

</body>
</html>
<?php
}else {
  // header('Location: /accounts/login.php');
  var_dump(session_name());
var_dump(session_id());
var_dump($_SESSION);
var_dump(session_id());
exit;

}
?>
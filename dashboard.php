<?php
include 'libs/load.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Neural ERP | Dashboard</title>
<?php load_template("_head");?>

<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container">

<!-- SIDEBAR -->

<?php load_template("_navbar");?>


<!-- MAIN -->

<main class="main" id="main">
<?php load_template("_topbar");?>
<div class="header">
<h1>Dashboard</h1>
<div class="user">Admin</div>
</div>

<!-- KPIs -->

<section class="kpis">

<div class="kpi">
<small>Total Revenue</small>
<h2>₹14,50,000</h2>
</div>

<div class="kpi">
<small>Total Expense</small>
<h2>₹9,10,000</h2>
</div>

<div class="kpi">
<small>Outstanding</small>
<h2>₹2,40,000</h2>
</div>

<div class="kpi">
<small>Net Profit</small>
<h2 class="profit">₹5,40,000</h2>
</div>

</section>

<!-- GRID -->

<section class="grid">

<!-- PROJECT TABLE -->

<div class="card">

<h3>Active Projects</h3>

<table>

<tr>
<th>Project</th>
<th>Client</th>
<th>Status</th>
<th>Profit</th>
</tr>

<tr>
<td>Villa Construction</td>
<td>Ramesh</td>
<td><span class="badge active">Active</span></td>
<td class="profit">₹1.2L</td>
</tr>

<tr>
<td>Apartment Block</td>
<td>Suresh</td>
<td><span class="badge active">Active</span></td>
<td class="profit">₹3.1L</td>
</tr>

</table>

</div>

<!-- RECENT TRANSACTIONS -->

<div class="card">

<h3>Recent Transactions</h3>

<table>

<tr>
<th>Type</th>
<th>Amount</th>
</tr>

<tr>
<td>Invoice Payment</td>
<td class="profit">+ ₹1,50,000</td>
</tr>

<tr>
<td>Cement Purchase</td>
<td class="loss">- ₹65,000</td>
</tr>

<tr>
<td>Labour</td>
<td class="loss">- ₹25,000</td>
</tr>

</table>

</div>

</section>

</main>

</div>

</body>
    <script src="assets/js/main.js"></script>
</html>
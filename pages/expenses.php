<?php require_once "../libs/load.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Expenses</title>

<?php load_template("_head");?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<?php load_template("_navbar"); ?>

<main class="main">

<?php load_template("_topbar"); ?>
<div class="clients-grid">

<!-- ======================
   CASHFLOW KPIs
====================== -->
<div class="client-card">

<h2>Project Cost Pulse</h2>

<table>
<thead>
<tr>
<th>Project</th>
<th>Budget</th>
<th>Spent</th>
<th>Balance</th>
</tr>
</thead>

<tbody>

<tr>
<td>Opulent</td>
<td>₹3,00,000</td>
<td>₹2,10,000</td>
<td class="profit">₹90,000</td>
</tr>

</tbody>

</table>

</div>
<div class="client-card">

<h2>Quick Expense Capture</h2>

<div style="display:grid;grid-template-columns:repeat(5,1fr);gap:12px">

<input type="date">
<input placeholder="Title">
<input type="number" placeholder="Amount">
<select><option>Cash / Bank</option></select>
<input placeholder="Project">

</div>

<button class="btn primary" style="margin-top:12px">Add Expense</button>

</div>
<div class="projects-row">

<div class="project-card">
<small>Cash in Hand</small>
<h2>₹0</h2>
</div>

<div class="project-card">
<small>Monthly Burn</small>
<h2>₹0</h2>
</div>

<div class="project-card">
<small>Inventory Value</small>
<h2>₹0</h2>
</div>

<div class="project-card">
<small>Vendor Dues</small>
<h2 style="color:var(--danger)">₹0</h2>
</div>

</div>
<div class="client-card">

<h3>Spend Velocity</h3>

<div style="display:grid;grid-template-columns:repeat(7,1fr);gap:12px;margin-top:15px">

<div class="project-card">Mon<br>₹0</div>
<div class="project-card">Tue<br>₹0</div>
<div class="project-card">Wed<br>₹0</div>
<div class="project-card">Thu<br>₹0</div>
<div class="project-card">Fri<br>₹0</div>
<div class="project-card">Sat<br>₹0</div>
<div class="project-card">Sun<br>₹0</div>

</div>

</div>


<!-- ======================
   EXPENSE ENTRY
====================== -->

<div class="client-card">

<h2>Add Expense</h2>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:15px">

<input type="date">
<input placeholder="Expense Title">

<select>
<option>Category</option>
<option>Material</option>
<option>Labour</option>
<option>Fuel</option>
<option>Food</option>
<option>Transport</option>
<option>Office</option>
<option>Misc</option>
</select>

<select>
<option>Payment Type</option>
<option>Cash</option>
<option>Bank</option>
<option>UPI</option>
</select>

<input placeholder="Vendor">
<input placeholder="Project / Site">

<input type="number" placeholder="Amount">
<input type="number" placeholder="Paid">

<input type="number" placeholder="Balance">

<select>
<option>Status</option>
<option>Paid</option>
<option>Partial</option>
<option>Pending</option>
</select>

</div>

<textarea placeholder="Notes" rows="3" style="margin-top:12px"></textarea>

<div style="margin-top:12px;display:flex;gap:15px">
<input type="file">
<button class="btn primary">Save Expense</button>
</div>

</div>

<!-- ======================
   INCOME ENTRY
====================== -->

<div class="client-card">

<h2>Record Income</h2>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:15px">

<input type="date">
<input placeholder="Source">
<input type="number" placeholder="Amount">

<select>
<option>Mode</option>
<option>Cash</option>
<option>Bank</option>
<option>UPI</option>
</select>

<input placeholder="Reference">
<input placeholder="Project">

<select>
<option>Status</option>
<option>Received</option>
<option>Pending</option>
</select>

</div>

<button class="btn primary" style="margin-top:15px">Add Income</button>

</div>
<div class="client-card">

<h2>Petty Cash Vault</h2>

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">

<div class="project-card">
<small>Opening</small>
<h3>₹0</h3>
</div>

<div class="project-card">
<small>Used Today</small>
<h3 class="loss">₹0</h3>
</div>

<div class="project-card">
<small>Available</small>
<h3 class="profit">₹0</h3>
</div>

</div>

<div style="margin-top:15px;display:flex;gap:12px">

<input placeholder="Purpose">
<input type="number" placeholder="Amount">

<select>
<option>Debit</option>
<option>Credit</option>
</select>

<button class="btn primary">Update Wallet</button>

</div>

</div>

<!-- ======================
   PETTY CASH
====================== -->

<div class="client-card">

<h2>Petty Cash Wallet</h2>

<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px">

<input type="date">
<input placeholder="Purpose">
<input type="number" placeholder="Amount">

<select>
<option>Type</option>
<option>Credit</option>
<option>Debit</option>
</select>

<input placeholder="Handled By">

</div>

<button class="btn primary" style="margin-top:12px">Update Petty Cash</button>

</div>
<div class="client-card">

<h2>Supplier Liabilities</h2>

<table>
<thead>
<tr>
<th>Vendor</th>
<th>Total</th>
<th>Paid</th>
<th>Pending</th>
</tr>
</thead>

<tbody>

<tr>
<td>ABC Cement</td>
<td>₹12,000</td>
<td>₹8,000</td>
<td class="loss">₹4,000</td>
</tr>

</tbody>

</table>

</div>
<!-- ======================
   VENDOR PAYMENTS
====================== -->

<div class="client-card">

<h2>Vendor Bills & Payments</h2>

<table>
<thead>
<tr>
<th>Vendor</th>
<th>Invoice</th>
<th>Total</th>
<th>Paid</th>
<th>Balance</th>
</tr>
</thead>

<tbody>
<tr>
<td>ABC Cement</td>
<td>INV-22</td>
<td>₹12,000</td>
<td>₹8,000</td>
<td class="loss">₹4,000</td>
</tr>
</tbody>
</table>

</div>

<!-- ======================
   CASHFLOW LEDGER
====================== -->

<div class="client-card">

<h2>Cashflow Ledger</h2>

<table>
<thead>
<tr>
<th>Date</th>
<th>Type</th>
<th>Description</th>
<th>In</th>
<th>Out</th>
</tr>
</thead>

<tbody>

<tr>
<td>24 Feb</td>
<td>Income</td>
<td>Client Payment</td>
<td class="profit">₹10,000</td>
<td>-</td>
</tr>

<tr>
<td>25 Feb</td>
<td>Expense</td>
<td>Steel Purchase</td>
<td>-</td>
<td class="loss">₹4,000</td>
</tr>

<tr>
<td>25 Feb</td>
<td>Petty</td>
<td>Tea</td>
<td>-</td>
<td class="loss">₹150</td>
</tr>

</tbody>

</table>

</div>

</div>
</main>
</div>

</body>
   <script src="../assets/js/main.js"></script>
</html>
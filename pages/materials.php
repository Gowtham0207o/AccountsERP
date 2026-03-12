<?php require_once "../libs/load.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Materials</title>
<?php load_template("_head");?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<?php load_template("_navbar"); ?>

<main class="main">

<?php load_template("_topbar"); ?>
<div class="grid" style="grid-template-columns:2fr 1fr">

<!-- =====================
 EXPENSE ENTRY
===================== -->

<div class="card">

<h2>Add Expense</h2>

<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;margin-top:15px">

<input type="date">

<input placeholder="Expense Title">

<select>
<option>Category</option>
<option>Material</option>
<option>Labour</option>
<option>Transport</option>
<option>Misc</option>
</select>

<input placeholder="Vendor">

<input placeholder="Project">

<select>
<option>Payment Mode</option>
<option>Cash</option>
<option>UPI</option>
<option>Bank</option>
</select>

<input type="number" placeholder="Amount">

<input type="number" placeholder="Paid">

<input type="number" placeholder="Balance">

</div>

<textarea placeholder="Notes" rows="3" style="margin-top:12px"></textarea>

<div style="margin-top:12px;display:flex;gap:12px">
<input type="file">
<button class="btn primary">Save Expense</button>
</div>

</div>

<!-- =====================
 QUICK STATS
===================== -->

<div class="card">

<h3>Expense Summary</h3>

<div class="kpi">
<small>Total Expenses</small>
<h2>₹0</h2>
</div>

<div class="kpi" style="margin-top:15px">
<small>Outstanding</small>
<h2 style="color:var(--danger)">₹0</h2>
</div>

</div>

</div>
<div class="client-card">

<h2>Inventory Health</h2>

<table>
<thead>
<tr>
<th>Item</th>
<th>Stock</th>
<th>Site Issued</th>
<th>Remaining</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<tr>
<td>Cement</td>
<td>120</td>
<td>40</td>
<td>80</td>
<td><span class="badge active">Healthy</span></td>
</tr>

<tr>
<td>Steel</td>
<td>30</td>
<td>25</td>
<td>5</td>
<td><span class="badge closed">Low</span></td>
</tr>

</tbody>

</table>

</div>
<!-- =====================
 INVENTORY MANAGEMENT
===================== -->

<div class="card">

<h2>Inventory</h2>

<div style="display:flex;justify-content:space-between;margin:10px 0">
<input placeholder="Search inventory...">
<button class="btn">+ Add Item</button>
</div>

<table>
<thead>
<tr>
<th>Item</th>
<th>Stock</th>
<th>Unit Cost</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<tr>
<td>Cement</td>
<td>120</td>
<td>₹420</td>
<td><span class="badge active">In Stock</span></td>
</tr>

<tr>
<td>Steel Rod</td>
<td>12</td>
<td>₹580</td>
<td><span class="badge closed">Low</span></td>
</tr>
</tbody>
</table>

</div>

<!-- =====================
 SITE SUPPLY
===================== -->

<div class="grid" style="grid-template-columns:1fr 1fr">

<div class="card">

<h2>Supply to Project Site</h2>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px">

<select>
<option>Select Project</option>
</select>

<select>
<option>Select Item</option>
</select>

<input type="number" placeholder="Quantity">

<input type="date">

</div>

<button class="btn primary" style="margin-top:15px">Dispatch</button>

</div>

<!-- =====================
 INVENTORY PAYMENTS
===================== -->

<div class="card">

<h2>Supplier Payments</h2>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">

<input placeholder="Supplier">
<input placeholder="Invoice No">

<input type="number" placeholder="Total">
<input type="number" placeholder="Paid">

</div>

<button class="btn primary" style="margin-top:15px">Save Payment</button>

</div>

</div>

<!-- =====================
 SUPPLY HISTORY
===================== -->

<div class="card">

<h2>Site Supply History</h2>

<table>
<thead>
<tr>
<th>Date</th>
<th>Project</th>
<th>Item</th>
<th>Qty</th>
</tr>
</thead>

<tbody>
<tr>
<td>24 Feb</td>
<td>Opulent</td>
<td>Cement</td>
<td>20</td>
</tr>
</tbody>

</table>

</div>
</main>
</div>

</body>
   <script src="../assets/js/main.js"></script>
</html>
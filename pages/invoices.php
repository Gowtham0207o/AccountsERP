<?php include "../libs/load.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Invoices</title>
<?php load_template("_head");?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<?php load_template("_navbar"); ?>

<main class="main">

<?php load_template("_topbar"); ?>

<div class="grid" style="grid-template-columns:1fr 1fr">

<!-- =========================
      INVOICE SECTION
========================== -->

<div class="card">

<h2>Create Invoice</h2>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-top:15px">

<input placeholder="Invoice Number">
<input type="date">

<input placeholder="Client Name">
<input placeholder="Client Email">

<input placeholder="Phone">
<input placeholder="GST / Tax ID">

</div>

<hr style="margin:18px 0;border-color:var(--border)">

<h3>Invoice Items</h3>

<table>
<thead>
<tr>
<th>Description</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
</tr>
</thead>

<tbody>
<tr>
<td><input placeholder="Service / Product"></td>
<td><input type="number"></td>
<td><input type="number"></td>
<td>₹0</td>
</tr>

<tr>
<td><input></td>
<td><input type="number"></td>
<td><input type="number"></td>
<td>₹0</td>
</tr>
</tbody>
</table>

<button class="btn" style="margin-top:10px">+ Add Item</button>

<hr style="margin:20px 0;border-color:var(--border)">

<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px">

<textarea placeholder="Notes" rows="4"></textarea>

<div>

<div style="display:flex;justify-content:space-between">
<span>Subtotal</span>
<strong>₹0</strong>
</div>

<div style="display:flex;justify-content:space-between;margin-top:8px">
<span>Tax</span>
<strong>₹0</strong>
</div>

<div style="display:flex;justify-content:space-between;margin-top:8px">
<span>Discount</span>
<strong>₹0</strong>
</div>

<hr style="margin:10px 0;border-color:var(--border)">

<div style="display:flex;justify-content:space-between;font-size:18px">
<span>Total</span>
<strong>₹0</strong>
</div>

<select style="margin-top:12px;width:100%">
<option>Payment Status</option>
<option>Paid</option>
<option>Pending</option>
<option>Overdue</option>
</select>

</div>
</div>

<div style="margin-top:20px;display:flex;gap:12px">
<button class="btn primary">Generate Invoice</button>
<button class="btn">Save Draft</button>
<button class="btn">Download PDF</button>
</div>

</div>

<!-- =========================
      INCOME SECTION
========================== -->

<div class="card">

<h2>Income Records</h2>

<div style="display:flex;justify-content:space-between;margin-top:12px">

<input placeholder="Search income..." style="width:60%">

<label class="btn">
Import CSV / Excel
<input type="file" hidden>
</label>

</div>

<table>
<thead>
<tr>
<th>Date</th>
<th>Source</th>
<th>Amount</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<tr>
<td>12 Feb</td>
<td>Invoice #101</td>
<td class="profit">₹12,000</td>
<td><span class="badge active">Received</span></td>
</tr>

<tr>
<td>14 Feb</td>
<td>Stripe</td>
<td class="profit">₹8,500</td>
<td><span class="badge active">Received</span></td>
</tr>

<tr>
<td>20 Feb</td>
<td>Client Transfer</td>
<td class="loss">₹5,000</td>
<td><span class="badge closed">Pending</span></td>
</tr>

</tbody>
</table>

<hr style="margin:20px 0;border-color:var(--border)">

<h3>Manual Income Entry</h3>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-top:10px">

<input type="date">
<input placeholder="Source">

<input type="number" placeholder="Amount">
<select>
<option>Status</option>
<option>Received</option>
<option>Pending</option>
</select>

</div>

<button class="btn primary" style="margin-top:15px">Add Income</button>

</div>

</div>
</main>
</div>

</body>
   <script src="../assets/js/main.js"></script>
</html>
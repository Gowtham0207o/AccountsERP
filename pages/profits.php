<?php require_once "../libs/load.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Profit</title>

<?php load_template("_head");?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<?php load_template("_navbar"); ?>

<main class="main">

<?php load_template("_topbar"); ?>

<h1>Profit Analysis</h1>

<div class="kpis">

<div class="kpi">
<small>Total Revenue</small>
<h2>₹14.5L</h2>
</div>

<div class="kpi">
<small>Total Expense</small>
<h2>₹9.1L</h2>
</div>

<div class="kpi">
<small>Net Profit</small>
<h2 class="profit">₹5.4L</h2>
</div>

</div>

</main>
</div>

</body>
   <script src="../assets/js/main.js"></script>
</html>
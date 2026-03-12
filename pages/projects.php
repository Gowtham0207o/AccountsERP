<?php require_once "../libs/load.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Projects</title>
<?php load_template("_head");?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<?php load_template("_navbar"); ?>

<main class="main" id="main">

<?php load_template("_topbar"); ?>
<h1>Projects</h1>

<!-- ACTION BAR -->
<div style="display:flex;gap:12px;margin-bottom:20px;margin-top:10px">
   <button class="btn primary" onclick="openProjectWizard()">
<i class="fa fa-plus"></i> New Project
</button>
</div>

<!-- CLIENT → PROJECTS -->

<div class="clients-grid">

  <!-- CLIENT CARD -->
  <div class="client-card">

    <div class="client-header">
      <div>
        <h3>Ramesh Kumar</h3>
        <small>Chennai • 2 Projects</small>
      </div>
      <span class="client-tag">Active</span>
    </div>

    <div class="projects-row">

      <!-- PROJECT CARD -->
      <div class="project-card" onclick="openProjectDetail()">

        <h4>Villa Construction</h4>

        <div class="project-meta">
          <span class="badge active">Active</span>
          <span>₹12L Contract</span>
        </div>

        <div class="project-stats">
          <div>
            <small>Income</small>
            <strong>₹8.2L</strong>
          </div>

          <div>
            <small>Expense</small>
            <strong class="loss">₹7L</strong>
          </div>

          <div>
            <small>Profit</small>
            <strong class="profit">₹1.2L</strong>
          </div>
        </div>

      </div>

    </div>

  </div>

</div>

<div id="projectDetail" style="display:none;margin-top:30px">

<div class="card">

<h2>Villa Construction</h2>

<div class="kpis">
  <div class="kpi"><small>Total Income</small><h2>₹8.2L</h2></div>
  <div class="kpi"><small>Total Expense</small><h2>₹7L</h2></div>
  <div class="kpi"><small>Outstanding</small><h2>₹1L</h2></div>
  <div class="kpi"><small>Profit</small><h2 class="profit">₹1.2L</h2></div>
</div>

<div class="grid">

  <div class="card">
    <h3>Expense Breakdown</h3>
    <canvas id="pieChart"></canvas>
  </div>

  <div class="card">
    <h3>Monthly Cashflow</h3>
    <canvas id="barChart"></canvas>
  </div>

</div>

<div style="margin-top:20px">
  <button class="btn" onclick="openProjectModal()">Edit Project</button>
</div>

</div>
</div>

<!-- ================= MODALS ================= -->

<!-- <div class="modal" id="clientModal">
  <div class="modal-box">
    <h3>Add Client</h3>
    <input placeholder="Client Name">
    <input placeholder="Phone">
    <input placeholder="Email">
    <textarea placeholder="Address"></textarea>
    <button class="btn primary">Save</button>
  </div>
</div>

<div class="modal" id="projectModal">
  <div class="modal-box">
    <h3>Add / Edit Project</h3>
    <input placeholder="Project Name">
    <select>
      <option>Select Client</option>
    </select>
    <input placeholder="Contract Value">
    <input type="date">
    <button class="btn primary">Save</button>
  </div>
</div> -->
<div class="modal" id="projectWizard">

<div class="modal-box large">

<h3>Create Project</h3>

<div class="radio-row">
<label><input type="radio" name="clientMode" checked onchange="switchClientMode('new')"> New Client</label>
<label><input type="radio" name="clientMode" onchange="switchClientMode('existing')"> Existing Client</label>
</div>

<!-- NEW CLIENT -->

<div id="newClientBox">

<input id="nc_name" placeholder="Client Name">
<input id="nc_phone" placeholder="Phone">
<input id="nc_email" placeholder="Email">
<textarea id="nc_addr" placeholder="Address"></textarea>

</div>

<!-- EXISTING CLIENT -->

<div id="existingClientBox" style="display:none">

<input id="clientSearch" placeholder="Search Client" onkeyup="searchClient()">

<div class="search-results" id="clientResults"></div>

</div>

<hr>

<h4>Project Details</h4>

<input id="pname" placeholder="Project Name">
<input id="contract" placeholder="Contract Value">
<input type="date" id="start">

<button class="btn primary" onclick="saveWizard()">Create Project</button>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let selectedClient=null;

function openProjectWizard(){
projectWizard.style.display='flex';
}

function switchClientMode(mode){
newClientBox.style.display=mode=='new'?'block':'none';
existingClientBox.style.display=mode=='existing'?'block':'none';
}

function searchClient(){

fetch('/accounts/ajax/list_clients.php')
.then(r=>r.json())
.then(data=>{
clientResults.innerHTML='';
data.forEach(c=>{
if(c.name.toLowerCase().includes(clientSearch.value.toLowerCase())){
let d=document.createElement('div');
d.innerText=c.name;
d.onclick=()=>{selectClient(c)};
clientResults.appendChild(d);
}
});
});
}

function selectClient(c){
selectedClient=c.id;
clientSearch.value=c.name;
clientResults.innerHTML='';
}

function saveWizard(){

let mode=document.querySelector('input[name=clientMode]:checked').value;

if(mode=='new'){

fetch('/accounts/ajax/add_client.php',{
method:'POST',
headers:{'Content-Type':'application/x-www-form-urlencoded'},
body:`name=${nc_name.value}&phone=${nc_phone.value}&email=${nc_email.value}&address=${nc_addr.value}`
})
.then(r=>r.json())
.then(res=>createProject(res.client_id));

}else{
createProject(selectedClient);
}

}

function createProject(clientId){

fetch('/accounts/ajax/add_project.php',{
method:'POST',
headers:{'Content-Type':'application/x-www-form-urlencoded'},
body:`project_name=${pname.value}&client_id=${clientId}&contract=${contract.value}&start=${start.value}`
})
.then(()=>location.reload());

}
</script>
<script>
function openClientModal(){clientModal.style.display='flex'}
function openProjectModal(){projectModal.style.display='flex'}
function openProjectDetail(){projectDetail.style.display='block'}

window.onclick=e=>{
 if(e.target.classList.contains('modal')) e.target.style.display='none'
}

// PIE
new Chart(pieChart,{
 type:'pie',
 data:{
  labels:['Material','Labour','Site'],
  datasets:[{data:[45,35,20],backgroundColor:['#4c6fff','#ff5c5c','#00ff99']}]
 }
});

// BAR
new Chart(barChart,{
 type:'bar',
 data:{
  labels:['Jan','Feb','Mar','Apr'],
  datasets:[{label:'Cashflow',data:[2,3,1,4],backgroundColor:'#4c6fff'}]
 }
});
</script>

</main>
</div>

</body>
   <script src="../assets/js/main.js"></script>
</html>
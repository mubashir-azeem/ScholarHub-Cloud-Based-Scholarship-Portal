<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn,
"SELECT * FROM scholarships ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>

<title>Scholarships</title>

<style>

body{
    margin:0;
    font-family:Segoe UI,sans-serif;
    background:#eef2f7;
}

.header{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    padding:20px 40px;
}

.container{
    width:90%;
    margin:40px auto;
}

.grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.card h2{
    margin-bottom:15px;
}

.amount{
    color:#16a34a;
    font-weight:bold;
    font-size:20px;
    margin-top:10px;
}

.deadline{
    color:#ef4444;
    margin-top:10px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:8px;
}

.back-btn{
    display:inline-block;
    margin-bottom:25px;
    padding:10px 18px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:600;
}

.back-btn:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="header">
<h1>Available Scholarships</h1>
</div>

<div class="container">

<a href="dashboard.php" class="back-btn">
    ← Back to Dashboard
</a>

<div class="grid">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<h2><?php echo $row['title']; ?></h2>

<p>
<?php echo $row['description']; ?>
</p>

<div class="amount">
PKR <?php echo $row['amount']; ?>
</div>

<div class="deadline">
Deadline:
<?php echo $row['deadline']; ?>
</div>

<a href="apply.php?id=<?php echo $row['id']; ?>" class="btn">
Apply Now
</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>
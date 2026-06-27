<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

if($_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$total_scholarships = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM scholarships"
    )
)['total'];

$total_applications = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM applications"
    )
)['total'];

$total_students = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM users
         WHERE role='student'"
    )
)['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI,sans-serif;
}

body{
background:#f1f5f9;
}

.header{
background:linear-gradient(135deg,#2563eb,#1d4ed8);
color:white;
padding:20px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logout-btn{
background:white;
color:#2563eb;
padding:10px 18px;
text-decoration:none;
border-radius:8px;
font-weight:bold;
}

.container{
padding:40px;
}

.welcome{
margin-bottom:30px;
}

.welcome h1{
font-size:42px;
margin-bottom:10px;
}

.stats{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:25px;
margin-bottom:40px;
}

.card{
padding:30px;
border-radius:20px;
color:white;
}

.blue{
background:#2563eb;
}

.green{
background:#10b981;
}

.orange{
background:#f59e0b;
}

.card h2{
font-size:18px;
margin-bottom:10px;
}

.card p{
font-size:42px;
font-weight:bold;
}

.modules{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:25px;
}

.module{
background:white;
padding:30px;
border-radius:20px;
text-align:center;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.module h2{
margin-bottom:15px;
}

.module p{
margin-bottom:20px;
color:#555;
}

.btn{
display:inline-block;
padding:12px 25px;
border-radius:10px;
text-decoration:none;
color:white;
}

.btn-blue{
background:#2563eb;
}

.btn-green{
background:#10b981;
}

.btn-orange{
background:#f59e0b;
}

</style>

</head>

<body>

<div class="header">

<h2>ScholarHub Admin</h2>

<a href="../logout.php" class="logout-btn">
Logout
</a>

</div>

<div class="container">

<div class="welcome">
<h1>Welcome, <?php echo $_SESSION['name']; ?> 👨‍💼</h1>
<p>Scholarship Management Administration Panel</p>
</div>

<div class="stats">

<div class="card blue">
<h2>Total Scholarships</h2>
<p><?php echo $total_scholarships; ?></p>
</div>

<div class="card green">
<h2>Total Applications</h2>
<p><?php echo $total_applications; ?></p>
</div>

<div class="card orange">
<h2>Total Students</h2>
<p><?php echo $total_students; ?></p>
</div>

</div>

<div class="modules">

<div class="module">

<h2>🎓 Scholarships</h2>

<p>
Add and manage scholarships.
</p>

<a href="manage_scholarships.php" class="btn btn-blue">
    Manage Scholarships
</a>

</div>

<div class="module">

<h2>📄 Applications</h2>

<p>
Review student applications.
</p>

<a href="view_applications.php" class="btn btn-green">
View Applications
</a>

</div>

<div class="module">

<h2>👥 Students</h2>

<p>
Manage registered students.
</p>

<a href="view_students.php" class="btn btn-orange">
    View Students
</a>

</div>

</div>

</div>

</body>
</html>
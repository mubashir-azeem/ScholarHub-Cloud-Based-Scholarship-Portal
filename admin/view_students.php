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

$result = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE role='student'
     ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>

<style>

body{
margin:0;
font-family:Segoe UI,sans-serif;
background:#f1f5f9;
}

.container{
padding:40px;
}

.back-btn{
display:inline-block;
margin-bottom:20px;
text-decoration:none;
font-weight:bold;
color:#2563eb;
}

table{
width:100%;
border-collapse:collapse;
background:white;
border-radius:15px;
overflow:hidden;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

th{
background:#2563eb;
color:white;
padding:15px;
text-align:left;
}

td{
padding:15px;
border-bottom:1px solid #eee;
}

</style>

</head>

<body>

<div class="container">

<a href="dashboard.php" class="back-btn">
← Back to Dashboard
</a>

<h1 style="margin-bottom:25px;">
Registered Students
</h1>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Joined</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
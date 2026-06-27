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

/* DELETE SCHOLARSHIP */

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM scholarships WHERE id='$id'"
    );

    header("Location: manage_scholarships.php");
    exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM scholarships ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Scholarships</title>

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
padding:20px 40px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;
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

.top-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.add-btn{
background:#10b981;
color:white;
padding:12px 20px;
border-radius:10px;
text-decoration:none;
font-weight:bold;
}

.back-btn{
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

.edit-btn{
background:#2563eb;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:8px;
margin-right:5px;
}

.delete-btn{
background:#ef4444;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:8px;
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

<div class="top-bar">

<a href="dashboard.php" class="back-btn">
← Back to Dashboard
</a>

<a href="add_scholarship.php" class="add-btn">
+ Add Scholarship
</a>

</div>

<h1 style="margin-bottom:25px;">
Manage Scholarships
</h1>

<table>

<tr>
<th>ID</th>
<th>Title</th>
<th>Amount</th>
<th>Deadline</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td>PKR <?php echo $row['amount']; ?></td>

<td><?php echo $row['deadline']; ?></td>

<td>

<a
href="edit_scholarship.php?id=<?php echo $row['id']; ?>"
class="edit-btn">
Edit
</a>

<a
href="manage_scholarships.php?delete=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this scholarship?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$query = mysqli_query($conn,"
SELECT
applications.id,
applications.status,
applications.document,
applications.submission_date,
users.name,
users.email,
scholarships.title

FROM applications

JOIN users
ON applications.user_id = users.id

JOIN scholarships
ON applications.scholarship_id = scholarships.id

ORDER BY applications.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Applications</title>

<style>

body{
font-family:Segoe UI;
background:#eef2f7;
padding:40px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
}

th,td{
padding:15px;
border:1px solid #ddd;
}

th{
background:#2563eb;
color:white;
}

.btn{
padding:8px 15px;
color:white;
text-decoration:none;
border-radius:5px;
margin-right:5px;
}

.back-btn{
display:inline-block;
margin-bottom:25px;
text-decoration:none;
color:#2563eb;
font-weight:bold;
font-size:18px;
}

.approve{
background:green;
}

.reject{
background:red;
}

.file-btn{
background:#2563eb;
color:white;
padding:8px 15px;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<a href="dashboard.php" class="back-btn">
← Back to Dashboard
</a>

<h1>Student Applications</h1>

<table>

<tr>
<th>ID</th>
<th>Student</th>
<th>Email</th>
<th>Scholarship</th>
<th>Status</th>
<th>Document</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo ucfirst($row['status']); ?></td>

<td>

<?php
if($row['document'] != "")
{
?>

<a
href="../uploads/<?php echo $row['document']; ?>"
target="_blank"
class="file-btn">
View File
</a>

<?php
}
else
{
    echo "No File";
}
?>

</td>

<td>

<a href="approve.php?id=<?php echo $row['id']; ?>"
class="btn approve">
Approve
</a>

<a href="reject.php?id=<?php echo $row['id']; ?>"
class="btn reject">
Reject
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>
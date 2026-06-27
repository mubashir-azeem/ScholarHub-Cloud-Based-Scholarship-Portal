<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,"
SELECT
applications.*,
scholarships.title
FROM applications
JOIN scholarships
ON applications.scholarship_id = scholarships.id
WHERE applications.user_id='$user_id'
ORDER BY applications.id DESC
");
?>

<!DOCTYPE html>
<html>

<head>
<title>My Applications</title>

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
text-align:left;
}

th{
background:#2563eb;
color:white;
}

.pending{
color:orange;
font-weight:bold;
}

.approved{
color:green;
font-weight:bold;
}

.rejected{
color:red;
font-weight:bold;
}

.back-btn{
    display:inline-block;
    margin-bottom:25px;
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
    font-size:18px;
}



</style>

</head>

<body>

<a href="dashboard.php" class="back-btn">
    ← Back to Dashboard
</a>

<h1>My Applications</h1>

<table>

<tr>
<th>ID</th>
<th>Scholarship</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td class="<?php echo $row['status']; ?>">
<?php echo ucfirst($row['status']); ?>
</td>

<td><?php echo $row['submission_date']; ?></td>

</tr>

<?php } ?>

</table>

</body>

</html>
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

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM scholarships WHERE id='$id'"
);

$row = mysqli_fetch_assoc($query);

$message = "";

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];

    mysqli_query(
        $conn,
        "UPDATE scholarships
         SET title='$title',
             description='$description',
             amount='$amount',
             deadline='$deadline'
         WHERE id='$id'"
    );

    $message = "Scholarship Updated Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Scholarship</title>

<style>

body{
margin:0;
font-family:Segoe UI,sans-serif;
background:#f1f5f9;
}

.container{
width:700px;
margin:50px auto;
}

.card{
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

input,
textarea{
width:100%;
padding:15px;
margin-top:8px;
margin-bottom:20px;
border:1px solid #ddd;
border-radius:10px;
}

textarea{
height:120px;
resize:none;
}

button{
width:100%;
padding:15px;
background:#2563eb;
color:white;
border:none;
border-radius:10px;
font-size:16px;
cursor:pointer;
}

.success{
color:green;
font-weight:bold;
margin-bottom:20px;
}

.back-btn{
display:inline-block;
margin-bottom:20px;
text-decoration:none;
font-weight:bold;
color:#2563eb;
}

</style>

</head>

<body>

<div class="container">

<a href="manage_scholarships.php" class="back-btn">
← Back
</a>

<div class="card">

<h2>Edit Scholarship</h2>

<?php
if($message != "")
{
    echo "<p class='success'>$message</p>";
}
?>

<form method="POST">

<label>Title</label>
<input
type="text"
name="title"
value="<?php echo $row['title']; ?>"
required
>

<label>Description</label>
<textarea
name="description"
required><?php echo $row['description']; ?></textarea>

<label>Amount</label>
<input
type="number"
name="amount"
value="<?php echo $row['amount']; ?>"
required
>

<label>Deadline</label>
<input
type="date"
name="deadline"
value="<?php echo $row['deadline']; ?>"
required
>

<button type="submit" name="update">
Update Scholarship
</button>

</form>

</div>

</div>

</body>
</html>
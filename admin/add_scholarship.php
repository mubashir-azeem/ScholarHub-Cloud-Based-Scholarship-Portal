<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$message = "";

if(isset($_POST['add_scholarship']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO scholarships
            (title, description, amount, deadline)
            VALUES
            ('$title', '$description', '$amount', '$deadline')";

    if(mysqli_query($conn, $sql))
    {
        $message = "Scholarship Added Successfully!";
    }
    else
    {
        $message = "Error Adding Scholarship!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Add Scholarship</title>

<style>

body{
    margin:0;
    font-family:Segoe UI,sans-serif;
    background:#eef2f7;
}

.navbar{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    padding:20px 40px;
    font-size:28px;
    font-weight:bold;
}

.container{
    width:600px;
    margin:40px auto;
}

.card{
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
}

h2{
    text-align:center;
    margin-bottom:30px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

input,
textarea{
    width:100%;
    padding:14px;
    margin-bottom:20px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:16px;
}

textarea{
    height:120px;
    resize:none;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:white;
    font-size:18px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.success{
    text-align:center;
    color:green;
    margin-bottom:20px;
    font-weight:bold;
}

.back-btn{
    display:inline-block;
    margin-bottom:20px;
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="navbar">
    ScholarHub Admin
</div>

<div class="container">

    <a href="dashboard.php" class="back-btn">
        ← Back to Dashboard
    </a>

    <div class="card">

        <h2>Add Scholarship</h2>

        <?php
        if($message != "")
        {
            echo "<div class='success'>$message</div>";
        }
        ?>

        <form method="POST">

            <label>Scholarship Title</label>
            <input type="text" name="title" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <label>Amount (PKR)</label>
            <input type="number" name="amount" required>

            <label>Deadline</label>
            <input type="date" name="deadline" required>

            <button type="submit" name="add_scholarship">
                Add Scholarship
            </button>

        </form>

    </div>

</div>

</body>
</html>
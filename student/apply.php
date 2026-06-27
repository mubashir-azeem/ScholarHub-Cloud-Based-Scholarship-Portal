<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$scholarship_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$message = "";

if(isset($_POST['apply']))
{
    $check = mysqli_query(
        $conn,
        "SELECT * FROM applications
         WHERE user_id='$user_id'
         AND scholarship_id='$scholarship_id'"
    );

    if(mysqli_num_rows($check) > 0)
    {
        $message = "You have already applied.";
    }
    else
    {
        $document = "";

        if(isset($_FILES['document']) && $_FILES['document']['name'] != "")
        {
            $document =
                time() . "_" .
                basename($_FILES['document']['name']);

            move_uploaded_file(
                $_FILES['document']['tmp_name'],
                "../uploads/" . $document
            );
        }

        $sql = "INSERT INTO applications
                (user_id, scholarship_id, document)
                VALUES
                ('$user_id','$scholarship_id','$document')";

        if(mysqli_query($conn,$sql))
        {
            $message = "Application Submitted Successfully!";
        }
        else
        {
            $message = "Error Submitting Application!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Apply Scholarship</title>

<style>

body{
    font-family:Segoe UI,sans-serif;
    background:#eef2f7;
    padding:50px;
}

.card{
    background:white;
    padding:40px;
    border-radius:15px;
    width:550px;
    margin:auto;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h2{
    text-align:center;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:10px;
    font-weight:bold;
}

input[type=file]{
    width:100%;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:14px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.success{
    text-align:center;
    font-weight:bold;
    color:green;
    margin-bottom:20px;
}

.back-btn{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<h2>Apply For Scholarship</h2>

<?php
if($message != "")
{
    echo "<div class='success'>$message</div>";
}
?>

<form method="POST" enctype="multipart/form-data">

<label>
Upload Supporting Document
(CNIC / Transcript / Result Card)
</label>

<input
    type="file"
    name="document"
    required
>

<button
    type="submit"
    name="apply"
>
    Submit Application
</button>

</form>

<a href="view_scholarships.php" class="back-btn">
← Back to Scholarships
</a>

</div>

</body>
</html>
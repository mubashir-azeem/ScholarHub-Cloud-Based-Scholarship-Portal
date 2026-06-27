<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

$query = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$user_id'"
);

$user = mysqli_fetch_assoc($query);

if(isset($_POST['update_profile']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users
            SET name='$name',
                email='$email'
            WHERE id='$user_id'";

    if(mysqli_query($conn,$sql))
    {
        $_SESSION['name'] = $name;
        $message = "Profile Updated Successfully!";

        $query = mysqli_query(
            $conn,
            "SELECT * FROM users WHERE id='$user_id'"
        );

        $user = mysqli_fetch_assoc($query);
    }
    else
    {
        $message = "Error Updating Profile!";
    }
}

if(isset($_POST['change_password']))
{
    $new_password = password_hash(
        $_POST['new_password'],
        PASSWORD_DEFAULT
    );

    $sql = "UPDATE users
            SET password='$new_password'
            WHERE id='$user_id'";

    if(mysqli_query($conn,$sql))
    {
        $message = "Password Updated Successfully!";
    }
    else
    {
        $message = "Error Updating Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>My Profile</title>

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
    font-size:28px;
    font-weight:bold;
}

.container{
    width:600px;
    margin:50px auto;
}

.card{
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
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

input{
    width:100%;
    padding:15px;
    margin-bottom:20px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:16px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:15px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:10px;
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
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

hr{
    margin:40px 0;
    border:0;
    border-top:1px solid #ddd;
}

</style>

</head>

<body>

<div class="header">
    Student Profile
</div>

<div class="container">

    <a href="dashboard.php" class="back-btn">
        ← Back to Dashboard
    </a>

    <div class="card">

        <h2>Update Profile</h2>

        <?php
        if($message != "")
        {
            echo "<div class='success'>$message</div>";
        }
        ?>

        <form method="POST">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="<?php echo $user['name']; ?>"
                required
            >

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="<?php echo $user['email']; ?>"
                required
            >

            <button
                type="submit"
                name="update_profile"
            >
                Update Profile
            </button>

        </form>

        <hr>

        <h2>Change Password</h2>

        <form method="POST">

            <label>New Password</label>

            <input
                type="password"
                name="new_password"
                required
            >

            <button
                type="submit"
                name="change_password"
            >
                Change Password
            </button>

        </form>

    </div>

</div>

</body>
</html>
<?php
session_start();
include("includes/db.php");

$message = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) == 1)
    {
        $user = mysqli_fetch_assoc($query);

        if(password_verify($password,$user['password']))
	{
    	    $_SESSION['user_id'] = $user['id'];
    	    $_SESSION['name'] = $user['name'];
    	    $_SESSION['role'] = $user['role'];

    	if($user['role'] == 'admin')
    	{
           header("Location: admin/dashboard.php");
    	}
    	else
    	{
          header("Location: student/dashboard.php");
    	}

    	exit();
}
        else
        {
            $message = "Invalid Password!";
        }
    }
    else
    {
        $message = "User Not Found!";
    }
}
?>

<?php include("includes/header.php"); ?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card p-4 auth-card">

                <h2 class="text-center mb-4">
                    Portal Login
                </h2>

                <form method="POST">

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-success w-100"
                    >
                        Login
                    </button>

                </form>

                <div class="mt-3 text-center text-danger">
                    <?php echo $message; ?>
                </div>

            </div>

        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>
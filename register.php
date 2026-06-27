<?php
include("includes/db.php");

$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already exists!";
    }
    else
    {
        $query = "INSERT INTO users(name,email,password)
                  VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$query))
        {
            $message = "Registration Successful!";
        }
        else
        {
            $message = "Error!";
        }
    }
}
?>

<?php include("includes/header.php"); ?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card p-4 auth-card">

                <h2 class="text-center mb-4">
                    Student Registration
                </h2>

                <form method="POST">

                    <div class="mb-3">
                        <label>Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required
                        >
                    </div>

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
                        name="register"
                        class="btn btn-primary w-100"
                    >
                        Register
                    </button>

                </form>

                <div class="mt-3 text-center text-success">
                    <?php echo $message; ?>
                </div>

            </div>

        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>
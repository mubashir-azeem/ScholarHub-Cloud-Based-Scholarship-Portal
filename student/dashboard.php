<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$user_id = $_SESSION['user_id'];

$total_applications = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM applications
         WHERE user_id='$user_id'"
    )
)['total'];

$approved = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM applications
         WHERE user_id='$user_id'
         AND status='approved'"
    )
)['total'];

$pending = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM applications
         WHERE user_id='$user_id'
         AND status='pending'"
    )
)['total'];

include("../includes/header.php");
?>

<div class="container mt-4">

    <div class="d-flex justify-content-end mb-3">
        <a href="../logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>

    <div class="mb-4">

        <h1 class="dashboard-title">
            Welcome, <?php echo $_SESSION['name']; ?> 👋
        </h1>

        <p class="text-muted">
            Scholarship Management Dashboard
        </p>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg-blue p-4">

                <h5>Total Applications</h5>

                <h2><?php echo $total_applications; ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg-green p-4">

                <h5>Approved</h5>

                <h2><?php echo $approved; ?></h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg-orange p-4">

                <h5>Pending</h5>

                <h2><?php echo $pending; ?></h2>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card p-4 text-center">

                <h3>🎓 Scholarships</h3>

                <p>Browse available scholarships</p>

                <a href="view_scholarships.php" class="btn btn-primary">
                    View Scholarships
                </a>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card p-4 text-center">

                <h3>📄 Applications</h3>

                <p>Track your submissions</p>

                <a href="my_applications.php" class="btn btn-success">
                    View Applications
                </a>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card p-4 text-center">

                <h3>👤 Profile</h3>

                <p>Manage your account</p>

                <a href="profile.php" class="btn btn-warning">
    		    Update Profile
		</a>

            </div>

        </div>

    </div>

</div>

<?php include("../includes/footer.php"); ?>
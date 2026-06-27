<?php
include("../includes/db.php");

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE applications
 SET status='approved'
 WHERE id='$id'");

header("Location: view_applications.php");
exit();
?>
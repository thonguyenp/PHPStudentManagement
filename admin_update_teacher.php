<?php
    session_start();
    // Nếu cố vào home khi chưa login => trả về login.php
    if (!isset($_SESSION["username"]) or $_SESSION["usertype"] != "admin")
    {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
        include "admin_css.php";
    ?>
    
</head>
<body>

    <!-- Sidebar section -->
    <?php
        include "admin_sidebar.php";
    ?>
    <!-- Sidebar section end -->
    <!-- Main Content -->
    <div class="content">
        <h1>Update Teacher</h1>

    </div>     
    <!-- Main Content -->
</body>
</html>
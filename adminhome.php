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
    <link rel="stylesheet" href="admin.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>
<body>
    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </header>
    <!-- Sidebar section -->
    <aside>
        <ul>
            <li>
                <a href="">Admission</a>
            </li>
            <li>
                <a href="">Add Student</a>
            </li>
            <li>
                <a href="">View Student</a>
            </li>
            <li>
                <a href="">Add Teacher</a>
            </li>
            <li>
                <a href="">View Teacher</a>
            </li>
            <li>
                <a href="">Add Course</a>
            </li>
            <li>
                <a href="">View Course</a>
            </li>
        </ul>
    </aside>
    <!-- Sidebar section end -->
    <!-- Main Content -->
    <div class="content">
        <h1>Sidebar Accordion</h1>
        <p>
            text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>     
    <!-- Main Content -->
</body>
</html>
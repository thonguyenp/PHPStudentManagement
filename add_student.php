<?php
    session_start();
    // Nếu cố vào home khi chưa login => trả về login.php
    if (!isset($_SESSION["username"]) or $_SESSION["usertype"] != "admin")
    {
        header("location: login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    if (isset($_POST["add_student"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $usertype = "student";

        $check = "select * from user where username = '$name'";
        $check_user = mysqli_query($data,$check);
        $row_count = mysqli_num_rows($check_user);
        if ($row_count >= 1)
        {
            echo "<script type='text/javascript'>alert('User has already existed')</script>";
        }
        else 
        {
            $sql = "insert into user (username, email, phone, usertype, password)
                values ('$name', '$email', '$phone', '$usertype', '$password')";
            $result = mysqli_query($data, $sql);

            if ($result)
            {
                echo "<script type='text/javascript'>alert('Data upload successfully')</script>";
            }
            else 
            {
                echo "Data upload failed";
            }
        }
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
    <style>
        label 
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>

    <!-- Sidebar section -->
    <?php
        include "admin_sidebar.php";
    ?>
    <!-- Sidebar section end -->
    <!-- Main Content -->
    <div class="content">
        <center>
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="" method="post">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
        </center>
    </div>     
    <!-- Main Content -->
</body>
</html>
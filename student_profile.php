<?php
    session_start();
    // Nếu cố vào home khi chưa login => trả về login.php
    if (!isset($_SESSION["username"]) or $_SESSION["usertype"] != "student")
    {
        header("location: login.php");
    }

    $host = "localhost";
    $password = "";
    $user = "root";
    $db = "schoolproject";
    $data = mysqli_connect($host,$user,$password,$db);

    $name = $_SESSION["username"];
    $sql = "select * from user where username = '$name'";
    $result = mysqli_query($data, $sql);
    $info = mysqli_fetch_assoc($result);

    if (isset($_POST['update_profile']))
    {
        $s_email = $_POST["email"];
        $s_phone = $_POST["phone"];
        $s_password = $_POST["password"];

        $sql = "update user set email = '$s_email', 
            phone = '$s_phone', password = '$s_password' where username = '$name'";
        $result2 = mysqli_query($data, $sql);
        if ($result2)
        {
            header('location: student_profile.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
        include "admin_css.php";
    ?>
    <style type="text/css">
        label
        {
            font-weight: bold;
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg
        {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
<body>
    <?php
        include "student_sidebar.php";
    ?>
    <!-- Sidebar section end -->
    <!-- Main Content -->
    <div class="content">
        <center>
            <h1>Update Profile</h1>
            <br>
            <form method="post" action="#">
                <div class="div_deg">
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email"value="<?php
                            echo "{$info['email']}";
                        ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone"value="<?php
                            echo "{$info['phone']}";
                        ?>">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="<?php
                            echo "{$info['password']}";
                        ?>">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="update_profile">
                    </div>
                </div>
            </form>
        </center>
    </div>     
    <!-- Main Content -->
</body>
</body>
</html>
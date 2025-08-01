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
    $id = $_GET['student_id'];
    $sql = "select * from user where id = '$id'";
    $result = mysqli_query($data, $sql);
    $info = $result -> fetch_assoc();

    if (isset($_POST['update']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "update user set username = '$name', email ='$email',
                phone = '$phone', password = '$password' where id = '$id'";
        $result2 = mysqli_query($data, $query);
        if ($result2)
        {
            header("location: view_student.php");        
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
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
            font-weight: bold;
        }
        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
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
            <h1>Update Student</h1>
            <div class="div_deg">
                <!-- action="#" là gửi data để xử lí ngay trong cùng 1 file php -->
                <form action="#" method = "post">
                    <div>
                    <label for="">Username</label>
                    <input type="text" name="name" id=""
                    value="<?php
                        echo "{$info['username']}";
                    ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email" id=""
                        value="<?php
                        echo "{$info['email']}";
                    ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="text" name="phone" id=""
                        value="<?php
                        echo "{$info['phone']}";
                    ?>">                   
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" id=""
                        value="<?php
                        echo "{$info['password']}";
                    ?>">
                    </div>                
                    <input class="btn btn-success" type="submit" name="update" value="Update" id="">

                </form>
            </div>
        </center>
    </div>     
    <!-- Main Content -->
</body>
</html>
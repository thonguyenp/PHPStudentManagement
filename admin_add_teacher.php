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

    if (isset($_POST['add_teacher']))
    {
        $t_name = $_POST['name'];
        $t_description = $_POST['description'];
        $file = $_FILES['image']['name'];
        $dst = "./image_teacher/".$file;
        $dst_db = "image_teacher/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);
        $sql = "insert into teacher (name, description, image)
                values ('$t_name', '$t_description', '$dst_db')";
        $result = mysqli_query($data,$sql);
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
        .div_deg
        {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
            font-weight: bold;
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
            <h1>Add Teacher</h1>
            <div class="div_deg">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">Name: </label>
                        <input type="text" name="name" id="">
                    </div>
                    <div>
                        <label for="">Description: </label>
                        <textarea name="description" id=""></textarea>
                    </div>
                    <div>
                        <label for="">Image: </label>
                        <br>
                        <input type="file" name="image" id="">
                    </div>
                    <br>    
                    <div>
                        <input class="btn btn-primary" type="submit" name="add_teacher" value="Add Teacher" id="">
                    </div>

                </form>
            </div>
        </center>
    </div>     
    <!-- Main Content -->
</body>
</html>
<?php
    session_start();
    error_reporting(0);
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

    if ($_GET['teacher_id'])
    {
        $t_id = $_GET['teacher_id'];
        $sql = "select * from teacher where id = '$t_id'";
        $result = mysqli_query($data, $sql);
        $info = $result->fetch_assoc();
    }

    if (isset($_POST['update_teacher']))
    {
        $t_id = $_POST['id'];
        $t_name = $_POST['name'];
        $t_des = $_POST['description'];
        $file = $_FILES['image']['name'];
        $dst = "./image_teacher/".$file;
        $dst_db = "image_teacher/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if ($file)
        {
            $sql2 = "update teacher set name = '$t_name',
                description = '$t_des', image = '$dst_db' where id = '$t_id'"; 

        }
        else
        {
            $sql2 = "update teacher set name = '$t_name',
                description = '$t_des' where id = '$t_id'"; 

        }

        $result2 = mysqli_query($data,$sql2);
        if ($result2)
        {
            echo "Update Successfully";
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
    <style type="text/css">
        label
        {
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form_deg
        {
            background-color: skyblue;
            width: 600px;
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
            <h1>Update Teacher</h1>
            <form enctype="multipart/form-data" class="form_deg" action="admin_update_teacher.php" method="post">
                <input type="text" name="id" value="<?php echo "{$info['id']}";?>" hidden >
                <div>
                    <label for="">Teacher Name</label>
                    <input type="text" name="name"
                    value="<?php
                        echo "{$info['name']}";
                    ?>">
                </div>
                <div>
                    <label for="">About Teacher</label>
                    <textarea name="description" id="" row = "4" >
                        <?php
                        echo "{$info['description']}";
                        ?>
                    </textarea>
                </div>
                <div>
                    <label for="">Teacher Old Image</label>
                    <img width="100px" height="100px" src="<?php
                        echo "{$info['image']}";
                    ?>" alt="">
                </div>
                <div>
                    <label for="">Teacher New Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update_teacher">
                </div>
            </form>
        </center>
    </div>     
    <!-- Main Content -->
</body>
</html>
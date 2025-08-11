<?php
    session_start();
    error_reporting(0);
    // Nếu cố vào home khi chưa login => trả về login.php
    if (!isset($_SESSION["username"]) or $_SESSION["usertype"] != "admin") {
        header("location: login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    $sql = "select * from teacher";
    $result = mysqli_query($data, $sql);

    if ($_GET['teacher_id'])
    {
        $t_id = $_GET['teacher_id'];
        $sql2 = "delete from teacher where id = '$t_id'";
        $result2 = mysqli_query($data,$sql2);

        if ($result2)
        {
            header('location: admin_view_teacher.php');
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
        th {
            padding: 20px;
            font-size: 15px;
            border: 2px solid black;
        }

        td {
            padding: 20px;
            font-size: 15px;
            border: 2px solid black;
            background-color: skyblue;
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
            <h1>View Teacher</h1>
            <table border="1px">
                <tr>
                    <th>Teacher Name</th>
                    <th>About Teacher</th>
                    <th>Teacher Image</th>
                    <th>Delete</th>
                    <th>Update</th>

                </tr>
                <?php
                while ($info = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td>
                            <?php
                            echo "{$info["name"]}";
                            ?>
                        </td>
                        <td>
                            <?php
                            echo "{$info["description"]}";
                            ?>
                        </td>
                        <td>
                            <img height="100px" width="100px" src="<?php
                            echo "{$info["image"]}";
                            ?>" alt="">
                        </td>
                        <td>
                            <?php
                               echo "<a onClick= \"javascript:return confirm ('Are you sure to delete this?')\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </div>
    <!-- Main Content -->
</body>

</html>
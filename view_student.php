<?php
    error_reporting(0);
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

    $sql = "select * from user where usertype = 'student'";
    $result = mysqli_query($data,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
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
            <h1>Student Data</h1>
            <?php
                if ($_SESSION["message"])
                {
                    echo $_SESSION["message"];
                }
                unset($_SESSION["message"]);
            ?>
            <table>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Delete</th>
                </tr>
                <?php
                    while ($info = $result -> fetch_assoc())
                    {

                    
                ?>
                    <tr>
                        <td>
                            <?php
                                echo "{$info["username"]}";
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "{$info["email"]}";
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "{$info["phone"]}";
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "{$info["password"]}";
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "<a onClick=\"javascript:return confirm('Sure to delete this ?')\" href='delete.php?student_id={$info["id"]}'>
                                Delete</a>";
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
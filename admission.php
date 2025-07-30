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
    $sql = "select * from admission";
    $result = mysqli_query($data, $sql);
 
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
    <?php
        include "admin_sidebar.php";
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
        }
    </style>
    <!-- Sidebar section end -->
    <!-- Main Content -->
    <div class="content">
        <center>
            <h1>Applied For Admission</h1>
            <br>
            <table>            
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Phone</th>
                    <th style="padding: 20px; font-size: 15px;">Message</th>
                </tr>
                <?php
                    while ($infor = $result->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td style="padding: 20px;">
                            <?php echo "{$infor["name"]}";?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$infor["email"]}";?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$infor["phone"]}";?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$infor["message"]}";?>
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
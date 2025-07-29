<?php
    $host = "localhost";
    $password = "";
    $user = "root";
    $db = "schoolproject";
    $data = mysqli_connect($host,$user,$password,$db);

    if ($data == false)
    {
        die("Connection Error");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "select * from user where username = '$username' and password = '$password'";
        $result = mysqli_query($data,$sql);
        $row = mysqli_fetch_array($result);

        if ($row["usertype"] == "student")
        {
            header("location: studenthome.php");
        }
        else if ($row["usertype"] == "admin")
        {
            header("location: adminhome.php");
        }
        else 
        {
            echo "Username or Password do not match";
        }


    }
?>
<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    if ($data == false)
    {
        die("Connection Error");
    }

    if (isset($_POST["apply"]))
    {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $sql = "insert into admission (name, email, phone, message)
            values ('$name', '$email', '$phone', '$message')";

        $result = mysqli_query($data, $sql);
        if ($result)
        {
            $_SESSION["message"] = "Your application form is sent";
            header("location: index.php");
        }
        else
        {
            echo "Apply Failed";
        }
    }
?>
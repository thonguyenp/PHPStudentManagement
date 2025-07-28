<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Header -->
    <nav>
        <label class="logo" for="">NTU School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <!-- Header end -->
    <!-- Banner -->
    <div class="section1">
        <label for="" class="img_text">We teach student with Care</label>
        <img class="main_img" src="image/school.png" alt="">
    </div>
    <!-- Banner end -->
    <!-- Intro -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="image/playground.jpg" class="welcome_img" alt="">
            </div> 
            <div class ="col-md-8">
                <h1>Welcome to NTU</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of 
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                    Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </div>
    <!-- Intro end-->

    <!-- Teacher Section -->
    <center>
        <h1>Our Teacher</h1>
    </center>
    <div class="container">
        <div class="row">
            <!-- Teacher 1 -->
            <div class="col-md-4">
                <img class="teacher" src="image/teacher1.png" alt="">
                <p>"eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
            <!-- Teacher 2 -->
            <div class="col-md-4">
                <img class="teacher" src="image/teacher2.png" alt="">
                <p>"eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

            </div>
            <!-- Teacher 3 -->
            <div class="col-md-4">
                <img class="teacher" src="image/teacher3.png" alt="">
                <p>"eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

            </div>

        </div>
    </div>
    <!-- Teacher Section end -->
    <!-- Courses Section -->
    <center>
        <h1>Our Courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <!-- Courses 1 -->
            <div class="col-md-4">
                <img class="teacher" src="image/graphic_design.png" alt="">
                <h3>Graphic Design</h3>
            </div>
            <!-- Courses 2 -->
            <div class="col-md-4">
                <img class="teacher" src="image/digital_marketing.png" alt="">
                <h3>Digital Marketing</h3>
            </div>
            <!-- Courses 3 -->
            <div class="col-md-4">
                <img class="teacher" src="image/web_development.png" alt="">
                <h3>Web Development</h3>
            </div>
        </div>
    </div>
    <!-- Courses Section end -->

    <!-- Form -->
    <center>
        <h1>Addmission Form</h1>
    </center>

    <div align="center" class="admission_form" >
        <form action="">
            <div class="adm_int">
                <label for="" class="label_text">Name</label>
                <input type="text" class="input_deg">
            </div>
            <div class="adm_int">
                <label for="" class="label_text">Email</label>
                <input type="text" class="input_deg">
            </div>
            <div class="adm_int">
                <label for="" class="label_text">Phone</label>
                <input type="text" class="input_deg">
            </div>
            <div class="adm_int">
                <label for="" class="label_text">Message</label>
                <textarea name="" id="" class="input_txt"></textarea>
            </div>
            <div class="adm_int">
                <input type="submit" id="submit" class="btn btn-primary" value="Apply">
            </div>

        </form>
    </div>
    <!-- Form end -->
    <!-- Footer -->
    <footer>
        <h3 class="footer_txt">Nguyen Phuoc Tho - PHP Project - 2025</h3>
    </footer>
    <!-- Footer end -->
</body>

</html>
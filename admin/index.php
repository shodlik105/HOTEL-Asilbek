<?php
ob_start(); // Output bufferingni boshlash
session_start();  
if (isset($_SESSION["user"])) {  
    header("Location: home.php");
    exit; 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sun of Beach Admin</title>  
    <link rel="icon" href="images/icon.jpg">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('https://images.unsplash.com/photo-1537640685236-a9df2496e232?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'); background-size: cover; z-index:20;">
    <div class="container">
        <div id="login">
            <form method="post">
                <fieldset class="clearfix">
                    <p><span class="fontawesome-user"></span><input type="text" name="user" placeholder="Username" required></p>
                    <p><span class="fontawesome-lock"></span><input type="password" name="pass" placeholder="Password" required></p> 
                    <p><input type="submit" name="sub" value="Login"></p>
                </fieldset>
            </form>
        </div> <!-- end login -->
    </div>
    <a href="../index.php">
        <img style="position:relative; right:-30%; margin-top:5%; width:40%;" src="../images/title.png" alt="Go to Homepage">
    </a>
</body>
</html>

<?php
include('db.php');

// POST so‘rovi bo‘lsa, loginni tekshiramiz
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($con, $_POST['user']);
    $mypassword = mysqli_real_escape_string($con, $_POST['pass']); 
    
    $sql = "SELECT id FROM login WHERE username = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    
    // Agar login mavjud bo‘lsa
    if ($count == 1) {
        $_SESSION['user'] = $myusername;
        $_SESSION['active'] = true; // Sessiya aktivligini belgilash

        ob_clean(); // Chiqarilgan har qanday ma'lumotni tozalash
        header("Location: home.php");
        exit;
    } else {
        echo '<script>alert("Your Login Name or Password is invalid")</script>';
    }
}
?>

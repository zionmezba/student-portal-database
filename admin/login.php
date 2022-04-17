<?php include("./server/server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="icon" href="./assets/img/logo.PNG">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body>

    <div class="main" style="padding: 9px; background-color: black;">
        <div class="container2">
        <section class="sign-in">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./assets/img/diu14.png" style="border-radius: 200px;" alt="sing up image"></figure>
                        </div>

                    <div class="signin-form">
                    <div>
                            <br></br>
                            <br></br>
                            <br></br>
                    </div>
                        <h2 class="form-title" style = "color: white">ADMIN LOGIN</h2>
                        <div>
                            <br></br>
                            <br></br>
                    </div>
                        <form  class="register-form" id="login-form" action="login.php" method="post">
                            <div class="alert alert-danger"><h4 id="e_msg"><?php include('./server/errors.php'); ?></h4></div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="admin_username" id="admin_username" placeholder="Admin Username"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="login_admin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            <a style = "font-size: 20px; color: white" href="../index.php" class="signup-image-link">Back To Home</a>
                        <a style = "font-size: 20px; color: white" href="./reg.php" class="signup-image-link">Register New Teacher</a>
                    
                        </form>
                        
                    </div>
                </div>
            
        </section>
        </div>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
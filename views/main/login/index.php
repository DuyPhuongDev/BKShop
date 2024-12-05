<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="views\main\login\css\style.css">
    <link rel="stylesheet" href="views\main\login\fonts\material-icon\css\material-design-iconic-font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    @media (max-width: 768px) {
    .mobile-hidden {
        display: none;
    }
    .form-group {
        flex-direction: column;
        align-items: center; 
            }
    .form-button .form-submit {
        margin-left: 0; 
        width: 90%; 
            }
    }
    </style>
</head>
<body>
<section class="sign-in">
            <div class="container">
            <a href="index.php?page=main&controller=home&action=index" class="btn btn-primary">
            <i class="fa fa-home" style="font-size: 2.5rem;padding-top: 15px;padding-left: 15px;color: #6dabe4;"></i>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure class="mobile-hidden"><img src="views\main\login\images\signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php?page=main&controller=register&action=index" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_username" id="your_username" placeholder="Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="invalid" style="color: red;">
                                <?php if (isset($err)) echo htmlspecialchars($err); ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Login" style="width: 278px;margin-left: 20px;"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
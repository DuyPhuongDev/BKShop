<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="views\main\login\fonts\material-icon\css\material-design-iconic-font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="views\main\login\css\style.css">
	<style>
    @media (max-width: 768px) {
    .mobile-hidden {
        display: none;
    }
    }
    </style>
</head>
<body>
<section class="signup">
            <div class="container">
            <a href="index.php?page=main&controller=home&action=index" class="btn btn-primary">
            <i class="fa fa-home" style="font-size: 2.5rem;padding-top: 15px;padding-left: 15px;"></i></a>
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form class="register-form" id="register-form" action="index.php?page=main&controller=register&action=submit" method="POST">
							<div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-circle"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"/>
                            </div>
							<div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
							<div class="form-group">
                                <label for="fullname"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="fullname" id="fullname" placeholder="Full Name"/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin-drop"></i></label>
                                <input type="text" name="address" id="address" placeholder="Address"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure class="mobile-hidden"><img src="views\main\login\images\signup-image.jpg" alt="sing up image"style="padding-top: 60px;"></figure>
                        <a href="index.php?page=main&controller=login&action=index" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>

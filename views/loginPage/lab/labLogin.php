<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - MedEx</title>

    <link rel="stylesheet" href="/scss/main.css" />
    <!-- Font awesome kit -->
    <script src="https://kit.fontawesome.com/9b33f63a16.js" crossorigin="anonymous"></script>
</head>
<body class="login-window">
<div class="canvas canvas-fluid">
    <article>
        <div class="card card-login">
            <div class="card-body">
                <h4 class="card-title">Login</h4>
                <form action="/lab/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-input" id="username" name="username" placeholder="Jon">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-input" id="password" name="password" placeholder="********">
                    </div>
                    <div class="form-group section-remember">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary block" value="Login" id="loginButton">Login</button>
                    </div>
                    <div class="form-group">
                        <p>Don't have an account? <a href="/lab/register">Register Now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </article>
</div>
<footer>
    <div class="footer-inner">
        <section>
            <div class="footer-logo">
                <a href="#">
                    <img alt="MedEx Logo with name" src="/res/logo/logo-box_dark.svg"/>
                </a>
            </div>

            <div class="footer-links">
                <a class="link-1" href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
        </section>

        <section>
            <h6>Team Members</h6>
            <ul>
                <li>R.D.T.D. Kulasinghe</li>
                <li>I.A.P.P. Wijegunawardana</li>
                <li>W.D.D.N. Dharmathunga</li>
                <li>M.C.W. Samarasinghe</li>
            </ul>
        </section>

        <section>
            <p>© 2022 Group 28, All Right reserved</p>
        </section>
    </div>
</footer>
</body>
</html>

<?php
//
//$app = new App();
//$app -> route('/login', function() use ($app) {
//    $app -> render('loginPage/loginPage.php');
//});

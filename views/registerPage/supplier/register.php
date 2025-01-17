<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="/components/sidebar/src/sidemenu-blob.css" type="text/css" rel="stylesheet"/>
    
    <script src="/components/sidebar/src/sidemenu-blob.js"></script>
    <title>Supplier | Register</title>
    <link href="/css/homepage/footer.css" type="text/css" rel="stylesheet"/>
    <link href="/css/homepage/carousel.css" type="text/css" rel="stylesheet"/>
    <link href="/css/homepage/navbar.css" type="text/css" rel="stylesheet"/>
    <link href="/css/homepage/homepage.css" type="text/css" rel="stylesheet"/>
    <link href="/css/homepage/registerPopup.css" type="text/css" rel="stylesheet"/>
    <link href="/css/homepage/loginPopup.css" type="text/css" rel="stylesheet"/>
    <link href="/css/search.css" type="text/css" rel="stylesheet"/>
    <link href="/css/felxbox.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="/scss/main.css" />
    <link rel="stylesheet" href="/css/supplier/formcss.css" />
    <link rel="stylesheet" href="login.css" />
    
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <!-- Font awesome kit -->
    <script src="https://kit.fontawesome.com/9b33f63a16.js" crossorigin="anonymous"></script>
    <!--chart JS--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
  </head>
  <body style = "background-color: #a6cabd;">
sorigin="anonymous"
  ></script>
<!-- Nav Bar-->
    <div class="navBar">
        <div class="navBar__logo">
            <a href="index.php"><img src="/res/logo/Logo-text.png" alt="logo" height="30%" width="30%"></a>
        </div>

<!--register popup for the Are you a page?-->
        <div class="register-modal">
            <div class="register-modal-content">
                <span class="register-close-button">×</span>
                <div class="register-modal-content__title">
                    <h1>Are you a?</h1>
                    <button>Pharmacy</button>
                    <button>Supplier</button>
                    <button>Delivery Partner</button>
                    <button>Laboratory</button>
                    <button>Staff</button>
                </div>
            </div>
        </div>
        <div class="login-modal">
            <div class="login-modal-content">
                <span class="login-close-button">×</span>
                <div class="login-modal-content__title">
                    <h1>Are you a?</h1>
                    <button>Pharmacy</button>
                    <button>Supplier</button>
                    <button>Delivery Partner</button>
                    <button>Laboratory</button>
                    <button>Staff</button>
                </div>
            </div>
        </div>
        <div class="navBar__menu">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/index.php?page=about">About</a></li>
                <li><a href="/index.php?page=contact">Contact</a></li>
                <li><a href="../../loginPage/supplier/login.php">Login</a></li>
                <li><a href="../../registerPage/supplier/register.php">Register</a></li>
            </ul>
        </div>
    </div>
    <!--Register-->
    <div class="card" style="width: 30%; height: auto; left: 10%; top: 20%; position: absolute;">
  <div class="card-body">
    <h2 class="card-title" style="text-align:center;"><img src="/res/logo/Logo-text.png" alt="logo" height="30%" width="30%"><br>Supplier Registration</h2>
    <p class="card-text">
    <form action="auth.php" method="post" enctype="multipart/form-data">
    Name<br><input type="text" name="name" class="input-box" required><br>
      Username<br><input type="text" name="username" class="input-box" required><br>
      Password<br><input type="password" name="pswd" class="input-box" required><br>
      Email<br><input type="text" name="email" class="input-box" required><br>
      Address<br><input type="text" name="address" class="input-box" required><br>
      Mobile Phone Number<br><input type="text" name="mobile" class="input-box" required><br>
    </p>
  </div>
</div>
<div class="card" style="width: 30%; height: auto; left: 55%;  top: 20%;">
  <div class="card-body">
    <p class="card-text">
        <br>
        Supplier Registration Number<br><input type="text" name="supRegNum" class="input-box" required><br>
        Business Registration Number<br><input type="text" name="busiRegNum" class="input-box" required><br>
        Supplier Certificate ID<br><input type="text" name="supCertId" class="input-box" required><br>
        Business Registration Certificate <small>(3Mb - jpg,jpeg,png,pdf) </small><br><input type="file" name="BusRegiCert" id="BusRegiCert" required accept="image/*,.pdf"><br><br>
        Supplier Registration Certificate <small>(3Mb - jpg,jpeg,png,pdf) </small><br><input type="file" name="SuppRegiCert" id ="SuppRegiCert" required accept="image/*,.pdf"><br>
      <br><input type="submit" value="Create Account" class="button">
</form>
    </p>
  </div>
</div>

  </body>
</html>
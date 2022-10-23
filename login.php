<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>moomblebe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css?<?echo time();?>">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="shortcut icon" href="images/logo-mini.png" />
  </head>
  <body>
    <?php if ($_COOKIE['auth'] != '') {?>
      <script>
        window.location.href = "index.php";
      </script>
    <?} else { ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-mini.png" alt="logo" /></a>
        </div>
      </nav>
      <div class="wrapper">
        <div class="row signup">
          <div class="col-12">
            <div class="row">
              <div class="col-12 signup-form">
                <form action="php/auth.php" method="POST">
                  <h3>Авторизация</h3>
                  <input type="email" id="input-email" name="email" placeholder="Email address" required>
                  <div class="input-div-pass">
                    <input type="password" id="input-password" name="password" placeholder="Password" required>
                    <a href="#" class="password-control"></a>
                  </div>
                  <button type="submit" id="signup" name="do_login">Войти</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      </div>
    <script src="js/pass-hidden.js"></script>
    <?}?>
  </body>
</html>
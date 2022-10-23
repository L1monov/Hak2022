<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>moomblebe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/main.css?<?echo time();?>">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="shortcut icon" href="../images/logo-mini.png" />
  </head>
  <body>
    <?
        require_once('../php/functions.php');
        $connect_db = connectDB();
        mysqli_set_charset($connect_db, 'utf8');

        if(isset($_COOKIE['auth'])) {
          
          $users = mysqli_query($connect_db, "SELECT * FROM `usershackt` WHERE `email`='$_COOKIE[email]'");
      
          while($user = mysqli_fetch_assoc($users)) {
            $user_id = $user['id'];
            $user_email = $user['email'];
            $user_surname = $user['surname'];
            $user_name = $user['name'];
            $user_middlename = $user['middlename'];
            $user_birthday = $user['birthday'];
            $user_course = $user['course'];
            $user_faculty = $user['faculty'];
            $user_numberbook = $user['numberbook'];
            $user_avatars = $user['avatars'];
            $user_rang = $user['rang'];
            $user_rang_profcom = $user['rang_profcom'];
            $user_rang_ss = $user['rang_ss'];
          }
        }
        else {
          
        }
    ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../index.php"><img src="../images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../images/avatars/default.jpg" alt="avatar">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-white"><?echo $user_surname;?> <?echo $user_name;?></p>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <p>В разработке =)</p>
                </a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <?
                  if($user_name != "") {
                    
                    $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 3");
                
                    while($notify = mysqli_fetch_assoc($mp_notif)) {
                      $notify_id = $notify['id'];
                      $notify_tag = $notify['tag'];
                      $notify_sender = $notify['sender'];
                      $notify_theme = $notify['theme'];
                      $notify_image = $notify['image'];
                      $notify_content = $notify['content'];
                      $notify_creator = $notify['creator'];
                      $notify_upd = $notify['upd'];
                      $notify_visible = $notify['visible'];
                ?>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-bullseye"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1"><?echo $notify_theme;?></h6>
                    <p class="text-gray ellipsis mb-0"> <?echo $notify_content;?> </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <?
                    }
                  }
                ?>
                <a href="../index.php"><h6 class="p-3 mb-0 text-center">Смотреть все</h6></a>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="../php/exit.php">
                <i class="mdi mdi-logout"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../index.php">
                <span class="menu-title">Личный кабинет</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="teacher.php">
                <span class="menu-title">Преподаватели</span>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="organization.php">
                <span class="menu-title">Организации</span>
                <i class="mdi mdi-camcorder-box menu-icon"></i>
              </a>
            </li>
            <?if($user_rang == "teacher") {?>
            <li class="nav-item">
              <a class="nav-link" href="session.php?do=edit">
                <span class="menu-title">Редактировать сессию</span>
                <i class="mdi mdi-clipboard-arrow-left menu-icon"></i>
              </a>
            </li>
          <? } elseif ($user_rang == "profcom") {
            
          } else {?>
            <li class="nav-item">
              <a class="nav-link" href="session.php">
                <span class="menu-title">Сессия</span>
                <i class="mdi mdi-clipboard-arrow-left menu-icon"></i>
              </a>
            </li>
            <?}?>
            <li class="nav-item">
              <a class="nav-link" href="#telegram">
                <span class="menu-title">Бот Telegram</span>
                <i class="mdi mdi-telegram menu-icon"></i>
              </a>
            </li>
            <?if($user_rang == "admin") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">АДМИН</p>
              <a class="nav-link" href="../index.php?lk=admin">
                <span class="menu-title">Кабинет админа</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang == "rector") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">РЕКТОР</p>
              <a class="nav-link" href="../index.php?lk=rector">
                <span class="menu-title">Кабинет деканата</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#development">
                <span class="menu-title">Конфиг организации</span>
                <i class="mdi mdi-umbrella-outline menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang == "decan") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">ДЕКАНАТ</p>
              <a class="nav-link" href="../index.php?lk=decan">
                <span class="menu-title">Кабинет деканата</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#development">
                <span class="menu-title">Конфиг организации</span>
                <i class="mdi mdi-umbrella-outline menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang == "teacher") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">ПРЕПОДАВАТЕЛЬ</p>
              <a class="nav-link" href="../index.php?lk=teacher">
                <span class="menu-title">Кабинет преподавателя</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang_profcom > 2 || $user_rang == "rector" || $user_rang == "admin") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">ПРОФКОМ</p>
              <a class="nav-link" href="../index.php?lk=profcom">
                <span class="menu-title">Кабинет профкома</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#development">
                <span class="menu-title">Конфиг организации</span>
                <i class="mdi mdi-umbrella-outline menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang_ss > 2 || $user_rang == "rector" || $user_rang == "admin") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">СТУДЕНЧЕСКИЙ СОВЕТ</p>
              <a class="nav-link" href="../index.php?lk=ss">
                <span class="menu-title">Кабинет студ.совета</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#development">
                <span class="menu-title">Конфиг организации</span>
                <i class="mdi mdi-umbrella-outline menu-icon"></i>
              </a>
            </li>
            <?}?>
          </ul>
        </nav>

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">

              </h3>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="row">
                <h2 style="text-align: center;">Профсоюзные организации</h2>
                  <div class="col-12 col-md-6 col-xl-4 element-animation">
                    <div class="organization-card">
                      <img src="../images/profcom.png" alt="">
                      <h2>Первичная профсоюзная организация</h2>
                    </div>
                 </div>
                  <div class="col-12 col-md-6 col-xl-4 element-animation">
                    <div class="organization-card">
                      <img src="../images/ss.jpg" alt="">
                      <h2>Студенческий совет</h2>
                    </div>
                 </div>
                  <div class="col-12 col-md-6 col-xl-4 element-animation">
                    <div class="organization-card">
                      <img src="../images/tk.png" alt="">
                      <h2>Точка кипения</h2>
                    </div>
                 </div>
                </div>
          </div>
        <img class="bg-mask-rsue" src="../images/bg-rsue.png" alt="">
        </div>

      <div id="development" class="popup">
        <a href="#header" class="popup__area"></a>
        <div class="popup__body">
          <div class="popup__content">
            <a href="#" class="popup__close"><img src="../images/svg/cross-close.svg" alt=""></a>
            <div class="popup__title">config organizations</div>
            <div class="popup__text">
              <p>Не успели связать с бэкендом =(</p>
            </div>
          </div>
        </div>
      </div>

      <div id="telegram" class="popup">
        <a href="#header" class="popup__area"></a>
        <div class="popup__body">
          <div class="popup__content">
            <a href="#" class="popup__close"><img src="../images/svg/cross-close.svg" alt=""></a>
            <div class="popup__title">Сканируй!</div>
            <div class="popup__text">
              <img src="../images/qr.png" alt="">
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/misc.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/todolist.js"></script>
    <script src="../js/scroll-animation.js"></script>
  </body>
</html>
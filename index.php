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
    <?php if ($_COOKIE['auth'] == '') {?>
      <script>
        window.location.href = "login.php";
      </script>
    <?} else { ?>
    <?
        require_once('php/functions.php');
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
          <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="images/avatars/default.jpg" alt="avatar">
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
                <a href="index.php"><h6 class="p-3 mb-0 text-center">See all notifications</h6></a>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="php/exit.php">
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
            <li class="nav-item active">
              <a class="nav-link active" href="index.php">
                <span class="menu-title">Личный кабинет</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/teacher.php">
                <span class="menu-title">Преподаватели</span>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/organization.php">
                <span class="menu-title">Организации</span>
                <i class="mdi mdi-camcorder-box menu-icon"></i>
              </a>
            </li>
            <?if($user_rang == "teacher") {?>
            <li class="nav-item">
              <a class="nav-link" href="pages/session.php?do=edit">
                <span class="menu-title">Редактировать сессию</span>
                <i class="mdi mdi-clipboard-arrow-left menu-icon"></i>
              </a>
            </li>
          <? } elseif ($user_rang == "profcom") {
            
          } else {?>
            <li class="nav-item">
              <a class="nav-link" href="pages/session.php">
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
              <a class="nav-link" href="index.php?lk=admin">
                <span class="menu-title">Кабинет админа</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang == "rector") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">РЕКТОР</p>
              <a class="nav-link" href="index.php?lk=rector">
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
              <a class="nav-link" href="index.php?lk=decan">
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
              <a class="nav-link" href="index.php?lk=teacher">
                <span class="menu-title">Кабинет преподавателя</span>
                <i class="mdi mdi mdi-clipboard-account menu-icon"></i>
              </a>
            </li>
            <?}?>
            <?if($user_rang_profcom > 2 || $user_rang == "rector" || $user_rang == "admin") {?>
            <li class="nav-item">
              <p class="menu-title" style="margin-top: 30px;">ПРОФКОМ</p>
              <a class="nav-link" href="index.php?lk=profcom">
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
              <a class="nav-link" href="index.php?lk=ss">
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
            <?if($_GET['org'] == 'add') {?>
            <div class="row">
              <div class="col-12 col-md-12">
                     
              </div>
            </div>
            <?} elseif ($_GET['link'] == 'teacher') { 
            ?>
            <div class="row">
              <div class="col-12">
                <div class="row">
                <h2>Преподаватели РГЭУ (РИНХ)</h2>
                  <?
                  $teachers = mysqli_query($connect_db, "SELECT * FROM `usershackt` WHERE `rang` = 'teacher' ORDER BY `surname`");
              
                  while($teacher = mysqli_fetch_assoc($teachers)) {
                    $teacher_id = $teacher['id'];
                    $teacher_email = $teacher['email'];
                    $teacher_surname = $teacher['surname'];
                    $teacher_name = $teacher['name'];
                    $teacher_middlename = $teacher['middlename'];
                    $teacher_birthday = $teacher['birthday'];
                    $teacher_course = $teacher['course'];
                    $teacher_faculty = $teacher['faculty'];
                    $teacher_numberbook = $teacher['numberbook'];
                    $teacher_avatars = $teacher['avatars'];
                    $teacher_rang = $teacher['rang'];
                    $teacher_rang_profcom = $teacher['rang_profcom'];
                    $teacher_rang_ss = $teacher['rang_ss'];
                    if($teacher_rang != "teacher") {

                    }
                    else {
                  ?>
                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="teacher-card">
                      <a href="people.php?id=<?echo $teacher_id;?>">
                        <img src="images/<?echo $teacher_avatars;?>" alt="">
                        <h5><?echo $teacher_surname;?> <?echo mb_substr($teacher_name, 0, 1)?>. <?echo mb_substr($teacher_middlename, 0, 1)?>.</h5>
                      </a>
                    </div>
                 </div>
                <?}}?>
                </div>
              </div>
              <img class="bg-mask-rsue" src="images/bg-rsue.png" alt="">
            </div>
            <?} elseif ($_GET['lk'] == 'profcom') { 
              if($user_rang_profcom > 2) {
            ?>
            <div class="row">
              <div class="col-12 col-md-12" style="position: relative; z-index: 1;">
                <div class="row">
                  <div class="col-12 col-xl-8 profcom-add element-animation">
                    <h3>Добавление мероприятий</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <select class="add-select" name="addtype" id="add-type">
                        <option value="none">Выберите тип</option>
                        <option value="Мероприятие">Мероприятие</option>
                        <option value="Вебинар">Вебинар</option>
                        <option value="Лекция">Лекция</option>
                        <option value="Важно!">Объявление</option>
                      </select>
                      <select class="add-select" name="addorg" id="add-org">
                        <option value="admin">Администрация сайта</option>
                        <option value="rector">Ректорат</option>
                        <option value="decan">Деканат</option>
                        <option value="profcom">Профсоюз</option>
                        <option value="ss">Студ.совет</option>
                      </select>
                      <label for="start"></label>
                      <input class="add-calendar" type="date" id="start" name="calendar" value="2022-10-25" min="2022-10-23" max="2022-12-31">
                      <br>
                      <input class="add-input" type="text" id="theme" name="theme" placeholder="Название темы">
                      <textarea class="add-textarea" name="about" id="about" cols="30" rows="10" placeholder="Описание события"></textarea>
                      <div class="support-input-file">
                           <input id="file-input" type="file" name="uploadfile" multiple="multiple" accept="image" />
                           <label for="file-input">Выберите файлы <br><span>Поместите файлы здесь или нажмите <span style="color: #3366FF;">здесь</span> для выбора файлов</span></label>
                      </div>
                      <div style="">
                        <img class="support-preview-img" id="preview0" src="#" />
                        <img class="support-preview-img" id="preview1" src="#" />
                        <img class="support-preview-img" id="preview2" src="#" />
                        <img class="support-preview-img" id="preview3" src="#" />
                        <img class="support-preview-img" id="preview4" src="#" />
                        <img class="support-preview-img" id="preview5" src="#" />
                      </div>
                      <script type="text/javascript">
                              document.getElementById("preview0").setAttribute("style","opacity:0");
                              document.getElementById("preview1").setAttribute("style","opacity:0");
                              document.getElementById("preview2").setAttribute("style","opacity:0");
                              document.getElementById("preview3").setAttribute("style","opacity:0");
                              document.getElementById("preview4").setAttribute("style","opacity:0");
                              document.getElementById("preview5").setAttribute("style","opacity:0");
                        function readURL(input) {
                              if(input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview0').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                                document.getElementById("preview0").setAttribute("style","opacity:1");
                              }
                              if(input.files[1]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview1').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[1]);
                                document.getElementById("preview1").setAttribute("style","opacity:1");
                              }
                              if(input.files[2]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview2').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[2]);
                                document.getElementById("preview2").setAttribute("style","opacity:1");
                              }
                              if(input.files[3]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview3').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[3]);
                                document.getElementById("preview3").setAttribute("style","opacity:1");
                              }
                              if(input.files[4]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview4').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[4]);
                                document.getElementById("preview4").setAttribute("style","opacity:1");
                              }
                              if(input.files[5]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview5').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[5]);
                                document.getElementById("preview5").setAttribute("style","opacity:1");
                              }
                        }

                        $("#file-input").change(function() {
                            readURL(this);
                        });
                      </script> 
                      <input class="add-button" type="submit" name="do_add" value="Опубликовать">
                    </form>
                    <?
                    AddEventProfcom();
                    ?>
                  </div>
                  <div class="col-12 col-xl-4 profcom-people element-animation">
                    <h3 class="element-animation">Участники профкома</h3>
                    <div class="profcom-card">
                      <?

                        $profcom_users = mysqli_query($connect_db, "SELECT * FROM `usershackt` WHERE `rang_profcom` > 0 ORDER BY `surname`");
                    
                        while($profcom = mysqli_fetch_assoc($profcom_users)) {
                          $profcom_id = $profcom['id'];
                          $profcom_email = $profcom['email'];
                          $profcom_surname = $profcom['surname'];
                          $profcom_name = $profcom['name'];
                          $profcom_middlename = $profcom['middlename'];
                          $profcom_birthday = $profcom['birthday'];
                          $profcom_course = $profcom['course'];
                          $profcom_faculty = $profcom['faculty'];
                          $profcom_numberbook = $profcom['numberbook'];
                          $profcom_avatars = $profcom['avatars'];
                          $profcom_rang = $profcom['rang'];
                          $profcom_rang_profcom = $profcom['rang_profcom'];
                          $profcom_rang_ss = $profcom['rang_ss'];
                          if($profcom_rang != "student") {}
                          else {
                      ?>
                    <div class="profcom-card-student element-animation">
                      <a href="#">
                        <p><?echo $profcom_surname;?> <?echo $profcom_name;?> <?echo $profcom_middlename;?> <span><?echo $profcom_course;?> курс, <?echo $profcom_faculty;?></span></p>
                      </a>
                    </div>
                      <?}}?>
                    </div>
                  </div>
                  <div class="col-12 profcom-mp">
                    <h3 class="element-animation">Мероприятия</h3>
                    <?
                    $prof_mp = mysqli_query($connect_db, "SELECT * FROM `mphackt` WHERE `tag` = 'profcom' ORDER BY `id` DESC");
                        
                            while($profmp = mysqli_fetch_assoc($prof_mp)) {
                              $profmp_id = $profmp['id'];
                              $profmp_tag = $profmp['tag'];
                              $profmp_sender = $profmp['sender'];
                              $profmp_theme = $profmp['theme'];
                              $profmp_image = $profmp['image'];
                              $profmp_content = $profmp['content'];
                              $profmp_creator = $profmp['creator'];
                              $profmp_upd = $profmp['upd'];
                              $profmp_visible = $profmp['visible'];
                            
                    ?>
                    <div class="profcom-mp-card">
                      <img class="element-animation" src="images/add/<?echo $profmp_image;?>" alt="">
                      <p class="element-animation">
                        <span class="element-animation" style="font-weight: 600; font-size: 25px;"><?echo $profmp_theme;?></span><br>
                        <?echo $profmp_content;?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                        <span style="font-weight: 300;"><?echo $profmp_visible;?> участник(ов)</span>
                      </p>                      
                    </div>
                    <?}?>
                  </div>
                </div>    
              </div>
              <img class="bg-mask-rsue" src="images/bg-rsue.png" alt="">
            </div>
            <?}?>
            <?} elseif ($_GET['lk'] == 'ss') { 
              if($user_rang_ss > 2) {
            ?>
            <div class="row">
              <div class="col-12 col-md-12">
                     личный кабинет студ совета
              </div>
            </div>
            <?}?>
            <?} elseif ($_GET['lk'] == 'teacher') { 
              if($user_rang == "teacher") {
            ?>
            <div class="row">
              <div class="col-12 col-md-12">
                     личный кабинет преподавателя
              </div>
            </div>
            <?}?>
            <?} elseif ($_GET['lk'] == 'decan') { 
              if($user_rang == "decan" || $user_rang == "admin") {
            ?>
            <div class="row">
              <div class="col-12 col-md-12">
                     личный кабинет декана
              </div>
            </div>
            <?}?>
            <?} elseif ($_GET['lk'] == 'rector') { 
              if($user_rang == "rector" || $user_rang == "admin") {
            ?>
            <div class="row">
              <div class="col-12 col-md-12">
                     личный кабинет ректора
              </div>
            </div>
            <?}?>
            <?} elseif ($_GET['lk'] == 'admin') { 
              if($user_rang == "admin") {
            ?>
            <div class="row">
              <div class="col-12 col-md-12">
                     личный кабинет админа
              </div>
            </div>
            <?}?>
            <?} else {?>
            <div class="row">
              <div class="col-12 col-md-12">
                <div class="row">
                  <div class="col-12 col-md-8 cabinet-name">
                    <div class="row">
                      <div class="col-12 col-md-6 cabinet-name-avatar">
                        <img class="element-animation" src="images/avatars/default.jpg" alt="">
                      </div> 
                      <div class="col-12 col-md-6 cabinet-name-name">
                        <div>
                          <h3 class="element-animation"><?echo $user_surname;?> <?echo $user_name;?> <?echo $user_middlename;?></h3>
                          <p class="element-animation"><?echo $user_course;?> курс, <?echo $user_faculty;?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 cabinet-button">
                    <div class="row">
                      <div class="col-12 col-md-6 cabinet-button-a">
                        <a class="element-animation" href="#" style="transition: all 0.15s linear;">Мои курсы</a>
                        <a class="element-animation" href="#" style="transition: all 0.15s linear;">Отчеты</a>
                        <a class="element-animation" href="#" style="transition: all 0.15s linear;">Достижения</a>
                      </div>
                      <div class="col-12 col-md-6 cabinet-button-a">
                        <a class="element-animation" href="pages/session.php" style="transition: all 0.15s linear; cursor: pointer;">Сессия</a>
                        <a class="element-animation" href="#" style="transition: all 0.15s linear;">Общежитие</a>
                        <a class="element-animation" href="#" style="transition: all 0.15s linear;">Настройки</a>
                      </div>
                    </div>
                  </div>
                </div>      
              </div>
              <div class="col-12 col-md-12 mt-5" style="position: relative; z-index: 1;">
                <h3 class="page-title">
                  Последние уведомления
                </h3>
                    <table class="transaction-table">
                      <tbody class="table-add-notify">

                        <?
                            $offs = 0;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 1 OFFSET $offs");
                        
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
                            }
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation" style="background: rgba(4, 83, 190, 0.08);">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><img src="images/svg/<? if($notify_tag == "profcom") {echo "profcom";} elseif($notify_tag == "ss") {echo "ss";} elseif ($notify_tag == "tk") {echo "tk";} else {echo "rsue";}?>.svg" alt="" style="width: 25px; height: 25px;"> <?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <?
                            }
                        ?>
                        <?  $offs += 1;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 1 OFFSET $offs");
                        
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
                            }
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation" style="background: rgba(4, 83, 190, 0.04);">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><img src="images/svg/<? if($notify_tag == "profcom") {echo "profcom";} elseif($notify_tag == "ss") {echo "ss";} elseif ($notify_tag == "tk") {echo "tk";} else {echo "rsue";}?>.svg" alt="" style="width: 25px; height: 25px;"> <?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <?
                          }
                        ?>
                        <?
                          if($user_name != "") {
                            $offs += 1;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 10 OFFSET $offs");
                        
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
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><img src="images/svg/<? if($notify_tag == "profcom") {echo "profcom";} elseif($notify_tag == "ss") {echo "ss";} elseif ($notify_tag == "tk") {echo "tk";} else {echo "rsue";}?>.svg" alt="" style="width: 25px; height: 25px;"> <?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <? 
                            }
                            }
                          }
                        ?>
<!-- 
                      <script>
                        $(document).ready(function () {
                          $.ajax({
                            url: "ajax.php",
                            dataType: 'json',
                            error: function(XMLHttpRequest, textStatus, ErrorThrown) {
                              console.log( XMLHttpRequest );
                            }
                          })
                          .done(function( data ) {
                            data.forEach(item => {
                              $(".table-add-notify").append( renderMessage(item) );
                            })
                          });
                        });


                        function renderMessage(item) {
                          return `
                        <tr class="element-animation" style="opacity: 1;">
                          <td style="font-weight: 600;">От кого:</td>
                          <td>${item.sender}</td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td>${item.theme}</td>
                        </tr>`;
                        }
                      </script> -->
                      </tbody>
                    </table>
              </div>
              <img class="bg-mask-rsue" src="images/bg-rsue.png" alt="">
            </div>
            <? } ?>
          </div>
          <div class="notify-online">
            <a href="#">
              <h4>Новое событие!</h4>
              <p>Текст текст текст текст текст текст текст текст</p>
            </a>
          </div>  
        </div>

      <div id="development" class="popup">
        <a href="#header" class="popup__area"></a>
        <div class="popup__body">
          <div class="popup__content">
            <a href="#" class="popup__close"><img src="images/svg/cross-close.svg" alt=""></a>
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
            <a href="#" class="popup__close"><img src="images/svg/cross-close.svg" alt=""></a>
            <div class="popup__title">Сканируй!</div>
            <div class="popup__text">
              <img src="images/qr.png" alt="">
            </div>
          </div>
        </div>
      </div>


      </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/todolist.js"></script>
    <script src="js/scroll-animation.js"></script>
    <?}?>
  </body>
</html>
<?php
	function connectDB() {
		$connect_db = new mysqli('localhost', 'u1277887', 'eWed!!Z8', 'u1277887_moomblebe');
		return $connect_db;
	}
	function AddEventProfcom() {
			if (isset($_POST['do_add'])) {
				if (isset($_FILES['uploadfile'])) {
					$photo_name = time()."_".basename($_FILES['uploadfile']['name']);
					$error_flag = $_FILES['uploadfile']['errors'];
					
					if ($error_flag == 0) {
						$upfile = getcwd()."/images/add/".time()."_".basename(iconv('utf-8', 'windows-1251', $_FILES['uploadfile']['name']));
						
						if ($_FILES['uploadfile']['tmp_name']) {
							$allowed = array('jpg', 'jpeg', 'png');
							$ext = pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
							
							if (!in_array($ext, $allowed)) {
								$errors[] = "Неверный формат";
							}
							else if (!move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upfile))
								$uploaddir = "/images/add/";
								$connect_db = new mysqli('localhost', 'u1277887', 'eWed!!Z8', 'u1277887_moomblebe');
								mysqli_set_charset($connect_db, 'utf8');
								mysqli_query($connect_db, "INSERT INTO `mphackt` (`tag`, `sender`, `theme`, `image`, `content`, `creator`, `upd`, `visible`) VALUES ('$_POST[addorg]', 'Первичная профсоюзная организация' , '$_POST[theme]', '$photo_name', '$_POST[about]', '$user_email', '$_POST[calendar]', 0)");
								?> 
									<script type="text/javascript">

										location.replace("index.php?lk=profcom");

									</script>
								<?
							}
						else {
							$errors[] 	= "Ошибка!";
						}
					}
				}
			else if ($_FILES['uploadfile']['size'] == 0) $errors[] = "Выберите изображение";
		}
	}
?>
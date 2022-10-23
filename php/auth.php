<?php
						require "connect.php";
						$data = $_POST;
						
						if (isset($data['do_login'])) {
							
							
							$errors = array();
							
							$user = R::findOne('usershackt', 'email = ?', array($data['email']));
							if($user) {
								if ($data['password'] == $user->password) {
									setcookie('auth', $user['id'], time() + 60*60*24, "/");
									setcookie('email', $user['email'], time() + 60*60*24, "/");
									header('Location: ../index.php');
								}
								else {
									$errors[] = 'Пароль введен неверно!';
									echo "неправильный пароль";
								}
							}
							else {
								$errors[] = 'Такого логина не существует!';
								echo "неправильный логин";
							}
							
							
							if (!empty($errors)) {
								?>
							      <script>
							      	alert('Неверные данные!');
							        window.location.href = "../login.php";
							      </script>
								<?
							}
						
						}
?>
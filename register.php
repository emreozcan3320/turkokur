<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<html>
<head>
	<title>Turk Okur'a Hoşgeldiniz!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<?php

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>

	<div class="wrapper">

		<div class="login_box">

			<div class="login_header">
				<h1>Turk Okur!</h1>
				Aşağıdan giriş yap veya Kayıt ol!
			</div>
			<br>
			<div id="first">

				<form action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Adresi" value="<?php
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					}
					?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Şifre">
					<br>
					<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email veya şifre hatalı ! <br>"; ?>
					<input type="submit" name="login_button" value="Giriş Yap">
					<br>
					<a href="#" id="signup" class="Kayıt Ol">Hesabin yok mu? Burdan Kayıt Olun!</a>

				</form>

			</div>

			<div id="second">

				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="İsim" value="<?php
					if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					}
					?>" required>
					<br>
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "İsminiz 2 ile 25 karakter arasında olmalıdır<br>"; ?>




					<input type="text" name="reg_lname" placeholder="Soyisim" value="<?php
					if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					}
					?>" required>
					<br>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Soyisminiz 2 ile 25 karakter arasında olmalıdır<br>"; ?>

					<input type="text" name="reg_username" placeholder="Kullanıcı ismi seçiniz" value="<?php if(isset($_SESSION['reg_username'])) {echo $_SESSION['reg_username'];}?>" required>
		      <br>
		      <?php  if(in_array("Your username must be between 2 and 25 characters<br>",$error_array)){
		        echo "Kullanıcı adı 2 ile 25 karakter arasında bir uzunlukta olmak zorundadır<br>";}
		       if(in_array("Username already in use<br>",$error_array)){
		        echo "Kullanıcı adı daha önce alınmış.<br>";}  ?>


					<input type="email" name="reg_email" placeholder="Email" value="<?php
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					}
					?>" required>
					<br>

					<input type="email" name="reg_email2" placeholder="Email Onayla" value="<?php
					if(isset($_SESSION['reg_email2'])) {
						echo $_SESSION['reg_email2'];
					}
					?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email kullanımda<br>";
					else if(in_array("Invalid email format<br>", $error_array)) echo "Uygun olmayan email formatı<br>";
					else if(in_array("Emails don't match<br>", $error_array)) echo "Emailler eşleşmiyor<br>"; ?>

					<input type="text" name="reg_city" placeholder="Şehir" value="<?php if(isset($_SESSION['reg_city'])) {echo $_SESSION['reg_city'];}?>" required>
		      <br>
		      <select name = "reg_gender">
		        <option type="radio" name="reg_gender" value="Erkek" >Erkek</option>
		        <option type="radio" name="reg_gender" value="Kadın" >Kadın</option>
		        <option type="radio" name="reg_gender" value="Diğer" >Diğer</option>
		      </select>
		      <br>


					<label for="turler" ><small>En çok ilgi duyduğunuz alanı seçiniz</small></label>
					<br>
					<select name="user_tur_bir">
						<?php
						$kitap_turleri = array("tarih","roman","edebiyat","bilim kurgu","teknoloji","dünya klasiği","eğlence","felsefe","gezi","yemek","çocuk","korku gerilim","kişisel gelişim","müzik","polisiye","psikoloji","şiir","siyaset","eğitim","metafizik");
						foreach ($kitap_turleri as $value) {
    					echo "<option id='turler' value=".$value.">".$value."</option>";
						}
						 ?>
					</select>
					<br>

					<label for="turler" ><small>En çok ilgi duyduğunuz <strong>ikinci</strong> alanı seçiniz</small></label>
					<br>
					<select name="user_tur_iki">
						<?php
						$kitap_turleri = array("tarih","roman","edebiyat","bilim kurgu","teknoloji","dünya klasiği","eğlence","felsefe","gezi","yemek","çocuk","korku gerilim","kişisel gelişim","müzik","polisiye","psikoloji","şiir","siyaset","eğitim","metafizik");
						foreach ($kitap_turleri as $value) {
    					echo "<option id='turler' value=".$value.">".$value."</option>";
						}
						 ?>
					</select>
					<br>

					<label for="turler" ><small>En çok ilgi duyduğunuz <strong>üçüncü</strong> alanı seçiniz</small></label>
					<br>
					<select name="user_tur_uc">
						<?php
						$kitap_turleri = array("tarih","roman","edebiyat","bilim kurgu","teknoloji","dünya klasiği","eğlence","felsefe","gezi","yemek","çocuk","korku gerilim","kişisel gelişim","müzik","polisiye","psikoloji","şiir","siyaset","eğitim","metafizik");
						foreach ($kitap_turleri as $value) {
    					echo "<option id='turler' value=".$value.">".$value."</option>";
						}
						 ?>
					</select>
					<br>




					<input type="password" name="reg_password" placeholder="Şifre" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Şifreyi Tekrarla" required>
					<br>
					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Şifreniz Eşleşmiyor<br>";
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Şifreniz sadece ingilizce karakterler ve sayılar içerebilir<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Şifreniz 5 ile 30 karakter arası uzunluğunda olmalıdır<br>"; ?>


					<input type="submit" name="register_button" value="Kayıt Ol">
					<br>

					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>İşlem tamam. Gidip giriş yapabilirsiniz!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Hesabın var mı? Burdan giriş yap.</a>
				</form>
			</div>

		</div>

	</div>


</body>
</html>

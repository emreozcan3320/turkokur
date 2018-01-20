<?php
include("includes/header.php");
include("includes/form_handlers/settings_handler.php");
?>

<div class="main_column column">

	<h4>Hesap Ayarları</h4>
	<?php
	echo "<img src='" . $user['profile_pic'] ."' class='small_profile_pic'>";
	?>
	<br>
	<a href="upload.php">Yeni bir profil fotoğrafı yükle</a> <br><br><br>

	Değerleri değiştirin ve 'Detayları Güncelleye' tıklayınız
	<?php
	$user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
	$row = mysqli_fetch_array($user_data_query);

	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	?>

	<form action="settings.php" method="POST">
		İsim: <input type="text" name="first_name" value="<?php echo $first_name; ?>" id="settings_input"><br>
		Soyisim: <input type="text" name="last_name" value="<?php echo $last_name; ?>" id="settings_input"><br>
		Email: <input type="text" name="email" value="<?php echo $email; ?>" id="settings_input"><br>

		<?php echo $message; ?>

		<input type="submit" name="update_details" id="save_details" value="Detayları Güncelle" class="info settings_submit"><br>
	</form>

	<h4>Şifreyi Değiştir</h4>
	<form action="settings.php" method="POST">
		Eski Şifre: <input type="password" name="old_password" id="settings_input"><br>
		Yeni Şifre: <input type="password" name="new_password_1" id="settings_input"><br>
		Yeni Şifre Tekrar: <input type="password" name="new_password_2" id="settings_input"><br>

		<?php echo $password_message; ?>

		<input type="submit" name="update_password" id="save_details" value="Şifreyi Değiştir" class="info settings_submit"><br>
	</form>

	<h4>Hesabı Kapat</h4>
	<form action="settings.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Hesabı Kapat" class="danger settings_submit">
	</form>


</div>

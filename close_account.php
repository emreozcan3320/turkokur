<?php
include("includes/header.php");

if(isset($_POST['cancel'])) {
	header("Location: settings.php");
}

if(isset($_POST['close_account'])) {
	$close_query = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE username='$userLoggedIn'");
	session_destroy();
	header("Location: register.php");
}


?>

<div class="main_column column">

	<h4>Hesabı Kapat</h4>

	Hesabınızı kapatmak istediğinizden emin misiniz?<br><br>
	CHesabınızı kapatmak bütün aktivitilerinizi ve sizi diğer kullanıcılrdan gizleyecektir<br><br>
	İstediğiniz saman sadece giriş yaparak hesabınızı tekrardan açabilirsiniz<br><br>

	<form action="close_account.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Evet! Kapat!" class="danger settings_submit">
		<input type="submit" name="cancel" id="update_details" value="Hayır!" class="info settings_submit">
	</form>

</div>

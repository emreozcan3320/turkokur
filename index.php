<?php
include("includes/header.php");
require './OpenSlopeOne.php';
$openslopeone = new OpenSlopeOne();
$openslopeone->initSlopeOneTable('MySQL');

if(isset($_POST['post'])){

	 $uploadOk = 1;
	// $imageName = $_FILES['fileToUpload']['name'];
	 $errorMessage = "";
  //
	// if($imageName != "") {
	// 	$targetDir = "assets/images/posts/";
	// 	$imageName = $targetDir . uniqid() . basename($imageName);
	// 	$imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);
  //
	// 	if($_FILES['fileToUpload']['size'] > 10000000) {
	// 		$errorMessage = "Sorry your file is too large";
	// 		$uploadOk = 0;
	// 	}
  //
	// 	if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
	// 		$errorMessage = "Sorry, only jpeg, jpg and png files are allowed";
	// 		$uploadOk = 0;
	// 	}
  //
	// 	if($uploadOk) {
	// 		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
	// 			//image uploaded okay
	// 		}
	// 		else {
	// 			//image did not upload
	// 			$uploadOk = 0;
	// 		}
	// 	}
  //
	// }

	if($uploadOk) {
		$post = new Post($con, $userLoggedIn);
		$post->submitPost($_POST['post_text'], 'none');
		header("Refresh:0");

	}
	else {
		echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
	}

}


 ?>
	<div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
			</a>
			<br>
			<?php echo "Gönderiler: " . $user['num_posts']. "<br>";
			echo "Beğeniler: " . $user['num_likes'];

			?>
		</div>

	</div>

	<div class="main_column column friend_oneri">
		<div class="row">
			<?php
			$user_id = $user['id'];
			$sorgu = $con->query("SELECT user_tur_bir, user_tur_iki, user_tur_uc FROM users WHERE users.id = $user_id");


							 if ($sorgu->num_rows > 0) {
								 // output data of each row
								 while ($row = $sorgu->fetch_assoc()) {
									 // echo $row['kitap_adi']."<br>";
									 // echo $row['user_tur_bir']."<br>".$row['user_tur_iki']."<br>".$row['user_tur_uc']."<br>";
	                 $user_tur_bir = $row['user_tur_bir'] ;
	                 $user_tur_iki = $row['user_tur_iki'] ;
	                 $user_tur_uc =  $row['user_tur_uc'];
								 }

						 }

	           $oneri = $con -> query("SELECT * FROM users WHERE user_tur_bir = '$user_tur_bir' OR user_tur_iki = '$user_tur_bir' OR user_tur_uc = '$user_tur_bir' OR user_tur_bir = '$user_tur_iki' OR user_tur_iki = '$user_tur_iki' OR user_tur_uc = '$user_tur_iki' OR user_tur_bir = '$user_tur_uc' OR user_tur_iki = '$user_tur_uc' OR user_tur_uc = '$user_tur_uc' ");
	         //   if ($oneri->num_rows > 0) {
	         //     // output data of each row
	         //     while ($row = $oneri->fetch_assoc()) {
	         //       // echo $row['kitap_adi']."<br>";
						// 		 if($row['username']==$userLoggedIn){
						// 			 continue;
						// 		 }
	         //       echo "<a href=".$row['username']."> <img class='oneri_pic' src=".$row['profile_pic']."><p>".$row['first_name']."</p><p>".$row['last_name']."</p></a>";
	         // // //     }
           //
	         // }


						while( $row = $oneri->fetch_assoc()){
						 $new_array[ $row['id']] = $row;
						}
					 shuffle($new_array);
					 $sorgu = $new_array;
					 $sayac = 0;
					 if(count($sorgu) > 0){

						 foreach ($sorgu as $result) {
							 // echo $result['kitap_adi'];
							 // echo "<br>";
							 if($result['username']==$userLoggedIn){
								 continue;
							 }
							 $sayac +=1;
							 if($sayac==5){
								 break;
							 }
							 echo "<a href=".$result['username']."> <img class='oneri_pic' src=".$result['profile_pic']."><p>".$result['first_name']."</p><p>".$result['last_name']."</p></a>";

						}
					}

			 ?>
		</div>


		<style media="screen">
			.friend_oneri{
				height: 143px !important;
				min-height: unset;
				margin-bottom: 19px;
				padding-top: 40px;
			}
			.oneri_pic{
				height: 60px;
				width: 60px;
				display: block;
				float: left;
				border-radius: 15px;
				margin-left: 30px;
			}
			.friend_oneri a{
				color: black;
			}
			.friend_oneri a:hover{
				color: grey;
			}

			.friend_oneri p {
				display: block;
				float: left;
				overflow: hidden;
				margin-left: 5px;
				margin-top: 15px;
			}
		</style>
	</div>

	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST" enctype="multipart/form-data">

			<textarea name="post_text" id="post_text" placeholder="Söyleyecek birşeylerin mi var?"></textarea>
			<input type="submit" name="post" id="post_button" value="Gönderi">
			<hr>

		</form>

		<div class="posts_area"></div>
		<!-- <button id="load_more">Load More Posts</button> -->



	</div>

	<div class="user_details column">

		<h4>Trendler</h4>

		<div class="trends">
			<?php
			$query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");

			foreach ($query as $row) {

				$word = $row['title'];
				$word_dot = strlen($word) >= 14 ? "..." : "";

				$trimmed_word = str_split($word, 14);
				$trimmed_word = $trimmed_word[0];

				echo "<div style'padding: 1px'>";
				echo $trimmed_word . $word_dot;
				echo "<br></div><br>";


			}

			?>
		</div>

	</div>
	<!-- <div class="clearfixi">
		<style media="screen">
		.clearfixi:after {
			 content: ".";
			 visibility: hidden;
			 display: block;
			 height: 0;
			 clear: both;
			}
		</style>
	</div> -->
	<div class="user_details column oneriler_kitap_col">
		<h4>Öneriler</h4>
		<div class="trends">
			<?php
			$arrayName = array();
			$arrayName = $openslopeone->getRecommendedItemsByUser($user['id']);
			//echo "$arrayName[0]";
			echo "<br>";
			//echo $openslopeone->getRecommendedItemsById(6);
			 //var_dump($openslopeone->getRecommendedItemsByUser(6));

			 foreach ($arrayName as $value) {
				 $sorgu = $con->query("SELECT books.id AS 'numara', kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id AND books.id ='$value'");
				 if ($sorgu->num_rows > 0) {
					 // output data of each row
					 $row = $sorgu->fetch_assoc();
					 // echo $row['kitap_adi']."<br>";
					 echo "
					 <a class='oneri_link' href=book_profile.php?profileBook=".$value.">
					 <div class='oneri_div'>
					 <img class='kucuk_resim' src=".$row['cover_pic'].">
					 <p >".$row['kitap_adi']."</p>
					 <p >".$row['tur_isim']."</p>
					 <p >".substr($row['baski_tarihi'],0,4)."</p>
					 <p >".$row['sayfa_sayisi']." sayfa</p>
					 </div></a>
					 <hr>
					 ";
			 } else {
					 echo "0 results";
			 }
			}
			echo "<br>";
			?>
			<style media="screen">
				.oneri_div{
					overflow: hidden;
				}
				.oneri_div p{
					float: left;
					font-size: 12px;
					display: block;
					width: 50%;
				}
				.oneri_link{
					color:#000;
				}
				.oneri_link:hover{
					color:grey;
				}
				.kucuk_resim{
					/* width: 30px; */
					float: left;
				}
			</style>
		</div>
	</div>

		<!-- <h4>Öneriler</h4> -->



	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
		//$('#load_more').on("click", function() {

			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
			//if (noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage
						$('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if

			return false;

		}); //End (window).scroll(function())


	});

	</script>




	</div>
</body>
</html>

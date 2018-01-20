<?php
include("includes/header.php");

if(isset($_GET['profileBook'])) {
	$book_id = $_GET['profileBook'];
  // echo "Book Id =>".$book_id;
  }
  else{
    // echo "gelen data yok";
  }

  // $result = $con->query("SELECT books.id AS 'numara', kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id");
$result = $con->query("SELECT books.id AS numara, kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id AND books.id = $book_id ");
$book_array = $result->fetch_assoc();

// echo $book_array['cover_pic'];
?>
 <div class="container">

 		<div class="row">
 			<div class="col-sm-3">
				<!-- Ortalama Kullanıcı Beğenisi -->
				<div class="rating-block">
					<?php
					$toplam_oy = array();
					$toplam1 =0;
					$sonuc=$con->query("SELECT rating FROM user_ratings WHERE user_ratings.item_id=".$book_array['numara']."");
					while($roww = $sonuc->fetch_assoc()){
						array_push($toplam_oy,$roww['rating']);
						$toplam=$roww['rating'];
						$toplam1 = $toplam + $toplam1;

					}
					$uzunluk=count($toplam_oy);

					$toplama=$toplam1;

					$ortalama = ($toplama/$uzunluk)*5;
					$numberAsString = number_format($ortalama, 2);?>

 					<h4><?php echo $book_array["kitap_adi"]; ?></h4>
          <img src="<?php echo $book_array['cover_pic'];?>" height="300px" width="230px" alt="">
          <h4>Ortalama Kullanıcı Beğenisi</h4>
 					<h2 class="bold padding-bottom-7"><?php echo $numberAsString; ?> <small>/ 5</small></h2>
					<form class="" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="post">
						<button type="submit"  class="btn btn-warning btn-sm" aria-label="Left Align">
	 					  <span  aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></span>
							<input type="hidden" name="puan1" value="0.2">
	 					</button>
						</form>

						<form class="" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="post">
	 					<button type="submit"  class="btn btn-warning btn-sm" aria-label="Left Align">
	 					  <span  aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></span>
							<input type="hidden" name="puan2" value="0.4">
	 					</button>
						</form>

						<form class="" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="post">
	 					<button type="submit"  class="btn btn-warning btn-sm" aria-label="Left Align">
	 					  <span  aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></span>
							<input type="hidden" name="puan3" value="0.6">
	 					</button>
						</form>

						<form class="" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="post">
	 					<button type="submit"  class="btn btn-warning btn-sm" aria-label="Left Align">
	 					  <span  aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></span>
							<input type="hidden" name="puan4" value="0.8">
	 					</button>
						</form>

						<form class="" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="post">
	 					<button type="submit"  class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
	 					  <span  aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></span>
							<input type="hidden" name="puan5" value="1.0">
	 					</button>
						</form>
						<style media="screen">
						.rating-block form {
							display: inline-block;
						}
						</style>
						<?php
												$oy=$con->query("SELECT user_id,item_id,rating FROM user_ratings WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
												$rating_array = $oy->fetch_assoc();
												if($oy->num_rows > 0){
													echo "<br>";
													$rate= $rating_array['rating'] * 5 ;
													echo "Bu kitap için $rate puan verdiniz.";
												}else{
													echo "<br>";
													echo "Bu kitap için henüz oylama yapmadınız.";
												}
												 ?>
						</div>
										<br>
										<?php
										if($oy->num_rows > 0){
											//UPDATE user_ratings SET rating=0.2 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."
											if (isset($_POST['puan1'])) {
												$number = $book_array['numara'];
												$user_id = $user['id'];

											$query = mysqli_query($con, "UPDATE user_ratings SET rating=0.2 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
											header("Refresh:0");
											}
											if (isset($_POST['puan2'])) {
												$number = $book_array['numara'];
												$user_id = $user['id'];
												$query = mysqli_query($con, "UPDATE user_ratings SET rating=0.4 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
												header("Refresh:0");
											}
											if (isset($_POST['puan3'])) {
												$number = $book_array['numara'];
												$user_id = $user['id'];
												$query = mysqli_query($con, "UPDATE user_ratings SET rating=0.6 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
												header("Refresh:0");
											}
											if (isset($_POST['puan4'])) {
												$number = $book_array['numara'];
												$user_id = $user['id'];
												$query = mysqli_query($con, "UPDATE user_ratings SET rating=0.8 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
												header("Refresh:0");
											}
											if (isset($_POST['puan5'])) {
												$number = $book_array['numara'];
												$user_id = $user['id'];
												$query = mysqli_query($con, "UPDATE user_ratings SET rating=1.0 WHERE item_id=".$book_array['numara']." AND user_id=".$user['id']."");
												header("Refresh:0");
											}

										}else{

									if (isset($_POST['puan1'])) {
										$number = $book_array['numara'];
										$user_id = $user['id'];

									$query = mysqli_query($con, "INSERT INTO user_ratings VALUES($user_id ,$number,'0.2')");
									header("Refresh:0");
									}
									if (isset($_POST['puan2'])) {
										$number = $book_array['numara'];
										$user_id = $user['id'];
										$query = mysqli_query($con, "INSERT INTO user_ratings VALUES($user_id,$number,'0.4')");
										header("Refresh:0");
									}
									if (isset($_POST['puan3'])) {
										$number = $book_array['numara'];
										$user_id = $user['id'];
										$query = mysqli_query($con, "INSERT INTO user_ratings VALUES($user_id,$number,'0.6')");
										header("Refresh:0");
									}
									if (isset($_POST['puan4'])) {
										$number = $book_array['numara'];
										$user_id = $user['id'];
										$query = mysqli_query($con, "INSERT INTO user_ratings VALUES($user_id,$number,'0.8')");
										header("Refresh:0");
									}
									if (isset($_POST['puan5'])) {
										$number = $book_array['numara'];
										$user_id = $user['id'];
										$query = mysqli_query($con, "INSERT INTO user_ratings VALUES($user_id,$number,'1.0')");
										header("Refresh:0");
									}
								}
									 ?>


									 <!--  Benzer Kitaplar -->
									 <!-- Benzer Kitaplar -->
				<div class="kitap_onerileri rating-block">
					<h4> Benzer Kitaplar </h4>
					<?php


					echo "<br>";
					//echo $openslopeone->getRecommendedItemsById(6);
					 //var_dump($openslopeone->getRecommendedItemsByUser(6));
					 $turumuz = $book_array['tur_isim'];
					 $sorgu = $con->query("SELECT books.id AS 'numara', kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id  OR books.kategori_iki =  turler.id OR books.kategori_uc =  turler.id AND turler.tur_isim = '$turumuz'  LIMIT 20 ");

						while( $row = $sorgu->fetch_assoc()){
						 $new_array[ $row['numara']] = $row;
						}

					 // $offset = 8;
					 // $length = 5;
					 // $sorgu = array_slice($new_array, $offset, $length);
					 shuffle($new_array);
					 $sorgu = $new_array;

					 if(count($sorgu) > 0){

						 foreach ($sorgu as $result) {
							 // echo $result['kitap_adi'];
							 // echo "<br>";
							 echo "
								 <a class='oneri_link' href=book_profile.php?profileBook=".$result['numara'].">
								 <div class='oneri_div'>
								 <img class='kucuk_resim' src=".$result['cover_pic'].">
								 <p >".$result['kitap_adi']."</p>
								 <p >".$result['tur_isim']."</p>
								 <p >".substr($result['baski_tarihi'],0,4)."</p>
								 <p >".$result['sayfa_sayisi']." sayfa</p>
								 </div></a>
								 <hr>
								 ";
						}

					 }
					 else {
							 echo "0 results";
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
							padding-left: 8px;
		 				}
		 				.oneri_link{
		 					color:#000;
		 				}
		 				.oneri_link:hover{
		 					color:grey;
		 				}
		 				.kucuk_resim{
		 					 width: 100px;
		 					float: left;
		 				}
		 			</style>
				</div>

 			</div>

			<!-- Beğeni Ayrıntıları  -->
 			<div class="col-sm-4">
 				<h4>Beğeni Ayrıntıları</h4>
				<?php

					$result = $con->query("SELECT user_id, kitap_adi, item_id, rating FROM user_ratings, books WHERE user_ratings.item_id=books.id AND user_ratings.item_id = $book_id");

					$bir_yildiz = array();
					$iki_yildiz = array();
					$uc_yildiz = array();
					$dort_yildiz = array();
					$bes_yildiz = array();

					if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        // echo $row['kitap_adi']."-->" .$row['user_id']."-->". ($row['rating']*10/2)."<br>";
				        if(($row['rating']*10/2)==1){
				          array_push($bir_yildiz,$row['user_id']);
				        }
				        if(($row['rating']*10/2)==2){
				          array_push($iki_yildiz,$row['user_id']);
				        }
				        if(($row['rating']*10/2)==3){
				          array_push($uc_yildiz,$row['user_id']);
				        }
				        if(($row['rating']*10/2)==4){
				          array_push($dort_yildiz,$row['user_id']);
				        }
				        if(($row['rating']*10/2)==5){
				          array_push($bes_yildiz,$row['user_id']);
				        }
				    }

				    $bes_oy_sayisi_yuzde =round((count($bes_yildiz)/26*100));
						$dort_oy_sayisi_yuzde =round((count($dort_yildiz)/26*100));
						$uc_oy_sayisi_yuzde =round((count($uc_yildiz)/26*100));
						$iki_oy_sayisi_yuzde =round((count($iki_yildiz)/26*100));
						$bir_oy_sayisi_yuzde =round((count($bir_yildiz)/26*100));

				    $bes_oy_sayisi =round((count($bes_yildiz)));
						$dort_oy_sayisi =round((count($dort_yildiz)));
						$uc_oy_sayisi =round((count($uc_yildiz)));
						$iki_oy_sayisi =round((count($iki_yildiz)));
						$bir_oy_sayisi =round((count($bir_yildiz)));

				    // echo "Bir yildiz sayisi == ".$bir_oy_sayisi_yuzde."<br>";
				    // echo "iki yildiz sayisi == ".$iki_oy_sayisi_yuzde."<br>";
				    // echo "üç yildiz sayisi == ".$uc_oy_sayisi_yuzde."<br>";
				    // echo "dört yildiz sayisi == ".$dort_oy_sayisi_yuzde."<br>";
				    // echo "beş yildiz sayisi == ".$bes_oy_sayisi_yuzde."<br>";
				    // echo $bir_oy_sayisi_yuzde+$iki_oy_sayisi_yuzde+$uc_oy_sayisi_yuzde+$dort_oy_sayisi_yuzde+$bes_oy_sayisi_yuzde;
				} else {
				    echo "0 results";
				}

				 ?>

 				<div class="pull-left">
 					<div class="pull-left" style="width:35px; line-height:1;">
 						<div style="height:9px; margin:5px 0;">5 <span ><i class="fa fa-star" aria-hidden="true"></i></span></div>	</div>
 					<div class="pull-left" style="width:180px;">
 						<div class="progress" style="height:9px; margin:8px 0;">
 						  <div class="progress-bar progress-bar-success" role="progressbar"  aria-valuemax="100" style="width:<?php echo $bes_oy_sayisi_yuzde; ?>%">
 							<span class="sr-only">80% Complete (danger)</span>
 						  </div>
 						</div>
 					</div>
 					<div class="pull-right" style="margin-left:10px;"><?php echo $bes_oy_sayisi ;?></div>
 				</div>


 				<div class="pull-left">
 					<div class="pull-left" style="width:35px; line-height:1;">
 						<div style="height:9px; margin:5px 0;">4 <span ><i class="fa fa-star" aria-hidden="true"></i></span></div>	</div>
 					<div class="pull-left" style="width:180px;">
 						<div class="progress" style="height:9px; margin:8px 0;">
 						  <div class="progress-bar progress-bar-primary" role="progressbar"  aria-valuemax="100" style="width:<?php echo $dort_oy_sayisi_yuzde; ?>%">
 							<span class="sr-only">80% Complete (danger)</span>
 						  </div>
 						</div>
 					</div>
 					<div class="pull-right" style="margin-left:10px;"><?php echo $dort_oy_sayisi ;?></div>
 				</div>


 				<div class="pull-left">
 					<div class="pull-left" style="width:35px; line-height:1;">
 						<div style="height:9px; margin:5px 0;">3 <span ><i class="fa fa-star" aria-hidden="true"></i></span></div>	</div>
 					<div class="pull-left" style="width:180px;">
 						<div class="progress" style="height:9px; margin:8px 0;">
 						  <div class="progress-bar progress-bar-info" role="progressbar"  aria-valuemax="100" style="width:<?php echo $uc_oy_sayisi_yuzde; ?>%">
 							<span class="sr-only">80% Complete (danger)</span>
 						  </div>
 						</div>
 					</div>
 					<div class="pull-right" style="margin-left:10px;"><?php echo $uc_oy_sayisi ;?></div>
 				</div>


 				<div class="pull-left">
 					<div class="pull-left" style="width:35px; line-height:1;">
 						<div style="height:9px; margin:5px 0;">2 <span ><i class="fa fa-star" aria-hidden="true"></i></span></div>	</div>
 					<div class="pull-left" style="width:180px;">
 						<div class="progress" style="height:9px; margin:8px 0;">
 						  <div class="progress-bar progress-bar-warning" role="progressbar"  aria-valuemax="100" style="width:<?php echo $iki_oy_sayisi_yuzde; ?>%">
 							<span class="sr-only">80% Complete (danger)</span>
 						  </div>
 						</div>
 					</div>
 					<div class="pull-right" style="margin-left:10px;"><?php echo $iki_oy_sayisi ;?></div>
 				</div>


 				<div class="pull-left">
 					<div class="pull-left" style="width:35px; line-height:1;">
 						<div style="height:9px; margin:5px 0;">1 <span ><i class="fa fa-star" aria-hidden="true"></i></span></div>	</div>
 					<div class="pull-left" style="width:180px;">
 						<div class="progress" style="height:9px; margin:8px 0;">
 						  <div class="progress-bar progress-bar-danger" role="progressbar"  aria-valuemax="100" style="width:<?php echo $bir_oy_sayisi_yuzde; ?>%">
 							<span class="sr-only">80% Complete (danger)</span>
 						  </div>
 						</div>
 					</div>
 					<div class="pull-right" style="margin-left:10px;"><?php echo $bir_oy_sayisi ;?></div>
 				</div>


 			</div>

			<!-- özet  -->
      <div class="col-sm-6">
        <div class="summary">
          <p>
            <?php echo $book_array['ozet'];?>
          </p>
      </div>

			<!-- Kitap Bilgileri -->
      <div class="col-sm-10">
        <div class="info">
          <h4 class="baslik"> Kitap Bilgileri </h4>
          <hr>
          <p><strong>Yazarı</strong> : <?php echo $book_array['yazar_ismi'].$book_array['yazar_soyismi']; ?></p>
          <p><strong>Tür</strong>: <?php echo $book_array['tur_isim'] ; ?></p>
          <p><strong>Basım Tarih</strong>i : <?php echo $book_array['baski_tarihi']; ?></p>
          <p><strong>Yayın Evi</strong> : <?php echo $book_array['yayinevi']; ?></p>
          <p><strong>Sayfa Sayısı</strong>: <?php echo $book_array['sayfa_sayisi'] ; ?></p>
          <p><strong>ISBN</strong>: <?php echo $book_array['isbn'] ; ?></p>

        </div>
      </div>

			<div class="row">
				<!-- Yorum bölümü  -->
	 			<div class="col-sm-12">
	 				<hr/>
	 				<div class="review-block">

						<?php
								$comment = $con->query("SELECT book_comments.id AS 'numara',baslik, post_body, posted_by, posted_book_id, date_added, removed FROM book_comments WHERE book_comments.posted_book_id=".$book_array['numara']."");
								// $comment_array = $comment->fetch_assoc();

								if ($comment->num_rows > 0) {
									// output data of each row
									while($row = $comment->fetch_assoc()) {
											$kullanici = $con->query("SELECT * FROM users WHERE ".$row['posted_by']."=users.id");
											$kullan = $kullanici->fetch_assoc();
											echo "<div class='row'>
					  						<div class='col-sm-3'>
					  							<img class ='kitap_yorum_foto' src=". $kullan['profile_pic']." class='img-rounded'>
					  							<div class='review-block-name'><a href=". $kullan['username'].">" .$kullan['first_name']." ".$kullan['last_name']."</a></div>
					  							<div class='review-block-date'><small>".$row['date_added']."</small><br/></div>
					  						</div>
					  						<div class='col-sm-9'>

					  							<div class='review-block-title'>". $row['baslik']."</div>
					  							<div class='review-block-description'>". $row['post_body']."</div>
					  						</div>
					  					</div>
					           <hr>";
									}
							} else {
									echo "Yorum yok.";
									echo "<br>";
							}

						 ?>
						 <style media="screen">
						 	.kitap_yorum_foto{
								height: 90px;
								width: 90px;
							}
						 </style>

						 <!-- YORUMLAR -->
							<div class="row">
							<div class="col-sm-12">
							<form class="post_form" action="book_profile.php?profileBook=<?php echo $book_array['numara'];?>" method="POST" enctype="multipart/form-data">
								<textarea class ="baslik" name="baslik_text" id="post_text" placeholder="baslik"></textarea>
								<style media="screen">
									.baslik{
										width: 350px !important;
										height: 40px !important;
										margin-bottom: 10px;
									}
								</style>
								<textarea name="post_text" id="post_text" placeholder="Söyleyecek birşeylerin mi var?"></textarea>
								<input type="submit" name="yolla" id="post_button" value="Gönderi">
								<hr>
							</div>
							</form>

							<div class="posts_area" </div>
							<!-- <button id="load_more">Load More Posts</button> -->
						</div>
	 				</div>

	 			</div>
	 		</div>

 		</div>








     </div> <!-- /container -->


		 <?php
		 if(isset($_POST['yolla'])){
		 	//insert post
		 	$body = strip_tags($_POST['post_text']);
			$baslik = strip_tags($_POST['baslik_text']);
		 	$added_by = $user['id'];
		 	$date_added = date("Y-m-d H:i:s");
		 	$book_to = $book_array["numara"];
		 	$query = mysqli_query($con, "INSERT INTO book_comments VALUES('','$baslik', '$body', '$added_by', '$book_to', '$date_added', 'no')");
			header("Refresh:0");

}
		  ?>
     <style media="screen">
           .btn-grey{
         background-color:#D8D8D8;
       color:#FFF;
      }
      .rating-block{
       background-color:#FAFAFA;
       border:1px solid #EFEFEF;
       padding:15px 15px 20px 15px;
       border-radius:3px;
      }
      .bold{
       font-weight:700;
      }
      .padding-bottom-7{
       padding-bottom:7px;
      }

      .review-block{
       background-color:#FAFAFA;
       border:1px solid #EFEFEF;
       padding:15px;
       border-radius:3px;
       margin-bottom:15px;
      }
      .review-block-name{
       font-size:12px;
       margin:10px 0;
      }
      .review-block-date{
       font-size:12px;
      }
      .review-block-rate{
       font-size:13px;
       margin-bottom:15px;
      }
      .review-block-title{
       font-size:15px;
       font-weight:700;
       margin-bottom:10px;
      }
      .review-block-description{
       font-size:13px;
      }
      /* custom code */
      .summary{
        margin-top: 40px;
      }
      .info .baslik{
        font-weight: bold;
        text-align: center;
        background: honeydew;
        padding-top: 5px;
        padding-bottom: 5px;
      }
      .info{
        background-color: honeydew;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-top: 10px;
        margin-top: 15px;
      }
     </style>

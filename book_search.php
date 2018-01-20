<?php
include("includes/header.php");
 ?>

 <?php
 $output = "";


if (isset($_POST['search'])) {
  $searchq = $_POST['search'] ;
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

  // $query = $con->query("SELECT * FROM books WHERE kitap_adi LIKE '%$searchq%'");
  $query = $con->query("SELECT books.id AS 'numara', kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id AND books.kitap_adi LIKE '%$searchq%' ");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = "Bir Kayıt bulunamadı";
  }else{
      // $book_array = $query->fetch_assoc();
      while($book_array = $query->fetch_assoc()) {
          $output .= "
          <a class= 'search_book' href=book_profile.php?profileBook=".$book_array['numara'].">
          <div class='kitap_cart'>
            <img src=". $book_array['cover_pic']. " alt=".$book_array['kitap_adi'].">
            <br><br>
            <p><strong>Kitap Adı</strong>:  ".$book_array['kitap_adi']. "</p>
            <p><strong>Yazarı</strong> :  ".$book_array['yazar_ismi'].$book_array['yazar_soyismi']. "</p>
            <p><strong>Tür</strong>:  ".$book_array['tur_isim']. "</p>
            <p><strong>Basım Tarih</strong>i :  ".$book_array['baski_tarihi']. "</p>
            <p><strong>Yayın Evi</strong> :  ".$book_array['yayinevi']. "</p>
            <p><strong>Sayfa Sayısı</strong>:  ".$book_array['sayfa_sayisi']. "</p>
            <p><strong>ISBN</strong>:  ".$book_array['isbn']. "</p>
          </div>
          </a>
          <br><br>";
      }
  }
}

$con->close();
?>

<form class="" action="book_search.php" method="post" id="search-form_3">
  <input type="text" class="search_3" name="search" placeholder="Kitap ara ..."/>
  <input type="submit" class="submit_3" name="" value="Ara">
</form>


<?php echo $output; ?>

<style media="screen">
    .search_book{
      color: #000;
    }
    .search_book:hover{
      color: grey;
    }
  .kitap_cart{
    background-color: #F6FFF8;
    padding: 20px;
    border-radius: 5px;
    overflow: hidden;
  }
  .kitap_cart img{
    width: 200px;
    height: 300px;
    float: left;
    padding-right: 20px;
  }

  .kitap p{
    float: left;
  }
  /* Arama Kutusu */
  /* search box*/

#search-form_3 {
background: #e1e1e1; /* Fallback color for non-css3 browsers */
width: 365px;
margin: auto;
margin-bottom: 10px;

/* Gradients */
background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);

/* Rounded Corners */
border-radius: 17px;
-webkit-border-radius: 17px;
-moz-border-radius: 17px;

/* Shadows */
box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
}

/*** TEXT BOX ***/
.search_3{
background: #fafafa; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);
border: 0;
border-bottom: 1px solid #fff;
border-right: 1px solid rgba(255,255,255,.8);
font-size: 16px;
margin: 4px;
padding: 5px;
width: 250px;

/* Rounded Corners */
border-radius: 17px;
-webkit-border-radius: 17px;
-moz-border-radius: 17px;

/* Shadows */
box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
-webkit-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
-moz-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
}

/*** USER IS FOCUSED ON TEXT BOX ***/
.search_3:focus{
outline: none;
background: #fff; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(255,255,255)), color-stop(1, rgb(235,235,235)));
background: -moz-linear-gradient( center top, rgb(255,255,255) 0%, rgb(235,235,235) 100%);
}

/*** SEARCH BUTTON ***/
.submit_3{
background: #20aae5;/* Fallback color for non-css3 browsers */
/* Gradients */
border: 0;
color: #eee;
cursor: pointer;
float: right;
font: 16px 'Raleway', sans-serif;
font-weight: bold;
height: 30px;
margin: 4px 4px 0;
text-shadow: 0 -1px 0 rgba(0,0,0,.3);
width: 84px;
outline: none;

/* Rounded Corners */
border-radius: 30px;
-webkit-border-radius: 30px;
-moz-border-radius: 30px;

/* Shadows */
box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
-moz-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.2);
-webkit-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
}
/*** SEARCH BUTTON HOVER ***/
.submit_3:hover {
background: #4ea923; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left top, left bottom, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
background: -moz-linear-gradient( center top, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}
.submit_3:active {
background: #4ea923; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
background: -moz-linear-gradient( center bottom, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}
</style>

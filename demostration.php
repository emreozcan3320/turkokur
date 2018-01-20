<?php
include("includes/header.php");

 ?>

 <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Kitaplar</h1>
        </div>


        <div align="center">
            <h3><a href="book_search.php">Kitap Ara</a></h3>

           <form class="" action="book_search.php" method="post" id="search-form_3">
             <input type="text" class="search_3" name="search" placeholder="Kitap ara ..."/>
             <input type="submit" class="submit_3" name="" value="Ara">
           </form>

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






            <button class="btn btn-default filter-button" data-filter="all">Hepsi</button>
            <button class="btn btn-default filter-button" data-filter="korkuGerilim">korku gerilim</button>
            <button class="btn btn-default filter-button" data-filter="bilimKurgu">bilim kurgu</button>
            <button class="btn btn-default filter-button" data-filter="tarih">tarih</button>
            <button class="btn btn-default filter-button" data-filter="roman">roman</button>
            <button class="btn btn-default filter-button" data-filter="edebiyat">edebiyat</button>
            <button class="btn btn-default filter-button" data-filter="felsefe">felsefe</button>
            <button class="btn btn-default filter-button" data-filter="çocuk">çocuk</button>
            <button class="btn btn-default filter-button" data-filter="kişiselGelişim">kişisel gelişim</button>
            <button class="btn btn-default filter-button" data-filter="müzik">müzik</button>
            <button class="btn btn-default filter-button" data-filter="polisiye">polisiye</button>
        </div>
        <br/>

            <?php
            $result = $con->query("SELECT books.id AS 'numara', kitap_adi, yazar_ismi, yazar_soyismi, yayinevi, baski_tarihi, sayfa_sayisi, isbn, cover_pic, kategori_bir, kategori_iki, kategori_uc, ozet, tur_isim FROM books, turler WHERE books.kategori_bir =  turler.id OR books.kategori_iki = turler.id OR books.kategori_uc = turler.id GROUP BY numara");

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  // echo "
                  // <img src=". $row['cover_pic'] ." height='100' width='80'/><br>
                  // <strong>Book id </strong>=>".$row["numara"]."<br>".
                  // "<strong>Kitap Adı</strong> =>". $row["kitap_adi"]."<br>".
                  // "<strong>Yazar İsmi</strong> =>".$row["yazar_ismi"]. " " . $row["yazar_soyismi"]."<br>".
                  // "<strong>Kitap Turu</strong> =>". $row["tur_isim"]."<br>".
                  // "<hr>";
                  if($row["tur_isim"] == "kişisel gelişim"){
                    $row["tur_isim"] = "kişiselGelişim";
                  }
                  if($row["tur_isim"] == "korku gerilim"){
                    $row["tur_isim"] = "korkuGerilim";
                  }
                  if($row["tur_isim"] == "bilim kurgu"){
                    $row["tur_isim"] = "bilimKurgu";
                  }
                  echo " <div class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ".$row["tur_isim"]."'>
                  <a href=book_profile.php?profileBook=".$row["numara"] ."><img src=".$row['cover_pic']."  height='365' width='290'></a>
                </div>";
              }
          } else {
              echo "0 results";
          }

             ?>

        </div>
    </div>


    <style media="screen">
    .wrapper{
          width: unset;
    }
      .gallery-title
        {
          font-size: 36px;
          color: #42B32F;
          text-align: center;
          font-weight: 500;
          margin-bottom: 70px;
        }
        .gallery-title:after {
          content: "";
          position: absolute;
          width: 7.5%;
          left: 46.5%;
          height: 45px;
          border-bottom: 1px solid #5e5e5e;
        }
        .filter-button
        {
          font-size: 18px;
          border: 1px solid #42B32F;
          border-radius: 5px;
          text-align: center;
          color: #42B32F;
          margin-bottom: 30px;

        }
        .filter-button:hover
        {
          font-size: 18px;
          border: 1px solid #42B32F;
          border-radius: 5px;
          text-align: center;
          color: #ffffff;
          background-color: #42B32F;

        }
        .btn-default:active .filter-button:active
        {
          background-color: #42B32F;
          color: white;
        }

        .port-image
        {
          width: 100%;
        }

        .gallery_product
        {
          margin-bottom: 30px;
        }
    </style>

    <script type="text/javascript">
    $(document).ready(function(){

  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');

      if(value == "all")
      {
          //$('.filter').removeClass('hidden');
          $('.filter').show('1000');
      }
      else
      {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
          $(".filter").not('.'+value).hide('3000');
          $('.filter').filter('.'+value).show('3000');

      }
  });

  if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
    </script>

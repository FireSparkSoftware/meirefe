<?php
// Burası düzenlenmelidir.
$gidecek_eposta = 'insankaynaklari@meirefe.com.tr'; // E-Posta'nın gideceği adres
$kimden_eposta = 'musteri@meirefe.com.tr'; // E-Posta'nın kimden gideceği adres

foreach ($_POST as $key => $value) {
  $_POST[$key] = htmlspecialchars(trim($value));
}
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
  if ( !empty($_POST['ad']) and !empty($_POST['soyad']) and !empty($_POST['eposta']) and !empty($_POST['iletisim_konu']) and !empty($_POST['mesaj']) ){
    $posta_icerik = '<h1>Yeni İletişim Formu</h1><br>
<h4><u><b>Bilgi almak istediği kategori</b></u>: '.$_POST['iletisim_konu'].'</h4>
<h2>Kişisel Bilgileri</h2>
<p><u><b>Adı</b></u>: '.$_POST['ad'].'</p>
<p><u><b>Soyadı</b></u>: '.$_POST['soyad'].'</p>
<p><u><b>GSM numarası</b></u>: '.$_POST['gsm_nu'].'</p>
<p><u><b>E-Posta adresi</b></u>: '.$_POST['eposta'].'</p><br>
<h2>Mesajı</h2>
<p>'.$_POST['mesaj'].'</p>';
    $basliklar = 'MIME-Version: 1.0' . "\r\n";
    $basliklar .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $basliklar .= 'From: ' .$kimden_eposta. "\r\n";
    mail($gidecek_eposta, 'Yeni İletişim Formu - '.$_POST['ad'].' '.$_POST['soyad'], $posta_icerik, $basliklar);
    $donen_cevap = '<div class="row" id="donen_cevap"> <div class="col s12"> <div class="card green" onclick="$(\'#donen_cevap\').hide()" style="cursor:pointer"> <div class="card-content white-text"> <p class="center-align">İletişim formunuz başarıyla gönderildi.</p> </div> </div> </div> </div>';
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"	media="screen,projection"/>
	  <title>MEİREFE OTOMOTİV MADENCİLİK İNŞAAT SANAYİ VE DIŞ TİCARET A.Ş.</title>

  </head>
  <body data-gr-c-s-loaded="true" style="background-color: #d8d8d8;">
  <nav role="navigation" class="grey lighten-0">
    <div class="nav-wrapper container"><a href="#" id="logo-container" class="brand-logo"><img src="resim/logo.png" height="60"></a>
      <ul class="right hide-on-med-and-down">
		<li><a href="https://meirefe.com.tr/maden/hakkimizda.html">Hakkımızda</a></li>
		<li><a href="https://meirefe.com.tr/maden/insankaynaklari.php">İnsan Kaynakları</a></li>
		<li><a href="https://meirefe.com.tr/maden/iletisim.php">İletişim</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">

        <li><a href="https://meirefe.com.tr">Anasayfa</a></li>
		<li><a href="https://meirefe.com.tr/maden/hakkimizda.html">Hakkımızda</a></li>
		<li><a href="https://meirefe.com.tr/maden/insankaynaklari.php">İnsan Kaynakları</a></li>
		<li><a href="https://meirefe.com.tr/maden/iletisim.php">İletişim</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
 <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">MEİREFE A.Ş.</h1>
        <div class="row center">
          <h5 class="header col white-text s12 light">Esaslı bir iş için.</h5>
        </div>
        
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="arka1.png" style="display: block; transform: translate3d(-50%, 288px, 0px);"></div>
  </div>

	  <div class="container">
    <div class="section">
	<div class="left col l3 s12">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1503.96700700786!2d29.01532690057845!3d41.07043499816986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab6443a5849d5%3A0xcf1c11729d5202f3!2zTUXEsFJFRkUgT1RPTU9UxLBWIE1BREVOQ8SwTMSwSyDEsE7FnkFBVCBTQU5BWcSwIFZFIERJxZ4gVMSwQ0FSRVQgQS7Fni4!5e0!3m2!1str!2str!4v1507926262554" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>     </div>  <div class="row">
        <div style="" class="right s12">
          <h5 class="black-text">Bize Ulaşın</h5>
          <ul>
            <li><a class="black-text bold"> <i class="material-icons">phone</i> 0212 3378886</a></li>
            <li><a class="black-text bold"><i class="material-icons">home</i> Nispetiye Mah. Gazi Güçar Sok. Uygur Apt. NO:4/A Beiktaş,İSTANBUL</a></li>
            <li><a class="black-text bold"><i class="material-icons">mail</i> info@meirefe.com.tr</a></li>
          </ul>
        </div>
      </div>

    </div>
    <br><br>
  </div>
    <div class="divider"></div>

    <div class="container">
      <form action="iletisim.php" method="post" enctype="multipart/form-data" id="iletisim_formu">
      <div class="row">
        <div class="col s12">
          <?php echo $donen_cevap; ?>
          <div class="section">
            <h4>İletişim Formu</h4>
            <div class="row">
              <div class="input-field col s6">
                <input id="ad" type="text" class="validate" name="ad" required="">
                <label for="ad">Adınız</label>
              </div>
              <div class="input-field col s6">
                <input id="soyad" type="text" class="validate" name="soyad" required="">
                <label for="soyad">Soyadınız</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="eposta" type="text" class="validate" name="eposta" required="">
                <label for="eposta">E-Posta adresiniz</label>
              </div>
              <div class="input-field col s4">
                <input id="gsm_nu" type="text" class="validate" name="gsm_nu">
                <label for="gsm_nu">GSM numaranız</label>
              </div>
              <div class="input-field col s4">
                <select name="iletisim_konu">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Ürün Satış">Ürün Satış</option>
                  <option value="Destek">Destek</option>
                  <option value="Öneri">Öneri</option>
                </select>
                <label>Hangi konu hakkında iletişim kurmak istediniz?</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="mesaj" class="materialize-textarea" name="mesaj" required=""></textarea>
                <label for="mesaj">Mesajınız</label>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="row">
              <div class="col s12 center-align">
                <a class="waves-effect waves-light btn-large" id="formu_gonder" onclick="formu_gonder()"><i class="material-icons right">send</i>Mesajı Gönder</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
    <div id="uyari_modal" class="modal">
      <div class="modal-content">
        <h4>Bir hata oluştu!</h4>
        <div id="uyari_icerik"></div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tamam</a>
      </div>
    </div>
	          
	  <footer class="page-footer black">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Destek</h5>
          <p class="grey-text text-lighten-4">Herhangi bir durumda oluşabilecek sorunda veya ürünlerimiz hakkında daha ayrıntılı bilgi istemeniz durumunda bize telefon veya e-posta ile ulaşabilirsiniz. </p>
			<a id="logo-container" class="left brand-logo"><img src="resim/iso.png" height="42"> <img src="resim/germany.jpg" height="42"> <img src="resim/cekic.png" height="42"> </a>

        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Sayfalar</h5>
          <ul>
            <li><a class="white-text" href="https://meirefe.com.tr">Anasayfa</a></li>
            <li><a class="white-text" href="https://meirefe.com.tr/maden/hakkimizda.html">Hakkımızda</a></li>
			<li><a class="white-text" href="https://meirefe.com.tr/maden/insankaynaklari.php">İnsan Kaynakları</a></li>
            <li><a class="white-text" href="https://meirefe.com.tr/maden/iletisim.php">İletişim</a></li>
          </ul>
        </div>
		
        <div class="col l3 s12">
          <h5 class="white-text">Bize Ulaşın</h5>
          <ul>
            <li><a class="white-text"> <i class="material-icons">phone</i> 0212 3378886</a></li>
            <li><a class="white-text"><i class="material-icons">home</i> Nispetiye Mah. Gazi Güçar Sok. Uygur</a></li>
			<li><a class="white-text">    Apt. NO:4/A Beiktaş,İSTANBUL</a></li>
            <li><a class="white-text"><i class="material-icons">mail</i> info@meirefe.com.tr</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center"><a class="white-text">MEİREFE 2017</a>
      </div>
    </div>
  </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
      $("document").ready(function(){
        $('select').material_select();
        $('.modal').modal();
      });
      function formu_gonder(){
        var hata_mesaji="";
        if ( $("input[name=ad]")[0].value.trim() == "" ){
          hata_mesaji += "Ad kısmı, ";
        }
        if ( $("input[name=soyad]")[0].value.trim() == "" ){
          hata_mesaji += "Soyad kısmı, ";
        }
        if ( $("input[name=eposta]")[0].value.trim() == "" ){
          hata_mesaji += "E-Posta kısmı, ";
        }
        if ( $("select[name=iletisim_konu]")[0].value.trim() == "" ){
          hata_mesaji += "İletişim konusu kısmı, ";
        }
        if ( $("textarea[name=mesaj]")[0].value.trim() == "" ){
          hata_mesaji += "Mesaj kısmı, ";
        }

        if ( hata_mesaji != "" ){
          $("#uyari_icerik").html("<p>"+hata_mesaji+"boş bırakılamaz.</p>");
          $("#uyari_modal").modal("open");
        }else{
          $("#iletisim_formu")[0].submit();
        }
      }
    </script>
  </body>
</html>
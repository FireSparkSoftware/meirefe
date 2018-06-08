<?php
//Bu script Fire Spark Software adına lisanslıdır. İzinsiz kullanımı yasaktır.
// Uyarı: Özgeçmişlerin tutulduğu klasör (ozgecmis_dosya)'nın
// yetkisi: rwxrwxrwx (0777) olmalıdır.

// Burası düzenlenmelidir.
$site_adi = 'https://meirefe.com.tr/insaat'; // Protokol (http, https) belirtilmeli
$gidecek_eposta = 'insankaynaklari@meirefe.com.tr'; // E-Posta'nın gideceği adres

foreach ($_POST as $key => $value) {
  $_POST[$key] = htmlspecialchars(trim($value));
}
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
  if ( !empty($_POST['ad']) and !empty($_POST['soyad']) and !empty($_POST['dogum_tarihi']) and !empty($_POST['cinsiyet']) and !empty($_POST['medeni_durum']) and !empty($_POST['askerlik']) and !empty($_POST['surucu_belgesi']) and !empty($_POST['talep_edilen_is']) and !empty($_POST['talep_edilen_ucret']) and !empty($_POST['vardiya']) and !empty($_POST['gsm_nu']) and !empty($_POST['eposta']) and !empty($_POST['adres']) ){
    $posta_icerik = '';
    $posta_icerik .= '<h1>Yeni Başvuru</h1>
<h2>Kişisel Bilgileri</h2>
<p><u><b>Adı</b></u>: '.$_POST['ad'].'</p>
<p><u><b>Soyadı</b></u>: '.$_POST['soyad'].'</p>
<p><u><b>Doğum Tarihi</b></u>: '.$_POST['dogum_tarihi'].'</p>
<p><u><b>Doğum Yeri</b></u>: '.$_POST['dogum_yeri'].'</p>
<p><u><b>Cinsiyeti</b></u>: '.$_POST['cinsiyet'].'</p>
<p><u><b>Medeni Durumu</b></u>: '.$_POST['medeni_durum'].'</p>
<p><u><b>Askerlik Durumu</b></u>: '.$_POST['askerlik'].'</p>
<p><u><b>Sürücü Belgesi</b></u>: '.$_POST['surucu_belgesi'].' <u><b>Sınıfı</b></u>: '.$_POST['surucu_belgesi_sinifi'].'</p>
<p><u><b>Çocuk Sayısı</b></u>: '.$_POST['cocuk_sayisi'].'</p><br>
<h2>Talep Ettiği İşle İlgili Bilgileri</h2>
<p><u><b>Talep Edilen İş</b></u>: '.$_POST['talep_edilen_is'].'</p>
<p><u><b>Talep Edilen Ücret</b></u>: '.$_POST['talep_edilen_ucret'].'</p>
<p><u><b>Vardiya Durumu</b></u>: '.$_POST['vardiya'].'</p>
<p><u><b>Telefon Numarası</b></u>: '.$_POST['telefon_nu'].'</p>
<p><u><b>GSM numarası</b></u>: '.$_POST['gsm_nu'].'</p>
<p><u><b>E-Posta adresi</b></u>: '.$_POST['eposta'].'</p>
<p><u><b>Adresi</b></u>: '.$_POST['adres'].'</p><br>
<h2>Öğrenim Bilgileri</h2>
';
    for ($i=1; true; $i++) {
      if ( isset($_POST['okul_adi_'.$i]) ){
        if ( isset($_POST['okul_'.$i]) and !empty($_POST['okul_'.$i]) and !empty($_POST['okul_adi_'.$i]) ){
          $posta_icerik .= '<p>('.$_POST['okul_'.$i].') <u><b>Okulun Adı</b></u>: '.$_POST['okul_adi_'.$i].' <u><b>Okuduğu Bölüm</b></u>: '.$_POST['okul_bolum_'.$i].' <u><b>Mezun Olduğu Tarih</b></u>: '.$_POST['okul_tarih_'.$i].' <u><b>Mezuniyet Notu</b></u>: '.$_POST['okul_not_'.$i].'</p>
';
        }
      }else{
        break;
      }
    }
    $posta_icerik .= '<br><h3>Kurs ve Seminerler</h3>';
    for ($i=1; true; $i++) {
      if ( isset($_POST['kurs_konusu_'.$i]) ){
        if ( !empty($_POST['kurs_konusu_'.$i]) ){
          $posta_icerik .= '<p><u><b>Kursun Konusu</b></u>: '.$_POST['kurs_konusu_'.$i].' <u><b>Kursu Veren Kurum</b></u>: '.$_POST['kurs_kurum_'.$i].' <u><b>Aldığı Tarih</b></u>: '.$_POST['kurs_tarih_'.$i].'</p>
';
        }
      }else{
        break;
      }
    }
    $posta_icerik .= '<br><h2>Nitelikleri</h2>
<p>'.$_POST['nitelikler'].'</p><br>
<h2>Yabancı Dil Bilgileri</h2>
';
    for ($i=1; true; $i++) { 
      if ( isset($_POST['dil_'.$i]) ){
        if ( !empty($_POST['dil_'.$i]) ){
          $posta_icerik .= '<p><u><b>'.$_POST['dil_'.$i].'</b></u>:  <b>Okuma</b>: '.$_POST['dil_okuma_'.$i].' <b>Yazma</b>: '.$_POST['dil_yazma_'.$i].' <b>Konuşma</b>: '.$_POST['dil_konusma_'.$i].'</p>
';
        }
      }else{
        break;
      }
    }
    $posta_icerik .= '<br><h2>Daha Önceki İş Tecrübeleri</h2>
';
    for ($i=1; true; $i++) { 
      if ( isset($_POST['is_yeri_'.$i]) ){
        if ( !empty($_POST['is_yeri_'.$i]) ){
          $posta_icerik .= '<p><u><b>İş yeri</b></u>: '.$_POST['is_yeri_'.$i].', <u><b>Pozisyonu</b></u>: '.$_POST['is_yeri_gorev_'.$i].', <u><b>Başlama Tarihi</b></u>: '.$_POST['is_baslangic_'.$i].', <u><b>Ayrılma Tarihi</b></u>: '.$_POST['is_bitis_'.$i].', <u><b>İş Ücreti</b></u>: '.$_POST['is_ucret_'.$i].', <u><b>Ayrılma</b></u>: '.$_POST['is_ayrilma_nedeni_'.$i].', </p>
';
        }
      }else{
        break;
      }
    }
    $posta_icerik .= '<br><h2>Referansları</h2>
';
    for ($i=1; true; $i++) { 
      if ( isset($_POST['ref_'.$i]) ){
        if ( !empty($_POST['ref_'.$i]) ){
          $posta_icerik .= '<p><u><b>Adı</b></u>: '.$_POST['ref_'.$i].', <u><b>Pozisyonu</b></u>: '.$_POST['ref_pozisyon_'.$i].', <u><b>Bulunduğu Firma</b></u>: '.$_POST['ref_firma_'.$i].', <u><b>Telefonu</b></u>: '.$_POST['ref_telefon_'.$i].'</p>
';
        }
      }else{
        break;
      }
    }
    $posta_icerik .= '<br><h2>Özel Mesajı</h2>
<p>'.$_POST['ozel_mesaj'].'</p>
';
    if ( $_FILES["ozgecmis_dosya"]["name"] and !($_FILES["ozgecmis_dosya"]["size"] > 4194304) and in_array(end(explode('.', $_FILES['ozgecmis_dosya']['name'])), array('doc','docx','pdf')) ){
      $dosya_adi = $_POST['ad'].'-'.$_POST['soyad'].'_'.date('d-m-Y_H-i-s').'.'.end(explode('.', $_FILES['ozgecmis_dosya']['name']));
      $tasi = move_uploaded_file($_FILES["ozgecmis_dosya"]["tmp_name"], './ozgecmis_dosya/'.$dosya_adi);
      if ( $tasi ){
        $posta_icerik .= '<br><h4>Kullanıcının özgeçmiş dosyası: <a href="'.$site_adi.'/ozgecmis_dosya/'.$dosya_adi.'">'.$site_adi.'/ozgecmis_dosya/'.$dosya_adi.'</a></h4>';
      }
    }
	$basliklar = 'MIME-Version: 1.0' . "\r\n";
	$basliklar .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$basliklar .= 'From: insankaynaklari@meirefe.com.tr' . "\r\n";
    mail($gidecek_eposta, 'Yeni Başvuru - '.$_POST['ad'].' '.$_POST['soyad'], $posta_icerik, $basliklar);
    $donen_cevap = '<div class="row" id="donen_cevap"> <div class="col s12"> <div class="card green" onclick="$(\'#donen_cevap\').hide()" style="cursor:pointer"> <div class="card-content white-text"> <p class="center-align">Başvurunuz başarıyla gönderildi.</p> </div> </div> </div> </div>';
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
		<li><a href="https://meirefe.com.tr/insaat/hakkimizda.html">Hakkımızda</a></li>
		<li><a href="https://meirefe.com.tr/insaat/insankaynaklari.php">İnsan Kaynakları</a></li>
		<li><a href="https://meirefe.com.tr/insaat/iletisim.php">İletişim</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">

        <li><a href="https://meirefe.com.tr">Anasayfa</a></li>
		<li><a href="https://meirefe.com.tr/insaat/hakkimizda.html">Hakkımızda</a></li>
		<li><a href="https://meirefe.com.tr/insaat/insankaynaklari.php">İnsan Kaynakları</a></li>
		<li><a href="https://meirefe.com.tr/insaat/iletisim.php">İletişim</a></li>
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
      <form action="insankaynaklari.php" method="post" enctype="multipart/form-data" id="basvuru_formu">
      <div class="row">
        <div class="col s12">
          <?php echo $donen_cevap; ?>
          <div class="section">
            <h4>Kişisel Bilgiler</h4>
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
              <div class="input-field col s6">
                <input id="dogum_tarihi" type="text" class="datepicker" name="dogum_tarihi" required="">
                <label for="dogum_tarihi">Doğum Tarihiniz</label>
              </div>
              <div class="input-field col s6">
                <input id="dogum_yeri" type="text" class="validate" name="dogum_yeri">
                <label for="dogum_yeri">Doğum Yeriniz</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <select name="cinsiyet">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Bay">Bay</option>
                  <option value="Bayan">Bayan</option>
                </select>
                <label>Cinsiyetiniz</label>
              </div>
              <div class="input-field col s4">
                <select name="medeni_durum">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Evli">Evli</option>
                  <option value="Bekar">Bekar</option>
                </select>
                <label>Medeni Durumunuz</label>
              </div>
              <div class="input-field col s4">
                <select name="askerlik">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="1 yıla kadar tecilli">1 yıla kadar tecilli</option>
                  <option value="2 yıla kadar tecilli">2 yıla kadar tecilli</option>
                  <option value="2 yıldan fazla tecilli">2 yıldan fazla tecilli</option>
                  <option value="Tamamlandı">Tamamlandı</option>
                  <option value="Muaf">Muaf</option>
                </select>
                <label>Askerlik Durumunuz</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <select name="surucu_belgesi">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Var">Var</option>
                  <option value="Yok">Yok</option>
                </select>
                <label>Sürücü Belgeniz</label>
              </div>
              <div class="input-field col s2">
                <select name="surucu_belgesi_sinifi">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                </select>
                <label>Sınıfınız</label>
              </div>
              <div class="input-field col s6">
                <input id="cocuk_sayisi" type="number" class="validate" name="cocuk_sayisi" required="">
                <label for="cocuk_sayisi">Kaç çocuğa sahipsiniz?</label>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Talep Ettiğiniz İşle İlgili Bilgiler</h4>
            <div class="row">
              <div class="input-field col s5">
                <select name="talep_edilen_is">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Araştırma ve Geliştirme">Araştırma ve Geliştirme</option>
                  <option value="İdari İşler ve Sekreterya">İdari İşler ve Sekreterya</option>
                  <option value="İnsan Kaynakları">İnsan Kaynakları</option>
                  <option value="Kalite Güvence">Kalite Güvence</option>
                  <option value="İthalat ve İhracat">İthalat ve İhracat</option>
                  <option value="Muhasebe">Muhasebe</option>
                  <option value="Halkla İlişkiler ve Reklam">Halkla İlişkiler ve Reklam</option>
                  <option value="Satınalma ve Lojistik">Satınalma ve Lojistik</option>
                  <option value="Satış ve Pazarlama">Satış ve Pazarlama</option>
                  <option value="Üretim">Üretim</option>
                </select>
                <label>İstediğiniz İş</label>
              </div>
              <div class="input-field col s5">
                <input id="talep_edilen_ucret" type="number" class="validate" name="talep_edilen_ucret" required="">
                <label for="talep_edilen_ucret">Talep ettiğiniz ücret</label>
              </div>
              <div class="input-field col s2">
                <select name="vardiya">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="Evet">Evet</option>
                  <option value="Hayır">Hayır</option>
                </select>
                <label>Vardiyalı çalışır mısınız?</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="telefon_nu" type="text" class="validate" name="telefon_nu">
                <label for="telefon_nu">Telefon numaranız</label>
              </div>
              <div class="input-field col s6">
                <input id="gsm_nu" type="text" class="validate" name="gsm_nu" required="">
                <label for="gsm_nu">GSM numaranız</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="eposta" type="text" class="validate" name="eposta" required="">
                <label for="eposta">E-Posta adresiniz</label>
              </div>
              <div class="input-field col s6">
                <textarea id="adres" class="materialize-textarea" name="adres" required=""></textarea>
                <label for="adres">Adresiniz</label>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Öğrenim Durumunuzla İlgili Bilgiler</h4>
            <div class="row">
              <p class="col s12">Gereksiz ve yanlış açılan satırları silmek için, satırı boş bırakmanız yeterlidir. Sistem bu satırları görmezden gelecektir.</p>
            </div>
            <div class="row">
              <div class="col s2">
                <p class="center-align">Türü</p>
              </div>
              <div class="col s3">
                <p class="center-align">Adı</p>
              </div>
              <div class="col s3">
                <p class="center-align">Bölüm</p>
              </div>
              <div class="col s2">
                <p class="center-align">Mezuniyet Tarihi</p>
              </div>
              <div class="col s2">
                <p class="center-align">Mezuniyet Notu</p>
              </div>
            </div>
            <div id="okul_bilgileri" style="margin:0;padding:0">
              <div class="row">
                <div class="input-field col s2">
                  <select name="okul_1">
                    <option value="" disabled selected>Seçiniz</option>
                    <option value="İlkokul">İlkokul</option>
                    <option value="Ortaokul">Ortaokul</option>
                    <option value="Lise">Lise</option>
                    <option value="Üniversite">Üniversite</option>
                    <option value="Yüksek Lisans / Doktora">Yüksek Lisans / Doktora</option>
                  </select>
                </div>
                <div class="input-field col s3">
                  <input id="okul_adi_1" type="text" class="validate" name="okul_adi_1">
                </div>
                <div class="input-field col s3">
                  <input id="okul_bolum_1" type="text" class="validate" name="okul_bolum_1">
                </div>
                <div class="input-field col s2">
                  <input id="okul_tarih_1" type="text" class="datepicker" name="okul_tarih_1">
                </div>
                <div class="input-field col s2">
                  <input id="okul_not_1" type="text" class="validate" name="okul_not_1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center-align">
                <a id="okul_bilgisi_ekle" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
            </div>
            <h5>Kurs ve Seminerler</h5>
            <div class="row">
              <p class="col s12">Gereksiz ve yanlış açılan satırları silmek için, satırı boş bırakmanız yeterlidir. Sistem bu satırları görmezden gelecektir.</p>
            </div>
            <div class="row">
              <div class="col s4">
                <p class="center-align">Konusu</p>
              </div>
              <div class="col s4">
                <p class="center-align">Alınan Kurum</p>
              </div>
              <div class="col s4">
                <p class="center-align">Tarih</p>
              </div>
            </div>
            <div id="kurs_bilgileri" style="margin:0;padding:0">
              <div class="row">
                <div class="input-field col s4">
                  <input id="kurs_konusu_1" type="text" class="validate" name="kurs_konusu_1">
                </div>
                <div class="input-field col s4">
                  <input id="kurs_kurum_1" type="text" class="validate" name="kurs_kurum_1">
                </div>
                <div class="input-field col s4">
                  <input id="kurs_tarih_1" type="text" class="datepicker" name="kurs_tarih_1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center-align">
                <a id="kurs_bilgisi_ekle" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
            </div>
            <h5>Nitelikleriniz</h5>
            <div class="row">
              <div class="input-field col s8">
                <textarea id="nitelikler" class="materialize-textarea" name="nitelikler"></textarea>
                <label for="nitelikler">Nitelikleriniz</label>
              </div>
              <div class="col s4">
                <p>Bildiğiniz programlar, işletim sistemleri, ofis, muhasebe programları gibi niteliklerinizi yazınız.</p>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Yabancı Dil Bilginiz</h4>
            <div class="row">
              <p class="col s12">Gereksiz ve yanlış açılan satırları silmek için, satırı boş bırakmanız yeterlidir. Sistem bu satırları görmezden gelecektir.</p>
            </div>
            <div class="row">
              <div class="col s3">
                <p class="center-align">Dil</p>
              </div>
              <div class="col s3">
                <p class="center-align">Okuma</p>
              </div>
              <div class="col s3">
                <p class="center-align">Yazma</p>
              </div>
              <div class="col s3">
                <p class="center-align">Konuşma</p>
              </div>
            </div>
            <div id="dil_bilgileri" style="margin:0;padding:0">
              <div class="row">
                <div class="input-field col s3">
                  <input id="dil_1" type="text" class="validate" name="dil_1">
                </div>
                <div class="input-field col s3">
                  <select name="dil_okuma_1">
                    <option value="" disabled selected>Seçiniz</option>
                    <option value="Başlangıç">Başlangıç</option>
                    <option value="Orta">Orta</option>
                    <option value="İyi">İyi</option>
                    <option value="Çok iyi">Çok iyi</option>
                  </select>
                </div>
                <div class="input-field col s3">
                  <select name="dil_yazma_1">
                    <option value="" disabled selected>Seçiniz</option>
                    <option value="Başlangıç">Başlangıç</option>
                    <option value="Orta">Orta</option>
                    <option value="İyi">İyi</option>
                    <option value="Çok iyi">Çok iyi</option>
                  </select>
                </div>
                <div class="input-field col s3">
                  <select name="dil_konusma_1">
                    <option value="" disabled selected>Seçiniz</option>
                    <option value="Başlangıç">Başlangıç</option>
                    <option value="Orta">Orta</option>
                    <option value="İyi">İyi</option>
                    <option value="Çok iyi">Çok iyi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center-align">
                <a id="dil_bilgisi_ekle" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>İş Deneyimleriniz</h4>
            <div class="row">
              <p class="col s12">Gereksiz ve yanlış açılan satırları silmek için, satırı boş bırakmanız yeterlidir. Sistem bu satırları görmezden gelecektir.</p>
            </div>
            <div class="row">
              <div class="col s2">
                <p class="center-align">İş Yeri Adı</p>
              </div>
              <div class="col s2">
                <p class="center-align">Pozisyon</p>
              </div>
              <div class="col s2">
                <p class="center-align">İşe Başlama Tarihi</p>
              </div>
              <div class="col s2">
                <p class="center-align">İşten Ayrılma Tarihi</p>
              </div>
              <div class="col s2">
                <p class="center-align">Aylık Ücret</p>
              </div>
              <div class="col s2">
                <p class="center-align">Ayrılma Nedeni</p>
              </div>
            </div>
            <div id="is_bilgileri" style="margin:0;padding:0">
              <div class="row">
                <div class="input-field col s2">
                  <input id="is_yeri_1" type="text" class="validate" name="is_yeri_1">
                </div>
                <div class="input-field col s2">
                  <input id="is_yeri_gorev_1" type="text" class="validate" name="is_yeri_gorev_1">
                </div>
                <div class="input-field col s2">
                  <input id="is_baslangic_1" type="text" class="datepicker" name="is_baslangic_1">
                </div>
                <div class="input-field col s2">
                  <input id="is_bitis_1" type="text" class="datepicker" name="is_bitis_1">
                </div>
                <div class="input-field col s2">
                  <input id="is_ucret_1" type="number" class="validate" name="is_ucret_1">
                </div>
                <div class="input-field col s2">
                  <input id="is_ayrilma_nedeni_1" type="text" class="validate" name="is_ayrilma_nedeni_1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center-align">
                <a id="is_bilgisi_ekle" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Referanslarınız</h4>
            <div class="row">
              <p class="col s12">Gereksiz ve yanlış açılan satırları silmek için, satırı boş bırakmanız yeterlidir. Sistem bu satırları görmezden gelecektir.</p>
            </div>
            <div class="row">
              <div class="col s4">
                <p class="center-align">Adı Soyadı</p>
              </div>
              <div class="col s3">
                <p class="center-align">Pozisyonu</p>
              </div>
              <div class="col s3">
                <p class="center-align">Bulunduğu Firma</p>
              </div>
              <div class="col s2">
                <p class="center-align">Telefon</p>
              </div>
            </div>
            <div id="ref_bilgileri" style="margin:0;padding:0">
              <div class="row">
                <div class="input-field col s4">
                  <input id="ref_1" type="text" class="validate" name="ref_1">
                </div>
                <div class="input-field col s3">
                  <input id="ref_pozisyon_1" type="text" class="validate" name="ref_pozisyon_1">
                </div>
                <div class="input-field col s3">
                  <input id="ref_firma_1" type="text" class="validate" name="ref_firma_1">
                </div>
                <div class="input-field col s2">
                  <input id="ref_telefon_1" type="text" class="validate" name="ref_telefon_1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center-align">
                <a id="ref_bilgisi_ekle" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Özel Mesajınız</h4>
            <div class="row">
              <div class="input-field col s8">
                <textarea id="ozel_mesaj" class="materialize-textarea" name="ozel_mesaj"></textarea>
                <label for="ozel_mesaj">Özel Mesajınız</label>
              </div>
              <div class="col s4">
                <p>Formda yer almayan konularda eklemek istediğiniz bilgileri yazabilirsiniz.</p>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h4>Özgeçmişiniz</h4>
            <div class="row">
              <p class="col s12">Sadece .pdf, .doc, ve .docx kabul edilir. Max 4MB yükleme yapabilirsiniz.</p>
            </div>
            <div class="row">
              <div class="file-field input-field col s8">
                <div class="btn">
                  <span>Dosya</span>
                  <input type="file" name="ozgecmis_dosya" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <div class="col s4">
                <p>Eklemek istediğiniz özgeçmişiniz varsa buradan yükleyebilirsiniz.</p>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="row">
              <div class="col s12 center-align">
                <!--<button class="btn waves-effect waves-light btn-large" type="submit">Başvuruda Bulun
                  <i class="material-icons right">send</i>
                </button>-->
                <a class="waves-effect waves-light btn-large" id="formu_gonder" onclick="formu_gonder()"><i class="material-icons right">send</i>Başvuruda Bulun</a>
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
            <li><a class="white-text" href="https://meirefe.com.tr/insaat/hakkimizda.html">Hakkımızda</a></li>
			<li><a class="white-text" href="https://meirefe.com.tr/insaat/insankaynaklari.php">İnsan Kaynakları</a></li>
            <li><a class="white-text" href="https://meirefe.com.tr/insaat/iletisim.php">İletişim</a></li>
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
  $('.modal').modal();
  dom_setup();

  var okul_bilgileri = 1;
  var kurs_bilgileri = 1;
  var dil_bilgileri = 1;
  var is_bilgileri = 1;
  var ref_bilgileri = 1;
  $("#okul_bilgisi_ekle").click(function(){
    okul_bilgileri++;
    $("#okul_bilgileri").append(`<div class="row"> <div class="input-field col s2"> <select name="okul_${okul_bilgileri}"> <option value="" disabled selected>Seçiniz</option> <option value="İlkokul">İlkokul</option> <option value="Ortaokul">Ortaokul</option> <option value="Lise">Lise</option> <option value="Üniversite">Üniversite</option> <option value="Yüksek Lisans / Doktora">Yüksek Lisans / Doktora</option> </select> </div> <div class="input-field col s3"> <input id="okul_adi_${okul_bilgileri}" type="text" class="validate" name="okul_adi_${okul_bilgileri}"> </div> <div class="input-field col s3"> <input id="okul_bolum_${okul_bilgileri}" type="text" class="validate" name="okul_bolum_${okul_bilgileri}"> </div> <div class="input-field col s2"> <input id="okul_tarih_${okul_bilgileri}" type="text" class="datepicker" name="okul_tarih_${okul_bilgileri}"> </div> <div class="input-field col s2"> <input id="okul_not_${okul_bilgileri}" type="text" class="validate" name="okul_not_${okul_bilgileri}"> </div> </div>`);
    dom_setup();
  });
  $("#kurs_bilgisi_ekle").click(function(){
    kurs_bilgileri++;
    $("#kurs_bilgileri").append(`<div class="row"> <div class="input-field col s4"> <input id="kurs_konusu_${kurs_bilgileri}" type="text" class="validate" name="kurs_konusu_${kurs_bilgileri}"> </div> <div class="input-field col s4"> <input id="kurs_kurum_${kurs_bilgileri}" type="text" class="validate" name="kurs_kurum_${kurs_bilgileri}"> </div> <div class="input-field col s4"> <input id="kurs_tarih_${kurs_bilgileri}" type="text" class="datepicker" name="kurs_tarih_${kurs_bilgileri}"> </div> </div>`);
    dom_setup();
  });
  $("#dil_bilgisi_ekle").click(function(){
    dil_bilgileri++;
    $("#dil_bilgileri").append(`<div class="row"> <div class="input-field col s3"> <input id="dil_${dil_bilgileri}" type="text" class="validate" name="dil_${dil_bilgileri}"> </div> <div class="input-field col s3"> <select name="dil_okuma_${dil_bilgileri}"> <option value="" disabled selected>Seçiniz</option> <option value="Başlangıç">Başlangıç</option> <option value="Orta">Orta</option> <option value="İyi">İyi</option> <option value="Çok iyi">Çok iyi</option> </select> </div> <div class="input-field col s3"> <select name="dil_yazma_${dil_bilgileri}"> <option value="" disabled selected>Seçiniz</option> <option value="Başlangıç">Başlangıç</option> <option value="Orta">Orta</option> <option value="İyi">İyi</option> <option value="Çok iyi">Çok iyi</option> </select> </div> <div class="input-field col s3"> <select name="dil_konusma_${dil_bilgileri}"> <option value="" disabled selected>Seçiniz</option> <option value="Başlangıç">Başlangıç</option> <option value="Orta">Orta</option> <option value="iyi">İyi</option> <option value="Çok iyi">Çok iyi</option> </select> </div> </div>`);
    dom_setup();
  });
  $("#is_bilgisi_ekle").click(function(){
    is_bilgileri++;
    $("#is_bilgileri").append(`<div class="row"> <div class="input-field col s2"> <input id="is_yeri_${is_bilgileri}" type="text" class="validate" name="is_yeri_${is_bilgileri}"> </div> <div class="input-field col s2"> <input id="is_yeri_gorev_${is_bilgileri}" type="text" class="validate" name="is_yeri_gorev_${is_bilgileri}"> </div> <div class="input-field col s2"> <input id="is_baslangic_${is_bilgileri}" type="text" class="datepicker" name="is_baslangic_${is_bilgileri}"> </div> <div class="input-field col s2"> <input id="is_bitis_${is_bilgileri}" type="text" class="datepicker" name="is_bitis_${is_bilgileri}"> </div> <div class="input-field col s2"> <input id="is_ucret_${is_bilgileri}" type="number" class="validate" name="is_ucret_${is_bilgileri}"> </div> <div class="input-field col s2"> <input id="is_ayrilma_nedeni_${is_bilgileri}" type="text" class="validate" name="is_ayrilma_nedeni_${is_bilgileri}"> </div> </div>`);
    dom_setup();
  });
  $("#ref_bilgisi_ekle").click(function(){
    ref_bilgileri++;
    $("#ref_bilgileri").append(`<div class="input-field col s4"> <input id="ref_${ref_bilgileri}" type="text" class="validate" name="ref_${ref_bilgileri}"> </div> <div class="input-field col s3"> <input id="ref_pozisyon_${ref_bilgileri}" type="text" class="validate" name="ref_pozisyon_${ref_bilgileri}"> </div> <div class="input-field col s3"> <input id="ref_firma_${ref_bilgileri}" type="text" class="validate" name="ref_firma_${ref_bilgileri}"> </div> <div class="input-field col s2"> <input id="ref_telefon_${ref_bilgileri}" type="text" class="validate" name="ref_telefon_${ref_bilgileri}"> </div>`);
    dom_setup();
  });
});
function dom_setup(){
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 240, // Creates a dropdown of 15 years to control year,
    today: 'Bugün',
    clear: 'Temizle',
    close: 'Tamam',
    closeOnSelect: false // Close upon selecting a date,
  });
  $('select').material_select();
}
  function formu_gonder(){
    var hata_mesaji="";
    if ( $("input[name=ad]")[0].value.trim() == "" ){
      hata_mesaji += "Ad kısmı, ";
    }
    if ( $("input[name=soyad]")[0].value.trim() == "" ){
      hata_mesaji += "Soyad kısmı, ";
    }
    if ( $("input[name=dogum_tarihi]")[0].value.trim() == "" ){
      hata_mesaji += "Doğum tarihi kısmı, ";
    }
    if ( $("select[name=cinsiyet]")[0].value.trim() == "" ){
      hata_mesaji += "Cinsiyet kısmı, ";
    }
    if ( $("select[name=medeni_durum]")[0].value.trim() == "" ){
      hata_mesaji += "Medeni durum kısmı, ";
    }
    if ( $("select[name=askerlik]")[0].value.trim() == "" ){
      hata_mesaji += "Askerlik kısmı, ";
    }
    if ( $("select[name=surucu_belgesi]")[0].value.trim() == "" ){
      hata_mesaji += "Sürücü belgesi kısmı, ";
    }
    if ( $("select[name=surucu_belgesi]")[0].value.trim() == "var" && $("select[name=surucu_belgesi_sinifi]")[0].value.trim() == "" ){
      hata_mesaji += "Sürücü belgesi sınıfı seçmediniz.</p>";
    }
    if ( $("input[name=cocuk_sayisi]")[0].value.trim() == "" ){
      hata_mesaji += "Çocuk sayısı kısmı, ";
    }
    if ( $("select[name=talep_edilen_is]")[0].value.trim() == "" ){
      hata_mesaji += "Talep edilen iş kısmı, ";
    }
    if ( $("input[name=talep_edilen_ucret]")[0].value.trim() == "" ){
      hata_mesaji += "Talep edilen ücret kısmı, ";
    }
    if ( $("select[name=vardiya]")[0].value.trim() == "" ){
      hata_mesaji += "Vardiya kısmı, ";
    }
    if ( $("input[name=gsm_nu]")[0].value.trim() == "" ){
      hata_mesaji += "GSM numarası kısmı, ";
    }
    if ( $("input[name=eposta]")[0].value.trim() == "" ){
      hata_mesaji += "E-Posta kısmı, ";
    }
    if ( $("textarea[name=adres]")[0].value.trim() == "" ){
      hata_mesaji += "Adres kısmı, ";
    }

    if ( hata_mesaji != "" ){
      $("#uyari_icerik").html("<p>"+hata_mesaji+"boş bırakılamaz.</p>");
      $("#uyari_modal").modal("open");
    }else{
      $("#basvuru_formu")[0].submit();
    }
  }
    </script>
	</body>
</html>
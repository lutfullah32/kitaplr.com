<?php
include_once "sistem/sistem.php";
$cevap="";
$kayit=null;
    if(isset($_POST["gonder"])){
        $kullanici_adi=$_POST["kullanici_adi"];
        $sifre=$_POST["sifre"];
        $sifre2=$_POST["sifre2"];
        $eposta=$_POST["eposta"];
        if($kullanici_adi && $sifre && $sifre2 && $eposta){
            if($sifre==$sifre2){
                $kk=mysqli_query($vt,"SELECT * FROM kullanicilar WHERE kullanici_adi='$kullanici_adi'");
                if(!mysqli_affected_rows($vt)){
                    $ek=mysqli_query($vt,"SELECT * FROM kullanicilar WHERE eposta='$eposta'");
                    if (!mysqli_affected_rows($vt)){
                        $sifre=md5($sifre);
                        $ekle=mysqli_query($vt,"INSERT INTO kullanicilar SET
                                                kullanici_adi='$kullanici_adi',
                                                sifre='$sifre',
                                                eposta='$eposta'");
                        if($ekle) {
                            $id=mysqli_insert_id($vt);
                            $cevap="Kayıdınız başarıyla gerçekleştirildi.<br> Anasayfaya yönlendiriliyorsunuz..";
                            $kayit=true;
                            $_SESSION=array(
                                "id"=>$id,
                                "yetki"=>1,
                                "kullanici_adi"=>$kullanici_adi,
                                "login"=>true
                            );
                            header( "refresh:2;url=http://".$_SERVER["SERVER_NAME"]);

                        }

                    }else {$cevap="Bu e-posta mevcut."; $kayit=false;}

                }else {$cevap="Bu kullancı adı mevcut."; $kayit=false;}
            }
            else {$cevap="Girdiğiniz şifreler uyuşmuyor"; $kayit=false;}

        }
        else {$cevap="Lütfen tüm alanları doldurunuz"; $kayit=false;}

    }


?>

<!DOCTYPE html>
<html>
<head>
  <title>Kayıt Ol</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">
  <script type="text/javascript" src="assets/js/vendor.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">

        <div class="app-form">
            <div class="form-header">
                <div class="app-brand"><span class="highlight">Kayıt Ol</span></div>
            </div>
            <div id="olay">
                <?php
                    if(isset($kayit))
                    if($kayit){
                        echo '<div class="alert alert-success" role="alert"><img src="resim/loading.gif">
                                 <strong>'.$cevap.'</strong><a href="#" class="alert-link"></a>
                              </div>';
                    }else{
                ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <strong><?=$cevap;?></strong>
                </div>
                <?php } ?>
            </div>
          <form action="" method="post" >
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı" aria-describedby="basic-addon1" >
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input name="sifre" type="password" class="form-control" placeholder="Şifre" aria-describedby="basic-addon3" >
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                  <i class="fa fa-check" aria-hidden="true"></i></span>
                <input name="sifre2" type="password" class="form-control" placeholder="Tekrar Şifre" aria-describedby="basic-addon4" >
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-at" aria-hidden="true"></i></span>
                  <input name="eposta" type="email" class="form-control" placeholder="E-posta" aria-describedby="basic-addon2" >
              </div>
              <div class="text-center">
                  <input type="submit" name="gonder" class="btn btn-success btn-submit" value="Kayıt Ol">
              </div>
          </form>
          <div class="form-line">
            <div class="title">OR</div>
          </div>
          <div class="form-footer">
            <button type="button" class="btn btn-default btn-sm btn-social __facebook">
              <div class="info">
                <i class="icon fa fa-facebook-official" aria-hidden="true"></i>
                <span class="title">Facebook ile Kaydol</span>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>


</body>
</html>
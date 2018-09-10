<?php

session_start();

if(isset($_SESSION["login"])) {
    header('Location: http://' . $_SERVER["SERVER_NAME"]);

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Giriş Yap</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

  <!-- Theme -->
    <script src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">

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
          <div class="app-brand"><span class="highlight">Giriş Yap</span></div>
        </div>
          <div id="olay">

          </div>
        <form action="" method="POST">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" id="kullanici_adi" name="kullanici_adi" class="form-control" placeholder="Kullanıcı Adı" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="password" id="sifre" name="sifre" class="form-control" placeholder="Şifre" aria-describedby="basic-addon2">
            </div>
            <div class="text-center">
                <input type="button" id="giris" class="btn btn-success btn-submit" value="Giriş Yap">
            </div>
            <br>
            <div class="text-center">
                <input onclick="window.location.href='kayitol.php'" style="background-color: #39c3da" type="button" id="kayit" class="btn btn-success btn-submit" value="Kayıt Ol">
            </div>
        </form>


        <div class="form-line">
          <div class="title">ya da</div>
        </div>
        <div class="form-footer">
          <button type="button" class="btn btn-default btn-sm btn-social __facebook">
            <div class="info">
              <i class="icon fa fa-facebook-official" aria-hidden="true"></i>
              <span class="title">Facebook ile Giriş Yap</span>
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
  
  <script type="text/javascript" src="assets/js/vendor.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>
  <script type="text/javascript" src="assets/js/giris.yap.js"></script>

</body>
</html>
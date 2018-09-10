<?php require_once "sistem/sistem.php";
//$_SESSION=array("id"=>1,    "yetki"=>0,    "kullanici_adi"=>"admin",    "login"=>true);
?>
<!DOCTYPE html>
<html>
<head>
  <title>kitaplr.com</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <?php
    if(isset($_SESSION["login"])){
         if(isset($_GET["kitap"])){
             echo '<script src="assets/js/kitapyorumekle.js"></script>';
             echo '<script src="assets/js/begenveoku.js"></script>';
         }
         if(isset($_GET["yazar"])) echo '<script src="assets/js/yazaryorumekle.js"></script>';
    }
    ?>


  <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">





</head>
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="<?="http://".$_SERVER["SERVER_NAME"]?>"><span class="highlight">kitaplr.com</span></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
        <li class="dropdown ">
            <a href="?sayfa=kategori" class="dropdown-toggle" data-toggle="dropdown">
                <div class="icon">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                </div>
                <div class="title">Kategoriler</div>
            </a>
            <div class="dropdown-menu">
                <ul>
                    <li><a  style="color:#2196F3;" href="?sayfa=kategori">Tüm Kategoriler</a></li>
                    <?php $query=mysqli_query($vt,"SELECT * FROM kategoriler");
                          while($row=mysqli_fetch_array($query)) {
                    ?>
                    <li><a href="<?php echo "?sayfa=kategori&id=".$row["id"]; ?>"><?php echo $row["kategori_adi"]; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
      <li class="active">
        <a href="./index.html">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Anasayfa</div>
        </a>
      </li>

            <?php
                if(isset($_SESSION["yetki"]))
					if($_SESSION["yetki"]=="0"){ ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-cogs" aria-hidden="true"></i>
          </div>
          <div class="title">YÖNETİM</div>
        </a>

        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>EKLE</li>
            <li><a href="?sayfa=ekle&ne=kitap">KİTAP EKLE</a></li>
            <li><a href="?sayfa=ekle&ne=yazar">YAZAR EKLE</a></li>
            <li><a href="?sayfa=ekle&ne=kategori">KATEGORİ EKLE</a></li>
            <li><a href="?sayfa=ekle&ne=yayinevi">YAYINEVİ EKLE</a></li>
            <li><a href="?sayfa=ekle&ne=kullanici">KULLANICI EKLE</a></li>
            <li class="line"></li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>GÜNCELLE</li>
            <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
            <li><a href="?sayfa=guncelle&ne=kitap">KİTAP GÜNCELLE</a></li>
            <li><a href="?sayfa=guncelle&ne=yazar">YAZAR GÜNCELLE</a></li>
            <li><a href="?sayfa=guncelle&ne=kategori">KATEGORİ GÜNCELLE</a></li>
            <li><a href="?sayfa=guncelle&ne=yayinevi">YAYINEVİ GÜNCELLE</a></li>
            <li><a href="?sayfa=guncelle&ne=kullanici">KULLANICI GÜNCELLE</a></li>

            <!-- <li><a href="./pages/404.html">404</a></li> -->
          </ul>
        </div>
      </li>
  <?php } if(isset($_SESSION["login"])){ ?>
        <li class="">
            <a href="cikis.php">
                <div class="icon">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </div>
                <div class="title">Çıkış Yap</div>
            </a>
        </li>
        <?php } ?>
    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <a href="/" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-cogs" aria-hidden="true"></i>
        </a>
      </li>
      <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="<?php echo "http://".$_SERVER["SERVER_NAME"]; ?>"><span class="highlight">kitaplr.com</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
              <i class="fa fa-ellipsis-v"></i>
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">Anasayfa</li>
        <li class="navbar-search hidden-sm">
          <input id="search" type="text" placeholder="Ara..">
          <button class="btn-search"><i class="fa fa-search"></i></button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            if(isset($_SESSION["login"])) include "sayfa/ustmenuaktif.php";
            else include "sayfa/ustmenupasif.php";
        ?>
      </ul>
    </div>
  </div>
</nav>
<?php
    if(isset($_GET["sayfa"])){
    $sayfa=$_GET["sayfa"];

    if ( file_exists("sayfa/".$sayfa.".php") ) {
        include("sayfa/".$sayfa.".php");
    }else {
        include("sayfa/anasayfa.php");
    }
}else{
        include("sayfa/anasayfa.php");
} ?>
    <?php if(isset($_SESSION["login"])){ ?>
  <div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
    <span class="help-text">Shortcut</span>
  </button>
  <div class="toggle-content">
    <ul class="actions">
      <li><a href="?sayfa=ekle&ne=kitap">Kitap Ekle</a></li>
      <li><a href="?sayfa=ekle&ne=kategori">Kategori Ekle</a></li>
      <li><a href="?sayfa=ekle&ne=yazar">Yazar Ekle</a></li>
      <li><a href="?sayfa=ekle&ne=yayinevi">YayınEvi Ekle</a></li>
    </ul>
  </div>
</div>
<?php } ?>

  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2016 Company Co,Ltd.
      </div>
    </div>
  </div>
</footer>
</div>

  </div>
  
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>


</body>
</html>
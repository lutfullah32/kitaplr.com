<?php
    $okunan=mysqli_query($vt,"SELECT COUNT(*) FROM okuduklarim WHERE kullanici_id=".$_SESSION["id"]." GROUP BY kullanici_id");
    $favori=mysqli_query($vt,"SELECT COUNT(*) FROM favori_kitaplarim WHERE kullanici_id=".$_SESSION["id"]." GROUP BY kullanici_id");
    $okunanr=mysqli_fetch_array($okunan);
    $favorir=mysqli_fetch_array($favori);
?>
<li class="dropdown notification">
    <a href="?sayfa=okunanlar" class="dropdown-toggle">
        <div class="icon"><img width="32" src="resim/acikk.png"> </div>
        <div class="title">Okuduğum Kitaplar</div>
        <div class="count"><?=$okunanr[0]?$okunanr[0]:"0";?></div>
    </a>
</li>
<li class="dropdown notification">
    <a href="?sayfa=favoriler" class="dropdown-toggle">
        <div class="icon"><img width="32" src="resim/begen.png"></div>
        <div class="title">Favori Kitaplarım</div>
        <div class="count"><?=$favorir[0]?$favorir[0]:"0"?></div>
    </a>
</li>
<li class="dropdown profile">
    <a href="?sayfa=profil" class="dropdown-toggle">
        <img class="profile-img" src="./assets/images/profile.png">
        <div class="title"><?php echo $_SESSION["kullanici_adi"]; ?></div>
    </a>
    <div class="dropdown-menu">
            <div class="profile-info">
                <h4 class="username"><?=$_SESSION["kullanici_adi"]?></h4>
            </div>
            <ul class="action">
                <li>
                    <a href="cikis.php">
                        Çıkış
                    </a>
                </li>
            </ul>
    </div>
</li>
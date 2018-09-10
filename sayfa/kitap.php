<div class="hata">

</div>
<input id="kitap_id" type="hidden" value="<?=$_GET["id"]?>">
<div class="row">
    <?php
    function sef_link($baslik){
        $bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
        $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
        $perma = strtolower(str_replace($bul, $yap, $baslik));
        $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
        $perma = trim(preg_replace('/\s+/',' ', $perma));
        $perma = str_replace(' ', '-', $perma);
        return $perma;
    }
        $kitap=mysqli_query($vt,"SELECT kitaplar.kitap_adi,yazarlar.adsoyad,kitaplar.resim,yazarlar.id,yayinevleri.id, yayinevleri.adi,kitaplar.basim_yili,kitaplar.ozet
                                 FROM kitaplar 
                                 INNER JOIN yazarlar 
                                 ON kitaplar.yazar_id=yazarlar.id 
                                 INNER JOIN yayinevleri 
                                 ON yayinevleri.id=kitaplar.yayin_evi_id 
                                 WHERE kitaplar.id=".$_GET["id"]);
        $row=mysqli_fetch_array($kitap);
    ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight"></span><?=$row["kitap_adi"];?> </div>
                    <div class="description"><?=$row["adsoyad"];?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-tab">

            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <div class="row">
                        <div align="center"  class="col-md-3 col-sm-12">
                            <!--resim kısmı-->
                            <div class="row">
                            <img src="resim/kitap/<?=$row["resim"]?>" class="img-responsive">
                            <div> <h2 style="color:#03ABEA;"><?=$row["kitap_adi"]?></h2></div>
                            </div>
                            <div align="center" class="row" style="margin: auto">

                                <?php
                            if(isset($_SESSION["login"])) {
                                $kitapid = $_GET["id"];
                                $kullaniciid = $_SESSION["id"];
                                $kontrolf = mysqli_query($vt, "SELECT * FROM favori_kitaplarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
                                $favorimi = mysqli_affected_rows($vt);
                                if ($favorimi == 0) {
                                    echo ' <button style=" border: none; background-color: #ffffff;" id="b"><img id="favorires" src="resim/begenme.png" width="32px"><p id="favori">Beğen</p></button>';
                                } else {
                                    echo ' <button style=" border: none; background-color: #ffffff;" id="b"><img id="favorires" src="resim/begen.png" width="32px"><p id="favori">Beğendim</p></button>';
                                }

                                $kontrolo = mysqli_query($vt, "SELECT * FROM okuduklarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
                                $okumusmu = mysqli_affected_rows($vt);
                                if ($okumusmu == 0) {
                                    echo ' <button style="border: none; background-color: #ffffff; " id="o"><img id="okures" src="resim/kapalik.png" width="32px"><p id="oku">Okumadım</p></button>';
                                } else {
                                    echo ' <button style="border: none; background-color: #ffffff;" id="o"><img id="okures" src="resim/acikk.png" width="32px"><p id="oku">Okudum</p></button>';
                                }
                            }
                                ?></div>
                        </div>

                            <div class="section">
                                <div class="col-md-7 col-sm-12">

                                <div class="section-body">
                                    <div style="margin-bottom: 10px;">Yazar: <strong><a href="?sayfa=yazar&id=<?=$row["id"];?>&yazar=<?=sef_link($row["adsoyad"])?>"> <?=$row["adsoyad"]?></a></strong></div>
                                    <div style="margin-bottom: 10px;">YayınEvi: <strong><a href="?sayfa=yayinevi&id=<?=$row["id"];?>"><?=$row["adi"]?> </a></strong></div>
                                    <div style="margin-bottom: 25px;">Basım Yılı: <strong><?=$row["basim_yili"]?></strong></div>
                                    <div style="margin-bottom: 10px;"><b>Özet</b> </div>
                                    <div><?=$row["ozet"]?></div>

                                </div>
                                </div>
                                <div class="col-md-2 col-sm-12">

                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9 col-sm-12">
                                <br>
                                <br>
                                <br>
                                <div id="yorumlar" class="section-title"><b>Yorumlar</b></div>
                                <?php
                                
                               
                               if(isset($_GET["ys"])) $s=intval($_GET["ys"])*8-8;
                               else $s=0;
                                $sorgu=mysqli_query($vt,"SELECT * FROM kitap_yorumlari 
                                                               INNER JOIN kullanicilar 
                                                               ON kitap_yorumlari.kullanici_id=kullanicilar.id 
                                                               WHERE kitap_yorumlari.kitap_id=".$_GET["id"]."
                                                               ORDER BY kitap_yorumlari.id DESC
                                                               LIMIT $s,8");
                                $yorumsayisi=mysqli_affected_rows($vt);
                                if($yorumsayisi>0) {
                                    while ($yorum = mysqli_fetch_array($sorgu)) {
                                        ?>
                                        <div class="section-body">
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h5 style="color: #029ad3" class="title"><?= $yorum["kullanici_adi"] ?></h5>
                                                    <h6 style="opacity: 0.7;" class="timeing"><?= strftime("%d %B %Y", time($yorum["tarih"])) ?></h6>
                                                </div>
                                                <div class="media-content"><?= $yorum["yorum"] ?></div>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php } ?>
                                    <nav>
                                        <?php $query = mysqli_query($vt, "SELECT * FROM kitap_yorumlari WHERE kitap_id=" . $_GET["id"]);
                                        $sayfasayisi = mysqli_affected_rows($vt);
                                        $sayfasayisi = ceil($sayfasayisi / 8);
                                        $bs = 1;
                                        if (isset($_GET["ys"])) $bs = $_GET["ys"];

                                        ?>
                                        <ul class="pagination">
                                            <li>
                                                <a href="?sayfa=kitap&id=<?php echo $_GET["id"] . "&kitap=" . $_GET["kitap"]; ?>&ys=1"
                                                   aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php for ($sn = 1; $sn <= $sayfasayisi; $sn++) { ?>
                                                <li <?php echo $bs == $sn ? 'class="active"' : null; ?>><a
                                                            href="?sayfa=kitap&id=<?php echo $_GET["id"] . "&kitap=" . $_GET["kitap"] . "&ys=" . $sn; ?>"><?= $sn; ?></a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <a href="?sayfa=kitap&id=<?php echo $_GET["id"] . "&kitap=" . $_GET["kitap"] . "&ys=" . $sayfasayisi; ?>"
                                                   aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php
                                }
                                else echo "Bu kitap hakkında hiç yorum yapılmamış.";
                                if(isset($_SESSION["login"])) include "sayfa/yorumyap.php";
                                else echo '<br>Yorum Yapmak için lütfen <a href="girisyap.php">giriş yapın</a>.';
                                    ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

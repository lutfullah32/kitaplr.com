
<input id="yazar_id" type="hidden" value="<?=$_GET["id"]?>">
<?php
$yazar=mysqli_query($vt,"SELECT * FROM yazarlar");
$yazarr=mysqli_fetch_array($yazar);
?>


<div class="row">
    <div class="col-lg-12">
        <div class="card card-tab">

            <div class="card-body no-padding tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <div class="row">
                        <div class="col-md-3 col-sm-12" align="center">
                            <!--resim kısmı-->
                            <img src="resim/yazar/<?=$yazarr["resim"]=="0"?"default.png":$yazarr["resim"]; ?>" class="img-responsive">
                            <div style="text-align: center"> <h2 style="color:#03ABEA;"><?=$yazarr["adsoyad"]?></h2></div>
                        </div>

                        <div class="col-md-9 col-sm-12">
                            <div style="margin-bottom: 25px;">Doğum Yılı: <strong><?=$yazarr["dogum_yili"]?></strong></div>
                            <div style="margin-bottom: 10px;"><b>Hayatı:</b> </div>
                            <div><?=$yazarr["hayati"]?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
<hr>
                           <a href="?sayfa=yazar_kitap_listesi&id=<?=$_GET["id"]?>"> <h4>Yazarın Kitapları</h4></a>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $query=mysqli_query($vt,"SELECT id,kitap_adi,resim,kitap_link
                                                 FROM kitaplar
                                                 WHERE yazar_id=".$_GET["id"]."
                                                 ORDER BY id DESC
                                                 LIMIT 0,4
                                                 ");
                                        while($row=mysqli_fetch_array($query)){
                                            ?>
                                            <div class="col-md-3 col-sm-6">
                                                <a href="?sayfa=kitap&id=<?=$row["id"]?>&kitap=<?=$row["kitap_link"]?>">
                                                    <div class="thumbnail">
                                                        <img  src="resim/kitap/<?=$row["resim"]?>" class="img-responsive">
                                                        <div class="caption">
                                                            <h3 class="title"><?=$row["kitap_adi"]?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
<hr>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-3 col-sm-12"></div>
                        <div class="col-md-9 col-sm-12">
                            <div class="section">

                                <div class="section-body">



                                </div>
                                <br>

                                <div id="yorumlar" class="section-title"><b>Yorumlar</b></div>
                                <?php


                                if(isset($_GET["ys"])) $s=intval($_GET["ys"])*8-8;
                                else $s=0;
                                $sorgu=mysqli_query($vt,"SELECT * FROM yazar_yorumlari 
                                                               INNER JOIN kullanicilar 
                                                               ON yazar_yorumlari.kullanici_id=kullanicilar.id 
                                                               WHERE yazar_yorumlari.yazar_id=".$_GET["id"]."
                                                               ORDER BY yazar_yorumlari.id DESC
                                                               LIMIT $s,8");
                                $yorumsayisi=mysqli_affected_rows($vt);
                                if($yorumsayisi>0){

                                while($yorum=mysqli_fetch_array($sorgu)){
                                    ?>
                                    <div class="section-body">
                                        <div  class="media-body">
                                            <div class="media-heading">
                                                <h5 style="color: #029ad3" class="title"><?=$yorum["kullanici_adi"]?></h5>
                                                <h6 style="opacity: 0.7;" class="timeing"><?=strftime("%d %B %Y", time($yorum["tarih"]))?></h6>
                                            </div>
                                            <div class="media-content"><?=$yorum["yorum"]?></div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <nav>
                                    <?php $query=mysqli_query($vt,"SELECT * FROM yazar_yorumlari WHERE yazar_id=".$_GET["id"]);
                                    $sayfasayisi=mysqli_affected_rows($vt);
                                    $sayfasayisi=ceil($sayfasayisi/8);
                                    $bs=1;
                                    if(isset($_GET["ys"])) $bs=$_GET["ys"];

                                    ?>
                                    <ul class="pagination">
                                        <li>
                                            <a href="?sayfa=kitap&id=<?php echo $_GET["id"]."&yazar=".$_GET["yazar"];?>&ys=1" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php  for($sn=1;$sn<=$sayfasayisi;$sn++){ ?>
                                            <li <?php echo $bs==$sn?'class="active"':null;  ?>><a href="?sayfa=kitap&id=<?php echo $_GET["id"]."&yazar=".$_GET["yazar"]."&ys=".$sn;?>"><?=$sn;?></a></li>
                                        <?php }  ?>
                                        <li>
                                            <a href="?sayfa=kitap&id=<?php echo $_GET["id"]."&yazar=".$_GET["yazar"]."&ys=".$sayfasayisi;?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <?php
                                }
                                    else echo "Bu yazar hakkında hiç yorum yapılmamış.";
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

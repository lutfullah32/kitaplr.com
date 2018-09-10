<div class="row">

    <div class="col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <?php
                if(isset($_GET["id"])) {
                    $yayinevi = mysqli_query($vt, "SELECT * FROM yayinevleri WHERE id=".$_GET["id"]);
                    $row=mysqli_fetch_array($yayinevi);
                    echo $row["adi"];
                }
                ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $s=1;
                    if(isset($_GET["s"])) $s=$_GET["s"];

                    $s=intval($s)*30-30;


                    $query=mysqli_query($vt,"SELECT id,kitap_adi,resim,kitap_link
                                                 FROM kitaplar
                                                 WHERE yayin_evi_id=".$_GET["id"]."
                                                 ORDER BY id DESC
                                                 LIMIT ".$s.",30
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
        </div>
    </div>
    <?php if(isset($_GET["id"])){ ?>
        <div class="col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <nav>
                        <?php $query=mysqli_query($vt,"SELECT * FROM kitaplar WHERE yayin_evi_id=".$_GET["id"]);
                        $sayfasayisi=mysqli_affected_rows($vt);
                        $sayfasayisi=ceil($sayfasayisi/30);
                        $bs=1;
                        if(isset($_GET["s"])) $bs=$_GET["s"];

                        ?>
                        <ul class="pagination">
                            <li>
                                <a href="?sayfa=<?=$_GET["sayfa"]?>&id=<?php echo $_GET["id"];?>&s=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php  for($sn=1;$sn<=$sayfasayisi;$sn++){ ?>
                                <li <?php echo $bs==$sn?'class="active"':null;  ?>><a href="?sayfa=<?=$_GET["sayfa"]?>&id=<?php echo $_GET["id"]."&s=".$sn;?>"><?=$sn;?></a></li>
                            <?php }  ?>
                            <li>
                                <a href="?sayfa=<?=$_GET["sayfa"]?>&id=<?php echo $_GET["id"]."&s=".$sayfasayisi;?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
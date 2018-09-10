<div class="row">

<div class="col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-header">
           <?php
                if(isset($_GET["id"])) {
                    $kategoriadi = mysqli_query($vt, "SELECT * FROM kategoriler WHERE id=".$_GET["id"]);
                    $row=mysqli_fetch_array($kategoriadi);
                    echo $row["kategori_adi"];
                }else echo "Kategoriler";
           ?>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                    if(!isset($_GET["id"])){
                          $query=mysqli_query($vt,"SELECT * FROM kategoriler");
                          while($row=mysqli_fetch_array($query)) {
                              ?>
                              <a href="<?php echo "?sayfa=kategori&id=".$row["id"]; ?>"><button type="button" class="btn btn-success"><?php echo $row["kategori_adi"]; ?></button></a>
                          <?php }
                    }else{
                        $s=1;
                        if(isset($_GET["s"])) $s=$_GET["s"];

                        $s=intval($s)*30-30;


                        $query=mysqli_query($vt,"SELECT kitaplar.id, kitaplar.resim, kitaplar.kitap_adi, kitaplar.id, kitaplar.kitap_link 
                                                 FROM kitap_kategorileri 
                                                 INNER JOIN kitaplar 
                                                 ON kitap_kategorileri.kitap_id=kitaplar.id 
                                                 WHERE kitap_kategorileri.kategori_id=".$_GET["id"]."
                                                 LIMIT ".$s.",30");
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
                <?php }} ?>

            </div>
        </div>
    </div>
</div>
    <?php if(isset($_GET["id"])){ ?>
    <div class="col-sm-12 col-xs-12">
        <div class="card">

            <div class="card-body">
                <nav>
                    <?php $query=mysqli_query($vt,"SELECT kitaplar.id, kitaplar.resim, kitaplar.kitap_adi, kitaplar.id 
                                                 FROM kitap_kategorileri 
                                                 INNER JOIN kitaplar 
                                                 ON kitap_kategorileri.kitap_id=kitaplar.id 
                                                 WHERE kitap_kategorileri.kategori_id=".$_GET["id"]);
                          $sayfasayisi=mysqli_affected_rows($vt);
                          $sayfasayisi=ceil($sayfasayisi/30);
                          $bs=1;
                          if(isset($_GET["s"])) $bs=$_GET["s"];

                    ?>
                    <ul class="pagination">
                        <li>
                            <a href="?sayfa=kategori&id=<?php echo $_GET["id"];?>&s=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php  for($sn=1;$sn<=$sayfasayisi;$sn++){ ?>
                        <li <?php echo $bs==$sn?'class="active"':null;  ?>><a href="?sayfa=kategori&id=<?php echo $_GET["id"]."&s=".$sn;?>"><?=$sn;?></a></li>
                        <?php }  ?>
                        <li>
                            <a href="?sayfa=kategori&id=<?php echo $_GET["id"]."&s=".$sayfasayisi;?>" aria-label="Next">
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
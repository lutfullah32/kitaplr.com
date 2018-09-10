<div class="row">
    <?php
        $kategori=mysqli_query($vt,"SELECT * FROM kategoriler");
        while($kategorir=mysqli_fetch_array($kategori)){
    ?>
    <div class="col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                
                <?php
                    echo '<a href="?sayfa=kategori&id='.$kategorir["id"].'">'.$kategorir["kategori_adi"].'</a>';
                ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $query=mysqli_query($vt,"SELECT kitaplar.id, kitaplar.resim, kitaplar.kitap_adi, kitaplar.id, kitaplar.kitap_link 
                                                 FROM kitap_kategorileri 
                                                 INNER JOIN kitaplar 
                                                 ON kitap_kategorileri.kitap_id=kitaplar.id 
                                                 WHERE kitap_kategorileri.kategori_id=".$kategorir["id"]."
                                                 ORDER BY kitaplar.id DESC
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
        </div>
    </div>
    <?php } ?>
</div>
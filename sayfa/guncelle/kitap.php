<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Ara</div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <form method="get">
                            <input type="hidden" name="sayfa" value="<?php echo $_GET["sayfa"]; ?>">
                            <input type="hidden" name="ne" value="<?php echo $_GET["ne"]; ?>">
                            <div class="input-group">
                                <span class="input-group-addon">Kitaplar</span>
                                <select name="kitapid" class="select2">
                                    <?php $kitaplar=mysqli_query($vt,"SELECT * FROM kitaplar");
                                    while($row=mysqli_fetch_array($kitaplar)){
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["kitap_adi"]; ?></option>
                                    <?php  }?>
                                </select>


                            </div>

                            <button  type="submit" class="btn btn-primary" >Bul</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kitap Güncelle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $kitap_adi=$_POST["kitap_adi"];
                            $ozet=$_POST["ozet"];

                            function sef_link($baslik){
                                $bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
                                $yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
                                $perma = strtolower(str_replace($bul, $yap, $baslik));
                                $perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
                                $perma = trim(preg_replace('/\s+/',' ', $perma));
                                $perma = str_replace(' ', '-', $perma);
                                return $perma;
                            }
                            $kitap_link=sef_link($_POST["kitap_adi"]);
                            $yazar=$_POST["yazar"];
                            $yayieviid=$_POST["yayinevi"];
                            $basim_yili=$_POST["basim_yili"];

                            $query=mysqli_query($vt,"UPDATE kitaplar SET
                                 kitap_adi='$kitap_adi',
                                 ozet='$ozet',
                                 kitap_link='$kitap_link',
                                 yazar_id=$yazar,
                                 yayin_evi_id=$yayieviid,
                                 basim_yili=$basim_yili
                                 WHERE id=".$_GET["kitapid"]);
                            $kategoriler=mysqli_query($vt,"SELECT id FROM kategoriler");
                            $sil=mysqli_query($vt,"DELETE FROM kitap_kategorileri WHERE kitap_id=".$_GET["kitapid"]);
                            while($row=mysqli_fetch_array($kategoriler)){
                                $id=$row["id"];
                                if(isset($_POST[$id])){
                                    $ketegoriekle=mysqli_query($vt,"INSERT INTO kitap_kategorileri SET
                                                                    kitap_id=".$_GET["kitapid"].",
                                                                    kategori_id=$id");

                                }
                            }
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Kitap bilgileri güncellendi..
                                    </div>
                               </div>';
                            }
                        }
                        if(isset($_GET["kitapid"])){
                        $kitap=mysqli_query($vt,"SELECT * FROM kitaplar WHERE id=".$_GET["kitapid"]);
                        while($row1=mysqli_fetch_array($kitap)){
                        ?>

                        <form method="post" action="">
                            <input value="<?php echo $row1["kitap_adi"]; ?>" name="kitap_adi" type="text" class="form-control" placeholder="Kitap Adı">
                            <div class="input-group">

                            <select name="yazar" class="select2">
                                <?php $yazarlar=mysqli_query($vt,"SELECT id, adsoyad FROM yazarlar");
                                while($row=mysqli_fetch_array($yazarlar)){
                                    ?>
                                    <option value="<?php $id=$row["id"]; echo $id; ?>"<?php echo $id==$row1["yazar_id"] ? "selected":null; ?>><?php echo $row["adsoyad"]; ?></option>
                                <?php  }?>
                            </select>
                                <span class="input-group-addon">Yazarlar</span>

                            </div>
                            <div class="input-group">
                            <select name="yayinevi" class="select2">
                                <?php $yayievi=mysqli_query($vt,"SELECT id, adi FROM yayinevleri");
                                while($row=mysqli_fetch_array($yayievi)){
                                    ?>
                                    <option value="<?php $id=$row["id"]; echo $id; ?>" <?php echo $id==$row1["yayin_evi_id"] ? "selected":null; ?>><?php echo $row["adi"]; ?></option>
                                <?php  }?>
                            </select>
                                <span class="input-group-addon">Yayınevleri</span>

                            </div>
                            <input value="<?php echo $row1["basim_yili"]; ?>" name="basim_yili" type="number" class="form-control" min="0000" max="<?php echo date("Y"); ?>" placeholder="Basım Yılı">
                            <textarea name="ozet" rows="3" class="form-control" placeholder="Kitap Özeti"><?php echo $row1["ozet"] ?></textarea>




                            <button name="submit" type="submit" class="btn btn-primary">Ekle</button>




                    </div>
                    <div class="col-md-6">
                        <div>
                            <?php
                                $sorgu=mysqli_query($vt,"SELECT * FROM kitap_kategorileri WHERE kitap_id=".$_GET["kitapid"]);
                                $kategorilistesi=array();
                                while($row=mysqli_fetch_array($sorgu)){
                                    array_push($kategorilistesi,$row["kategori_id"]);

                                }

                                $kategoriler=mysqli_query($vt,"SELECT * FROM kategoriler");
                                while($row=mysqli_fetch_array($kategoriler)){


                            ?>
                            <div class="checkbox checkbox-inline">
                                <input name="<?php $no=$row["id"]; echo $no;  ?>" type="checkbox" id="checkbox<?php echo $no;?>" <?php if(in_array($no,$kategorilistesi)) echo "checked"; ?>>
                                <label for="checkbox<?php echo $no;?>">
                                    <?php echo $row["kategori_adi"]; ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    </form>
                    <?php }} ?>
            </div>
        </div>
    </div>


</div>
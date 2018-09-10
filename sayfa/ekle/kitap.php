
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kitap Ekle
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




                            $query=mysqli_query($vt,"INSERT INTO kitaplar SET
                                 kitap_adi='$kitap_adi',
                                 resim='',
                                 ozet='$ozet',
                                 kitap_link='$kitap_link',
                                 yazar_id=$yazar,
                                 yayin_evi_id=$yayieviid,
                                 basim_yili=$basim_yili
                                 ");


                            $eki=mysqli_insert_id($vt);
                            $yer="resim/kitap/";
                            $uzanti=explode(".",$_FILES["resim"]["name"]);
                            $dosyaadi=$yer.$eki.".".end($uzanti);
                            $dosyayolu=$_FILES["resim"]["tmp_name"];
                            if(move_uploaded_file($dosyayolu,$dosyaadi)) $resimekle=mysqli_query($vt,"UPDATE kitaplar SET resim='".$eki.".".end($uzanti)."' WHERE id=".$eki);
                            $kategoriler=mysqli_query($vt,"SELECT id FROM kategoriler");
                            while($row=mysqli_fetch_array($kategoriler)){
                                $id=$row["id"];
                                if(isset($_POST[$id])){
                                    $ketegoriekle=mysqli_query($vt,"INSERT INTO kitap_kategorileri SET
                                                                    kitap_id=$eki,
                                                                    kategori_id=$id");

                                }
                            }
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Kitap eklendi..
                                    </div>
                               </div>';
                            }else{
                                echo mysqli_error($vt);
                            }
                        }

                        ?>

                        <form method="post" action="" enctype="multipart/form-data">

                            <input name="resim" type="file" class="form-control" placeholder="Kitap Adı" accept="image/*">
                            <input name="kitap_adi" type="text" class="form-control" placeholder="Kitap Adı">
                            <div class="input-group">

                            <select name="yazar" class="select2">
                                <?php $yazarlar=mysqli_query($vt,"SELECT id, adsoyad FROM yazarlar");
                                while($row=mysqli_fetch_array($yazarlar)){
                                    ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["adsoyad"]; ?></option>
                                <?php  }?>
                            </select>
                                <span class="input-group-addon">Yazarlar</span>

                            </div>
                            <div class="input-group">
                            <select name="yayinevi" class="select2">
                                <?php $yayievi=mysqli_query($vt,"SELECT id, adi FROM yayinevleri");
                                while($row=mysqli_fetch_array($yayievi)){
                                    ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["adi"]; ?></option>
                                <?php  }?>
                            </select>
                                <span class="input-group-addon">Yayınevleri</span>

                            </div>
                            <input name="basim_yili" type="number" class="form-control" min="0000" max="<?php echo date("Y"); ?>" maxlength="4" placeholder="Basım Yılı" oninput="maxLengthCheck(this)">
                            <script>
                                // This is an old version, for a more recent version look at
                                // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
                                function maxLengthCheck(object)
                                {
                                    if (object.value.length > object.maxLength)
                                        object.value = object.value.slice(0, object.maxLength)
                                }
                            </script>
                            <textarea name="ozet" rows="3" class="form-control" placeholder="Kitap Özeti"></textarea>

                                <div>
                                    <?php
                                    $kategoriler=mysqli_query($vt,"SELECT * FROM kategoriler");
                                    while($row=mysqli_fetch_array($kategoriler)){


                                        ?>
                                        <div class="checkbox checkbox-inline">
                                            <input name="<?php $no=$row["id"]; echo $no;  ?>" type="checkbox" value="<?php echo $no; ?>" id="checkbox<?php echo $no;?>">
                                            <label for="checkbox<?php echo $no;?>">
                                                <?php echo $row["kategori_adi"]; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>





                            <button name="submit" type="submit" class="btn btn-primary">Ekle</button>




                    </div>

                    </form>
            </div>
        </div>
    </div>


</div>
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
                                <span class="input-group-addon">Kullanıcılar</span>
                                <select name="kullanici_id" class="select2">
                                    <?php $kullanicilar=mysqli_query($vt,"SELECT * FROM kullanicilar");
                                    while($row=mysqli_fetch_array($kullanicilar)){
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["kullanici_adi"]; ?></option>
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
                Kullanıcı Güncelle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])) {
                            $kullanici_adi = $_POST["kullanici_adi"];
                            $sifre = md5($_POST["sifre"]);
                            $eposta = $_POST["eposta"];
                            $dogum_tarihi = $_POST["dogum_tarihi"];
                            $yetki = $_POST["yetki"];

                            if ($_POST["sifre"] == "") {
                                $query = mysqli_query($vt, "UPDATE kullanicilar SET
                                 kullanici_adi='$kullanici_adi',
                                 eposta='$eposta',
                                 dogum_tarihi='$dogum_tarihi',
                                 yetki=$yetki
                                 WHERE id=" . $_GET["kullanici_id"]);
                            }else{
                                $query = mysqli_query($vt, "UPDATE kullanicilar SET
                                 kullanici_adi='$kullanici_adi',
                                 sifre='$sifre',
                                 eposta='$eposta',
                                 dogum_tarihi='$dogum_tarihi',
                                 yetki=$yetki
                                 WHERE id=" . $_GET["kullanici_id"]);
                            }
                                if ($query) {

                                    echo ' <div class="col-md-6 col-sm-12">
                                             <div class="alert alert-success" role="alert">
                                                <strong>Başarılı!</strong> Kullanıcı bilgileri güncellendi..
                                             </div>
                                            </div>';
                                } else echo mysqli_error($query);

                        }
                        if(isset($_GET["kullanici_id"])){
                            $doldur=mysqli_query($vt,"SELECT * FROM kullanicilar WHERE id=".$_GET["kullanici_id"]);
                            while($row1=mysqli_fetch_array($doldur)){
                            ?>

                        <form method="post" action="">
                            <input value="<?php echo $row1["kullanici_adi"]; ?>" name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı">
                            <input  name="sifre" type="text" class="form-control" placeholder="Şifre">
                            <input value="<?php echo $row1["eposta"]; ?>" name="eposta" type="email" class="form-control" placeholder="E-Posta">
                            <input value="<?php echo $row1["dogum_tarihi"]; ?>" name="dogum_tarihi" type="date" class="form-control" placeholder="Doğum Tarihi">
                            <div class="input-group">
                                <span class="input-group-addon">Yetkiler</span>
                                <select name="yetki" class="select2">
                                    <?php $yetki=mysqli_query($vt,"SELECT * FROM yetkiler");
                                    while($row=mysqli_fetch_array($yetki)){
                                        ?>
                                        <option value="<?php $id=$row["yetki_kodu"]; echo $id; ?>" <?php echo $id==$row1["yetki"] ? "selected":null; ?>><?php echo $row["yetki_aciklama"]; ?></option>
                                    <?php  }?>
                                </select>


                            </div>
                            <button name="submit" type="submit" class="btn btn-primary" >Güncelle</button>

                        </form>
                        <?php }}  ?>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
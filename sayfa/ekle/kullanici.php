<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kullanıcı Ekle
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

                            $kullaniciadisorgula = mysqli_query($vt, "SELECT * FROM kullanicilar WHERE kullanici_adi='$kullanici_adi' or eposta='$eposta'");
                            if (mysqli_affected_rows($vt) > 0)
                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Hata!</strong> bu kullanıcı adı veya e posta mevcuttur..
                                    </div>
                               </div>';
                            else {


                                $query = mysqli_query($vt, "INSERT INTO kullanicilar SET
                                 kullanici_adi='$kullanici_adi',
                                 sifre='$sifre',
                                 eposta='$eposta',
                                 dogum_tarihi='$dogum_tarihi',
                                 yetki=$yetki
                                ");
                                if ($query) {

                                    echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Kullanıcı eklendi..
                                    </div>
                               </div>';
                                } else echo mysqli_error($query);
                            }
                        }

                        ?>

                        <form method="post" action="">
                            <input name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı">
                            <input name="sifre" type="text" class="form-control" placeholder="Şifre">
                            <input name="eposta" type="email" class="form-control" placeholder="E-Posta">
                            <input name="dogum_tarihi" type="date" class="form-control" placeholder="Doğum Tarihi">
                            <div class="input-group">
                                <span class="input-group-addon">Yetkiler</span>
                                <select name="yetki" class="select2">
                                    <?php $yetki=mysqli_query($vt,"SELECT * FROM yetkiler");
                                    while($row=mysqli_fetch_array($yetki)){
                                        ?>
                                        <option value="<?php echo $row["yetki_kodu"]; ?>"><?php echo $row["yetki_aciklama"]; ?></option>
                                    <?php  }?>
                                </select>


                            </div>
                            <button name="submit" type="submit" class="btn btn-primary" >Ekle</button>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
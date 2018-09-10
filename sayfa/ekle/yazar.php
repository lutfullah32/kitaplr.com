<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kategori Ekle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $adsoyad=$_POST["adsoyad"];
                            $dogum_yili=$_POST["dogum_yili"];
                            $hayati=$_POST["hayati"];

                            $query=mysqli_query($vt,"INSERT INTO yazarlar SET
                                 adsoyad='$adsoyad',
                                 dogum_yili='".$dogum_yili."-01-01',
                                 hayati='$hayati'");
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Yazar eklendi..
                                    </div>
                               </div>';
                            }
                        }

                        ?>

                        <form method="post" action="">
                            <input name="adsoyad" type="text" class="form-control" placeholder="Yazar Adı">
                            <input name="dogum_yili" type="number" class="form-control" min="0000" max="<?php echo date("Y"); ?>" placeholder="Doğum Yılı">
                            <textarea name="hayati" rows="3" class="form-control" placeholder="Yazarın Hayatı"></textarea>
                            <button name="submit" type="submit" class="btn btn-primary" >Ekle</button>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
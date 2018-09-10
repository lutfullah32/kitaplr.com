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
                            <span class="input-group-addon">Yazarlar</span>
                            <select name="yazarid" class="select2">
                                <?php $yazarlar=mysqli_query($vt,"SELECT * FROM yazarlar");
                                while($row=mysqli_fetch_array($yazarlar)){
                                    ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["adsoyad"]; ?></option>
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
                <div class="row col-md-12">Yazar Güncelle</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $adsoyad=$_POST["adsoyad"];
                            $dogum_yili=$_POST["dogum_yili"];
                            $hayati=$_POST["hayati"];

                            $query=mysqli_query($vt,"UPDATE yazarlar SET
                                 adsoyad='$adsoyad',
                                 dogum_yili='".$dogum_yili."-01-01',
                                 hayati='$hayati'
                                 WHERE id=".$_GET["yazarid"]);
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Yazar bilgileri güncellendi..
                                    </div>
                               </div>';
                            }
                        }
                        if(isset($_GET["yazarid"])){
                        $doldur=mysqli_query($vt,"SElECT * FROM yazarlar WHERE id=".$_GET["yazarid"]);
                        $varmi=false;
                        while($row=mysqli_fetch_array($doldur)){
                            $varmi=true;
                        ?>

                        <form method="post" action="">
                            <input value="<?php echo $row["adsoyad"]; ?>"  name="adsoyad" type="text" class="form-control" placeholder="Yazar Adı">
                            <input value="<?php echo substr($row["dogum_yili"], 0, 4); ?>" name="dogum_yili" type="number" class="form-control" min="0000" max="<?php echo date("Y"); ?>" placeholder="Doğum Yılı">
                            <textarea name="hayati" rows="3" class="form-control" placeholder="Yazarın Hayatı"><?php echo $row["hayati"]; ?></textarea>
                            <button name="submit" type="submit" class="btn btn-primary" >Bilgileri Güncelle</button>
                        </form>
                        <?php
                        }
                        if(!$varmi){
                            echo "Böyle bir yazar yok!!";
                        }
                        }
                        ?>



                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
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
                                <span class="input-group-addon">Kategori</span>
                                <select name="kategoriid" class="select2">
                                    <?php $kategoriler=mysqli_query($vt,"SELECT * FROM kategoriler");
                                    while($row=mysqli_fetch_array($kategoriler)){
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["kategori_adi"]; ?></option>
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
                Kategori Güncelle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){

                            $query=mysqli_query($vt,"UPDATE kategoriler SET
                                 kategori_adi='".$_POST["kategori_adi"]."'
                                 WHERE id=".$_GET["kategoriid"]);
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Kategori güncellendi..
                                    </div>
                               </div>';
                            }
                        }
                        if(isset($_GET["kategoriid"])){
                        $doldur=mysqli_query($vt,"SElECT * FROM kategoriler WHERE id=".$_GET["kategoriid"]);
                        $varmi=false;
                        while($row=@mysqli_fetch_array($doldur)){
                        $varmi=true;

                        ?>

                        <form method="post" action="">
                            <input value="<?php echo $row["kategori_adi"]; ?>" name="kategori_adi" type="text" class="form-control" placeholder="Kategori Adı">
                            <button name="submit" type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                            <?php
                        }
                            if(!$varmi){
                                echo "Böyle bir kategori yok!!";
                            }
                        }
                        ?>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
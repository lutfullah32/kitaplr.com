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
                                <span class="input-group-addon">Yayinevleri</span>
                                <select name="yayineviid" class="select2">
                                    <?php $yayinevleri=mysqli_query($vt,"SELECT * FROM yayinevleri");
                                    while($row=mysqli_fetch_array($yayinevleri)){
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["adi"]; ?></option>
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
                Yayınevi Güncelle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $yayinevi=$_POST["yayinevi"];


                            $query=mysqli_query($vt,"UPDATE yayinevleri SET
                                 adi='$yayinevi'
                                 WHERE id=".$_GET["yayineviid"]);
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Yayınevi bilgileri güncellendi..
                                    </div>
                               </div>';
                            }
                        }
                        if(isset($_GET["yayineviid"])){
                            $doldur=mysqli_query($vt,"SELECT * FROM yayinevleri WHERE id=".$_GET["yayineviid"]);
                            while($row=mysqli_fetch_array($doldur)){

                        ?>

                        <form method="post" action="">
                            <input value="<?php echo $row["adi"];  ?>" name="yayinevi" type="text" class="form-control" placeholder="Yayınevi Adı">
                            <button name="submit" type="submit" class="btn btn-primary" >Güncelle</button>

                        </form>
                        <?php }} ?>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
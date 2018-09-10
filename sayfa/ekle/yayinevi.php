<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Yayınevi Ekle
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST["submit"])){
                            $yayinevi=$_POST["yayinevi"];


                            $query=mysqli_query($vt,"INSERT INTO yayinevleri SET
                                 adi='$yayinevi'
                                ");
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Yayınevi eklendi..
                                    </div>
                               </div>';
                            }
                        }

                        ?>

                        <form method="post" action="">
                            <input name="yayinevi" type="text" class="form-control" placeholder="Yayınevi Adı">
                            <button name="submit" type="submit" class="btn btn-primary" >Ekle</button>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
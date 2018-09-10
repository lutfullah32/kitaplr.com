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

                            $query=mysqli_query($vt,"INSERT INTO kategoriler SET
                                 kategori_adi='".$_POST["kategori_adi"]."'");
                            if($query){

                                echo ' <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>Başarılı!</strong> Kategori eklendi..
                                    </div>
                               </div>';
                            }
                        }

                        ?>

                        <form method="post" action="">
                            <input name="kategori_adi" type="text" class="form-control" placeholder="Kategori Adı">
                            <button name="submit" type="submit" class="btn btn-primary">Ekle</button>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
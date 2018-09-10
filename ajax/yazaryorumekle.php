<?php
include "../sistem/sistem.php";
if(isset($_SESSION["id"])) {

    $yorumyapan=$_SESSION["id"];

$yorum= $_POST["yorum"];
$yazar_id= $_POST["yazar_id"];
$yorumekle=mysqli_query($vt,"INSERT INTO yazar_yorumlari SET
                             yazar_id=$yazar_id,
                             kullanici_id=$yorumyapan,
                             yorum='$yorum'");
$sonyorum=mysqli_insert_id($vt);
$yorumyapan=mysqli_query($vt,"SELECT kullanici_adi FROM kullanicilar WHERE id=".$yorumyapan);
$yorumbul=mysqli_query($vt,"SELECT tarih, yorum FROM yazar_yorumlari WHERE id=".$sonyorum);
$sonyyorum=mysqli_fetch_array($yorumbul);
$kullanici_adi=mysqli_fetch_array($yorumyapan);
if($yorumekle){
    echo '<div class="section-body">
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h5 style="color: #029ad3" class="title">'.$kullanici_adi["kullanici_adi"].'</h5>
                                            <h6 style="opacity: 0.7;" class="timeing">'.strftime("%d %B %Y", time($sonyyorum["tarih"])).'</h6>
                                        </div>
                                        <div class="media-content">'.$sonyyorum["yorum"].'</div>
                                    </div>
                                </div>
								<hr>';
}
}else echo "Oturum açmalısınız";

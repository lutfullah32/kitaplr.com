<?php
include "../sistem/sistem.php";
$yorum= $_POST["yorum"];
$kitap_id= $_POST["kitap_id"];
$yorumekle=mysqli_query($vt,"INSERT INTO kitap_yorumlari SET
                             kitap_id=$kitap_id,
                             kullanici_id=1,
                             yorum='$yorum'");
$sonyorum=mysqli_insert_id($vt);
$yorumyapan=mysqli_query($vt,"SELECT kullanici_adi FROM kullanicilar WHERE id=1");
$yorumbul=mysqli_query($vt,"SELECT tarih, yorum FROM kitap_yorumlari WHERE id=".$sonyorum);
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

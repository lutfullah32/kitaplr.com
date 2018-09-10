<?php
include "../sistem/sistem.php";
$kullaniciid=$_SESSION["id"];
$kitapid=$_POST["kitapid"];
$olay=$_POST["olay"];
$cevap=array();
switch ($olay){
    case "favori":
        $kontrol=mysqli_query($vt,"SELECT * FROM favori_kitaplarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
        if(mysqli_affected_rows($vt)==0){
            mysqli_query($vt,"INSERT INTO favori_kitaplarim SET kitap_id=$kitapid, kullanici_id=$kullaniciid");
            $cevap["ekle"]="Beğendim";
        } else{
            mysqli_query($vt,"DELETE FROM favori_kitaplarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
            $cevap["sil"]="Beğen";
        }
        break;
    case "oku":
        $kontrol=mysqli_query($vt,"SELECT * FROM okuduklarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
        if(mysqli_affected_rows($vt)==0){
            mysqli_query($vt,"INSERT INTO okuduklarim SET kitap_id=$kitapid, kullanici_id=$kullaniciid");
            $cevap["ekle"]="Okudum";
        } else{
            mysqli_query($vt,"DELETE FROM okuduklarim WHERE kitap_id=$kitapid && kullanici_id=$kullaniciid");
            $cevap["sil"]="Okumadım";
        }
        break;
}
echo json_encode($cevap);
<?php
$ne=$_GET["ne"];

switch ($ne){
    case "kategori":
        include "guncelle/kategori.php";
        break;
    case "yazar":
        include "guncelle/yazar.php";
        break;
    case "kitap":
        include "guncelle/kitap.php";
        break;
    case "yayinevi":
        include "guncelle/yayinevi.php";
        break;
    case "kullanici":
        include "guncelle/kullanici.php";
        break;
}


?>
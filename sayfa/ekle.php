<?php
	if(isset($_SESSION["yetki"]))
	{
		if($_SESSION["yetki"]=="0"){
    $ne=$_GET["ne"];

    switch ($ne){
        case "kategori":
            include "ekle/kategori.php";
            break;
        case "yazar":
            include "ekle/yazar.php";
            break;
        case "kitap":
            include "ekle/kitap.php";
            break;
        case "yayinevi":
            include "ekle/yayinevi.php";
            break;
        case "kullanici":
            include "ekle/kullanici.php";
            break;
    }
	
	}
	}

?>
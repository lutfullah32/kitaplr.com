<?php
    sleep(3);
    include_once "../sistem/sistem.php";
    $kullanici_adi=trim($_POST["kullanici_adi"]);
    $sifre=$_POST["sifre"];
    if($kullanici_adi!="" && $sifre!=""){
        $sifre=md5(trim($_POST["sifre"]));
        $kontrol=mysqli_query($vt,"SELECT * FROM kullanicilar WHERE kullanici_adi='$kullanici_adi' and sifre='$sifre'");
        if(mysqli_affected_rows($vt)){
            $row=mysqli_fetch_array($kontrol);

            $_SESSION=array(
                "id"=>$row["id"],
                "yetki"=>$row["yetki"],
                "kullanici_adi"=>$row["kullanici_adi"],
                "login"=>true
            );

            $cevap["basarili"]="Giriş Başarılı";
        }
        else{
            $cevap["hata"]="Kullanıcı adı ve ya şifre yanlış";
        }
    }
    else{
        $cevap["bos"]='Kullanıcı Adı ve ya Şifre boş bırakılamaz';
    }

    echo json_encode($cevap);
?>
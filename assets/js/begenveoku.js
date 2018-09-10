$(function () {
    $("#b").click(function () {
        var kitap_id=$("#kitap_id").val();
        $.ajax({
            type:"post",
            url:"ajax/begenveoku.php",
            data:{"kitapid":kitap_id,"olay":"favori"},
            dataType:"json",
            success:function (cevap) {
                $(".hata").append(cevap);
                if(cevap.ekle){
                    $("#favorires").attr("src","resim/begen.png");
                    $("#favori").text(cevap.ekle);
                }else if(cevap.sil){
                    $("#favorires").attr("src","resim/begenme.png");
                    $("#favori").text(cevap.sil);
                }
            }
        });
    });
    $("#o").click(function () {
        var kitap_id=$("#kitap_id").val();
        $.ajax({
            type:"post",
            url:"ajax/begenveoku.php",
            data:{"kitapid":kitap_id,"olay":"oku"},
            dataType:"json",
            success:function (cevap) {
                if(cevap.ekle){
                    $("#okures").attr("src","resim/acikk.png");
                    $("#oku").text(cevap.ekle);
                }else if(cevap.sil){
                    $("#okures").attr("src","resim/kapalik.png");
                    $("#oku").text(cevap.sil);
                }
            }
        });
    });
});
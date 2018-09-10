$(function () {
    $("#giris").click(function () {

        $("#olay").html('asdasdas<div style="text-align: center" class="alert alert-warning" role="alert"><img src="resim/loading.gif">dsfsdfasd<a href="#" class="alert-link"></a></div>');
        var kullanici_adi=$("#kullanici_adi").val();
        var sifre=$("#sifre").val();
        $.ajax({
            type    :"post",
            url     :"ajax/girisyap.php",
            data    :{"kullanici_adi":kullanici_adi,"sifre":sifre},
            dataType:"json",
            beforeSend: function() {

                $("#olay").html('<center><div align="center"></div><img src="resim/loading.gif"></div></center><br>');
            },
            success :function (cevap) {

                if(cevap.bos){
                    $("#olay").html('<div style="text-align: center" class="alert alert-warning" role="alert">'+
                        '<strong>'+cevap.bos+'</strong><a href="#" class="alert-link"></a>'+
                        '</div>');
                }else if(cevap.hata){
                    $("#olay").html('<div style="text-align: center" class="alert alert-danger" role="alert">'+
                        '<strong>'+cevap.hata+'</strong><a href="#" class="alert-link"></a>'+
                        '</div>');
                }else if(cevap.basarili){
                    $("#olay").html('<div style="text-align: center" class="alert alert-success" role="alert">'+
                        '<strong>'+cevap.basarili+'</strong> Yönlendiriliyorsunuz...<a href="#" class="alert-link"></a>'+
                    '</div>');
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);



                }
            }
        });
    });
});
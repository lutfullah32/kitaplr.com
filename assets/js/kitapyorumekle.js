/**
 * Created by Administrator on 10.03.2017.
 */
$(function (){
    $("#yorumyap").click(function () {
        var yorum=$("#yorum").val();
        var kitap_id=$("#kitap_id").val();
        $.ajax({
            type:"post",
            url:"ajax/kitapyorumekle.php",
            data:{"yorum":yorum,"kitap_id":kitap_id},
            success:function (cevap) {
                $("#yorumlar").after(cevap);
				$("#yorum").val("");
				window.location.href="#yorumlar";

            }
        });
    });

});
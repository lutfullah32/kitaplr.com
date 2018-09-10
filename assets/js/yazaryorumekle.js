/**
 * Created by Administrator on 10.03.2017.
 */
$(function (){
    $("#yorumyap").click(function () {
        var yorum=$("#yorum").val();
        var yazar_id=$("#yazar_id").val();
        $.ajax({
            type:"post",
            url:"ajax/yazaryorumekle.php",
            data:{"yorum":yorum,"yazar_id":yazar_id},
            success:function (cevap) {
                $("#yorumlar").after(cevap);
				$("#yorum").val("");
				window.location.href="#yorumlar";

            }
        });
    });

});
$(document).ready(function(){
  $(".new_review").hide();
  $(".review_invite").click(function() {
    if($(".new_review").css('display') == 'none') {
      $(".new_review").show("slow");
      $(".review_invite").text("Скрыть форму для добавления отзыва")
    }
    else  {
      $(".new_review").hide("slow");
      $(".review_invite").text("Оставьте свой отзыв")
    }
  });
});
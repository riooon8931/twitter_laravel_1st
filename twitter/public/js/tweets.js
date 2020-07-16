// ポップアップの表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
$(".tweet").on("click", function(){
    $(".popup").fadeIn();
});

$(".popup-top i").on("click", function(){
    $(".popup").fadeOut();
});

// 設定の表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
$(".settings-action").on("click", function(){
    $(".settings").css("display", "block");
});
$(".settings-end").on("click", function(){
    $(".settings").css("display", "none");
});
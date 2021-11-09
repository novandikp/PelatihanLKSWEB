$(".btn-detail").on("click", function (e) {
  let deskipsi = $(this).prev().prev();
  let judul = deskipsi.prev();
  // Merubah p dan h detailgame
  $(".detail-game-content h1").text(judul.text());
  $(".detail-game-content p").text(deskipsi.text());
  $(".detail-game").addClass("active");
  $(".backdrop-bg").removeClass("d-none");
});

$(".btn-hide,.backdrop-bg").click(function (e) {
  if (e.target !== this) {
    return;
  }
  $(".detail-game").removeClass("active");
  $(".backdrop-bg").addClass("d-none");
});

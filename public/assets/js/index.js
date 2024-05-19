

$(document).ready(() => {
  $(".loading-screen").fadeOut(1000);
});

$(document).ready(function () {
  $(".search-input-icon").click(function () {
    $(".search-container").fadeIn();
    $(".search-input").animate({
      width: '80%'
    });
  });
  $(".close-div").click(function () {
    $(".search-container").fadeOut();
    $(".search-input").animate({
      width: '0%',
    });
  });

});
container = null;
$(document).ready(() => {
  if (document.getElementsByClassName("section-top").length > 0) {
    let container = $(".section-top").offset().top;
  }
  $(window).scroll(function () {
    let windowScroll = $(window).scrollTop();
    if (windowScroll > container) {
      $("#backTop").show();
    }
    else {
      $("#backTop").hide();

    }
  })
  $("#backTop").click(function () {
    $("html,body").animate({ scrollTop: 0 }, 300)
  })
});
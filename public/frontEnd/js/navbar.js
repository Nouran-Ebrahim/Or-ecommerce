// $(function () {
// $("#SaudiArabia").load("abaya.html");
// });


  $(document).ready(() => {
      $(window).scroll(function () {
        let windowScroll = $(window).scrollTop();
        console.log($(window).scrollTop())
        if (windowScroll > 13 ) {
          $("#backTop").show(500);
          $("nav").addClass("scroll-nav");
        }
        else {
          $("#backTop").fadeOut(500);
          $("nav").removeClass("scroll-nav")
        }
      })
      $("#backTop").click(function () {
        $("html,body").animate({ scrollTop: 0 }, 300)
      })
    });

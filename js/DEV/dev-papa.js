/*! papa 08-19-2020 */
$(document).ready(function() {


  // detect if hero image has loaded
  // as of 5 Sep 2020 hero image is cobweb
  function OnImageLoaded (img) { /* alert('hero is loaded');*/  }

  function PreloadImage (src) {
    var img = new Image ();
    img.onload = function () {OnImageLoaded (this)};
      img.src = src;
    }
	PreloadImage ("https://s3.amazonaws.com/darkblack-papa/cobweb.jpg");




  // .-cssloaded to body
  var e = document.getElementsByTagName("head")[0],
      t = document.body,
      d = document.createElement("link"),
      n = document.createElement("img"),
      r = homedir + "css/home.css";
    d.href = r, d.rel = "stylesheet", e.appendChild(d), n.onerror = function() {
        jQuery("body").addClass("-cssloaded"), t.removeChild(n)
    }, t.appendChild(n), n.src = r


  // smoothscroll + tab-accessible nav
  /*
    var a = $("#top").height(),
        b = a - 50;
    $(".navbar").attr("data-offset-top", b), $(".navbar-nav li a[href^='#']").on("click", function(a) {
        a.preventDefault();
        var b = this.hash;
        $("html, body").animate({
            scrollTop: $(b).offset().top
        }, 300, function() {
            window.location.hash = b
        })
    }), $(".navbar-nav").find("a").click(function() {
        $(".navbar-nav").is(":visible") && $(".navbar-toggle").is(":visible") && !$(this).parent("li").hasClass("dropdown") && $(".navbar-toggle").click()
    }), $(".navbar-toggle").click(function() {
        $(".navbar").hasClass("affix-top") && !$(".navbar-brand").is(":visible") ? $(".navbar-brand").addClass("show") : $(".navbar").hasClass("affix-top") && $(".navbar-brand").is(":visible") && $(".navbar-brand").removeClass("show")
    })

    */
}),


$(window).load(function() {
    $("#top").addClass("alive")
}), $(window).on("activate.bs.scrollspy", function(a) {
    var b, c;
    return b = $("a[href^='#']", a.target).attr("href").replace(/^#/, ""), c = $("#" + b), c.length && c.attr("id", ""), document.location.hash = b, c.length ? c.attr("id", b) : void 0
}), $(window).resize(function() {
    var a = $("#top").height(),
        b = a - 50;
    $(".navbar").attr("data-offset-top", b)
}), $(window).scroll(function() {
    $(".navbar").hasClass("affix") && !$(".dropdown").is(":visible") && $(".navbar-brand").removeClass("show")
});

$(document).ready(function() {
  $('.navbar-toggle').on('click', function(){
    $(this).attr("data-userevent", "");
  });
});

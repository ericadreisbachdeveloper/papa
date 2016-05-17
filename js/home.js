$(document).ready(function(){



  // on homepage the affixed navbar initial vertical position
  // pegged to height of #top (spiderweb image)
  var windowh = $('#top').height();
  var shownav = windowh - 50;
  $('.navbar').attr('data-offset-top',shownav);



  // smoothscroll on homepage hash links
  $(".navbar-nav li a[href^='#']").on('click', function(e) {
    e.preventDefault();
    var hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 300, function(){
      window.location.hash = hash;
    });
  });



  // if
  // 1. click homepage scroll links
  //    (i.e. clicking home/logo, about, skills, contact)
  // and
  // 2. .navbar-toggle button is visible
  // and
  // 3. it's NOT a link with a dropdown
  // then
  // >>> trigger .navbar-toggle click
  $('.navbar-nav').find('a').click(function(){
    if ($('.navbar-nav').is(':visible') && $('.navbar-toggle').is(':visible') && !$(this).parent('li').hasClass('dropdown')) {
      $('.navbar-toggle').click();
    }
  });



  // on mobile toggle click while on top slide (spiderweb)
  // show home/logo on click

  $('.navbar-toggle').click(function(){

    // if
    // 1. at top of frame    .affix-top = top frame
    // 2. and the logo is not visible
    // >> on .navbar-toggle click show logo
    if ($('.navbar').hasClass('affix-top') && !$('.navbar-brand').is(':visible')){
      $('.navbar-brand').addClass('show');
    }
    // else if
    // 1. at top of frame
    // 2. logo is visible
    // >> on .navbar-toggle click hide logo
    else if ($('.navbar').hasClass('affix-top') && $('.navbar-brand').is(':visible')){
      $('.navbar-brand').removeClass('show');
    }

  });
});



$(window).load(function(){
  // fade in #top (spiderweb image) once page loads
  $('#top').addClass('alive');
});


$(window).on('activate.bs.scrollspy', function(e) {
  var $hash, $node;
  $hash = $("a[href^='#']", e.target).attr("href").replace(/^#/, '');
  $node = $('#' + $hash);
  if ($node.length) {
    $node.attr('id', '');
  }
  document.location.hash = $hash;
  if ($node.length) {
    return $node.attr('id', $hash);
  }
});



$(window).resize(function(){

  // on homepage the affixed navbar initial vertical position
  // pegged to height of #top (spiderweb image)
  var windowh = $('#top').height();
  var shownav = windowh - 50;
  $('.navbar').attr('data-offset-top',shownav);
});



$(window).scroll(function(){

  // if mobile nav is uncollapsed one or more times
  // and user scrolls back to top
  // hide brand iff the nav is still uncollapsed
  if ( $('.navbar').hasClass('affix') && !$('.dropdown').is(':visible') ) {
    $('.navbar-brand').removeClass('show');
  }

});

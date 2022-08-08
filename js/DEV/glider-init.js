window.addEventListener('load', function(){
  new Glider(document.querySelector('#glider'), {
    slidesToShow: 1.5,
    draggable: true,
    dots: '#dots',
    responsive: [{
      breakpoint: 520,
      settings: { slidesToShow: 2.5 }
      }, {
      breakpoint: 768,
      settings: { slidesToShow: 3.5 }
    }]
  });
});

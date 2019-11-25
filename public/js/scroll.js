$('#down').click(()=> {
  $('html, body').animate({
    scrollTop: $("#lol").offset().top
  }, 500);
})

$(document).ready(() => {
  var up = document.getElementById('up');
    showUp();
  $(window).scroll(() => {
    showUp();
  })
  $('#up').click(() => {
    $('html, body').animate({
      scrollTop: $(".banner").offset().top
    }, 500);
  });
})

function showUp() {
  var st = $(this).scrollTop();
    if (st < $(".banner").height() - 300) {
      if (!up.classList.contains("is-hidden")) {
        up.classList.add("is-hidden"); 
      }
    }
    else {
      if (up.classList.contains("is-hidden")) {
        up.classList.remove("is-hidden"); 
      }
    }
}
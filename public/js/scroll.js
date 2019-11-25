$('#down').click(()=> {
  $('html, body').animate({
    scrollTop: $("#starred").offset().top - 6 * parseFloat(getComputedStyle(document.documentElement).fontSize)
  }, 500);
})

$(document).ready(() => {
  $('.card').click(function () {
    window.location.href = $(this).attr('data-route');
  });

  const code = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 83];
  i = 0;

  document.addEventListener('keydown', function(event) {
    if(event.keyCode == code[i]) {
      i++;
    }
    else {
      i=0;
    }
    if (i==code.length) {
      var div = document.createElement("div");
      div.id="code"
      div.style.position = "fixed";
      div.style.top = "0";
      div.style.bottom = "0";
      div.style.left = "0";
      div.style.right = "0";
      div.style.background = "black";
      div.style.color = "white";
      div.style.zIndex = "3000"
      div.innerHTML = "Hello";
      div.style.backgroundImage = 'url(' + document.body.dataset.url + '/man-of-culture.gif)';  
      div.onclick= () => {document.body.removeChild(div)}
      document.addEventListener('keydown', function(event) {
        if(event.keyCode == 27) {
          document.body.removeChild(div);
        }
      });
      document.body.appendChild(div);
    }
  });
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

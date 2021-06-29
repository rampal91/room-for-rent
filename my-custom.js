//==================header date and time=============
function showTime(){
  var date = new Date();
  var h = date.getHours(); // 0 - 23
  var m = date.getMinutes(); // 0 - 59
  var s = date.getSeconds(); // 0 - 59
  var session = "AM";
  
  if(h == 0){
      h = 12;
  }
  
  if(h > 12){
      h = h - 12;
      session = "PM";
  }
  
  h = (h < 10) ? "0" + h : h;
  m = (m < 10) ? "0" + m : m;
  s = (s < 10) ? "0" + s : s;
  
  var time = h + ":" + m + ":" + s + " " + session;
  document.getElementById("timer").innerText = time;
  document.getElementById("timer").textContent = time;
  
  setTimeout(showTime, 1000);
  
}

showTime();
// =======================Preloader====================
$(window).on('load', function() {
  if ($('#preloader').length) {
    $('#preloader').delay(100).fadeOut('slow', function() {
      $(this).remove();
    });
  }
});

//============ for about section====================
$(document).ready(function(){
  $(window).resize(function(){
    if ($(window).width() >=768) {
      $("#about-img").removeClass("mx-auto");
    }
    else {
      $("#about-img").addClass("mx-auto");
    }
  });
});

$(document).ready(function(){
  if ($(window).width() >=768) {
    $("#about-img").removeClass("mx-auto");
  }
  else {
    $("#about-img").addClass("mx-auto");
  }
});

//========================for navbar==========================
$(document).ready(function(){
  $("#nav-btn").click(function(){
    $("#main_nav").slideToggle("slow");
  });
});

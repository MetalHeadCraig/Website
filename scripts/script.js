function selectButton(buttonId) {
$('#pages button').removeClass('active');
$(buttonId).addClass('active');
}

var media = document.getElementById ('media');
var social = document.getElementById ('social-call');

window.onclick = function(event) {
  if (event.target == social) {
    media.style.display = "block";
    social.style.display = "none";    
  }

  else if (event.target !== media) {
    media.style.display = "none";
    social.style.display = "block";
  }
}
function selectButton(buttonId) {
$('#pages button').removeClass('active');
$(buttonId).addClass('active');
}

function toggleSocial() {
  $('#media').style.display = "block";
  $('#social-call').style.display = "none";
}

var media = document.getElementById ('media');
var social = document.getElementById ('social-call');

window.onclick = function(event) {
  if (event.target !== media) {
  media.style.display = "none";
  social.style.display = "block";
  }
}
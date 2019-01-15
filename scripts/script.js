function selectButton(buttonId) {
$('#pages button').removeClass('active');
$(buttonId).addClass('active');
}


var smedia = document.getElementById ('smedia');
var social = document.getElementById ('social-call');
var pmedia = document.getElementById ('pmedia');
var podcast = document.getElementById ('podcast-call');


window.onclick = function(event) {
  if (event.target == social) {
    smedia.style.display = "block";
    social.style.display = "none";    
  }

  else if (event.target !== smedia) {
    smedia.style.display = "none";
    social.style.display = "block";
  }

  if (event.target == podcast) {
    pmedia.style.display = "block";
    podcast.style.display = "none";    
  }

  else if (event.target !== pmedia) {
    pmedia.style.display = "none";
    podcast.style.display = "block";
  }
}

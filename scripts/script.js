function selectButton(buttonId) {
$('#pages button').removeClass('active');
$(buttonId).addClass('active');
}


var smedia = document.getElementById ('smedia');
var pmedia = document.getElementById ('pmedia');
var social = document.getElementById ('social-call');
var podcast = document.getElementById ('podcast-call');

/*window.onclick = function(event) {
  if (event.target == social) {
    smedia.style.display = "block";
    social.style.display = "none";    
  }

  else if (event.target !== smedia) {
    smedia.style.display = "none";
    social.style.display = "block";
  }

  else if (event.target == podcast) {
    pmedia.style.display = "block";
    podcast.style.display = "none";
  }

  else if (event.target !== pmedia) {
    pmedia.style.display = "none";
    podcast.style.display = "block";
  }
}
*/

switch(event) {
  case (event.target == social): 
    smedia.style.display = "block";
    social.style.display = "none";
  break;
  case (event.target == podcast):
    pmedia.style.display = "block";
    podcast.style.display = "none";
  break;
  default: smedia.style.display = "none"
  pmedia.style.display = "none"
}
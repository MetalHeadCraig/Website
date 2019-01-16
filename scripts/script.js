// Highlight the selected button in the navbar
function selectButton(buttonId) {
$('#pages button').removeClass('active');
$(buttonId).addClass('active');
}

// Global variables for social media and podcast media buttons and content
var smedia = document.getElementById ('smedia');
var social = document.getElementById ('social-call');
var pmedia = document.getElementById ('pmedia');
var podcast = document.getElementById ('podcast-call');

// display media content for social and podcast when buttons clicked, hide when anywhere else is clicked
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


// Open all external links in new tabs
$('a').each(function() {
  var a = new RegExp('/' + window.location.host + '/');
  if(!a.test(this.href)) {
      $(this).click(function(event) {
          event.preventDefault();
          event.stopPropagation();
          window.open(this.href, '_blank');
      });
  }
});

// This is where we can exclude instead of blanket if we need to (TESTED AND FUNCTIONAL)
/* $(document).ready(function() {

  $("a[href^=http]").each(function(){

     // NEW - excluded domains list
     var excludes = [
       // this is where we enter domains that we don't want externally opened, a shop for example.
     ];
     for (i = 0; i < excludes.length; i++) {
        if (this.href.indexOf(excludes[i]) != -1) {
           return true; // continue each() with next link
        }
     }

     if(this.href.indexOf(location.hostname) == -1) {

          // this does nothing other than allow the click below to function
          $(this).click(function() { return true; }); 

          $(this).attr({
              target: "_blank",
              title: "Opens in a new window"
          });

          $(this).click(); // this makes it happen
     }
  })
}); */
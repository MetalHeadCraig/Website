// highlight the selected button in the navbar
function selectButton(buttonId) {
  $('#pages button').removeClass('active');
  $(buttonId).addClass('active');
}
  
  // global variables for social media and podcast media buttons and content
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
};
  
  
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
});*/


/** This will change the height of the text input field in the contact form
** #textarea is modified in this case
*/
$(function() {
  $('textarea').on('keyup paste', function() {
    var $el = $(this),
        offset = $el.innerHeight() - $el.height();
        
      // check the height of the scrollbar
    if ($el.innerHeight < this.scrollHeight) {
      // this will increase the height of the text field if it is larger than the scrollbar
      $el.height(this.scrollHeight - offset);
    } else {
      // this will shrink the height when the text takes up less than the scrollbar height unless below
      // stated size
      $el.height(1);
      $el.height(this.scrollHeight - offset);
    }
  });
});

// toggle shadow class of list elements in Admin area and call buttons in sidebar on hover
$('.adminpanelli, #social-call, #podcast-call').hover(
  function(){ $(this).toggleClass('shadow--8dp') }
);

// toggle the class of the submit and reset buttons on the contact form
$('#reset, #submit').hover(
  function(){ $(this).toggleClass('shadow--6dp') }
);

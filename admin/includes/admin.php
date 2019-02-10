<!--Standard Javascript-->

<script>
//Greeting message for admin home page based of time of day
var greeting;
var time = new Date().getHours();
	if (time < 12) {
		greeting = "Good Morning, ";
	} else if (time < 18) {
		greeting = "Good Afternoon, ";
	} else {
		greeting = "Good Evening, ";
	}
document.getElementById("welcome").innerHTML += greeting;
</script>

<script>
// countdown timer for logout and change password/details
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = '../index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>

<!--JQuery-->

<script>
// Toggle password visablity on login and change password along with the eye icon
$(".toggle-password").click(function() {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
});
</script>

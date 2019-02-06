<?php
$page = "Update";
include 'includes/header.php';
?>
<link rel="stylesheet" href="/css/details.css" />

    <h1>Update your details</h1>

    <div class="details">

    <div class="profileimage shadow--3dp">
    An image you chose goes here
    <button>Update</button>
    </div>

    <div class="card shadow--3dp">
        <form method="Post">
                    <label>Full Name</label>
                    <input name="Name" placeholder="">

                    <label>Email</label>
                    <input name="email" type="email" placeholder="johndoe@somewhere.com">
                                                
                    <label>Mini Bio</label>
                    <textarea name="message" placeholder="I am an expanding box.
I only expand vertically.
I adjust based on the amount of text that overflows
100px
in
height"></textarea>

                    <input id="submit" name="submit" type="submit" value="Submit">
                
        </form>
    </div>

    </div>

<?php include 'includes/footer.php'; ?>
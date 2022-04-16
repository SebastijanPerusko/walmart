
<div class="container py-3">
<div id="profile">
    <?php
    /*echo "Hello <b id='welcome'><i>" .$username. "</i> !</b>";
    echo "<br/>";
    echo "<br/>";
    echo "Welcome to Admin Page";
    echo "<br/>";
    echo "<br/>";
    echo "Your Username is " .  $username;
    echo "<br/>";
    echo "Your Email is " . $email;
    echo "<br/>";*/
    ?>


        <h2 class='text-justify font-weight-bold display-6 fw-bold'>Account</h2>
        <hr class="featurette-divider">
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_information_r/'.$id_u); ?>">Click here to edit informations about your account</a></p>
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_password_u/'.$id_u); ?>">Click here to change the password</a></p>

    
</div>
</div>


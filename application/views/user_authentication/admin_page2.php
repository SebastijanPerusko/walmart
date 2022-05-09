
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
        <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-warning'>";
                    echo $warning;
                    echo "</h2>";
                } 
        ?>
        <h2 class='text-justify font-weight-bold display-6 fw-bold'>Your reservations</h2>
        <hr class="featurette-divider">

        <?php $iteration_res = 0; ?>

        <?php foreach ($user_reservation as $user_reservation_item): ?>


                <?php 
                        $iteration_res++;
                        $status_color;
                        $message = '';
                        if($user_reservation_item['status'] == 'pending'){
                                $status_color = "border border-primary";
                        } else if($user_reservation_item['status'] == 'accepted'){
                                $status_color = "border border-success";
                                $message = "Your reservation has been accepted, you can contact the owner at the following tel. number ".$user_reservation_item['tel']." or at the following email address ".$user_reservation_item['email'];
                        } else {
                                $status_color = "border border-danger";
                        }
                ?>

                <?php 
                      $name_space_first;
                      if($user_reservation_item['opis_k'] == 'self_s_u' || $user_reservation_item['opis_k'] == 'self_storage'){
                        $name_space_first = 'Self storage unit';
                      } else if ($user_reservation_item['opis_k'] == 'shipping_c' || $user_reservation_item['opis_k'] == 'shipping'){
                        $name_space_first = 'Shipping container';
                      } else {
                        $name_space_first = ucfirst(str_replace("_", " ", $user_reservation_item['opis_k']));
                      }
                ?>

                <main class="container ">
                  <div class="<?php echo " ".$status_color." " ?> p-5 rounded border">
                    <h3><?php echo $name_space_first." in ".$user_reservation_item['mesto']." for ".$user_reservation_item['datum_od']; ?></h3>
                     <p class="lead"><span class="text-success"><?php echo "<span class='text-primary'>Status: ".$user_reservation_item['status']."</span>"; ?></span></p>
                    <p class="lead"><span class="text-success"><?php echo $message; ?></span></p>

                    <?php
                    if($user_reservation_item['status'] == 'pending'){
                        $add = site_url('news/edit_reservation/'.$user_reservation_item['id_res']);
                        echo "<p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href=".$add.">Modify reservation</a></p>";
                        $add2 = site_url('news/delete_reservation/'.$user_reservation_item['id_res']);
                        echo "<p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a onclick='return confirm(&quot Are you sure you want to delete?&quot);' href=".$add2.">Delete reservation</a></p>";
                     }



                    ?>

                    <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('news/view/'.$user_reservation_item['id_o']); ?>">See this space</a></p>
                  </div>
                </main><br>

        <?php endforeach; ?>


        <?php 
            if($iteration_res == 0){
                echo " <h2 class='text-justify fw-bold text-muted'>You have no reservations. </h2>";
            }
            $iteration_user_res = 0;

        ?>



        <h2 class='text-justify font-weight-bold display-6 fw-bold'>User that reserved your spaces</h2>
        <hr class="featurette-divider">
        <?php foreach ($other_reservation as $other_reservation_item): ?>

                <?php 
                        $iteration_user_res++;
                        $status_color;
                        if($other_reservation_item['status'] == 'pending'){
                                $status_color = "border border-primary";
                        } else if($other_reservation_item['status'] == 'accepted'){
                                $status_color = "border border-success";
                        } else {
                                $status_color = "border border-danger";
                        }
                ?>

                <?php 
                      $name_space_first;
                      if($other_reservation_item['opis_k'] == 'self_s_u' || $other_reservation_item['opis_k'] == 'self_storage'){
                        $name_space_first = 'Self storage unit';
                      } else if ($other_reservation_item['opis_k'] == 'shipping_c' || $other_reservation_item['opis_k'] == 'shipping'){
                        $name_space_first = 'Shipping container';
                      } else {
                        $name_space_first = ucfirst(str_replace("_", " ", $other_reservation_item['opis_k']));
                      }


                      $time_reservation;
                      if($other_reservation_item['cas_rezervacije'] == 'month'){
                        $time_reservation = 'One month or less';
                      } else if ($other_reservation_item['cas_rezervacije'] == 'few_month'){
                        $time_reservation = 'Few months';
                      } else if ($other_reservation_item['cas_rezervacije'] == 'year'){
                        $time_reservation = 'One year or less';
                      } else if ($other_reservation_item['cas_rezervacije'] == 'few_year'){
                        $time_reservation = 'Few years';
                      } else if ($other_reservation_item['cas_rezervacije'] == 'indefinetly'){
                        $time_reservation = 'Indefinetly';
                      }

                ?>

                <main class="container ">
                  <div class="<?php echo " ".$status_color." " ?> bg-light p-5 rounded shadow-sm border">
                    <h3 class="font-weight-bold"><?php echo $other_reservation_item['ime']." reserved the ".$name_space_first." in ".$other_reservation_item['mesto'].", ".$other_reservation_item['naslov']; ?></h3>
                    <p class="lead">Items that he want to store: <span class="fw-bold"><?php echo $other_reservation_item['stvari']; ?></span></p>
                    <p class="lead">How long does he want to book this space: <span class="fw-bold"><?php echo $time_reservation; ?></span></p>
                    <p class="lead">When will like to move in: <span class="fw-bold"><?php echo $other_reservation_item['datum_od']; ?></span></p>
                    <p class="lead">Other information: <span class="fw-bold"><?php echo $other_reservation_item['opis']; ?></span></p>
                    <p class="lead">Status: <span class="fw-bold"><?php echo $other_reservation_item['status']; ?></span></p>
                    <p class="lead">Contact the user: <span class="font-weight-bold"><?php echo "tel. number: <span class='fw-bold'>".$other_reservation_item['tel']. "</span> | e-mail address: <span class='fw-bold'>".$other_reservation_item['email']."</span>"; ?></span></p>


                    <?php
                    if($other_reservation_item['status'] == 'pending'){
                        $add3 = site_url('news/accept_reservation/'.$other_reservation_item['id_res']);
                        echo "<p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a onclick='return confirm(&quot Are you sure you want to accept? Once accepted, you cannot make any other changes &quot);' href=".$add3.">Accept reservation</a></p>";
                        $add5= site_url('news/decline_reservation/'.$other_reservation_item['id_res']);
                        echo "<p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a onclick='return confirm(&quot Are you sure you want to accept? Once accepted, you cannot make any other changes &quot);' href=".$add5.">Decline reservation</a></p>";



                    }
                    ?>
                  </div>
                </main><br>

        <?php endforeach; ?>

        <?php 
            if($iteration_user_res == 0){
                echo " <h2 class='text-justify fw-bold text-muted'>You do not have any reservations from users who have reserved your space.  </h2>";
            }
            $iteration_listed = 0;

        ?>


        
        <h2 class='text-justify font-weight-bold display-6 fw-bold'>Your lised spaces</h2>
        <hr class="featurette-divider">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php foreach ($user_space as $user_space): ?>

                <?php 
                      $iteration_listed++;
                      $name_space_first;
                      if($user_space['opis_k'] == 'self_s_u' || $user_space['opis_k'] == 'self_storage'){
                        $name_space_first = 'Self storage unit';
                      } else if ($user_space['opis_k'] == 'shipping_c' || $user_space['opis_k'] == 'shipping'){
                        $name_space_first = 'Shipping container';
                      } else {
                        $name_space_first = ucfirst(str_replace("_", " ", $user_space['opis_k']));
                      }
                ?>


                <div class="col-3">
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h5 class="my-0 fw-normal"><?php echo $name_space_first." in ".$user_space['mesto']; ?></h5>
                  </div>
                  <div class="card-body">

                     <p class = 'w-100 btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('news/edit_space/'.$user_space['id']); ?>">Modify</a></p>
                    <p class = 'w-100 btn btn-lg btn-outline-primary text-decoration-none'><a onclick='return confirm(&quot Are you sure you want to accept? Once accepted, you cannot make any other changes &quot);' href="<?php echo site_url('news/delete/'.$user_space['id']); ?>">Delete</a></p>
                    <p class = 'w-100 btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('news/view/'.$user_space['id']); ?>">See this space</a></p>
                  </div>
                </div>
              </div>

        <?php endforeach; ?>
        </div>

        <?php 
            if($iteration_listed == 0){
                echo " <h2 class='text-justify fw-bold text-muted'>You do not have any listed space.</h2>";
            }

        ?>


        <h2 class='text-justify font-weight-bold display-6 fw-bold'>Account</h2>
        <hr class="featurette-divider">
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_information_r/'.$id_u); ?>">Click here to edit informations about your account</a></p>
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_password_u/'.$id_u); ?>">Click here to change the password</a></p>

    
</div>
</div>


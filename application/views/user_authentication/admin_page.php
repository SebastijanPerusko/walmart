
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

    $koncenZnesek = 0;
    foreach ($space as $space_item): 
        


        ?>

        <?php  $koncenZnesek+=$space_item["znesek"];  ?>
    <?php endforeach; ?>



    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Do sedaj uporabljen denar pri nakupu</div>
                    <div class="h3"><?php  echo $koncenZnesek."&euro;";  ?></div>
                    <a class="text-arrow-icon small" href="#!">
                        Ogled zgodovine plačil
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Skupno število točk</div>
                    <div class="h3"><?php  echo 3.2458*$koncenZnesek."&#128871;";  ?></div>
                    <a class="text-arrow-icon small text-secondary" href="#!">
                        Prevri ugodnosti
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Trenutna stopnja</div>
                    <div class="h3 d-flex align-items-center">BASE uporabnik</div>
                    <a class="text-arrow-icon small text-success" href="#!">
                        Nadgradnja profila
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <div class="card card-header-actions mb-4">
        <div class="card-header">
            Načini plačila
            <button class="btn btn-sm btn-primary" type="button">Dodaj način plačila</button>
        </div>
        <div class="card-body px-0">
            <!-- Payment method 1-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                     <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                    <div class="ms-4">
                        <div class="small">Visa s končnico 1285</div>
                        <div class="text-xs text-muted">Velja do 05/2024</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <div class="badge bg-light text-dark me-3">Default</div>
                    <a href="#!">Spremeni</a>
                </div>
            </div>
            <hr>
        </div>
    </div>


    

    <div class="card mb-4">
        <div class="card-header">Zgodovina naročil</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">ID transakcije</th>
                            <th class="border-gray-200" scope="col">Datum</th>
                            <th class="border-gray-200" scope="col">Znesek</th>
                            <th class="border-gray-200" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($space as $space_item): ?>

                            <tr>
                                <td><?php echo "#".$space_item["id"];  ?></td>
                                <td><?php echo $space_item["datum_ura"];  ?></td>
                                <td><?php echo $space_item["znesek"];  ?></td>
                                <td><span class="badge bg-success">Plačano</span></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <h2 class='text-justify font-weight-bold display-6 fw-bold'>Nastavitve</h2>
        <hr class="featurette-divider">
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_information_r/'.$id_u); ?>">Klikni tukaj za spremeniti informacije o računu</a></p>
        <p class = 'btn btn-lg btn-outline-primary text-decoration-none'><a href="<?php echo site_url('user_authentication/edit_password_u/'.$id_u); ?>">Klikni tukaj za spremeniti geslo</a></p>

    
</div>
</div>


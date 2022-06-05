
<div class="container">
  <div class="album">

    <!--PRIPOROČENI IZDELKI-->
    <div class = "row ">
      <div class = "col-12">
        <h6 class="recommended-text">Priporočeni izdelki</h6>
      </div>
    </div>
    <div class="row ">
        
      <div class="col-lg-2 col-md-4"> 
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/1">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/banana.jpg" width="100%" height="225">
              <div class="price-tag product-tag">
                <h6 class="">4.05€ oz. 10000🝧</h6>
              </div>
              <div class="grade-div">
                <h6 class="grade">Ocena uporabnikov: 2.0</h6>
              </div>            
            </div>
          </div>
        </a>
</div>
      </div>

      <div class="col-lg-2 col-md-4">
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/6">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/sladoled.jpg" width="100%" height="225">        
              <div class="">
                <h6 class="price-tag product-tag">0.99€ oz. 100🝧</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
</div>


      <div class="col-lg-2 col-md-4">
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/2">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/mleko.jpg" width="100%" height="225">
              <div class="">
                <h6 class="price-tag product-tag">1.51€ oz. 2000🝧</h6>
              </div>
              <div class="grade-div">
                <h6 class="grade">Ocena uporabnikov: 4.0</h6>
              </div>            
            </div>
          </div>
        </a>
      </div>
</div>

      <div class="col-lg-2 col-md-4">
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/9">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/gel_za_prhanje.jpg" width="100%" height="225">  
              <div class="price-tag product-tag">
                <h6 class="">2.75€ oz. 10000🝧</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
</div>

      <div class="col-lg-2 col-md-4">
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/10">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/food_cat.jpg" width="100%" height="225">
              <div class="price-tag product-tag">
                <h6 class="">2.75€ oz. 10000🝧</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
</div>
        
      <div class="col-lg-2 col-md-4">
      <div class="product-box-2 shadow-sm">
        <a class="" href="https://www.studenti.famnit.upr.si/~89191059/walmart/index.php/walmart/view/11">
          <div class="card">
            <div class="container_image_index">
              <img class="" src="https://www.studenti.famnit.upr.si/~89191059/walmart/uploads/cebula.jpg" width="100%" height="225">
              <div class="price-tag product-tag">
                <h6 class="">2.75€ oz. 10000🝧</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
</div>
    <div class="col yellow-border-bottom-recommended">
    </div>
</div>

     <!--FILTRIRANJE-->
    <div class="row">
      <div class="col-md-3">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary w-100">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Filtriraj izdelke</span>
          </a>
          <hr>

          <?php echo validation_errors(); ?>
          <?php $attributes = array('id' => 'form_search_a'); echo form_open('walmart/index', $attributes); ?>
          
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item index_padding_button text-center align-middle">
              <h5 class = "fw-bold text-center align-middle">Iskalnik: </h5>
            </li>

            <li class="nav-item index_padding_button">
              <input class="form-control col-lg-5 border border-light" name = "search" type="text" placeholder = "Isci" value="<?php if(isset($_SESSION['search'])){ echo $_SESSION['search']; } else { echo "";} ?>" aria-label="Search">
            </li>
            <hr>

            <li class="nav-item index_padding_button text-center align-middle">
              <h5 class = "fw-bold text-center align-middle">Filtri: </h5>
            </li>

            <li class="nav-item text-center index_padding_button">
              <select class="form-select border border-light" name="order_by" aria-label="Default select example">
                <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "oldest"){ echo "selected"; } else if(!isset($_SESSION['order_ad'])) { echo "selected";} ?> value="oldest">Priporočano</option>
                <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "low_to_high"){ echo "selected"; } ?> value="low_to_high">Najnižji ceni</option>
                <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "high_to_low"){ echo "selected"; } ?> value="high_to_low">Najvišji ceni</option>
                <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "low_to_high_r"){ echo "selected"; } ?> value="low_to_high_r">Najnižji oceni</option>
                <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "high_to_low_r"){ echo "selected"; } ?> value="high_to_low_r">Najvišji oceni</option>
              </select>
            </li>

            <li class="nav-item text-center index_padding_button">
              <select class="form-select border border-light" name="rating_order" aria-label="Default select example">
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "rating_none"){ echo "selected"; } else if(!isset($_SESSION['rating_ad'])) { echo "selected";} ?> value="rating_none">Ocena: Brez</option>
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "1_greater"){ echo "selected"; } ?> value="1_greater">1 ali višja</option>
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "2_greater"){ echo "selected"; } ?> value="2_greater">2 ali višja</option>
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "3_greater"){ echo "selected"; } ?> value="3_greater">3 ali višja</option>
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "4_greater"){ echo "selected"; } ?> value="4_greater">4 ali višja</option>
                <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "5_greater"){ echo "selected"; } ?> value="5_greater">5</option>
              </select>
            </li>
            <li class="nav-item index_padding_button">
              <input class="form-control col-md-2 border border-light" name = "start_price" type="text" placeholder = "Cena od" value="<?php if(isset($_SESSION['price_from'])){ echo $_SESSION['price_from']; } else { echo "";} ?>" aria-label="Search">
            </li>
            <li class="nav-item index_padding_button">
              <input class="form-control col-lg-5 border border-light" name = "end_price" type="text" placeholder = "Cena do" value="<?php if(isset($_SESSION['price_end'])){ echo $_SESSION['price_end']; } else { echo "";} ?>" aria-label="Search">
            </li>

          </ul>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <hr>
            <li class="nav-item index_padding_button text-center align-middle">
              <h5 class = "fw-bold text-center align-middle">Kategorije: </h5>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['climate_controlled']) && $_SESSION['climate_controlled'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "climate_controlled_button" id="climate_controlled_check" class="w-100">
              <label class="btn btn-outline-light w-100" for="climate_controlled_check">Sadje in zelenjava</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['smoke_free']) && $_SESSION['smoke_free'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "smoke_free_button" id="smoke_free_button">
              <label class="btn btn-outline-light w-100" for="smoke_free_button">hlajeni in mlecni izdelki</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['smoke_detectors']) && $_SESSION['smoke_detectors'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "smoke_detectors_button" id="smoke_detectors_button">
              <label class="btn btn-outline-light w-100" for="smoke_detectors_button">Mesni izdelki, meso in ribe</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['private_entrance']) && $_SESSION['private_entrance'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "private_entrance_button" id="private_entrance_button">
              <label class="btn btn-outline-light w-100" for="private_entrance_button">Prijace</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['private_space']) && $_SESSION['private_space'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "private_space_button" id="private_space_button">
              <label class="btn btn-outline-light w-100" for="private_space_button">Kruh, pecivo in slascice</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['locked_area']) && $_SESSION['locked_area'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "locked_area_button" id="locked_area_button">
              <label class="btn btn-outline-light w-100" for="locked_area_button">Zamrznjeni izdelki</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['pet_free']) && $_SESSION['pet_free'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "pet_free_button" id="pet_free_button">
              <label class="btn btn-outline-light w-100" for="pet_free_button">Zivali</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['security_camera']) && $_SESSION['security_camera'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "security_camera_button" id="security_camera_button">
              <label class="btn btn-outline-light w-100" for="security_camera_button">Osebna nega</label><br>
            </li>

            <li class="nav-item index_padding_button">
              <input <?php if(isset($_SESSION['no_strairs']) && $_SESSION['no_strairs'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "no_strairs_button" id="no_strairs_button">
              <label class="btn btn-outline-light w-100" for="no_strairs_button">Dom in gospodinjstvo</label><br>
            </li>
            <li class="nav-item index_padding_button">
              <input id = "form_search_b" type="submit" class="btn btn-primary text-primary bg-light h-100 border border-warning w-100" name="submit1" value="Išči" />
            </li>
          </ul>
        </form>
        <hr>
        <div class="dropdown">
          <a href="#">
            <h1><i class="bi bi-caret-up-square-fill"></i></h1>
          </a>
        </div>
      </div>
    </div>
<div class="col-md-9">
<?php $num_iteration = 0;?>

<div class="row">
<?php foreach ($space as $space_item): ?>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="product-box shadow-sm">
          <a class = "space_ad" href="<?php echo site_url('walmart/view/'.$space_item['id_ad_product']); ?>">
            <div class="container_image_index img-edit">
              <img class="rounded-lg mx-auto d-block image_fit_index" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225">
              <div class="price-tag product-tag">
                <h6 class=""><?php echo $space_item['cena']."&euro; oz. ".$space_item['cena_tocke']."&#128871;"; ?></h6>
              </div>
              <div class="product-desc">
                <p class="prod-desc"><?php echo $space_item['ime']." - ".($space_item['teza_g']/1000)."kg"; ?></p>
              </div>
              <div>
              <?php if($space_item['avg_oglas'] != ''){
                  echo "<div class='grade-div'><h6 class='grade'>Ocena uporabnikov: ".substr($space_item['avg_oglas'], 0, 3)."</h6></div>";
                  }
                  ?>
              </div>
            </div>
          </a>
          </div>
        </div>


<?php endforeach; ?>
</div>

<div class="col-12 text-decoration-none">
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php $times = intval($num_space / 12);
        if($num_space % 12 >= 1) {$times++;} 
        ?>

        <?php for($i = 0; $i < $times; $i++){ ?>
        <li class="page-item <?php if($current_page == ($i+1)){echo " active"; }  ?>"><a class="page-link" href="<?php echo site_url('walmart/index/'.($i+1)); ?>"><?php echo ($i+1); ?></a></li>
        <?php } ?>

      </ul>
    </nav>
  </div>
</div>
</div>
</div>
</div>
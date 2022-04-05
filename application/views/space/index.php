<!--<h2><?php /*echo $title;*/ ?></h2>-->

<?php 

    /*echo "city_post ".$_SESSION['city_post']."<br>"; 
    echo "point_value ".$_SESSION['point_value']."<br>"; 
    echo "point_value_size ".$_SESSION['point_value_size']."<br>"; 
    echo "price_from ".$_SESSION['price_from']."<br>"; 
    echo "price_end ".$_SESSION['price_end']."<br>"; 
    echo "num_space ".$_SESSION['num_space']."<br>"; */


?>



<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


      <div class="collapse navbar-collapse">
        <?php echo validation_errors(); ?>
        <?php 
        $attributes = array('id' => 'form_search_a');
        echo form_open('news/index', $attributes); 
        ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item index_padding_button">
            <input class="form-control border border-primary" name = "city_name" type="text" placeholder="Select the city" 
            value="<?php if(isset($_SESSION['city_post'])){ echo $_SESSION['city_post']; } else { echo "";} ?>" 
            aria-label="Search">
          </li>

          <li class="nav-item text-center index_padding_button">
            <select class="form-select border border-primary" name="type_storage" aria-label="Default select example">
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "all"){ echo "selected"; } else if(!isset($point_value)) { echo "selected";} ?> value="all">All storages</option>
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "veichle"){ echo "selected"; } ?> value="veichle">Veichle storage</option>
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "object"){ echo "selected"; } ?> value="object">Object storage</option>
            </select>
          </li>


          <li class="nav-item text-center index_padding_button">
            <select class="form-select border border-primary" name="size_storage">
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "any_size"){ echo "selected"; } else if(!isset($point_value_size)) { echo "selected";} ?> value="any_size">All sizes</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "extra_small"){ echo "selected"; } ?> value="extra_small">Extra small - less than 5x5</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "small"){ echo "selected"; } ?> value="small">Small - from 5x5 to 10x10 </option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "medium"){ echo "selected"; } ?> value="medium">Medium - from 10x10 to 15x15</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "large"){ echo "selected"; } ?> value="large">Large - from 15x15</option>
            </select>
          </li>

          <li class="nav-item text-center index_padding_button">
            <select class="form-select border border-primary" name="order_by" aria-label="Default select example">
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "oldest"){ echo "selected"; } else if(!isset($_SESSION['order_ad'])) { echo "selected";} ?> value="oldest">Oldest</option>
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "newest"){ echo "selected"; } ?> value="newest">Newest</option>
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "low_to_high"){ echo "selected"; } ?> value="low_to_high">Low to high price</option>
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "high_to_low"){ echo "selected"; } ?> value="high_to_low">High to low price</option>
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "low_to_high_r"){ echo "selected"; } ?> value="low_to_high_r">Low to high rating</option>
              <option <?php if(isset($_SESSION['order_ad']) && $_SESSION['order_ad'] == "high_to_low_r"){ echo "selected"; } ?> value="high_to_low_r">High to low rating</option>
            </select>
          </li>

          <li class="nav-item text-center index_padding_button">
            <select class="form-select border border-primary" name="rating_order" aria-label="Default select example">
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "rating_none"){ echo "selected"; } else if(!isset($_SESSION['rating_ad'])) { echo "selected";} ?> value="rating_none">Rating: None</option>
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "1_greater"){ echo "selected"; } ?> value="1_greater">1 or greater</option>
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "2_greater"){ echo "selected"; } ?> value="2_greater">2 or greater</option>
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "3_greater"){ echo "selected"; } ?> value="3_greater">3 or greater</option>
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "4_greater"){ echo "selected"; } ?> value="4_greater">4 or greater</option>
              <option <?php if(isset($_SESSION['rating_ad']) && $_SESSION['rating_ad'] == "5_greater"){ echo "selected"; } ?> value="5_greater">5</option>
            </select>
          </li>

  
          <!--<li class="nav-item">
            <p>Price from</p>
          </li>-->
          <li class="nav-item index_padding_button">
            <input class="form-control col-md-2 border border-primary" name = "start_price" type="text" placeholder = "Price from" value="<?php if(isset($_SESSION['price_from'])){ echo $_SESSION['price_from']; } else { echo "";} ?>" aria-label="Search">
          </li>
          <!--<li class="nav-item align-middle">
            <p> to </p>
          </li>-->
          <li class="nav-item index_padding_button">
            <input class="form-control col-lg-5 border border-primary" name = "end_price" type="text" placeholder = "Price to" value="<?php if(isset($_SESSION['price_end'])){ echo $_SESSION['price_end']; } else { echo "";} ?>" aria-label="Search">
          </li>

          </ul>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item index_padding_button text-center align-middle">
            <h5 class = "fw-bold text-center align-middle">Features: </h5>
          </li>


          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['climate_controlled']) && $_SESSION['climate_controlled'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "climate_controlled_button" id="climate_controlled_check">
            <label class="btn btn-outline-primary" for="climate_controlled_check">Climate controlled</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['smoke_free']) && $_SESSION['smoke_free'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "smoke_free_button" id="smoke_free_button">
            <label class="btn btn-outline-primary" for="smoke_free_button">Smoke free</label><br>
          </li>


          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['smoke_detectors']) && $_SESSION['smoke_detectors'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "smoke_detectors_button" id="smoke_detectors_button">
            <label class="btn btn-outline-primary" for="smoke_detectors_button">Smoke detectors</label><br>
          </li>


          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['private_entrance']) && $_SESSION['private_entrance'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "private_entrance_button" id="private_entrance_button">
            <label class="btn btn-outline-primary" for="private_entrance_button">Private entrance</label><br>
          </li>


          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['private_space']) && $_SESSION['private_space'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "private_space_button" id="private_space_button">
            <label class="btn btn-outline-primary" for="private_space_button">Private space</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['locked_area']) && $_SESSION['locked_area'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "locked_area_button" id="locked_area_button">
            <label class="btn btn-outline-primary" for="locked_area_button">Locked area</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['pet_free']) && $_SESSION['pet_free'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "pet_free_button" id="pet_free_button">
            <label class="btn btn-outline-primary" for="pet_free_button">Pet free</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['security_camera']) && $_SESSION['security_camera'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "security_camera_button" id="security_camera_button">
            <label class="btn btn-outline-primary" for="security_camera_button">Security camera</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input <?php if(isset($_SESSION['no_strairs']) && $_SESSION['no_strairs'] == '1'){ echo "checked"; } ?> type="checkbox" class="btn-check" name = "no_strairs_button" id="no_strairs_button">
            <label class="btn btn-outline-primary" for="no_strairs_button">No stairs</label><br>
          </li>

          <li class="nav-item index_padding_button">
            <input id = "form_search_b" type="submit" class="btn btn-primary h-100 border border-danger" name="submit1" value="Find" />
          </li>
        </ul>

      </form>
    </div>
  </nav>
</div>




<div class="album py-5 bg-light">
  <div class="container">

<?php $num_iteration = 0;?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php foreach ($space as $space_item): ?>

      
        <div class="col">
          <a class = "space_ad" href="<?php echo site_url('news/view/'.$space_item['id_ad_space']); ?>">
          <div class="card shadow-sm border rounded">
            <div class="container_image_index">
              <img class="rounded-lg mx-auto d-block image_fit_index" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225">
              <div class="text-over-image bottom-left_index rounded-pill"><h3 class="fw-bold"><?php echo $space_item['sirina']."X".$space_item['dolzina']; ?></h3></div>
              <div class="text-over-image bottom-right_index rounded-pill"><h3 class="fw-bold"><?php echo $space_item['cena']."&euro;/month"; ?></h3></div>
              <?php if($space_item['avg_oglas'] != ''){
                echo "<div class='text-over-image top-right_index rounded-pill'><h6 class='fw-bold text-primary'>rating: ".substr($space_item['avg_oglas'], 0, 3)."</h6></div>";
                }
                ?>
            </div>

            <?php 
              $name_space_first;
              if($space_item['opis_k'] == 'self_s_u' || $space_item['opis_k'] == 'self_storage'){
                $name_space_first = 'Self storage unit';
              } else if ($space_item['opis_k'] == 'shipping_c' || $space_item['opis_k'] == 'shipping'){
                $name_space_first = 'Shipping container';
              } else {
                $name_space_first = ucfirst(str_replace("_", " ", $space_item['opis_k']));
              }
            ?>

            <div class="card-body bg-primary">
              <p class="card-text text-index-white font-weight-bold fw-bold"><?php echo $space_item['dolzina']."x"; echo $space_item['sirina']." "; echo $name_space_first." in ".$space_item['mesto'].", ".$space_item['drzava']; ?></p>
              
            </div>
          </div>
          </a>
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
        <li class="page-item <?php if($current_page == ($i+1)){echo " active"; }  ?>"><a class="page-link" href="<?php echo site_url('news/index/'.($i+1)); ?>"><?php echo ($i+1); ?></a></li>
        <?php } ?>

      </ul>
    </nav>
  </div>


</div>

</div>





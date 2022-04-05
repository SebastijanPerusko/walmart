<div class = "container">
   <main>

      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('news/create'); ?>


      <div class="row">
         <p class = "text-success"><?php if (isset($message_display)) { echo $message_display; } ?></p>
         <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
         <p class = "text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></p>


         <div id = "select_type_container" class = "col-12 text-center">
            <h4 class="mb-3 display-6 fw-bold">General information about you space</h4>
            <div id = "div_type_select" class = "text-center">
               <label for="type_select_radio" class = "font-weight-bold">Can your space store a vehicle?</label><br>
               <div id="type_select" class="btn-group" data-toggle="buttons">

                  <input type="radio" class="btn-check" id = "type_select_radio_yes"  name="type_select_radio" value="yes" onchange="handleYesNo();"> 
                  <label class="btn btn-outline-primary" for="type_select_radio_yes">YES</label><br>

                  <input id = "type_select_radio_no" class="btn-check" type="radio"  name="type_select_radio" value="no" onchange="handleYesNo();"/> 
                  <label class="btn btn-outline-primary" for="type_select_radio_no">NO</label>

               </div>
            </div>


            <div id = "div_type_no_select" class = "col-12 text-center">
               <label for="type_no_select" class = "font-weight-bold">Which best describes your storage?</label><br>
               <div id="type_select_no" class="text-center" data-toggle="buttons">

                  <input type="radio" class="btn-check" name="type_select_no" id = "attic_no_select" value="attic">
                  <label class="btn btn-outline-primary" for="attic_no_select">Attic</label>

                  <input type="radio" class="btn-check"  name="type_select_no"  id = "basement_no_select" value="basement">
                  <label class="btn btn-outline-primary" for="basement_no_select">Basement</label>

                  <input type="radio" class="btn-check"  name="type_select_no" id = "bedroom_no_select" value="bedroom">
                  <label class="btn btn-outline-primary" for="bedroom_no_select">Bedroom</label>

                  <input type="radio" class="btn-check" name="type_select_no" id = "garage_no_select" value="garage">
                  <label class="btn btn-outline-primary" for="garage_no_select">Garage</label>

                  <input type="radio" class="btn-check" name="type_select_no" id = "self_s_u_no_select" value="self_s_u">
                  <label class="btn btn-outline-primary" for="self_s_u_no_select">Self storage unit</label>

                  <input type="radio" class="btn-check" name="type_select_no" id = "shed_no_select" value="shed">
                  <label class="btn btn-outline-primary" for="shed_no_select">Shed</label>

                  <input type="radio" class="btn-check" name="type_select_no" id = "shipping_c_no_select" value="shipping_c"> 
                  <label class="btn btn-outline-primary" for="shipping_c_no_select">Shipping container</label>

                  <input type="radio" class="btn-check" name="type_select_no" id = "warehouse_no_select" value="warehouse">
                  <label class="btn btn-outline-primary" for="warehouse_no_select">Warehouse</label>

               </div>
            </div>




            <div id = "div_location_select" class = "col-12 text-center">
               <label for="location_select" class = "font-weight-bold">Which best describes your space?</label><br>
               <div id="type_select_yes" class="btn-group" data-toggle="buttons">


                  <input id = "location_select_radio_i" class="btn-check" type="radio" name="type_select_yes" value="indoor" onchange="handleLocation();"> 
                  <label class="btn btn-outline-primary" for="location_select_radio_i">Indoor</label>
 
                  <input id = "location_select_radio_c" class="btn-check" type="radio"  name="type_select_yes" value="cover" onchange="handleLocation();"/> 
                  <label class="btn btn-outline-primary" for="location_select_radio_c">Outdoor-covered</label>

                  <input id = "location_select_radio_u" class="btn-check" type="radio"  name="type_select_yes" value="uncover" onchange="handleLocation();"/>
                  <label class="btn btn-outline-primary" for="location_select_radio_u">Outdoor-uncovered</label>

               </div>
            </div>


            <div id = "div_indoor_select" class = "col-12 text-center">
               <label for="indoor_select" class = "font-weight-bold">Which best describes your indoor vehicle storage?</label><br>
               <div id="indoor_select" class="btn-group" data-toggle="buttons">

                  <input type="radio" class="btn-check" id = "garage_indoor_select" name="indoor_select" value="garage">
                  <label class="btn btn-outline-primary" for="garage_indoor_select">Garage</label>

                  <input type="radio" class="btn-check" id = "self_storage_indoor_select" name="indoor_select" value="self_storage"/>
                  <label class="btn btn-outline-primary" for="self_storage_indoor_select">Self storage unit</label>

                  <input type="radio" class="btn-check" id = "shed_indoor_select" name="indoor_select" value="shed"/>
                  <label class="btn btn-outline-primary" for="shed_indoor_select">Shed</label>

                  <input type="radio" class="btn-check" id = "shipping_indoor_select" name="indoor_select" value="shipping"/>
                  <label class="btn btn-outline-primary" for="shipping_indoor_select">Shipping container</label>

                  <input type="radio" class="btn-check" id = "warehouse_indoor_select" name="indoor_select" value="warehouse"/>
                  <label class="btn btn-outline-primary" for="warehouse_indoor_select">Warehouse</label>
               </div>
            </div>

            <div id = "div_cover_select" class = "col-12 text-center">
               <label for="cover_select" class = "font-weight-bold">Which best describes your covered outdoor vehicle storage?</label><br>
               <div id="cover_select" class="btn-group" data-toggle="buttons">

                  <input type="radio" class="btn-check" id = "carport_cover_select" name="cover_select" value="carport"/>
                  <label class="btn btn-outline-primary" for="carport_cover_select">Carport</label>

                  <input type="radio" name="cover_select" class="btn-check" id = "parking_lot_cover_select" value="parking_lot"/>
                  <label class="btn btn-outline-primary" for="parking_lot_cover_select">Parking lot</label>
               </div>
            </div>


            <div id = "div_uncover_select" class = "col-12 text-center">
               <label for="uncover_select" class = "font-weight-bold">Which best describes your uncovered outdoor vehicle storage?</label><br>
               <div id="uncover_select" class="btn-group" data-toggle="buttons">

                  <input type="radio" class="btn-check" id = "driveway_uncover_select" name="uncover_select" value="driveway"/>
                  <label class="btn btn-outline-primary" for="driveway_uncover_select">Driveway</label>

                  <input type="radio"  name="uncover_select" class="btn-check" id = "parking_lot_uncover_select" value="parking_lot"/> 
                  <label class="btn btn-outline-primary" for="parking_lot_uncover_select">Parking lot</label>

                  <input type="radio"  name="uncover_select" class="btn-check" id = "unpawed_lot_uncover_select" value="unpawed_lot"/> 
                  <label class="btn btn-outline-primary" for="unpawed_lot_uncover_select">Unpawed lot</label>


                  <input type="radio"  name="uncover_select" class="btn-check" id = "street_parking_uncover_select" value="street_parking"/> 
                  <label class="btn btn-outline-primary" for="street_parking_uncover_select">Street parking</label>
               </div>
            </div>
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3 display-6 fw-bold">Location of your space</h4><br>
         </div>
         <div class="col-md-3">
            <div class="form-floating">
               <input class = "form-control border border-primary" id = "input_country" class="form-control" type="text" name="country" />
               <label for="input_country">Country</label>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-floating">
               <input class="form-control border border-primary" type="text" id = "input_city" class="form-control" name="city"/>
               <label for="input_city">City</label>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-floating">
               <input class="form-control border border-primary" type="text" id = "input_paddress" name="paddress"  />
               <label for="input_paddress">Zip</label>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-floating">
               <input class="form-control border border-primary" type="text" id = "input_address" name="address"/><br />
               <label for="input_address">Address</label>
            </div>
         </div>

         <div class = "border rounded text-center">
            <div id = "" class = "col-md-3 text-center form-check-inline align-middle">
               <h4 class="mb-3 display-6 fw-bold">Describe your space</h4><br>
            </div>
            <div id = "" class = "col-5 text-center form-check-inline">
               <div class="form-floating mx-auto">
                  <textarea class="form-control border border-primary" id = "input_description" name="text" rows="20"></textarea>
                  <label for="input_description">Description</label>
               </div>
            </div>
         </div>

         <div class = "border rounded text-center">
            
            <div class="form-check-inline text-center">
               <div class="form-floating">
                  <input class="form-control border border-primary" id = "input_length" class="form-control" type="text" name="length">
                  <label for="input_length">Length</label>
               </div>
            </div>

            <div class="form-check-inline text-center">
               <div class="form-floating">
                  <input class="form-control border border-primary" id = "input_width" class="form-control" type="text" name="width"/>
                  <label for="input_width">Width</label>
               </div>
            </div>

            <div class="form-check-inline text-center">
               <div class="form-floating">
                  <input class="form-control border border-primary" id = "input_height" class="form-control" type="text" name="height"/>
                  <label for="input_height">Height</label>
               </div>
            </div>
            <div id = "" class = "col-md-3 text-center form-check-inline align-middle">
               <h4 class="mb-3 display-6 fw-bold">How big is your space</h4><br>
            </div><br>
         </div><br>

         <div class = "border rounded">
            <div id = "" class = "col-5 text-center form-check-inline align-middle">
               <h4 class="mb-3 display-6 fw-bold">Set the price per month</h4><br>
            </div>
            <div id = "" class = "text-center col-md-3 form-check-inline">
               <div class="form-floating">
                  <input class="form-control border border-primary" id = "input_price" type="number" name="price" />
                  <label for="input_price">Price</label>
               </div>
            </div><br>
         </div><br>


         <div class = "border rounded">
            <div id = "" class = "col-12 text-center">
               <h4 class="mb-3 display-6 fw-bold">Visits</h4><br>
            </div>
            <div id = "" class = "col-12 text-center">
            <label for="need_owner">Is the space accessible only with the owner? So the user will have to make an appointment before visiting this space?</label>
               <input class="btn-check" id = "need_owner_check" type="checkbox" name="need_owner" value="yes"/>
               <label class="btn btn-outline-primary" for="need_owner_check">YES, is accesible only with the owner. </label>



            <div id = "div_often_visit">
               <label for="often_visit">How often the renters can access their items?</label><br>
               <div id="often_visit" class="btn-group" data-toggle="buttons">

                  <input class="btn-check" id = "often_daily" type="radio" name="often_visit" value="daily">
                  <label class="btn btn-outline-primary" for="often_daily">Daily</label>

                  <input class="btn-check" id = "often_weekly" type="radio"  name="often_visit" value="weekly">
                  <label class="btn btn-outline-primary" for="often_weekly">Weekly</label>

                  <input class="btn-check" id = "often_monthly" type="radio"  name="often_visit" value="monthly"> 
                  <label class="btn btn-outline-primary" for="often_monthly">Monthly</label>
               </div>
            </div>

            <div id = "" class = "col-12 text-center">
               <div id = "div_day_visit">
                  <label for="day_visit">What time of the day can renters access their items</label><br>
                  <div id="day_visit" class="btn-group" data-toggle="buttons">

                     <input class="btn-check" id = "time_daytime" type="radio" name="day_visit" value="daytime"/> 
                     <label class="btn btn-outline-primary" for="time_daytime">Daytime(8am-8pm)</label>

                     <input class="btn-check" id = "time_evening" type="radio"  name="day_visit" value="evening"/> 
                     <label class="btn btn-outline-primary" for="time_evening">Evening(5pm-9pm)</label>

                     <input class="btn-check" id = "time_all_day" type="radio"  name="day_visit" value="all_day"/> 
                     <label class="btn btn-outline-primary" for="time_all_day">24/7</label>

                  </div>
               </div>
            </div><br>
         </div><br>

         <div class ="border rounded">
            <div id = "" class = "col-12 text-center">
               <h4 class="mb-3 display-6 fw-bold">Select the Features</h4><br>
            </div>

            <div id = "" class = "col-12 text-center">
               <input class="btn-check" id = "checkbox_cli_con" type="checkbox" name="climate_controlled" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_cli_con">Climate Controlled</label>

               <input class="btn-check" id = "checkbox_smoke_free" type="checkbox" name="smoke_free" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_smoke_free">Smoke Free</label>

               <input class="btn-check" id = "checkbox_smoke_detectors" type="checkbox" name="smoke_detectors" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_smoke_detectors">Smoke detectors</label>            

               <input class="btn-check" id = "checkbox_private_entrance" type="checkbox" name="private_entrance" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_private_entrance">Private Entrance</label>

               <input class="btn-check" id = "checkbox_private_space" type="checkbox" name="private_space" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_private_space">Private space</label>

               <input class="btn-check" id = "checkbox_locked_area" type="checkbox" name="locked_area" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_locked_area">Locked area</label>

               <input class="btn-check" id = "checkbox_pet_free" type="checkbox" name="pet_free" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_pet_free">Pet free</label>

               <input  class="btn-check" id = "checkbox_security_camera" type="checkbox" name="security_camera" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_security_camera">Security Camera</label>

               <input  class="btn-check" id = "checkbox_no_stairs" type="checkbox" name="no_stairs" value="yes"/>
               <label class="btn btn-outline-primary" for="checkbox_no_stairs">No stairs</label>
            </div><br>
         </div><br>

         <div class = "border rounded">
            <div id = "" class = "col-12 text-center">
               <h4 class="mb-3 display-6 fw-bold">Load an image of your space</h4><br>
            </div>
            <div id = "" class = "col-12 text-center">
               <input type="file" name="userfile" size="10000" />
            </div><br>
            <input type="submit" class="w-100 btn btn-primary btn-lg" name="submit" value="List your space" />
         </div>
   </div>
   </main>
</div>
</div>
</div>
</form>




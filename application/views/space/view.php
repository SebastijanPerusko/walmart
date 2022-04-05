<!--<h2><?php /*echo $title;*/ ?></h2>-->

<div class="container py-3">
        <div class="container marketing">
                <?php $time_access;
                if($space_item['cas'] == 'all_day'){
                        $time_access = '24/7';
                } else if($space_item['cas'] == 'evening') {
                        $time_access = 'during the evening hours';
                } else {
                        $time_access = 'during the morning time';
                }

                if($space_item['lastnik_ogled'] == 'yes') {
                        $time_access = $time_access." "."<span class = 'fw-bold'>and an appointment is required before visiting the space.</span>";
                }

                ?>

                <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-danger'>";
                    echo $warning;
                    echo "</h2>";
                } ?>
 
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

                <div class="row featurette">
                      <div class="col-md-3 order-md-2">
                        <h2 class="featurette-heading display-5 fw-bold"><?php echo $name_space_first." in ".$space_item['mesto']; ?><div class="text-muted">
                                <?php echo form_open('news/reserve/'.$space_item['id_o']); ?>
                                <input class="w-100 btn btn-primary border border-danger" type="submit" name="submit" value="Reserve this space" />
                        </form></div></h2>
                        <p class="lead">
                                <?php

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>".$space_item['cena']."&euro;/month</h5></div></div>";

                                if($vote_ad_avg['vote_avg'] != NULL){
                                        echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Rating: ".substr($vote_ad_avg['vote_avg'], 0, 3)."</h5></div></div>";
                                }
                                ?>

                                <?php 
                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'>";

                                echo "<h5>Size: ".$space_item['dolzina']." x ".$space_item['sirina']."m"."</h5>";

                                echo "</div></div>"; ?>


                                <?php

                                if($space_item['visina'] > 0){
                                        echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Height: ".$space_item['visina']."</h5></div></div>";
                                }

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Storage Type: ".$space_item['opis_k']."</h5></div></div>";

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>You can access this space ".$space_item['gostota']." ".$time_access."</h5></div></div>";

                                ?>

                        </p>
                </div>
                <div class="col-md-9 order-md-1">
                        <img class="rounded-lg mx-auto d-block img-fluid" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225" alt="...">

                </div>
        </div>
        <hr class="featurette-divider">
        <h2 class='text-justify display-5 fw-bold'>General information</h2>

        <table class="table text-center">
          <tbody>
            <tr>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Country: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['drzava']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>City: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['p_stevilka'].", ".$space_item['mesto']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Address: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['naslov']."</h4>"; ?></td>
      </tr>
</tbody>
</table>



<hr class="featurette-divider">
<div class="container py-4">
<h2 class='text-justify display-5 fw-bold'>Features</h2>
<div class="row align-items-md-stretch">

        <?php 
        if($space_item['vozilo'] == 'yes'){
                echo "<div class='card_padding_feature col-md-3'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>This storage can store veichles</h2></div></div>"; 
        } else if ($space_item['vozilo'] == 'no'){
                echo "<div class='card_padding_feature col-md-3'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>This storage can't store veichles</h2></div></div>"; 
        }

        if($space_item['lokacija'] != 'none'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>".$space_item['lokacija']."</h2></div></div>"; 
        }
        echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>".$space_item['opis_k']."</h2></div></div>"; 
        if($space_item['climate_controlled'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M5 12.5a1.5 1.5 0 1 1-2-1.415V9.5a.5.5 0 0 1 1 0v1.585A1.5 1.5 0 0 1 5 12.5z'/><path d='M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1.293l.646-.647a.5.5 0 0 1 .708.708L9 5.207v1.927l1.669-.963.495-1.85a.5.5 0 1 1 .966.26l-.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.884.237a.5.5 0 1 1-.26.966l-1.848-.495L9.5 8l1.669.963 1.849-.495a.5.5 0 1 1 .258.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.237.883a.5.5 0 1 1-.966.258L10.67 9.83 9 8.866v1.927l1.354 1.353a.5.5 0 0 1-.708.708L9 12.207V13.5a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5z'/></svg><h2>Climate controlled</h2></div></div>"; 
        }
        if($space_item['smoke_free'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M8.5 2a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 12H3.5A3.5 3.5 0 0 1 .035 9H5.5a.5.5 0 0 0 0-1H.035a3.5 3.5 0 0 1 3.871-2.977A5.001 5.001 0 0 1 8.5 2zm-6 8a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zM0 13.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z'/></svg><h2>Smoke free</h2></div></div>"; 
        }
        if($space_item['smoke_detectors'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M4 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm2 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM13.405 4.027a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z'/></svg><h2>Smoke detectors</h2></div></div>"; 
        }
        if($space_item['private_entrance'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/><h2>Private entrance</h2></div></div>"; 
        }
        if($space_item['private_space'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M7 6a1 1 0 0 1 2 0v1H7V6z'/><path d='M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0z'/></svg><h2>Private space</h2></div></div>"; 
        }
        if($space_item['locked_area'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/></svg><h2>Loked area</h2></div></div>"; 
        }
        if($space_item['pet_free'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z'/></svg><h2>Pet free</h2></div></div>"; 
        }
        if($space_item['security_camera'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z'/></svg><h2>Security camera</h2></div></div>"; 
        }
        if($space_item['no_stairs'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-thermometer-snow' viewBox='0 0 16 16'><path d='M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z'/></svg><h2>No strairs</h2></div></div>"; 
        }
        ?>


<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Description</h1>
        <p class="col-md-8 fs-4"><?php echo $space_item['opis']; ?></p>
      </div>
    </div>


<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Rate this <?php echo $space_item['opis_k']; ?></h2>





<?php 
                /*$arr = $_SESSION['logged_in']; 
                if($space_item['id_u'] == $arr['id_u']){
                        echo "<p><a href=".site_url('news/edit/'.$space_item['id']).">Edit article</a></p>";
                        echo "<p><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete/'.$space_item['id']).">Delete article</a></p>";
                }*/
                ?>


                <?php echo validation_errors(); ?>


                <?php echo form_open('news/vote'); ?>
                <input type="hidden" name="id_space" value=<?php echo $space_item['id_o']; ?>>
                <div id = "div_vote_space">
                        <div id="vote_space" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "1"){ echo "checked"; } ?> id = "location_select_radio_i" type="radio" name="vote_space" value="1"/> 1
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "2"){ echo "checked"; } ?> id = "location_select_radio_c" type="radio"  name="vote_space" value="2"/> 2
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "3"){ echo "checked"; } ?> id = "location_select_radio_u" type="radio"  name="vote_space" value="3"/> 3
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "4"){ echo "checked"; } ?> id = "location_select_radio_i" type="radio" name="vote_space" value="4"/> 4
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "5"){ echo "checked"; } ?> id = "location_select_radio_c" type="radio"  name="vote_space" value="5"/> 5
                                </label>
                        </div><input class="btn btn-primary" type="submit" name="submit" value="Vote" />
                </div><br>
        </form>
        <?php
        if(isset($_SESSION['logged_in'])){
               $arr = $_SESSION['logged_in']; 
               if($vote_ad['id_u'] == $arr['id_u']){
                        echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_vote/'.$vote_ad['id']).">Delete vote</a></p>";
                }
        } 

        ?>

        
<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Comments</h2>

<?php echo form_open('news/comment'); ?>

<label for="comment">Post a comment</label>
<input class="form-control" type="textarea" name="comment" rows="4" /><br />
<input type="hidden" name="id_space" value=<?php echo $space_item['id_o']; ?>>
<input class = 'comment_button d-inline btn btn-primary text-decoration-none' type="submit" name="submit" value="Publish comment" />
</form>

<div class="row">
<?php foreach ($comment as $comment_item): ?>

        <div class="col-lg-4">
                <?php echo form_open("news/edit_comment"); ?>
                        <input type="hidden" name="id_ad_c" value="<?php echo $comment_item['id_o']; ?>">
                        <div id = "<?php echo "comment_div".$comment_item['id_ads']; ?>">
                        <h3 id="<?php echo "comment_title".$comment_item['id_ads']; ?>"><?php echo $comment_item['vsebina']; ?></h3>
                        </div>
                        <p id="<?php echo "comment_text".$comment_item['id_ads']; ?>"><?php echo $comment_item['username'].", ".$comment_item['datumura']; ?></p>
                </form>
                
        

        <?php 
        if(isset($_SESSION['logged_in'])){
               $arr = $_SESSION['logged_in']; 
               if($comment_item['id_u'] == $arr['id_u']){
                echo "<button onclick='comment_edit(".$comment_item['id_ads'].")' class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'>Edit comment</button>";
                echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_comment/'.$comment_item['id_ads']).">Delete comment</a></p>";
        } 
}
?>
</div>

<?php endforeach; ?>
</div>
</div>




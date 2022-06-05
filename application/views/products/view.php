<!--<h2><?php /*echo $title;*/ ?></h2>-->

<section>
        <div class="container">
        <?php
        if (isset($warning)) {
                echo "<h2 class='text-justify font-weight-bold text-danger'>";
                echo $warning;
                echo "</h2>";
        } ?>
        <div class="row view-1st-row">
                <div class="col-12">
                        <h1 class="primary-border-bottom "><?php echo $space_item['ime']; ?></h1>
                </div>
        </div>
        <div class="row view-2nd-row yellow-border-bottom">
                <div class="col-md-6"><img src="<?php echo base_url($space_item['pot_slika']);?>" alt="..." /></div>
                
                <div class="col-md-6">    
                        <h2>O IZDELKU</h2>   
                        <div class="price-tag">
                                <span class="text-decoration-line-through"><?php echo $space_item['cena']+0.99."€"; ?></span>
                                <span><?php echo $space_item['cena']."€ oz.".$space_item['cena_tocke']."&#128871;"; ?></span>
                        </div>
                        <p class="lead"><?php echo $space_item['opis']; ?></p>
                        <table class="table">
                                <thead>
                                <tr>
                                <th scope="col">Povprečna hranilna vrednost</th>
                                <th scope="col">na 100g</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>Kcal</td>
                                <td><?php echo $space_item['kcal']; ?></td>
                                </tr>
                                <tr>
                                <td>kj</td>
                                <td><?php echo $space_item['kcal']; ?></td>
                                </tr>
                                <tr>
                                <td>Maščobe</td>
                                <td><?php echo $space_item['kcal']; ?></td>
                                </tr>
                                <tr>
                                <td>Oglikovi hidrati</td>
                                <td><?php echo $space_item['ogljikovi_hidrati']; ?></td>
                                </tr>
                                <tr>
                                <td>Beljakovine</td>
                                <td><?php echo $space_item['beljakovine']; ?></td>
                                </tr>
                                <tr>
                                <td>Sol</td>
                                <td><?php echo $space_item['sol']; ?></td>
                                </tr>
                                </tbody>
                        </table>
                        <div class="d-flex">
                                <?php echo form_open('walmart/addToCart'); ?>
                                <input type="hidden" name="id_space" value=<?php echo $space_item['id']; ?>>
                                <input class = 'btn btn-primary flex-shrink-0' type="submit" name="cart" value="V košarico" />
                                </form>

                                <?php 
                                if(in_array($space_item['id'], $_SESSION['productsCart'])){?>
                                        <?php echo form_open('walmart/removeFromCart'); ?>
                                        <input type="hidden" name="id_space" value=<?php echo $space_item['id']; ?>>
                                        <input class = 'btn btn-outline-dark flex-shrink-0 btn-custom' type="submit" name="cartRemove" value="Odstrani iz košarice" />
                                        </form>
                                <?php }
                                ?>
                        </div>
                </div>
               </div>             
        <div class="row view-2nd-row">
        <div class="col-md-4 col-xs-12 ocena">
                        <h2 class='ocena-title'>OCENI IZDELEK</h2>
                        <?php 
                                /*$arr = $_SESSION['logged_in']; 
                                if($space_item['id_u'] == $arr['id_u']){
                                        echo "<p><a href=".site_url('news/edit/'.$space_item['id']).">Edit article</a></p>";
                                        echo "<p><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete/'.$space_item['id']).">Delete article</a></p>";
                                }*/
                        ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('walmart/vote'); ?>
                        <input type="hidden" name="id_space" value=<?php echo $space_item['id']; ?>>
                        <div id = "div_vote_space" class ="inline">
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
                                </div>
                                <input class="btn btn-primary" type="submit" name="submit" value="Oceni" />
                        </div>
                </form>
        </div>
        <div class="col-md-6 offset-md-2 col-xs-12 objavi-mnenje">
                        <?php
                                if(isset($_SESSION['logged_in'])){
                                        $arr = $_SESSION['logged_in']; 
                                        if($vote_ad['id_u'] == $arr['id_u']){
                                                echo "<p class = 'comment_button d-inline text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('walmart/delete_vote/'.$vote_ad['id']).">Odstrani mojo oceno</a></p>";
                                        }
                                } 
                                
                        ?>
                        <h2 class='mnenje-title'>Vaše mnenje je pomembno</h2>
                        <?php echo form_open('walmart/comment'); ?>
                        
                        <input placeholder="Dodajte komentar..." class="form-control" type="textarea" name="comment" rows="4" /><br />
                        <input type="hidden" name="id_space" value=<?php echo $space_item['id']; ?>>
                        <input class = 'comment_button d-inline btn btn-primary text-decoration-none' type="submit" name="submit" value="Objavi mnenje" />
                </form>
                </div>
        </div>
<div class="row view-3rd-row">      
                <h2 class='mnenja-title'>MNENJA</h2>
        <?php foreach ($comment as $comment_item): ?>
                
                <div class="col-xs-6 col-md-3">
                        <div class="comment-card">
                        <h6 class="comment-card-user">Komentar uporabnika <?php echo $comment_item['username']; ?></h6>
                        <p class="comment-card-date"><?php echo $comment_item['datumura']; ?></p>
                        <?php echo form_open("walmart/edit_comment"); ?>
                        <input type="hidden" name="id_ad_c" value="<?php echo $comment_item['id_o']; ?>">
                        <div id = "<?php echo "comment_div".$comment_item['id_ads']; ?>">
                                <h4 id="<?php echo "comment_title".$comment_item['id_ads']; ?>"><?php echo $comment_item['vsebina']; ?></h4>
                        </div>
        </div>
                </form>
                
                
                
                <?php 
        if(isset($_SESSION['logged_in'])){
                $arr = $_SESSION['logged_in']; 
                if($comment_item['id_u'] == $arr['id_u']){
                        echo "<button onclick='comment_edit(".$comment_item['id_ads'].")' class = 'comment_button d-inline btn btn-primary text-decoration-none text-light' role='button'>Spremeni vsebino mnenja</button>";
                        echo "<p class = 'comment_button d-inline text-light' style='color: white !important;'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('walmart/delete_comment/'.$comment_item['id_ads'])."><p>Odstani mnenje</p></a></p>";
                } 
        }
        ?>
        </div>
        
        <?php endforeach; ?>
</div>
</section>




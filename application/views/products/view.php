<!--<h2><?php /*echo $title;*/ ?></h2>-->

<div class="container py-3">
        <div class="container marketing">

                <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-danger'>";
                    echo $warning;
                    echo "</h2>";
                } ?>



                <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo base_url($space_item['pot_slika']);?>" alt="..." /></div>
                    <div class="col-md-6">
                        <!--<div class="small mb-1">SKU: BST-498</div>-->
                        <h1 class="display-5 fw-bolder"><?php echo $space_item['ime']; ?></h1>
                        <div class="fs-5 mb-5">
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
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                V košarico
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </section>




<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold display-5 inline'>Oceni izdelek</h2>





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
                        </div><input class="btn btn-primary" type="submit" name="submit" value="Oceni" />
                </div><br>
        </form>
        <?php
        if(isset($_SESSION['logged_in'])){
               $arr = $_SESSION['logged_in']; 
               if($vote_ad['id_u'] == $arr['id_u']){
                        echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('walmart/delete_vote/'.$vote_ad['id']).">Odstrani mojo oceno</a></p>";
                }
        } 

        ?>

        
<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Comments</h2>

<?php echo form_open('walmart/comment'); ?>

<label for="comment">Post a comment</label>
<input class="form-control" type="textarea" name="comment" rows="4" /><br />
<input type="hidden" name="id_space" value=<?php echo $space_item['id']; ?>>
<input class = 'comment_button d-inline btn btn-primary text-decoration-none' type="submit" name="submit" value="Publish comment" />
</form>

<div class="row">
<?php foreach ($comment as $comment_item): ?>

        <div class="col-lg-4">
                <?php echo form_open("walmart/edit_comment"); ?>
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
                echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('walmart/delete_comment/'.$comment_item['id_ads']).">Delete comment</a></p>";
        } 
}
?>
</div>

<?php endforeach; ?>
</div>
</div>




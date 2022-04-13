<!--<h2><?php /*echo $title;*/ ?></h2>-->

<div class="container py-3">
        <div class="container marketing">

                <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-danger'>";
                    echo $warning;
                    echo "</h2>";
                } ?>

                <div class="row featurette">
                      <div class="col-md-3 order-md-2">
                        <h2 class="featurette-heading display-5 fw-bold"><?php echo $space_item['kj']; ?><div class="text-muted">
                                <?php echo form_open('products/reserve/'.$space_item['id']); ?>
                                <input class="w-100 btn btn-primary border border-danger" type="submit" name="submit" value="buy" />
                        </form></div></h2>
                        <p class="lead">

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
              <td><?php echo "<h4 class='text-justify font-weight-bold'>BIO: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['BIO']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>cena: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['cena'].", ".$space_item['kj']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Teza: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['teza_g']."</h4>"; ?></td>
                </tr>

                <tr>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>kcal: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['kcal']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>kj: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['kj'].", ".$space_item['kj']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Mascobe: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['mascobe']."</h4>"; ?></td>
                </tr>


                <tr>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Oglikovi hidrati: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['ogljikovi_hidrati']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Beljakovine: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['beljakovine'].", ".$space_item['kj']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Sol: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['sol']."</h4>"; ?></td>
                </tr>
</tbody>
</table>



<hr class="featurette-divider">
<div class="container py-4">
<h2 class='text-justify display-5 fw-bold'>Features</h2>
<div class="row align-items-md-stretch">


<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Description</h1>
        <p class="col-md-8 fs-4"><?php echo $space_item['opis']; ?></p>
      </div>
    </div>


<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Rate this product</h2>





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
                        echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('walmart/delete_vote/'.$vote_ad['id']).">Delete vote</a></p>";
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




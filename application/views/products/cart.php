<div class="album py-2 bg-light">
  <div class="container">
    <?php
        if (isset($warning)) {
            echo "<h2 class='text-justify font-weight-bold text-danger'>";
            echo $warning;
            echo "</h2>";
        } 
    ?>

    <?php $finalPrice = 0; $finalPriceV = 0;?>
    <?php foreach ($space as $space_item): 
            $finalPrice+=$space_item['cena']; 
            $finalPriceV += $space_item['cena_tocke'];
    ?>
    <?php endforeach; ?>
    <div class="card card-header-actions mb-4">
        <div class="card-header cart-header">
            <h3 class="cart-title">KOŠARICA</h3>
        </div>
        <div class="card-body px-0">
            
        <!-- Payment method 1-->
            
        <?php foreach ($space as $space_item): ?>
            <a class = "space_ad" href="<?php echo site_url('walmart/view/'.$space_item['id_ad_product']); ?>">
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                        <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                    <div class="ms-4">
                        <div class="small"><?php echo $space_item['ime']." - ".($space_item['teza_g']/1000)."kg"; ?></div>
                        <div class="text-xs text-muted">Količina: 1</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <div class="badge bg-light text-dark me-3"><?php echo $space_item['cena']."&euro; oz. ".$space_item['cena_tocke']."&#128871;"; $finalPrice+=$space_item['cena']; $finalPriceV += $space_item['cena_tocke'];?></div>
                    <a href="#!">Odstrani izdelek</a>
                </div>
            </div>
            </a>
            <hr>
        <?php endforeach; ?>
        </div>
        <div class="card-header card-bottom">
            <span class="price-tag"><?php echo " ".$finalPrice."&euro; oz. ".$finalPriceV."&#128871;";?></span>
            <?php echo form_open('walmart/cartOrder'); ?>
                <input type="hidden" name="cost" value=<?php echo $finalPrice; ?>>
                    <input class = 'btn btn-primary' type="submit" name="order" value="Naroči izdelke" />
            </form>
        </div>
    </div>
</div>
</div>
</div>

</div>





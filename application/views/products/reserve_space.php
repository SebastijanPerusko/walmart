<!--<h2><?php echo $title; ?></h2>-->


<div class="container py-3">
<?php echo validation_errors(); ?>

<?php echo form_open('news/create_reservation'); ?>

    <h4 class="mb-3 display-6 fw-bold">Reservation</h4>


    <label for="reserve_date">When would you like to move in?</label>
    <input class="form-control border border-primary" min = "<?php echo date("Y-m-d"); ?>" type="date" id="reserve_date" name="reserve_date">

    <div id = "div_how_long">
    <label for="type_no_select">How long do you want the space?</label><br>
    <div id="how_long" class="btn-group" data-toggle="buttons">

            <input class="btn-check" id = "how_long_month" type="radio" name="how_long" value="month"> 
            <label class="btn btn-outline-primary" for="how_long_month">One month or less</label>

            <input class="btn-check" id = "how_long_few_months" type="radio"  name="how_long" value="few_month"/> 
            <label class="btn btn-outline-primary" for="how_long_few_months">Few months</label>

            <input class="btn-check" id = "how_long_year" type="radio"  name="how_long" value="year"/> 
            <label class="btn btn-outline-primary" for="how_long_year">One year or less</label>

            <input class="btn-check" id = "how_long_few_year" type="radio"  name="how_long" value="few_year"/>
            <label class="btn btn-outline-primary" for="how_long_few_year">Few years</label>

            <input class="btn-check" id = "how_long_indefinetly" type="radio"  name="how_long" value="indefinetly"/> 
            <label class="btn btn-outline-primary" for="how_long_indefinetly">Indefinetly</label>
    </div></div><br>


    <label for="description_reservation">What are you going to store?</label>
    <textarea class="form-control border border-primary" id="description_reservation" name="description_reservation" rows="3" placeholder="A bike and few boxes of old things like lamps, old telephones.  "></textarea>


    <label for="description_need">Tell about your storage needs</label>
    <textarea class="form-control border border-primary" id="description_need" name="description_need" rows="3" placeholder="For a few months I will be abroad and I want to keep my items in a safe place. "></textarea><br>


    <input type="hidden" name="id_space" value=<?php if(isset($num_r))echo $num_r; ?>>

    <input class="btn btn-outline-primary w-100" type="submit" name="submit" value="Confirm reservation" />

</form>
</div>
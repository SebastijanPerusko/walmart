


<div class = "container_log_in text-center bg-light"> 
<main class="signin_from_main border bg-primary rounded-3">
  <?php echo form_open('user_authentication/signin'); ?>
    <p class = "text-success"><?php if (isset($message_display)) { echo $message_display; } ?></p>
    <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
    <p class = "text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></p>
    <h1 class="mb-3 h3 fw-normal text-light">Sign in</h1><hr/>
    <h3 class="mb-5 h5 fw-normal text-light">To explore the immense world of Walmart</h3>
    <div class="form-floating mb-1">
      <input class = "form-control" type="text" name="username" id="name" placeholder="Example">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input class = "form-control" type="password" name="password" id="password" placeholder="**********">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <!--<label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>-->
    </div>
    <hr/>
    <input class="w-100 btn btn-lg btn-light" type="submit" value="Login " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-light" href="<?php echo base_url() ?>index.php/user_authentication/show">Create new account</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>




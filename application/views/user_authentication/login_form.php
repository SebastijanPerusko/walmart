


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/signin'); ?>
    <p class = "text-success"><?php if (isset($message_display)) { echo $message_display; } ?></p>
    <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
    <p class = "text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></p>
    <h1 class="mb-3 h3 fw-normal">Sign in</h1>

    <div class="form-floating">
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
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Login " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-primary" href="<?php echo base_url() ?>index.php/user_authentication/show">Create new account</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>



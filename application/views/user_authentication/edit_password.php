<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/edit_password_u'); ?>
    <p class = "<?php if (isset($message_color)) { echo $message_color; } ?>"><?php if (isset($message_display)) { echo $message_display; } ?></p>
    <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
    <h1 class="mb-3 h3 fw-normal">Change password</h1>

    <div class="form-floating">
      <input class = "form-control" type="password" name="password_old" id="password_old" placeholder="**********">
      <label for="floatingInput">Old password</label>
    </div>

    <p id = "error_m"></p>

    <div class="form-floating">
      <input class = "form-control" type="password" name="password_new1" id="password_reg" placeholder="**********">
      <label for="floatingPassword">New password</label>
    </div>

    <div class="form-floating">
      <input class = "form-control" type="password" onchange="password_check()" name="password_new2" id="password_reg2" placeholder="**********">
      <label for="floatingPassword">Repeat new password</label>
    </div>

    <div class="checkbox mb-3">
      <!--<label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>-->
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Change password" name="submit"/><br /><br />
        <?php echo form_close(); ?>
  </form>
</main>
</div>
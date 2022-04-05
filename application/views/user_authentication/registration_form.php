


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  
  <?php echo form_open('user_authentication/signup'); ?>
    <p class = "text-success"><?php if (isset($message_display)) { echo $message_display; } ?></p>
    <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
    <p class = "text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></p>
    <h1 class="mb-3 h3 fw-normal">Create account</h1>
    <h1 class="mb-3 h3 fw-normal text-danger"><?php echo validation_errors(); ?></h1>

    <div class="form-floating">
      <input class = "form-control" placeholder="First" type="text" name="name" id="name" >
      <label for="name">Name</label>
    </div>
    <div class="form-floating">
      <input class = "form-control" placeholder="Second" type="text" name="secondname" id="name" >
      <label for="secondname">Secondname</label>
    </div>
    <div class="form-floating">
      <input class = "form-control" placeholder="email.email@example.com" type="email" name="email" id="email" >
      <label for="email">Email</label>
    </div>
    <div class="form-floating">
      <input class = "form-control" placeholder="070000000" type="text" name="tel" id="tel" >
      <label for="tel">Telephone number</label>
    </div>
    <div class="form-floating">
      <input class = "form-control" placeholder="Example" type="text" name="username" id="username" >
      <label for="username">Select an username</label>
    </div>

    <p id = "error_m"></p>

    <div class="form-floating">
      <input class = "form-control" placeholder="***********" type="password" name="password" id="password_reg" >
      <label for="password">Select a password</label>
    </div>
    <div class="form-floating">
      <input class = "form-control" placeholder="***********" type="password" onchange="password_check()" name="password_2" id="password_reg2" >
      <label for="password">Repeat the password</label>
    </div><br>

    <input disabled id ="submit_reg" class="w-100 btn btn-lg btn-primary" type="submit" value="Create account " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-primary" href="<?php echo base_url() ?>index.php/user_authentication/signin">Click here to login</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>

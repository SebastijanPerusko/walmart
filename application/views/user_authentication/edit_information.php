


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/edit_inf'); ?>
    <p class = "text-success"><?php if (isset($message_display)) { echo $message_display; } ?></p>
    <p class = "text-success"><?php if (isset($logout_message)) { echo $logout_message; } ?></p>
    <p class = "text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></p>
    <h1 class="mb-3 h3 fw-normal display-6 fw-bold">Edit information</h1>
    <h1 class="mb-3 h3 fw-normal text-danger"><?php echo validation_errors(); ?></h1>

    <div class="form-floating">
      <input class = "form-control" placeholder="First" type="text" name="name" id="name" value = "<?php echo $user_item['ime'] ?>" >
      <label for="floatingInput">Name</label>
    </div><br>
    <div class="form-floating">
      <input class = "form-control" placeholder="Second" type="text" name="secondname" id="name" value = "<?php echo $user_item['priimek'] ?>" >
      <label for="floatingInput">Secondname</label>
    </div><br>
    <div class="form-floating">
      <input class = "form-control" placeholder="email.email@example.com" type="email" name="email" id="email" value = "<?php echo $user_item['email'] ?>" >
      <label for="floatingInput">Email</label>
    </div><br>
    <div class="form-floating">
      <input class = "form-control" placeholder="Example" type="text" name="tel" id="tel" value = "<?php echo $user_item['tel'] ?>" >
      <label for="floatingInput">Telephone number</label>
    </div><br>
    <div class="form-floating">
      <input class = "form-control" placeholder="Example" type="text" name="username" id="username" value = "<?php echo $user_item['username'] ?>">
      <label for="floatingInput">Select an username</label>
    </div><br>

    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Edit information" name="submit"/><br /><br />
  </form>
</main>
</div>

<div class="dropdown__menu auth__dropdown--login">
  <!-- BEGIN AUTH LOGIN-->
  <h5 class="auth__title"><?php pll_e('Login in your account'); ?></h5>
  <div class="user-message"></div>
  <form action="#" class="form form--flex form--auth js-login-form js-parsley login-form">
    <div class="row">
      <div class="form-group">
        <label for="login-username-dropdown" class="control-label"<?php pll_e('Username'); ?></label>
        <input type="text" name="username" id="login-username-dropdown" required data-parsley-trigger="keyup"  class="form-control">
      </div>
      <div class="form-group">
        <label for="login-password-dropdown" class="control-label"><?php pll_e('Password'); ?></label>
        <input type="password" name="password" id="login-password-dropdown" required class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form__options form__options--forgot">
        <button type="button" class="js-user-restore"><?php pll_e('Forgot password ?'); ?></button>
      </div>
      <button type="submit" class="login-btn"><?php pll_e('Sign in'); ?></button>
    </div>
    <div class="form__remember">
      <input type="checkbox" id="remember-in-dropdown" name="login_remember" class="in-checkbox">
      <label for="remember-in-dropdown" class="in-label"><?php pll_e('Remember me'); ?></label>
    </div>
    <div class="row">
      <div class="form__options"><?php pll_e('Not a user yet?'); ?>
        <button type="button" class="js-user-register"><?php pll_e('Get an account'); ?></button>
      </div>
    </div>
  </form>
  <!-- end of block .auth__form-->
  <!-- END AUTH LOGIN-->
</div>

<div class="dropdown__menu auth__dropdown--register">
  <!-- BEGIN AUTH REGISTER-->
  <h5 class="auth__title"><?php pll_e('Sign up a new account'); ?></h5>
  <div class="user-message"></div>
  <form action="#" class="form form--flex form--auth js-register-form js-parsley register-form">
    <div class="row">
      <div class="form-group form-group--col-6">
        <label for="register-name-dropdown" class="control-label"><?php pll_e('Username'); ?></label>
        <input type="text" name="username" id="register-name-dropdown" required class="form-control">
      </div>
      <div class="form-group form-group--col-6">
        <label for="register-lastname-dropdown" class="control-label"><?php pll_e('Phone'); ?></label>
        <input type="text" name="phone" id="register-lastname-dropdown" required class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form-group form-group--col-6">
        <label for="register-email-dropdown" class="control-label"><?php pll_e('E-mail'); ?></label>
        <input type="email" name="email" id="register-email-dropdown" required class="form-control">
      </div>
      <div class="form-group form-group--col-6">
        <label for="register-password-dropdown" class="control-label"><?php pll_e('Password'); ?></label>
        <input type="password" name="password" id="register-password-dropdown" required class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form__options"><?php pll_e('Back to'); ?>
        <button type="button" class="js-user-login"><?php pll_e('Log in'); ?></button>
      </div>
      <button type="submit" class="register-btn"><?php pll_e('Sign up'); ?></button>
    </div>
  </form>

  <!-- end of block .auth__form-->
  <!-- END AUTH REGISTER-->
</div>

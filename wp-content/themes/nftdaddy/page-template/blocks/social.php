<?php
global $devFunction;
$social = array(
  'facebook' => $devFunction->get_option('opt_social_facebook'),
  'twitter' => $devFunction->get_option('opt_social_twitter'),
  'google' => $devFunction->get_option('opt_social_google'),
  'wechat' => $devFunction->get_option('opt_social_wechat'),
  'line' => $devFunction->get_option('opt_social_line'),
  'weibo' => $devFunction->get_option('opt_social_weibo'),
);
if(!$devFunction->is_array_empty($social)):
  ?>
  <?php if(!empty($social['facebook'])): ?>
    <a href="<?php echo $social['facebook'] ?>" target="_blank" title="Facebook" class="social__item">
      <i class="fa fa-facebook"></i></a>
    <?php endif; ?>
    <?php if(!empty($social['twitter'])): ?>
      <a href="<?php echo $social['twitter']; ?>" target="_blank" title="Twitter" class="social__item">
        <i class="fa fa-twitter"></i></a>
      <?php endif; ?>
      <?php if(!empty($social['google'])): ?>
        <a href="<?php echo $social['google']; ?>" title="Google" target="_blank"
          class="social__item"><i class="fa fa-google-plus"></i></a>
        <?php endif; ?>
        <?php if(!empty($social['line'])): ?>
          <a href="<?php echo $social['line']; ?>" title="<?php echo Line ?>" target="_blank" class="social__item">
            <svg class="ico_d" width="25" height="25" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M24 9.36561C24 4.19474 18.6178 0 12 0C5.38215 0 0 4.19474 0 9.36561C0 13.9825 4.25629 17.8606 10.0229 18.5993C10.4073 18.6785 10.9565 18.8368 11.0664 19.1797C11.1762 19.4699 11.1487 19.9184 11.0938 20.235C11.0938 20.235 10.9565 21.0528 10.9291 21.2111C10.8741 21.5013 10.6819 22.3456 11.9725 21.8443C13.2632 21.3167 18.8924 17.9398 21.3913 15.1433C23.1487 13.2702 24 11.4234 24 9.36561Z" transform="translate(7 10)" fill="white"></path>
              <path d="M1.0984 0H0.24714C0.10984 0 -2.09503e-07 0.105528 -2.09503e-07 0.211056V5.22364C-2.09503e-07 5.35555 0.10984 5.43469 0.24714 5.43469H1.0984C1.2357 5.43469 1.34554 5.32917 1.34554 5.22364V0.211056C1.34554 0.105528 1.2357 0 1.0984 0Z" transform="translate(15.4577 16.8593)" fill="#000" class="color-element"></path>
              <path d="M4.66819 0H3.81693C3.67963 0 3.56979 0.105528 3.56979 0.211056V3.19222L1.18078 0.0791458C1.18078 0.0791458 1.18078 0.0527642 1.15332 0.0527642C1.15332 0.0527642 1.15332 0.0527641 1.12586 0.0263821C1.12586 0.0263821 1.12586 0.0263821 1.0984 0.0263821H0.247139C0.10984 0.0263821 4.19006e-07 0.13191 4.19006e-07 0.237438V5.25002C4.19006e-07 5.38193 0.10984 5.46108 0.247139 5.46108H1.0984C1.2357 5.46108 1.34554 5.35555 1.34554 5.25002V2.26885L3.73455 5.38193C3.76201 5.40831 3.76201 5.43469 3.78947 5.43469C3.78947 5.43469 3.78947 5.43469 3.81693 5.43469C3.81693 5.43469 3.81693 5.43469 3.84439 5.43469C3.87185 5.43469 3.87185 5.43469 3.89931 5.43469H4.75057C4.88787 5.43469 4.99771 5.32917 4.99771 5.22364V0.211056C4.91533 0.105528 4.80549 0 4.66819 0Z" transform="translate(17.6819 16.8593)" fill="#000" class="color-element"></path>
              <path d="M3.62471 4.22112H1.34554V0.237438C1.34554 0.105528 1.2357 0 1.0984 0H0.24714C0.10984 0 -5.23757e-08 0.105528 -5.23757e-08 0.237438V5.25002C-5.23757e-08 5.30278 0.0274599 5.35555 0.0549198 5.40831C0.10984 5.43469 0.16476 5.46108 0.21968 5.46108H3.56979C3.70709 5.46108 3.78947 5.35555 3.78947 5.22364V4.4058C3.87185 4.32665 3.76201 4.22112 3.62471 4.22112Z" transform="translate(10.8993 16.8593)" fill="#000" class="color-element"></path>
              <path d="M3.56979 1.29272C3.70709 1.29272 3.78947 1.18719 3.78947 1.05528V0.237438C3.78947 0.105528 3.67963 -1.00639e-07 3.56979 -1.00639e-07H0.219679C0.164759 -1.00639e-07 0.10984 0.0263821 0.0549199 0.0527641C0.02746 0.105528 -2.09503e-07 0.158292 -2.09503e-07 0.211056V5.22364C-2.09503e-07 5.2764 0.02746 5.32917 0.0549199 5.38193C0.10984 5.40831 0.164759 5.43469 0.219679 5.43469H3.56979C3.70709 5.43469 3.78947 5.32917 3.78947 5.19726V4.37941C3.78947 4.2475 3.67963 4.14198 3.56979 4.14198H1.29062V3.29775H3.56979C3.70709 3.29775 3.78947 3.19222 3.78947 3.06031V2.24247C3.78947 2.11056 3.67963 2.00503 3.56979 2.00503H1.29062V1.16081H3.56979V1.29272Z" transform="translate(23.421 16.8329)" fill="#000" class="color-element"></path>
            </svg>
          </a>
        <?php endif; ?>
        <?php if(!empty($social['weibo'])): ?>
          <a href="<?php echo $social['weibo']; ?>" title="Weibo" target="_blank" class="social__item">
            <i class="fa fa-weibo"></i>
          </a>
        <?php endif; ?>
        <?php if(!empty($social['wechat'])): ?>
          <a href="<?php echo $social['wechat']; ?>" title="Wechat" target="_blank" class="social__item">
            <i class="fa fa-wechat"></i>
          </a>
        <?php endif; ?>
      <?php endif; ?>

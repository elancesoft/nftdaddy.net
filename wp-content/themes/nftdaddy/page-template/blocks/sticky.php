<?php

global $devFunction;

$video_title = $devFunction->get_option('opt_sticky_video_title');

$video_link = $devFunction->get_option('opt_sticky_video');

$project_title = $devFunction->get_option('opt_sticky_project_title');

$project = $devFunction->get_option('opt_sticky_project');

$email_title = $devFunction->get_option('opt_sticky_email_title');

$email = $devFunction->get_option('opt_sticky_email');

//$project_popuplar = $devFunction->get_last_posts($project, 'project', '', '', true);
$project_popuplar = $devFunction->get_project_list(6);
?>

<div class="sticky-menu-toggle"></div>

<div class="sticky-menu">

  <ul>

    <?php if(!empty($video_link)): ?>

      <li class="sticky-menu__video sticky-menu__has-content">

        <a href="<?php echo $video_link; ?>" class="sticky-menu-hot-video" title="<?php echo $video_title; ?>">

          <i class="worker__favorites worker__favorites--highlight"></i>

          <!-- <span><?php echo $video_title; ?></span> -->

        </a>

        <div class="hover-content">

          <?php echo $video_title; ?>

        </div>

      </li>

    <?php endif; ?>

    <li class="sticky-menu__list sticky-menu__has-content">

      <a href="#" class="sticky-meny-project-list" title="<?php echo $project_title; ?>">

        <svg>

          <use xlink:href="#icon-favorite-listings"></use>

        </svg>

        <!-- <span><?php echo $project_title; ?></span> -->

      </a>

      <div class="hover-content">

        <?php echo $project_title; ?>

      </div>

    </li>

    <?php if(!empty($email)): ?>

      <li class="sticky-menu__mail sticky-menu__has-content">

        <a title="<?php echo $email_title; ?>" href="mailto:<?php echo $devFunction->hexentities_email($email); ?>" class="sticky-meny-email">

          <i class="fa fa-envelope"></i>

          <!-- <span><?php echo $email_title; ?></span> -->

        </a>

        <div class="hover-content">

          <?php echo $email_title; ?>

        </div>

      </li>

    <?php endif; ?>

  </ul>

</div>



<div class="sticky-slider">

  <button class="sticky-slider-close">x</button>

  <span class="sticky-slider__title"><?php pll_e('Projects list'); ?></span>

  <div class="project-list">

    <?php foreach($project_popuplar as $project): ?>

      <?php set_query_var('project', $project);  ?>    

      <?php get_template_part('blocks/project/other', 'item'); ?>

    <?php endforeach; ?>

  </div>

</div>





<!-- End of sticky menu -->


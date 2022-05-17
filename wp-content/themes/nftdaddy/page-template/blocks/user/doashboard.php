<?php
global $devFunction, $devUser;

$user = get_currentuserinfo();

$project_list = $devUser->get_user_project($user->ID);

 ?>
<div class="widget js-widget widget--dashboard">
  <div class="widget__header">
    <h2 class="widget__title"><?php pll_e('List Projects'); ?></h2>
  </div>
  <div class="widget__content">
    <!-- BEGIN SECTION ARTICLE-->
    <div class="listing listing--feed">
      <?php foreach($project_list as $item):
        if(is_numeric($item->phase_order)):
        $project_id = $item->project_id;
        $project = get_post($project_id);
        ?>
        <?php
        $project_taxonomy = get_the_terms($project->ID, 'location');
        $project_location = $devFunction->get_location_project($project_taxonomy);
         ?>
        <div class="listing__item">
          <article class="article article--feed">
            <a href="<?php echo get_permalink($post->ID) ?>?project_id=<?php echo $project->ID ?>&phase_order=<?php echo $item->phase_order; ?>" class="article__photo">
              <?php if(has_post_thumbnail($project->ID)): ?>
              <img src="<?php echo get_the_post_thumbnail_url($project->ID, 'project_list'); ?>"
              alt="<?php echo $project->post_title; ?>">
            <?php endif; ?>
            </a>
            <div class="article__details">
              <a href="<?php echo get_permalink($post->ID) ?>?project_id=<?php echo $project->ID ?>&phase_order=<?php echo $item->phase_order; ?>" class="article__item-title">
                <?php echo $project->post_title ?></a><br>
                <div class="article__intro">
                  <p>
                    <?php echo $item->apartment;?>,
                    <?php echo $item->apartment_number; ?>,
                    <?php echo $item->floor; ?>,
                    <?php echo $project_location; ?>
                  </p>
                </div>
                <a href="<?php echo get_permalink($post->ID) ?>?project_id=<?php echo $project->ID ?>&phase_order=<?php echo $item->phase_order; ?>" class="article__more"><?php pll_e('View detail'); ?></a>
              </div>
            </article>
            <!-- end of block .article-->
          </div>
        <?php endif; ?>
        <?php endforeach;  ?>
      </div>
      <!-- END SECTION ARTICLE-->
    </div>
  </div>

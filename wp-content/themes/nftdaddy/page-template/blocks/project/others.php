<?php
global $devFunction;
$tax = get_queried_object();

if(is_tax('projects')) {
  $project_others = $devFunction->get_last_posts(-1, 'project', '', $tax->term_id, 'projects');
} else {
  $project_taxonomy = get_the_terms($post->ID, 'projects');
  $project_others = $devFunction->get_last_posts(3, 'project', $post->ID, $project_taxonomy[0]->term_id, 'projects');
}


if(!empty($project_others)):
  ?>
  <div class="widget js-widget widget--landing has-martop">
    <div class="widget__header">
      <h3 class="widget__title"><span class="widget__show"></span> <?php pll_e('Projects'); ?></h3>
    </div>
      <!-- BEGIN PROPERTIES-->
      <div>
        <div class="listing listing--grid listing--lg-3 project-detail-related">
          <?php foreach($project_others as $project):
            set_query_var( 'project', $project );
            get_template_part('blocks/project/related', 'item');
            ?>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- END PROPERTIES-->
    </div>
  <?php endif; ?>

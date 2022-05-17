<?php
global $devFunction;
$project_taxonomy = get_the_terms($post->ID, 'projects');
$term_id = $project_taxonomy['0']->term_id;

$project_related = $devFunction->get_related_project($post->ID, $term_id);
if(!empty($project_related)):
  ?>
  <div class="widget js-widget widget--landing">
    <div class="widget__header">
      <h3 class="widget__title"><?php pll_e('Related projects'); ?></h3>
      <br>
      <!-- BEGIN PROPERTIES-->
      <div>
        <div class="listing listing--grid listing--lg-3 project-detail-related" data-id="<?php echo $post->ID; ?>" data-page = "2" data-term_id="<?php echo $term_id ?>" data-term="projects">
          <?php foreach($project_related as $project):
            set_query_var( 'project', $project );
            get_template_part('blocks/project/related', 'item');
            ?>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- END PROPERTIES-->
    </div>
  <?php endif; ?>

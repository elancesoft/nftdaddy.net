<?php global $devFunction;

if(is_singular('project')) {
  $project_taxonomy = get_the_terms($post->ID, 'projects');
  $taxonomy_id = $project_taxonomy[0]->term_id;
  $map = 'projects_'.$taxonomy_id;
} else {
  $map = $post->ID;
}

$project_map = $devFunction->get_field('project_map', $map);
$project_map_link = $devFunction->get_field('project_google_link', $map);
if(!empty($project_map)):
 ?>
<div class="widget js-widget widget--details">
  <div class="widget__content">
    <div class="map-imge">
      <a href="<?php echo $project_map_link ?>" target="_blank">
        <img src="<?php echo $project_map['sizes']['post_detail']; ?>">
      </a>
    </div>
  </div>
</div>
<?php endif; ?>

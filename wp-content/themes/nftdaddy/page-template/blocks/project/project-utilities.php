<?php global $devFunction;

if(is_singular('project')) {
  $project_taxonomy = get_the_terms($post->ID, 'projects');
  $taxonomy_id = $project_taxonomy[0]->term_id;
  $utility = 'projects_'.$taxonomy_id;
  $product_utilities = get_the_terms($post->ID, 'utilities');;
}
$project_title = $devFunction->get_field('project_utilities_title',  $utility );
$project_utilities = $devFunction->get_field('project_utilities', $utility );
if(!empty($project_utilities)):
  ?>
  <div id="project_utilities" class="project-block property__params">
    <?php if(!empty($project_title)): ?>
      <h4 class="property__subtitle"><?php echo $project_title; ?></h4>
    <?php endif; ?>
    <?php if(!empty($project_utilities)): ?>
      <ul class="property__params-list project-utilities-item">
        <?php
          $termArr = array();
          foreach($project_utilities as $item): ?>
          <?php if(!empty($item)): ?>
            <?php array_push($termArr, $item->term_id); ?>
            <li>
              <?php $image = $devFunction->get_field('utilitie_image', 'utilities_'.$item->term_id); ?>
              <?php if(!empty($image)): ?>
                <img src="<?php echo $image['sizes']['project_utilities'] ?>" alt="">
              <?php endif; ?>
              <?php echo $item->name; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php if(!empty($product_utilities)): ?>
          <?php foreach($product_utilities as $item): ?>
            <?php if(!empty($item) && !in_array($item->term_id, $termArr)): ?>
              <li>
                <?php $image = $devFunction->get_field('utilitie_image', 'utilities_'.$item->term_id); ?>
                <?php if(!empty($image)): ?>
                  <img src="<?php echo $image['sizes']['project_utilities'] ?>" alt="">
                <?php endif; ?>
                <?php echo $item->name; ?>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    <?php endif; ?>
  </div>
<?php endif; ?>

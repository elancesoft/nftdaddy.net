<?php global $devFunction;
$project_title = $devFunction->get_field('project_image_title');
$project_images = $devFunction->get_field('project_list_image');
if(!empty($project_images)):
  ?>
  <div id="project_image" class="project-block property__params">
    <?php if(!empty($project_title)): ?>
      <h4 class="property__subtitle"><?php echo $project_title; ?></h4>
    <?php endif; ?>
    <?php if(!empty($project_images)): ?>
      <div class="listing listing--grid listing--lg-6">
        <?php foreach($project_images as $image): ?>
          <div class="listing__item">
            <div class="properties properties--grid">
              <div class="properties__thumb">
                <a href="<?php echo $image['link']; ?>" class="item-photo" title="<?php echo $image['text'] ?? ''; ?>">
                  <?php if(!empty($image['text'])): ?>
                    <p class="name">
                      <?php echo $image['text'] ?? ''; ?>
                      <?php if(!empty($image['subtext'])): ?>
                        <em><?php echo $image['subtext']; ?></em>
                      <?php endif; ?>
                    </p>
                  <?php endif; ?>
                  <?php if(!empty($image['image']['sizes']['home_project'])): ?>
                    <img src="<?php echo $image['image']['sizes']['home_project']; ?>" alt="<?php echo $image['text'] ?? ''; ?>">
                  <?php endif; ?>
                  <!-- <figure class="item-photo__hover item-photo__hover--params">
                  <span class="properties__params">Built-Up - 85 Sq Ft</span>
                  <span class="properties__params">Land Size - 164 Sq Ft</span>
                  <span class="properties__intro">Footman's head: it just grazed his nose, you know?' 'It's the oldest rule in the sea. But they HA...</span>
                  <span class="properties__time">Added date: 19 days ago</span>
                  <span class="properties__more">View details</span>
                </figure> -->
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>

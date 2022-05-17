<?php
global $devFunction;
$title = $devFunction->get_field('group_team_text');
$team_arr = $devFunction->get_field('group_team');
if(!$devFunction->is_array_empty($team_arr)):
  ?>
  <section class="section skew-block pattern pattern-about">
    <div class="skew-wrap">
      <div class="container">
        <?php if(!empty($title)): ?>
          <div class="second-caption style-2">
            <h3 class="h5 md title font-fam-2"><?php echo $title; ?></h3>
          </div>
        <?php endif;  ?>
        <div class="row team-row">
          <?php if(!empty($team_arr)): ?>
            <?php foreach($team_arr as $key => $team): ?>
              <div class="col-sm-4 team-box">
                <div class="team-img">
                  <?php if(!empty($team['image']['sizes']['about_team'])): ?>
                    <img class="resp-img" src="<?php echo $team['image']['sizes']['about_team']; ?>"  alt="">
                  <?php endif; ?>
                  <?php if(!empty($team['facebook_link']) || $team['twitter_url'] || $team['google_url'] || $team['pinterest_url']): ?>
                    <div class="team-social">
                      <ul>
                        <?php if(!empty($team['facebook_link'])): ?>
                          <li><a href="<?php echo $team['facebook_link']; ?>" title="Facebook" target="_blank" class="icon-facebook"></a></li>
                        <?php endif;  ?>
                        <?php if(!empty($team['twitter_url'])): ?>
                          <li><a href="<?php echo $team['twitter_url']; ?>" title="Twitter" target="_blank" class="icon-twitter"></a></li>
                        <?php endif;  ?>
                        <?php if(!empty($team['google_url'])): ?>
                          <li><a href="<?php echo $team['google_url']; ?>" title="Google" target="_blank" class="icon-gplus"></a></li>
                        <?php endif;  ?>
                        <?php if(!empty($team['pinterest_url'])): ?>
                          <li><a href="<?php echo $team['pinterest_url']; ?>" title="Pinterest" target="_blank" class="icon-pinterest"></a></li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  <?php endif; ?>
                </div>
                <?php if(!empty($team['position'])): ?>
                  <span class="position"><?php echo $team['position']; ?></span>
                <?php endif; ?>
                <?php if(!empty($team['name'])): ?>
                  <h3 class="team-name"><?php echo $team['name']; ?></h3>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif;  ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

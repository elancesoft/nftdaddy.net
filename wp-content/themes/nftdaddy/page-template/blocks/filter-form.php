<?php
global $devFunction;

$project_location = get_terms(
  array('taxonomy' => 'location', 'parent' => 0, 'hide_empty' => false)
);

$project_direction = get_terms(
  array('taxonomy' => 'direction')
);

$project_type = get_terms(array('taxonomy'=> 'type', 'hide_empty' => false, 'orderby' => 'slug', 'order' => 'DESC'));

$project_property_type = get_terms(
  array('taxonomy' => 'property',  'hide_empty' => false)
);

$project_contructor = get_terms(
  array('taxonomy' => 'contructor',  'hide_empty' => false)
);



if(is_home() || is_front_page()) {
  $class = ' form--banner-sidebar';
  $class_button = '';
  $action = $devFunction->get_option('opt_project_overview');
  $button_submit= '';
} else {
  $class= ' form--sidebar';
  $class_button = ' form__buttons--double';
  $action = get_permalink($post->ID);
  $button_submit = ' btn-project-filter';
}

// check request from permakink
$keyword = $city = $direction = $price_from = $price_to = $district = '';
if(!empty($_GET)) {

  if(!empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
  }
  if(!empty($_GET['city'])) {
    $city = $_GET['city'];
  }
  if(!empty($_GET['direction'])) {
    $direction = $_GET['direction'];
  }
  $style_type = 'none';
  if(!empty($_GET['type'])) {
    $type = $_GET['type'];
    if(!is_numeric(strpos($type, 'project'))) {
      $unit_price = '($)';
    } else {
      $unit_price = '($/m2)';
    }
    $style_type = 'initial';
  }

  $district_data = '';
  if(!empty($_GET['district'])) {
    $district = $_GET['district'];
    if(!empty($city)){
      $city_data = get_term_by('slug', $city, 'location');
      $district_data = get_terms(array('taxonomy' => 'location', 'parent' => $city_data->term_id, 'hide_empty' => false));
    }
  }
  if(!empty($_GET['price_to'])) {
    $price_to = $_GET['price_to'];
  }
  if(!empty($_GET['price_from'])) {
    $price_from = $_GET['price_from'];
  }

  if(!empty($_GET['property'])) {
    $property = $_GET['property'];
  }

}
?>
<form action="<?php echo $action; ?>" name="filter_frm"
  enctype="multipart/form-data" method="get" class="form form--flex form--search js-search-form<?php echo $class; ?>">
  <div class="row">
    <div class="form-group">
      <!-- <label for="in-keyword" class="control-label"><?php pll_e('Project Name'); ?></label> -->
      <input type="text" id="in-keyword" name="keyword" value="<?php echo $keyword; ?>" placeholder="<?php pll_e('Keywords') ?>" class="form-control">
    </div>
    <?php if(is_front_page()): ?>
      <div class="form-group project-type-group">
        <!-- <label for="in-project-type" class="control-label"><?php pll_e('Type'); ?></label> -->
        <select name="type" id="in-project-type" data-placeholder="<?php pll_e('Type'); ?>" class="form-control project-type">
          <option value=""><?php pll_e('Select project type') ?></option>
          <?php if(!empty($project_type)): ?>
            <?php foreach($project_type as $value): ?>
              <option value="<?php echo $value->slug ?>" <?php echo ($type == $value->slug) ? 'selected' : '' ?>><?php echo $value->name; ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
    <?php endif; ?>
    <div class="form-group">
      <!-- <label for="in-project-city" class="control-label"><?php pll_e('City'); ?></label> -->
      <select id="in-project-city" data-placeholder="<?php pll_e('City'); ?>" class="form-control project-city" name="city">
        <?php if(!empty($project_location)): ?>
          <?php foreach($project_location as $location): ?>
            <option value="<?php echo $location->slug ?>" <?php echo ($city == $location->slug) ? 'selected' : '' ?>>
              <?php echo $location->name; ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <div class="form-group">
        <!-- <label for="project-district" class="control-label"><?php pll_e('District'); ?></label> -->
        <select id="project-district" data-district = "<?php echo $district; ?>"
          data-placeholder="<?php pll_e('District'); ?>" class="form-control project-district" name="district">
          <?php if(!empty($district_data)): ?>
            <option value="all"><?php pll_e('District'); ?></option>
            <?php foreach($district_data as $value): ?>
              <option value="<?php echo $value->slug ?>" <?php echo ($value->slug == $district)? 'selected':'';?>>
                <?php echo $value->name; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>

        <div class="form-group">
          <!-- <label for="project-contructor" class="control-label"><?php pll_e('Contructors'); ?></label> -->
          <select id="project-contructor" data-contructor = "<?php echo $contructor; ?>"
            data-placeholder="<?php pll_e('Contructors'); ?>" class="form-control project-contructor" name="contructor">
            <?php if(!empty($project_contructor)): ?>
              <option value="all"><?php pll_e('Contructors'); ?></option>
              <?php foreach($project_contructor as $value): ?>
                <option value="<?php echo $value->slug ?>" <?php echo ($value->slug == $contructor)? 'selected':'';?>>
                  <?php echo $value->name; ?></option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <?php if(!is_front_page()): ?>
            <div class="form-group group-room">
              <!-- <label for="in-project-room" class="control-label"><?php pll_e('Rooms'); ?></label> -->
              <select name="room" id="in-project-room" data-placeholder="<?php pll_e('Rooms'); ?>" class="form-control project-room">
                <option value="all"><?php pll_e('Rooms'); ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          <?php endif; ?>

          <?php if(!is_front_page()): ?>
            <div class="form-group">
              <!-- <label for="in-project-direction" class="control-label"><?php pll_e('Direction'); ?></label> -->
              <select name="direction" id="in-project-direction" data-placeholder="<?php pll_e('Direction'); ?>" class="form-control project-direction">
                <option value="all"><?php pll_e('Direction'); ?></option>
                <?php if(!empty($project_direction)): ?>
                  <?php foreach($project_direction as $value): ?>
                    <option value="<?php echo $value->slug ?>" <?php echo ($direction == $value->slug) ? 'selected' : '' ?>><?php echo $value->name; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
          <?php endif; ?>


          <div class="form-group property-radio">
            <!-- <label for="in-project-property-type" class="control-label"><?php pll_e('Property Type'); ?></label> -->
            <?php if(!empty($project_property_type)): ?>
              <?php $i =1; foreach($project_property_type as $value): ?>
                <div class="group_radio">
                  <input id="radio_<?php echo $i; ?>" class="in-project-property-type" type="radio" name="property" value="<?php echo $value->slug ?>"
                  <?php echo ($property == $value->slug) ? 'checked' : '' ?>>
                  <label for="radio_<?php echo $i; ?>"><?php echo $value->name; ?></label>
                </div>
                <?php $i++; endforeach; ?>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <div class="form__mode">
                <button type="button" data-mode="input" class="form__mode-btn js-input-mode"><?php pll_e('Input') ?></button>
              </div>
              <label for="range_price" class="control-label"><?php pll_e('Price') ?> <span class="frm_unit_price" style="display:<?php echo $style_type; ?>"> <?php echo $unit_price; ?> </span></label>
              <div class="form__ranges">
                <input id="range_price" class="js-search-range form__ranges-in">
              </div>
              <div class="form__inputs js-search-inputs">

                <input type="text" id="in-price-from" name="price_from" value="<?php echo $price_from; ?>" placeholder="From" data-input-type="from" class="form-control js-field-range">

                <input type="text" id="in-price-to" name="price_to" value="<?php echo $price_to; ?>" placeholder="To" data-input-type="to" class="form-control js-field-range">
              </div>
            </div>
            <div class="form__buttons<?php echo $class_button; ?>">
              <?php if(!is_home() &&!is_front_page()): ?>
                <button type="button" class="form__reset js-form-reset"><?php pll_e('Reset'); ?></button>
              <?php endif; ?>
              <button type="submit" class="form__submit<?php echo $button_submit; ?>"><?php pll_e('Search') ?></button>
            </div>
          </div>
        </form>

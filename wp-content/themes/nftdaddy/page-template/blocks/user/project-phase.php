<?php
// get project by id:
global $devUser, $devFunction;
if(empty($_GET['project_id']))  {
  wp_redirect('/');
  exit;
}
$user = get_currentuserinfo();
$project = get_post($_GET['project_id']);
$user_id = $user->ID;
$project_id = $_GET['project_id'];
$phase_order = $_GET['phase_order'];
// user depend on project
$users = $devFunction->get_field('project_users', $project_id);
// get register date of user
foreach($users as $key => $user_item) {

  $user_data = $user_item['username'];
  if($user_data['ID'] == $user_id && $key == $phase_order) {
    $user_date = $user_item['payment_date'];
    $apartment = $user_item['apartment'];
    $apartment_number = $user_item['apartment_number'];
    $floor = $user_item['floor'];
    break;
  }
}
// get phase depend on project

$user_information = $devUser->get_user_information($user_id);
?>
<div class="widget js-widget widget--dashboard">
  <div class="widget__header">
    <h1 class="widget__title"><?php echo $project->post_title; ?></h1>
  </div>
  <div>
    <!-- BEGIN Favorites-->
    <div class="listing--items listing--list">

      <div class="listing__list">
        <dl class="listing__item">

          <dd class="listing__body">

            <ul class="listing__list">
              <li class="listing__param">
                <?php pll_e('Name') ?>: <strong><?php echo $user->display_name; ?></strong>
              </li>

              <li class="listing__param">
                <?php pll_e('E-mail') ?>: <strong><?php echo $user->user_email; ?></strong>
              </li>
              <li class="listing__param">
                <?php pll_e('Address') ?>: <strong><?php echo $user_information['user_address']; ?></strong>
              </li>
              <li class="listing__param">
                <?php pll_e('Phone') ?>: <strong><?php echo $user_information['user_phone']; ?></strong>
              </li>
              <li class="listing__param">
                <?php pll_e('Apartment') ?>: <strong><?php echo $apartment; ?></strong>
              </li>
              <li class="listing__param">
                <?php pll_e('Apartment number') ?>: <strong><?php echo $apartment_number; ?></strong>
              </li>
              <li class="listing__param">
                  <?php pll_e('Floor') ?>: <strong><?php echo $floor; ?></strong>
              </li>


            </ul>
          </dd>
        </dl>
        <!-- end of block .listing__item-->
      </div>
    </div>
    <br>
    <?php $project_phase = $devFunction->get_field('project_payment_phase', $project_id); ?>
    <section class="activity activity--feed">
      <h2><?php pll_e('Phase list') ?></h2>
      <!-- <ul class="activity__list"> -->
      <table width="100%" class="phase_table activity__list" cellpadding="10">
          <tr>
            <th><?php pll_e('Phase') ?></th>
            <th width="35%"><?php pll_e('Date') ?></th>
            <th><?php pll_e('Price') ?></th>
            <th><?php pll_e('Status') ?></th>
            <th width="30%"><?php pll_e('Note') ?></th>
          </tr>
        <?php $i = 1;
            $get_pass_date = '';
            foreach($project_phase as $phase): ?>
          <?php
          $phase_id = $phase['project_number_days'];
          $day_number = $phase['project_number_days'];

          if($date_before == '') {
            $date = date_create($user_date);
            $get_pass_date = date_create($user_date);
          } else {
            $date = date_create($date_before);
            $get_pass_date = date_create($date_before);
          }
          date_add($date, date_interval_create_from_date_string($day_number.' days'));
          $date_before = date_format($date, 'Y-m-d');
          $user_phase = $devUser->get_price_per_phase($user_id, $project_id, $i, $phase_order);
          if(!empty($user_phase)):
          ?>
          <tr>
            <td>第 <?php echo $i; ?> 期</td>
            <td>自 <?php echo date_format($get_pass_date, 'd/m/Y'); ?> 至 <?php echo date_format($date, 'd/m/Y'); ?> 止</td>
            <td><?php echo !empty($user_phase->price)?$devFunction->get_price_format($user_phase->price): 0 ; ?></td>
            <td>
              <?php if($user_phase->phase_status == 1): ?>
                <div class="updated notice notice-success" >
                  <?php echo pll__('Paid'); ?>
                </div>
              <?php else: ?>
                <div class="error notice notice-error">
                  <?php echo pll__('Not Paid'); ?>
                </div>
              <?php endif; ?>
            </td>
            <td><?php echo trim($user_phase->note); ?></td>
          </tr>
<!--
          <li class="activity__date"> 第 <?php echo $i; ?> 期 </li>
          <li class="activity__item">
            <div class="activity__title">自 <?php echo date_format($get_pass_date, 'd/m/Y'); ?></div>
            <div class="activity__title">至 <?php echo date_format($date, 'd/m/Y'); ?> 止</div>
            <div class="activity__time"><?php pll_e('Price'); ?></div>
            <div class="activity__title"><?php echo !empty($user_phase->price)?$devFunction->get_price_format($user_phase->price): 0 ; ?></div>
            <div class="activity__time"><?php pll_e('Status'); ?></div>
            <div class="activity__title">
              <?php if($user_phase->phase_status == 1): ?>
                <div class="updated notice notice-success" >
                  <?php echo pll__('Paid'); ?>
                </div>
              <?php else: ?>
                <div class="error notice notice-error">
                  <?php echo pll__('Not Paid'); ?>
                </div>
              <?php endif; ?>
            </div>
          </li>
          <?php if(!empty($user_phase->note)): ?>
            <li><em style="color: gray">(<?php echo trim($user_phase->note); ?>)</em></li>
          <?php endif; ?> -->
        <?php endif; ?>
        <?php $i++; endforeach; ?>
      <!-- </ul> -->
        </table>
    </section>

    <!-- <table width="100%" class="phase_table">
      <tr>
        <th>Phase</th>
        <th width="30%">Date</th>
        <th>Price</th>
        <th>Status</th>
        <th width="30%">Note</th>
      </tr>

      <tr>
        <td>Phase1</td>
        <td>From 1/1/2019 to 1/2/2019</td>
        <td>900000$</td>
        <td>approve</td>
        <td>jhhj   ghj gjg jhgjg jh gjhg jh gjh </td>
      </tr>



    </table> -->

    <!-- END listing-->
  </div>
</div>

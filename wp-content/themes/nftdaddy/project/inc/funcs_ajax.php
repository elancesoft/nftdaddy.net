<?php
  add_action('wp_ajax_dev_ajax_like_product', 'dev_ajax_like_product');
  add_action('wp_ajax_nopriv_dev_ajax_like_product', 'dev_ajax_like_product');
  function dev_ajax_like_product(){
      $dataID          = $_POST['dataId'];
      $likeData = get_post_meta($dataID, 'like_product', true);
      update_post_meta($dataID, 'like_product', $likeData + 1);
      $result                 = array();
      $result['data']         = $likeData + 1;
      echo json_encode( $result );
      exit();
    } 
  ?>
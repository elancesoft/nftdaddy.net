<?php
class devFunction {
	/*
	* Template get option field ACF
	* @param $key string
	* return string|object|array
	*/
	function get_option( $key ) {
		if ( function_exists( 'get_field' ) ) {
			return get_field( $key, 'option' );
		} else {
			return false;
		}
	}

	/*
	* Template get field ACF
	* @param $field_key string
	* @param $object string|int|object
	* @param $format_value boolean
	* return string|object|array
	*/
	function get_field( $field_key, $object = false, $format_value = true ) {
		if ( function_exists( 'get_field' ) ) {
			if(is_tax()|| is_category()) {
				if(!empty($object)) {
					$result = get_field( $field_key, $object, $format_value );
				} else {
					$taxonomy = get_queried_object();
					$result = get_field( $field_key, $taxonomy, $format_value );
				}
			} else {
				$result = get_field( $field_key, $object, $format_value );
			}
			return $result;
		} else {
			return '';
		}
	}

	function pagination( $args = array() ) {
		$big = 999999999;
		global $wp_query;
		$args = wp_parse_args( $args, array(
			'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'end_size'  => 1,
			'mid_size'  => 2,
			'prev_next' => true,
			'prev_text' => '&#8592;',
			'next_text' => '&#8594;',
			'type' => 'list'
		) );
		echo paginate_links( $args );
	}

	// check empty button
	function check_empty_button( $text, $link ) {
		if ( ! empty( $text ) && ! empty( $link ) ) {
			$display = true;
		} else {
			$display = false;
		}

		return $display;
	}

	function excerpt_by_word( $length = 0, $more = '...' ) {
		global $post;
		if ( ! empty( $length ) ) {
			add_filter( 'excerpt_length', function () use ( $length ) {
				return $length;
			} );
		}
		if ( ! empty( $more ) ) {
			add_filter( 'excerpt_more', function () use ( $more ) {
				return $more;
			} );
		}
		$output = get_the_excerpt();
		$output = apply_filters( 'wptexturize', $output );
		$output = apply_filters( 'convert_chars', $output );
		$output = '<p>' . $output . '</p>';
		echo $output;
	}

	function get_permalink( $post ) {
		$permalink = '';
		if ( ! empty( $post ) && ! empty( $post->post_type ) && ! empty( $post->ID ) && ! empty( $post->post_name ) ) {
			$post->filter = 'sample';
			$permalink    = get_permalink( $post );
		}

		return $permalink;
	}

	function get_page_by_template( $name ) {
		$pages = get_pages( array(
			'meta_key'     => '_wp_page_template',
			'meta_value'   => $name,
			'hierarchical' => 0
		) );
		if ( ! empty( $pages ) ) {
			$page            = reset( $pages );
			$page->permalink = get_permalink( $page );

			return $page;
		} else {
			return false;
		}
	}

	function get_excerpt_post( $post, $limit ) {
		if ( empty( $post ) ) {
			return '';
		}

		if ( ! empty( $post->post_excerpt ) ) {
			$content = $post->post_excerpt;
		} else {
			$content = $post->post_content;
		}

	//	$content = preg_replace('~https?:/{2}(?:w{3}\.)?youtube\.com[^"]+~','',$content);

		return $this->cut_string_by_char( wp_strip_all_tags( $content ), $limit, '' );
	}

	function cut_string_by_char( $string, $max_length, $more_string = ' ...' ) {
		$string = trim(strip_tags( $string ));
		if ( mb_strlen( $string, "UTF-8" ) > $max_length ) {
			$max_length = $max_length - 3;
			$end_ch = mb_substr($string, $max_length, 1, "UTF-8" );
			$string     = mb_substr($string, 0, $max_length, "UTF-8" );
			$pos        = strrpos( $string, " " );
			if(!ctype_space($end_ch)) {
				if ( $pos === false ) {
					return substr( $string, 0, $max_length ) . $more_string;
				}
				return substr( $string, 0, $pos ) . $more_string;
			}
			else {
				return $string . $more_string;
			}

		} else {
			return $string;
		}
	}

	function abs_js_link( $src ) {
		return ( strpos( $src, 'http' ) === false ) ? THEME_URL . '/' . $src : $src;
	}

	function get_require( $template_name, $abs_path = '', $require_once = true ) {
		$located = '';

		if ( ! empty( $abs_path ) && file_exists( $abs_path . '/' . $template_name ) ) {
			$located = $abs_path . '/' . $template_name;
		} elseif ( file_exists( STYLESHEETPATH . '/' . $template_name ) ) {
			$located = STYLESHEETPATH . '/' . $template_name;
		} elseif ( file_exists( TEMPLATEPATH . '/' . $template_name ) ) {
			$located = TEMPLATEPATH . '/' . $template_name;
		}

		if ( '' != $located ) {
			global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

			if ( is_array( $wp_query->query_vars ) ) {
				extract( $wp_query->query_vars, EXTR_SKIP );
			}

			if ( isset( $s ) ) {
				$s = esc_attr( $s );
			}

			if ( $require_once ) {
				require_once( $located );
			} else {
				require( $located );
			}
		}


		return $located;
	}


	/**
	* @param $link_share
	*
	* @return string
	*/
	function generate_facebook_share_link( $link_share ) {
		return 'https://www.facebook.com/sharer/sharer.php?u=' . $link_share;
	}

	/**
	* @param $link_share
	*
	* @return string
	*/
	function generate_twitter_share_link( $link_share ) {
		return 'https://twitter.com/home?status=' . $link_share;
	}

	/**
	* @param $link_share
	* @param null $title
	* @param null $summary
	*
	* @return string
	*/
	function generate_linkedin_share_link( $link_share, $title = null, $summary = null ) {
		return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link_share . '&title=' . $title . '&summary=' . $summary;
	}

	/**
	* @param $image_source
	* @param null $image
	* @param null $description
	*
	* @return string
	*/
	function generate_pinterest_share_link( $image_source, $image = null, $description = null ) {
		return 'https://pinterest.com/pin/create/button/?url=' . $image_source . '&media=' . $image . '&description=' . $description;
	}

	/**
	* @param $recipient
	* @param $subject
	* @param $body
	* @param null $cc
	* @param null $bcc
	*
	* @return string
	*/
	function generate_email_share_link( $recipient, $subject, $body, $cc = null, $bcc = null ) {
		return 'mailto:' . $recipient . '?&cc=' . $cc . '&bcc=' . $bcc . '&subject=' . $subject . '&body=' . $body;
	}

	function genenrate_tumbler_share_link($link) {
		return 'http://tumblr.com/widgets/share/tool?canonicalUrl='.$link;
	}

	function generate_google_share_link($link) {
		return 'https://plus.google.com/share?url='.$link;
	}

	/**
	* Set default image when using cut image size.
	* @return int|null|string
	*/

	function default_cut_image($size)
	{
		$defaultImage = get_theme_file_uri('assets/images/hero-type3.png');
		$link = apply_filters('dev_img_size', $defaultImage);

		// Upload dir
		$upload_dir = wp_upload_dir();

		//Get image content
		$image_data = file_get_contents($link);

		// Get image path to save it to upload folder
		$filename = apply_filters('dev_image_name', 'dev-custom');
		if (wp_mkdir_p($upload_dir['path']))
		$file = $upload_dir['path'] . '/' . $filename . '.jpg';
		else
		$file = $upload_dir['basedir'] . '/' . $filename . '.jpg';

		file_put_contents($file, $image_data);

		// Image link
		$img_link = $upload_dir['url'] . '/' . $filename . '.jpg';

		// Check image exist or not in DB.
		$img_exist = $this->check_image_exist($img_link);

		// Set up attachment meta.
		$attachment = array(
			'post_mime_type' => 'image/jpg',
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit',
			'guid' => $img_link
		);

		// Insert to media library if image not exist.
		if (!$img_exist) {
			$attach_id = wp_insert_attachment($attachment, $file);
			if (!is_wp_error($attach_id)) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				$attachment_data = wp_generate_attachment_metadata($attach_id, $file);
				wp_update_attachment_metadata($attach_id, $attachment_data);
			}
		} else {
			$attach_id = $img_exist;
		}


		return $attach_id;
	}

	/**
	* Check exists of default image.
	*
	* @param $link
	*
	* @return null|string
	*/
	function check_image_exist( $link ) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$link'";

		return $wpdb->get_var( $query );
	}

	function get_test() {
		return 'this is test function ';
	}

	// sort array

	function array_sort($arr,$subkey, $type) {
		foreach($arr as $k=>$v) {
			$b[$k] = $v[$subkey];
		}
		if($type=='asc'){
			asort($b);
		}else{
			arsort($b);
		}
		foreach($b as $key=>$val) {
			$c[] = $arr[$key];
		}
		return $c;
	}

	/*
	Get categories primary in admin
	*/

	function get_main_category( $post_id, $cat = '' ) {
		$category = array();
		if ( ! empty( $post_id ) && ! empty( $cat ) ) {
			$categories = get_the_terms( $post_id, $cat );
			if ( $categories ) {
				if ( class_exists( 'WPSEO_Primary_Term' ) ) {
					// Yoast? use primary category
					$wpseo_primary_term = new WPSEO_Primary_Term( $cat, $post_id );
					$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
					$term               = get_term( $wpseo_primary_term );
					if ( is_wp_error( $term ) ) {
						$category['name']    = $categories[0]->name;
						$category['link']    = get_category_link( $categories[0]->term_id );
						$category['term_id'] = $categories[0]->term_id;
					} else {
						$category['name']    = $term->name;
						$category['link']    = get_category_link( $term->term_id );
						$category['term_id'] = $term->term_id;
					}
				} else {
					// Default, first category in WP's list of categories assigned
					$category['name']    = $categories[0]->name;
					$category['link']    = get_category_link( $categories[0]->term_id );
					$category['term_id'] = $categories[0]->term_id;
				}
			}
		}
		return $category;
	}

	/**
	* Convert to single array
	* @param array
	* @return array
	*/
	function convert_to_array($arr)  {
		$list = array();
		foreach( $arr as $value ) {
			// string, number ....
			if (is_scalar($value)) {
				$list[] = $value;
			} elseif (is_array($value)) {
				//array
				$list = array_merge($list,$this->convert_to_array($value));
			}else{
				//object
				$list = array_merge($list,$this->convert_to_array((array)$value));
			}
		}
		return $list;
	}
	/**
	* Check empty array
	* @param array
	* @return bool
	* True is empty
	*/
	function is_array_empty($array){
		$check = array();
		if(is_array($array)){
			$check = $this->convert_to_array($array);
		}elseif(is_object($array)){
			$check = $this->convert_to_array((array)$array);
		}else{
			if(!empty($array)){
				return false;
			}else{
				return true;
			}
		}
		if(!empty(array_filter($check))){
			return false;
		}else{
			return true;
		}
	}

	/*
	* encode email show on website
	*/
	function hexentities_email($str) {
		$return = '';
		for($i = 0; $i < strlen($str); $i++) {
			$return .= '&#x'.bin2hex(substr($str, $i, 1)).';';
		}
		return $return;
	}

	/*
	Check validate field with content type
	@paeam string, type
	*/

	function check_validate($string, $filter_type) {
		$error_msg = '';
		$valid = true;
		switch ($filter_type) {
			case 'email':
			if (!filter_var($string, FILTER_VALIDATE_EMAIL)) { // test@testmail.nl
				$error_msg 	= "Invalid email input";
				$valid		= false;
			}
			break;
			case 'phone':
			$regex = "/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/";  // 0612345678
			$value = str_replace(' ', '', $string);
			if(!preg_match($regex,$value)){
				$error_msg 	= "Invalid phone input";
				$valid		= false;
			}
			break;

			case 'date':
			$regex = "/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/";  // DD-MM-YYYY 01-01-2000
			if(!preg_match($regex,$string)){
				$error_msg 	= "Invalid date input";
				$valid		= false;
			}
			break;
			case 'name':
			$regex = "~^[\p{L}\p{Z}]+$~u"; //Name no numbers
			if(!preg_match($regex,$string)){
				$error_msg 	= "Invalid name input. Please input name without number";
				$valid		= false;
			}
			break;
			case 'url':
			if (!filter_var($string, FILTER_VALIDATE_URL)) {
				$error_msg 	= "Invalid url input";
				$valid		= false;
			}
			break;
		}
		return $valid;
	}


	public function get_last_posts( $number = 5, $post_type = 'post', $postId = [], $term_id = '', $taxonomy = '', $page = '') {

		$category_post = '';
		$offset = '';
		$args = array(
			'posts_per_page'   => $number,
			'post_type'        => $post_type,
			'post_status'      => 'publish',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => true
		);

		if(!empty($page)) {
			$args['paged'] = $page;
		}

		if(!empty($offset)) {
			$args['offset'] = $offset;
		}
		// get related post with postId
		if(!empty($taxonomy) && !empty($term_id)){
			$args['tax_query'] = array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $term_id,
					'operator' => 'IN',
				),
			);
		}

	if ( ! empty( $postId ) ) {
		$args['exclude'] = $postId;
	}

	$data = get_posts( $args );
	return $data;
}

} //  end class

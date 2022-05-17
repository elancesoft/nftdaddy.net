<?php

class Project extends devFunction
{

	public static $instance;

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function __construct()
	{
		$this->add_filter('wpseo_metabox_prio', 'dev_yoast_to_bottom');
		//	$this->add_action('wp_head', 'add_favicon');
		$this->add_action('admin_head', 'add_favicon');
		$this->add_action('acf/init', 'add_acf_google_api');
		$this->add_action('init', 'unregister_tags');
		$this->add_action('admin_menu', 'remove_comment_from_menu');
		$this->add_action('admin_bar_menu', 'remove_comment_from_admin_bar', 999);
	}
	function remove_comment_from_menu($wp_admin_bar)
	{
		remove_menu_page('edit-comments.php');
	}

	public function remove_comment_from_admin_bar($wp_admin_bar)
	{
		$wp_admin_bar->remove_node('comments');
	}

	/** Get rid of tags on posts.*/
	public function unregister_tags()
	{
		unregister_taxonomy_for_object_type('post_tag', 'post');
	}

	// Move Yoast to bottom
	public function dev_yoast_to_bottom()
	{
		return 'low';
	}

	/**
	 * set favicon to site
	 */
	public function add_favicon()
	{
		$favicon = $this->get_option('opt_general_fav');
		$favicon = $favicon['url'] ?? '';
		if (!$favicon) $favicon = THEME_URL . '/favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon . '" />';
	}

	/**
	 * add google api for acf google maps
	 */
	public function add_acf_google_api()
	{
		$google_key = $this->get_option('opt_google_key');
		if (!empty($google_key)) {
			acf_update_setting('google_api_key', $google_key);
		}
	}

	/*
	* check image url and get default image when no image
	*/
	public function get_image($image, $size = 'medium')
	{
		if (empty($image)) {
			// get default image in option
			$default_image = $this->get_option('opt_image_default');
			$image = $default_image['sizes'][$size] ?? THEME_URL . '/assets/images/hero-type3.png';
		}
		return $image;
	}

	/*
	* check banner url and get default banner when no image
	*/
	public function get_banner($banner, $size = 'full')
	{
		if (empty($banner)) {
			// get default image in option
			$default_banner = $this->get_option('opt_banner_default');
			$banner =  $default_banner['sizes'][$size] ?? THEME_URL . '/assets/images/default-image.png';
		}
		return $banner;
	}

	/*
	* get alt of image
	* @param $attachment_id
	* @param text
	*/

	public function get_alt_image($attachment_id, $text = '')
	{
		$image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
		if (!empty($image_alt)) {
			return $image_alt;
		} else {
			return $text;
		}
	}

	/**
	 * Add an action hook
	 * @param $hook
	 * @param $callback
	 * @param $priority
	 * @param $accepted_args
	 */
	public function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
	{
		add_action($hook, array(
			$this,
			$callback
		), $priority, $accepted_args);
	}
	/**
	 * Add a filter hook
	 * @param $hook
	 * @param $callback
	 * @param $priority
	 * @param $accepted_args
	 */
	public function add_filter($hook, $callback, $priority = 10, $accepted_args = 1)
	{
		add_filter($hook, array(
			$this,
			$callback
		), $priority, $accepted_args);
	}

	/**
	 * remove an action
	 * @param $hook
	 * @param $callback
	 */
	public function remove_action($hook, $callback)
	{
		remove_action($hook, array(
			$this,
			$callback
		));
	}


	// Function cut string by character
	public function cut_string_by_char($string, $max_length, $more_string = '...')
	{
		$string = strip_shortcodes($string);
		if (mb_strlen($string, "UTF-8") > $max_length) {
			$max_length = $max_length - 3;
			$string = mb_substr($string, 0, $max_length, "UTF-8");
			$pos = strrpos($string, " ");
			if ($pos === false) {
				return substr($string, 0, $max_length) . $more_string;
			}
			return substr($string, 0, $pos) . $more_string;
		} else {
			return $string;
		}
	}

	public function get_excerpt_post($post, $limit)
	{
		if (empty($post)) {
			return '';
		}

		if (!empty($post->post_excerpt)) {
			$content = $post->post_excerpt;
		} else {
			$content = $post->post_content;
		}

		return wp_trim_words(wp_strip_all_tags($content), $limit);
	}
	/*
	* get option value
	*/

	public function get_phone_to_call($phone)
	{
		$phone_number = 'href="tel:' . preg_replace("/[^0-9.]/", "", $phone) . '"';
		return $phone_number;
	}

	/**
	 * Get embed video from youtube links
	 * @param string youtube link
	 * @return string embed link
	 */

	public function get_video_embeb($link)
	{
		$video_info = $this->video_info($link);

		if (strpos($link, "youtube.com") || strpos($link, 'youtu.be')) {
			$link = "http://www.youtube.com/embed/" . $video_info;
		} else {
			$link = 'http://player.vimeo.com/video/' . $video_info['video_id'] . '?title=0&byline=0&portrait=0&color=666666';
		}
		return $link;
	}

	/**
	 * Get embed video link from youtube, video links
	 * @param string $link
	 * @return array video information
	 */

	public function video_info($url)
	{
		// Handle Youtube
		if (strpos($url, "youtube.com") || strpos($url, "youtu.be")) {
			$regexstr = '~
			# Match Youtube link and embed code
			(?:				 				# Group to match embed codes
			(?:&lt;iframe [^&gt;]*src=")?	 	# If iframe match up to first quote of src
			|(?:				 		# Group to match if older embed
			(?:&lt;object .*&gt;)?		# Match opening Object tag
			(?:&lt;param .*&lt;/param&gt;)*  # Match all param tags
			(?:&lt;embed [^&gt;]*src=")?  # Match embed tag to the first quote of src
			)?				 			# End older embed code group
			)?				 				# End embed code groups
			(?:				 				# Group youtube url
			https?:\/\/		         	# Either http or https
			(?:[\w]+\.)*		        # Optional subdomains
			(?:               	        # Group host alternatives.
			youtu\.be/      	        # Either youtu.be,
			| youtube\.com		 		# or youtube.com
			| youtube-nocookie\.com	 	# or youtube-nocookie.com
			)				 			# End Host Group
			(?:\S*[^\w\-\s])?       	# Extra stuff up to VIDEO_ID
			([\w\-]{11})		        # $1: VIDEO_ID is numeric
			[^\s]*			 			# Not a space
			)				 				# End group
			"?				 				# Match end quote if part of src
			(?:[^&gt;]*&gt;)?			 			# Match any extra stuff up to close brace
			(?:				 				# Group to match last embed code
			&lt;/iframe&gt;		         	# Match the end of the iframe
			|&lt;/embed&gt;&lt;/object&gt;	        # or Match the end of the older embed
			)?				 				# End Group of last bit of embed code
			~ix';

			preg_match($regexstr, $url, $matches);
			$data = $matches[1];
		} // End Youtube

		// Handle Vimeo
		else if (strpos($url, "vimeo.com")) {
			$video_id = explode('vimeo.com/', $url);
			$video_id = $video_id[1];
			$data['video_type'] = 'vimeo';
			$data['video_id'] = $video_id;
			$xml = simplexml_load_file("http://vimeo.com/api/v2/video/$video_id.xml");

			foreach ($xml->video as $video) {
				$data['id'] = $video->id;
				$data['title'] = $video->title;
				$data['info'] = $video->description;
				$data['url'] = $video->url;
				$data['upload_date'] = $video->upload_date;
				$data['mobile_url'] = $video->mobile_url;
				$data['thumb_small'] = $video->thumbnail_small;
				$data['thumb_medium'] = $video->thumbnail_medium;
				$data['thumb_large'] = $video->thumbnail_large;
				$data['user_name'] = $video->user_name;
				$data['urer_url'] = $video->urer_url;
				$data['user_thumb_small'] = $video->user_portrait_small;
				$data['user_thumb_medium'] = $video->user_portrait_medium;
				$data['user_thumb_large'] = $video->user_portrait_large;
				$data['user_thumb_huge'] = $video->user_portrait_huge;
				$data['likes'] = $video->stats_number_of_likes;
				$data['views'] = $video->stats_number_of_plays;
				$data['comments'] = $video->stats_number_of_comments;
				$data['duration'] = $video->duration;
				$data['width'] = $video->width;
				$data['height'] = $video->height;
				$data['tags'] = $video->tags;
			} // End foreach
		} // End Vimeo

		// Set false if invalid URL
		else {
			$data = false;
		}
		return $data;
	}

	public function dev_get_empty_content($text = '')
	{
		$str = '<div class="listing__empty">
		<svg class="listing__empty-icon">
		<use xlink:href="#icon-info"></use>
		</svg>';
		if (!empty($text)) {
			$str .= '
			<h4 class="listing__empty-title">' . pll__('Your search') . '"' . $text . '" ' . pll__('did not return any properties.') . '</h4>';
		} else {
			$str .= '<h4 class="listing__empty-title">' . pll__('Your search did not return any properties.') . '</h4>';
		}
		$str .= '<span class="listing__empty-headline">
		' . pll__('Please make sure all words are spelled correctly
		or try different keywords.</span>') . '
		</div>';
		return $str;
	}
}
if (!function_exists('Project')) {
	/**
	 * Project
	 *
	 * @param void
	 * @return void
	 *
	 */
	function Project()
	{
		return Project::getInstance();
	}
}

global $devFunction;
$devFunction = Project();

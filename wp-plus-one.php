<?php
/*
Plugin Name: WordPress Google +1 Button - Advanced Plugin, Includes Redirection
Plugin URI: http://blog.jacobwg.com/wp-plus-one/
Description: Adds a Google +1 button to your blog posts and pages.
Donate link: http://blog.jacobwg.com/donate/
Tags: Google +1, Google, +1, featured posts, sharing, page, plugin, Post, posts, wordpress like, button, like, custom post type, custom post types, cpt, attachments
Author: Jacob Gillespie
Version: 1.9
Requires at least: 3.1.0
Tested up to: 3.3
Stable tag: 1.9
Author URI: http://jacobwg.com/
*/

load_plugin_textdomain('wp-plus-one', false, basename( dirname( __FILE__ ) ) . '/languages' );

require_once 'wp-plus-one-widget.php';

function wp_plus_one_menu() {
	add_options_page(__('Google +1 Button Settings', 'wp-plus-one'), __('Google +1 Button', 'wp-plus-one'), 'manage_options', 'wp-plus-one', 'wp_plus_one_options');
}

function wp_plus_one_options() {
?>
	<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><strong><?php _e('Google +1 Button Settings', 'wp-plus-one'); ?></strong></h2>

	<form name="wp_plus_one_option_form" id="wp_plus_one_option_form" method="post">
	
	<h2><?php _e('+1 Button Style', 'wp-plus-one') ?></h2>
	
	<div style="float:left; padding: 10px">
		<input type="radio" name="wp-plus-one-style" value="standard" id="wp-plus-one-style-standard"<?php if ((get_option( 'wp-plus-one-style', 'standard' ) == "standard") || (!get_option( 'wp-plus-one-style', 'standard' ))) echo ' checked'; ?>></input>
		<label for="wp-plus-one-style-standard"><?php _e('Standard', 'wp-plus-one'); ?></label>
		<?php echo wp_plus_one_button('http://jacobwg.com/'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="wp-plus-one-style" value="small" id="wp-plus-one-style-small"<?php if (get_option( 'wp-plus-one-style', 'standard' ) == "small") echo ' checked'; ?>></input>
		<label for="wp-plus-one-style-small"><?php _e('Small', 'wp-plus-one'); ?></label>
		<?php echo wp_plus_one_button('http://jacobwg.com/', 'small'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="wp-plus-one-style" value="medium" id="wp-plus-one-style-medium"<?php if (get_option( 'wp-plus-one-style', 'standard' ) == "medium") echo ' checked'; ?>></input>
		<label for="wp-plus-one-style-medium"><?php _e('Medium', 'wp-plus-one'); ?></label>
		<?php echo wp_plus_one_button('http://jacobwg.com/', 'medium'); ?>
	</div>
	<div style="float:left; padding: 10px">
		<input type="radio" name="wp-plus-one-style" value="tall" id="wp-plus-one-style-tall"<?php if (get_option( 'wp-plus-one-style', 'standard' ) == "tall") echo ' checked'; ?>></input>
		<label for="wp-plus-one-style-tall"><?php _e('Tall', 'wp-plus-one'); ?></label>
		<?php echo wp_plus_one_button('http://jacobwg.com/', 'tall'); ?>
	</div>
	
	<h2><?php _e('+1 Button Position', 'wp-plus-one') ?></h2>
	
	<label for="wp-plus-one-position-top"><?php _e('Top of post', 'wp-plus-one'); ?>:</label>
	<select name="wp-plus-one-position-top" id="wp-plus-one-position-top">
		<option value="left" <?php if ( get_option( 'wp-plus-one-position-top', 'left' ) == "left") echo ' selected'; ?>><?php _e('Left (float)', 'wp-plus-one'); ?></option>
		<option value="right" <?php if (get_option( 'wp-plus-one-position-top', 'left' ) == "right") echo 'selected'; ?>><?php _e('Right (float)', 'wp-plus-one'); ?></option>
		<option value="nofloat" <?php if (get_option( 'wp-plus-one-position-top', 'left' ) == "nofloat") echo 'selected'; ?>><?php _e('No Float', 'wp-plus-one'); ?></option>
		<option value="none" <?php if (get_option( 'wp-plus-one-position-top', 'left' ) == "none") echo 'selected'; ?>><?php _e('None', 'wp-plus-one'); ?></option>
	</select>
	
	<label for="wp-plus-one-position-bottom"><?php _e('Bottom of post', 'wp-plus-one'); ?>:</label>
	<select name="wp-plus-one-position-bottom" id="wp-plus-one-position-bottom">
		<option value="left" <?php if ( get_option( 'wp-plus-one-position-bottom', 'none' ) == "left") echo ' selected'; ?>><?php _e('Left (float)', 'wp-plus-one'); ?></option>
		<option value="right" <?php if (get_option( 'wp-plus-one-position-bottom', 'none' ) == "right") echo 'selected'; ?>><?php _e('Right (float)', 'wp-plus-one'); ?></option>
		<option value="nofloat" <?php if (get_option( 'wp-plus-one-position-bottom', 'none' ) == "nofloat") echo 'selected'; ?>><?php _e('No Float', 'wp-plus-one'); ?></option>
		<option value="none" <?php if (get_option( 'wp-plus-one-position-bottom', 'none' ) == "none") echo 'selected'; ?>><?php _e('None', 'wp-plus-one'); ?></option>
	</select>
	
	<h2><?php _e('+1 Button Count', 'wp-plus-one') ?></h2>
	<p>
		<input type="checkbox" name="wp-plus-one-show-count" id="wp-plus-one-show-count" value="true"<?php if (get_option( 'wp-plus-one-show-count', true ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-show-count"><?php _e('Show the +1 count with the button', 'wp-plus-one'); ?></label>
	</p>
	
	<h2><?php _e('+1 Button Visibility', 'wp-plus-one') ?></h2>
	<p>
		<input type="checkbox" name="wp-plus-one-show-on-post" id="wp-plus-one-show-on-post" value="true"<?php if (get_option( 'wp-plus-one-show-on-post', true ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-show-on-post"><?php _e('Show the +1 button on posts', 'wp-plus-one'); ?></label><br />
		<input type="checkbox" name="wp-plus-one-show-on-page" id="wp-plus-one-show-on-page" value="true"<?php if (get_option( 'wp-plus-one-show-on-page', false ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-show-on-page"><?php _e('Show the +1 button on pages', 'wp-plus-one'); ?></label><br />
		<input type="checkbox" name="wp-plus-one-show-on-attachment" id="wp-plus-one-show-on-attachment" value="true"<?php if (get_option( 'wp-plus-one-show-on-attachment', false ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-show-on-attachment"><?php _e('Show the +1 button on attachments (like images)', 'wp-plus-one'); ?></label><br />
		<?php
		if (function_exists('get_post_types')) {
			$args = array(
			  'public'   => true,
			  '_builtin' => false
			); 
			$post_types = get_post_types($args); 
			foreach ($post_types as $post_type ) {
				$post_type = get_post_type_object($post_type);
			?>
			<input type="checkbox" name="wp-plus-one-show-on-<?php echo $post_type->name; ?>" id="wp-plus-one-show-on-<?php echo $post_type->name; ?>" value="true"<?php if (get_option( 'wp-plus-one-show-on-' . $post_type->name, false ) == true) echo ' checked'; ?>>
			<label for="wp-plus-one-show-on-<?php echo $post_type->name; ?>"><?php _e('Show the +1 button on ' . $post_type->labels->name, 'wp-plus-one' ); ?></label><br />
			<?php
			}
		}
		?>
	</p>
	
	<p>
		<input type="checkbox" name="wp-plus-one-hide-on-home" id="wp-plus-one-hide-on-home" value="true"<?php if (get_option( 'wp-plus-one-hide-on-home', false ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-hide-on-home"><?php _e('Hide the +1 button on the homepage', 'wp-plus-one'); ?></label><br />
		<input type="checkbox" name="wp-plus-one-hide-on-excerpt" id="wp-plus-one-hide-on-excerpt" value="true"<?php if (get_option( 'wp-plus-one-hide-on-excerpt', false ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-hide-on-excerpt"><?php _e('Hide the +1 button on excerpts', 'wp-plus-one'); ?></label><br />
	</p>
	
	<h2><?php _e('+1 Redirect on Click') ?></h2>
	<p>
		<label for="wp-plus-one-global-redirect"><?php _e('URL to redirect to on-click ', 'wp-plus-one'); ?></label>
		<input type="text" name="wp-plus-one-global-redirect" id="wp-plus-one-global-redirect" placeholder="http://" value="<?php echo get_option( 'wp-plus-one-global-redirect', '' )?>">
	</p>
	<p>
		<?php _e('Input a URL if you would like the user to be redirected after clicking the +1 button.  This can be disabled / modified per post on the post edit page.', 'wp-plus-one'); ?>
	</p>
	
	<h2><?php _e('+1 Button Custom CSS', 'wp-plus-one') ?></h2>
	<p>
		<textarea name="wp-plus-one-css" id="wp-plus-one-css" rows="10" cols="50"><?php echo get_option( 'wp-plus-one-css', '' ); ?></textarea>
	</p>
	
	<h2><?php _e('+1 Button JavaScript', 'wp-plus-one') ?></h2>
	<p>
		<input type="checkbox" name="wp-plus-one-async-js" id="wp-plus-one-async-js" value="true"<?php if (get_option( 'wp-plus-one-async-js', true ) == true) echo ' checked'; ?>>
		<label for="wp-plus-one-async-js"><?php _e('Use the (faster) asynchronous JavaScript', 'wp-plus-one'); ?></label>
	</p>
	
	<p>
		<input type="submit" value="Save Settings" class="button-primary" />
		<input type="hidden" name="wp-plus-one-form-submit" value="true" />
	</p>
	
	<p>
		<strong><?php _e('WordPress Hook:', 'wp-plus-one'); ?></strong> <?php _e('If you selected <em>None</em> as the +1 Button position or would like to add additional +1 Buttons to your theme, please use the <code>&lt;?php do_action( \'wp_plus_one_button\', $url, $style, $css, $count, $redirect); ?&gt;</code> hook in your plugin or theme.', 'wp-plus-one'); ?>
	</p>
	<p>
		<strong><?php _e('Hook Options:', 'wp-plus-one'); ?></strong> <?php _e('<code>$url</code> (optional) is the URL to +1 (will be <code>get_permalink()</code> if blank), <code>$style</code> (optional) is the button style (standard, small, medium, tall), <code>$css</code> (optional) is any extra CSS to add to the button <code>DIV</code>, <code>$count</code> (optional) true/false whether or not to show the +1 count (shown if true), and <code>$redirect</code> (optional) a URL to redirect the user to after clicking the +1 button.', 'wp-plus-one'); ?>
	</p>
	
	</form>
</div>
	


	
<?php
}


function wp_plus_one_init()
{
	wp_enqueue_script('wp-plus-one', get_bloginfo('wpurl') . '/wp-content/plugins/wp-plus-one/wp-plus-one.js');
	
	if(isset($_POST['wp-plus-one-form-submit']))
	{
		// wp-plus-one-position-top
		// wp-plus-one-position-bottom
		// wp-plus-one-layout
		// wp-plus-one-show-count
		// wp-plus-one-show-on-post
		// wp-plus-one-show-on-page
		// wp-plus-one-show-on-attachment
		// wp-plus-one-hide-on-home
		// wp-plus-one-hide-on-excerpt
		// wp-plus-one-css
		// wp-plus-one-async-js
		
		update_option('wp-plus-one-position-top', $_POST['wp-plus-one-position-top']);
		update_option('wp-plus-one-position-bottom', $_POST['wp-plus-one-position-bottom']);
		update_option('wp-plus-one-style', $_POST['wp-plus-one-style']);
		update_option('wp-plus-one-show-count', $_POST['wp-plus-one-show-count'] == 'true');
		update_option('wp-plus-one-show-on-post', $_POST['wp-plus-one-show-on-post'] == 'true');
		update_option('wp-plus-one-show-on-page', $_POST['wp-plus-one-show-on-page'] == 'true');
		update_option('wp-plus-one-show-on-attachment', $_POST['wp-plus-one-show-on-attachment'] == 'true');
		update_option('wp-plus-one-hide-on-home', $_POST['wp-plus-one-hide-on-home'] == 'true');
		update_option('wp-plus-one-hide-on-excerpt', $_POST['wp-plus-one-hide-on-excerpt'] == 'true');
		update_option('wp-plus-one-css', $_POST['wp-plus-one-css']);
		update_option('wp-plus-one-async-js', $_POST['wp-plus-one-async-js'] == 'true');
		
		update_option('wp-plus-one-global-redirect', $_POST['wp-plus-one-global-redirect']);
		
		if (function_exists('get_post_types')) {
			// save settings for custom post types
			$args = array(
			  'public'   => true,
			  '_builtin' => false
			); 
			$post_types = get_post_types($args); 
			foreach ($post_types as $post_type ) {
				update_option( 'wp-plus-one-show-on-' . $post_type, $_POST['wp-plus-one-show-on-' . $post_type] == 'true' );
			}
		}
		
		add_action('admin_notices', 'wp_plus_one_save_message');

	}
	
}

function wp_plus_one_save_message() { echo '<div id="message" class="updated fade">' . __('Google +1 Button Settings Saved', 'wp-plus-one') . '</div>'; }

function wp_plus_one_script_async() {
	$language = explode( '-', get_bloginfo('language') );
	$language = $language[0];
	echo <<<TEXT
	<script type="text/javascript">
	  window.___gcfg = {lang: '$language'};
	
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
TEXT;
}

function wp_plus_one_script() {
	$language = explode( '-', get_bloginfo('language') );
	$language = $language[0];
	echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang: \'' . $language . '\'}</script>';
}


if ( get_option( 'wp-plus-one-async-js', true ) ) {
	add_action('wp_footer', 'wp_plus_one_script_async');
} else {
	add_action('wp_head', 'wp_plus_one_script');
}

function wp_plus_one_button( $url='', $size='', $css='', $count=true, $redirect='' ) {

	if ( !$url )
		$url = get_permalink();
	if ( !$url )
		return;

	if ( $css )
		$tag = '<div class="wp_plus_one_button" style="' . $css . '"><g:plusone';
	else
		$tag = '<div class="wp_plus_one_button"><g:plusone';
		
	if (!$count)
		$tag .= ' count="false"';
	
	if ( $size && $size != 'standard' )
		$tag .= ' size="' . $size . '"';
	
	$tag .= ' href="' . $url . '"';
	
	$tag .= ' callback="wp_plus_one_handler"';
	
	$tag .= '></g:plusone>';

	if ($redirect != '') {
		$tag .= '<script>
		// <![CDATA[
			wp_plus_one_redirects_source.push(\'' . $url . '\');
			wp_plus_one_redirects_destination.push(\'' . $redirect . '\');
		// ]]>
		</script>';
	}
	
	$tag .= '</div>';
	
	return $tag;

}
function wp_plus_one_button_echo( $url='', $size='', $css='', $count=true, $redirect=''  ) {
	echo wp_plus_one_button( $url, $size, $css, $count, $redirect );
}

add_action( 'wp_plus_one_button', 'wp_plus_one_button_echo', 10, 4 );

function wp_plus_one( $content ) {

	if ( 
		(	get_option('wp-plus-one-position', 'top_left') != 'none' 					// hide if it is set to none
		&& 	( !is_single() || get_option( 'wp-plus-one-show-on-post', true ) == true ) 	// show if it is a post (default: true)
		&&  ( !is_page() || get_option( 'wp-plus-one-show-on-page', false ) == true )	// show if it is a page (default: false)
		&&  ( !is_attachment() || get_option( 'wp-plus-one-show-on-attachment', false ) == true )	// show if it is a page (default: false)
		&&  ( !is_home() || !get_option( 'wp-plus-one-hide-on-home', false ))	// hide if it is the homepage (default: false)
		&& 	!is_feed() && !is_archive() && !is_search() && !is_404() )
		||  ( function_exists('get_post_type') && is_single() && get_post_type(get_the_ID()) && get_option( 'wp-plus-one-show-on-' . get_post_type(get_the_ID()), false ) == true )
	) {
		
		$redirect = '';
		if (get_the_id()) {
			if (get_post_meta(get_the_id(), 'wp_plus_one_disabled') == true) {
				return $content;
			}
			if (get_post_meta(get_the_id(), 'disable_wp_plus_one_redirect') != true) {
				if (get_post_meta(get_the_id(), 'wp_plus_one_redirect', true) != ''){
					$redirect = get_post_meta(get_the_id(), 'wp_plus_one_redirect', true);
				} else {
					$redirect = get_option( 'wp-plus-one-global-redirect', '' );
				}
			}
		}
			
		
		$url = get_permalink();
		$style = get_option('wp-plus-one-style', 'standard');
		$css = get_option( 'wp-plus-one-css', '' );
		$count = get_option( 'wp-plus-one-show-count', true );
		
		switch( get_option('wp-plus-one-position-top', 'left') )
		{
			case 'left':
				$content = wp_plus_one_button( $url, $style, 'margin: 0 8px 8px 0; float:left; ' . $css, $count, $redirect ) . $content;
				break;
			case 'right':
				$content =  wp_plus_one_button( $url, $style, 'margin: 0 0 8px 8px; float:right; ' . $css, $count, $redirect ) . $content;
				break;
			case 'nofloat':
				$content =  wp_plus_one_button( $url, $style, $css, $count, $redirect ) . $content;
				break;
		}
		
		switch( get_option('wp-plus-one-position-bottom', 'none') )
		{
			case 'left':
				$content .= wp_plus_one_button( $url, $style, 'margin: 0 8px 8px 0; float:left; ' . $css, $count, $redirect );
				break;
			case 'right':
				$content .=  wp_plus_one_button( $url, $style, 'margin: 0 0 8px 8px; float:right; ' . $css, $count, $redirect );
				break;
			case 'nofloat':
				$content .=  wp_plus_one_button( $url, $style, $css, $count, $redirect );
				break;
		}
	}

	return $content;
}

function wp_plus_one_admin_head() {
	$language = explode( '-', get_bloginfo('language') );
	$language = $language[0];
	echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang: \'' . $language . '\'}</script>';
	echo '<style type="text/css"> #wp_plus_one_option_form h2 { clear: both; } #wp_plus_one_option_form .wp_plus_one_button { margin: 8px; } </style>';
}

add_action('admin_head', 'wp_plus_one_admin_head');
add_filter('the_content', 'wp_plus_one');
add_action('admin_menu', 'wp_plus_one_menu');
add_action('init', 'wp_plus_one_init');

if (!get_option( 'wp-plus-one-hide-on-excerpt', false )){ 
	add_filter('the_excerpt', 'wp_plus_one');
}


function wp_plus_one_add_meta_box() {
	if ( get_option( 'wp-plus-one-show-on-post', true ) )
		add_meta_box( 'wp_plus_one_meta', __('Google +1 Settings'), 'wp_plus_one_meta_box_content', 'post', 'advanced', 'high' );
	if ( get_option( 'wp-plus-one-show-on-page', false ) )
		add_meta_box( 'wp_plus_one_meta', __('Google +1 Settings'), 'wp_plus_one_meta_box_content', 'page', 'advanced', 'high' );
	
	if (function_exists('get_post_types')) {
		// add metabox to custom post types
		$args = array(
		  'public'   => true,
		  '_builtin' => false
		); 
		$post_types = get_post_types($args); 
		foreach ($post_types as $post_type ) {
			if ( get_option( 'wp-plus-one-show-on-' . $post_type, false ) )
				add_meta_box( 'wp_plus_one_meta', __('Google +1 Settings'), 'wp_plus_one_meta_box_content',  $post_type, 'advanced', 'high' );
		}
	}
}

function wp_plus_one_meta_box_content( $post ) {
	$wp_plus_one_checked = get_post_meta( $post->ID, 'wp_plus_one_disabled', false );

	if ( empty( $wp_plus_one_checked ) || $wp_plus_one_checked === false )
		$wp_plus_one_checked = ' checked="checked"';
	else
		$wp_plus_one_checked = '';
	
	$wp_plus_one_redirect = get_post_meta( $post->ID, 'wp_plus_one_redirect', true );
	$wp_plus_one_redirect_disabled = get_post_meta( $post->ID, 'disable_wp_plus_one_redirect', false );

	if ( !empty( $wp_plus_one_redirect_disabled ) || $wp_plus_one_redirect_disabled == true )
		$wp_plus_one_redirect_disabled = ' checked="checked"';
	else
		$wp_plus_one_redirect_disabled = '';

	echo '<p><label for="enable_post_wp_plus_one"><input name="enable_post_wp_plus_one" id="enable_post_wp_plus_one" value="1"' . $wp_plus_one_checked . ' type="checkbox"> ' . __('Show the +1 button on this post.') . '</label><input type="hidden" name="wp_plus_one_status_hidden" value="1" /></p>';
	echo '<p><label for="disable_wp_plus_one_redirect"><input name="disable_wp_plus_one_redirect" id="disable_wp_plus_one_redirect" value="1"' . $wp_plus_one_redirect_disabled . ' type="checkbox"> ' . __('Disable the +1 button redirect on click.', 'wp-plus-one') . '</label></p>';
	echo '<p><label for="wp_plus_one_redirect">' . __('Redirect on click to (defaults to global setting) ', 'wp-plus-one') . '</label> <input name="wp_plus_one_redirect" id="wp_plus_one_redirect" value="' . $wp_plus_one_redirect . '" type="text" placeholder="http://"></p>';
}

function wp_plus_one_meta_box_save( $post_id ) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	// Record wp_plus_one disable
	if ( 'post' == $_POST['post_type'] || 'page' == $_POST['post_type'] ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['wp_plus_one_status_hidden'] ) ) {
				if ( !isset( $_POST['enable_post_wp_plus_one'] ) )
					update_post_meta( $post_id, 'wp_plus_one_disabled', 1 );
				else
					delete_post_meta( $post_id, 'wp_plus_one_disabled' );
				if ( isset( $_POST['disable_wp_plus_one_redirect'] ) )
					update_post_meta( $post_id, 'disable_wp_plus_one_redirect', true );
				else
					delete_post_meta( $post_id, 'disable_wp_plus_one_redirect' );
				update_post_meta( $post_id, 'wp_plus_one_redirect', $_POST['wp_plus_one_redirect'] );
			}
		}
	}

  return $post_id;
}

function wp_plus_one_plugin_settings( $links ) {
	$settings_link = '<a href="options-general.php?page=wp-plus-one">'.__('Settings').'</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

function wp_plus_one_add_plugin_settings($links, $file) {
	if ( $file == basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ) ) {
		$links[] = '<a href="options-general.php?page=wp-plus-one">' . __('Settings') . '</a>';
		$links[] = '<a href="http://blog.jacobwg.com/wp-plus-one/">' . __('Support') . '</a>';
	}
	
	return $links;
}

add_action( 'admin_init', 'wp_plus_one_add_meta_box' );
add_action( 'save_post', 'wp_plus_one_meta_box_save' );
add_action( 'plugin_action_links_'.basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ), 'wp_plus_one_plugin_settings', 10, 4 );
add_filter( 'plugin_row_meta', 'wp_plus_one_add_plugin_settings', 10, 2 );
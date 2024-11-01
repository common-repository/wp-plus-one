<?php

/**
 * WpPlusOneWidget Class
 */
class WpPlusOneWidget extends WP_Widget {

	function WpPlusOneWidget() {
		parent::WP_Widget(false, $name = 'WP Plus One');
	}

	function widget($args, $instance) {
		extract( $args );
		
		$defaults = array( 'style' => 'standard', 'count' => true );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$style = $instance['style'];
		$css = $instance['css'];
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; 
		if ( $_SERVER['HTTPS'] )
			do_action( 'wp_plus_one_button', "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], $style, $css, $count);
		else 
			do_action( 'wp_plus_one_button', "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], $style, $css, $count);
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['style'] = strip_tags($new_instance['style']);
		$instance['count'] = $new_instance['count'] == 'true';
		$instance['css'] = $new_instance['css'];
		
		return $instance;
	}


	function form($instance) {
		$defaults = array( 'style' => 'standard', 'count' => true );
		$instance = wp_parse_args( (array) $instance, $defaults );
	
        $title = esc_attr($instance['title']);
		$count = $instance['count'];
		$style = $instance['style'];
		$css = $instance['css'];
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>">Button Style:</label>
			<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
				<option <?php if ( 'standard' == $style ) echo 'selected="selected"'; ?> value="standard">Standard</option>
				<option <?php if ( 'small' == $style ) echo 'selected="selected"'; ?> value="small">Small</option>
				<option <?php if ( 'medium' == $style ) echo 'selected="selected"'; ?> value="medium">Medium</option>
				<option <?php if ( 'tall' == $style ) echo 'selected="selected"'; ?> value="tall">Tall</option>
			</select>
		</p>

		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="true"<?php if ($count != false) echo ' checked'; ?>>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show the +1 count with the button'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('css'); ?>">Custom CSS:</label>
			<textarea id="<?php echo $this->get_field_id('css'); ?>" name="<?php echo $this->get_field_name('css'); ?>" class="widefat"><?php echo $css; ?></textarea>
		</p>
<?php 
	}

}

add_action('widgets_init', create_function('', 'return register_widget("WpPlusOneWidget");'));
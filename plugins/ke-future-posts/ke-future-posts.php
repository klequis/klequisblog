<?php
/*
Plugin Name: KE Future Posts
Version: 1.0
Plugin URI: http://klequis.com
Description: Subscribe to future posts
Author: klequis
Author URI: http://klequis.com
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');


add_action( 'widgets_init', function(){
     register_widget( 'ke_future_posts' );
});

/**
 * Adds My_Widget widget.
 */
class ke_future_posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ke_future_posts', // Base ID
			__('KE Future Posts', 'text_domain'), // Name
			array( 'description' => __( 'Register and future post list', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( !is_user_logged_in() ){
    echo $args['before_widget'];
		echo '<div id="ke_future_posts" class="panel panel-default">';
		echo '<div class="panel-body">';
		echo '<h3>Future Posts</h3>';
		/*
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		*/

		//echo __( 'Hello, World!', 'text_domain' );
		//echo __( get_site_url(), 'text_domain' );
		//echo '<p class="story_widget_readmore"><a href="' . get_permalink( $post->ID ) . '" title="Read the story, ' . $post->post_title . '">more...</a></p>';
			echo '<p><a href="' . get_site_url() . '/register">Register</a> for updates on future posts.</p>';
			//echo '<p><a href="' . get_site_url() . '/login">Login</a></p>';
			//echo '<p><a href="' . get_site_url() . '/register">Register</a></p>';

		echo '</div>';
		echo '</div>';
		echo $args['after_widget'];
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class My_Widget

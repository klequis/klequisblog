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

 if (!function_exists('write_log')) {
    function write_log ( $log )  {
      if ( true === WP_DEBUG ) {
        if ( is_array( $log ) || is_object( $log ) ) {
          error_log( print_r( $log, true ) );
        } else {
          error_log( $log );
        }
      }
  	}
  }

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

		write_log('ke_future_posts called');

	
    //echo $args['before_widget'];
    $out01 = $args['before_widget'];
		//echo '<div id="ke_future_posts" class="panel panel-default">';
		$out02 = '<div id="ke_future_posts" class="panel panel-default">';
		//echo '<div class="panel-body">';
		$out03 = '<div class="panel-body">';
		//echo '<h3>Future Posts</h3>';
		$out04 = '<h4>Future Posts</h4>';
		/*
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		*/

		//echo __( 'Hello, World!', 'text_domain' );
		//echo __( get_site_url(), 'text_domain' );
		//echo '<p class="story_widget_readmore"><a href="' . get_permalink( $post->ID ) . '" title="Read the story, ' . $post->post_title . '">more...</a></p>';
			//echo '<p><a href="' . get_site_url() . '/register">Register</a> for updates on future posts.</p>';
			$out05 = '<p><a href="' . get_site_url() . '/register">Register</a> for updates on future posts.</p>';
			//echo '<p><a href="' . get_site_url() . '/login">Login</a></p>';
			//echo '<p><a href="' . get_site_url() . '/register">Register</a></p>';

		//echo '</div>';
		$out06 = '</div>';
		//echo '</div>';
		$out07 = '</div>';
		//echo $args['after_widget'];
		$out08 = $args['after_widget'];
		//$out09 = <a href="#">

		$font_awesome_li = '<i class="fa-li fa fa-square"></i>';
		$future01 = '<ul class="fa-ul">';
		$future02 = '<li>' . $font_awesome_li . '<a href="#">Using Git & GitHub</a></li>';
		$future03 = '<li>' . $font_awesome_li . '<a href="#">Installing Node.js</a></li>';
		$future04 = '<li>' . $font_awesome_li . '<a href="#">Installing ESLint</a></li>';
		$future05 = '</ul>';

		$debug = true;
		if ($debug) {
			write_log('out01: ' . $out01);
			write_log('out02: ' . $out02);
			write_log('out03: ' . $out03);
			write_log('out04: ' . $out04);
			write_log('out05: ' . $out05);
			write_log('out06: ' . $out06);
			write_log('out07: ' . $out07);
			write_log('out08: ' . $out08);
		}

		echo $out01; //before_widget
		echo $out02; //<div panel>
		echo $out03; //<div panel>
		echo $out04; //<h4>Future ...
		if ( !is_user_logged_in() ){
			
			echo $out05; //url to register page
		}
		echo $future01 . $future02 . $future03 . $future04 . $future05;
		echo $out06; //</div>
		echo $out07; //</div>
		echo $out08; //after_widget
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

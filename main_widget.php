<?phpadd_action( 'widgets_init', 'hdwtube_load_widgets' );function hdwtube_load_widgets(){	register_widget( 'youtube_Widget' );}class youtube_Widget extends WP_Widget {	function __construct(){		$widget_ops = array( 'classname' => 'hdwtube', 'description' => __('widget that display HDW Tube menus', 'hdwtube') );		$control_ops = array( 'width' => '100%', 'height' => '100%', 'id_base' => 'hdwtube-widget' );		parent::__construct( 'hdwtube-widget', __('HDW Tube', 'hdwtube'), $widget_ops, $control_ops );	}		function widget( $args, $instance ) 	{	    global $current_user;	    global $wpdb;	    $siteurl                   = get_option ( 'siteurl' );	    $widget_folder_path        = plugins_url().'/' . basename ( dirname ( __FILE__ ) ) . '/widget_icon/';	    $subscribtion_table_name   = $wpdb->prefix . "youtube_subscriptions";	    $channel_table_name        = $wpdb->prefix . "youtube_channel";	    $video_table_name          = $wpdb->prefix . "youtube_video";	    $playlisttitle_table_name  = $wpdb->prefix . "youtube_playlistname";	    $playlist_table_name       = $wpdb->prefix . "youtube_playlist";	    $likedislike_table_name    = $wpdb->prefix . "youtube_likevideo";	    $settings_table_name       = $wpdb->prefix . "youtube_settings";
	    	    $get_settings = $wpdb->get_row("SELECT * FROM $settings_table_name");		$yclone_yrl = $instance['url'];			$yclone_logo_url = 	$instance['logo_url'];		if($yclone_logo_url == ''){			$yclone_logo_url = $widget_folder_path.'hdwtube.png';		}		if (strpos($yclone_yrl,'?') !== false){ $yclone_yrl = $yclone_yrl."&"; }else{ $yclone_yrl = $yclone_yrl."?"; }					if($current_user->ID)		{		    require_once (dirname ( __FILE__ ) . '/yclone_widget/widget_login.php');	   		}		else		{		    require_once (dirname ( __FILE__ ) . '/yclone_widget/widget_logout.php');		}		}	/**	 * Update the widget settings.	 */	function update( $new_instance, $old_instance ) {		$instance = $old_instance;		/* Strip tags for title and name to remove HTML (important for text inputs). */				$instance['url'] = strip_tags( $new_instance['url'] );		$instance['logo_url'] = strip_tags( $new_instance['logo_url'] );				return $instance;	}	/**	 * Displays the widget settings controls on the widget panel.	 * Make use of the get_field_id() and get_field_name() function	 * when creating your form elements. This handles the confusing stuff.	 */	function form( $instance ) {		/* Set up some default widget settings. */		$defaults = array( 'title' => __('HDW Tube', 'hdwtube'), 'display' => 'image','limit' => __('4', 'hdwtube') );		$instance = wp_parse_args( (array) $instance, $defaults ); ?>				<!-- Your Name: Text Input -->		<p>			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('HDW Tube URL:'); ?></label>			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" style="width:100%;" />		</p>				<p>			<label for="<?php echo $this->get_field_id( 'logo_url' ); ?>"><?php _e('HDW Tube Logo:'); ?></label>			<input id="<?php echo $this->get_field_id( 'logo_url' ); ?>" name="<?php echo $this->get_field_name( 'logo_url' ); ?>" value="<?php echo $instance['logo_url']; ?>" style="width:100%;" />		</p>			<?php	}}?>
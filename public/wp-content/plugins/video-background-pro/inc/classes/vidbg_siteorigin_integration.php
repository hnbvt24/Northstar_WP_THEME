<?php
/**
 * Exit if accessed directly
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Class for SiteOrigin Page Builder integration with Video Background
 * Adds Video Background fields to Page Builder row
 *
 * @since 1.0.0
 */
class vidbgpro_SiteOrigin {

  /**
   * Create the construct function for class init
   *
   * @since 1.0.0
   *
   * @uses add_filter()
   */
  function __construct() {
    add_filter( 'siteorigin_panels_row_style_fields', array( $this, 'vidbgpro_SO_register_fields' ) );
    add_filter( 'siteorigin_panels_row_style_groups', array( $this, 'vidbgpro_SO_create_group' ), 10, 3 );
    add_filter( 'siteorigin_panels_before_row', array( $this, 'vidbgpro_SO_init_after_row' ), 10, 3 );
  }

  /**
   * Adds the output before the Page Builder row
   *
   * @since 1.0.0
   * @access public
   * @return string Return Video Background jQuery init
   *
   * @uses wp_get_attachment_image_src()
   */
  public function vidbgpro_SO_init_after_row( $output, $grid_item, $grid_attributes ) {
    // Get all of our data
    $type = array_key_exists( 'vidbg_SO_type', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_type'] : 'self-host';
    $mp4 = array_key_exists( 'vidbg_SO_mp4', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_mp4'] : '#';
    $webm = array_key_exists( 'vidbg_SO_webm', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_webm'] : '#';
    $youtube_url = array_key_exists( 'vidbg_SO_youtube_url', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_youtube_url'] : '#';
    $youtube_start = array_key_exists( 'vidbg_SO_youtube_start', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_youtube_start'] : '0';
    $youtube_end = array_key_exists( 'vidbg_SO_youtube_end', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_youtube_end'] : 'null';
    $poster_meta = array_key_exists( 'vidbg_SO_poster', $grid_item['style'] ) && !empty( $grid_item['style']['vidbg_SO_poster'] ) ? $grid_item['style']['vidbg_SO_poster'] : '#';
    $poster = '#';
    if ( $poster_meta !== '#' ) {
      $poster_arr = wp_get_attachment_image_src( $poster_meta, 'full' );
      $poster = $poster_arr[0];
    }
    $overlay = array_key_exists( 'vidbg_SO_overlay', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_overlay'] == 1 ? 'true' : 'false';
    $overlay_color = array_key_exists( 'vidbg_SO_overlay_color', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_overlay_color'] : '#000';
    $overlay_alpha = array_key_exists( 'vidbg_SO_overlay_alpha', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_overlay_alpha'] : '0.3';
    $overlay_texture_meta = array_key_exists( 'vidbg_SO_overlay_texture_url', $grid_item['style'] ) && !empty( $grid_item['style']['vidbg_SO_overlay_texture_url'] ) ? $grid_item['style']['vidbg_SO_overlay_texture_url'] : '#';
    $overlay_texture = '#';
    if ( $overlay_texture_meta !== '#' ) {
      $overlay_texture_arr = wp_get_attachment_image_src( $overlay_texture_meta, 'full' );
      $overlay_texture = $overlay_texture_arr[0];
    }
    $loader = array_key_exists( 'vidbg_SO_enable_loader', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_enable_loader'] == 1 ? 'true' : 'false';
    $loader_bg_poster = array_key_exists( 'vidbg_SO_loader_bg_poster', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_loader_bg_poster'] == 1 ? 'true' : 'false';
    $loop = array_key_exists( 'vidbg_SO_disable_loop', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_disable_loop'] == 1 ? 'false' : 'true';
    $end_frame_poster = array_key_exists( 'vidbg_SO_end_fallback', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_end_fallback'] == 1 ? 'true' : 'false';
    $front_play = array_key_exists( 'vidbg_SO_frontend_play', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_frontend_play'] == 1 ? 'true' : 'false';
    $front_mute = array_key_exists( 'vidbg_SO_frontend_volume', $grid_item['style'] ) && $grid_item['style']['vidbg_SO_frontend_volume'] == 1 ? 'true' : 'false';
    $front_position = array_key_exists( 'vidbg_SO_frontend_position', $grid_item['style'] ) ? $grid_item['style']['vidbg_SO_frontend_position'] : 'bottom-right';

    // Create our container selector
    $unique_class = vidbgpro_create_unique_ref();
    $row_class = $unique_class . '-row';
    $container_class = $unique_class . '-container';

    /**
     * If the type is set to self-host and no mp4 and webm, quit
     * If the type is set to youtube and no youtube url, quit
     */
    if ( $type === 'self-host' && ( $mp4 === '#' && $webm === '#' ) ) {
      return;
    } else if ( $type === 'youtube' && $youtube_url === '#' ) {
      return;
    }

    // Create our shortcode attributes array
    $shortcode_atts = array(
      'container' => '.' . $container_class,
      'type' => $type,
      'mp4' => $mp4,
      'webm' => $webm,
      'poster' => $poster,
      'youtube_url' => $youtube_url,
      'youtube_start' => $youtube_start,
      'youtube_end' => $youtube_end,
      'loop' => $loop,
      'end_frame_poster' => $end_frame_poster,
      'overlay' => $overlay,
      'overlay_color' => $overlay_color,
      'overlay_alpha' => $overlay_alpha,
      'overlay_texture_url' => $overlay_texture,
      'frontend_play_button' => $front_play,
      'frontend_volume_button' => $front_mute,
      'frontend_position' => $front_position,
      'enable_loader' => $loader,
      'loader_bg_poster' => $loader_bg_poster,
      'source' => 'SiteOrigin Page Builder',
    );

    // Add our unique class and container class to the page builder row
    $output .= "<script>
      jQuery(function($){
        $('." . $unique_class . "').next('.panel-grid').addClass('" . $row_class . "');

        if( $('.panel-grid." . $row_class . " > .siteorigin-panels-stretch').length ) {
          $('.panel-grid." . $row_class . " > .siteorigin-panels-stretch').addClass( '" . $container_class ."' );
        } else {
          $('.panel-grid." . $row_class . "').addClass( '" . $container_class ."' );
        }
      });
    </script>";

    $the_shortcode = vidbgpro_construct_shortcode( $shortcode_atts );
    $output .= do_shortcode( $the_shortcode );

    $output .= '<div class="' . $unique_class . '" style="display: none;"></div>';

    return $output;
  }

  /**
   * Create SiteOrigin group for Video Background on row
   *
   * @since 1.0.0
   * @param $groups
   * @param $post_id
   * @param $args
   * @return array Return group name to edit row
   *
   * @uses __()
   */
  public function vidbgpro_SO_create_group( $groups, $post_id, $args ) {
    $groups['vidbg_SO'] = array(
      'name' => __('Video Background', 'video-background-pro'),
      'priority' => 25,
    );
    return $groups;
  }

  /**
   * Add fields to SiteOrigin Page Builder row
   *
   * @since 1.0.0
   * @access public
   * @param $fields array Setup fields for Video Background
   * @return array $fields Returns fields to SiteOrigin
   *
   * @uses __()
   */
  public function vidbgpro_SO_register_fields($fields) {
    $priority = 5;
    $group_name = 'vidbg_SO';

    $fields['vidbg_SO_type'] = array(
      'name'        => __('Video Background Type', 'video-background-pro'),
      'type'        => 'select',
      'description' => __( 'Please specify if you would like to self host your video background or use a YouTube video instead.', 'video-background-pro' ),
      'options'     => array(
        'self-host' => __( 'Self Host', 'video-background-pro' ),
        'youtube'   => __( 'YouTube', 'video-background-pro' ),
      ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_mp4'] = array(
      'name'        => __( 'Link to .mp4', 'video-background-pro' ),
      'type'        => 'url',
      'description' => __( 'Please specify the link to the .mp4 file.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_webm'] = array(
      'type'        => 'url',
      'name'        => __( 'Link to .webm', 'video-background-pro' ),
      'description' => __( 'Please specify the link to the .webm file.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_youtube_url'] = array(
      'type'        => 'text',
      'name'        => __( 'Link to YouTube video', 'video-background-pro' ),
      'description' => __( 'Please specify the link to the YouTube video.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_youtube_start'] = array(
      'type'        => 'text',
      'name'        => __( 'Youtube Start Second', 'video-background-pro' ),
      'description' => __( 'The second the YouTube video background starts on.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_youtube_end'] = array(
      'type'        => 'text',
      'name'        => __( 'Youtube End Second', 'video-background-pro' ),
      'description' => __( 'The second the YouTube video background ends on.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_poster'] = array(
      'type'        => 'image',
      'name'        => __( 'Fallback Image', 'video-background-pro' ),
      'description' => __( 'Please upload a fallback image.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_overlay'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'Enable Overlay?', 'video-background-pro' ),
      'description' => __( 'Add an overlay over the video. This is useful if your text isn\'t readable with a video background.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_overlay_color'] = array(
      'type'        => 'color',
      'name'        => __( 'Overlay Color', 'video-background-pro' ),
      'description' => __( 'If overlay is enabled, a color will be used for the overlay. You can specify the color here.', 'video-background-pro' ),
      'default'     => '#000',
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_overlay_alpha'] = array(
      'type'        => 'text',
      'name'        => __( 'Overlay Opacity', 'video-background-pro' ),
      'description' => __( 'Specify the opacity of the overlay. Accepts any value between 0.00-1.00 with 0 being completely transparent and 1 being completely invisible. Ex. 0.30', 'video-background-pro' ),
      'default'     => '0.3',
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_overlay_texture_url'] = array(
      'type'        => 'image',
      'name'        => __( 'Overlay Texture', 'video-background-pro' ),
      'description' => __( 'If you would like to display a custom pattern for an overlay, you can do so here.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_enable_loader'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'Enable Loader?', 'video-background-pro' ),
      'description' => __( 'CSS loader until the video plays. (Note: If disabled, YouTube video backgrounds may still show their native loaders.)', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_loader_bg_poster'] = array(
      'type' => 'checkbox',
      'name' => __( 'Loader Fallback Background?', 'video-background-pro' ),
      'description' => __( 'Make the background of the loader the fallback image if applicable.', 'video-background-pro' ),
      'group' => $group_name,
      'priority' => $priority++,
    );
    $fields['vidbg_SO_disable_loop'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'Disable Loop?', 'video-background-pro' ),
      'description' => __( 'Turn off the loop for Video Background. Once the video is complete, it will display the last frame of the video.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_end_fallback'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'End video on fallback image?', 'video-background-pro' ),
      'description' => __( 'If you would like your video to end on the fallback image, you can enable it here.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_frontend_play'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'Enable play/pause button on the frontend?', 'video-background-pro' ),
      'description' => __( 'By enabling this option, a play/pause button will show up in the bottom right hand corner of the video background.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_frontend_volume'] = array(
      'type'        => 'checkbox',
      'name'        => __( 'Eanble mute/unmute button on the frontend?', 'video-background-pro' ),
      'description' => __( 'By enabling this option, a mute/unmute button will show up in the bottom right hand corner of the video background.', 'video-background-pro' ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    $fields['vidbg_SO_frontend_position'] = array(
      'type'        => 'select',
      'name'        => __( 'Frontend Buttons Position', 'video-background-pro' ),
      'description' => __( 'Please select the position you would like your frontend buttons to be in. (If applicable)', 'video-background-pro' ),
      'options'     => array(
        'bottom-right' => __( 'Bottom Right', 'video-background-pro' ),
        'top-right'   => __( 'Top Right', 'video-background-pro' ),
        'bottom-left'   => __( 'Bottom Left', 'video-background-pro' ),
        'top-left'   => __( 'Top Left', 'video-background-pro' ),
      ),
      'group'       => $group_name,
      'priority'    => $priority++,
    );
    return $fields;
  }
}

$init_vidbgpro_for_siteorigin = new vidbgpro_SiteOrigin();

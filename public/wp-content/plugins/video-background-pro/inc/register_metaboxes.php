<?php
/**
 * Exit if accessed directly
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Video Background metabox and fields
 *
 * @since 1.0.0
 *
 * @uses new_cmb2_box()
 * @uses add_field()
 */
function vidbgpro_register_metabox() {

	$prefix = 'vidbg_metabox_field_';

	$vidbg_metabox = new_cmb2_box(
		array(
			'id'           => 'vidbgpro-metabox',
			'title'        => __( 'Video Background Pro', 'video-background-pro' ),
			'object_types' => vidbgpro_post_types(),
			'context'      => 'normal',
			'priority'     => vidbgpro_metabox_priority(),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name' => __( 'Container', 'video-background-pro' ),
			'desc' => __( 'Please specify the container you would like your video background to be in. <a href="https://pushlabs.co/docs/video-background-pro/#finding-your-container" target="_blank">Learn how to find your container.</a>', 'video-background-pro' ),
			'id'   => $prefix . 'container',
			'type' => 'text',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Video background type', 'video-background-pro' ),
			'desc'    => __( 'Please specify if you would like to self host your video background or use a youtube video.', 'video-background-pro' ),
			'id'      => $prefix . 'type',
			'type'    => 'select',
			'options' => array(
				'self-host' => __( 'Self Host', 'video-background-pro' ),
				'youtube'   => __( 'Youtube', 'video-background-pro' ),
				'vimeo'     => __( 'Vimeo', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Link to .mp4', 'video-background-pro' ),
			'desc'    => __( 'Please specify the link to the .mp4 file. You can either enter a URL or upload a file.', 'video-background-pro' ),
			'id'      => $prefix . 'mp4',
			'type'    => 'file',
			'options' => array(
				'add_upload_file_text' => __( 'Upload .mp4 file', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Link to .webm', 'video-background-pro' ),
			'desc'    => __( 'Please specify the link to the .webm file. You can either enter a URL or upload a file.', 'video-background-pro' ),
			'id'      => $prefix . 'webm',
			'type'    => 'file',
			'options' => array(
				'add_upload_file_text' => __( 'Upload .webm file', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name' => __( 'Link to Youtube video', 'video-background-pro' ),
			'desc' => __( 'Please add the link to the Youtube video.', 'video-background-pro' ),
			'id'   => $prefix . 'youtube_url',
			'type' => 'text_url',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name' => __( 'Youtube Start Second', 'video-background-pro' ),
			'desc' => __( 'The second the YouTube video background starts on.', 'video-background-pro' ),
			'id'   => $prefix . 'start_sec',
			'type' => 'text_small',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name' => __( 'Youtube End Second', 'video-background-pro' ),
			'desc' => __( 'The second the YouTube video background ends on.', 'video-background-pro' ),
			'id'   => $prefix . 'end_sec',
			'type' => 'text_small',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name' => __( 'Link to Vimeo Video', 'video-background-pro' ),
			'desc' => __( 'Please add the link to the Vimeo video.', 'video-background-pro' ),
			'id'   => $prefix . 'vimeo_url',
			'type' => 'text_url',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Link to fallback image', 'video-background-pro' ),
			'desc'    => __( 'Please specify a link to the fallback image. You can either enter a URL or upload a file.', 'video-background-pro' ),
			'id'      => $prefix . 'poster',
			'type'    => 'file',
			'options' => array(
				'add_upload_file_text' => __( 'Upload fallback image', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'       => __( 'Enable Overlay?', 'video-background-pro' ),
			'desc'       => __( 'Add an overlay over the video. This is useful if your text isn\'t readable with a video background.', 'video-background-pro' ),
			'id'         => $prefix . 'overlay',
			'type'       => 'radio_inline',
			'default'    => 'off',
			'options'    => array(
				'off' => __( 'No', 'video-background-pro' ),
				'on'  => __( 'Yes', 'video-background-pro' ),
			),
			'before_row' => '<div id="vidbg_advanced_options">',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Overlay Color', 'video-background-pro' ),
			'desc'    => __( 'If overlay is enabled, a color will be used for the overlay. You can specify the color here.', 'video-background-pro' ),
			'id'      => $prefix . 'overlay_color',
			'type'    => 'colorpicker',
			'default' => '#000',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Overlay Opacity', 'video-background-pro' ),
			'desc'    => __( 'Specify the opacity of the overlay with the left being mostly transparent and the right being hardly transparent.', 'video-background-pro' ),
			'id'      => $prefix . 'overlay_alpha',
			'type'    => 'vidbg_slider',
			'min'     => '10',
			'max'     => '99',
			'default' => '30',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Disable loop?', 'video-background-pro' ),
			'desc'    => __( 'Turn off the loop for Video Background. Once the video is complete, it will display the last frame of the video.', 'video-background-pro' ),
			'id'      => $prefix . 'no_loop',
			'type'    => 'radio_inline',
			'default' => 'off',
			'options' => array(
				'off' => __( 'No', 'video-background-pro' ),
				'on'  => __( 'Yes', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'End video on fallback image?', 'video-background-pro' ),
			'desc'    => __( 'If you would like your video to end on the fallback image, you can enable it here.', 'video-background-pro' ),
			'id'      => $prefix . 'end_poster',
			'type'    => 'radio_inline',
			'default' => 'off',
			'options' => array(
				'off' => __( 'No', 'video-background-pro' ),
				'on'  => __( 'Yes', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Enable Play/Pause button', 'video-background-pro' ),
			'desc'    => __( 'By enabling this option, a play/pause button will show up in the bottom right hand corner of the video background.', 'video-background-pro' ),
			'id'      => $prefix . 'frontend_play',
			'type'    => 'radio_inline',
			'default' => 'off',
			'options' => array(
				'off' => __( 'No', 'video-background-pro' ),
				'on'  => __( 'Yes', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'    => __( 'Enable Mute/Unmute button', 'video-background-pro' ),
			'desc'    => __( 'By enabling this option, a mute/unmute button will show up in the bottom right hand corner of the video background.', 'video-background-pro' ),
			'id'      => $prefix . 'frontend_mute',
			'type'    => 'radio_inline',
			'default' => 'off',
			'options' => array(
				'off' => __( 'No', 'video-background-pro' ),
				'on'  => __( 'Yes', 'video-background-pro' ),
			),
		)
	);

	$vidbg_metabox->add_field(
		array(
			'name'      => __( 'Frontend Buttons Position', 'video-background-pro' ),
			'desc'      => __( 'Please select the position you would like your frontend buttons to be in. (If applicable)', 'video-background-pro' ),
			'id'        => $prefix . 'frontend_buttons_position',
			'type'      => 'select',
			'default'   => 'bottom-right',
			'options'   => array(
				'top-right'    => __( 'Top Right', 'video-background-pro' ),
				'bottom-right' => __( 'Bottom Right', 'video-background-pro' ),
				'bottom-left'  => __( 'Bottom Left', 'video-background-pro' ),
				'top-left'     => __( 'Top Left', 'video-background-pro' ),
			),
			'after_row' => '</div>',
		)
	);

	$vidbg_metabox->add_field(
		array(
			'before_field' => '<a href="#vidbg_advanced_options" class="button vidbg-button advanced-options-button">Show Advanced options</a>',
			'type'         => 'title',
			'id'           => $prefix . 'advanced_button',
		)
	);
}
add_action( 'cmb2_admin_init', 'vidbgpro_register_metabox' );

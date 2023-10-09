<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB Heading',
	'base' => 'fs_mb_heading',
	'description' => 'Heading',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Icon',
			'description' => 'https://icons.getbootstrap.com/',
			'param_name' => 'fs_mb_heading_icon',
		),
		array(
			'type' => 'checkbox',
			'admin_label' => true,
			'heading' => 'Rounded corners?',
			'description' => 'Rounded corners',
			'param_name' => 'fs_mb_heading_rounded_corners',
			'value' => array('Yes' => 1)
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_heading_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_heading_subheading',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_heading_background_color',
		),		
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_heading', 'fs_mb_heading');
function fs_mb_heading($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_heading_icon' => '',
		'fs_mb_heading_rounded_corners' => '',
		'fs_mb_heading_heading' => '',
		'fs_mb_heading_subheading' => '',
		'fs_mb_heading_background_color' => '',
	), $atts));
	
	$html = '';
	
	if ($fs_mb_heading_background_color) {
		$html .= '
		<style>
		#fs_mb_heading {
			background-color: '.$fs_mb_heading_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
    <section class="'.($fs_mb_heading_rounded_corners ? '' : ' bg-light').' pt-5" id="mb-heading">
        <div class="container px-5'.($fs_mb_heading_rounded_corners ? '' : ' mt-5').'">
        	'.($fs_mb_heading_rounded_corners ? '<div class="bg-light rounded-3 py-5 px-4 px-md-5">' : '').'
            <div class="text-center">
            	'.($fs_mb_heading_icon ? '<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi '.$fs_mb_heading_icon.'"></i></div>' : '').'
                <h1 class="fw-bolder">'.$fs_mb_heading_heading.'</h1>
                <p class="lead fw-normal text-muted mb-0">'.$fs_mb_heading_subheading.'</p>
            </div>
            '.($fs_mb_heading_rounded_corners ? '</div>' : '').'
        </div>
    </section>

	';
	
	return $html;
}
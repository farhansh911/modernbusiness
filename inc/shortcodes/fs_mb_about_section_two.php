<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB About Section Two',
	'base' => 'fs_mb_about_section_two',
	'description' => 'Right Image. Left Text.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'attach_image',
			'admin_label' => true,
			'heading' => 'Right Image',
			'description' => 'Right Image',
			'param_name' => 'fs_mb_about_section_two_image',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_about_section_two_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_about_section_two_subheading',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_about_section_two_background_color',
		),		
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_about_section_two', 'fs_mb_about_section_two');
function fs_mb_about_section_two($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_about_section_two_image' => '',
		'fs_mb_about_section_two_heading' => '',
		'fs_mb_about_section_two_subheading' => '',
		'fs_mb_about_section_two_background_color' => '',
	), $atts));
	
	$html = '';
	
	if ($fs_mb_about_section_two_background_color) {
		$html .= '
		<style>
		#about-section-two {
			background-color: '.$fs_mb_about_section_two_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
	<!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5" id="about-section-two">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="'.wp_get_attachment_url($fs_mb_about_section_two_image).'" alt="..." /></div>
                    <div class="col-lg-6">
                            <h2 class="fw-bolder">'.$fs_mb_about_section_two_heading.'</h2>
                            <p class="lead fw-normal text-muted mb-0">'.$fs_mb_about_section_two_subheading.'</p>
                </div>
            </div>
        </div>
    </section>

	';
	
	return $html;
}
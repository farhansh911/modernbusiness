<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB CTA Section',
	'base' => 'fs_mb_cta_section',
	'description' => 'CTA Section.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_cta_section_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_cta_section_subheading',
		),
        array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Privacy Text',
			'description' => 'Privacy Text',
			'param_name' => 'fs_mb_cta_section_privacy_text',
		),
        array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Contact Form 7 ID',
			'description' => 'Enter Contact Form 7 ID',
			'param_name' => 'fs_mb_cta_section_cf_id',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_cta_section_background_color',
		),		
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_cta_section', 'fs_mb_cta_section');
function fs_mb_cta_section($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_cta_section_heading' => '',
		'fs_mb_cta_section_subheading' => '',
        'fs_mb_cta_section_privacy_text' => '',
        'fs_mb_cta_section_cf_id' => '',
		'fs_mb_cta_section_background_color' => '',
	), $atts));
	
	$html = '';
	
	if ($fs_mb_cta_section_background_color) {
		$html .= '
		<style>
		#mb-cta-section {
			background-color: '.$fs_mb_cta_section_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
    <section class="pb-5">
        <div class="container px-5 my-5">
	<aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5" id="mb-cta-section">
        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
            <div class="mb-4 mb-xl-0">
                <div class="fs-3 fw-bold text-white">'.$fs_mb_cta_section_heading.'</div>
                    <div class="text-white-50">'.$fs_mb_cta_section_subheading.'</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                        '.do_shortcode('[contact-form-7 id="'.$fs_mb_cta_section_cf_id.'"]').'
                </div>
                <div class="small text-white-50">'.$fs_mb_cta_section_privacy_text.'</div>
            </div>
        </div>
    </aside>
    </div>
    </section>
	';
	
	return $html;
}
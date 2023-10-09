<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB Testimonial Section',
	'base' => 'fs_mb_testimonial_section',
	'description' => 'Testimonials.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'attach_image',
			'admin_label' => true,
			'heading' => 'Image',
			'description' => 'Image',
			'param_name' => 'fs_mb_testimonial_section_image',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Testimonial',
			'description' => 'Testimonial',
			'param_name' => 'fs_mb_testimonial_section_testimonial',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Name',
			'description' => 'Name',
			'param_name' => 'fs_mb_testimonial_section_name',
		),
        array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Designation',
			'description' => 'NaDesignationme',
			'param_name' => 'fs_mb_testimonial_section_designation',
		),
        array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Copmany Name',
			'description' => 'Company Name',
			'param_name' => 'fs_mb_testimonial_section_company_name',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_testimonial_section_background_color',
		),		
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_testimonial_section', 'fs_mb_testimonial_section');
function fs_mb_testimonial_section($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_testimonial_section_image' => '',
		'fs_mb_testimonial_section_testimonial' => '',
		'fs_mb_testimonial_section_name' => '',
        'fs_mb_testimonial_section_designation' => '',
        'fs_mb_testimonial_section_company_name' => '',
		'fs_mb_testimonial_section_background_color' => '',
	), $atts));
	
	$html = '';
    $rand = mt_rand();
	
	if ($fs_mb_testimonial_section_background_color) {
		$html .= '
		<style>
		#mb-testimonial-section {
			background-color: '.$fs_mb_testimonial_section_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
	<div class="py-5 bg-light" id="mb_testimonial_section">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">'.$fs_mb_testimonial_section_testimonial.'</div>
                            <div class="d-flex align-items-center justify-content-center">
                            <img width="40" class="rounded-circle me-3" src="'.wp_get_attachment_url($fs_mb_testimonial_section_image).'" alt="..." />
                                <div class="fw-bold">
                                    '.$fs_mb_testimonial_section_name.'
                                <span class="fw-bold text-primary mx-1">/</span>
                                '.$fs_mb_testimonial_section_designation.', '.$fs_mb_testimonial_section_company_name.'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	';
	
	return $html;
}
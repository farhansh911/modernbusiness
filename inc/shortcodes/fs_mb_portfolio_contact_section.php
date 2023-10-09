<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB Portflio Contact Section',
	'base' => 'fs_mb_portfolio_contact_section',
	'description' => 'FS MB Portflio Contact Section.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_portfolio_contact_section_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_portfolio_contact_section_subheading',
		),
        array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Link',
			'description' => 'link',
			'param_name' => 'fs_mb_portfolio_contact_section_link',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_portfolio_contact_section_background_color',
		),		
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_portfolio_contact_section', 'fs_mb_portfolio_contact_section');
function fs_mb_portfolio_contact_section($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_portfolio_contact_section_heading' => '',
		'fs_mb_portfolio_contact_section_subheading' => '',
		'fs_mb_portfolio_contact_section_link' => '',
		'fs_mb_portfolio_contact_section_background_color' => '',
	), $atts));
	
	$html = '';
	
	if ($fs_mb_portfolio_contact_section_background_color) {
		$html .= '
		<style>
		#potfolio-contact-section {
			background-color: '.$fs_mb_portfolio_contact_section_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
    <section class="py-5 bg-light" id="potfolio-contact-section">
        <div class="container px-5 my-5">
            <h2 class="display-4 fw-bolder mb-4">'.$fs_mb_portfolio_contact_section_heading.'</h2>
            <a class="btn btn-lg btn-primary" href="'.$fs_mb_portfolio_contact_section_link.'">'.$fs_mb_portfolio_contact_section_subheading.'</a>
        </div>
    </section>
    
	';
	
	return $html;
}
<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB FEATURE SECTION',
	'base' => 'fs_mb_feature_section',
	'description' => 'Feature Section.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_feature_section_heading',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_feature_section_background_color',
		),
        array(
            'type' => 'param_group',
            'param_name' => 'features',
            'heading' => 'Features',
            'description' => 'Features',
            'params' => array(
                array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'title',
                  'description' => 'title',
                  'param_name' => 'fs_mb_feature_section_title',
              ),
              array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => 'Icon',
                'description' => 'https://icons.getbootstrap.com/',
                'param_name' => 'fs_mb_feature_section_icon',
            ),
              array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'Description',
                  'description' => 'Description',
                  'param_name' => 'fs_mb_feature_section_description',
              ),
              array(
                  'type' => 'attach_image',
                  'admin_label' => true,
                  'heading' => 'Image',
                  'description' => 'Image',
                  'param_name' => 'fs_mb_feature_section_image',
              ),
            )
      
      ),				
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_feature_section', 'fs_mb_feature_section');
function fs_mb_feature_section($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_feature_section_heading' => '',
		'fs_mb_feature_section_background_color' => '',
        'features' => '',
	), $atts));
	
	$html = '';
	
    $features = vc_param_group_parse_atts($atts['features']);

	if ($fs_mb_feature_section_background_color) {
		$html .= '
		<style>
		#features-section {
			background-color: '.$fs_mb_feature_section_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
    <section class="py-5" id="features_section">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">'.$fs_mb_feature_section_heading.'</h2></div>
            <div class="col-lg-8">
            <div class="row gx-5 row-cols-1 row-cols-md-2">

	';

	$counter = 0;
	foreach($features as $data) {	
						$counter++;	
						$html .='
						<div class="col'.($counter == count($features) ? '' : ($counter == count($features)-1 ? ' mb-md-0 mb-5' : ' mb-5')).' h-100">
            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi '.$data['fs_mb_feature_section_icon'].'"></i></div>
                <h2 class="h5">'.$data['fs_mb_feature_section_title'].'</h2>
                <p class="mb-0">'.$data['fs_mb_feature_section_description'].'</p>
        </div>
		  ';
}


	$html .= '
                </div>
			</div>
		</div>
    </div>
	</section>
	';
	return $html;
}
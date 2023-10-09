<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB Pricing',
	'base' => 'fs_mb_pricing',
	'description' => 'FS MB Pricing.',
	'category' => 'FS MB Elements',
	'params' => array(
        array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_pricing_background_color',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_pricing_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_pricing_subheading',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_pricing_background_color',
		),
        array(
            'type' => 'param_group',
            'param_name' => 'pricing_plans',
            'heading' => 'Pricing Plans',
            'description' => 'Pricing Plans',
            'params' => array(
                array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => 'Starred?',
					'description' => 'Starred',
					'param_name' => 'fs_mb_pricing_starred',
					'value' => array('No' => '0', 'Yes' => '1')
				),
                array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'Name',
                  'description' => 'Name',
                  'param_name' => 'fs_mb_pricing_name',
              ),
              array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'Price',
                  'description' => 'Price',
                  'param_name' => 'fs_mb_pricing_price',
              ),
              array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => 'Button Name',
                'description' => 'Button Name',
                'param_name' => 'fs_mb_pricing_button_name',
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => 'Button Link',
                'description' => 'Button Link',
                'param_name' => 'fs_mb_pricing_button_link',
            ),
            array(
                'type' => 'textarea_raw_html',
                'admin_label' => true,
                'heading' => 'Description',
                'description' => 'Each feature needs to be in a new line. Example: 1=Feature Name or 0=Feature Name. 1=Check. 0=Cross.',
                'param_name' => 'fs_mb_pricing_description',
            ),
            )
      
      ),				
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_pricing', 'fs_mb_pricing');
function fs_mb_pricing($atts, $content) {
	extract(shortcode_atts(array(	
        'fs_mb_pricing_background_color' => '',
        'pricing_plans' => '',
	), $atts));
	
	$html = '';
	
    $pricing_plans = vc_param_group_parse_atts($atts['pricing_plans']);

	if ($fs_mb_pricing_background_color) {
		$html .= '
		<style>
		#pricing_section {
			background-color: '.$fs_mb_pricing_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
	<section class="bg-light py-5" id="pricing_section">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">		

	';

	foreach($pricing_plans as $data) {
        $description = explode("\n", rawurldecode(base64_decode($data['fs_mb_pricing_description'])));		
        $html .='
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-5 mb-xl-0">
                <div class="card-body p-5">
                    <div class="small text-uppercase fw-bold '.($data['fs_mb_pricing_starred'] ? '' : ' text-muted').'">'.($data['fs_mb_pricing_starred'] ? '<i class="bi bi-star-fill text-warning"></i> ' : '').$data['fs_mb_pricing_name'].'</div>
                    <div class="mb-3">
                        <span class="display-4 fw-bold">'.$data['fs_mb_pricing_price'].'</span>
                        <span class="text-muted">/ mo.</span>
                    </div>
                    <ul class="list-unstyled mb-4">';
                    foreach ($description as $feature) {
                        $feature = explode('=', $feature);
                        $html .= '
                        <li class="mb-2'.($feature[0] ? '' : ' text-muted').'">
                            <i class="bi'.($feature[0] ? ' bi-check text-primary' : ' bi-x').'"></i>
                            '.$feature[1].'
                        </li>';
                    }                                
                    $html .= '    
                    </ul>
                    <div class="d-grid"><a class="btn '.($data['fs_mb_pricing_starred'] ? 'btn-primary' : 'btn-outline-primary').'" href="'.$data['fs_mb_pricing_button_link'].'">'.$data['fs_mb_pricing_button_name'].'</a></div>
                </div>
            </div>
        </div>
          ';
}

$html .= '
    </div>
</div>
</section>
';

return $html;
}
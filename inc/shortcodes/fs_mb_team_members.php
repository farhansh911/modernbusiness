<?php
// mb vc element
vc_map(array(
	'name' => 'FS MB Team Members',
	'base' => 'fs_mb_team_members',
	'description' => 'Team members.',
	'category' => 'FS MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'fs_mb_team_members_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'fs_mb_team_members_subheading',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'fs_mb_team_members_background_color',
		),
        array(
            'type' => 'param_group',
            'param_name' => 'members',
            'heading' => 'Team Members',
            'description' => 'Team Members',
            'params' => array(
                array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'Name',
                  'description' => 'Name',
                  'param_name' => 'fs_mb_team_members_name',
              ),
              array(
                  'type' => 'textfield',
                  'admin_label' => true,
                  'heading' => 'Designation',
                  'description' => 'Designation',
                  'param_name' => 'fs_mb_team_members_designation',
              ),
              array(
                  'type' => 'attach_image',
                  'admin_label' => true,
                  'heading' => 'Image',
                  'description' => 'Image',
                  'param_name' => 'fs_mb_team_members_image',
              ),
            )
      
      ),				
	)
));
	
// mb vc shortcode
add_shortcode('fs_mb_team_members', 'fs_mb_team_members');
function fs_mb_team_members($atts, $content) {
	extract(shortcode_atts(array(	
		'fs_mb_team_members_heading' => '',
		'fs_mb_team_members_subheading' => '',
		'fs_mb_team_members_background_color' => '',
        'members' => '',
	), $atts));
	
	$html = '';
	
    $members = vc_param_group_parse_atts($atts['members']);

	if ($fs_mb_team_members_background_color) {
		$html .= '
		<style>
		#team-members {
			background-color: '.$fs_mb_team_members_background_color.' !important;
		}
		</style>
		';
	}

	$html .= '
	<section class="py-5 bg-light" id="team-members">
	<div class="container px-5 my-5">
		<div class="text-center">
			<h2 class="fw-bolder">'.$fs_mb_team_members_heading.'</h2>
			<p class="lead fw-normal text-muted mb-5">'.$fs_mb_team_members_subheading.'</p>
		</div>
		<div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">		

	';

	foreach($members as $data) {		
		$html .='
		<div class="col mb-5 mb-5 mb-xl-0">
            <div class="text-center">
                <img class="img-fluid rounded-circle mb-4 px-4" src="'.wp_get_attachment_url($data['fs_mb_team_members_image']).'" alt="..." />
                    <h5 class="fw-bolder">'.$data['fs_mb_team_members_name'].'</h5>
                    <div class="fst-italic text-muted">'.$data['fs_mb_team_members_designation'].'</div>
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
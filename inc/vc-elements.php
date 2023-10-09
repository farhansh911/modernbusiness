<?php
add_action('vc_before_init', 'fs_mb_vc_elements');
function fs_mb_vc_elements() {
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_about_section_one.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_about_section_two.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_team_members.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_heading.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_pricing.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_contact_cards.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_contact_form.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_faq_section.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_features_section.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_testimonial_section.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_cta_section.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_blog_section.php');
    require_once(dirname(__FILE__).'/shortcodes/fs_mb_portfolio_contact_section.php');
}

<?php 
function optionsframework_option_name() {
	return 'LotusDeveloper';
}
function optionsframework_options() {
    $options_categories = array();
	$options_categories_obj = get_categories(array('hide_empty' => 0));
	$options_categories[] = 'Select a Category:';
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
    
    $options_pages = array();
	$options_pages_obj = get_posts('posts_per_page=-1');
	$options_pages[''] = 'Select a Post:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

    $options_page = array();
    $options_page_obj = get_pages('posts_per_page=-1');
    $options_page[''] = 'Select a Page:';
    foreach ($options_page_obj as $page) {
        $options_page[$page->ID] = $page->post_title;
    }
    
    $theme = wp_get_theme();

/** ************************************************ Basic Setting Section ********************************************************/
    $options[] = array(
        'name'=> __('Basic Setting', 'LotusDeveloper'),
        'type'=> 'heading');
    
    $options[] = array(
        'name'=> __('Upload Favicon', 'LotusDeveloper'),
        'id'=>'favicon',
        'std'=>'',
        'class'=>'sub-option',
        'type'=>'upload');        
    
    $options[] = array(
        'name'=>'Upload Logo', 'LotusDeveloper',
        'id'=>'logo',
        'std'=>'',
        'desc' => __('Size of logo should be 250px 70px','LotusDeveloper'),
        'class'=>'sub-option',
        'type'=>'upload');
    
/** -----------------------------------------------------------Basic Seccting Section Ends here-----------------------------------------------**/
 
/** -----------------------------------------------------Home Setting Section Start Here --------------------------------------------**/
    $options[] = array(
        'name'=>__('Home Page Setting', 'LotusDeveloper'),
        'type'=>'heading');

	$options[] = array(
		'name'=>__('language Section', 'LotusDeveloper'),
		'type'=>'header');
    
		$options[] = array(
			'name'=>__('language Section', 'LotusDeveloper'),
			'id'=>'language_display',
			'desc'=>'Click here to Enable or Disable language Section',
			'std'=>'0',
			'type'=>'switch',
			'on'=>'Enable',
			'off'=>'Disable'); 
        
		$options[] = array(
			'name'=>__('Farsi language', 'LotusDeveloper'),
			'id'=>'farsi_language',
			'type'=>'url');
			
		$options[] = array(
			'name'=>__('English language', 'LotusDeveloper'),
			'id'=>'english_language',
			'type'=>'url');
			
		$options[] = array(
			'name'=>__('Arabic language', 'LotusDeveloper'),
			'id'=>'arabic_language',
			'type'=>'url');
			
	$options[] = array(
		'name'=>__('basket Section', 'LotusDeveloper'),
		'type'=>'header');
    
		$options[] = array(
			'name'=>__('Enable basket Section', 'LotusDeveloper'),
			'id'=>'basket_display',
			'desc'=>'Click here to enable',
			'std'=>'0',
			'type'=>'switch',
			'on'=>'Enable',
			'off'=>'Disable');
			
	$options[] = array(
		'name'=>__('cooperation request Section', 'LotusDeveloper'),
		'type'=>'header');
    
		$options[] = array(
			'name'=>__('Enable cooperation request Section', 'LotusDeveloper'),
			'id'=>'cooperation_request_display',
			'desc'=>'Click here to enable',
			'std'=>'0',
			'type'=>'switch',
			'on'=>'Enable',
			'off'=>'Disable');
			
		$options[] = array(
			'name'=>__('Select the page to show cooperation request Section', 'accesspress-staple'),
			'id'=>'cooperation_request',
			'type'=>'url');

    $options[] = array(
        'type'=>'div',
        'id'=>'div1');
    $options[] = array(
        'type'=>'div',
        'id'=>'div2');       
/** ------------------------------------------------------Home Setting Section Ends Here --------------------------------------- **/


/** ------------------------------------------------------contact us Start Here --------------------------------------- **/
    $options[] = array(
        'name'=>__('contact us Setting', 'LotusDeveloper'),
        'type'=>'heading');
		
	$options[] = array(
        'name'=>__('address','LotusDeveloper'),
        'id'=>'footer_address',
        'std'=>'',
        'type'=>'text');
		
	$options[] = array(
        'name'=>__('telephone number','LotusDeveloper'),
        'id'=>'footer_tel',
        'std'=>'',
        'type'=>'text');
		
	$options[] = array(
        'name'=>__('email address','LotusDeveloper'),
        'id'=>'footer_mail',
        'std'=>'',
        'type'=>'text');
		
	$options[] = array(
        'name'=>__('map sensor','LotusDeveloper'),
        'id'=>'map_sensor',
        'type'=>'text');
		
	$options[] = array(
        'name'=>__('map position','LotusDeveloper'),
        'id'=>'map_position',
        'type'=>'text');
		
	$options[] = array(
		'name'=>__('Farsi language', 'LotusDeveloper'),
		'id'=>'farsi_language',
		'type'=>'url');
			
	$options[] = array(
		'name'=>__('English language', 'LotusDeveloper'),
		'id'=>'english_language',
		'type'=>'url');
		
	$options[] = array(
		'name'=>__('footer about', 'LotusDeveloper'),
		'id'=>'footer_about',
		'type'=>'textarea');
        
/** -------------------------------------------- contact us ends here ------------------------------------------------- */

/** ------------------------------------------------------Social Links Start Here --------------------------------------- **/
    $options[] = array(
        'name'=>__('Social Setting', 'LotusDeveloper'),
        'type'=>'heading');
    
    $options[] = array(
        'name'=>__('Will display social icons ?', 'LotusDeveloper'),
        'id'=>'social_display',
        'std'=>'0',
        'type'=>'switch',
        'on'=>'Enable',
        'off'=>'Disable');
    
    $options[] = array(
        'name'=>__('Facebook', 'LotusDeveloper'),
        'id'=>'facebook',
        'type'=>'url');
    
    $options[] = array(
        'name'=>__('Telegram', 'LotusDeveloper'),
        'id'=>'telegram',
        'type'=>'url');
		
	$options[] = array(
        'name'=>__('Google Plus', 'LotusDeveloper'),
        'id'=>'google',
        'type'=>'url');
		
	$options[] = array(
        'name'=>__('Twitter', 'LotusDeveloper'),
        'id'=>'twitter',
        'type'=>'url');
    
    $options[] = array(
        'name'=>__('Linkedin', 'LotusDeveloper'),
        'id'=>'linkedin',
        'type'=>'url');
        
    $options[] = array(
        'name'=>__('Instagram', 'LotusDeveloper'),
        'id'=>'instagram',
        'type'=>'url');
        
/** -------------------------------------------- Social Setting ends here ------------------------------------------------- */

  return $options;
}
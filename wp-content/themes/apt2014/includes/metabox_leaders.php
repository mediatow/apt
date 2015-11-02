<?php

function add_leaders_metaboxes(){
	add_meta_box('leaders-meta-box', 'Options', 'leaders_show_box', 'leaders', 'normal', 'default');
}

function add_companies_metaboxes(){
	add_meta_box('companies-meta-box', 'Content', 'companies_show_box', 'companies', 'normal', 'default');
}

function leaders_show_box() {
	global $post;	
	echo '<input type="hidden" name="leaders_meta_box_nonce" value="'. wp_create_nonce('leaders') . '" />';
	echo '<div class="fl" style="width: 24%; margin-right: 1%; height: 42px;"><label for="address">Title</label><br/>';
	echo '<input type="text" name="_title" id="_title" value="'. get_post_meta($post->ID, '_title', true) .'" style="width: 100%;" /></div>';

	echo '<div style="clear: both; height: 0;"></div>';

}

function companies_show_box() {
	global $post;	
	echo '<input type="hidden" name="companies_meta_box_nonce" value="'. wp_create_nonce('companies') . '" />';
	echo '<div class="fl" style="width: 100%; margin-right: 0; height: 42px;"><label for="address">Highlights Title</label><br/>';
	echo '<input type="text" name="_title_highlights" id="_title_highlights" value="'. get_post_meta($post->ID, '_title_highlights', true) .'" style="width: 100%;" /></div>';

	echo '<div style="clear: both; height: 0;"></div>';
	?>
		<div class="fl" style="width: 100%; margin-top: 15px; ">
			<label for="address">Highlights</label><br/>
			<textarea name="_highlights" id="_highlights" style="width: 100%; height: 90px"><?php echo get_post_meta($post->ID, '_highlights', true) ?></textarea>
		</div>
		<div class="fl" style="width: 100%; margin-right: 0; overflow: visible; margin-top: 15px;">
			<label for="address">External Link to Site</label><br/>
			<input type="text" name="_url" id="_url" value="<?php echo get_post_meta($post->ID, '_url', true) ?>" style="width: 100%;" />
		</div>

	<?php

	

}

// Save Leaders data from meta box
add_action('save_post', 'leaders_save_data');
function leaders_save_data($post_id) {
	global $meta_box;
	
	
	if (!wp_verify_nonce($_POST['leaders_meta_box_nonce'], 'leaders')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	

	if ('leaders' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// Fields
	$fields = array('_title');
	
	foreach($fields as $field){
		$old = get_post_meta($post_id, $field, true);
		$new = $_POST[$field];
		if ($new != $old) {
			update_post_meta($post_id, $field, $new);
		}
	}

}


// Save Company data from meta box
add_action('save_post', 'companies_save_data');
function companies_save_data($post_id) {
	global $meta_box;
	
	
	if (!wp_verify_nonce($_POST['companies_meta_box_nonce'], 'companies')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	

	if ('companies' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// Fields
	$fields = array('_title_highlights', '_highlights', '_url');
	
	foreach($fields as $field){
		$old = get_post_meta($post_id, $field, true);
		$new = $_POST[$field];
		if ($new != $old) {
			update_post_meta($post_id, $field, $new);
		}
	}

}



//Customize WordPress BackEnd labels

function ah_featured_image_metabox($translation, $text, $domain) {
	global $post;
	$translations = get_translations_for_domain( $domain);
	switch( $post->post_type ){
		case 'companies':
			if ( $text == 'Featured Image')
	            return $translations->translate( 'Company Logo' );
			if ( $text == 'Publish')
	            return $translations->translate( 'Publish Company' );
			break;
		case 'leaders':
			if ( $text == 'Featured Image')
	            return $translations->translate( 'Leader Photo' );
			if ( $text == 'Publish')
	            return $translations->translate( 'Publish Leader' );
			break;
	}
	if ( $text == 'Set featured image')
		return $translations->translate( 'Select an image' );
 
	return $translation;
}
add_filter('gettext', 'ah_featured_image_metabox', 10, 4);
ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Office Name');
	}

	if ($('#field_2_image_fID-fm-value').val() == '' || $('#field_2_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Image');
	}

	if ($('input[name=field_4_link_url]').val() == '') {
		ccm_addError('Missing required URL: Email to');
	}


	return false;
}

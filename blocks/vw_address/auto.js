ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Centre');
	}

	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Phone');
	}

	if ($('#field_3_textbox_text').val() == '') {
		ccm_addError('Missing required text: Email');
	}

	if ($('#field_4_textarea_text').val() == '') {
		ccm_addError('Missing required text: Address');
	}

	if ($('#field_5_image_fID-fm-value').val() == '' || $('#field_5_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Icon');
	}

	if ($('input[name=field_6_link_url]').val() == '') {
		ccm_addError('Missing required URL: URL');
	}


	return false;
}

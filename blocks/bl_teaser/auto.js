ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Title');
	}

	if ($('#field_2_image_fID-fm-value').val() == '' || $('#field_2_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Image');
	}

	if ($('#field_3_textbox_text').val() == '') {
		ccm_addError('Missing required text: Teaser');
	}

	if ($('input[name=field_4_link_cID]').val() == '' || $('input[name=field_4_link_cID]').val() == 0) {
		ccm_addError('Missing required link: Page Link');
	}


	return false;
}

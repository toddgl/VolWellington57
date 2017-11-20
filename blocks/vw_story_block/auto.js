ccmValidateBlockForm = function() {
	
	if ($('#field_2_image_fID-fm-value').val() == '' || $('#field_2_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Story Image');
	}

	if ($('#field_3_textarea_text').val() == '') {
		ccm_addError('Missing required text: Story snippet');
	}


	return false;
}

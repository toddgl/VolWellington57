ccmValidateBlockForm = function() {
	
	if ($('#field_1_image_fID-fm-value').val() == '' || $('#field_1_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Image');
	}

	if ($('#field_2_textarea_text').val() == '') {
		ccm_addError('Missing required text: Text');
	}


	return false;
}

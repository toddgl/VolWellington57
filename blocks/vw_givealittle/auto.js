ccmValidateBlockForm = function() {
	
	if ($('#field_1_image_fID-fm-value').val() == '' || $('#field_1_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: GiveALittle Image');
	}

	if ($('input[name=field_3_link_url]').val() == '') {
		ccm_addError('Missing required URL: Link');
	}


	return false;
}

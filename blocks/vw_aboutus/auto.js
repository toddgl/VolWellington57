ccmValidateBlockForm = function() {
	
	if ($('#field_1_textarea_text').val() == '') {
		ccm_addError('Missing required text: Title');
	}

	if ($('input[name=field_4_link_cID]').val() == '' || $('input[name=field_4_link_cID]').val() == 0) {
		ccm_addError('Missing required link: Page Link');
	}


	return false;
}

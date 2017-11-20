ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Link URL');
	}

	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Search Subject');
	}

	if ($('#field_3_textarea_text').val() == '') {
		ccm_addError('Missing required text: Teaser Satement');
	}

	if ($('#field_4_textbox_text').val() == '') {
		ccm_addError('Missing required text: Rollover Prompt');
	}


	return false;
}

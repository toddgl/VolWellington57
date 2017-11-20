ccmValidateBlockForm = function() {
	
	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Day of the week');
	}

	if ($('#field_3_textbox_text').val() == '') {
		ccm_addError('Missing required text: Month');
	}

	if ($('#field_4_textbox_text').val() == '') {
		ccm_addError('Missing required text: Date (e.g. 31)');
	}

	if ($('#field_5_textbox_text').val() == '') {
		ccm_addError('Missing required text: Title');
	}

	if ($('#field_6_textarea_text').val() == '') {
		ccm_addError('Missing required text: Short description');
	}


	return false;
}

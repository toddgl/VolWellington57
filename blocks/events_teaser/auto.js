ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Event Date 1');
	}

	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Event Title 1');
	}

	if ($('#field_3_textbox_text').val() == '') {
		ccm_addError('Missing required text: Event Teaser 1');
	}

	if ($('input[name=field_4_link_cID]').val() == '' || $('input[name=field_4_link_cID]').val() == 0) {
		ccm_addError('Missing required link: Event Link 1');
	}


	return false;
}

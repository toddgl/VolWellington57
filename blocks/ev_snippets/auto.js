ccmValidateBlockForm = function() {
	
	if ($('#field_1_textarea_text').val() == '') {
		ccm_addError('Missing required text: Title');
	}

	if ($('#field_3_textarea_text').val() == '') {
		ccm_addError('Missing required text: Snippet');
	}


	return false;
}

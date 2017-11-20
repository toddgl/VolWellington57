ccmValidateBlockForm = function() {
	
	if ($('input[name=field_1_link_cID]').val() == '' || $('input[name=field_1_link_cID]').val() == 0) {
		ccm_addError('Missing required link: Link Page');
	}


	return false;
}

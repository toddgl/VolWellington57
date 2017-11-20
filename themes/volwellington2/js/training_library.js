/* Javascript for vw_training single page */

	window.onload = function() {

		$('#feeRadioBtns').on('click', function(e) {
			calcTotalCost()
		});

		$('#inputnum').on('change', function(e) {
			calcTotalCost()
		});
	};
	var id;

	$(document).ready(function() {
			$('#wkspModal').on('hidden.bs.modal', function () {
   			$('#wkspModal').removeData('bs.modal');
   			$('#wkspModal').find('.modal-content').empty;
		});
			$('#dialogModal').on('hidden.bs.modal', function () {
				$('#dialogModal').removeData('bs.modal');
				$('dialogModal').find('.modal-content').empty;
		});
			$('#dialogSuccessModal').on('show.bs.modal', function(e) {
				$('#dialog-title').html('Registration Success');
				$('#dialog-message').html('You registration request has been submitted');
		});
			$('#dialogFailureModal').on('show.bs.modal', function(e) {
				$('#dialog-title').html('Registration Failure');
				$('#dialog-message').html('Oh this is embarrasing, something has gone wrong please try again');
		});
  	$('#wkspModal').on('show.bs.modal', function(e) {
			// Remove radio checkbox children
			var myNode = document.getElementById("feeRadioBtns");
			while (myNode.firstChild) {
    		myNode.removeChild(myNode.firstChild);
			};
    	id = $(e.relatedTarget).data('id');
    	// alert(id);
	 		$.ajaxSetup ({
    	// Disable caching of AJAX responses
     		cache: false
	 		});
    	$.ajax({
    		type: 'POST',
   			url: "<?=$view->action('getDetail')?>",
   			datatype: 'json',
   			data: ({ key: id}),
      	cache: false,
			}).done(function(data, textStatus, jqXHR){
 				var result = $.parseJSON(data);
				var linebreak = document.createElement('br');
 				//alert(data);
				$('.modal-title').html(result['wksp']);
				$('#description').html(result['bodytxt1'] + ' ' + result['bodytxt2'] + ' ' + result['bodytxt3'] + ' ' + result['bodytxt4'] + ' ' + result['bodytxt5']);
      	$('#where').html(result['where1'] + ' ' + result['where2'] + ' ' + result['where3'] + ' ' + result['city']);
				$('#when').html(result['when'] + ' - ' + result['wktime']);
				$('#food').html(result['food']);
				$('#cost1').html(result['wlab1'] + ' - ' + result['fees1']);
				var cost1Btn = makeRadioButton("radio_1","costRadios",result['fees1'],result['wlab1']);
				feeRadioBtns.appendChild(cost1Btn);
				$("#radio_1").attr('checked', 'checked');
				if (result['wlab2'].length === 0) {
					// pass
				}
       	else {
					// List the Price
					$('#cost2').html(result['wlab2'] + ' - ' + result['fee2']);
					// Create the radio button
					var cost2Btn = makeRadioButton("radio_2","costRadios",result['fee2'],result['wlab2']);
					feeRadioBtns.appendChild(linebreak);
					feeRadioBtns.appendChild(cost2Btn);
				}
				if (result['wlab3'].length === 0) {
					// pass
				}
       	else {
					// List the Price
					$('#cost3').html(result['wlab3'] + ' - ' + result['fees3']);
					// Create the radio button
					var cost3Btn = makeRadioButton("radio_3","costRadios",result['fees3'],result['wlab3']);
					feeRadioBtns.appendChild(linebreak);
					feeRadioBtns.appendChild(cost3Btn);
				}
				if (result['wlab4'].length === 0) {
					// pass
				}
       	else {
					// List the Price
					$('#cost4').html(result['wlab4'] + ' - ' + result['fees4']);
					// Create the radio button
					var cost4Btn = makeRadioButton("radio_4","costRadios",result['fees4'],result['wlab4']);
					feeRadioBtns.appendChild(linebreak);
					feeRadioBtns.appendChild(cost4Btn);
				}
				if (result['wlab5'].length === 0) {
					// pass
				}
       	else {
					// List the Price
					$('#cost5').html(result['wlab5'] + ' - ' + result['fees5']);
					// Create the radio button
					var cost5Btn = makeRadioButton("radio_5","costRadios",result['fees5'],result['wlab5']);
					feeRadioBtns.appendChild(linebreak);
					feeRadioBtns.appendChild(cost5Btn);
				}
				if (result['wlab6'].length === 0) {
					// pass
				}
       	else {
					// List the Price
					$('#cost6').html(result['wlab6'] + ' - ' + result['fees6']);
					// Create the radio button
					var cost6Btn = makeRadioButton("radio_6","costRadios",result['fees6'],result['wlab6']);
					feeRadioBtns.appendChild(linebreak);
					feeRadioBtns.appendChild(cost6Btn);
				}
				$('#facilitator').html(result['bodytxt6']);
			}).fail(function(jqXHR, textStatus, errorThrown){
				alert("error");
			});
  });
});

function calcTotalCost() {
	var rateAmount = parseFloat((document.querySelector('input[name = "costRadios"]:checked').value).replace('$',''));
	var attendNumber = parseFloat($('#inputnum').val());
	var totalCost = (rateAmount * attendNumber);
	$('#inputamount').val('$' + parseFloat(totalCost, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
	//alert('inputName= '+ radioName.replace('$','') + 'number of attendees: ' + attendNumber);
};

function makeRadioButton(id, name, value, text) {

		var label = document.createElement("label");
		var radio = document.createElement("input");
		radio.type = "radio";
		radio.id = id;
		radio.name = name;
		radio.value = value;

		label.appendChild(radio);

		label.appendChild(document.createTextNode(text));
		return label;
};

function sendwkspRegister() {
	var valid;
	valid = validateForm();
	if(valid) {
		var jsonData = [];
		var volContact ={};
		volContact.wid = id;
		volContact.num = $("#inputnum").val();
		volContact.attd1 = $("#inputattendee1").val();
		volContact.attd2 = $("#inputattendee2").val();
		volContact.attd3 = $("#inputattendee3").val();
		volContact.attd4 = $("#inputattendee4").val();
		volContact.attd5 = $("#inputattendee5").val();
		volContact.org = $("#inputorg").val();
		volContact.tel = $("#inputtel").val();
		volContact.email = $("#inputemail").val();
		volContact.amount = $("#inputamount").val();
		if (radio_1.checked == true) {
			volContact.mem = "Yes";
		} else {
			volContact.mem = "No";
		}
		if (ibPayment.checked == true) {
			volContact.ib = 1;
		} else {
			volContact.ib = 0;
		}
		if (chkPayment.checked == true) {
			volContact.cheq = 1;
		} else {
			volContact.cheq = 0;
		}
		if (invPayment.checked == true) {
			volContact.inv = 1;
		} else {
			volContact.inv = 0;
		}
		volContact.redate = new Date().toISOString().slice(0,10);
		//volContact.redate = new Date();
		jsonData.push({volContact: volContact});
		// alert (JSON.stringify(jsonData));
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('regWorkshop')?>",
			datatype: 'json',
			data: {regData: JSON.stringify(jsonData)},
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			//var result = $.parseJSON(data);
			//alert(textStatus);
			$('#wkspModal').modal('hide');
			$('#dialogSuccessModal').modal('show');

		}).fail(function(jqXHR, textStatus, errorThrown){
			// alert(errorThrown);
			$('#wkspModal').modal('hide');
			$('#dialogFailureModal').modal('show');
		});
	};
};

function validateForm() {
	var valid = true;
	$("#wkspModal input[required=true], #wkspModal textarea[required=true], #wkspModal select[required=true]").each(function() {
		$(this).removeClass('invalid');
		$(this).attr('title','');
		if(!$(this).val()){
			$(this).addClass('invalid');
			$(this).attr('title','This field is required');
			valid = false;
		}
		if($(this).attr("type")=="email"  && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
			$(this).removeClass('invalid');
			$(this).attr('title','This field is required');
			valid = false;
		}
	});
	return valid;
}

$(function() {
	$( document ).tooltip({
		position: {my: "left top", at: "right top"},
		items: "input[required=true], textarea[required=true], select[required=true]",
		content: function() {return $(this).attr( "title" );}
	});
});

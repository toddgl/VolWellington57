<?php
defined('C5_EXECUTE') or die('Access Denied.')
?>
<script src="https://cdn.ravenjs.com/3.20.1/raven.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
	Raven.config('https://606f3fd66dd04223a83abba161de7248@sentry.io/247542').install()

	var prefix = "roleShortlist-";  // Set localStorage key prefix
	var maxItems = 10;  //Set LocalStorage shortlist limit

	$(document).ready(function() {
			$('#myModal').on('hidden.bs.modal', function () {
   			$('#myModal').removeData('bs.modal');
   			$('#myModal').find('.modal-content').empty;
			});

  	$('#myModal').on('show.bs.modal', function(e) {
    	var id = $(e.relatedTarget).data('id');
    	//alert(id);
    	$(this).find('.modal-title').text('Role detail for Job ID: ' + id);
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
 				// alert(data);
				if (result['descrip'] === undefined) {
					// pass
       	}
       	else {
					$('#tdescrip').html('Role Description:  ');
       		$('#descrip').html(result['descrip']);
       	}
 		 		if (result['skills'] === undefined) {
					// pass
       	}
       	else {
					$('#tskills').html('Special skills required:  ');
       		$('#skills').html(result['skills']);
       	}
       	if (result['personality'] === undefined) {
				// pass
       	}
       	else {
					$('#tpersonality').html('Expected personality:  ');
       		$('#personality').html(result['personality']);
     	 	}
       	if (result['dayshours'] === undefined) {
					// pass
       	}
       	else {
					$('#tdayshours').html('Days, Hours for role:  ');
					$('#dayshours').html(result['dayshours']);
       	}
       	if (result['training'] === undefined) {
					// pass
       	}
       	else {
					$('#ttraining').html('Training provided:  ');
					$('#training').html(result['training']);
       	}
       	if ((result['eveonly'] == 0 ) || (result['eveonly'] === undefined)) {
					// clear modal data
					$('#teveonly').html('');
					$('#eveonly').html('');
       	}
       	else {
					$('#teveonly').html('Specific Arrangements:');
					$('#eveonly').html('This role is Evenings Only');
       	}
       	if ((result['reimbursement'] == 0 ) || (result['reimbursement'] === undefined)) {
					$('#treimbursement').html('Reimbursements:');
					$('#reimbursement').html('No');
       	}
       	else {
					$('#treimbursement').html('Reimbursements   :');
					$('#reimbursement').html('Yes');
       	}
       	if ((result['policeck'] == 0 ) || (result['policeck'] === undefined)) {
					// pass
					$('#tpolice').html('');
					$('#police').html('');
       	}
       	else {
					$('#tpolice').html('Please Note:  ');
					$('#police').html('The Organisation has stipulated that this role will require a Police Check');
       	}
			}).fail(function(jqXHR, textStatus, errorThrown){
   			if (textStatus === 'parsererror') {
      		alert('Requested JSON parse failed.');
   			} else if (textStatus === 'timeout') {
      		alert('Time out error.');
   			} else if (textStatus === 'abort') {
      		alert('Ajax request aborted.');
   			} else if (jqXHR.status === 0) {
      		alert('Not connected.\n Verify Network.');
   			} else if (jqXHR.status == 404) {
      		alert('Requested controller page not found. [404]');
   			} else if (jqXHR.status == 500) {
      		alert('Internal Server Error [500].');
   			} else {
      		alert('Uncaught Error.\n' + jqXHR.responseText);
   		}
		});
	});
});

	$(window).on ('load', function() {
		RewriteFromStorage();
	});


	function addmyJobFunction(id, title){
		// Test to ensure that online registration is allowed
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getIsNotOnline')?>",
			datatype: 'json',
			data: ({ key: id}),
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			//alert(result["success"]);
			if (result["success"] == 'true') {
				$('#noOnlineRegistrationModal').modal('show');
			}
			else {
				// add job to storage
				//console.log("start log");
				//alert(localStorage.length-1);
				if (localStorage.length <=maxItems) {
					//localStorage.setItem(prefix + id, title);      //******* setItem()
		    	localStorage[prefix+id] = title;  // This also works instead of using setItem
					//console.log("inside addmyJob Click function job id: " + id + "added.");
		    	RewriteFromStorage();
				}
				else {
					$('#maxShortlist').modal('show');
				}
			}
		}).fail(function(jqXHR, textStatus, errorThrown) {
		alert("error");
		});
	};

	function RewriteFromStorage() {
    $("#cont_shortlist").empty();
    for(var i = 0; i < localStorage.length; i++)    //******* length
    {
        var key = localStorage.key(i);              //******* key()
        if(key.indexOf(prefix) == 0) {
            var value = localStorage.getItem(key);  //******* getItem()
            //var value = localStorage[key]; also works
            var shortkey = key.replace(prefix, "");
            $("#cont_shortlist").append(
                $("<li class='shortlist'>").html(shortkey + " - " + value)
                   .append($("<input type='reset' value=' X '></li>")
                           .attr('key', key)
                           .click(function() {      //****** removeItem()
                                localStorage.removeItem($(this).attr('key'));
																console.log("Job id: " + $(this).attr('key') + " removed from local storage")
                                RewriteFromStorage();
                            })
                          )
            );
        }
    }
	}

	RewriteFromStorage();

	function sendJobRegister() {
		var valid;
		valid = validateForm();
		if(valid) {
			var jsonData = [];
			var volContact = {}
			var volContact ={};
			volContact.fname = $("#inputFirstName").val();
			volContact.lname = $("#inputLastName").val();
			volContact.suburb = $("#inputSuburb").val();
			volContact.city = $("#cityList").val();
			volContact.phone = $("#inputPhone").val();
			volContact.evetel = $("#inputEveningTel").val();
			volContact.mobile = $("#inputMobile").val();
			volContact.email = $("#inputEmail").val();
			volContact.gender = $("#genderList").val();
			volContact.ageband = $("#ageBand").val();
			volContact.ethnicity = $("#ethnicityList").val();
			volContact.migrant = $("#migrantStatusList").val();
			volContact.refugee = $("#refugeeStatusList").val();
			volContact.heard = $("#heardList").val();
			volContact.labour = $("#workStatusList").val();
			volContact.reason = $("#volReasonList").val();
			volContact.office = $("#volWelOfficeList").val();
			if ($("#volEmergList").is(":checked")) {
				volContact.emvol = 1;
			} else {
				volContact.emvol = 0;
			}
			jsonData.push({volContact: volContact});
			for(var i = 0; i < localStorage.length; i++)    //******* length
	    {
					var item = {};
					var key = localStorage.key(i);              //******* key()
	        if(key.indexOf(prefix) == 0) {
						var value = localStorage.getItem(key);  //******* getItem()
						var shortkey = key.replace(prefix, "");
						item.id = shortkey;
						jsonData.push({item: item});
						}
			}
			//alert (JSON.stringify(jsonData));
			$.ajax({
    		type: 'POST',
   			url: "<?=$view->action('jobRegister')?>",
   			datatype: 'json',
   			//data: {jobData: jsonData},
				data: {jobData: JSON.stringify(jsonData)},
      	cache: false,
			}).done(function(data, textStatus, jqXHR){
 				//alert (data);
				clearShortlist();
				$('#JobRegisterModal').modal('hide');
				$('#dialogSuccessModal').modal('show');

			}).fail(function(jqXHR, textStatus, errorThrown){
				// alert(errorThrown);
				$('#JobRegisterModal').modal('hide');
				$('#dialogFailureModal').modal('show');
			});
			} else {
			$('#dialogMissingItemsModal').modal('show');
			};
	};

	function clearShortlist() {
		var i = localStorage.length;
		while(i--) {
  		var key = localStorage.key(i);
			if(key.indexOf(prefix) == 0) {
				// only remove localstorage items that hve the prefix in the key
    		localStorage.removeItem(key);
  		}
		}
		RewriteFromStorage();
	}

	function validateForm() {
		var valid = true;
		$("#JobRegisterModal input[required=required], #JobRegisterModal text[required=required], #JobRegisterModal textarea[required=required], #JobRegisterModal select[required=required]").each(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).parent().find("> span.help-block").text("");
			if($(this).attr("required")=="required" && !$(this).val()){
				$(this).parent().parent().addClass('has-error');
				$(this).parent().find("> span.help-block").text("This field is required");
				valid = false;
			} else if($(this).attr("type")=="email"  && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
				$(this).parent().parent().addClass('has-error');
				$(this).parent().find("> span.help-block").text("Invalid email address");
				valid = false;
			} else if($(this).attr("type")=="number" && $(this).val()!="" && !$(this).val().match(/^\d+$/)){
				$(this).parent().parent().addClass('has-error');
				$(this).parent().find("> span.help-block").text("A number is expected");
				valid = false;
			} else if($(this).attr("type")=="date" && !isDate($(this).val())){
				$(this).parent().parent().addClass('has-error');
				$(this).parent().find("> span.help-block").text("Invalid date");
				valid = false;
			}
		});
		return valid;
	}

	/*$(function() {
		$( document ).tooltip({
			position: {my: "left top", at: "right top"},
			items: "input[required=required], text[required=required], textarea[required=required], select[required=required]",
			content: function() {return $(this).attr( "title" );}
		});
	});*/

	function jobRegisterFunction() {
		populateCityData();
		populateAgeBandData();
		populateEthnicityListData();
		populateHeardListData();
		populateWorkStatusListData();
		populateVolReasonListData();
		$('#JobRegisterModal').modal('show');
	};

	function populateCityData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getCity')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#cityList");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['city']+'">'+result[i]['city']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};

	function populateAgeBandData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getAgeList')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#ageBand");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['ageband']+'">'+result[i]['ageband']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};

	function populateEthnicityListData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getEthnicityList')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#ethnicityList");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['elist']+'">'+result[i]['elist']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};

	function populateHeardListData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getHeardList')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#heardList");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['howheard']+'">'+result[i]['howheard']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};

	function populateWorkStatusListData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getWorkStatus')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#workStatusList");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['status']+'">'+result[i]['status']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};

	function populateVolReasonListData() {
		$.ajax({
			type: 'POST',
			url: "<?=$view->action('getVolReason')?>",
			datatype: 'json',
			cache: false,
		}).done(function(data, textStatus, jqXHR){
			var result = $.parseJSON(data);
			var jsonlen = 0;
			for (var row in result) jsonlen++;
			var select = $("#volReasonList");
    	for (i = 0; i < jsonlen; i++) {
        select.append('<option value="'+result[i]['reason']+'">'+result[i]['reason']+'</option>');
    	};
		}).fail(function(jqXHR, textStatus, errorThrown) {
			alert("error");
		});
	};


</script>

	<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php
	  				$areaLeftContent = new Area('LeftContent');
	  				$areaLeftContent->display($c);
	  			?>
				</div>
				<div class="col-md-6">
					<h3 style="text-align: center;"> Search For a Volunteer Role</h3>
					<?php
					$cats = $controller->getKeywords();
					$locs = $controller->getLocation();
					?>
     				<h4 style="text-align: center;"> Select your search options</h4>
    				<form class="form-horizontal" method="post" action="<?php echo $this->action('searchJobData'); ?>">
    					<div class="form-group">
							<label for="selCategory" class="control-label col-xs-4">Role Category</label>
							<select name="sCategory" class="frmfield">
						 		<div class="col-xs-10">
									<option value="" selected="selected">All...</option>
									<?php foreach($cats as $category){?>
   									<option value=<?php echo $category["keyword"]; ?>> <?php echo $category["keyword"]; ?></option>
   								<?php } ?>
   							</div>
   						</select>
   					</div>
   					<div class="form-group">
   						<label for="selLocation" class="control-label col-xs-4">Location</label>
   						<select name="sLocation" class="frmfield">
								<option value="" selected="selected">All...</option>
								<?php foreach($locs as $location){?>
   								<option value=<?php echo $location["office"]; ?>> <?php echo $location["tex"]; ?></option>
   							<?php } ?>
   						</select>
   					</div>
   					<div class="form-group">
   						<label for="selSearch" class="control-label col-xs-4">Search words</label>
   						<input type="text" name="sWord" class="frmfield">
   					</div>
   					<div class="form-group">
            		<div class="col-xs-offset-4 col-xs-10">
            			<button type="submit" class="btn btn-primary shadow">Search</button>
								</div>
						</div>
					</form>
   			</div>

				<div class="col-md-3">
					<h4>My Shortlist</h4>
    				<ol id="cont_shortlist">
    				</ol>
    				<!-- Button trigger modal -->
					<button class="btn btn-primary shadow" id="btnJobRegister" onclick="jobRegisterFunction()">
    						Register interest in these roles
					</button>
				</div>
		</div>
		<div class="row">
				<div class="col-md-3">
					<?php
	  				$areaLeftContentLower = new Area('LeftContentLower');
	  				$areaLeftContentLower->display($c);
	  			?>
				</div>
				<div class="col-md-6">
				<div class="row extraspace">
							<?php
							if (empty($resultPosted)) {
								//echo "Select your search options";
							}	else {
							foreach($resultPosted as $job) { ?>

								<div class="dk-blue-wrapper white">
								<h3>
									<?php echo $job["title"]; ?>
								</h3>
								</div>
								<div class="blue-wrapper">
								<table class="table">
								<thead>
								<tr>
								<th style="width: 70%"><?php echo $job["jobsub"]; ?></th>
    							<th style="width: 30%">Role ID: <?php echo $job["ID"]; ?></th>
								</tr>
								</thead>
								</table>
								<p><?php echo $job["descrip"]; ?></p>
								</div>
								<div class="lt-dk-blue-wrapper">
									<table class="table">
									<thead>
										<tr>
											<th style="width: 50%"><button id="viewbutton" type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#myModal" data-id="<?php echo $job_id= $job["ID"]; ?>" >View Details</button></th>
    									<th style="width: 50%"><button id="addmyJob" class="btn btn-primary shadow" onclick="addmyJobFunction('<?php echo $job["ID"]; ?>', '<?php echo $job["title"]; ?>')">Add to favourites</button></th>
										</tr>
									</thead>
								</table>
								</div>
							<?php }
							} ?>
					</div>
				</div>
				<div class="col-md-3">
					<?php
	  				$areaRightContent = new Area('RightContent');
	  				$areaRightContent->display($c);
	  			?>
				</div>
	</div>
</div>

<!-- Dispay Detail Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog custom-class">
    <!-- Modal content-->
    <div class="modal-content">
    	<div class="row">
      	<div class="col-md-12 modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">
        		</h4>
      	</div>
      </div>
			<div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="tdescrip"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="descrip"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="tskills"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="skills"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="tpersonality"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="personality"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="tdayshours"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="dayshours"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="ttraining"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="training"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="treimbursement"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="reimbursement"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="teveonly"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="eveonly"></div>
    		</div>
      </div>
      <div class="row">
    		<div class="modal-lead col-md-3">
      		<div id="tpolice"></div>
    		</div>
    		<div class="modal-detail col-md-8">
      		<div id="police"></div>
    		</div>
      </div>
   <div class="row">
   	<div class="modal-footer">
        <button type="button" class="btn btn-primary center-block" data-dismiss="modal">Close</button>
   	</div>
   </div>
   </div>
	</div>
</div>

<!-- Shortlist submission Modal -->
<div class="modal fade" id="JobRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    		<div class="modal-content">
         	<!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                	<span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Register your details</h4>
            </div>
            <!-- Shortlist Modal Body -->
            <div class="modal-body">
            	<form class="form-horizontal" id="jobRegisterForm">
                  <div class="form-group required">
                    	<label  class="col-sm-4 control-label" for="inputFirstName">First Name</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" required="required"/>
                    	</div>
                  </div>
                  <div class="form-group required">
                    	<label  class="col-sm-4 control-label" for="inputLastName">Last Name</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" required="required"/>
                    	</div>
                  </div>
                  <div class="form-group required">
                    	<label  class="col-sm-4 control-label" for="inputEmail">Email</label>
                    	<div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required"/>
                    	</div>
                  </div>
									<div class="form-group">
                    	<label  class="col-sm-4 control-label" for="inputPhone">Day time phone</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone"/>
                    	</div>
                  </div>
									<div class="form-group">
                    	<label  class="col-sm-4 control-label" for="inputEveningTel">Evening phone</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEveningTel" placeholder="Evening Phone"/>
                    	</div>
                  </div>
									<div class="form-group">
                    	<label  class="col-sm-4 control-label" for="inputMobile">Mobile</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputMobile" placeholder="Mobile"/>
                    	</div>
                  </div>
									<div class="form-group">
                    	<label  class="col-sm-4 control-label" for="inputSuburb">Suburb</label>
                    	<div class="col-sm-8">
                        <input type="text" class="form-control" id="inputSuburb" placeholder="Suburb"/>
                    	</div>
                  </div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputCity">City</label>
										  <div class="col-sm-8">
													<select name="city" id="cityList" >
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group required">
											<label  class="col-sm-4 control-label" for="inputAgeband">Age Band</label>
										  <div class="col-sm-8">
													<select name="age" id="ageBand" required="required">
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group required">
											<label  class="col-sm-4 control-label" for="inputGenderList">What is your gender?</label>
										  <div class="col-sm-8">
													<select name="gender" id="genderList" required="required">
            								<option selected="" value="">Select</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
														<option value="Gender Diverse">Gender Diverse</option>
														<option value="Not Stated">Not Stated</option>
     											</select>
											</div>
									</div>
									<div class="form-group required">
											<label  class="col-sm-4 control-label" for="inputEthnicity">What is your ethnicity?</label>
										  <div class="col-sm-8">
													<select  name="ethnicity" id="ethnicityList" required="required">
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputMigrantStatus">Are you a recent migrant to NZ?</label>
										  <div class="col-sm-8">
													<select name="migrantStatus" id="migrantStatusList">
            								<option selected="" value="">Select</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputRefugeeStatus">Do you have legal Refugee status?</label>
										  <div class="col-sm-8">
													<select name="refugeeStatus" id="refugeeStatusList">
            								<option selected="" value="">Select</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputHeard">How did you hear about Volunteer Wellington?</label>
										  <div class="col-sm-8">
													<select name="heard" id="heardList">
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputWorkStatus">What is your work status?</label>
										  <div class="col-sm-8">
													<select name="workStatus" id="workStatusList">
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputVolReason">Reason for Volunteering?</label>
										  <div class="col-sm-8">
													<select name="volReason" id="volReasonList">
            								<option selected="" value="">Select</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
											<label  class="col-sm-4 control-label" for="inputVolWelOffice">Which is your Volunteer Wellington Office?</label>
										  <div class="col-sm-8">
													<select name="volWelOffice" id="volWelOfficeList">
            								<option selected="" value="">Select</option>
														<option value="Well">Wellington</option>
														<option value="Lhutt">Lower Hutt</option>
														<option value="Por">Porirua</option>
     											</select>
											</div>
									</div>
									<div class="form-group">
										<div class="checkbox">
											<label  class="col-sm-8 control-label" for="inputEmergencyList">Are you willing to be added to a list of people to be contacted in the event of a emergency/disaster in the Wellington region please tick the box. Volunteer Wellington will need to keep your contact details for this purpose.</label>
  										<div class="col-sm-4">
												<label><input type="checkbox" id="volEmergList" value="">Add me to the Emergency list</label>
											</div>
										</div>
									</div>
                 	<div class="form-group">
											<div class="col-sm-6">
                      	<button type="button" class="btn btn-primary center-block" onClick="sendJobRegister();" >Register for jobs</button>
											</div>
											<div class="col-sm-6">
												<button type="button" class="btn btn-primary center-block" data-dismiss="modal">Close</button>
                    	</div>
                  </div>
                </form>
				</div>
			</div>
	</div>
</div>

<!-- No online registration modal---->
<div class="modal fade" id="noOnlineRegistrationModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title alert alert-warning"id="">Warning</h4>
      </div>
      <div class="modal-body">
        <p>You cannot register online for this role. <b>If the role interests you</b> contact the Volunteer Wellington Office nearest you and arrange an interview. Otherwise select other roles.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary center-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="maxShortlist" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title alert alert-warning"id="">Warning</h4>
      </div>
      <div class="modal-body">
        <p>You can only have <b>ten</b> items on your shortlist.  Remove those you don't want to add more.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary center-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Display registration success dialog modal-->
  <div class="modal fade" id="dialogSuccessModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="success-dialog-title">Registration Success</h4>
        </div>
        <div class="modal-body" id="success-dialog-message">
					<p> Your registration for volunteer roles have been recorded</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

	<!-- Display registration Failure dialog modal-->
	  <div class="modal fade" id="dialogFailureModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title alert alert-warning" id="failure-dialog-title">Registration Failure</h4>
	        </div>
	        <div class="modal-body" id="failure-dialog-message">
						<p> Oh this is embarrasing, something has gone wrong please try to resubmit your role registrations</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>

		<!-- Display missing form mandatory items dialogue-->
			<div class="modal fade" id="dialogMissingItemsModal" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title alert alert-warning" id="missing-dialog-title">The form is incomplete</h4>
						</div>
						<div class="modal-body" id="missing-dialog-message">
							<p>You need to complete the forms mandatory fields</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

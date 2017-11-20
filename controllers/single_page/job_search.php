<?php
namespace Application\Controller\SinglePage;
//use Concrete\Core\Page\Controller\PageController;
use Core;
use PageController;
use AssetList;
use Asset;
use Mail;

class JobSearch extends PageController
{
	public function getAgeList() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  ageband
		FROM agelist
		WHERE status = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getEthnicityList() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  *
		FROM ethnicitylist
		WHERE status = 1
		ORDER BY elist";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getWorkStatus() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  *
		FROM worklist
		WHERE styn = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getHeardList() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  *
		FROM heardlist
		WHERE status = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getCity() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  *
		FROM citylist
		WHERE status = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getVolReason() {
		$conn = \Database::connection('jobsearch');
		$sql = "SELECT  *
		FROM volreason
		WHERE status = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$details = $stmt->fetchAll();
		echo json_encode($details, JSON_FORCE_OBJECT);
	exit;
	}

	public function getDetail() {
		$jobID = $_POST['key'];
    $conn = \Database::connection('jobsearch');
    $sql = "SELECT  ID, descrip, skills, training, reimbursement, personality, dayshours, policeck, eveonly
    FROM jobs
    WHERE id = ?";

		$stmt = $conn->prepare($sql);

		$stmt->bindValue(1, $jobID);

		$stmt->execute();

		$details = $stmt->fetch();

		echo json_encode($details, JSON_FORCE_OBJECT);
    exit;
	}


	public function getCategory(){
   	$dbc = \Database::connection('jobsearch');
		$cats = $dbc->fetchAll("SELECT `posid`,`scat` FROM `seekcats` ORDER BY `scat`  ");
		return $cats;
	}

	public function getKeywords(){
   	$dbc = \Database::connection('jobsearch');
		$cats = $dbc->fetchAll("SELECT * FROM `keywords` WHERE `status` = 1 order by 'keyword'");
		return $cats;
	}

	public function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
	}

	public function getIsNotOnline () {
		$jobID = $_POST['key'];
		//$jobID = 3502;
		$dbc = \Database::connection('jobsearch');
		$sql ="SELECT case when
			(a.online = 1 or j.online = 1)
			then 'true'
			else 'false'
			end as success
			FROM agencies a
			LEFT JOIN jobs j
			ON a.id = j.agencyid
			WHERE j.id = ?";
			$stmt = $dbc->prepare($sql);
			$stmt->bindValue(1, $jobID);
			$stmt->execute();
			$details = $stmt->fetch();
			echo json_encode($details, JSON_FORCE_OBJECT);
			exit;
	}

	public function getLocation(){
		$dbc = \Database::connection('jobsearch');
		$loc = $dbc->fetchAll("SELECT `office`,`tex` FROM `jobloc` ORDER BY `tex`");
		return $loc;
	}

	public function searchJobData() {
		$filters = array(
	    'keyword'=>FILTER_SANITIZE_STRING,
		);
		$options = array(
    	'keyword'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
		);
  		//Search the database
  		$dbc = \Database::connection('jobsearch');
    	$category = $this->post('sCategory');
    	$location = $this->test_input($this->post('sLocation'));
    	$keyword = filter_var($this->post("sWord"),$filters['keyword'], $options['keyword']);
    	if (empty($keyword) && empty($category) && empty($location)) {
    		$sql =  "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID`, 'policeck'
    		FROM `jobs`
    		WHERE `status` = 1
    		ORDER BY `dateposted` DESC";
			$stmt = $dbc->prepare($sql);

			$stmt->execute();

			$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
    	}
    	elseif (!empty($keyword) && empty($category) && empty($location)) {
    		$sql = "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID`, 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND MATCH(`descrip`, `title`)
    		AGAINST('$keyword*' IN BOOLEAN MODE)
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
  		}
    	elseif(empty($keyword) && empty($category) && !empty($location)) {
    		$sql= "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID`, 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND `location` = ?
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);
    		$stmt->bindValue(1, $location);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
    	}
    	elseif(!empty($keyword) && empty($category) && !empty($location)) {
    		$sql="SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID`, 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND `location` = ?
    		AND MATCH(`descrip`, `title`)
    		AGAINST('$keyword*' IN BOOLEAN MODE)
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);
    		$stmt->bindValue(1, $location);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
  		}
    	elseif(empty($keyword) && !empty($category) && empty($location)) {
    		$sql = "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID` , 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND `keyword` = ?
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);
    		$stmt->bindValue(1, $category);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
    	}
    	elseif(!empty($keyword) && !empty($category) && empty($location)) {
    		$sql = "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID`, 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND `keyword` = ?
    		AND MATCH(`descrip`, `title`)
    		AGAINST('$keyword*' IN BOOLEAN MODE)
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);
    		$stmt->bindValue(1, $category);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
  		}
  		elseif(empty($keyword) && !empty($category) && !empty($location)) {
    		$sql = "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID` , 'policeck', 'eveonly', 'reimbursement'
    		FROM `jobs`
    		WHERE `status` = 1
    		AND `keyword` = ?
    		AND `location` = ?
    		ORDER BY `dateposted` DESC";
    		$stmt = $dbc->prepare($sql);
    		$stmt->bindValue(1, $category);
    		$stmt->bindValue(2, $location);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
    	}
    	else {
  			$sql = "SELECT  `title`, `keyword`, `jobsub`, `descrip`, `ID` , 'policeck', 'eveonly', 'reimbursement'
  			FROM `jobs`
  			WHERE `status` = 1
  			AND `keyword` = ?
    		AND `location` = ?
  			AND MATCH(`descrip`, `title`)
  			AGAINST('$keyword*' IN BOOLEAN MODE)
  			ORDER BY `dateposted` DESC";
  			$stmt = $dbc->prepare($sql);
  			$stmt->bindValue(1, $category);
    		$stmt->bindValue(2, $location);

				$stmt->execute();

				$results = $stmt->fetchAll();
    		$this->set('resultPosted', $results);
  		}
	}

	public function jobRegister() {
		$jobSubmission = $_POST['jobData'];
		$filters = array(
	    'fname'=>FILTER_SANITIZE_STRING,
			'lname'=>FILTER_SANITIZE_STRING,
    	'suburb'=>FILTER_SANITIZE_STRING,
			'city'=>FILTER_SANITIZE_STRING,
			'phone'=>FILTER_SANITIZE_NUMBER_INT,
			'evetel'=>FILTER_SANITIZE_NUMBER_INT,
			'mobile'=>FILTER_SANITIZE_NUMBER_INT,
			'email'=>FILTER_VALIDATE_EMAIL,
			'gender'=>FILTER_SANITIZE_STRING,
			'ageband'=>FILTER_SANITIZE_STRING,
			'ethnicity'=>FILTER_SANITIZE_STRING,
			'migrant'=>FILTER_SANITIZE_STRING,
			'refugee'=>FILTER_SANITIZE_STRING,
			'heard'=>FILTER_SANITIZE_STRING,
			'labour'=>FILTER_SANITIZE_STRING,
			'reason'=>FILTER_SANITIZE_STRING,
			'office'=>FILTER_SANITIZE_STRING,
			'emvol'=>FILTER_SANITIZE_NUMBER_INT,
		);
		$options = array(
    	'fname'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'lname'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'suburb'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'city'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'tel'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'evetel'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'mobile'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'email'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'gender'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'ageband'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'ethnicity'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'migrant'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'refugee'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'heard'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'labour'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'reason'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'office'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
			'emvol'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
		);


		//$inputs = json_decode(json_encode(json_decode($jobSubmission)), True);
		$inputs = json_decode($jobSubmission, True);

		// set variables for email
		$volName=filter_var($inputs[0]['volContact']['fname'], $filters['fname'], $options['fname']). ' ' .filter_var($inputs[0]['volContact']['lname'], $filters['lname'], $options['lname']);
		$volSuburb=filter_var($inputs[0]['volContact']['suburb'], $filters['suburb'], $options['suburb']);
		$volCity=filter_var($inputs[0]['volContact']['city'], $filters['city'], $options['city']);
		$volPhone=filter_var($inputs[0]['volContact']['phone'], $filters['phone'], $options['phone']);
		$volEvetel=filter_var($inputs[0]['volContact']['evetel'], $filters['evetel'], $options['evetel']);
		$volMobile=filter_var($inputs[0]['volContact']['mobile'], $filters['mobile'], $options['mobile']);
		$volEmail=filter_var($inputs[0]['volContact']['email'], $filters['email'], $options['email']);
		$volOffice=filter_var($inputs[0]['volContact']['office'], $filters['office'], $options['office']);
		$volReason=filter_var($inputs[0]['volContact']['reason'], $filters['reason'], $options['reason']);
		$rawEmergency=filter_var($inputs[0]['volContact']['emvol'], $filters['emvol'], $options['emvol']);
		if ($rawEmergency==1) {
			$volEmergency='Yes';
		} else {
			$volEmergency='No';
		}
		$volGender=filter_var($inputs[0]['volContact']['gender'], $filters['gender'], $options['gender']);
		$volAgeband=filter_var($inputs[0]['volContact']['ageband'], $filters['ageband'], $options['ageband']);
		$volLabour=filter_var($inputs[0]['volContact']['labour'], $filters['labour'], $options['labour']);
		$volHeard=filter_var($inputs[0]['volContact']['heard'], $filters['heard'], $options['heard']);
		$volEthnicity=filter_var($inputs[0]['volContact']['ethnicity'], $filters['ethnicity'], $options['ethnicity']);
		$volMigrant=filter_var($inputs[0]['volContact']['migrant'], $filters['migrant'], $options['migrant']);
		$volRefugee=filter_var($inputs[0]['volContact']['refugee'], $filters['refugee'], $options['refugee']);
		$volReDate = date('Y-m-d');
    	$volCreateDate = new \DateTime($volReDate);
		$displayCreateDate = $volCreateDate->format('d/m/Y');


		$conn = \Database::connection('jobsearch');
    $conn -> beginTransaction();
    try {
			/* Find out the next auto-increment ID for the webregister table */

			$sql = "SELECT ID
			FROM webregister
			ORDER BY ID
			DESC LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$last_id = $stmt->fetch();
			$reg_id = $last_id['ID'] + 1;


			// Set email to office body content
			$mailOfficeContent = "
			<p><b>This is a Test email representing what will be sent to the Office on role registration</b></p>
			<p>You have received this mail from a volunteer registration on the VW web site. The data below is that which has been entered by the potential volunteer. The requirements on the data entry have been set at Volunteer Name and at least one contact number. The contact details must be correctly entered. They cannot send the form until they have fulfilled these requirements.</p>
			<p>Please do not try to reply-to this automatically generated email.</p>
			<p>The database entry date: $displayCreateDate</p>
			<fieldset>
			<legend>THE VOLUNTEER</legend>
			<ul>
			<li><label>ID</label><b> &nbsp; $reg_id</b></li>
			<li><label>Name</label><b> &nbsp; $volName</b></li>
			<li><label>Suburb</label><b> &nbsp; $volSuburb</b></li>
			<li><label>City</label><b> &nbsp; $volCity</b></li>
			<li><label><b>Contact details</b></label><b> (at least one must have been entered)</b></li>
			<li><label>Phone</label><b> &nbsp; $volPhone</b></li>
			<li><label>Mobile</label><b> &nbsp; $volMobile</b></li>
			<li><label>Evening phone</label><b> &nbsp; $volEvetel</b></li>
			<li><label>Email</label><b> &nbsp; <a href=\"mailto:$volEmail\">$volEmail</a></b></li>
			<li><label>Nearest VW Office</label><b> &nbsp; $volOffice</b></li>
			<li><label>Reason to Volunteer</label><b> &nbsp; $volReason</b></li>
			<li><label>Emergency volunteer list</label><b> &nbsp; $volEmergency</b></li>
			<li><label><font color=\"#ffffff\">stats</font></label><b>Stats details</b></li>
			<li><label>Gender</label><b> &nbsp; $volGender</b></li>
			<li><label>Ageband</label><b> &nbsp; $volAgeband</b></li>
			<li><label>Labour Status</label><b> &nbsp; $volLabour</b></li>
			<li><label>How heard</label><b> &nbsp; $volHeard</b></li>
			<li><label>Ethnicity</label><b> &nbsp; $volEthnicity</b></li>
			<li><label>Migrant</label><b> &nbsp; $volMigrant</b></li>
			<li><label>Refugee</label><b> &nbsp; $volRefugee</b></li>
			</ul>
			</fieldset>
			";

      $conn->insert('webregister',
      array(
				'ID' => NULL,
				'lastname'=>filter_var($inputs[0]['volContact']['lname'], $filters['lname'], $options['lname']),
				'firstname'=>filter_var($inputs[0]['volContact']['fname'], $filters['fname'], $options['fname']),
	    	'suburb'=>$volSuburb,
				'city'=>$volCity,
				'phone'=>$volPhone,
				'evetel'=>$volEvetel,
				'mobile'=>$volMobile,
				'email'=>$volEmail,
				'createdate' => $volReDate,
				'emvol'=>$rawEmergency,
				'gender'=>$volGender,
				'ageband'=>$volAgeband,
				'ethnicity'=>$volEthnicity,
				'heard'=>$volHeard,
				'labour'=>$volLabour,
				'off'=>$volOffice,
				'migrant'=>$volMigrant,
				'refugee'=>$volRefugee,
				'wi' => 0,
				'status' => 1,
				'reason'=>$volReason
			));

			for ($x = 1; $x <= 10; $x++) {
				$job_id = $inputs[$x]['item']['id'];
				if (isset($job_id)) {
					$sql = "SELECT `agencyID`, `title`, `descrip`, `location`, `jobemail`
					FROM `jobs`
					WHERE `ID` = ?";
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(1, intval($job_id));
					$stmt->execute();
					$job_data = $stmt->fetch();
					$agency_id = intval($job_data['agencyID']);
					$ref_location = $job_data['location'];
					$ref_title = $job_data['title'];
					$ref_descrip= $job_data['descrip'];

					if (isset($agency_id)) {
						$sql = "SELECT `name`, `email`, `phone`
						FROM `agencies`
						WHERE `ID` = ?";
						$stmt = $conn->prepare($sql);
						$stmt->bindValue(1, intval($agency_id));
						$stmt->execute();
						$agency_data = $stmt->fetch();
						$agency_name = $agency_data['name'];
						$agency_phone = $agency_data['phone'];

						// Get valid email address for sending agency email
						if(!empty($job_data['jobemail'])){
							$job_email=$job_data['jobemail'];
							$agency_email=$job_email;
						}
						else{
							if(!empty($agency_data['email'])){
								$agency_email=$agency_data['email'];
							}
						}
					}
					// Set email to agency body content
					$mailAgencyContent = "
					<p><b>This is a Test email representing what will be sent to the Organisation offering the role</b></p>
					<p>You have received this mail from a volunteer registration on the Volunteer Wellington web site. First please check that you are indeed the Organisation named below to ensure that the correct email has reached you. If this is not the case please notify Volunteer Wellington ASAP so the matter can be corrected.</p>
					<p>The data below is that which has been entered by the potential volunteer. </p>
					<p><b>Please note:</b></p>
					<ol>
					<li>This email indicates the volunteer is interested in the role you have registered.  The process is self-selection only and the volunteer has not been through an interview process at Volunteer Wellington.</li>
					<li>We recommend you respond to the volunteer within 48 hrs and discuss the next steps such as an interview, completion of application forms or providing further information about the voluntary role.</li>
					<li>To reply to the volunteer by email ensure you use the email address below given by the volunteer. Using the \"Reply\" button of your email client will only send an email to a web server.</li>
					</ol>
					<p>Entry Date into the database: $displayCreateDate</p>
					<fieldset>
					<legend>THE VOLUNTEER</legend>
					<ul>
					<li><label>ID</label><b> &nbsp; $reg_id</b> (Use this if you want to contact Volunteer Wellington concerning this volunteer)</li>
					<li><label>Name</label><b> &nbsp; $volName</b></li>
					<li><label>Suburb</label><b> &nbsp; $volSuburb</b></li>
					<li><label>City</label><b> &nbsp; $volCity</b></li>
					<li><label><b>Contact details</b></label><b>(at least one must have been entered)</b></li>
					<li><label>Phone</label><b> &nbsp; $volPhone</b></li>
					<li><label>Mobile</label><b> &nbsp; $volMobile</b></li>
					<li><label>Evening phone</label><b> &nbsp; $volEvetel</b></li>
					<li><label>Email</label><b> &nbsp; <a href=\"mailto:$volEmail\">$volEmail</a></b></li>
					</ul>
					</fieldset>
					<fieldset>
					<legend>THE RESOURCE BUNDLE</legend>
					<ul>
					<li><label><font color=\"#ffffff\">stats</font></label><b>Details held by Volunteer Wellington of the role listed in the Database</b></li>
					<li><label>Role ID</label><b> &nbsp; $job_id</b></li>
					<li><label>Role Title</label><b> &nbsp; $ref_title</b></li>
					<li><label>For Organisation</label><b> &nbsp; $agency_name</b></li>
					</ul>
					</fieldset>";


					// Set email to agency body content
					$mailVolContent = "
					<p><b>This is a Test email representing what will be sent to the Volunteer on role registration</b></p>
					<p>Thank you for your application for the volunteering role:</p>
					<fieldset>
					<legend>THE ROLE</legend>
					<ul>
					<li><label>Role Title</label><b> &nbsp; $ref_title</b></li>
					<li><label>Role Description</label><b> &nbsp; $ref_descrip</b></li>
					<li><label>Role Location</label><b> &nbsp; $ref_location</b></li>
					</ul>
					</fieldset>
					<fieldset>
					<legend>THE ORGANISTION</legend>
					<ul>
					<li><label>Organisation</label><b> &nbsp;$agency_name</b></li>
					<li><label>Organisation email</label><b> &nbsp;$agency_email</b></li>
					<li><label>Organisation phone</label><b> &nbsp;$agency_phone</b></li>
					</ul>
					</fieldset>
 					<p>The organisation who registered the role you have chosen have been sent your application.  If you don’t hear from them within 48 hours we recommend you contact them directly.</p>
					<p>If you have any questions or would like to discuss your options further please email us at <a href=mailt:info@volunteerwellington.nz>info@volunteerwellington.nz</a></p>";

					$conn->insert('webrefs',
						array(
							'refID' => NULL,
							'referID' => 0,
							'webvol' => $reg_id,
							'jobID' => $job_id,
							'agencyID' => $agency_id,
							'referdate' => $volReDate,
							'reflocation' => $ref_location
						)
					);
					// send volunteer registeration to the agency
					$mailService = Core::make('mail');
					$mailService->setTesting(false); // or true to throw an exception on error.
					$mailService->load('mail_template');

					// Set email parameters
					//$mailService->to($agency_email);
					$mailService->to('julie@volunteerwellington.nz');
					$mailService->replyto('office@volunteerwellington.nz', 'Online Job Registration');
					$mailService->setSubject('Volunteer Wellington OnLine Volunteer Registration');
					$mailService->setBodyHTML($mailAgencyContent);

					// Send email
					$mailService->sendMail();

					// send registeration to the volunteer
					$mailService = Core::make('mail');
					$mailService->setTesting(false); // or true to throw an exception on error.
					$mailService->load('mail_template');

					// Set email parameters
					$mailService->to($volEmail);
					$mailService->replyto('office@volunteerwellington.nz', 'Online Role Registration');
					$mailService->setSubject('Volunteer Wellington OnLine Role Registration');
					$mailService->setBodyHTML($mailVolContent);

					// Send email
					$mailService->sendMail();
				}
			}
			// Send Volunteer registration to VW office
			$mailService = Core::make('mail');
			$mailService->setTesting(false); // or true to throw an exception on error.
			$mailService->load('mail_template');

	    // Set email parameters
			$mailService->to('office@volunteerwellington.nz, aileen@volunteerwellington.nz');
			$mailService->replyto('office@volunteerwellington.nz', 'Online Job Registration');
			$mailService->setSubject('Volunteer Wellington OnLine Volunteer Registration');
			$mailService->setBodyHTML($mailOfficeContent);

			// Send email
			$mailService->sendMail();


    	$conn->commit();
		}
		catch(\Exception $e) {
			$conn->rollback();
			throw $e;
		}
		exit;
	}
}
?>

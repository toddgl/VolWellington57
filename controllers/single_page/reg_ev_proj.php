<?php
namespace Application\Controller\SinglePage;
// use Concrete\Core\Page\Controller\PageController;
use Core;
use PageController;
use AssetList;
use Asset;
use Mail;


class RegEvProj extends PageController
{
  public function view()
  {
    //query to get current membership fees
    $conn = \Database::connection('jobsearch');
		$sql = "SELECT  `amount`, `detail`
		FROM `agencyfees`
		ORDER BY `order`";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$this->set('agencyfees', $results);

		$sql = "SELECT  *
		FROM citylist
		WHERE status = 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$this->set('cities', $results);
	}

  public function regEVProject() {
        $projSubmission = $_POST['projData'];
        $inputs = json_decode(json_encode(json_decode($projSubmission)), True);
        // echo print_r($inputs);
        $filters = array(
    	     'agency'=>FILTER_SANITIZE_STRING,
           'agencyid'=>FILTER_SANITIZE_NUMBER_INT,
           'title'=>FILTER_SANITIZE_STRING,
           'background'=>FILTER_SANITIZE_STRING,
           'descript'=>FILTER_SANITIZE_STRING,
           'skills'=>FILTER_SANITIZE_STRING,
           'supervisor'=>FILTER_SANITIZE_STRING,
           'tel'=>FILTER_SANITIZE_STRING,
           'email'=>FILTER_SANITIZE_STRING,
           'dayshours'=>FILTER_SANITIZE_STRING,
           'personality'=>FILTER_SANITIZE_STRING,
           'jobaddress'=>FILTER_SANITIZE_STRING,
			     'jobsuburb'=>FILTER_SANITIZE_STRING,
           'jobcity'=>FILTER_SANITIZE_STRING,
           'volnums'=>FILTER_SANITIZE_NUMBER_INT,
           'comments'=>FILTER_SANITIZE_STRING,
           'wends'=>FILTER_SANITIZE_STRING,
           'mem'=>FILTER_SANITIZE_STRING,
           'ischallenge'=>FILTER_SANITIZE_NUMBER_INT
		       );
		       $options = array(
    	      'agency'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	     ),
			      'agencyid'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	     ),
			        'title'=>array(
              'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			       'background'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'descript'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			      'skills'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			      'supervisor'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'tel'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'email'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'dayshours'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'personality'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			      'jobaddress'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			      'jobsuburb'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
			      'jobcity'=>array(
            'flags'=>FILTER_NULL_ON_FAILURE
    	    ),
            'volnums'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
      'comments'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
      'wends'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
      'mem'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	),
      'ischallenge'=>array(
        'flags'=>FILTER_NULL_ON_FAILURE
    	)
		);

    $agency = filter_var($inputs[0]['evProject']['agency'],$filters['agency'], $options['agency']);
    $agencyid = filter_var($inputs[0]['evProject']['agencyid'],$filters['agencyid'], $options['agencyid']);
    if (empty($agencyid)) {
      $agencyid = 0;
      $agencyIdDisplay='Not Set';
    }
    else {
      $agencyIdDisplay=$agencyid;
      $agencyid=intval($agencyid);
    }
    $status = 'Active';
    $title = filter_var($inputs[0]['evProject']['title'],$filters['title'], $options['title']);
    $background = filter_var($inputs[0]['evProject']['background'],$filters['background'], $options['background']);
    $descrip = filter_var($inputs[0]['evProject']['descript'],$filters['descript'], $options['descript']);
    $skills = filter_var($inputs[0]['evProject']['skills'],$filters['skills'], $options['skills']);
    $personality = filter_var($inputs[0]['evProject']['personality'],$filters['personality'], $options['personality']);
    $comments = filter_var($inputs[0]['evProject']['comments'],$filters['comments'], $options['comments']);
    if (empty($comments)) {
      $comments='Nil';
    }
    $jobaddress = filter_var($inputs[0]['evProject']['jobaddress'],$filters['jobaddress'], $options['jobaddress']);
    $jobsuburb = filter_var($inputs[0]['evProject']['jobsuburb'],$filters['jobsuburb'], $options['jobsuburb']);
    $jobcity = filter_var($inputs[0]['evProject']['jobcity'],$filters['jobcity'], $options['jobcity']);
    $supervisor = filter_var($inputs[0]['evProject']['supervisor'],$filters['supervisor'], $options['supervisor']);
    $tel = filter_var($inputs[0]['evProject']['tel'],$filters['tel'], $options['tel']);
    $email = filter_var($inputs[0]['evProject']['email'],$filters['email'], $options['email']);
    $dateposted = date('Y-m-d');
    $calyear = $inputs[0]['evProject']['currentyear'];
    $dayshours = filter_var($inputs[0]['evProject']['dayshours'],$filters['dayshours'], $options['dayshours']);
    $ischallenge = filter_var($inputs[0]['evProject']['ischallenge'],$filters['ischallenge'], $options['ischallenge']);
    if ($ischallenge==1) {
      $chall='Yes';
    } else {
      $chall='No';
    }
    $mem = filter_var($inputs[0]['evProject']['mem'],$filters['mem'], $options['mem']);
    $wends = filter_var($inputs[0]['evProject']['wends'],$filters['wends'], $options['wends']);
    $volnums = filter_var($inputs[0]['evProject']['volnums'],$filters['volnums'], $options['volnums']);
    if (empty($volnums)) {
      $volnums = 0;
    }
    else {
      $volnums=intval($volnums);
    }


    $conn = \Database::connection('jobsearch');
    $conn -> beginTransaction();
    try {
      /* Find out the next auto-increment ID for the eitctempjobs table */

      $sql = "SELECT id
			FROM eitctempjobs
			ORDER BY id
			DESC LIMIT 1";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$last_id = $stmt->fetch();
      $jobid = $last_id['id'] + 1;

      // Set email content
      $mailContent = "
      <p>This mail is generated from the on-line registration form for Community groups looking for support from the EV Programme on the Volunteer Wellington web site. To reply to the registrant use the address included below. Do NOT 'Reply' to this email. It will only go to the Web Server. The data shown below has hopefully been inserted in to the database in a temporary table and waits updating before being entered in the EV Jobs table.</p>
      <p>The job is waiting under the page 'Correct web data' in order to fix the things that need fixing and so that the job can be entered into the jobs table and the planning cycle.</p>

      <fieldset>
        <legend>EV JOB REGISTRATION</legend>
        <ul>
        <li><label>Job has been entered with ID: </label><b> &nbsp;$jobid</b></li>
        <li><label>Agency: </label><b> &nbsp;$agency</b></li>
        <li><label>Status: </label><b> &nbsp;$status</b></li>
        <li><label>Title: </label><b> &nbsp;$title</b></li>
        <li><label>Background: </label><b> &nbsp;$background</b></li>
        <li><label>Description: </label><b> &nbsp;$descrip</b></li>
        <li><label>Skills: </label><b> &nbsp;$skills</b></li>
        <li><label>Instructions: </label><b> &nbsp;$personality</b></li>
        <li><label>Other comments: </label><b> &nbsp;$comments</b></li></b></li>
        <li><label>Job Address: </label><b> &nbsp;$jobaddress</b></li>
        <li><label>Suburb: </label><b> &nbsp;$jobsuburb</b></li>
        <li><label>City: </label><b> &nbsp;$jobcity</b></li>
        <li><label>Contact: </label><b> &nbsp;$supervisor</b></li>
        <li><label>Telephone: </label><b> &nbsp;$tel</b></li>
        <li><label>Email: </label><b> &nbsp;$email</b></li>
        <li><label>Job Dates/Times: </label><b> &nbsp;$dayshours</b></li>
        <li><label>Job is a challenge: </label><b> &nbsp;$chall</b></li>
    	</ul>
	    </fieldset>
      <fieldset>
        <legend>AGENCY DETAILS</legend>
        <ul>
        <li><label>Agency ID no.: </label><b> &nbsp;$agencyIdDisplay</b></li>
        <li><label>The agency is a Member of VW: </label><b> &nbsp;$mem</b></li>
        <li><label>Agency Name: </label><b> &nbsp;$agency</b></li>
        <p>The field below is for your information. The field is stored in the Temporary table but will not be transferred to the main Jobs table when the job is transferred over.</p>
        <li><label>Weekends/weekdays: </label><b> &nbsp;$wends</b></li>
        <li><label>Estimated no. of Volunteers: </label><b> &nbsp;$volnums</b></li>
        </ul>
      </fieldset> ";

      $conn->insert('eitctempjobs',
      array(
        'id' => NULL,
        'agency' => $agency,
        'agencyid' => $agencyid,
        'title' => $title,
        'background' => $background,
        'descrip' => $descrip,
        'skills' => $skills,
        'isactive' => 'Active',
        'supervisor' => $supervisor,
        'tel' => $tel,
        'email' => $email,
        'dateposted' => $dateposted,
        'category' => 'N/A',
        'calyear' => $calyear,
        'finyear' => 0,
        'confirmdate' => date('Y-m-d'),
        'dayshours' => $dayshours,
        'personality' => $personality,
        'jobaddress' => $jobaddress,
        'jobsuburb' => $jobsuburb,
        'jobcity' => $jobcity,
        'volnums' => $volnums,
        'location' => 'N/A',
        'comments' => $comments,
        'wends' => $wends,
        'mem' => $mem,
        'ischallenge' => $ischallenge
    ));

    // Send EV Project Request to VW office
    $mailService = Core::make('mail');
    $mailService->setTesting(false); // or true to throw an exception on error.
    $mailService->load('mail_template');

    // Set email parameters
    $mailService->to('ev@volunteerwellington.nz, julie@volunteerwellington.nz');
    $mailService->from('ev@volunteerwellington.nz');
    $mailService->replyto('ev@volunteerwellington.nz', 'Online Project Registration');
    $mailService->setSubject('EV Project Registration On-Line form');
    $mailService->setBodyHTML($mailContent);

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

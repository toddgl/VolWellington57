<?php
namespace Application\Controller\SinglePage;
// use Concrete\Core\Page\Controller\PageController;
use Core;
use PageController;
use AssetList;
use Asset;


class FriendsFunders extends PageController
{

  public function view() {
    $this->getFunders();
    $this->getPremiumFriends();
    $this->getInKindFriends();
    $this->getIndividualFriends();
  }

  public function getFunders()  {
  //query to get current funders
  $conn = \Database::connection('jobsearch');
	$sql = "SELECT  *
	FROM `funders`
	WHERE `status` = 1
  ORDER BY `name`";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll();
  $this->set('funders', $results);
  }

  public function getPremiumFriends() {
    $conn = \Database::connection('jobsearch');
    $sql = "SELECT  *
    FROM `friends`
    WHERE `status` = 1
    AND `type` = 'p'
    ORDER BY `name`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $this->set('premiumfriends', $results);
  }

  public function getInKindFriends() {
    $conn = \Database::connection('jobsearch');
    $sql = "SELECT  *
    FROM `friends`
    WHERE `status` = 1
    AND `type` = 'k'
    ORDER BY `name`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $this->set('inkindfriends', $results);
  }

  public function getIndividualFriends() {
    $conn = \Database::connection('jobsearch');
    $sql = "SELECT  *
    FROM `friends`
    WHERE `status` = 1
    AND `type` = 'i'
    ORDER BY `name`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $this->set('individualfriends', $results);
  }


}
?>

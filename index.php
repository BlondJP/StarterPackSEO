<?php 

include_once('StarterPackSEO.php');

$keyword = 'jus de pomme';
$dom = new StarterPackSEO($keyword);

$dom->setH1('Nous vendons du jus de pomme');

$dom->setH2(1, 'jus de pomme en brique');
$dom->setH2(2, 'jus de pomme en bouteille');

$dom->auditSEO();

 ?>
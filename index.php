<?php

include_once('StarterPackSEO.php');

$keyword = 'jus de pomme';
$dom = new StarterPackSEO($keyword);

$dom->setTitle('Notre magasin de jus de pomme');

$dom->auditSEO();

 ?>

<?php

include_once('SeoDom.php');

$keyword = 'jus de pomme';
$env = 'dev'; // $env = 'prod';

$dom = new SeoDom($keyword, $env);

$dom->setTitle('Magasin de jus de pomme en ligne.');
$dom->setMetaDesc('ici vous trouverez tout ce que vous voulez pour acheter du jus de pomme en ligne<br>Bienvenue dans notre magasin en ligne!.');

$dom->setH1('Bienvenue dans notre magasin de jus de pomme en ligne.');

$dom->addH2('Un jus de pomme de très bonne qualité.');
$dom->addH2('D\'où viennent nos pommes ?');

$dom->auditSEO();

 ?>

# StarterPackSEO
Ce projet servira à vérifier les règles SEO sur une page à développer. Idéal pour les sites écrits en PHP from scratch.

Exemple d'utilisation:

$keyword = 'jus de pomme';
$dom = new StarterPackSEO($keyword);
$dom->setH1('Nous vendons du jus de pomme');
$dom->setH2(1, 'jus de pomme en brique');
$dom->setH2(2, 'jus de pomme en bouteille');
$dom->auditSEO();

# StarterPackSEO
Ce projet servira à vérifier les règles SEO sur une page à développer. Idéal pour les sites écrits en PHP from scratch.
<br /><br />
Exemple d'utilisation:<br />

$keyword = 'jus de pomme';<br />
$dom = new StarterPackSEO($keyword);<br />
$dom->setH1('Nous vendons du jus de pomme');<br />
$dom->setH2(1, 'jus de pomme en brique');<br />
$dom->setH2(2, 'jus de pomme en bouteille');<br />
$dom->auditSEO();<br />
<br />

#############################################<br />
################# MON AUDIT SEO #############<br />
#############################################<br />

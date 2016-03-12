# StarterPackSEO
Ce projet servira à vérifier les règles SEO sur une page à développer. Idéal pour les sites écrits en PHP from scratch.
<br /><br />
Exemple d'utilisation:<br />

$keyword = 'jus de pomme';<br />
$env = 'dev'; // ou $env = 'prod';<br />

$dom = new SeoDom($keyword, $env);<br />

$dom->setTitle('Magasin de jus de pomme en ligne.');<br />
$dom->setMetaDesc('ici vous trouverez tout ce que vous voulez pour acheter du jus de pomme en ligne<br>Bienvenue dans notre magasin en ligne!.');<br />

$dom->setH1('Bienvenue dans notre magasin de jus de pomme en ligne.');<br />

$dom->addH2('Un jus de pomme de très bonne qualité.');<br />
$dom->addH2('D\'où viennent nos pommes ?');<br />

$dom->auditSEO();<br />
<br />
#############################################<br />
################# MON AUDIT SEO #############<br />
#############################################<br />

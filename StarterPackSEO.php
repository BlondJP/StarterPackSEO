<?php


#############################################################################
#### Cette classe vérifiera les règles SEO sur un dom en développement ######
#############################################################################

class StarterPackSEO
{
	private $keyword;

	# DOM ELEMENTS
	private $title;
	private $h1;
	private $h2s;
	private $h3s;

	public function __construct($keyword)
	{
		$this->keyword = $keyword;

		$this->title = 'TITLE par default';
		$this->h1 = 'H1 par default';
		$this->h2s = [];
		$this->h3s = [];
	}

	#################################################
	####### METHODES POUR REMPLIR LE DOM ############
	#################################################

	public function setH1($h1)
	{
		$this->h1 = $h1;
	}

	public function setH2s($h2Key, $h2)
	{
		$this->h2s[$h2Key] = $h2;
	}

	public function setH3s($h3Key, $h3)
	{
		$this->h3s[$h3Key] = $h3;
	}


	#################################################
	####### METHODES POUR AUDITER LE DOM ############
	#################################################

	public function getDom()
	{
		var_dump($this);
	}

	public function auditSEO()
	{
		echo 'vous êtes au top';
	}
}

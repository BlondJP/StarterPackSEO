<?php

include_once('SeoAnalyzer.php');

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

		$this->title = NULL;
		$this->h1 = NULL;
		$this->h2s = [];
		$this->h3s = [];
	}

	#################################################
	####### METHODES POUR REMPLIR LE DOM ############
	#################################################

	public function setTitle($title)
	{
		$this->title = $title;
	}

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

	private function auditTitle()
	{
		echo '<b>Audit Title:</b><br>';
		if ($this->title != NULL)
		{
				if (strlen($this->title) > 65)
					echo '<font color="red">Attention votre title est clairement trop long, il contient '.strlen($this->title).'caractères. Vous devez avoir un title qui comporte entre 40 et 65 caractères</font><br>';
				elseif (strlen($this->title) < 65 && strlen($this->title) > 15)
				{
					echo '<font color="green">La longueur de votre title est bonne. Vous devez avoir un title qui comporte entre 15 et 65 caractères</font><br>';
					if (SeoAnalyzer::isAWordInASentence($this->keyword, $this->title) === TRUE)
						echo '<font color="green">Votre Title contient le mot-clé, il est donc optimisé</font><br>';
					else
						echo '<font color="red">Attention votre title ne contient pas le mot-clé, vous devez insérer "'.$this->keyword.'" pour qu\'il soit optimisé</font><br>';
				}
				else
					echo '<font color="red">Attention votre title est clairement trop court, il contient '.strlen($this->title).'caractères. Vous devez avoir un title qui comporte entre 40 et 65 caractères</font><br>';
		}
		else {
			echo '<font color="red">Attention vous n\'avez pas défini de title pour dans votre DOM</font><br>';
		}
		echo '<br>';
	}

	private function auditH1()
	{
		echo '<b>Audit H1:</b><br>';
		if ($this->h1 != NULL)
		{
					echo 'Note: Le H1 doit tenir en une phrase et idéalement reprendre le title.<br>';

					if (strlen($this->h1) > 200)
						echo '<font color="red">Attention votre h1 il doit idéalement faire moins de 200 caractères.</font><br>';
					else
						echo '<font color="green">La longueur de votre h1 est bonne</font><br>';

					if (SeoAnalyzer::isAWordInASentence($this->keyword, $this->h1) === TRUE)
						echo '<font color="green">Votre h1 contient le mot-clé, il est donc optimisé</font><br>';
					else
						echo '<font color="red">Attention votre h1 ne contient pas le mot-clé, vous devez insérer "'.$this->keyword.'" pour qu\'il soit optimisé.<br>Idéalement votre H1 doit ressembler à votre title</font><br>';
	}
		else {
			echo '<font color="red">Attention vous n\'avez pas défini de H1 pour dans votre DOM</font><br>';
		}
		echo '<br>';
	}

	private function audith2s()
	{
		if (count($this->h2s) === 0)
			echo '<font color="red">Attention vous n\'avez pas défini de H2 pour dans votre DOM</font><br>';
		else
			foreach ($this->h2s as $h2Key => $h2Value)
			{
				echo 'Note: Vos balises H2 doivent être courtes et doitvent définir le paragraphe qui va suivre';
				if (SeoAnalyzer::isAWordInASentence($this->keyword, $this->h2) === TRUE)
						echo "<font color=\"green\">Votre h2 <b>$h2Key</b> contient le mot-clé <b>$this->h2</b>, il est donc optimisé</font><br>";
				else
						echo '<font color="red">Attention votre h2:'.$this->h2.' ne contient pas le mot-clé, vous devez insérer "'.$this->keyword.'" pour qu\'il soit optimisé.<br>Idéalement votre H1 doit ressembler à votre title</font><br>';
			}
	}


	// meta desc < 156
	// pas de strong dans les hn

	public function auditSEO()
	{
		echo '<meta charset="utf-8">';
		$this->auditTitle();
	}
}
<?php

include_once('SeoAnalyzer.php');

#############################################################################
#### Cette classe vérifiera les règles SEO sur un dom en développement ######
#############################################################################

class SeoDom
{
	# ENVIRONNEMENT WEB
	private $keyword;
	private $env;

	# ELEMENTS DU DOM
	private $title;
	private $metaDesc;
	private $h1;
	private $h2s;

	public function __construct($keyword, $env)
	{
		# ENVIRONNEMENT WEB
		$this->keyword = $keyword;
		$this->env = $env;

		# ELEMENTS DU DOM
		$this->title = NULL;
		$this->metaDesc = NULL;
		$this->h1 = NULL;
		$this->h2s = [];
	}

	#################################################
	####### METHODES POUR REMPLIR LE DOM ############
	#################################################
	public function setTitle($title){$this->title = $title;}

	public function setMetaDesc($metaDesc){$this->metaDesc = $metaDesc;}

	public function setH1($h1){$this->h1 = $h1;}

	public function addH2($h2){$this->h2s[] = $h2;}

	#################################################
	####### METHODES POUR AUDITER LE DOM ############
	#################################################
	private function auditTitle()
	{
		echo '<b>Audit SEO de la balise '.htmlentities('<title>').'</b><br>';
		if ($this->title != NULL)
		{
				if (strlen($this->title) > 70)
					echo '<font color="red">Attention votre title est clairement trop long, il contient '.strlen($this->title).'caractères. Vous devez avoir un title qui comporte moins de 70 caractères</font><br>';
				elseif (strlen($this->title) < 70 && strlen($this->title) > 15)
				{
					echo '<font color="green">La longueur de votre title est bonne. Vous devez avoir un title qui comporte entre 15 et 70 caractères</font><br>';
					if (SeoAnalyzer::isAWordInASentence($this->keyword, $this->title) === TRUE)
						echo '<font color="green">Votre Title contient le mot-clé, il est donc optimisé</font><br>';
					else
						echo '<font color="red">Attention votre title ne contient pas le mot-clé, vous devez insérer "'.$this->keyword.'" pour qu\'il soit optimisé</font><br>';
				}
				else
					echo '<font color="red">Attention votre title est clairement trop court, il contient '.strlen($this->title).'caractères. Vous devez avoir un title qui comporte entre 40 et 70 caractères</font><br>';
		}
		else {
			echo '<font color="red">Attention vous n\'avez pas défini de title pour dans votre DOM</font><br>';
		}
		echo '<br>';
	}

	private function auditMetaDesc()
	{
		echo '<b>Audit SEO de la balise '.htmlentities('<meta name="description" content="description de la page" />').'</b><br>';
		if ($this->metaDesc != NULL)
		{
			if (strlen($this->metaDesc) > 156)
				{
					echo '<font color="red">Attention: Votre balise <b>meta -> description</b> est dépasse les 156 caractères, dans ce cas elle ne sera pas lisible dans google. Vous devez la raccourcir. </font><br>';
				}
				else {
					if (SeoAnalyzer::isAWordInASentence($this->keyword, $this->title) === TRUE)
						echo '<font color="green">Attention: Votre balise <b>meta -> description</b> est optimisée.</font><br>';
					else
						echo '<font color="red">Attention: Votre balise <b>meta -> description</b> ne contient pas le mot-clé : <b>$this->keyword</b></font><br>';
				}
		}
		else
			echo '<font color="red">Attention vous n\'avez pas défini de balise <b>meta -> description</b> pour dans votre DOM</font><br>';
		echo '<br>';
	}

	private function auditH1()
	{
		echo '<b>Audit SEO de la balise '.htmlentities('<h1>').'</b><br>';
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
		echo '<b>Audit SEO de(s) balise(s) '.htmlentities('<h2>').'</b><br>';
		echo 'Note: Vos balises H2 doivent être courtes, doivent définir le paragraphe qui va suivre et éventuellement contenir le Mot-clé<br>';
		if (count($this->h2s) === 0)
			echo '<font color="red">Attention vous n\'avez défini aucun H2 pour dans votre DOM</font><br>';
		else
			foreach ($this->h2s as $h2Key => $h2Value)
			{
				$realIndex = $h2Value+1;
				if (SeoAnalyzer::isAWordInASentence($this->keyword, $h2Value) === TRUE)
						echo "<font color=\"green\">Votre h2 <b>$h2Value</b> est bien optimisé car il contient le mot-clé <b>$this->keyword</b>.<br>";
				else
						echo '<font color="red">Attention votre h2:'.$h2Value.' ne contient pas le mot-clé, vous devez insérer "'.$this->keyword.'" pour qu\'il soit optimisé</font><br>';
			}
	}


	####################################
	### METHODES POUR AFFICHER LE DOM ##
	####################################
	public function getTitle(){return $this->title;}
	public function getMetaDesc(){return $this->metaDesc;}
	public function getH1(){return $this->h1;}
	public function getH2($h2Index)
	{
		$h2Index--;
		if (isset($this->h2s[$h2Index]))
			return $this->h2s[$h2Index];
		else
			return '';
	}




	public function auditSEO()
	{
		echo '<meta charset="utf-8">';
		if ($this->env == 'dev' || $this->env == NULL)
		{
			$this->auditTitle();
			$this->auditMetaDesc();
			$this->auditH1();
			$this->audith2s();
		}
		elseif ($this->env == 'prod')
		{
			# En prod SeoDom ne doit rien afficher
		}
		else {
			# Cas d'erreur
			echo 'Attention vous avez mal défini votre environnement';
		}

	}
}

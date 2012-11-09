<?php
session_start();
@include("configuration/blog.php");
@include("configuration/sql.php");
include("configuration/litetemplate.class.php");

$tpl = new liteTemplate();


if(isset($_SESSION['pseudo']) && isset($_SESSION['mdp']))
{
	if($_SESSION['pseudo'] == $adm_pse && $_SESSION['mdp'] == $mot_de_passe)
	{
		echo '<center><a href="admin/connecte.php">>> Cliquez ici pour acceder &agrave; l\'administration <<</a></center>';
	}else {
		$tpl->file("admin/tpl/default/connexion.php");
		$tpl->view();
	}
}else {
	// Verification connexion ..
	if(isset($_GET['pseudo']) && isset($_GET['mdp']))
	{
		$pseudo = htmlentities($_GET['pseudo']);
		$mdp = htmlentities($_GET['mdp']);
		//echo $pseudo;
		if($pseudo == $adm_pse && $mdp == $mot_de_passe)
		{
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['mdp'] = $mdp;
			
			echo '<center><a href="admin/connecte.php">>> Cliquez ici pour acceder &agrave; l\'administration <<</a></center>';
		}else {
		// Page de connexion
		$tpl->file("admin/tpl/default/connexion.php");
		$tpl->view();
	}
	}else {
		// Page de connexion
		$tpl->file("admin/tpl/default/connexion.php");
		$tpl->view();
	}
}
?>

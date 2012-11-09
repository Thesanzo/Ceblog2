<?php
session_start();
include('../configuration/sql.php');
include('../configuration/blog.php');

include('../configuration/litetemplate.class.php');

$tpl = new liteTemplate();

if(isset($_SESSION['pseudo']) && isset($_SESSION['mdp']))
{
	if($_SESSION['pseudo'] != $adm_pse && $_SESSION['mdp'] != $mot_de_passe)
	{
		echo "CeBlog :: Hack Attempted";
		exit();
	}
}else {
	echo "CeBlog :: Vous &ecirc;tes pas connect&eacute;";
	exit();
}

$menu = array("Adm.", "Ajouter un article", "Articles", "Cat&eacute;gories", "Commentaires", "Chat");
$menu_link = array("connecte.php", "addarticle.php", "article.php", "cat.php", "coms.php", "chat.php");

$tpl->file("tpl/default/header.php");
$tpl->assignTag("MENU", 1, array("TITRE"=>$menu,
								"LINK"=>$menu_link));
$tpl->assign(array("SITE"=>$name));
$tpl->view();
?>

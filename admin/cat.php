<?php
include('header.php');

$tpl->file("tpl/default/cat.php");

// Insertion
if(isset($_POST['cat']))
{
	$cat= mysql_real_escape_string($_POST['cat']);
	$modif = htmlentities($_POST['modif']);
	
	if($modif == 0)
	{
		mysql_query("INSERT INTO categorie VALUES('', '".$cat."')");
		echo "Cat&eacute;gorie ajout&eacute;";
	}else {
		mysql_query("UPDATE categorie SET nom='".$cat."' WHERE id='".$modif."' ");
		echo "Cat&eacute;gorie modifi&eacute;";
	}
}


if(isset($_GET['cat']))
{
	$cat = htmlentities($_GET['cat']);
	$sql = mysql_query("SELECT * FROM categorie WHERE id='".$cat."'");
	
	$nomc = array();
	$idc = array();
	while($cat = mysql_fetch_array($sql))
	{
		$nomc[] = $cat['nom'];
		$idc[] = $cat['id'];
	}
}else {
	$nomc = array();
	$idc = array();
	
	$nomc[] = NULL;
	$idc[] = 0;
}
// Suppression
if(isset($_GET['suppr']))
{
	mysql_query("DELETE FROM categorie WHERE id='".htmlentities($_GET['suppr'])."'");
}
// Affichage
$sql = mysql_query("SELECT * FROM categorie ORDER BY id DESC");

$id = array();
$nom = array();

while($cat = mysql_fetch_array($sql))
{
	$id[] = $cat['id'];
	$nom[] = $cat['nom'];
}

$glob = array("ID"=>$id,"TITRE"=>$nom);
$glob_modif = array("MODIF"=>$idc,"CAT"=>$nomc);

$tpl->assignTag("LISTING", 1, $glob);
$tpl->assignTag("MODIF", 1, $glob_modif);

$tpl->view();

include('footer.php');
?>

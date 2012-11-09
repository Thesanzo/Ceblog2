<?php
include('header.php');

$tpl->file('tpl/default/article.php');

if(isset($_POST['title']) && isset($_POST['cat']) && isset($_POST['message']) && isset($_POST['modif']))
{
	$title = htmlentities($_POST['title']);
	$cat = htmlentities($_POST['cat']);
	$msg = utf8_encode($_POST['message']);
	$modif = htmlentities($_POST['modif']);
	
	// C'est une création ??
	if($modif == 0)
	{
		// Evidemment ...
		$etat = "Votre article &agrave; &eacute;tais cr&eacute;er avec succ&egrave;s !";
		
		// On ajoute 
		mysql_query("INSERT INTO articles VALUES('', '".$cat."', '".$title."', '".$msg."', '".time()."', '".$adm_pse."')");
		echo $etat;
	}else {
		// Bah Non ...
		$etat = "Votre article &agrave; &eacute;tais modifi&eacute; avec succ&egrave;s !";
		
		// On modifie
		mysql_query("UPDATE articles SET title='".$title."', content='".$msg."', idc='".$cat."' WHERE id_news='".$modif."'")or die(mysql_error());
		echo $etat;
	}
}
// Suppression
if(isset($_GET['suppr']))
{
	mysql_query("DELETE FROM articles WHERE id_news='".htmlentities($_GET['suppr'])."'")or die(mysql_error());
	echo "Article supprim&eacute;";
}
// Affichage des article existant
$sql = mysql_query("SELECT * FROM articles
LEFT JOIN categorie
ON articles.idc = categorie.id
ORDER BY articles.id_news DESC");

$id = array();
$titre = array();
$cat = array();

while($article = mysql_fetch_array($sql))
{
	$id[] = $article['id_news'];
	$titre[] = $article['title'];
	$cat[] = $article['nom'];
}

$global = array("TITRE"=>$titre,"ID"=>$id,"CAT"=>$cat);

$tpl->assignTag("ARTICLE", 1, $global);
$tpl->view();

include('footer.php');

?>

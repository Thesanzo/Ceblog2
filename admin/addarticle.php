<?php
include('header.php');
$tpl->file("tpl/default/addarticle.php");

if(isset($_GET['id']) || $_GET['id'] != 0)
{
	$id = htmlentities($_GET['id']);
	$sql = mysql_query("SELECT * FROM articles
	LEFT JOIN categorie
	ON articles.idc = categorie.id
	WHERE articles.id_news = '".$id."'");
	
	//
	$id_article = array();
	$titre = array();
	$content = array();
	$idc = array();
	$nom = array();
	
	//
	$article = mysql_fetch_array($sql);
	
//
	$id_article[] = $article['id_news'];
	$titre[] = $article['title'];
	$content[] = utf8_encode($article['content']);
	$idc[] = $article['id'];
	$nom[] = $article['nom'];
	//
	$array = array("ID"=>$id_article,
					"TITRE"=>$titre,
					"CONTENT"=>$content);
	$cate = array("SELECTED"=>$idc,
				"TT"=>$nom);
}else {
	$id_article = array();
	$titre = array();
	$content = array();
	$idc = array();
	$nom = array();
	
	// Requete MYSQL (catégorie)
	$sql = mysql_query("SELECT * FROM categorie ORDER BY id DESC") or die(mysql_error());
	
	// Boucle
	while($cat = mysql_fetch_array($sql))
	{
		$idc[] = $cat['id'];
		$nom[] = $cat['nom'];
	}
	
	//
	$id_article[] = 0;
	$titre[] = "";
	$content[] = "";
	
	//
	$array = array("ID"=>$id_article,
					"TITRE"=>$titre,
					"CONTENT"=>$content,
					);
	$cate = array("SELECTED"=>$idc,"TT"=>$nom);
	
}

// Parsage
$tpl->assignTag("FORM", 1, $array);
$tpl->assignTag("CATEGORIE",1, $cate);
$tpl->view();
include('footer.php');
?>

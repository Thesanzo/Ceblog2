<?php
include('header.php');
$tpl->file("themes/".$theme."/article.php");
// Article
$i = 1;
$nbr_article = 5;

$id = array();
$title = array();
$content = array();
$categorie = array();
$date = array();
$authors = array();
$idcat = array();

$sql = mysql_query("SELECT * FROM articles 
LEFT JOIN categorie
ON articles.idc=categorie.id
ORDER BY articles.id_news DESC LIMIT ".$i.",".$nbr_article."")or die(mysql_error());
include("configuration/bbcode.php");
while($exec = mysql_fetch_array($sql))
{
	$cont = parsage_bbcode(nl2br($exec['content']), 1);
	
	$id[] = $exec['id_news'];
	$title[] = $exec['title'];
	$content[] = $cont;
	$categorie[] = utf8_decode($exec['nom']);
	$date[] = date('d/m/Y \&\a\g\r\a\v\e H\hi', $exec['date']);
	$authors[] = $exec['author'];
	$idcat[] = $exec['idc'];
}

// Plugin News::A la une'
$last_id = array();
$last_title = array();
$last_content = array();
$last_cat = array();
$last_date = array();
$last_author = array();
$last_idc = array();
$sql = mysql_query("SELECT * FROM articles 
LEFT JOIN categorie
ON articles.idc=categorie.id
ORDER BY articles.id_news DESC");
$fetch = mysql_fetch_array($sql);
//echo $fetch['title'];

$last_id[] = $fetch['id_news'];
$last_title[] = $fetch['title'];
$last_content[] = parsage_bbcode(nl2br($fetch['content']), 1);;
$last_cat[] = utf8_decode($fetch['nom']);
$last_date[] = date('d/m/Y \&\a\g\r\a\v\e H\hi', $fetch['date']);
$last_author[] = $fetch['author'];
$last_idc[] = $fetch['idc'];

$alaune = array("ID_ART"=>$last_id,
						"TITLE_ART"=>$last_title,
						"CONTENT_ART"=>$last_content,
						"CATEGORIE_ART"=>$last_cat,
						"DATE_ART"=>$last_date,
						"AUTHOR_ART"=>$last_author,
						"IDCAT_ART"=>$last_idc
						);

						
$glob = array("ID"=>$id,
					"TITLE_N"=>$title,
					"CONTENT"=>$content,
					"CATEGORIE"=>$categorie,
					"PSEUDO"=>$authors,
					"DATE"=>$date,
					"IDCATE"=>$idcat
					);

$tpl->assignTag("NEWS", 1, $alaune);
$tpl->assignTag("NEWS", 2, $glob);

$tpl->view();

include('footer.php');
?>


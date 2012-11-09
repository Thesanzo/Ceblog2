<?php
include("configuration/blog.php");
include("configuration/sql.php");
include("configuration/litetemplate.class.php");

$tpl = new liteTemplate();
$tpl->file("themes/".$theme."/archive.php");


$id = array();
$article = array();
$idc = array();
$nom_cat = array();
$date = array();


// Recherche
$ids = array();
$art = array();
if(isset($_GET['search']))
{
	$s = 1;
	$search = htmlentities($_GET['search']);
	$sql = mysql_query("SELECT * FROM articles WHERE title LIKE '%$search%' ORDER BY id_news DESC")or die(mysql_error());
	while($exec = mysql_fetch_array($sql))
{
	$ids[] = $exec['id_news'];
	$art[] = $exec['title'];
}
}else {
$s = 0;
$sql = mysql_query("SELECT * FROM articles 
LEFT JOIN categorie
ON articles.idc=categorie.id
ORDER BY articles.id_news DESC")or die(mysql_error());

while($exec = mysql_fetch_array($sql))
{
	$id[] = $exec['id_news'];
	$article[] = $exec['title'];
	$idc[] = $exec['idc'];
	$nom_cat[] = $exec['nom'];
	$date[] = date("d/m/Y", $exec['date']);
	
}
}

$glob = array("ID"=>$id,
					"ARTICLE"=>$article,
					"IDCAT"=>$idc,
					"NOMCAT"=>$nom_cat,
					"DATE"=>$date);

$glob_search = array("IDS"=>$ids,"ART"=>$art);
if($s == 0)
{
$tpl->assignTag("ARCHIVE", 1, $glob);
}else {
$tpl->assignTag("ARCHIVE", 2,$glob_search);
}
$tpl->view();

?>
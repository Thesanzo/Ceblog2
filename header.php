<?php

if(!file_exists('configuration/sql.php'))
{
	header("Location: install.php");
}

session_start();
include("configuration/blog.php");
include("configuration/sql.php");

if(!file_exists("themes/".$theme.""))
{
	echo "CeBlog :: Le theme n'existe pas";
	exit();
}

if(file_exists('install.php') && $install == true)
{
	echo "CeBlog :: Merci d'effacer install.php";
	exit();
}

if(!$_SECURE || $_SECURE == 0)
{
	echo "CeBlog :: Hack Attempted";
	exit();
}


// Moteur Template
include("configuration/litetemplate.class.php");
$tpl = new liteTemplate();
$tpl->file("themes/".$theme."/header.php");

$nom_site = $name;

// Date en français

function date_fr()
{
$time = time();
$jour = array();
$mois = array();


$table_jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$table_mois = array("01" => "Janvier",
		"02" => "Février",
		"03" => "Mars",
		"04" => "Avril",
		"05" => "Mai",
		"06" => "Juin",
		"07" => "Juillet",
		"08" => "Août",
		"09" => "Septembre",
		"10" => "Octobre",
		"11" => "Novembre",
		"12" => "Décembre");

$days = date('w', $time);
$mois = date('m', $time);
$ch = date("d", $time);
$ans = date("Y", $time);
echo  "Nous sommes le ".$table_jour[$days]." ".$ch." ".$table_mois[$mois]." ".$ans."";
}

// MENU
$links = array("index.php", "chat.php");
$titre_menu = array("Accueil", "Chat",);

//MENU AJAX
$links_ajax = array("archive.php", "admin.php");
$titre_ajax = array("Archive", "Administration");

//Categorie
$id_cat = array();
$nmcat = array();

$sql_cat = mysql_query("SELECT * FROM categorie");

while($cat = mysql_fetch_array($sql_cat))
{
	$id_cat[] = $cat['id'];
	$nmcat[] = utf8_decode($cat['nom']);
}

$glob_cat = array("IDCAT"=>$id_cat,
						"NOMCAT"=>$nmcat);


//Derniers article
$id = array();
$nmart = array();
$sql = mysql_query("SELECT * FROM articles ORDER BY id_news DESC LIMIT 0,5");
while($art = mysql_fetch_array($sql))
{
	$id[] = $art['id_news'];
	$nmart[] = $art['title'];
}

$glob = array("ID"=>$id,
	"_ARTICLE"=>$nmart);
// Parsage

$tpl->assign(array("TITRE"=> $nom_site));
$tpl->assignTag("MENU", 1, array("LIEN"=>$links,
				"TITREM"=>$titre_menu,
				"TITRE_AJAX"=>$titre_ajax,
				"LIEN_A"=>$links_ajax));
$tpl->assignTag("MENU", 2, $glob_cat);
$tpl->assignTag("MENU", 3, $glob);

$tpl->view();
?>


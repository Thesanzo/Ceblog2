<?php

if(isset($_GET['cat']))
{
	include('header.php');
	include('configuration/bbcode.php');
	$tpl->file("themes/".$theme."/article.php");
	
	$cat = htmlentities($_GET['cat']);
	$premier_message = 0;
	$dernier_message = 5;
	
	$sql = mysql_query("SELECT * FROM articles
	LEFT JOIN categorie
	ON articles.idc = categorie.id
	WHERE categorie.id='".$cat."'
	ORDER BY articles.id_news
	DESC LIMIT ".$premier_message.",".$dernier_message."")or die(mysql_error());
	
	$result = @mysql_result($sql,0);
	if($result != 0)
	{
		$id = array();
		$titre = array();
		$content = array();
		$date = array();
		$pseudo = array();
		$categorie = array();
		$idc = array();
		
		while($article = mysql_fetch_array($sql))
		{
			$titre[] = $article['title'];
			$content[] = parsage_bbcode(nl2br($article['content']),1);
			$date[] = date('d/m/Y \&\a\g\r\a\v\e H\hi', $article['date']);
			$pseudo[] = $article['author'];
			$categorie[] = utf8_decode($article['nom']);
			$idc[] = $article['idc'];
			$id[] = $article['id_news'];
		}
		
		// Plugin "A la une"
		$plug_sql = mysql_query("SELECT * FROM articles
		LEFT JOIN categorie
		ON articles.idc = categorie.id
		WHERE categorie.id='".$cat."'
		ORDER BY articles.id_news
		DESC")or die(mysql_error());
		
		$plug_article = mysql_fetch_array($plug_sql);
		
		$plug_title = array();
		$plug_content = array();
		$plug_date = array();
		$plug_pseudo = array();
		$plug_categorie = array();
		$plug_idc = array();
		$plug_id = array();
		
		// Assertion
		$plug_title[] = $plug_article['title'];
		$plug_content[] = parsage_bbcode(nl2br($plug_article['content']), 1);
		$plug_date[] = date('d/m/Y \&\a\g\r\a\v\e H\hi', $plug_article['date']);
		$plug_pseudo[] = $plug_article['author'];
		$plug_categorie[] = utf8_decode($plug_article['nom']);
		$plug_idc[] = $plug_article['idc'];
		$plug_id[] = $plug_article['id_news'];
		
		// On en roule le tout
		$nw = array("ID"=>$id,
		"TITLE_N"=>$titre,
		"CONTENT"=>$content,
		"CATEGORIE"=>$categorie,
		"PSEUDO"=>$pseudo,
		"DATE"=>$date,
		"IDCATE"=>$idc
		);
		
		$alaune = array("ID_ART"=>$plug_id,
		"TITLE_ART"=>$plug_title,
		"CONTENT_ART"=>$plug_content,
		"CATEGORIE_ART"=>$plug_categorie,
		"DATE_ART"=>$plug_date,
		"AUTHOR_ART"=>$plug_pseudo,
		"IDCAT_ART"=>$plug_idc);
		
		// Assignation
		$tpl->assignTag("NEWS", 1, $alaune);
		$tpl->assignTag("NEWS", 2, $nw);
		
		// Affichage !
		$tpl->view();
		
		include('footer.php');
	}else {
		echo "Categorie inexistante";
		include('footer.php');
	}
}
?>

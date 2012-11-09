<?php

// On demande la lecture d'un article ??
$err1 = "L'article n'existe pas ou plus";
$err2 = "<center>Cette article ne contient pas de commentaire<br>Soyez le premier à poster un commentaire !</center>";
$err3 =  "Le code de verification est incorrecte";
$err4 = "Tous les champs sont obligatoire";

// Commentaire
if(isset($_POST['pseudo']) && isset($_POST["message"]) && isset($_POST["captcha"]))
{
	@include('header.php');
	$err = NULL;
	$pseudo = htmlentities($_POST['pseudo']);
	$message = htmlentities($_POST['message']);
	$captcha = htmlentities($_POST['captcha']);
	
	if(!empty($pseudo) && !empty($message) && !empty($captcha))
	{
	
		if($_SESSION['aleat_nbr'] == $captcha)
		{
			mysql_query("INSERT INTO commentaire VALUES('', '".$_GET['a']."', '".$pseudo."', '".$message."', '".time()."')")or die(mysql_error());
			echo '<META http-equiv="Refresh" content="0; URL=article.php?a='.$_GET['a'].'">';
		}		

	}	

}

// Article
if(isset($_GET['a']))
{
	$a = htmlentities($_GET['a']);
	if(is_numeric($a))
	{

		// Article
	@	include('header.php');
		$query_article = mysql_query("SELECT * FROM articles 
		LEFT JOIN categorie
		ON articles.idc=categorie.id
		WHERE articles.id_news='".$a."' ")or die(mysql_error());
		$true = @mysql_result($sql,0);
		if($true == true)
		{
			$tpl->file("themes/".$theme."/view.php");
				
			//BBCode Powa !!
			include("configuration/bbcode.php");
			
			$article = mysql_fetch_array($query_article);
			$parsage = parsage_bbcode(nl2br($article['content']), 1);
			
			// Initiation des tableau
			$id = array();
			$title = array();
			$categorie = array();
			$id_categorie = array();
			$contenue = array();
			$date = array();
			
			// Remplissage
			
			$id[] = $article['id_news'];
			$title[] = $article['title'];
			$categorie[] = utf8_decode($article['nom']);
			$id_categorie[] = $article['idc'];
			$contenue[] = $parsage;
			$date[] =  date('d/m/Y \&\a\g\r\a\v\e H\hi', $article['date']);
			
			// On en roule !
			$final_article = array("ID"=>$id,
			"TITRE"=>$title,
			"CATEGORIE"=>$categorie,
			"IDCAT"=>$id_categorie,
			"CONTENT"=>$contenue,
			"LAST_DATE"=>$date);
			
			// Parsage des article
			
			$tpl->assignTag("ARTICLE", 1, $final_article);
			$tpl->assign(array("ID"=>$article['id_news']));
			
			// Commentaire 
			
			$query = mysql_query("SELECT * FROM commentaire WHERE idn='".$a."' ORDER BY id DESC");
			$row = mysql_num_rows($query);
			//Tableau de commentaire
			$pseudo = array();
			$message = array();
			$quand = array();
			
			// Quelqu'un a t'il posté un commentaire ??
			if($row == 0)
			{
				// Bah non ...
				$secure = 0;
			}else {
			
			$secure = 1;
			// Boucle
			while($commentaire = mysql_fetch_array($query))
			{
				$pseudo[] = $commentaire['pseudo'];
				$message[] = parsage_bbcode(nl2br($commentaire['message']), 0); // Reconnu comme un commentaire;
				$quand[] = date('d/m/Y \à H\hi', $commentaire['date']);
			}
			
			// On en roule !
			$final_com = array("PSEUDO"=>$pseudo,
			"MESSAGE"=>$message,
			"QUAND"=>$quand);
			
			}
			
			if($secure == 1)
			{
				$tpl->assignTag("COMS", 1, $final_com);
			}else {
				$tpl->assign(array("ERRCOM"=>$err2));
			}
			
		
			
			// Affichage final
			$tpl->view();
			include('footer.php');
			exit();
		}else {
		echo $err1;
		include('footer.php');
		exit();
		}
	}
}
?>

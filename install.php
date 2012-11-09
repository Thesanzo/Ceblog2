<?php

if($_GET['step'] == "")
{
	echo "Bienvenue sur l'installation de CeBlog 2 Beta<br />";
	echo "<a href='?step=1'>>> Cliquer ici pour commencer</a><br />";
}

if($_GET['step'] == 1)
{
?>
<strong>Information base de donn&eacute;e</strong><p />
<form name="form1" method="post" action="?step=2">
  <label>H&ocirc;te: </label>
    <input type="text" name="sql" id="sql"><br />
  <label>Utilisateur: </label>
    <input type="text" name="user" id="user"><br />
  <label>Mot de passe: </label>
    <input type="password" name="mdp" id="mdp"><br />
  <label>Base: </label>
  <input type="text" name="base" id="base">
  <br />
    
  <label>
    <input type="submit" name="button" id="button" value="Envoyer">
  </label>
</form>
<p />
<?php
}

if($_GET['step'] == 2)
{
	$link = @mysql_connect($_POST['sql'], $_POST['user'], $_POST['mdp']);
	if($link)
	{
?>
<strong>Connexion &agrave; la base OK</strong><br />
<form name="form2" method="post" action="?step=3">
  <input type="hidden" name="sql" value="<?php echo $_POST['sql']; ?>" /><input type="hidden" name="user" value="<?php echo $_POST['user']; ?>" /><input type="hidden" name="mdp" value="<?php echo $_POST['mdp']; ?>" /><input type="hidden" name="base" value="<?php echo $_POST['base']; ?>" /><input type="submit" name="button2" id="button2" value="CREATION DES TABLES SQL">
</form>
<?php
	}
}

if($_GET['step'] == 3)
{
	mysql_connect($_POST['sql'], $_POST['user'], $_POST['mdp']);
	mysql_select_db($_POST['base']);
	
	$sql1 = "CREATE TABLE IF NOT EXISTS `articles` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `idc` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(13) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id_news`),
  KEY `id` (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
	
	mysql_query($sql1)or die(mysql_error());
	
	$sql2 = "CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

	mysql_query($sql2) or die(mysql_error());
	
	$sql3 = "CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	
	mysql_query($sql3) or die(mysql_error());
	
	$sql4 = "CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idn` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

	mysql_query($sql4) or die(mysql_error());
	
	$sql5 = utf8_decode("INSERT INTO `articles` (`id_news`, `idc`, `title`, `content`, `date`, `author`) VALUES
(1, 1, 'Bienvenue sur CeBlog', 'Si vous voyez ce message, cela veut dire que vous avez [b]correctement[/b] installé Ceblog Beta \r\n\r\nN''oubliez pas que si vous avez une erreur, merci de le signaler', '1240833351', 'CeBlog');
");

	mysql_query($sql5) or die(mysql_error());
	
	$sql6 = utf8_decode("INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Non ClassÃ©');");

	mysql_query($sql6) or die(mysql_error());
	
	$sql6 = "INSERT INTO `commentaire` (`id`, `idn`, `pseudo`, `message`, `date`) VALUES
(1, 1, 'Monsieur CeBlog', 'Voici un commentaire de test :mrgreen:', '1240833809');";

	mysql_query($sql6) or die(mysql_error());
	
	$config = "<?php
// Script Configurator
	
\$host = \"".$_POST['sql']."\";
\$user = \"".$_POST['user']."\";
\$mdp = \"".$_POST['mdp']."\";

\$database = \"".$_POST['base']."\";

// Do not touch
mysql_connect(\$host, \$user, \$mdp);
mysql_select_db(\$database);

\$install = true;
?>
	";
	
	$fp = fopen("configuration/sql.php", "w+");
	fwrite($fp, $config);
	fclose($fp);
?> Creation des tables SQL Fini !
<form name="form3" method="post" action="?step=4">
  <label>Titre du blog:</label>
    <input type="text" name="titre" id="titre"><br />
  <label>Pseudo:</label>
    <input type="text" name="pseudo" id="pseudo"><br />
  <label>Mot De Passe:</label>
  <input type="password" name="mdp" id="mdp">
  <br />
  <label>
    <input type="submit" name="button3" id="button3" value="CREATION DU FICHIER DE CONFIGURATION">
  </label>
</form>
<?php
}

if($_GET['step'] == 4)
{
	$fp = fopen("configuration/blog.php", "w+");
	$user = "<?php
// Nom du site
\$name = \"".$_POST['titre']."\";

// Theme
\$theme = \"default\";

// VOUS

\$adm_pse = \"".$_POST['pseudo']."\";
\$mot_de_passe = \"".$_POST['mdp']."\";

\$_SECURE = 1;
?>";

	fwrite($fp, $user);
	fclose($fp);
	
	@unlink('install.php');
?> Installation fini !<br />
<a href="index.php">Cliquer ici pour acceder a votre blog</a>
<?php
}
?>

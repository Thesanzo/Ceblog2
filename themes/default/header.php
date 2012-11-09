
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<!-- DEBUT DU SCRIPT -->

<!-- FIN DU SCRIPT -->
    <title>{$TITRE}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" media="screen" type="text/css" title="Vert et sombre" href="themes/default/design/style.css" />
  <script src="ajax/lib/prototype.js" type="text/javascript"></script>
  <script src="ajax/lib/scriptaculous.js" type="text/javascript"></script>
  <script src="ajax/lib/unittest.js" type="text/javascript"></script>
  <script type="text/javascript" src="ajax/modalbox.js"></script>
	<link rel="stylesheet" href="ajax/modalbox.css" type="text/css" >

</head>
<body>
   
   <div id="header">
	<div class="logo"></div>
   </div>
   
   <div id="header_deco">
   </div>
   
   <div id="header_imp">
<noscript>
<strong><span style='color:red;'>/!\ Le Javascript doit être activé /!\</span></strong>
</noscript>
</div>
   
   <div id="menu_gauche">
	 <div class="menu_bloc">
	   <h3>Navigation</h3>
		
	   <ul>
{MENU id=1}
		   <li><a href="{$LIEN}">{$TITREM}</a></li>
		   <li><a href="{$LIEN_A}" title="{$TITRE_AJAX}" onclick="Modalbox.show(this.href, {title: this.title, width: 400}); return false;">{$TITRE_AJAX}</a></li>
{/MENU}		  
 	<h4 class="menu_categorie">Cat&eacute;gorie</h4>
{MENU id=2}
			<li><a href="categorie.php?cat={$IDCAT}">{$NOMCAT}</a></li>
{/MENU}
	<h4 class="menu_categorie">Derniers articles</h4>
{MENU id=3}
		   <li><a href="article.php?a={$ID}">{$_ARTICLE}</a></li>
{/MENU}

	</div>
   </div>
   
   <div id="corps">
	<h2></h2>

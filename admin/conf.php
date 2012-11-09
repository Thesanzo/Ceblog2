<?php
session_start();
@include("../configuration/blog.php");
@include("../configuration/sql.php");
include("../configuration/litetemplate.class.php");
$_SECURE = 1;

$tpl = new liteTemplate();

function secure($foo)
{
	if($foo != 1)
	{
		echo "CeBlog :: Hack Attempted";
		exit();
	}
	
	return $foo;
}

if(isset($_SESSION['pseudo']) && isset($_SESSION['mdp']))
{
	if($_SESSION['pseudo'] != $adm_pse && $_SESSION['mdp'] != $mot_de_passe)
	{
		echo "CeBlog :: Hack Attempted";
		exit();
	}
}


secure($_SECURE);
?>

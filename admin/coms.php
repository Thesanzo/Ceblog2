<?php
include('header.php');

$tpl->file('tpl/default/coms.php');

if(isset($_GET['suppr']))
{
	mysql_query("DELETE FROM commentaire WHERE id='".htmlentities($_GET['suppr'])."'");
}

$sql = mysql_query("SELECT * FROM commentaire ORDER BY id DESC");
$id = array();
$idn = array();
$pseudo = array();
$msg = array();

while($coms = mysql_fetch_array($sql))
{
	$id[] = $coms['id'];
	$idn[] = $coms['idn'];
	$pseudo[] = $coms['pseudo'];
	$msg[] = $coms['message'];
}

$glob = array("ID"=>$id,"IDN"=>$idn,"PSEUDO"=>$pseudo,"MSG"=>$msg);
$tpl->assignTag("LISTING", 1, $glob);
$tpl->view();
include('footer.php');
?>

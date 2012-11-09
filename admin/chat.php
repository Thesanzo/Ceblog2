<?php
include('header.php');

$tpl->file('tpl/default/chat.php');

if(isset($_GET['suppr']))
{
	mysql_query("DELETE FROM chat WHERE id='".htmlentities($_GET['suppr'])."'");
}

$sql = mysql_query("SELECT * FROM chat ORDER BY id DESC");
$id = array();
$pseudo = array();
$msg = array();

while($chat = mysql_fetch_array($sql))
{
	$id[] = $chat['id'];
	$pseudo[] = $chat['pseudo'];
	$msg[] = $chat['message'];
}

$glob = array("ID"=>$id,"PSEUDO"=>$pseudo,"MSG"=>$msg);
$tpl->assignTag("LISTING", 1, $glob);
$tpl->view();
include('footer.php');
?>

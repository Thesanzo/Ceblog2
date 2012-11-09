<?php
include('header.php');
$tpl->file("themes/".$theme."/chat.php");

// Insertion Message
if(isset($_POST['pseudo']) && isset($_POST['message']))
{
	if(!empty($_POST['pseudo']) && !empty($_POST['message']))
	{
		$pseudo = htmlentities($_POST['pseudo']);
		$message = htmlentities($_POST['message']);
		
		mysql_query("INSERT INTO chat VALUES('', '".$pseudo."', '".$message."', '".time()."')");
	}
}

//Affichage du chat

$pseudo = array();
$msg = array();
$date = array();

$sql = mysql_query("SELECT * FROM chat ORDER BY id DESC LIMIT 0,10");
include('configuration/bbcode.php');
while($chat = mysql_fetch_array($sql))
{
	$pseudo[] = $chat['pseudo'];
	// Parsage de bbcode sans les droit administratif (smiley seulement);
	$msg[] = parsage_bbcode($chat['message'], 0);
	$date[] = date("d/m/Y \A H\hi", $chat['date']);
}

$glob = array("PSEUDO"=>$pseudo,"MESSAGE"=>$msg,"DATE"=>$date);

//Parsage total
$tpl->assignTag("CHAT", 1, $glob);

// Affichage
$tpl->view();

include('footer.php');
?>

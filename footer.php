<?php
if(!$_SECURE || $_SECURE == 0)
{
	echo "CeBlog :: Hack Attempted";
	exit();
}

$tpl->file("themes/".$theme."/footer.php");
$tpl->view();
?>


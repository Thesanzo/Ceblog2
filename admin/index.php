<?php
session_start();
if(!isset($_SESSION['pseudo']))
{
	header('Location: ../');
}else {
	header('Location: connecte.php');
}
?>

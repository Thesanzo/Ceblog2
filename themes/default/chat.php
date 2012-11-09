<a href="chat.php">Actualiser</a>
<form action="chat.php" method="post">
<label>Pseudo:</label> <input type="text" name="pseudo" /><br />
<label>Message:</label>
<input name="message" type="text" size=50" />
<br />
<input type="submit" />
</form>
<br /><br />
{CHAT id=1}
<em>[{$DATE}]</em> {$PSEUDO} dit: {$MESSAGE}<br />
{/CHAT}

<form id="connexion" action="admin.php" onsubmit="return false;">
<label>Pseudo: </label><input type="text" name="pseudo"/><br />
<label>Mot de passe: </label><input type="password" name="mdp" /><br />
<input type="submit" value="Connexion" onclick="Modalbox.show('admin.php', {title: 'Administration', width: 400, params:Form.serialize('connexion') }); return false;">
</form>

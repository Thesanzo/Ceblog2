<table width="100%">
				<tr class="theader">
					<td><strong>#</strong></td>
					<td><strong>Titre</strong></td>
					<td><strong>Modifier</strong></td>
					<td><strong>Supprimer</strong></td>
				</tr>
				{LISTING id=1}
				<tr>
					<td>{$ID}</td>
					<td>{$TITRE}</td>
					<td><form action="?cat={$ID}" method="post"><input type="submit" value="Modifier"/></form></td>
					<td><form action="?suppr={$ID}" method="post"><input type="submit" value="Supprimer"/></form></td>
				</tr>
				{/LISTING}
</table><br />
<h2>Ajouter/modifier une categorie</h2><br />
<form action="cat.php" method="post">
{MODIF id=1}
<label>Titre: </label><input type="text" name="cat" value="{$CAT}" /><br />
<input type="hidden" name="modif" value="{$MODIF}" /><input type="submit" />
{/MODIF}
</form>

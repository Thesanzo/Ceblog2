<center><a href="addarticle.php">>> Ajouter une news</a></center><br>
<table width="100%">
				<tr class="theader">
					<td><strong>#</strong></td>
					<td><strong>Titre</strong></td>
					<td><strong>Categorie</strong></td>
					<td><strong>Modifier</strong></td>
					<td><strong>Supprimer</strong></td>
				</tr>
				{ARTICLE id=1}
				<tr>
					<td>{$ID}</td>
					<td>{$TITRE}</td>
					<td>{$CAT}</td>
					<td><form action="addarticle.php?id={$ID}" method="post"><input type="submit" value="Modifier"/></form></td>
					<td><form action="?suppr={$ID}" method="post"><input type="submit" value="Supprimer"/></form></td>
				</tr>
				{/ARTICLE}
</table>
<center><a href="addarticle.php">>> Ajouter une news</a></center>

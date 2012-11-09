<table id="tableau_1" width="100%">
				<tr class="theader">
					<td><center><strong>#</strong></center></td>
					<td><center><strong>Article</strong></center></td>
					<td><center><strong>Pseudo</strong></center></td>
					<td><center><strong>Commentaire</strong></center></td>
					<td><center><strong>Action</strong></center></td>
				</tr>
				{LISTING id=1}
				<tr>
					<td>{$ID}</td>
					<td>{$IDN}</td>
					<td>{$PSEUDO}</td>
					<td>{$MSG}</td>
					<td><form action="coms.php?suppr={$ID}" method="post"><input type="submit" value="Supprimer"/></form></td>
				</tr>
				{/LISTING}
</table>

<center>
<form action="archive.php" id="myform"  onsubmit="return false;">
<input type="text" name="search" /> <input type="submit" value="Rechercher" onclick="Modalbox.show('archive.php', {title: 'Archive', width: 400, params:Form.serialize('myform') }); return false;" />
</form>
</center><br /><br />
{ARCHIVE id=1}
<em>[{$NOMCAT}] {$DATE} - </em> <a href="article.php?a={$ID}">{$ARTICLE}</a><br>
{/ARCHIVE}
{ARCHIVE id=2}
<a href="article.php?a={$IDS}">{$ART}</a><br />
{/ARCHIVE}

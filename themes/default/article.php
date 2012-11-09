{NEWS id=1}
<h4 class="news_titre">{$TITLE_ART} <span class="news_date">le {$DATE_ART} dans <a href="categorie.php?cat={$IDCAT_ART}">{$CATEGORIE_ART}</a></span></h4>
		<p>
			{$CONTENT_ART}
			<h4 class="news_infos">Article écrite par <strong>{$AUTHOR_ART}</strong> - <a href="article.php?a={$ID_ART}">Voir les commentaires</a></h4>
{/NEWS}
{NEWS id=2}
<h4 class="news_titre"><a href="#" onclick="Effect.toggle('d{$ID}','blind'); return false;"><img src="themes/default/design/images/plus.png" /></a> {$TITLE_N} <span class="news_date">le {$DATE} dans <a href="categorie.php?cat={$IDCATE}">{$CATEGORIE}</a></span></h4>
<div id="d{$ID}" style="display:none;">
			<p>
			{$CONTENT}
			<h4 class="news_infos">Article écrite par <strong>{$PSEUDO}</strong> - <a href="article.php?a={$ID}">Voir les commentaires</a></h4>
</div>
{/NEWS}

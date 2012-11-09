{ARTICLE id=1}
<div class="news">
			<h4 class="news_titre">{$TITRE}<span class="news_date"> le {$LAST_DATE} dans <a href="categorie.php?cat={$IDCAT}">{$CATEGORIE}</a></span></h4>
			<p>
			{$CONTENT}
		</div>
{/ARTICLE}
<div id="news">
			<h2>Commentaires</h2>
{$ERRCOM}
{COMS id=1}
			<h4 class="news_titre">Commentaire écrit par {$PSEUDO} le {$QUAND}</h4><br />
			<p>
			{$MESSAGE}
			
{/COMS}
</div>
<h2><a href="#" onclick="Effect.toggle('ajout','slide'); return false;"><img src="themes/default/design/images/plus.png" /></a>Ajouter un commentaire</h2>
<div id="ajout" style="display:none;">
<script type="text/javascript">
	var isMozilla = (navigator.userAgent.toLowerCase().indexOf('gecko')!=-1)
	function storeCaret(selec){
		oField = document.getElementById('message');
		if (isMozilla) {
			objectValue = oField.value;
			deb = oField.selectionStart;
			fin = oField.selectionEnd;
			objectValueDeb = objectValue.substring( 0 , oField.selectionStart );
			objectValueFin = objectValue.substring( oField.selectionEnd , oField.textLength );
			objectSelected = objectValue.substring( oField.selectionStart ,oField.selectionEnd );
			oField.value = objectValueDeb + objectSelected + selec + objectValueFin;
			oField.selectionStart = fin+selec.length;
			oField.selectionEnd = oField.selectionStart;
			oField.focus();
		}
		else {
			var str = document.selection.createRange().text;
			if (str.length>0){
				var sel = document.selection.createRange();
				sel.text = str + selec;
				sel.collapse();
				sel.select();
			}else {
				oField.focus(oField.caretPos);
				oField.focus(oField.value.length);
				oField.caretPos = document.selection.createRange().duplicate();
				var bidon = "%~%";
				var orig = oField.value;
				oField.caretPos.text = bidon;
				var i = oField.value.search(bidon);
				oField.value = orig.substr(0,i) + selec + orig.substr(i, oField.value.length);
			}
		}   
	}
	</script>
<form action="article.php?a={$ID}" method="POST">
<label>Pseudo:</label> <input type="text" name="pseudo" /><br>
<img src="smiley/smile.gif" onClick="storeCaret(':)')" /><img src="smiley/sad.gif" onClick="storeCaret(':(')" /><img src="smiley/excl.gif" onClick="storeCaret(':!:')" /><img src="smiley/furious.gif" onClick="storeCaret(':@')" /><img src="smiley/censored2.gif" onClick="storeCaret(':censored:')" /><img src="smiley/icon12.gif" onClick="storeCaret(':love:')" /><img src="smiley/wub.gif" onClick="storeCaret(':wub:')" /><img src="smiley/happy.gif" onClick="storeCaret('^^')" /><img src="smiley/ohmy.gif" onClick="storeCaret(':omg:')" /><img src="smiley/thumbdown.gif" onClick="storeCaret(':naze:')" /><img src="smiley/dry.gif" onClick="storeCaret('-_-')" /><img src="smiley/laugh.gif" onClick="storeCaret('lol')" /><img src="smiley/tongue.gif" onClick="storeCaret(':P')" /><img src="smiley/biggrin.gif" onClick="storeCaret(':D')" /><img src="smiley/mrgreen.JPG.gif" onClick="storeCaret(':mrgreen:')" /><br />
<label>Message:</label> <textarea rows="5" cols="50" name="message" id="message"></textarea><br /><br />
.<br /><label><img src="captcha.php" alt="Code de v&eacute;rification" /></label> <input type="text" name="captcha" /><br /><br />
<center><input type="submit" class="bouton" />
</form>
</div>
</div>
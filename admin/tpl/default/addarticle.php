<script type="text/javascript">
					function insertTag(startTag, endTag, textareaId, tagType) 
						{
					        var field = document.getElementById(textareaId); // On récupère la zone de texte
					        field.focus();
						}
					function insertTag(startTag, endTag, textareaId, tagType) 
						{
					        var field = document.getElementById(textareaId); 
					        field.focus();
					        if (window.ActiveXObject) 
								{
					                var textRange = document.selection.createRange();            
					                var currentSelection = textRange.text;
					                
					                textRange.text = startTag + currentSelection + endTag;
					                textRange.moveStart("character", -endTag.length - currentSelection.length);
					                textRange.moveEnd("character", -endTag.length);
					                textRange.select();     
								} 
							else 
								{
						            var startSelection   = field.value.substring(0, field.selectionStart);
						            var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
						            var endSelection     = field.value.substring(field.selectionEnd);
						            field.value = startSelection + startTag + currentSelection + endTag + endSelection;
						            field.focus();
						            field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
						        }       
						}
					function insertTag(startTag, endTag, textareaId, tagType) 
						{
					        var field = document.getElementById(textareaId); 
					        field.focus();
					        if (window.ActiveXObject) 
								{
						            var textRange = document.selection.createRange();            
						            var currentSelection = textRange.text;
						        } 
							else 
								{
									var startSelection   = field.value.substring(0, field.selectionStart);
									var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
									var endSelection     = field.value.substring(field.selectionEnd);               
						        }
					        if (tagType) 
								{
						            switch (tagType) 
										{
											case "lien":
										        endTag = "[/lien]";
										        if (currentSelection) 
													{
														if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) 
															{
											                    var label = prompt("Quel est le libellé du lien ?") || "";
																startTag = "[lien url=" + currentSelection + "]";
																currentSelection = label;
											                } 
														else 
															{
																var URL = prompt("Quelle est l'url ?");
																startTag = "[lien url=" + URL + "]";
											                }
													}
												else 
													{
														var URL = prompt("Quelle est l'url ?") || "";
														var label = prompt("Quel est le libellé du lien ?") || "";
														startTag = "[lien url=" + URL + "]";
														currentSelection = label;                     
											        }
						                    break;
						                    case "citation":
										        endTag = "[/citation]";
										        if (currentSelection) 
													{
											                if (currentSelection.length > 30) 
																{
																	var auteur = prompt("Quel est l'auteur de la citation ?") || "";
																	startTag = "[citation nom=" + auteur + "]";
												                } 
															else 
																{
											                        var citation = prompt("Quelle est la citation ?") || "";
											                        startTag = "[citation nom=" + currentSelection + "]";
											                        currentSelection = citation;    
																}
											        } 
												else 
													{
										                var auteur = prompt("Quel est l'auteur de la citation ?") || "";
										                var citation = prompt("Quelle est la citation ?") || "";
										                startTag = "[citation nom=" + auteur + "]";
										                currentSelection = citation;    
													}
											break;
											case "image":
										        if (currentSelection) 
													{
														if (currentSelection.length > 30) 
															{
											                    var image = prompt("Quelle est l'adresse de l'image ?") || "";
											                    startTag = currentSelection;
											                    currentSelection = image;    
															}
											        } 
												else 
													{
										                var image = prompt("Quel est l'adresse de l'image ?") || "";
										                startTag = "[image " + image + "]";  
													}
											break;
											case "email":
										        if (currentSelection) 
													{
														if (currentSelection.length > 30) 
															{
											                    var email = prompt("Quelle est l'adresse email ?") || "";
											                    startTag = currentSelection;
											                    currentSelection = email;    
															}
											        } 
												else 
													{
										                var email = prompt("Quel est l'adresse email ?") || "";
										                startTag = "[email " + email + "]";  
													}
											break;
											case "mediat":
										        if (currentSelection) 
													{
														if (currentSelection.length > 30) 
															{
											                    var mediat = prompt("Inserez le code du lecteur exportable") || "";
											                    startTag = currentSelection;
											                    currentSelection = mediat;    
															}
											        } 
												else 
													{
										                var mediat = prompt("Inserez le code du lecteur exportable") || "";
										                startTag = "[mediat " + mediat + "]";  
													}
											break;
						                }
						        }
					        if (window.ActiveXObject) 
								{
									textRange.text = startTag + currentSelection + endTag;
									textRange.moveStart("character", -endTag.length - currentSelection.length);
									textRange.moveEnd("character", -endTag.length);
									textRange.select();     
						        } 
							else 
								{
					                field.value = startSelection + startTag + currentSelection + endTag + endSelection;
					                field.focus();
					                field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
								}
						}
				</script>

{FORM id=1}
<form action="article.php" method="post">
<label>Titre:</label> <input type="text" name="title" value="{$TITRE}" /><br>
<label>Categorie:</label> <select name="cat">
{CATEGORIE id=1}
<option value="{$SELECTED}">{$TT}</option>
{/CATEGORIE}
</select><br />
<input type="button" value="Gras" onclick="insertTag('[b]','[/b]','message');" />
<input type="button" value="Italique" onclick="insertTag('[i]','[/i]','message');" />
<input type="button" value="URL" onclick="insertTag('[url]','[/url]','message');" />
<input type="button" value="Image" onclick="insertTag('[img]','[/img]','message');" />
<input type="button" value="SON" onclick="insertTag('[song]','[/song]','message');" />
<input type="button" value="Youtube" onclick="insertTag('[yt]','[/yt]','message');" /><br />
<input type="button" value="Gauche" onclick="insertTag('[align=left]','[/align]','message');" />
<input type="button" value="Centrer" onclick="insertTag('[align=center]','[/align]','message');" />
<input type="button" value="Droite" onclick="insertTag('[align=right]','[/align]','message');" /><br />
<input type="button" value="Blanc" onclick="insertTag('[color=white]','[/color]','message');" />
<input type="button" value="Argent" onclick="insertTag('[color=silver]','[/color]','message');" />
<input type="button" value="Gris" onclick="insertTag('[color=gray]','[/color]','message');" />
<input type="button" value="Rouge" onclick="insertTag('[color=red]','[/color]','message');" />
<input type="button" value="Marron" onclick="insertTag('[color=maroon]','[/color]','message');" />
<input type="button" value="Vert" onclick="insertTag('[color=green]','[/color]','message');" />
<input type="button" value="Jaune" onclick="insertTag('[color=yellow]','[/color]','message');" />
<input type="button" value="Bleu" onclick="insertTag('[color=blue]','[/color]','message');" />
<input type="button" value="Marine" onclick="insertTag('[color=navy]','[/color]','message');" />
<input type="button" value="Violet" onclick="insertTag('[color=purple]','[/color]','message');" />
<br /><label>Message:</label> 			<textarea onkeyup="preview(this, 'previewDiv');" onselect="preview(this, 'previewDiv');" id="message" cols="74" rows="10" name="message" class="form">{$CONTENT}</textarea>
<center><input type="hidden" name="modif" value="{$ID}" /><input type="submit" /></center>
{/FORM}

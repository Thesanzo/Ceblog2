<?php
//

function parsage_bbcode($content,$new)
{
if($new == 1)
{
$content = preg_replace('#\[color=(white|silver|gray|red|maroon|green|yellow|blue|navy|purple)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $content);
$content = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $content);
$content = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $content);
$content = preg_replace('#\[url](.+)\[/url\]#i', '<a href="$1" target="_blank">$1</a>', $content);
$content = preg_replace('#\[img\](.+)\[/img\]#isU', '<img src="$1" />', $content);
$content = preg_replace('#\[yt\](.+)\[/yt\]#isU', '<object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/b9ifQvQCO7Y&hl=fr&fs=1&rel=0&color1=0x234900&color2=0x4e9e00&border=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/$1&hl=fr&fs=1&rel=0&color1=0x234900&color2=0x4e9e00&border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></embed></object>', $content);
$content = preg_replace('#\[align=(center|left|right)\](.+)\[/align\]#isU', '<div style="text-align:$1">$2</div><p>', $content);
$content = preg_replace('#\[song\](.+)\[/song\]#isU', '<object type="application/x-shockwave-flash" data="dewplayer.swf?son=$1&amp;bgcolor=FFFFFF" width="200" height="20"><param name="movie" value="dewplayer.swf?son=EHJKELE&amp;bgcolor=FFFFFF" /></object>', $content);
$content = preg_replace('#\<script type="text/javascript" src="(.+)"\>\</script\> \<br /\>#isU', '<script type="text/javascript" src="$1"></script>', $content);
}

// Smiley
$content = str_replace(':)', '<img src="smiley/smile.gif" />', $content);
$content = str_replace(':(', '<img src="smiley/sad.gif" />', $content);
$content = str_replace(':!:', '<img src="smiley/excl.gif" />', $content);
$content = str_replace(':@', '<img src="smiley/furious.gif" />', $content);
$content = str_replace(':censored:', '<img src="smiley/censored2.gif" />', $content);
$content = str_replace(':love:', '<img src="smiley/icon12.gif" />', $content);
$content = str_replace(':wub:', '<img src="smiley/wub.gif" />', $content);
$content = str_replace('^^', '<img src="smiley/happy.gif" />', $content);
$content = str_replace(':omg:', '<img src="smiley/ohmy.gif" />', $content);
$content = str_replace(':naze:', '<img src="smiley/thumbdown.gif" />', $content);
$content = str_replace('-_-', '<img src="smiley/dry.gif" />', $content);
$content = str_replace('lol', '<img src="smiley/laugh.gif" />', $content);
$content = str_replace(':P', '<img src="smiley/tongue.gif" />', $content);
$content = str_replace(':D', '<img src="smiley/biggrin.gif" />', $content);
$content = str_replace(':mrgreen:', '<img src="smiley/mrgreen.JPG.gif" />', $content);

return $content;
return $new;
}
?>
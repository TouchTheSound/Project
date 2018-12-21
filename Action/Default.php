<?php

	
	//$string=$_GET["Default"] .";" . file_get_contents("Fichier/" .$_GET["Patches"] ."/default.txt");
	
	$string=file_get_contents("Fichier/" .$_GET["Patches"] ."/default.txt");
	$fp=fopen("Fichier/" .$_GET["Patches"] ."/set.txt" ,'w');
	fwrite($fp, $string);
?>

<?php

	//$string=$_GET["Set"] .";";
	for($enum=0;$enum<$_GET["Set"];$enum++){
			$string=$string . $_GET["P".$enum];
			if($enum!=$_GET["Set"]-1){
					$string=$string .";";
			}
	}
	$fp=fopen("Fichier/" .$_GET["Patches"] ."/set.txt" ,'w');
	fwrite($fp, $string);
	

?>

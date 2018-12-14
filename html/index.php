<?php
	include "Action/ListPatches.php";?>

	<link rel='stylesheet' href="Style/button.css" type="text/CSS">
	<?php
	if($_GET){
		if(isset($_GET["Patches"])){
			//$commande="pd -nogui Fichier/" .$_GET["Patches"];
			//echo($commande);
			//exec('python start_patch.py');
			//$last_line = system($commande, $retval);
			//exec("cp index.php index_copie.php");
			//echo(exec($commande));
			$commande="pd Fichier/" .$_GET["Patches"] ."/" .$_GET["Patches"] .".pd" ;			
			//$File=fopen("StartPureData/commande.txt","a+"); fonctionnel
			$File=fopen("StartPureData/commande.txt","w+"); // en test
			fputs($File,$commande);
			fclose($File);
			//shell_exec("pd Fichier/".$_GET["Patches"]);
		}
		//echo($_GET["Patches"])
		
		if(isset($_GET["Set"])){
		
				include "Action/Set.php";
		}
		
		if(isset($_GET["Default"])){
				
				include "Action/Default.php";
		}
	}
	
	include "View/header.php";
	include "View/main.php";
 ?>

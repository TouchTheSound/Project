<?php
	//List all the directories
	include "Action/ListPatches.php";?>
	
	<link rel='stylesheet' href="Style/button.css" type="text/CSS">
		
	<?php
	//If Python isn't launched
	if(sizeof(shell_exec("pidof python"))==0){
		include("View/start.php");
	}
	?>
	
	<?php
	if($_GET){
		//If a Patch has to be launched
		if(isset($_GET["Patches"])){
			$commande="pd -nogui Fichier/" .$_GET["Patches"] ."/" .$_GET["Patches"] .".pd" ;			
			$File=fopen("StartPureData/commande.txt","w+");
			fputs($File,$commande);
			fclose($File);
			//now python will read the commande.txt and can launch puredata
		}
		
		
		if(isset($_GET["Set"])){
			//if we have to set parameter
			include "Action/Set.php";
			//now set.txt contain the right parameters
		}
		
		if(isset($_GET["Default"])){
				//if we have to copy the default parameter in set.txt
				include "Action/Default.php";
				//Did
		}
	}
	
	
	if(sizeof(shell_exec("pidof python"))>0){
		//if python is launched
		include "View/main.php";}
		//user can launch and set patches
		
	if($_GET){
			//if python isn't launched
			if(isset($_GET["Launch"])){
				//we launched if user has click on the logo 
				exec("python GestionCommande.py &");
			}
		}
  
 ?>

<?php

	$len=count($ListPatches);
	$i=0;
	for($i=0;$i<$len;$i++){
		
		if($ListPatches[$i]==$_GET["Patches"]){
			?> </br><?php
			$content=explode(";",file_get_contents("Fichier/" . $_GET["Patches"] ."/required.txt"));
			$set=explode(";",file_get_contents("Fichier/" . $_GET["Patches"] ."/set.txt"));
								
			?>
			<div class="parameters">
				<div class="patchActivated">
			<?php echo($_GET["Patches"]); ?>
				</div>
			<form action="index.php" methode="post"><?php
				
			for($j=0; $j<sizeof($content); $j++){
				$line= explode(",",$content[$j]);
				?>
				
				<p><li><?php echo $line[0];?>
				<input type="text" value ="<?php echo($set[$j+1]) ?>" name="P<?php echo $j;?>" onFocus="this.value='';" />
				</li>								
				</p>
										
										
				<div class="info">
				<?php echo $line[1];?>
				</div>
				<?php
					
				}
				?>
							
				<input type="hidden" name="Set"  value=<?php echo(sizeof($content));?> > <!-- Permet de faire remonter dans $_GET['Set']  le nombre de param�tre demand�-->
				<input type="hidden" name="Patches"  value=<?php echo($ListPatches[$i]) ?>>
				<p><input type="submit" value="Set" ?></p>
				</form>
							
								
				<form action="index.php" methode="post">
				<input type="hidden" name="Patches"  value=<?php echo($ListPatches[$i]) ?>>
				<input type="hidden" name="Default"  value=<?php echo(sizeof($content)) ?>>	
				<p><input type="submit" value="Default"></p>
				</form>
				</div>
								
				</br>
				</br>
				<?php
				
				
				unset($ListPatches[$i]);
				$ListPatches=array_values($ListPatches);
		}
		
		
	}
								


?>


<?php

	$len=count($ListPatches);
	$i=0;
	for($i=0;$i<$len;$i++){
		
			if($ListPatches[$i]!="." && $ListPatches[$i]!=".." && $ListPatches[$i]!="wiringPi.pd_linux" && $ListPatches[$i]!="wiringPi-help.pd" && $ListPatches[$i]!="La_440"){
					
					?>
					
				<div class="mainButtons">	
				<form action="index.php" methode="post">
					<input type="hidden" name="Patches"  value=<?php echo($ListPatches[$i]) ?>>
					<p><input type="submit" value=<?php echo($ListPatches[$i]) ?>></p>

				</form>
				</div>
			<?php
			}		
			
	}
	
	if(in_array("La_440",$ListPatches)){
		?>
		
		</br>
		</br>
		<div class="zone_de_test">
		*****Patchs de test*****
		</div>
		
		<div class="TestmainButtons">
				<form action="index.php" methode="post">
					<input type="hidden" name="Patches"  value="La_440">
					<p><input type="submit" value="La_440"></p>

				</form>
				</div>
		<?php
	}
?>

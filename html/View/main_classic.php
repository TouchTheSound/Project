
<?php

	$len=count($ListPatches);
	$i=0;
	for($i=0;$i<$len;$i++){
		
			if($ListPatches[$i]!="." && $ListPatches[$i]!=".."){
					
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

?>

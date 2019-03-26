<!DOCTYPE html>
<html>
	<head>
		<title>Sylvan</title>
	</head>
	<body>
		<?php
			if(1 === 0){
				$audio = "sound.mp3";
				echo '<EMBED SRC="'.$audio.'" HIDDEN="TRUE" AUTOSTART="TRUE"></EMBED>';
			}else{
				echo "De motor is nog niet gestart.";
			}
		?>
	</body>
</html>	
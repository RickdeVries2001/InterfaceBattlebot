<?php 
    if(empty($_GET['id'])){
        header('location: index.php');
    }
    include "views/header.php";
?>
<div class="container">
	<div class="row">
		<div class="col-xl">
			<IFRAME SRC="http://foscam.serverict.nl/videostream.cgi" WIDTH="640px" HEIGHT="480px" FRAMEBORDER="0"> </IFRAME>
		</div>
	</div>
</div>	

<?php
	include "views/footer.php";
?>
<ul class="nav nav-pills navstyle">
	<li class="nav-item">
		<a class="nav-link active" href="index">home</a>
	</li>
	<li class="nav-item">
            <?php 
                if(isset($_GET['id'])){
                    echo '<a class="nav-link" href="score.php?id='.$_GET['id'].'">score</a>';
                }
                else{
                    echo '<a class="nav-link" href="score.php">score</a>';
                }
            ?>
		
	</li>
	<li class="nav-item">
            <?php 
                if(isset($_GET['id'])){
                    echo '<a class="nav-link" href="Botcontroller.php?id='.$_GET['id'].'"> controller </a>';
                }
                else{
                    echo '<a class="nav-link" href="Botcontroller.php"> controller </a>';
                }
            ?>
	<li class="nav-item">
            <?php 
                if(isset($_GET['id'])){
                    echo '<a class="nav-link" href="stream.php?id='.$_GET['id'].'">stream</a>';
                }
                else{
                    echo '<a class="nav-link" href="stream.php">stream</a>';
                }
            ?>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="functions/logout_script.php">uitloggen</a>
	</li>
</ul>

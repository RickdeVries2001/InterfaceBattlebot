<?php
// INIT - GET GAME INFO
$gameID = 1; // REMEMBER TO CHANGE THIS
$reload = 5000; // AUTO PAGE RELOAD EVERY X MS
require "config.php" ;
require "lib-db.php" ;
require "lib-game.php" ;
$gameDB = new Game();
$game = $gameDB->get($gameID);
$score = $gameDB->latestScore($gameID);
$history = $gameDB->getScore($gameID);
if (is_array($score)) {
  $time = $score['score_time'];
  $teamA = $score['score_teamA'];
  $teamB = $score['score_teamB'];
  $teamC = $score['score_teamC'];
  $teamD = $score['score_teamD'];
  $teamE = $score['score_teamE'];
  $teamG = $score['score_teamG'];
  $teamH = $score['score_teamH'];
  $teamI = $score['score_teamI'];
  $teamJ = $score['score_teamJ'];
} else {
  $time = $game['game_start'];
  $teamA = 0;
  $teamB = 0;
  $teamC = 0;
  $teamD = 0;
  $teamE = 0;
  $teamG = 0;
  $teamH = 0;
  $teamI = 0;
  $teamJ = 0;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>GAME SCORE DEMO</title>
    <link href="score.css" rel="stylesheet">
    <script>
    window.addEventListener("load", function(){
      setTimeout(function(){
       window.location.reload(1);
      }, <?=$reload?>);
    });
    </script>
  </head>
  <body>
    <!-- [SCOREBOARD] -->
    <table id="scoreboard">
      <tr id="scoretime"><td colspan="2">
        <div class="scoredark"><?=$time?></div>
      </td></tr>
      <tr id="scorenumber">
        <td><div class="scoredark"><?=$teamA?></div></td>
        <td><div class="scoredark"><?=$teamB?></div></td>
        <td><div class="scoredark"><?=$teamC?></div></td>
        <td><div class="scoredark"><?=$teamD?></div></td>
        <td><div class="scoredark"><?=$teamE?></div></td>
        <td><div class="scoredark"><?=$teamG?></div></td>
        <td><div class="scoredark"><?=$teamH?></div></td>
        <td><div class="scoredark"><?=$teamI?></div></td>
        <td><div class="scoredark"><?=$teamJ?></div></td>
      </tr>
      <tr id="scorename">
        <td><div class="scoregrey"><?=$game['game_teamA']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamB']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamC']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamD']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamE']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamG']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamH']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamI']?></div></td>
        <td><div class="scoregrey"><?=$game['game_teamJ']?></div></td>
      </tr>
    </table>

    <!-- [HISTORY] -->
    <div id="scorehistory"><?php
    foreach ($history as $h) {
      printf("<div>[%s] %s-%s | %s</div>",
        $h['score_time'], $h['score_teamA'], $h['score_teamB'], $h['score_comment']
      );
    }
    ?></div>
  </body>
</html>
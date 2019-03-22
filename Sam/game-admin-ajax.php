<?php
/* [INIT] */
require "config.php" ;
require "lib-db.php" ;
require "lib-game.php" ;
$gameDB = new Game();

/* [AJAX] */
switch ($_POST['req']) {
  default :
    echo "ERR";
    break;

  // SHOW ACTIVE GAMES
  // You might want to paginate these
  case "list":
    $games = $gameDB->getAll(); ?>
    <h1>MANAGE GAMES</h1>
    <input type="button" value="Create Game" onclick="admin.addEdit()"/>
    <table>
    <?php 
    if (is_array($games)) {  foreach ($games as $g) {
      printf("<tr><td>[%s] %s VS %s</td><td>"
      . "<input type='button' value='Delete Game' onclick='admin.del(%u)'/>"
      . "<input type='button' value='Edit Game' onclick='admin.addEdit(%u)'/>"
      . "<input type='button' value='Score' onclick='score.show(%u)'/>"
      . "</td></tr>",
        $g['game_start'], $g['game_home'], $g['game_away'],
        $g['game_id'], $g['game_id'], $g['game_id']
     );
    }} else { echo "<tr><td>No games found.</td></tr>"; }
    ?>
    </table>
    <?php break;

  // SHOW ADD/EDIT GAME DOCKET
  case "addEdit":
    $edit = is_numeric($_POST['id']);
    if ($edit) {
      $game = $gameDB->get($_POST['id']);
    } ?>
    <h1><?=$edit?"EDIT":"NEW"?> GAME</h1>
    <form onsubmit="return admin.save();">
      <input id="game_id" type="hidden" value="<?=$game['game_id']?>"/>
      <label for="game_teamA">Team A:</label>
      <input id="game_teamA" type="text" value="<?=$game['game_teamA']?>" required/>
      <br>
      <label for="game_teamB">Team B:</label>
      <input id="game_teamB" type="text" value="<?=$game['game_teamB']?>" required/>
      <br>
      <label for="game_teamC">Team C:</label>
      <input id="game_teamC" type="text" value="<?=$game['game_teamC']?>" required/>
      <br>
      <label for="game_teamD">Team D:</label>
      <input id="game_teamD" type="text" value="<?=$game['game_teamD']?>" required/>
      <br>
      <label for="game_teamE">Team E:</label>
      <input id="game_teamE" type="text" value="<?=$game['game_teamE']?>" required/>
      <br>
      <label for="game_teamG">Team G:</label>
      <input id="game_teamG" type="text" value="<?=$game['game_teamG']?>" required/>
      <br>
      <label for="game_teamH">Team H:</label>
      <input id="game_teamH" type="text" value="<?=$game['game_teamH']?>" required/>
      <br>
      <label for="game_teamI">Team I:</label>
      <input id="game_teamI" type="text" value="<?=$game['game_teamI']?>" required/>
      <br>
      <label for="game_teamJ">Team J:</label>
      <input id="game_teamJ" type="text" value="<?=$game['game_teamJ']?>" required/>
      <br>
      <input type="button" value="Back" onclick="admin.list()"/>
      <input type="submit" value="Save"/>
    </form>
    <?php break;

  // ADD NEW GAME
  case "add":
    echo $gameDB->add($_POST['home'], $_POST['away']) ? "OK" : "ERR" ;
    break;

  // EDIT GAME
  case "edit":
    echo $gameDB->edit($_POST['home'], $_POST['away'], $_POST['id']) ? "OK" : "ERR" ;
    break;

  // DELETE GAME
  case "del":
    echo $gameDB->del($_POST['id']) ? "OK" : "ERR" ;
    break;

  // SHOW SCORE DOCKET FOR GAME
  case "score-show":
    $game = $gameDB->get($_POST['id']); ?>
    <h1><?=$game['game_home']?> VS <?=$game['game_away']?></h1>
    <div id="scores"></div>
    <form onsubmit="return score.add();">
      <input type="hidden" id="game_id" value="<?=$game['game_id']?>"/>
      <label for="score_home">Home Score</label>
      <input type="text" id="score_home" value="0" required/>
      <br>
      <label for="score_away">Away Score</label>
      <input type="text" id="score_away" value="0" required/>
      <br>
      <label for="score_comment">Comment</label>
      <input type="text" id="score_comment"/>
      <br>
      <input type="button" value="Back" onclick="admin.list()"/>
      <input type="submit" value="Save"/>
    </form>
    <?php break;

  // SHOW SCORES
  case "score-history":
    $scores = $gameDB->getScore($_POST['id']);
    if (is_array($scores)) { 
      echo "<table>";
      foreach ($scores as $s) {
        printf("<tr><td>[%s] Home - %s | Away - %s<br>%s</td><td>"
        . "<input type='button' value='Delete' onclick=\"score.del(%s,'%s')\"/>"
        . "</td></tr>", 
          $s['score_time'], $s['score_home'], $s['score_away'], $s['score_comment'],
          $_POST['id'], $s['score_time']
        );
      }
      echo "</table>";
    }
    break;

  // ADD NEW SCORE
  case "score-add":
    echo $gameDB->addScore($_POST['id'], $_POST['home'], $_POST['away'], $_POST['comment']) ? "OK" : "ERR" ;
    break;

  // DELETE SCORE
  case "score-del":
    echo $gameDB->delScore($_POST['id'], $_POST['date']) ? "OK" : "ERR" ;
    break;
}
?>
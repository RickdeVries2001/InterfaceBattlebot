<?php
class Game extends DB {
  /* [MAIN GAME ENTRY] */
  function getAll() {
  // getAll() : get all games
    $sql = "SELECT * FROM `game`";
    $game = $this->fetch($sql);
    return count($game)==0 ? false : $game ; 
  }

  function get($id) {
  // get() : get selected game

    $sql = "SELECT * FROM `game` WHERE `game_id`=?";
    $cond = [$id];
    $game = $this->fetch($sql, $cond);
    return count($game)==0 ? false : $game[0] ; 
  }

  function add($game_teamA, $game_teamB, $game_teamC, $game_teamD, $game_teamE, $game_teamG, $game_teamH, $game_teamI, $game_teamJ) {
  // add() : add a new game
  // PARAM $home : name of home team
  //       $away : name of away team

    $sql = "INSERT INTO `game` (`game_teamA`, `game_teamB`, `game_teamC`, `game_teamD`, `game_teamE`, `game_teamG`, `game_teamH`, `game_teamI`, `game_teamJ`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $cond = [$game_teamA, $game_teamB, $game_teamC, $game_teamD, $game_teamE, $game_teamG, $game_teamH, $game_teamI, $game_teamJ];
    return $this->exec($sql, $cond);
  }

  function edit($game_teamA, $game_teamB, $game_teamC, $game_teamD, $game_teamE, $game_teamG, $game_teamH, $game_teamI, $game_teamJ, $id) {
  // edit() : edit game
  // PARAM $home : name of home team
  //       $away : name of away team
  //       $id : game id

    $sql = "UPDATE `game` SET `game_teamA`=?, `game_teamB`=?, `game_teamC`=?, `game_teamD`=?, `game_teamE`=?, `game_teamG`=?, `game_teamH`=?, `game_teamI`=?, `game_teamJ`=? WHERE `game_id`=?";
    $cond = [$game_teamA, $game_teamB, $game_teamC, $game_teamD, $game_teamE, $game_teamG, $game_teamH, $game_teamI, $game_teamJ, $id];
    return $this->exec($sql, $cond);
  }

  function del($id) {
  // del() : delete game
  // PARAM $id : game id

    $this->start();
    $sql = "DELETE FROM `gamescore` WHERE `game_id`=?";
    $cond = [$id];
    $pass = $this->exec($sql, $cond);
    if ($pass) {
      $sql = "DELETE FROM `game` WHERE `game_id`=?";
      $pass = $this->exec($sql, $cond);
    }
    $this->end($pass);
    return $pass;
  }

  /* [GAME SCORES] */
  function latestScore($id) {
  // latestScore() : get only the latest score entry

    $sql = "SELECT * FROM `gamescore` WHERE `game_id`=? ORDER BY `score_time` DESC LIMIT 1";
    $cond = [$id];
    $scores = $this->fetch($sql, $cond);
    return count($scores)==0 ? false : $scores[0] ;
  }

  function getScore($id) {
  // getScore() : retrieve the game score
  // PARAM $id : game id

    $sql = "SELECT * FROM `gamescore` WHERE `game_id`=? ORDER BY `score_time` DESC";
    $cond = [$id];
    $scores = $this->fetch($sql, $cond);
    return count($scores)==0 ? false : $scores ;
  }

  function addScore($id, $home=0, $away=0, $comment="") {
  // addScore() : add game score or comment
  // PARAM $id : game id
  //       $home : home score
  //       $away : away score
  //       $comment : comment

    $sql = "INSERT INTO `gamescore` (`game_id`, `game_teamA`, `game_teamB`, `game_teamC`, `game_teamD`, `game_teamE`, `game_teamG`, `game_teamH`, `game_teamI`, `game_teamJ`)";
    $cond = [$id, $game_teamA, $game_teamB, $game_teamC, $game_teamD, $game_teamE, $game_teamG, $game_teamH, $game_teamI, $game_teamJ];
    if ($comment!="") {
      $sql .= ", `score_comment`";
      $cond[] = $comment;
    }
    $sql .= ") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?" . ($comment=="" ? "" : ", ?") . ")" ;
    return $this->exec($sql, $cond);
  }

  function delScore($id, $date) {
  // delScore() : delete score
  // PARAM $id : game id
  //       $date : score time

    $sql = "DELETE FROM `gamescore` WHERE `game_id`=? AND `score_time`=?";
    $cond = [$id, $date];
    return $this->exec($sql, $cond);
  }
}
?>
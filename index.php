<?php
require 'function.php';
if(isset($_COOKIE["matches"])){
    $matches = json_decode($_COOKIE['matches'] , true );
} else {
$matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
            "POTUGUAL_VS_SPAIN" =>    ["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
            "MOROCCO_VS_SPAIN" =>     ["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
            "PORTUGUAL_VS_IRAN" =>    ["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
            "MOROCCO_VS_PORTUGUAL" => ["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
            "IRAN_VS_SPAIN" =>        ["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
          ]; 
}
$Table = [
["team"=> "MOROCCO" ,"points" => $ptsM = 0,"games_played" => $playedM = 0,"games_won" => $wonM = 0,"games_equal" => $equalM = 0,"games_lose" => $loseM = 0, "goals_scored" => $scoredM = 0,"goals_received" => $receivedM = 0 , "difference" => $differenceM = 0],
["team"=> "IRAN" ,"points" => $ptsI = 0,"games_played" => $playedI = 0, "games_won" => $wonI = 0,"games_equal" => $equalI = 0, "games_lose" => $loseI = 0, "goals_scored" => $scoredI = 0, "goals_received" => $receivedI = 0, "difference" => $differenceI = 0],
["team"=> "PORTUGUAL" ,"points" => $ptsP = 0,"games_played" => $playedP = 0, "games_won" => $wonP = 0,"games_equal" => $equalP = 0, "games_lose" => $loseP = 0, "goals_scored" => $scoredP = 0, "goals_received" => $receivedP = 0, "difference" => $differenceP = 0],
["team"=> "SPAIN" ,"points" => $ptsS = 0,"games_played" => $playedS = 0, "games_won" => $wonS = 0,"games_equal" => $equalS = 0, "games_lose" => $loseS = 0, "goals_scored" => $scoredS = 0, "goals_received" => $receivedS = 0, "difference" => $differenceS = 0]
]; 

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['MatchName']) && isset($_POST['TeamOne'])  && isset($_POST['TeamTwo']) ){
    $matches[$_POST['MatchName']][$_POST['TeamOne'][0]] = $_POST['TeamOne'][1] ;
    $matches[$_POST['MatchName']][$_POST['TeamTwo'][0]] = $_POST['TeamTwo'][1] ;
    $matches[$_POST['MatchName']]['STAT'] = true ;
    setcookie('matches', json_encode($matches));
  } elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['reset'])){
    $matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
                "POTUGUAL_VS_SPAIN" =>    ["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
                "MOROCCO_VS_SPAIN" =>     ["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
                "PORTUGUAL_VS_IRAN" =>    ["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
                "MOROCCO_VS_PORTUGUAL" => ["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
                "IRAN_VS_SPAIN" =>        ["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
              ]; 
    setcookie('matches', json_encode($matches));
  }
  if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['MatchName']) && isset($_POST['TeamOne'])  && isset($_POST['TeamTwo']) ){
      $matches[$_POST['MatchName']][$_POST['TeamOne'][0]] = $_POST['TeamOne'][1] ;
      $matches[$_POST['MatchName']][$_POST['TeamTwo'][0]] = $_POST['TeamTwo'][1] ;
      $matches[$_POST['MatchName']]['STAT'] = true ;
    } elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['reset'])){
        $matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
                   "POTUGUAL_VS_SPAIN" =>["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
                   "MOROCCO_VS_SPAIN" =>["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
                   "PORTUGUAL_VS_IRAN" =>["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
                   "MOROCCO_VS_PORTUGUAL" =>["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
                   "IRAN_VS_SPAIN" =>["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
                 ]; 
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="shortcut icon" href="#" />
    <title>WORLD CUP</title>
  </head>
  <body>
    <h1 class="text-center text-primary">WORLD CUP SIMULATOR</h1>
        <h2 class="text-warning text-center">GROUP F MATCHES</h2>
            <div class="text-center" >
              <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="reset" value="reset">
                <input type="submit"  class="btn btn-warning text-light"  value="RESET ALL MATCHES">
              </form>
            </div>
        <?php
        foreach($matches as $key => $val) {
          $contries = array();
          $values = array();
        foreach($val as $nkey => $nval){
            array_push($contries, $nkey);
            array_push($values, $nval);
        }
            ?>
        <div class="d-flex  align-items-center justify-content-center bg-info p-2 m-2 rounded container mx-auto">
          <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-flex flex-row p-3" >
            <div class="d-flex flex-row align-items-center justify-content-center">
                <p class=" text-light">  <?php echo  $contries[0] ?></p>
                  <input type="hidden"   name="TeamOne[]"  value="<?php echo $contries[0] ?>" >
                  <input type="number"  min="0"   <?php if( $val["STAT"] == true ){echo "readonly";} ?>  class="form-control mx-3 w-25" name="TeamOne[]"  value="<?php  echo $values[0] ?>" >
                  <p class="text-light">VS</p>
                  <input type="hidden"  class="w-25 mx-auto " name="TeamTwo[]" value="<?php echo $contries[1] ?>" >
                  <input type="number" min="0"  <?php if( $val["STAT"] == true ){echo "readonly";} ?>  class="form-control mx-3 w-25" name="TeamTwo[]" value="<?php echo $values[1] ?>" >
                  <p class=" text-light " >  <?php echo $contries[1] ?></p>
              </div>
              <input type="hidden"  class="m-3 btn btn-primary" name="MatchName" value="<?php echo $key ?>" >
              <input type="submit" <?php if( $val["STAT"] == true ){echo "disabled";} ?> value="PLAY" class="btn btn-warning m-3 text-light" > 
            </form>
        </div>
        <?php 
        }
        ?>
      <section class="d-flex flex-column  m-2 container mx-auto ">
        <h2 class="text-center text-success">WINNER TABLE</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center" >
          <input type="hidden" name="_method" value="PUT">
          <input type="submit"  class="btn btn-success w-25 container"  value="SIMULATE">
      </form>
      <table class="table table-striped table-bordered  h-25 mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Teams</th>
            <th scope="col">PTS</th>
            <th scope="col">G.P</th>
            <th scope="col">G.W</th>
            <th scope="col">G.E</th>
            <th scope="col">G.L</th>
            <th scope="col">GO.S</th>
            <th scope="col">GO.R</th>
            <th scope="col">+/-</th>
          </tr>
        </thead>
        <tbody>
          <?php
            function buildTable(){
              $count = 0;
              foreach($GLOBALS['Table'] as $xkey =>
                  $xvalue) { $count += 1; 
                    echo "<tr><th scope='row'>".$count."</th>"; 
                  foreach($xvalue as $key => $value) { 
                    echo "<td>".$value."</td>"; 
                  } 
                  echo "</tr>"; 
                }   
            }        
              if( isset($_REQUEST['_method']) &&  $_REQUEST['_method'] == "PUT") {
              if(count(GETCOMMONS(resultCouter($matches))) === 0 ){
                  foreach (  sortByTwoEquals(resultCouter($matches))  as $key => $value) {
                      ?>
                      <tr>
                      <td> <?php echo $key + 1 ; ?> </td>
                      <td><?php  echo $value["team"];  ?></td>
                      <td><?php  echo $value["points"];  ?></td>
                      <td><?php  echo $value["games_played"];  ?></td>
                      <td><?php  echo $value["games_won"];  ?></td>
                      <td><?php  echo $value["games_equal"];  ?></td>
                      <td><?php  echo $value["games_lose"];  ?></td>
                      <td><?php  echo $value["goals_scored"];  ?></td>
                      <td><?php  echo $value["goals_received"];  ?></td>
                      <td><?php  echo $value["difference"];  ?></td>
                    </tr>
                    <?php 
                  }
              } else {
                  if(count(GETCOMMONS(resultCouter($matches))) == 1){
                      if(count(GETCOMMONS(resultCouter($matches))[0]) == 2){
                      foreach ( sortByTwoEquals(resultCouter($matches) )  as $key => $value) {
                          ?>
                          <tr>
                          <td> <?php echo $key + 1 ; ?> </td>
                          <td><?php  echo $value["team"];  ?></td>
                          <td><?php  echo $value["points"];  ?></td>
                          <td><?php  echo $value["games_played"];  ?></td>
                          <td><?php  echo $value["games_won"];  ?></td>
                          <td><?php  echo $value["games_equal"];  ?></td>
                          <td><?php  echo $value["games_lose"];  ?></td>
                          <td><?php  echo $value["goals_scored"];  ?></td>
                          <td><?php  echo $value["goals_received"];  ?></td>
                          <td><?php  echo $value["difference"];  ?></td>
                        </tr>
                        <?php 
                      }
                  } elseif ( count(GETCOMMONS(resultCouter($matches))[0]) > 2) {
                    $theCommonItems =  GETCOMMONS(resultCouter($matches))[0];
                    $rightsortedData = ArrayRightSort( SortWithoutComparingtwoTeams(resultCouter($matches)) , sortByTwoEquals(resultCouter(getTheMAtchesResultsWithoutTheNotConcernedTeams( GetTheDiffTeams($theCommonItems) , $matches )))) ;
                      foreach ( $rightsortedData   as $key => $value) {
                          ?>
                          <tr>
                          <td> <?php echo $key + 1 ; ?> </td>
                          <td><?php  echo $value["team"];  ?></td>
                          <td><?php  echo $value["points"];  ?></td>
                          <td><?php  echo $value["games_played"];  ?></td>
                          <td><?php  echo $value["games_won"];  ?></td>
                          <td><?php  echo $value["games_equal"];  ?></td>
                          <td><?php  echo $value["games_lose"];  ?></td>
                          <td><?php  echo $value["goals_scored"];  ?></td>
                          <td><?php  echo $value["goals_received"];  ?></td>
                          <td><?php  echo $value["difference"];  ?></td>
                        </tr>
                        <?php 
                      }
                }
                  } elseif ( count(GETCOMMONS(resultCouter($matches)))  == 2) {
                      foreach ( sortByTwoEquals(resultCouter($matches))  as $key => $value) {
                          ?>
                          <tr>
                          <td><?php  echo $key + 1 ; ?> </td>
                          <td><?php  echo $value["team"];  ?></td>
                          <td><?php  echo $value["points"];  ?></td>
                          <td><?php  echo $value["games_played"];  ?></td>
                          <td><?php  echo $value["games_won"];  ?></td>
                          <td><?php  echo $value["games_equal"];  ?></td>
                          <td><?php  echo $value["games_lose"];  ?></td>
                          <td><?php  echo $value["goals_scored"];  ?></td>
                          <td><?php  echo $value["goals_received"];  ?></td>
                          <td><?php  echo $value["difference"];  ?></td>
                        </tr>
                        <?php 
                      }
                  }
              }
              } else {
                buildTable();  
              }
          ?>
      </table>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
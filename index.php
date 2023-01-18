<?php

$Table = ["morocco" => ["points" => $ptsM = 0,"games_played" => $playedM = 0,"games_won" => $wonM = 0,"games_equal" => $equalM = 0,"games_lose" => $loseM = 0, "goals_scored" => $scoredM = 0,"goals_received" => $receivedM = 0 , "difference" => $differenceM = 0],
"iran" => ["points" => $ptsI = 0,"games_played" => $playedI = 0, "games_won" => $wonI = 0,"games_equal" => $equalI = 0, "games_lose" => $loseI = 0, "goals_scored" => $scoredI = 0, "goals_received" => $receivedI = 0, "difference" => $differenceI = 0],
"portugual" => ["points" => $ptsP = 0,"games_played" => $playedP = 0, "games_won" => $wonP = 0,"games_equal" => $equalP = 0, "games_lose" => $loseP = 0, "goals_scored" => $scoredP = 0, "goals_received" => $receivedP = 0, "difference" => $differenceP = 0],
"spain" => ["points" => $ptsS = 0,"games_played" => $playedS = 0, "games_won" => $wonS = 0,"games_equal" => $equalS = 0, "games_lose" => $loseS = 0, "goals_scored" => $scoredS = 0, "goals_received" => $receivedS = 0, "difference" => $differenceS = 0]
]; 
$matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
  "POTUGUAL_VS_SPAIN" =>    ["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
  "MOROCCO_VS_SPAIN" =>     ["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
  "PORTUGUAL_VS_IRAN" =>    ["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
  "MOROCCO_VS_PORTUGUAL" => ["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
  "IRAN_VS_SPAIN" =>        ["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
]; 





if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['MatchName']) && isset($_POST['TeamOne'])  && isset($_POST['TeamTwo']) ){
 $matches[$_POST['MatchName']][$_POST['TeamOne'][0]] = $_POST['TeamOne'][1] ;
 $matches[$_POST['MatchName']][$_POST['TeamTwo'][0]] = $_POST['TeamTwo'][1] ;
 $matches[$_POST['MatchName']]['STAT'] = true ;

} elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['reset'])){
    $matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
    "POTUGUAL_VS_SPAIN" =>    ["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
    "MOROCCO_VS_SPAIN" =>     ["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
    "PORTUGUAL_VS_IRAN" =>    ["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
    "MOROCCO_VS_PORTUGUAL" => ["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
    "IRAN_VS_SPAIN" =>        ["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
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
    <section class="text-center d-flex flex-row">
      <section>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['MatchName']) && isset($_POST['TeamOne'])  && isset($_POST['TeamTwo']) ){
          $matches[$_POST['MatchName']][$_POST['TeamOne'][0]] = $_POST['TeamOne'][1] ;
          $matches[$_POST['MatchName']][$_POST['TeamTwo'][0]] = $_POST['TeamTwo'][1] ;
          $matches[$_POST['MatchName']]['STAT'] = true ;
         
         } elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['reset'])){
             $matches = ["MOROCCO_VS_IRAN" =>["MOROCCO" => 0,"IRAN" => 0,"STAT" => false], 
             "POTUGUAL_VS_SPAIN" =>    ["PORTUGUAL" => 0,"SPAIN" => 0,"STAT" => false],
             "MOROCCO_VS_SPAIN" =>     ["MOROCCO" => 0,"SPAIN" => 0,"STAT" => false],
             "PORTUGUAL_VS_IRAN" =>    ["PORTUGUAL" => 0,"IRAN" => 0,"STAT" => false],
             "MOROCCO_VS_PORTUGUAL" => ["MOROCCO" => 0,"PORTUGUAL" => 0,"STAT" => false],
             "IRAN_VS_SPAIN" =>        ["IRAN" => 0, "SPAIN" => 0,"STAT" => false]
           ]; 
         }



        foreach($matches as $key => $val) {
          $contries = array();
          $values = array();
        foreach($val as $nkey => $nval){
            array_push($contries, $nkey);
            array_push($values, $nval);

        }
            ?>
        <div class="d-flex  align-items-center justify-content-center bg-info p-2 m-2 rounded ">
          <form method='POST' class="d-flex flex-row p-3" >
            <div class="d-flex flex-row align-items-center justify-content-center">
                <p class=" text-light">  <?php echo  $contries[0] ?></p>
                  <input type="hidden"   name="TeamOne[]"  value="<?php echo $contries[0] ?>" >
                  <input type="number"  min="0"   <?php if( $val["STAT"] == true ){echo "readonly";} ?>  class="form-control mx-3 w-25" name="TeamOne[]"  value="<?php echo $values[0] ?>" >
                  <p class="text-light">VS</p>
                  <input type="hidden"  class="w-25 mx-auto " name="TeamTwo[]" value="<?php echo $contries[1] ?>" >
                  <input type="number" min="0"  <?php if( $val["STAT"] == true ){echo "readonly";} ?>  class="form-control mx-3 w-25" name="TeamTwo[]" value="<?php echo $values[1] ?>" >
                  <p class=" text-light " >  <?php echo $contries[1] ?></p>
              </div>
              <input type="hidden"  class="m-3 btn btn-primary" name="MatchName" value="<?php echo $key ?>" >
              <input type="submit" <?php if( $val["STAT"] == true ){echo "disabled";} ?> value="PLAY" class="btn btn-primary m-3" > 
            </form>
        </div>
        <?php 
        }
        ?>
      </section>
      <section class="d-flex flex-column w-50 h-50 m-2 ">
      <table class="table table-dark table-striped  h-25 mt-5">
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
            echo "<td>".$xkey."</td>"; 
          foreach($xvalue as $key => $value) { 
            echo "<td>".$value."</td>"; 
          } 
          echo "</tr>"; 
        } } 
        echo "</tbody>"; 
        if(array_key_exists('shoot', $_POST)) {
           shoot(); 
           } 
           function shoot() { 

            // if($_POST["morocco_iran_1"] < $_POST["iran_morocco_1"]){ // $GLOBALS['Table']['iran']['points'] += 3; 
            // $GLOBALS['Table']['iran']['games_won'] += 1; // $GLOBALS['Table']['morocco']['games_lose'] += 1;
            // $GLOBALS['Table']['morocco']['games_played'] += 1; // $GLOBALS['Table']['iran']['games_played'] += 1;
            // $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"]; 
            // $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"]; 
            // $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"];
            // $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"];
            // $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received'];
            // }elseif($_POST["morocco_iran_1"] > $_POST["iran_morocco_1"]){ 
            // $GLOBALS['Table']['iran']['games_lose'] += 1;
            // $GLOBALS['Table']['morocco']['points'] += 3; 
            // $GLOBALS['Table']['morocco']['games_won'] += 1;
            // $GLOBALS['Table']['morocco']['games_played'] += 1; 
            // $GLOBALS['Table']['iran']['games_played'] += 1; 
            // $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"];
            // $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"]; 
            // $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"]; 
            // $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"]; 
            // $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received']; 
            // }elseif($_POST["morocco_iran_1"] == $_POST["iran_morocco_1"]){ // $GLOBALS['Table']['morocco']['points'] += 1; 
            // $GLOBALS['Table']['iran']['points'] += 1; // $GLOBALS['Table']['morocco']['games_equal'] += 1; 
            // $GLOBALS['Table']['iran']['games_equal'] += 1; // $GLOBALS['Table']['morocco']['games_played'] += 1; 
            // $GLOBALS['Table']['iran']['games_played'] += 1; // $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"];
            // $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"];
            // $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"]; 
            // $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"]; 
            // $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received']; 
            // } 
          }
           buildTable(); 





           function getTheOposite( $array , $firstteam ){
            $arrayData = $array ;
             unset($arrayData[$firstteam]);
             unset($arrayData["Status"]);
        foreach ($arrayData as $key => $value) {
            return $key ;
        }
            }
           function TableCount($finalArr){
            $Teams = [];
            // this codes used to get the available teams from the finalArr ;
            $TheTeamsKeys = array();
            foreach($finalArr as $key => $val) {
                $contries = array();
                $values = array();
             foreach($val as $valkey => $miniVAL){
                 array_push($contries, $valkey);
                 array_push($values, $miniVAL);
                 array_push($TheTeamsKeys, $valkey);
             }
            }
            foreach ($TheTeamsKeys as $key => $value) {
                if($value == "Status"){
                    unset($TheTeamsKeys[$key]);
                }
            }
            $TheTeamsKeys = array_values(array_unique($TheTeamsKeys));
            foreach($TheTeamsKeys as $value){
             $Teams += [$value => [["points" =>  0,"games_played" =>  0,"games_won" =>  0,"games_equal" =>  0,"games_lose" =>  0, "goals_scored" =>  0,"goals_received" =>  0 , "difference" =>  0]]];
            }
            foreach ($Teams as $key => $value) {
                $games_played = 0 ;
                $games_won = 0 ;
                $games_equal = 0 ;
                $games_lose = 0 ;
                $points = ( $games_won * 3 ) + ( $games_equal * 1 ) ;
                $goals_scored = 0 ;
                $goals_received = 0 ;
                $difference = $goals_scored - $goals_received ;
                foreach ($finalArr as $DataKey => $DataValue) {
                    if(isset($DataValue[$key])){
                        $goals_scored += $DataValue[$key] ;
                        $goals_received += $DataValue[getTheOposite( $DataValue , $key )] ;
                        if($DataValue["Status"] == true){
                            $games_played += 1 ;
                        }
            if( $DataValue[$key] > $DataValue[getTheOposite( $DataValue , $key )] ){
                $games_won += 1;
            } elseif( $DataValue[$key] < $DataValue[getTheOposite( $DataValue , $key )] ){
                $games_lose += 1;
            } elseif( $DataValue[$key] == $DataValue[getTheOposite( $DataValue , $key )] ){
                $games_equal += 1;
            } 
                    }
                }
                $Teams[$key]["goals_scored"] = $goals_scored ; 
                $Teams[$key]["goals_received"] = $goals_received ; 
                $Teams[$key]["difference"] = $goals_scored - $goals_received ; 
                $Teams[$key]["games_played"] = $games_played ; 
                $Teams[$key]["games_won"] = $games_won ; 
                $Teams[$key]["games_lose"] = $games_lose ; 
                $Teams[$key]["games_equal"] = $games_equal ; 
                $Teams[$key]["points"] = ( $games_won * 3 ) + ( $games_equal * 1 ) ; 
            }
            return dataFormChanger($Teams);
            };












          ?>
      </table>
        <button class="btn btn-outline-success w-25 container">Simulate</button>
      </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
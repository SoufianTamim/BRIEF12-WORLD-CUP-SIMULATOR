<?php
//=========================================================================
//========================= functions =====================================
//=========================================================================

function Geter( $array , $TeamOne ){
    $DataArr = $array ;
     unset($DataArr[$TeamOne]);
     unset($DataArr["STAT"]);
foreach ($DataArr as $key => $value) {
    return $key ;
}
}
function simulate($Results){
    $teams = [];
    $TeamKeys = array();
    foreach($Results as $key => $val) {
        $contries = array();
        $values = array();
     foreach($val as $valkey => $miniVAL){
         array_push($contries, $valkey);
         array_push($values, $miniVAL);
         array_push($TeamKeys, $valkey);
     }
    }
    foreach ($TeamKeys as $key => $value) {
        if($value == "STAT"){
            unset($TeamKeys[$key]);
        }
    }
    $TeamKeys = array_values(array_unique($TeamKeys));
    foreach($TeamKeys as $value){
     $teams += [$value => array("points" => 0 , "games_played" => 0 , "games_won" => 0  , "games_equal" => 0  , "games_lose" => 0  , "goals_scored" => 0  , "goals_received" => 0  , "difference" => 0 )];
    }
    foreach ($teams as $key => $value) {
        $games_played = 0 ;
        $games_won = 0 ;
        $games_equal = 0 ;
        $games_lose = 0 ;
        $points = ( $games_won * 3 ) + ( $games_equal * 1 ) ;
        $goals_scored = 0 ;
        $goals_received = 0 ;
        $difference = $goals_scored - $goals_received ;

        foreach ($Results as $Dkey => $Dvalue) {
            if(isset($Dvalue[$key])){
                $goals_scored += $Dvalue[$key] ;
                $goals_received += $Dvalue[Geter( $Dvalue , $key )] ;
                if($Dvalue["STAT"] == true){
                    $games_played += 1 ;
                }
    if( $Dvalue[$key] > $Dvalue[Geter( $Dvalue , $key )] ){
        $games_won += 1;
    } elseif( $Dvalue[$key] < $Dvalue[Geter( $Dvalue , $key )] ){
        $games_lose += 1;
    } elseif( $Dvalue[$key] == $Dvalue[Geter( $Dvalue , $key )] ){
        $games_equal += 1;
    } 
            }
        }
        $teams[$key]["goals_scored"] = $goals_scored ; 
        $teams[$key]["goals_received"] = $goals_received ; 
        $teams[$key]["difference"] = $goals_scored - $goals_received ; 
        $teams[$key]["games_played"] = $games_played ; 
        $teams[$key]["games_won"] = $games_won ; 
        $teams[$key]["games_lose"] = $games_lose ; 
        $teams[$key]["games_equal"] = $games_equal ; 
        $teams[$key]["points"] = ( $games_won * 3 ) + ( $games_equal * 1 ) ; 
    }
    return Reseter($teams);
    };
    function Reseter($data) {
        foreach($data as $key => $value) {
            foreach ($value as $xkey => $xvalue) {
                $data[$key]["team"] = $key ;
            }
        }
        $FormArr = [];
        foreach($data as $key => $value) {
          array_push($FormArr , $value );
        }
        return $FormArr;
    }
function SortTwo($data){
    global $matches;
    usort($data, function ($x, $y) {
        global $matches;
        if ($x["points"] === $y["points"]) {
            if ($x["difference"] === $y["difference"]) {
                if ($x["goals_scored"] === $y["goals_scored"]) {
                    foreach ( $matches as $Mkey => $Mvalue) {
                        if(isset($Mvalue[$x["team"]])  && isset( $Mvalue[$y["team"]] )){
                            if ( $Mvalue[$x["team"]] === $Mvalue[$y["team"]]) {
                        return 0;
                    } else if ( $Mvalue[$x["team"]] < $Mvalue[$y["team"]] ) {
                        return 1 ;
                    } else if ( $Mvalue[$x["team"]] > $Mvalue[$y["team"]] ) {
                        return -1 ;
                    }
                }
                }
                } else if ( $x["goals_scored"] < $y["goals_scored"] ) {
                    return 1 ;
                } else if ( $x["goals_scored"] > $y["goals_scored"] ) {
                    return -1 ;
                }
            } else if ( $x["difference"] < $y["difference"] ) {
                return 1 ;
            } else if ( $x["difference"] > $y["difference"] ) {
                return -1 ;
            }
        } else if ( $x["points"] < $y["points"] ) {
            return 1 ;
        } else if ( $x["points"] > $y["points"] ) {
            return -1 ;
        }
    });
    return $data;
}
function GETnotTWOteams($data){
    usort($data, function ($x, $y) {
        if ($x["points"] === $y["points"]) {
            if ($x["difference"] === $y["difference"]) {
                if ($x["goals_scored"] === $y["goals_scored"]) {
                        return 0;
                } else if ( $x["goals_scored"] < $y["goals_scored"] ) {
                    return 1 ;
                } else if ( $x["goals_scored"] > $y["goals_scored"] ) {
                    return -1 ;
                }
            } else if ( $x["difference"] < $y["difference"] ) {
                return 1 ;
            } else if ( $x["difference"] > $y["difference"] ) {
                return -1 ;
            }
        } else if ( $x["points"] < $y["points"] ) {
            return 1 ;
        } else if ( $x["points"] > $y["points"] ) {
            return -1 ;
        }
    });
    return $data;
}
function GetEqual($data){
    $Common = array() ;
    $catch = array();
    foreach ($data as $key => $value) {
        $Usual = array() ;
        $i = 1;
        foreach ($data as $xkey => $xvalue) {
            if($value["points"] === $xvalue["points"] &&  $value["difference"] === $xvalue["difference"] &&  $value["goals_scored"] === $xvalue["goals_scored"] && $value["team"] != $xvalue["team"] && !in_array($xvalue["team"], $catch)  && !in_array($value["team"], $catch)  ){
                if ($i === 1 ){
                    array_push( $Usual ,  $value );
                    $i++;
                }
                array_push( $Usual ,  $xvalue );
                array_push( $catch ,  $xvalue["team"] );
                   }
                }
                if( ! count($Usual) == 0){
                    array_push( $Common ,  $Usual );
                }
    }
     return $Common ;
}
function GetDiff($array){
    $TeamsCountries = array("MOROCCO","IRAN","PORTUGUAL","SPAIN");
        $AvTeams = array();
        foreach ( $array as $key => $value) {
            array_push( $AvTeams , $value["team"]); 
        }
        $differenceValues = array_values(array_difference($TeamsCountries,$AvTeams));
        return $differenceValues;
}
function getWitoutteams($NewItems , $MArray  ){
    $TheMArray = $MArray ;
    foreach($TheMArray as $ykey => $yval) {
        foreach($yval as $gkey => $gval) {
    foreach ( $NewItems  as $xkey => $xvalue) {
    if( $gkey == $xvalue ){
            unset($TheMArray[$ykey]);
        }
    }
    }
    }
    return $TheMArray;
}
function SortArr($AllArr , $PoV){
$data = $AllArr ;
        $PoArr = array();
        foreach ($PoV as $Pkey => $Pvalue) {
          array_push($PoArr ,  $Pvalue["team"]  ) ; 
        }
        for ($i=0; $i < count($data) ; $i++) { 
            if( in_array( $data[$i]["team"] , $PoArr  ) ) {
                $data[$i] = $PoV[0];
                $data[$i+1] = $PoV[1];
                $data[$i+2] = $PoV[2];
                break;
            } 
        }
        foreach ( $data as $key => $value) {
            foreach ( $AllArr as $xkey => $xvalue) {
            if($value["team"] == $xvalue["team"]  )
            $data[$key] = $xvalue ;
            }
        }
        return $data ;
}
//=========================================================================
//========================= check the data ================================
//=========================================================================
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
    ["team"=> "MOROCCO" ,"points" => 0,"games_played" => 0,"games_won" => 0,"games_equal" => 0,"games_lose" => 0, "goals_scored" => 0,"goals_received" => 0 , "difference" => 0],
    ["team"=> "IRAN" ,"points" => 0,"games_played" => 0, "games_won" => 0,"games_equal" => 0, "games_lose" => 0, "goals_scored" => 0, "goals_received" => 0, "difference" => 0],
    ["team"=> "PORTUGUAL" ,"points" => 0,"games_played" => 0, "games_won" => 0,"games_equal" => 0, "games_lose" => 0, "goals_scored" => 0, "goals_received" => 0, "difference" => 0],
    ["team"=> "SPAIN" ,"points" => 0,"games_played" => 0, "games_won" => 0,"games_equal" => 0, "games_lose" => 0, "goals_scored" => 0, "goals_received" => 0, "difference" => 0]
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
<!--  =========================================================================
      ========================= body of table and forms =======================
      ========================================================================= 
-->
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
    <!-- 
    =========================================================================
    =========================  forms build ==================================
    ========================================================================= 
    -->
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


    <!-- 
    =========================================================================
    ========================= table build ===================================
    =========================================================================
    -->
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
          //=========== function that builds table empty ==============
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
          //=========== sort the teams by points ==============
              if( isset($_REQUEST['_method']) &&  $_REQUEST['_method'] == "PUT") {
              if(count(GetEqual(simulate($matches))) === 0 ){
                  foreach (SortTwo(simulate($matches))  as $key => $value) {
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
               //===========    ==============
              } else {
                  if(count(GetEqual(simulate($matches))) == 1){
                      if(count(GetEqual(simulate($matches))[0]) == 2){
                      foreach (SortTwo(simulate($matches) )  as $key => $value) {
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
                  } elseif ( count(GetEqual(simulate($matches))[0]) > 2) {
                    $theCommonItems =  GetEqual(simulate($matches))[0];
                    $rightsortedData = SortArr( GETnotTWOteams(simulate($matches)) , SortTwo(simulate(getWitoutteams( GetTheDiffTeams($theCommonItems) , $matches )))) ;
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
                  } elseif ( count(GetEqual(simulate($matches)))  == 2) {
                      foreach ( SortTwo(simulate($matches))  as $key => $value) {
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
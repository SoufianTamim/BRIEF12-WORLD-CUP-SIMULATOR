<?php
function getTheOposite( $array , $firstteam ){
    $arrayData = $array ;
     unset($arrayData[$firstteam]);
     unset($arrayData["STAT"]);
foreach ($arrayData as $key => $value) {
    return $key ;
}
    }
function resultCouter($resultsArray){
    $teams = [];
    $TheteamsKeys = array();
    foreach($resultsArray as $key => $val) {
        $contries = array();
        $values = array();
     foreach($val as $valkey => $miniVAL){
         array_push($contries, $valkey);
         array_push($values, $miniVAL);
         array_push($TheteamsKeys, $valkey);
     }
    }
    foreach ($TheteamsKeys as $key => $value) {
        if($value == "STAT"){
            unset($TheteamsKeys[$key]);
        }
    }
    $TheteamsKeys = array_values(array_unique($TheteamsKeys));
    foreach($TheteamsKeys as $value){
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
        $differenceerence = $goals_scored - $goals_received ;

        foreach ($resultsArray as $DataKey => $DataValue) {
            if(isset($DataValue[$key])){
                $goals_scored += $DataValue[$key] ;
                $goals_received += $DataValue[getTheOposite( $DataValue , $key )] ;
                if($DataValue["STAT"] == true){
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
        $teams[$key]["goals_scored"] = $goals_scored ; 
        $teams[$key]["goals_received"] = $goals_received ; 
        $teams[$key]["difference"] = $goals_scored - $goals_received ; 
        $teams[$key]["games_played"] = $games_played ; 
        $teams[$key]["games_won"] = $games_won ; 
        $teams[$key]["games_lose"] = $games_lose ; 
        $teams[$key]["games_equal"] = $games_equal ; 
        $teams[$key]["points"] = ( $games_won * 3 ) + ( $games_equal * 1 ) ; 
    }
    return dataFormChanger($teams);
    };
    function dataFormChanger($data) {
        foreach($data as $key => $value) {
            foreach ($value as $xkey => $xvalue) {
                $data[$key]["team"] = $key ;
            }
        }
        $bestArrayForm = [];
        foreach($data as $key => $value) {
          array_push($bestArrayForm , $value );
        }
        return $bestArrayForm;
    }
function sortByTwoEquals($data){
    global $matches;
    usort($data, function ($x, $y) {
        global $matches;
        if ($x["points"] === $y["points"]) {
            if ($x["difference"] === $y["difference"]) {
                if ($x["goals_scored"] === $y["goals_scored"]) {
                    foreach ( $matches as $matcheKey => $matcheValue) {
                        if(isset($matcheValue[$x["team"]])  && isset( $matcheValue[$y["team"]] )){
                            if ( $matcheValue[$x["team"]] === $matcheValue[$y["team"]]) {
                        return 0;
                    } else if ( $matcheValue[$x["team"]] < $matcheValue[$y["team"]] ) {
                        return 1 ;
                    } else if ( $matcheValue[$x["team"]] > $matcheValue[$y["team"]] ) {
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
function SortWithoutComparingtwoteams($data){
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
function GETCOMMONS($data){
    $common = array() ;
    $catch = array();
    foreach ($data as $key => $value) {
        $commonportion = array() ;
        $i = 1;
        foreach ($data as $xkey => $xvalue) {
            if($value["points"] === $xvalue["points"] &&  $value["difference"] === $xvalue["difference"] &&  $value["goals_scored"] === $xvalue["goals_scored"] && $value["team"] != $xvalue["team"] && !in_array($xvalue["team"], $catch)  && !in_array($value["team"], $catch)  ){
                if ($i === 1 ){
                    array_push( $commonportion ,  $value );
                    $i++;
                }
                array_push( $commonportion ,  $xvalue );
                array_push( $catch ,  $xvalue["team"] );
                   }
                }
                if( ! count($commonportion) == 0){
                    array_push( $common ,  $commonportion );
                }
    }
     return $common ;
}
function GetThedifferenceteams($array){
    $countriesOfteams = array("MOROCCO","IRAN","PORTUGUAL","SPAIN");
        $availableteams = array();
        foreach ( $array as $key => $value) {
            array_push( $availableteams , $value["team"]); 
        }
        $resultdifference = array_values(array_difference($countriesOfteams,$availableteams));
        return $resultdifference;
}
function getTheMAtchesResultsWithoutTheNotConcernedteams(  $addedItems , $MatchesArray  ){
    $ThematchesArray = $MatchesArray ;
    foreach($ThematchesArray as $ykey => $yval) {
        foreach($yval as $gkey => $gval) {
    foreach ( $addedItems  as $xkey => $xvalue) {
    if( $gkey == $xvalue ){
            unset($ThematchesArray[$ykey]);
        }
    }
    }
    }
    return $ThematchesArray;
}
function ArrayRightSort($Bigarray , $PortionArray){
$data = $Bigarray ;
        $CountriesInThePortionArray = array();
        foreach ($PortionArray as $PortionKey => $PortionValue) {
          array_push($CountriesInThePortionArray ,  $PortionValue["team"]  ) ; 
        }
        for ($i=0; $i < count($data) ; $i++) { 
            if( in_array( $data[$i]["team"] , $CountriesInThePortionArray  ) ) {
                $data[$i] = $PortionArray[0];
                $data[$i+1] = $PortionArray[1];
                $data[$i+2] = $PortionArray[2];
                break;
            } 
        }
        foreach ( $data as $key => $value) {
            foreach ( $Bigarray as $xkey => $xvalue) {
            if($value["team"] == $xvalue["team"]  )
            $data[$key] = $xvalue ;
            }
        }
        return $data ;
}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" href="#" />
  <title>WORLD CUP</title>
</head>
<body class="text-center">
<?php
    $Table = ["morocco" => ["points" => $ptsM = 0,"games_played" => $playedM = 0,"games_won" => $wonM = 0,"games_equal" => $equalM = 0,"games_lose" => $loseM = 0,	"goals_scored" => $scoredM = 0,"goals_received" => $receivedM = 0 ,	"difference" => $differenceM = 0],
      "portugual" => ["points" => $ptsP = 0,"games_played" => $playedP = 0,	"games_won" => $wonP = 0,"games_equal" => $equalP = 0,	"games_lose" => $loseP = 0,	"goals_scored" => $scoredP = 0,	"goals_received" => $receivedP = 0,	"difference" => $differenceP = 0],
      "spain" => ["points" => $ptsS = 0,"games_played" => $playedS = 0,	"games_won" => $wonS = 0,"games_equal" => $equalS = 0,	"games_lose" => $loseS = 0,	"goals_scored" => $scoredS = 0,	 "goals_received" => $receivedS = 0,	"difference" => $differenceS = 0],
      "iran" => ["points" => $ptsI = 0,"games_played" => $playedI = 0,	"games_won" => $wonI = 0,"games_equal" => $equalI = 0,	"games_lose" => $loseI = 0,	"goals_scored" => $scoredI = 0,	"goals_received" => $receivedI = 0,	"difference" => $differenceI = 0]
    ];
    $matches = ["MOROCCO_VS_IRAN"       => ["MOROCCO"   =>  0,"IRAN"      =>  0,"STATUS" => false],
                "POTUGUAL_VS_SPAIN"     => ["PORTUGUAL" =>  0,"SPAIN"     =>  0,"STATUS" => false],
                "MOROCCO_VS_SPAIN"      => ["MOROCCO"   =>  0,"SPAIN"     =>  0,"STATUS" => false],
                "PORTUGUAL_VS_IRAN"     => ["PORTUGUAL" =>  0,"IRAN"      =>  0,"STATUS" => false],
                "MOROCCO_VS_PORTUGUAL"  => ["MOROCCO"   =>  0,"PORTUGUAL" =>  0,"STATUS" => false],
                "IRAN_VS_SPAIN"         => ["IRAN"      =>  0,"SPAIN"     =>  0,"STATUS" => false]
  ];
  
  foreach ($matches as $key => $value){ 
    
    foreach ($value as $xkey => $xvalue){

      echo "here is the key " .$xkey ;
    
  ?>

  <form method="post">
    <div class=" mt-5 mb-5 d-flex align-items-center justify-content-center">
      <div class="d-flex flex-column ">
        <div class="d-flex flex-row align-items-center justify-content-center">
          <div class="col-2 pb-4">
            <p><?php $xkey[0] ?></p>
          </div>

          <div class="d-flex flex-row">

            <input type="number"  class="form-control w-50 mx-3" name="matchName" value="3" min="0" />

            <div clss="d-flex flex-column">
              <p>VS</p>
              <div class="mt-2">
                <button class="btn btn-secondary" type="submit" name="shoot">shoot</button>
              </div>
            </div>

            <input type="number"  class="form-control w-50 mx-3" name="matchName" value="2"  min="0" readonly="readonly" />

          </div>
          <div class="col-2 pb-4">
            <p><?php $xkey[1] ?></p>
          </div>
        </div>
      </div>
    </div>
  </form>


  <?php }} ?>



  <table class="table table-bordered container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Teams</th>
        <th scope="col">pts</th>
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
      foreach($GLOBALS['Table'] as $xkey => $xvalue) {       
        $count += 1;
        echo "<tr><th scope='row'>".$count."</th>";
        echo "<td>".$xkey."</td>";
          foreach($xvalue as $key => $value) {
            echo "<td>".$value."</td>";
          }
          echo "</tr>";
        }
    }
    ?>
    </tbody>
     <?php
        if(array_key_exists('shoot', $_POST)) {
            simulate();
        }
        function simulate() {
          echo "hh";

        // }
        // ================================================
        //============== conditions of games ==============
        // ================================================

          // if($_POST["morocco_iran_1"] < $_POST["iran_morocco_1"]){
          //   $GLOBALS['Table']['iran']['points'] += 3;
          //   $GLOBALS['Table']['iran']['games_won'] += 1;
          //   $GLOBALS['Table']['morocco']['games_lose'] += 1;
          //   $GLOBALS['Table']['morocco']['games_played'] += 1;
          //   $GLOBALS['Table']['iran']['games_played'] += 1;
          //   $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received'];
          // }elseif($_POST["morocco_iran_1"] > $_POST["iran_morocco_1"]){
          //   $GLOBALS['Table']['iran']['games_lose'] += 1;
          //   $GLOBALS['Table']['morocco']['points'] += 3;
          //   $GLOBALS['Table']['morocco']['games_won'] += 1;
          //   $GLOBALS['Table']['morocco']['games_played'] += 1;
          //   $GLOBALS['Table']['iran']['games_played'] += 1;
          //   $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received'];
          // }elseif($_POST["morocco_iran_1"] == $_POST["iran_morocco_1"]){
          //   $GLOBALS['Table']['morocco']['points'] += 1;
          //   $GLOBALS['Table']['iran']['points'] += 1;
          //   $GLOBALS['Table']['morocco']['games_equal'] += 1;
          //   $GLOBALS['Table']['iran']['games_equal'] += 1;
          //   $GLOBALS['Table']['morocco']['games_played'] += 1;
          //   $GLOBALS['Table']['iran']['games_played'] += 1;
          //   $GLOBALS['Table']['morocco']['goals_scored'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['iran']['goals_scored'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['morocco']['goals_received'] += $_POST["iran_morocco_1"];
          //   $GLOBALS['Table']['iran']['goals_received'] += $_POST["morocco_iran_1"];
          //   $GLOBALS['Table']['morocco']['difference'] += $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received'];
          // }

        }
        buildTable();
    ?>
  </table>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
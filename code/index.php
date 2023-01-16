<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" href="#" />
  <title>WCS</title>
  <link rel="icon" href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.K-AADEYyRUhk0gDx34TLIwHaHa%26pid%3DApi&f=1&ipt=0d31bc3327b9954f213c588502df4aeba6cfe9888b63cdeca9b9e7218471989d&ipo=images" type="image/icon type">

</head>
<body class="text-center">
  <form method="post">
    <div class=" mt-5 mb-5 d-flex align-items-center justify-content-center ">
      <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-center">
          <div class="col-2">
            <p>Morocco</p>
          </div>
          <div class="d-flex flex-row col-4 mb-3 input-group-sm">
            <input type="number"  class="form-control w-50 mx-3" name="MO_SC_M_1_IR"
            value="<?php if(isset($_POST['MO_SC_M_1_IR'])) echo $_POST['MO_SC_M_1_IR']; ?>0"/>
            <span>VS</span>
            <input type="number"  class="form-control w-50 mx-3" name="IR_SC_M_1_MO"
            value="<?php if(isset($_POST['IR_SC_M_1_MO'])) echo $_POST['IR_SC_M_1_MO']; ?>0"/>
          </div>
          <div class="col-2">
            <p>Iran</p>
          </div>
        </div>


        <div class="d-flex flex-column">
          <div class="d-flex flex-row align-items-center justify-content-center">
          <div class="col-2">
            <p>Portugual</p>
          </div>
          <div class="d-flex flex-row col-4 mb-3 input-group-sm">
            <input type="number" class="form-control w-50 mx-3" name="PO_SC_M_1_SP"
            value="<?php if(isset($_POST['PO_SC_M_1_SP'])) echo $_POST['PO_SC_M_1_SP']; ?>0"/>
            <span>VS</span>
            <input type="number" class="form-control w-50 mx-3" name="SP_SC_M_1_PO"
            value="<?php if(isset($_POST['SP_SC_M_1_PO'])) echo $_POST['SP_SC_M_1_PO']; ?>0"/>
          </div>
          <div class="col-2">
            <p>Spain</p>
          </div>
        </div>
        </div>


        <div class="d-flex flex-column">
          <div class="d-flex flex-row align-items-center justify-content-center">
          <div class="col-2">
            <p>Spain</p>
          </div>
          <div class="d-flex flex-row col-4 mb-3 input-group-sm">
            <input type="number"  class="form-control w-50 mx-3" name="SP_SC_M_2_MO"
             value="<?php if(isset($_POST['SP_SC_M_2_MO'])) echo $_POST['SP_SC_M_2_MO']; ?>0" />
            <span>VS</span>
            <input type="number"  class="form-control w-50 mx-3" name="MO_SC_M_2_SP"
             value="<?php if(isset($_POST['MO_SC_M_2_SP'])) echo $_POST['MO_SC_M_2_SP']; ?>0" />
          </div>
          <div class="col-2">
            <p>Morocco</p>
          </div>
        </div>
        
        
        <div class="d-flex flex-column">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <div class="col-2">
              <p>Iran</p>
            </div>
            <div class="d-flex flex-row col-4 mb-3 input-group-sm">
          <input type="number" class="form-control w-50 mx-3" name="IR_SC_M_2_PO"
          value="<?php if(isset($_POST['IR_SC_M_2_PO'])) echo $_POST['IR_SC_M_2_PO']; ?>0" />
          <span>VS</span>
          <input type="number" class="form-control w-50 mx-3" name="PO_SC_M_2_IR"
          value="<?php if(isset($_POST['PO_SC_M_2_IR'])) echo $_POST['PO_SC_M_2_IR']; ?>0"/>
        </div>
        <div class="col-2">
          <p>Portugual</p>
        </div>
      </div>


      <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-center">
        <div class="col-2">
          <p>Spain</p>
        </div>
        <div class="d-flex flex-row col-4 mb-3 input-group-sm">
          <input type="number" class="form-control w-50 mx-3" name="SP_SC_M_3_IR"
          value="<?php if(isset($_POST['SP_SC_M_3_IR'])) echo $_POST['SP_SC_M_3_IR']; ?>0"/>
          <span>VS</span>
          <input type="number" class="form-control w-50 mx-3" name="IR_SC_M_3_SP"
          value="<?php if(isset($_POST['IR_SC_M_3_SP'])) echo $_POST['IR_SC_M_3_SP']; ?>0"/>
        </div>
        <div class="col-2">
          <p>Iran</p>
        </div>
      </div>


      <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-center">
        <div class="col-2">
          <p>Portugual</p>
        </div>
        <div class="d-flex flex-row col-4 mb-3 input-group-sm">
          <input type="number"  class="form-control w-50 mx-3" name="PO_SC_M_3_MO"
          value="<?php if(isset($_POST['PO_SC_M_3_MO'])) echo $_POST['PO_SC_M_3_MO']; ?>0" />
          <span>VS</span>
          <input type="number"  class="form-control w-50 mx-3" name="MO_SC_M_3_PO"
          value="<?php if(isset($_POST['MO_SC_M_3_PO'])) echo $_POST['MO_SC_M_3_PO']; ?>0" />
        </div>
        <div class="col-2">
          <p>Morocco</p>
        </div>
      </div>


    <div clss="d-flex flex-row align-items-center justify-content-center">
      <button class="btn btn-secondary w-25 mb-3" type="submit" name="simulate">Simulate</button>
    </div>
</form>
  <section>
    <?php
    $Table = ["morocco" => ["points" => $ptsM = 0,"games_played" => $playedM = 0,"games_won" => $wonM = 0,"games_equal" => $equalM = 0,"games_lose" => $loseM = 0,	"goals_scored" => $scoredM = 0,"goals_received" => $receivedM = 0 ,	"difference" => $differenceM = 0],
              "portugual" => ["points" => $ptsP = 0,"games_played" => $playedP = 0,	"games_won" => $wonP = 0,"games_equal" => $equalP = 0,	"games_lose" => $loseP = 0,	"goals_scored" => $scoredP = 0,	"goals_received" => $receivedP = 0,	"difference" => $differenceP = 0],
              "spain" => ["points" => $ptsS = 0,"games_played" => $playedS = 0,	"games_won" => $wonS = 0,"games_equal" => $equalS = 0,	"games_lose" => $loseS = 0,	"goals_scored" => $scoredS = 0,	 "goals_received" => $receivedS = 0,	"difference" => $differenceS = 0],
              "iran" => ["points" => $ptsI = 0,"games_played" => $playedI = 0,	"games_won" => $wonI = 0,"games_equal" => $equalI = 0,	"games_lose" => $loseI = 0,	"goals_scored" => $scoredI = 0,	"goals_received" => $receivedI = 0,	"difference" => $differenceI = 0]
    ];

    ?>
  </section>
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
      foreach($GLOBALS['Table'] as $x => $val) {       
        $count = 1;
        echo "<tr><th scope='row'>".$count."</th>";
        $count ++;
        echo "<td>".$x."</td>";
          foreach($val as $key => $value) {
            echo "<td>".$value."</td>";
          }
          echo "</tr>";
        }
    }
    ?>
    </tbody>
     <?php
        if(array_key_exists('simulate', $_POST)) {
            simulate();
        }
        function simulate() {
            $GLOBALS['Table']['morocco']['goals_scored'] = $_POST["MO_SC_M_1_IR"]+$_POST["MO_SC_M_2_SP"]+ $_POST["MO_SC_M_3_PO"];
            $GLOBALS['Table']['iran']['goals_scored'] = $_POST["IR_SC_M_1_MO"]+$_POST["IR_SC_M_2_PO"] + $_POST["IR_SC_M_3_SP"];
            $GLOBALS['Table']['portugual']['goals_scored'] = $_POST["PO_SC_M_1_SP"]+$_POST["PO_SC_M_2_IR"] + $_POST["PO_SC_M_3_MO"];
            $GLOBALS['Table']['spain']['goals_scored'] = $_POST["SP_SC_M_1_PO"]+$_POST["SP_SC_M_2_MO"]+$_POST["SP_SC_M_3_IR"];

            $GLOBALS['Table']['morocco']['goals_received'] = $_POST["IR_SC_M_1_MO"]+$_POST["SP_SC_M_2_MO"]+$_POST["PO_SC_M_3_MO"];
            $GLOBALS['Table']['iran']['goals_received'] = $_POST["MO_SC_M_1_IR"]+$_POST["PO_SC_M_2_IR"]+$_POST["SP_SC_M_3_IR"];
            $GLOBALS['Table']['portugual']['goals_received'] = $_POST["SP_SC_M_1_PO"]+$_POST["IR_SC_M_2_PO"]+$_POST["MO_SC_M_3_PO"];
            $GLOBALS['Table']['spain']['goals_received'] = $_POST["PO_SC_M_1_SP"]+$_POST["MO_SC_M_2_SP"]+$_POST["IR_SC_M_3_SP"];

            $GLOBALS['Table']['morocco']['difference'] = $GLOBALS['Table']['morocco']['goals_scored'] - $GLOBALS['Table']['morocco']['goals_received'];
            $GLOBALS['Table']['iran']['difference'] = $GLOBALS['Table']['iran']['goals_scored'] - $GLOBALS['Table']['iran']['goals_received'];
            $GLOBALS['Table']['portugual']['difference'] = $GLOBALS['Table']['portugual']['goals_scored'] - $GLOBALS['Table']['portugual']['goals_received'];
            $GLOBALS['Table']['spain']['difference'] = $GLOBALS['Table']['spain']['goals_scored'] - $GLOBALS['Table']['spain']['goals_received'];

          }
        // }
        
        buildTable();
    ?>
  </table>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
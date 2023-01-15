<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" href="#" />
  <title>world cup simulator</title>
</head>
<body class="text-center">
  <form method="get">
    <div class=" mt-5 mb-5 d-flex align-items-center justify-content-center ">
      <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-center">
          <div class="col-2">
            <p>Morocco</p>
          </div>
          <div class="d-flex flex-row col-4 mb-3 input-group-sm">
            <input type="number" value="3" class="form-control w-50 mx-3" name="momatch1"/>
            <span>VS</span>
            <input type="number" value="2" class="form-control w-50 mx-3" name="iranmatch1"/>
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
            <input type="number" value="0" class="form-control w-50 mx-3" />
            <span>VS</span>
            <input type="number" value="0" class="form-control w-50 mx-3"/>
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
            <input type="number" value="" class="form-control w-50 mx-3" name=""/>
            <span>VS</span>
            <input type="number" value="" class="form-control w-50 mx-3" name=""/>
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
          <input type="number" value="" class="form-control w-50 mx-3" name=""/>
          <span>VS</span>
          <input type="number" value="" class="form-control w-50 mx-3" name=""/>
        </div>
        <div class="col-2">
          <p>Portugual</p>
        </div>
      </div>


      <div class="d-flex flex-column">
        <div class="d-flex flex-row align-items-center justify-content-center">
        <div class="col-2">
          <p>Sapin</p>
        </div>
        <div class="d-flex flex-row col-4 mb-3 input-group-sm">
          <input type="number" value="" class="form-control w-50 mx-3" name="momatch1"/>
          <span>VS</span>
          <input type="number" value="" class="form-control w-50 mx-3" name="iranmatch1"/>
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
          <input type="number" value="" class="form-control w-50 mx-3" name="momatch1"/>
          <span>VS</span>
          <input type="number" value="" class="form-control w-50 mx-3" name="iranmatch1"/>
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
    $pts = 0;
    $played = 3;
    $won = 0;
    $equal = 0; 
    $lose = 0;
    $scored = 0;
    $received = 0;
    $difference = $scored - $received;

    $Table = array( 
       "morocco" => array (
          "points" => $ptsM = 3,
          "games_played" => $playedM = 0,	
          "games_won" => $wonM = 0,
          "games_equal" => $equalM = 0,	
          "games_lose" => $loseM = 0,	
          "goals_scored" => $scoredM = 0,	
          "goals_received" => $receivedM = 0,	
          "difference" => $differenceM = $scoredM - $receivedM
       ),
       "spain" => array (
          "points" => $ptsS = 0,
          "games_played" => $playedS = 0,	
          "games_won" => $wonS = 0,
          "games_equal" => $equalS = 0,	
          "games_lose" => $loseS = 0,	
          "goals_scored" => $scoredS = 0,	
          "goals_received" => $receivedS = 0,	
          "difference" => $differenceS = $scoredS - $receivedS
       ),
       "portugual" => array (
          "points" => $ptsP = 0,
          "games_played" => $playedP = 0,	
          "games_won" => $wonP = 0,
          "games_equal" => $equalP = 0,	
          "games_lose" => $loseP = 0,	
          "goals_scored" => $scoredP = 0,	
          "goals_received" => $receivedP = 0,	
          "difference" => $differenceP = $scoredP - $receivedP
       ),
       "iran" => array (
          "points" => $ptsI = 0,
          "games_played" => $playedI = 0,	
          "games_won" => $wonI = 0,
          "games_equal" => $equalI = 0,	
          "games_lose" => $loseI = 0,	
          "goals_scored" => $scoredI = 0,	
          "goals_received" => $receivedI = 0,	
          "difference" => $differenceI = $scoredI - $receivedI
       )
       );
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
      <tr>
        <th scope="row">1</th>
        <td>Morooco</td>
        <?php
        echo "<td>" .$ptsM. "</td>";
        echo "<td>" .$playedM. "</td>";
        echo "<td>" .$wonM. "</td>";
        echo "<td>" .$equalM. "</td>";
        echo "<td>" .$loseM. "</td>";
        echo "<td>" .$scoredM. "</td>";
        echo "<td>" .$receivedM. "</td>";
        echo "<td>" .$differenceM. "</td>";
        ?>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Spain</td>
        <?php
        echo "<td>" .$ptsS. "</td>";
        echo "<td>" .$playedS. "</td>";
        echo "<td>" .$wonS. "</td>";
        echo "<td>" .$equalS. "</td>";
        echo "<td>" .$loseS. "</td>";
        echo "<td>" .$scoredS. "</td>";
        echo "<td>" .$receivedS. "</td>";
        echo "<td>" .$differenceS. "</td>";
        ?>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Portugual</td>
        <?php
        echo "<td>" .$ptsP. "</td>";
        echo "<td>" .$playedP. "</td>";
        echo "<td>" .$wonP. "</td>";
        echo "<td>" .$equalP. "</td>";
        echo "<td>" .$loseP. "</td>";
        echo "<td>" .$scoredP. "</td>";
        echo "<td>" .$receivedP. "</td>";
        echo "<td>" .$differenceP. "</td>";
        ?>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Iran</td>
        <?php
        echo "<td>" .$ptsI. "</td>";
        echo "<td>" .$playedI. "</td>";
        echo "<td>" .$wonI. "</td>";
        echo "<td>" .$equalI. "</td>";
        echo "<td>" .$loseI. "</td>";
        echo "<td>" .$scoredI. "</td>";
        echo "<td>" .$receivedI. "</td>";
        echo "<td>" .$differenceI. "</td>";
        ?>
      </tr>
    </tbody>
  </table>

     <?php
        if(array_key_exists('simulate', $_GET)) {
            simulate();
        }
        function simulate() {
            echo $_GET["momatch1"]; 
            echo "<br>";
            echo $_GET["iranmatch1"]; 
        }
    ?>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<script src="/node_modules/@popperjs/core/lib/popper.js"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
          foreach ($matches as $key => $value){  
        ?>
        <form method="post">
          <div class="d-flex align-items-center justify-content-center bg-info  p-2 m-2 rounded">
            <div class="d-flex flex-column">
              <div class="d-flex flex-row align-items-center justify-content-center">
                <div class="d-flex flex-row">
                  <p>
                    <?php 
                      foreach ($value as $nkey => $nvalue){
                        if ($nkey !== "STAT") {
                          echo $nkey;
                    ?>
                  </p>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center p-2 m-3 rounded w-50 bg-secondary">
                  <!-- <input type="number" class="form-control mx-4 w-50" name="matchName1" value="" min="0" /> -->
                  <input type="hidden" name="TeamOne[]"  value="<?php echo $nkey; ?>" >
                  <input type="number" min="0" <?php if( $value["STAT"] == true ){echo "readonly";} ?> class="form-control mx-3 w-50" name="TeamOne[]"  value="<?php echo $nvalue ?>" >
                  <?php 
                          break;
                        }
                      } 
                    ?> 
                  <span>VS</span>
                  <?php
                      foreach ($value as $nkey => $nvalue) {
                        $nkey = array_keys($value);
                        
                        ?>
                  <!-- <input type="number" class="form-control mx-3 w-50" name="matchName2" value="" min="0"/> -->
                  <input type="hidden"  class="form-control mx-3 w-50" name="TeamTwo[]" value="<?php echo $nkey[1] ?>" >
                  <input type="number" min="0"  <?php if( $value["STAT"] == true ){echo "readonly";} ?>  class="form-control mx-3 w-50" name="TeamTwo[]" value="<?php echo $nvalue ?>" >
    
                </div>
                <div class="d-flex flex-row">
                  <p>
                    <?php
                        echo $nkey[1];
                        
                      
                    ?>
                  </p>
                </div>
                <div class="m-3">

                <input type="hidden"  class="w-25 mx-auto " name="MatchName" value="<?php echo $nkey ?>" >
                <input  type="submit" <?php if( $value["STAT"] == true ){echo "disabled";} ?> value="SHOOT" class="btn btn-primary" > 
    
                  
                  <!-- <input type="submit" name="shoot" value="shoot" class="btn btn-primary"> -->



                  <?php
                   
                   
                   break;
                 }
              
                    // if(isset($_POST['shoot'])) {
                    //   echo '<input type="text" name="matchName1" value="'.$_POST['matchName1'].'" readonly>';
                    //   echo '<input type="text" name="matchName2" value="'.$_POST['matchName2'].'" readonly>';
                    // }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </form>
        <?php
          };
        ?>

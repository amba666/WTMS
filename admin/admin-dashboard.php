<?php
require_once 'assets/php/admin-headers.php';
require_once 'assets/php/admin-db.php';
$count = new Admin();// obj 
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-deck mt-3 text-light text-center font-weight-bold">
            
        <div class="card bg-primary">
                <div class="card-header">Total Users</div>
                 <div class="card-body">
                    <h1 class="display-4">
                          <?=$count->totalCount('users'); ?>
                    </h1>
                 </div>
            </div>  

            <div class="card bg-warning">
                <div class="card-header">Verified Users</div>
                 <div class="card-body">
                    <h1 class="display-4">
                    <?=$count->verified_users(1); ?>
                    </h1>
                 </div>
            </div>

            <div class="card bg-success">
                <div class="card-header">Unverified Users</div>
                 <div class="card-body">
                    <h1 class="display-4">
                    <?=$count->verified_users(0); ?>
                    </h1>
                 </div>
            </div>

            <div class="card bg-danger">
                <div class="card-header">System Hits</div>
                 <div class="card-body">
                    <h1 class="display-4">
                           <?php $data = $count->system_hits(); echo $data['hints']; ?>
                    </h1>
                 </div>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
    <div class="card-deck mt-3 text-light text-center font-weight-bold">
      
    <div class="card bg-danger">
        <div class="card-header">Total Requests</div>
        <div class="card-body">
            <h1 class="display-4">
            <?=$count->totalCount('requests'); ?>
            </h1>
        </div>
       </div>

       <div class="card bg-success">
        <div class="card-header">Total Feedback</div>
        <div class="card-body">
            <h1 class="display-4">
            <?=$count->totalCount('feedback'); ?>
            </h1>
        </div>
       </div>

       <div class="card bg-info">
        <div class="card-header">Total Notification</div>
        <div class="card-body">
            <h1 class="display-4">
            <?=$count->totalCount('notification'); ?>
            </h1>
        </div>
       </div>    
    </div>

    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-12">
     <div class="card-deck my-3">
          <div class="card border-success">
              <div class="card-header bg-success text-center text-white lead">
            Male/Female User's Percentage
               </div>
            <div id="chartOne" style="width:99%; height: 400px;"></div>
        </div>


        <div class="card border-info"> 
              <div class="card-header bg-info text-center text-white lead">
           Verified/Unverified User's Percentage
               </div>
            <div id="chatTwo" style="width:99%; height: 400px;"></div>
        </div>


     </div>

     </div>

</div>           -->





<!-- futa area -->
           </div>
        </div>
    </div>
    

<!-- google chart cdn links -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">


google.charts.load("current", {packages: ["corechart"]});
google.charts.setOnLoadCallback(pieChart);
function pieChart(){
    var data = new google.visualization.arrayToDataTable([
        ['Gender','Number'],
        <?php
        $gender= $count->genderPer();
        foreach($gender as $row){
            echo '["'.$row['gender'].'",'.$row['number'].'],';
        }
        
        ?>
     ]);
    var options = {
        is3D: false
     };
     var data = new google.visualization.PieChart(document.getElementById('chartOne'));
     chart.draw(data, options);
    }






    





</script>
</body>
</html>








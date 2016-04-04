<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ride Cost</title>
</head>
<body>
    <!-- Calcluate the cost of a ride using a mileage rate and initial fee
        by Alan Webb 
        run showinfo.php for current PHP information
        PHP version: 5.6.17-pl0-gentoo  -->
    <div class="container">
        <form class="form-horizontal" role="form" method="post" name="search">
            <div class="form-group">
                <p style="text-align:center"><strong>Ride Cost</strong></p>
                <p style="text-align:left">Rates: Initial Cost: $2.50, Mileage $1.60/mile, Wait Time: $0.10/minute</p>
                <label class="control-label input-label" for="distance">Distance:</label>
                <input class="form-control" name="distance" type="text"><br>
                <input class="form-control" id="submit" value="Calculate" type="submit">
            </div>
    <!--Container div end-->
    <?php 
        $FlagDrop=2.5;
        $Rate=1.6;
        $Distance=0;

        If($POST_["submit"]="Calculate"){
            $Distance=$POST_["distance"];
            $Cost=$FlagDrop+($Distance*$Rate);
            Print "Ride costs: " . $Cost;
        }
    ?>
    </div>
</body>
</html>

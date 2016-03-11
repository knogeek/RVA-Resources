
    <?php
    /**
 * Display all listed agencies and affiliated services with primary phone numbers.
 *
 * Provide a form to collect filter/find values to search for specific agencies or services.
 *
 * @version 0.1a
 * @author alan webb
 */
    //db connection attributes for PDO
    $host="mysqlcluster8.registeredsite.com";
    $dbname="wow_dev";
    $user="trollboss";                          //ya, ya, putting the user name and password here is bad.
    $pwd="Love*78God";
    
    //Database connection
    try{
        //Using PDO
        $dbc = new pdo("mysql:host=$host;dbname=$dbname",$user,$pwd);
        //This would be nice: PDO::query ( string $statement , int $PDO::FETCH_INTO , object $object )
        $result = $dbc->query('select * from servicecount_vw;');
            //while there are rows, print the name of the service and the count

        }
    catch (PDOException $e){
        
        throw new Exception($e);
    }
    finally{
	    $dbc=null;
        $result=null;
    }
    ?>

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RVA Resources</title>
</head>
<body>
    <!-- I'm learning slowly. Divs rather than tables for responsive design, I'm told. -->
    <div class="container">
        <!-- Search form -->
        <form role="form" method="post" name="search">
            <div class="form-group">
                <legend style="text-align:center">What are you looking for?</legend>
                <input class="form-control input-lg" name="searchstring" type="text"><br>
                <label class="control-label input-label" for="uselocation">Use my location:</label>
                <input class="form-control" type="checkbox" id="uselocation">
                <input class="form-control" id="submit" value="Find" type="submit" style="float:right">
                <!-- Panic Button -->
                <input type="button" class="btn" value="!">
            </div>
        </form>
        <!--Title-->
        <p style="text-align:center"><strong>Services</strong></p>
        <div class="row">
            <!-- Column headings -->
            <div class="col-xs-6" style="text-align:center"><strong>Service</strong></div>
            <div class="col-xs-6" style="text-align:right"><strong># of agencies</strong></div>
        </div>
        <!-- Listed services are shown as links to a different result set showing the agencies that
             provide the service in a list headed by a map from Google Maps with pins for each agency -->

        
        
    <!--Container div end-->
    </div>
</body>
</html>

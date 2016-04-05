<!-- RVA Resources provider details. Display details about selected provider on providers.php -->

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RVA Provider Details</title>
</head>
<body>
    <!-- Provider details 
        path: index.php -> providers.php
        run ../rva_resources/showinfo.php for current PHP information
        PHP version: 5.6.17-pl0-gentoo
        DB engine: MySQL mysqlnd 5.0.11-dev - 20120503  -->
    <div class="container-fluid">
        <!-- Google Adsense -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7275392186591516"
             data-ad-slot="7702634944"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <hr>
        <img src="rva_logo.jpg" class="img-responsive" style="align-content:center" />

        <p style="text-align:center" class="text-warning">
            <mark style="background-color:lime;font-weight:700;font-family:Verdana, Geneva, Tahoma, sans-serif;">Progress!</mark> There are still bugs. If you browse to this page without passing in a provider id you'll see
                                a database error. That's for another day.
        </p>
        <p style="font-weight:bold; text-align:center">Provider Details</p>
        <!-- Provider details Get over post because this form is read only to the public and the only variable passed is 
            the numeric identifier of a provider. -->
        <?php
            /*Script to go get provider details. I can do a bunch of echo/prints to make this happen. 
              Soon enough I have to make forms work. Eventual form is quoted out below.
            */
            try{
                //This is pretty much a cut & paste of the code used in index.php to get services.
                $host="mysqlcluster8";       
                $dbname="wow_dev";
                $port=3306;
                $socket="";
                $user="trollboss";                          //ya, ya, putting the user name and password here is bad.
                $pwd="Love*78God";
                
                $selectedprovider=$_GET["provider_id"];
                $sqlstring = "select * from providerdetails_vw where provider_id=$selectedprovider;";   //embedding SQL strings in the app has its issues as well.

                $cn = new pdo("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result=$cn->query($sqlstring);
                $result->setfetchmode(PDO::FETCH_ASSOC);

                //I'm only expecting one row to be returned cuz I wrote it that way.
                try{
                    If($result->rowcount()>0){
                        while($row=$result->fetch()){
                            //php, html escaping fool. And yes, this could be formatted better. Patience.
                            ?>
                                <div class="form-group">
                                    <p>Average Rating: <?=$row['avg_rating']?></p> 
                                    <p><?=$row['providername']?>: <?=$row['phoneno']?></p> 
                                    <p>Address: <?=$row['address']?>, <?=$row['city']?>, <?=$row['state']?>  <?=$row['postalcode']?></p> 
                                    <p>URL: <?=$row['website']?></p> 
                                    <p>Note: <?=$row['note']?></p> 
                              </div>
                          <!-- remainder of php script -->
                        <?php /*close while loop */ }
                    }
                }
                catch(Exception $e){
                    print "That's not gone well: " . $e->getMessage() . "You can e-mail support@worldofwebb.net with the error message and we'll fix it as soon as we can.";
                }
            }
            catch(PDOException $pdoe){
                    die( "There is a problem connecting to the database: " . $pdoe->getMessage() . "We probably know about it. You can e-mail support@worldofwebb.net if you have further questions.");
            }
            finally{
            //put the toys away, children.
                $sqlstring="";
                $result=null;
                $cn=null;
            }  
        ?>
        <!-- Form is quoted out until I learn how to use forms together with php & mySQL. No, don't e-mail
             me with the answer. That's no fun at all. -->
        <!-- <form action="getprovider.php" method="get" role="form" class="form-horizontal">
            <div class="form-group">
                <label for="servicearea">Service Area</label><input  type="text" class="form-control" name="servicearea"><br>
                <label for="providername">Provider</label><input  type="text"class="form-control" name="providername"><br>
                <label for="address">Address</label><input  type="text" class="form-control" name="address"><br>
                <label for="city">City</label><input  type="text" class="form-control" name="city">
                State needs an inline script to fill the list of states/provinces if editing is enabled. 
                <label for="state">State</label><input  type="text" class="form-control" name="state">
                <label for="postalcode">Postal Code</label><input  type="text" class="form-control" name="postalcode"><br>
                <label for="website">URL</label><input  type="text" class="form-control" name="website"><br>
                What happens if the note is bigger than the text area? Will it expand to fit? What's a reasonable length for a
                     text area/note on a 4.3" screen? 
                <label for="note">Note</label><textarea class="form-control" rows="2" id="note"></textarea>
                <label for="rating">Rating</label><input type="text" class="form-control" name="rating">
            </div>
        </form> -->
        <!-- Nave bar for whatever screens we build -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">RVA Resources</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="providers.php">Providers</a></li>
                    <li><a href="index.php">Services</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Panic button here? -->
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
        <hr>
        <!-- Google Custom Search-->
        <form action="http://www.google.com" id="cse-search-box" target="_blank">
            <div>
                <input type="hidden" name="cx" value="partner-pub-7275392186591516:pt43wh-ghaa" />
                <input type="hidden" name="ie" value="ISO-8859-1" />
                <input type="text" name="q" size="31" />
                <input type="submit" name="sa" value="Search" />
            </div>
        </form>
        <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
    <!--Container div end-->
    </div>
</body>
</html>
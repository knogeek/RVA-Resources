<!-- RVA Resources. A student project to publish a list of services provided by NGO's, non-profits,
     churches, & social services agencies in a mobile-first design. Source list created by Nicki Moon of Henrico County
     Mental Health Services. Contributors: Alan Webb, Candyce Collins, License for this project is the
     GNU General Public License. This version uses the PDO object to connect to the database. 
     mySQLi has been deprecated, it seems.-->

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RVA Resources</title>
</head>
<body>
    <!-- Alan Webb: I'm learning slowly. Divs rather than tables for responsive design, I'm told. 
        run ../rva_resources/showinfo.php for current PHP information
        PHP version: 5.6.17-pl0-gentoo
        DB engine: MySQL mysqlnd 5.0.11-dev - 20120503  -->
    <div class="container">
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

        <p style="text-align:center; font-family:Cambria" class="text-warning">
            <mark style="background-color:hotpink;font-weight:bold;font-family:Verdana, Geneva, Tahoma, sans-serif;">Not Done Yet</mark>
        </p>
        <p style="font-family:Cambria">
            <span style="font-weight:bold">RVA Resources: </span>A student project to publish a list of services provided by NGO's, non-profits,
            churches, & social services agencies in a mobile-first design. As of 04/04/2016, known services are listed. Providers for these
            services are in the database but not viewable through this site. Source list created by Nicki Moon of Henrico County
            Mental Health Services.
        </p>
        <img src="underconstruction.gif" class="img-responsive" style="align-content:center" />
        <!-- Search form -->
        <form role="form" method="search.php" name="search">
            <div class="form-group" style="font-family:Cambria">
                <legend style="text-align:center; font-weight:700; font-family:Cambria">What are you looking for?</legend>
                <input class="form-control input-lg" name="searchstring" type="text"><br>
                <div class="row">
                    <div class="col-xs-4"><label class="control-label input-label" for="uselocation">Show only providers near me:</label></div>
                    <div class="col-xs-4"><input class="form-control" type="checkbox" id="uselocation"></div>
                    <div class="col-xs-4"><input class="btn" id="submit" value="Find" type="submit" style="float:right"></div>
                </div>
            </div>
        </form>
        <!--Title-->
        <div class="row"><p style="text-align:center;font-weight:700;font-family:Cambria;">Services</p></div>
        <!-- Listed services are shown as links to a different result set showing the agencies that
             provide the service in a list headed by a map from Google Maps with pins for each agency -->
            <!-- Column headers -->
            <div class="row">
                <div class="col-xs-10" style="font-weight:700; font-family:Cambria">Service</div>
                <div class="col-xs-2" style="font-weight:700; text-align:right; font-family:Cambria"># of Providers</div>
            </div> 
            <!-- Fill in an initial list of services and providers -->
            <?php
                try{
                    //Connect to the database and pull a result
                    /*In production, on the web server, only use mysqlcluster8 web.com has things set up so that
                      mysqlcluster8.registeredsite.com works inside Visual Studio but not out there on the site. */
                    $host="mysqlcluster8.registeredsite.com";       
                    $dbname="wow_dev";
                    $port=3306;
                    $socket="";
                    $user="trollboss";                          //ya, ya, putting the user name and password here is bad.
                    $pwd="Love*78God";
                    //servicecount_vw changed to add servicecode as the first column. 04-03-2016 aw
                    $sqlstring = "SELECT servicecode, servicename, servicecount FROM wow_dev.servicecount_vw;";   //embedding SQL strings in the app has its issues as well.

                    $cn = new pdo("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
                    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $result=$cn->query($sqlstring);
                    $result->setfetchmode(PDO::FETCH_ASSOC);

                    //If we get here, we are connected.
                    try{
                        If($result->rowcount()>0){
                            //We have data! Iterate
                            while ($row=$result->fetch()){
                                //print that thing as a two column list with the service names as links.
                                ?>
                                <div class="row">
                                    <!--I need to remember service codes so I know which service was clicked on -->
                                    <div class="col-xs-10" style="font-family:Cambria"><a href='providers.php?servicecode='"<?=$row['servicecode']?>"><?=$row['servicename']?></a></div>
                                    <div class="col-xs-2" style="text-align:right; font-family:Cambria"><?=$row['servicecount']?></div>
                                </div>
                            <?php /*close the while loop */ } ?>
                        <?php /* end of if statement */ } 
                        else{
                             print "No services found."; 
                        } 
                    }
                    catch(Exception $e){
                        print "That's not gone well: " . $e->getMessage() . "You can e-mail support@worldofwebb.net with the error message and we'll fix it as soon as we can.";
                    }
                    //Put the toys away, children
                    finally{
                    //close the database connection, put everything away.
                        $sqlstring="";
                        $result=null;
                        $cn=null;
                    }
                }
                catch (PDOException $pdoe){
                    die( "There is a problem connecting to the database: " . $pdoe->getMessage() . "We probably know about it. You can e-mail support@worldofwebb.net if you have further questions.");
                }
            ?>
            <!-- service listing script ends -->
            <p style="text-align:center; font-weight:bold font-family:Cambria">- 30 -</p>
        <hr>
        <!-- Nave bar for whatever screens we build -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">RVA Resources</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="providers.php">Providers</a></li>
                    <li><a href="services.php">Services</a></li>
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

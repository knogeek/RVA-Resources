<!-- RVA Resources provider list. Display a list of providers for the service selected on index.php -->

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RVA Providers</title>
</head>
<body>
    <!-- Providers of a service 
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
        <p style="text-align:center" class="text-warning">
            <mark style="background-color:hotpink;font-weight:700;font-family:Verdana, Geneva, Tahoma, sans-serif;">Not Done Yet. If something works you got lucky.</mark>
        </p>
        <p style="font-weight:bold">Providers</p>
        <!-- Provider list -->
        <?php
            //script to get providers for selected service
            try{
                /*In production, on the web server, only use mysqlcluster8 web.com has things set up so that
                  mysqlcluster8.registeredsite.com works inside Visual Studio but not out there on the site. */
                
                $host="mysqlcluster8";       
                $dbname="wow_dev";
                $port=3306;
                $socket="";
                $user="trollboss";                          //ya, ya, putting the user name and password here is bad.
                $pwd="Love*78God";
                
                //Figure out what service was clicked on.
                $selectedservice=$_GET["servicecode"];
                $sqlstring = "select providerid, providername from serviceprovidername_vw 
                              where serviceprovidername_vw.servicecode='$selectedservice'
                              order by providername;";   //embedding SQL strings in the app has its issues as well.
                
                $cn = new pdo("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result=$cn->query($sqlstring);
                $result->setfetchmode(PDO::FETCH_ASSOC);

                try{
                    If($result->rowcount()>0){
                        while ($row=$result->fetch()){
                        //Link to the detail about the provider.
                        ?>
                            <div class="row"><?=$row[providername]?></div>
                        <?php }
                    }
                    else{
                        print "No service providers found.";
                    }
                }
                catch(Exception $e){
                //Not expecting a PDO connection issue by now.
                    die("That's not gone well: " . $e );
                }
            }
            catch(PDOexception $pdoe){
                    die( "There is a problem connecting to the database to retrieve providers: " . $pdoe->getMessage() . "We probably know about it. You can e-mail support@worldofwebb.net if you have further questions.");
            }
            finally{
            } 
        ?>
        <div class="row text-center" style="font-weight:bold"> -30- </div>
        <!-- Menubar I need globals storing the selected service and the path to home. Paths are hard coded so far.-->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#">RVA Resources</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Providers</a></li>
                <li><a href="#">Services</a></li> 
                <li><a href="#">Page 3</a></li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
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

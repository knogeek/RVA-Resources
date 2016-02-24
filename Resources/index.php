<!DOCTYPE html>
<html>
<head>
    <meta lang="en-US" charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="default.css"/>
    <title>Resources</title>
</head>
<body>
    <!-- Display all listed agencies and affiliated services with primary phone numbers. -->
    <form name="Search" method="get" action="search.php">
        <fieldset>
            <legend><strong>What Are You Looking For?</strong></legend>
            <!-- User types a search string similar to what they would type in a search engine
                 like Google or Bing -->
            <input type="search" name="searchterm"><br>
            <input type="checkbox"><label>Use my location</label>
            <input type="submit" value="Find">
        </fieldset>
            <!-- Panic button will use a mobile phone to dial 911.
                 I'd like to also see a 'stealth mode' where cat videos
                 or some such are displayed to cover the 911 call for
                 victims who worry that making the call escalates the threat -->
        <img source="panic_button.jpg" alt="Panic Button">
    </form>
    <!--Table is a static representation of expected result-->
    <table>
        <thead>Service</thead>
        <tbody>
            <tr>
                <td>Food</td>
                <td>(25)</td>
            </tr>
            <tr>
                <td>Shelter</td>
                <td>(4)</td>
            </tr>
            <tr>
                <td>Mental Health</td>
                <td>(2)</td>
            </tr>
        </tbody>
    </table>
    <div class="footer"><p>Copyright 2016, Alan Webb, All Rights Reserved. Thank you, Nicki Moon</p></div>
    <?php
    /**
 * Display all listed agencies and affiliated services with primary phone numbers.
 *
 * Provide a form to collect filter/find values to search for specific agencies or services.
 *
 * @version 1.0
 * @author alan
 */
 /*Database connection*/
$host="mysqlcluster8.registeredsite.com";
$port=3306;
$socket="";
$user="trollboss";
$password="";
$dbname="wow_dev";
try
{
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

}
catch (Exception $exception)
{
}

    ?>
</body>
</html>

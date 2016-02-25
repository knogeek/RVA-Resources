<!DOCTYPE html>
<html>
<head>
    <meta lang="en-US" charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="default.css"/>
    <title>Resources</title>
</head>
<body>
    <!-- Initial list is all services and a count of how many agencies provide
         that service. Services without a provider will not be shown. -->
    <form name="Search" method="get" action="search.php">
        <fieldset>
            <legend><strong>What Are You Looking For?</strong></legend>
            <!-- Select items are static until I learn how to populate it from the source data -->
            <input type="search" name="searchterm"><br>
            <input type="submit" value="Find">
        </fieldset>
        <input type="image" src="resources/panic_button.jpg"/ value="Help!">
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
    <div class="footer">Copyright 2016, Alan Webb, All Rights Reserved. Thank you, Nicki Moon.</div>
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

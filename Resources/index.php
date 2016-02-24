<!DOCTYPE html>
<html>
<head>
    <meta lang="en-US" charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="default.css"/>
    <title>Resources</title>
</head>
<body>
    <!-- Display all listed agencies and affiliated services with primary phone numbers. -->
    <p style="text-align:center; font-weight:700">Agencies and Services</p>
    <p style="#body #p.left">Type one or more search values in the form below then click Filter.</p>
    <form name="Search" method="get" action="search.php">
        <fieldset>
            <legend><strong>Filter/Find Agencies and Services Offered</strong></legend>
            <label>Service Area:</label>
            <!-- Select items are static until I learn how to populate it from the source data -->
                <select name="servicearea">
                    <option value="richmond">Richmond</option>
                    <option value="henrico">Henrico</option>
                    <option value="chesterfield">Chesterfield</option>
                    <option value="hanover">Hanover</option>
                    <option value="tri-cities">Tri-Cities</option>
                </select><br>
            <label>Agency Name:</label><input type="search" name="agencyname"><br>
            <label>City:</label><input type="search" name="city">
                <label>State:</label><select name="state">
                    <option value="va">Virginia</option>
                    <option value="md">Maryland</option>
                    <option value="sc">South Carolina</option>
                    <option value="nc">North Carolina</option>
                </select><br>
            <label>Postal Code:</label><input type="search" name="postalcode"><br>
            <input type="submit" value="Filter">
        </fieldset>
    </form>
    <!--Table is a static representation of expected result-->
    <table>
        <thead>Agency Phone Numbers</thead>
        <tbody>
            <tr>
                <td>Phone #:</td>
                <td>Type of Phone #:</td>
                <td>Primary #?</td>
                <td>Note</td>
            </tr>
            <tr>
                <td>757-456-2366 </td>
                <td>Office</td>
                <td>No</td>
                <td>Senior Citizen Issues</td>
            </tr>
        </tbody>
    </table>
    <div class=footer"">Copyright 2016, Alan Webb, All Rights Reserved</div>
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

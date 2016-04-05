<!-- RVA Resources provider details. Display details about selected provider on providers.php -->

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RProvider Details</title>
</head>
<body>
    <!-- Provider details 
        path: index.php -> providers.php -> providerdetail.php
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
        <p><a href="index.php">Home: </a><a href="providers.php">Providers</a></p>
        <img src="underconstruction.gif" class="img-responsive" style="align-content:center" />

        <p style="text-align:center" class="text-warning">
            <mark style="background-color:hotpink;font-weight:700;font-family:Verdana, Geneva, Tahoma, sans-serif;">This is being built. If something works you got lucky.</mark>
        </p>
        <p>Yes, this should be the page you wanted after clicking on a provider of a service. If it was done.
           As you can see, it's not done. Don't worry, when it is done we'll make a big fuss about it. 
           Until then, sorry. :-(</p>
        <p style="font-weight:bold; text-align:center">Provider Details</p>
        <!-- Provider details -->
        <form role="form" class="form-horizontal" method="post">
            <div class="form-group">
                <label class="control-label input-label" for="servicearea"><input class="form-control input-sm" name="servicearea" type="text"><br>
                <label class="control-label input-label" for="providername"><input class="form-control input-sm" name="providername" type="text"><br>
                <label class="control-label input-label" for="address"><input class="form-control input-sm" name="address" type="text"><br>
                <label class="control-label input-label" for="city"><input class="form-control input-sm" name="city" type="text">
                <label class="control-label input-label" for="state"><input class="form-control input-sm" name="state" type="text">
                <label class="control-label input-label" for="postalcode"><input class="form-control input-sm" name="postalcode" type="text"><br>
                <label class="control-label input-label" for="website"><input class="form-control input-sm" name="website" type="text"><br>
                <label class="control-label input-label" for="note"><input class="form-control input-sm" name="note" type="text">
            </div>
        </form>
        <p><a href="index.php">Home</a></p>
    <!--Container div end-->
    </div>
</body>
</html>
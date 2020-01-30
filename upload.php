
<html>
  <head>
    <title>Basic Archive</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <?php // read the .ini file and create an associative array
        include 'lib/tweakch/archive/database_archive.php';
        include 'lib/tweakch/archive/filesystem_archive.php';

        $db = parse_ini_file("db/config.ini");
        /* now we can use the info in that file to create the appropriate, string connection, based on type, or just using the other info */
        $username = $db['username'];
        $passwd = $db['password'];
        $dbname = $db['dbname'];
        $host = $db['host'];
        $type = $db['type'];

        $archive = new FileSystemArchive("config.ini");
        try
        {
            $path = $archive->add_file($_FILES["fileToUpload"]);
        } 
        catch(PDOException $e) 
        {
            echo "Sorry, the database connection failed: " . $e->getMessage();
        }
    ?> 
    </body>
</html>

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

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <?php // read the .ini file and create an associative array
                    #include 'lib/tweakch/archive/database_archive.php';
                    include 'lib/tweakch/archive/filesystem_archive.php';

                    $archive = new FileSystemArchive("config.ini");
                    $header = "header";
                    $message = "message";
                    try
                    {
                        $path = $archive->add_file($_FILES["fileToUpload"]);
                        $header = "File uploaded";
                        $message = $path;
                    } 
                    catch(PDOException $e) 
                    {
                        $title = "an error occurred";
                        $message = "Sorry, the database connection failed: " . $e->getMessage();
                    }
                ?> 
                <h1 class="display-4"><?php echo $header; ?></h1>
                <p class="lead"><?php echo $message; ?></p>
            </div>
        </div>
    </body>
</html>
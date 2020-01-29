<?php // read the .ini file and create an associative array

    $db = parse_ini_file("db/config.ini");
    /* now we can use the info in that file to create the appropriate, string connection, based on type, or just using the other info */
    $username = $db['username'];
    $passwd = $db['password'];
    $dbname = $db['dbname'];
    $host = $db['host'];
    $type = $db['type'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Basic Archive</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php echo '<p>Hello World</p>'; ?>
    <dl>
    <?php 
      foreach ($db as $key => $value) {
          // $arr[3] wird mit jedem Wert von $arr aktualisiert...
          echo "<dt>{$key}</dt>";
          echo "<dd>{$value}</dd>";
      }
      
      try {
        $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>
    <dl>
  </body>
</html>
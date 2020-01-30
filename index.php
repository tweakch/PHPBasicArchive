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
  <?php include __DIR__ . '/nav.php'; ?>
  <div class="jumbotron jumbotron-fluid bg-transparent">
    <div class="container">
      <h1 class="display-4">PHP Basic Archive</h1>
      <p class="lead">Upload a file to store it in the archive.</p>
      <hr>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" class="btn btn-primary" href="https://github.com/tweakch/PHPBasicArchive"
          role="button" />
      </form>
    </div>
  </div>
</body>

</html>



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
          <h1 class="display-4">PHPBasicArchive</h1>
          <p class="lead">A simple archive in PHP.</p>
          <p>PHPBasicArchive is a sample project by <a href="https://github.com/tweakch">tweakch</a>. Check out the source code on <a href="https://github.com/tweakch/PHPBasicArchive">github</a></p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
      </div>
    </div>
  </body>
</html>

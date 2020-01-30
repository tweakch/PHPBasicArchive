<?php 

include __DIR__ . '/filesystem_archive.php';

class DatabaseArchive extends FileSystemArchive  {
  // Properties

  function get_username(){
    return $this->config["username"];
  }
  
  function set_degree($degree){
    $this->degree = $degree;
  }

  function __construct($config_path = null) {
    parent::__construct($config_path);
  }

  /**
   * 
   * 
            try {
                $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $passwd);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
              }
              catch(PDOException $e)
              {
                echo "Sorry, the database connection failed: " . $e->getMessage();
              }
   * 
   */
}

?>

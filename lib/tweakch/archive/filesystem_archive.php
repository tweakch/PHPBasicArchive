<?php 

include __DIR__ . '/memory_archive.php';

/**
 * Uses the filesystem to store files
 * 
 * + => uses filesystem to store files
 * - => will not store files with the same name in the same folder
 */
class FileSystemArchive extends ArchiveBase  {
    // Properties
    public $max_size;

    function __construct($config_path = null) {
        parent::__construct($config_path);
        $this->load_from_config('max_size',$this->max_size,500000);
    }

    function add_file($file) {
        # find a free path in the filesystem
        do{
        $target_file = $archive->get_path($_FILES["fileToUpload"]["name"]);
        } while(!file_exists($target_file));
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > $this->max_size) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {    
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            return $target_file;
        }
    }     
}

?>
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
    public $allowed_files;

    function __construct($config_path = null) {
        parent::__construct($config_path);
        $this->load_from_config('max_size',$this->max_size,500000);
        $this->load_from_config('file_types', $this->allowed_files, "jpg,png,jpeg,gif");
    }

    function add_file($file) {        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if($check == false) {
                throw new Exception("File is not an image.");
            }
        }

        // Check file size
        if ($file["size"] > $this->max_size) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Allow certain file formats
        $ext = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
        $allowed = isset(split(",",$this->allowed_files)[$ext]);
        if(!$allowed) {
            throw new Exception("Sorry, only {$this->allowed_files} files are allowed.");
        }

        # find a free path in the archive
        do{
            $target_file = $this->get_path($file["name"]);
        } while(file_exists($target_file));

        // Create the directory if it does not exist
        $target_path = substr($target_file,0,strripos($target_file,"/"));
        if(!is_dir($target_path)) mkdir($target_path,0750,true);    

        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }
        return $target_file;
    }     
}

?>

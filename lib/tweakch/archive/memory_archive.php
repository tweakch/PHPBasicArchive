<?php

include __DIR__ . '/archive_base.php';

class MemoryArchive extends ArchiveBase {
    // Properties
    // rootDirectory  
    private $store;
        
    function __construct($config){
        parent::__construct($config);
        $this->store = array();
        $this->loadStore();
    }

    function loadStore() {
      $store = dirToArray($this->get_rootDir);
    }
    
    private function dirToArray($dir) {
         $result = array();
      
         $cdir = scandir($dir);
         foreach ($cdir as $key => $value)
         {
            if (!in_array($value,array(".","..")))
            {
               if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
               {
                  $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
               }
               else
               {
                  $result[] = $value;
               }
            }
         }
        
         return $result;
      }

    function add_file($file, $path = null) {
        $isset = isset($this->store[$path]);
        if($path != null && !$isset)
        {
            $this->store[$path]=$file;
            return $path;
        }
        if($isset) {
            echo "*** COLLISION AT {$path} ***";
        } 
        return $this->add_file($file, $this->get_path());
    }

    function usage(){
        $used = sizeof($this->store);
        $free = $this->get_space()-$used;
        echo "Free: {$free}, Used: ${used}" ;
    }
}

?>

<?php 

class ArchiveBase {
  // Properties
  // number of folders next to each other
  public $degree;
  
  // number of folders in a path
  public $height;

  // number of files next to each other 
  public $partition;
  
  // folder of the archive
  public $rootDir;

  public $config;

  function load_from_config($key, &$property, $default)
  {
    if(!$this->has_config($key)) { 
      $property = $default; 
    } else {
      $property = $this->get_config($key);
    }
  }

  function __construct($config_path) {
    $this->config = parse_ini_file($config_path);

    $this->load_from_config('degree',$this->degree,10);
    $this->load_from_config('depth',$this->height,2);
    $this->load_from_config('partition',$this->partition,1024);
    $this->load_from_config('rootDir',$this->rootDir,'uploads');    
  }
  
  # gets random path
  function get_path() {
    $name = rand(1,$this->partition);
    return $this->get_path_by_name($name);
  }

  # gets a random path with the specified name
  function get_path_by_name($name) {
    $arr = array($this->rootDir);
    for($x = 0; $x < $this->height; $x++){
      array_push($arr, rand(0,$this->degree-1));
    }
    array_push($arr, $name);
    return join("/",$arr);
  }
  
  // Methods
  function get_rootDir(){
    return $this->rootDir;
  }

  function set_rootDir($dir) {
    $this->rootDir = $dir;
  }

  function get_space() {
    return pow($this->degree, $this->height) * $this->partition;
  }
    
  function has_config($key){
    return isset($this->config[$key]);
  }

  function get_config($key){
    return $this->config[$key];
  }
}


?>

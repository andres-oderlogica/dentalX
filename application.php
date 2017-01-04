<?php
class App
 {
  public static $base;
  public static $session;
  public static $user;
  
  //Modulo procesado actualmente-----------------------
  public static $module_name;
  public static $module_file;

  //******************************************
  static function getFile()  // archivo actual
  {
    /*array (size=6)
  0 => string '' (length=0)
  1 => string 'home_folder' (length=8)
  2 => string 'bin' (length=3)
  3 => string 'modules' (length=7)
  4 => string 'login' (length=5)
  5 => string 'index.php' (length=9)*/
       
    $vec = explode('/', $_SERVER["REQUEST_URI"]);
    return ($vec[5]=='')?'index.php':$vec[5];
  }
  //******************************************
  static function getModule()   //modulo actual
  {     
    $vec = explode('/', $_SERVER["REQUEST_URI"]);
    return $vec[4];
         // var_dump($vec); var_dump($login);
  }
  //******************************************
  public function __construct()
  {
  }
  //******************************************
  static function getJS($script)
  {
  	 $res = Config::$url_home_lib .'js/'. $script;
  	 $res = '<script type="text/javascript" src= "'.$res.'"></script>'."\n";
  	 return $res;
  }
  //******************************************
  static function getCSS($script)
  {
  	 $res = Config::$url_home_lib . $script;
  	 $res = '<link rel="stylesheet" type="text/css" href="'.$res.'">'."\n";
  	 return $res;
  }
  //******************************************
  static function getLib($lib)
  {	 $res = '';
  	 if (array_key_exists($lib, Config::$libs))
  	 	{  $l = Config::$libs[trim($lib)];
  	 	   foreach ($l as $value) {
  	 	   	 if ($value['type'] == 'css')
  	 	   	    {
  	 	   	    	$res .= self::getCSS($value['path']);
  	 	   	    }
			 if ($value['type'] == 'js')
  	 	   	    {
  	 	   	    	$res .= self::getJS($value['path']);
  	 	   	    }
  	 	   }
  	 	}
     else 	
      throw new Exception("La librería [$lib] no existe", 1);
      
  	 return $res;
  }
  //******************************************
   static function getPackJs($pack)
   {  $res ='';
      if (array_key_exists($pack, Config::$packs))
        { $l = Config::$packs[trim($pack)];
          foreach ($l as $value)
            $res .= self::getLib($value) ."\n";
        }
      else  
        throw new Exception("El paquete  [$pack] no existe", 1);  
      return $res;
   }
  //******************************************
 }

 // App::base = "la base de datos";
 
 

?>

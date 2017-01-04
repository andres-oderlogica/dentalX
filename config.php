<?php   
	class Config
	{
		public static $host = '127.0.0.1'; 
		public static $user = 'root';         
	 	public static $pass = '';					
	 	public static $base = 'facturacion_web';
     	public static $home = '';
	 	public static $home_lib = '';
	 	public static $home_bin = '';
	 	public static $url = '';
	 	public static $url_home = '';
	 	public static $url_home_lib = '';
	 	public static $ds = '';
	 	public static $debug = false;   // Depurar base
   		public static $driver= 'mysql';
   		public static $libs = array();
   		public static $packs = array();
   		public static $theme = 'basic';
        public static $record_style = 'fields';  //      numbers, both, default     
	}

	$pageURL = 'http';

	if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
    	$pageURL .= "s";
	}

	$pageURL .= "://";
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	
	Config::$ds = DIRECTORY_SEPARATOR;
	Config::$home = dirname(__FILE__);
	Config::$home_lib = Config::$home.Config::$ds.'lib'.Config::$ds;
	Config::$home_bin = Config::$home.Config::$ds.'bin'.Config::$ds;
	Config::$url = $pageURL;
	Config::$url_home = $pageURL;

	$pos = stripos($pageURL, '/bin');
	if ($pos !== false)
	    {
	        $sub = mb_substr($pageURL, $pos);
	    	Config::$url_home = str_ireplace($sub, '', $pageURL) . '/';
	    }
    Config::$url_home_lib =	Config::$url_home.'lib/';

    Config::$libs['jquery'] = array(array('type'=>js, 'path'=> 'jquery/jquery.js'));
    Config::$libs['jquery+ui'] = array(array('type'=>js, 'path'=> 'jquery/jquery.js'),
    	                              array('type'=>js, 'path'=> 'ui/jquery-ui.js'),
    	                              array('type'=>css, 'path'=> 'js/ui/themes/redmond/jquery-ui.css')
    	                              );
    Config::$libs['ui'] = array(       array('type'=>js, 'path'=> 'ui/jquery-ui.js'),
    	                              array('type'=>css, 'path'=> 'js/ui/themes/redmond/jquery-ui.css')
    	                              );
    Config::$libs['notify'] = array(   array('type'=>js, 'path'=> 'toastr/toastr.min.js'),
    	                              array('type'=>css, 'path'=> 'js/toastr/toastr.min.css')
    	                              );
    $theme = Config::$theme;
    Config::$libs['theme'] = array(array('type'=>css, 'path'=> "theme/$theme/template.css"));
    Config::$libs['bootstrap'] = array(array('type'=>css, 'path'=> "js/bootstrap-3.3.2/css/bootstrap.min.css"),
    								   array('type'=>css, 'path'=> "js/bootstrap-3.3.2/css/bootstrap-theme.min.css"));

    Config::$libs['bootstrap_js'] = array(array('type'=>js, 'path'=> "bootstrap-3.3.2/js/bootstrap.min.js"),
    								   );

    Config::$libs['datatables'] = array(array('type'=>js, 'path'=> 'data_tables/media/js/jquery.dataTables.min.js'),
    	                               array('type'=>css, 'path'=> 'js/data_tables/media/css/jquery.dataTables.min.css')
    	                              );
    Config::$libs['msgbox'] = array(array('type'=>js, 'path'=> 'boostbox/bootbox.min.js')
    	                              );
    Config::$libs['app'] = array(array('type'=>js, 'path'=> 'app/utiles.js'),
                                 array('type'=>js, 'path'=> 'app/config.js'),
                                 array('type'=>css, 'path'=> 'js/app/css/general.css')
    	                              );

    Config::$libs['select2'] = array(array('type'=>js, 'path'=> 'select2-3.5.2/select2.min.js'),
    	                             array('type'=>css, 'path'=> 'js/select2-3.5.2/select2.min.css'),
    	                             array('type'=>css, 'path'=> 'js/select2-3.5.2/select2-bootstrap.css'),
    	                             array('type'=>js, 'path'=> 'select2-3.5.2/auto_select2.js')
    	                             );
     Config::$libs['money'] = array(array('type'=>js, 'path'=> 'accounting/accounting.min.js'));

     Config::$libs['crud'] = array(array('type'=>js, 'path'=> 'app/crud_data.js'),
                                    array('type'=>js, 'path'=> 'app/crud_connect.js'),
                                    array('type'=>js, 'path'=> 'app/table_data.js'),   
                                    array('type'=>js, 'path'=> 'app/table_connect.js')
                                    );
     Config::$libs['db_nocrud'] = array(array('type'=>js, 'path'=> 'app/crud_data.js'),
                                    array('type'=>js, 'path'=> 'app/nocrud_connect.js'),
                                    array('type'=>js, 'path'=> 'app/table_data.js'),   
                                    // array('type'=>js, 'path'=> 'app/table_connect.js')
                                    );
     Config::$libs['modal'] = array(
                                     array('type'=>css, 'path'=> 'js/fancybox/source/jquery.fancybox.css?v=2.1.5'),
                                     array('type'=>js, 'path'=> 'fancybox/source/jquery.fancybox.pack.js?v=2.1.5')
                                   );
     Config::$libs['date_picker'] = array(array('type'=>js, 'path'=> 'datepicker/js/bootstrap-datepicker.min.js'),
                                          array('type'=>js, 'path'=> 'datepicker/js/bootstrap-datepicker.es.js'),
                                          array('type'=>js, 'path'=> 'app/date_picker_connect.js'),
                                          array('type'=>css, 'path'=> 'js/datepicker/css/bootstrap-datepicker3.min.css')                                          
                                      );
     Config::$libs['validate'] = array(
                                     array('type'=>js, 'path'=> 'jq-validation/jquery.validate.min.js'),
                                     array('type'=>js, 'path'=> 'jq-validation/localization/messages_es.min.js')
                                   );     
    /// Packs de Libs
	Config::$packs['basic'] = array('jquery', 'theme', 'bootstrap');
	Config::$packs['db'] = array('jquery+ui', 'notify', 'bootstrap', 'bootstrap_js', 'theme', 'datatables', 'msgbox', 'app', 'money', 'validate');
    Config::$packs['db_nocrud'] = array('jquery+ui', 'notify', 'bootstrap', 'bootstrap_js', 'theme', 'datatables', 'msgbox', 'app', 'money', 'db_nocrud', 'validate');
    Config::$packs['db_crud'] = array('jquery+ui', 'notify', 'bootstrap', 'bootstrap_js', 'theme', 'datatables', 'msgbox', 'app', 'money', 'crud', 'validate');
?>

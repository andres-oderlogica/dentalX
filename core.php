<?php
	include_once 'config.php';
	include_once 'application.php';
	include_once 'lib/db/base.php';
	include_once 'lib/app/user.php';
	include_once 'lib/app/session.php';

    //Incluiir Base--------------------------------------
	App::$base = base::Get();  //BaseDemo::Get();
	include_once 'lib/db/active_table.php';  // después de incluir base.php	
    //---------------------------------------------------

    App::$session = new odSession();
	App::$user = new odUser(App::$session);   // User accede a la base de datos

    // echo App::$user->Show();
	if (!App::$user->canAccess())
		 die('Acceso denegado...');	
?>

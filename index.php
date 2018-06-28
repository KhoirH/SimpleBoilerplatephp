<?php 
require_once "core/init.php";
require_once "template/head.php";
	if (file_exists("pages/".helper::set("p").".php")) 
	{		
		echo url::set_title(helper::set("p"));				
		require_once "template/header.php";	
		require_once "pages/".helper::set("p").".php";		
		require_once "template/footer.php";

	}
	elseif(helper::set("p") == "")
	{
		echo url::set_title();	
		require_once "template/header.php";
		require_once "pages/home.php";
		require_once "template/footer.php";

	}
	elseif (file_exists("no_template/".helper::set("p").".php")) 
	{
		echo url::set_title(helper::set("p"));				
		require_once "no_template/".helper::set("p").".php";
	}
	else{
		require_once "error.php";

	}

?>
<?php 
ob_start();
spl_autoload_register(function($data){
		require_once $_SERVER['DOCUMENT_ROOT'].'/sanjore/class/'.$data.".php";
})
 ?>
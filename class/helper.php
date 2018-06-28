<?php 

class helper
{
	
	public static function set($set ,$power=false)
	{
		
		$set_ = str_replace("'", "", $set);
		
		if (isset($_POST["$set_"])) 
		{
			$result =  $_POST["$set_"];	
		}
		elseif(isset($_GET["$set_"]))
		{
			$result =  $_GET["$set_"];
		}else{
			$result = false;
		}
		switch ($power) {
			case 'hash':
			$result = password_hash($result, PASSWORD_DEFAULT);
			break;
		}
		return $result;
	}
}

 ?>
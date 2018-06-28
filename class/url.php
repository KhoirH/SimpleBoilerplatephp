<?php 
class url
{
	private $title_ ;
	public static function set_title($set = "sanjore")
	{
		$data = explode("/",$set);
		$data = end($data);
		$set = str_replace("_", " ", $set);
		return "<title>".ucwords($set)."</title></head>";
	}
	public static function base_url($url)
	{
		
		return "http://localhost/sanjore/".$url;
	}
	public static function header($url)
	{
		header("location:$url");
	}
}
 ?>
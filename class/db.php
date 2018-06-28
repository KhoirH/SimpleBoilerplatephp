<?php 

class db extends database
{
	private $table  ;
	public $query,
			$arr = array() ;
	public function tabel($table)
	{
		return $this->table= $table;
	}
	public function select($sql=false ,$table= false)
	{
		$this->table = ($table) ? $table :$this->table;

		if ($sql) {
			$sql = implode(",", $sql);
			$this->query = "SELECT $sql FROM ".$this->table;
		
		}else{
			$this->query =  "SELECT * FROM ".$this->table;

		}
		return $this;
	}
	public function where($where,$bride = false,$method = false)
	{
		$method= ($method) ? " ".$method." " :" = ";
		$key = implode($method,array_keys($where));
		
		foreach ($where as $key => $value) {
			if (is_int($value)) {
				$this->arr[] = $value;
			}else{
				$this->arr[] = "'".$value."'";

			}
			$arr[] = $key ." ". $method." ?";
		}
		$isi = implode(" ".$bride." ", $arr);
		$this->query .=  " where $isi" ;
	return $this ;
	}
	public function orderby($jenis )
	{
		$this->query .= " order by $jenis" ;
		return $this; 
	}
	public function limit($start , $end)
	{
		$this->query .= " limit $start , $end";  
	}
	public function join($table_join, $join_1, $join_2)
	{
		$this->query .= " JOIN $table_join ON $table_join.".$join_2." = ".$this->table.".$join_1 ";
		return $this;
	}

	public function insert($data)
	{
		if (!isset($this->table)) {
			die("<h4 class=\"center\">Anda Harus Mengeset Table</h4>");
		}

		$table = implode( " , ", array_keys($data));
		
		foreach ($data	as $key => $value) {
			$hash[] = "?";
			$this->arr[] = $value ; 		
		}

		$hash_ = implode( " , ",$hash );
		$this->query = "INSERT INTO ".$this->table."($table) VALUES($hash_)";
		
		return	$this;
	}
	public function update($data )
	{
		if (!isset($this->table)) {
			die("<h4 class='center'>Anda Harus Mengeset Table</h4>");
		}
		foreach ($data as $key => $value) {
			$arr[] = $key." = ?";
			$this->arr[] = $value;
			
		}

		$data = implode(" , ", $arr);
		$this->query = " UPDATE ".$this->table." SET ".$data;
		
		return $this;
	}
	public function run()
	{
		$run = $this->koneksi->prepare($this->query);
		$run->execute($this->arr);
		
		$this->arr = array();
		return $run;
		
	}	
	public function one()
	{
		$set = $this->run();
		$result = $set->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function all()
	{
		$set = $this->run();
		$result = $set->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}



}

 ?>
<?php
	abstract class connection{
		public $db="";
		public function __construct()
		{
			$this->db= mysqli_connect("localhost","root","","yogesh");
			// print_r($this->db);

			if(session_id()==""){
				session_start();
				// echo session_id();
			}
		}
		public function __destruct()
		{
			$res=mysqli_close($this->db);
			// var_dump($res);
		}
	}
	// $conn=new connection(); we cannot create object of abstarct classes
	class query extends connection
	{
		function insert($tablename,$colname,$values)
		{
			$str="insert into $tablename ($colname) values ($values)";
			// echo $str;
			$res=mysqli_query($this->db,$str) or die(mysqli_error($this->db));
			// var_dump($res);
		}
		function delete($tablename,$condition)
		{
			$str="delete from $tablename where $condition";
			// echo $str;
			$res=mysqli_query($this->db,$str) or die (mysqli_error($this->db));
			// var_dump($res);
		}
		function update($table,$records,$consition)
		{
			$str = "update $table set $records where $consition";
			// echo $str;
			$rec = mysqli_query($this->db,$str) or die(mysqli_error($this->db));
			// var_dump($rec);
		}
		function select($colname,$tablename,$condition)
		{
			$str = "select $colname from $tablename where $condition";
			// echo $str;
			$rec = mysqli_query($this->db,$str) or die(mysqli_error($this->db));

			// echo "<pre>";
			// print_r($rec);
			// echo "</pre>";

			if($rec->num_rows >0)
			{
				while($ans = $rec->fetch_array(MYSQLI_ASSOC))
				{
					// echo "<pre>";
					// print_r($ans);
					// echo "</pre>";
					$finalresult[] = $ans;
				}
				return $finalresult;
			}
			else
			{
				return 0;
			}
		}
	}

	$obj= new query();
?>
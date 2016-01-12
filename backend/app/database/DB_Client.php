<?php
include_once('DB_Connector.php');

class Client extends Connector
{
	protected $DataBase;
	public function __construct()
	{
		$this->DataBase = $this->open();
	} 

	public function __destruct()
	{
		$this->close();
		$this->DataBase = null;
	}

	//@return mysqli_result object or true, false
	private function query($query)
	{
		$DataBase = $this->DataBase;
		$result = $DataBase->query($query);

		if (!$result) {
			exit('(DB Client) Mysqli Error: ' . $DataBase->error);
		}
		return $result;
	}

	//@return $result
	public function setter($todo) 
	{
		$result = $this->query($todo);

		if ($result !== true) {
			exit('(DB Client) make sure that what you give me is a set value');
		}
		return $result;
	}

	//@return mysqli_result
	public function getter($todo)
	{
		$result = $this->query($todo);

		if ($result === true) {
			exit('(DB Client) make sure that what you give me is a get value');
		}
		return $result;
	}
}


?>
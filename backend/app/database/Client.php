<?php
include_once('Connector.php');

class Client extends Connector
{
	private $DataBase;
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
			exit('(Client) Mysqli Error: ' . $DataBase->error);
		}
		return $result;
	}

	//@return true
	public function setter($todo) 
	{
		$result = $this->query($todo);

		if ($result !== true) {
			exit('(Client) make sure that what you give me is a set value');
		}
		return true;
	}

	//@return true
	public function getter($todo)
	{
		$result = $this->query($todo);

		if ($result === true) {
			exit('(Client) make sure that what you give me is a get value');
		}
		return $result;
	}
}


?>
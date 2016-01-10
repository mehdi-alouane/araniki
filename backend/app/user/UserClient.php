<?php
include_once('../database/Client.php');
include_once('IConfigUser.php');

class UserClient implements IConfigUser 
{
	private $DataBase;

	public function __construct()
	{
		$this->DataBase = new Client();
	}

	public function __destruct()
	{
		$this->DataBase = null;
	}

	public function create($name, $passwd, $email) 
	{
		$DataBase = $this->DataBase;
		$table = self::TABLE;
		$NColumn = self::NAMECOLUMN;
		$PColumn = self::PSWDCOLUMN;
		$EColumn = self::EMAILCOLUMN;
		$todo  = 'INSERT INTO '. $table .'('. $NColumn.','. $PColumn .','. $EColumn .') ';
		$todo .= 'VALUES(\''. $name .'\',\''. md5($passwd) .'\',\''. $email .'\')';
		$result = $DataBase->setter($todo);

	}

	public function remove($id)
	{

	}

	public function update($id, $targets, $values)
	{

	}
}

$use = new UserClient();
$use->create('medo', '@open@', 'mehdi@gmail.com');
?>	
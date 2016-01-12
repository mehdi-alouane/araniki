<?php
include_once('../database/DB_Client.php');
include_once('IUserConfig.php');

class UserClient implements IConfigUser 
{
	private $DataBase;
	public $name;
	public $pswd;
	public $email;

	public function __construct($name = null, $pswd = null, $email = null)
	{
		$this->name  = $name;
		$this->pswd = $pswd;
		$this->email = $email;
		$this->DataBase = new Client();
	}

	public function __destruct()
	{
		$this->DataBase = null;
	}

	public function create($name = null, $pswd = null, $email = null) 
	{
		//DATABASE Client trigger
		$DataBase = $this->DataBase;
		//User info
		$name  = ($name)?:$this->name;
		$pswd  = ($pswd)?:$this->pswd;
		$email = ($email)?:$this->email;
		//User table info
		$table = self::TABLE;
		$NColumn = self::NAMECOLUMN;
		$PColumn = self::PSWDCOLUMN;
		$EColumn = self::EMAILCOLUMN;
		//Query 
		$todo  = "INSERT INTO $table($NColumn, $PColumn, $EColumn) VALUES('$name', '". $this->hash($pswd) ."', '$email')";
		$result = $DataBase->setter($todo);
		return $result;
	}

	public function checkout(array $whatEver)
	{
		//DATABASE Client trigger
		$DataBase = $this->DataBase;
		$table = self::TABLE;
		$columns = implode(',', array_keys($whatEver));
		$condition = "WHERE ";
		$loop = 0;
		foreach ($whatEver as $key => $value) {
			if ($key === 'pswd') $value = $this->hash($value);
			if ($loop === 0) $condition .= $key .' = '. $value;
			else $condition .= ' AND '. $key .' = '. $value;
			$loop++;
		}
		//Query
		$todo = "SELECT $columns FROM $table $condition";
		$result = $DataBase->getter($todo);
		foreach($result as $key => $value) {
			echo $key .' = '. $value .'<br>';
		}
	}

	public function Set(array $target, $value)
	{
		
	}

	public function get(array $target)
	{

	}

	private function hash($pswd) 
	{
		$hash = md5($pswd.md5($pswd));
		return $hash;
	}
}

$use = new UserClient('fjkf','gdgdfxx','gdgdf');
$user['name'] = 'adil';
$user['passwd'] = 'adidl';
$user['email'] = 'addil';
$use->checkout($user);

?>	
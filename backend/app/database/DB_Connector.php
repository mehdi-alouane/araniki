<?php
include_once('IDB_Config.php');

abstract class Connector implements IConfig
{
	private $hook = null;
	abstract public function getter($todo);
	abstract public function setter($todo);

	//@return mysqli object
	protected function open()
	{
		$host = self::HOST;
		$user = self::USER;
		$pswd = self::PSWD;
		$name = self::NAME;

		if ($this->hook !== null) {
			return $this->hook;
		}

		$DB = new mysqli($host, $user, $pswd, $name);
		if ($DB->connect_errno) {
			exit('(DB Connector) Connect Error: ' . $DB->connect_error);
		}
		$this->hook = $DB;
		return $DB;
	}

	//@return true
	protected function close()
	{
		$DB = $this->hook;

		if (!$DB->close()) {
			exit('(DB Connector) Close Error: ' . $DB->connect_error);
		}
		$this->hook = null;
		return true;
	}
}

?>
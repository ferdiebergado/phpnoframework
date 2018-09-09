<?php
abstract class BaseModel
{
	protected $db;

	public function __construct()
	{
		$this->db = $this->getConnection();
	}

	private function getConnection() {
		try {
			$db = require(CONFIG_PATH . 'database.php');
			$dsn = "mysql:host=". $db['host'] . ";port=" . $db['port'] . ";dbname=" . $db['dbname'] . ";charset=" . $db['charset'];
			$connection = new PDO($dsn, $db['username'], $db['password'], $db['options']);
            // if (config('env') === 'dev') {
            //     $connection = new DebugBar\DataCollector\PDO\TraceablePDO($connection);
            //     $debugbarRenderer->addCollector(new DebugBar\DataCollector\PDO\PDOCollector($connection));
            // }
			return $connection;
		} catch(\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
}

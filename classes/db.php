<?php

namespace Rick;

class DBConnectionError extends \PDOException{}
class DBBadQueryException extends \Exception{}

class DB extends \PDO
{
	public $prefix = '';
	private static $instance = null;
	
	public static function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}
		
		return static::$instance;
	}
	
	public static function getTableData($table, $orderBy = "`id` ASC", $options = \PDO::FETCH_ASSOC)
	{
		$db = static::getInstance();
		$statement = $db->prepare("SELECT * FROM " . $db->prefix . $table . " ORDER BY " . $orderBy);
		if ($statement->execute()) {
			return $statement->fetchAll($options);
		}
		
		throw new DBBadQueryException();
	}
	
	public function __construct()
	{
		try {
			
			parent::__construct(Config::get('db.dsn'), Config::get('db.user'), Config::get('db.password'), Config::get('db.options'));
			$this->query('SET NAMES utf8;');
			$this->prefix = Config::get('db.prefix');
			
		} catch (\PDOException $e) {
			throw new DBConnectionError();
		}
	}
}

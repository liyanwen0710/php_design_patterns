<?php

/**
 * Created by PhpStorm.
 * User: romens
 * Date: 2017/6/2
 * Time: 下午4:13
 */
class dbSingleton
{

  /**
   * 实例
   * @var
   */
  private static $instance = null;

  /**
   * 数据库链接
   * @var mysqli
   */
  private $dbRef = null;

  private $dbKeys = array('host', 'user', 'password', 'database', 'port');

  /**
   * dbSingleton constructor.
   * @param $dbConfig
   */
  private function __construct()
  {
  }

  /**
   * 防止外界clone实例
   */
  private function __clone()
  {

  }

  private function connect($dbConfig)
  {
    foreach ($this->dbKeys as $item) {
      if(!array_key_exists($item,$dbConfig)){
        throw new Exception('database connect parameters required missing',9999);
      }
    }
    $this->dbRef = mysqli_connect($dbConfig->host, $dbConfig->user, $dbConfig->password, $dbConfig->database, $dbConfig->port);
    if(!$this->dbRef){
      throw new Exception('database connect failure',9999);
    }
  }

  /**
   * @param $dbConfig
   * @return dbSingleton|null
   */
  public function getInstance($dbConfig)
  {
    if (empty(self::$instance)) {

      self::$instance = new self();
      self::$instance->connect($dbConfig);
    }
    return self::$instance;
  }

}
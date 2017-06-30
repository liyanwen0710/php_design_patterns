<?php
/*****************************************************************
 * 青岛雨人软件有限公司©2017版权所有
 *
 * 本软件之所有（包括但不限于）源代码、设计图、效果图、动画、日志、
 * 脚本、数据库、文档均为青岛雨人软件或其附属子公司所有。任何组织
 * 或者个人，未经青岛雨人软件书面授权，不得复制、使用、修改、分发、
 * 公布本软件的任何部分。青岛雨人软件有限公司保留对任何违反本声明
 * 的组织和个人采取法律手段维护合法权益的权利。
 *****************************************************************
 * Created by PhpStorm.
 * User: romens
 * date: 2017/6/7
 * Time: 上午11:16
 */

function test1()
{
  $input_array = array("FirSt" => 1, "SecOnd" => 4);
  print_r(array_change_key_case($input_array));
}

function test2()
{
  $input_array = array('a' => 'a', 'b', 'c', 'd', 'e');
  print_r(array_chunk($input_array, 2));
  print_r(array_chunk($input_array, 2, true));
}

function test3()
{
  $records = array(
    array(
      'id' => 2135,
      'first_name' => 'John',
      'last_name' => 'Doe',
    ),
    array(
      'id' => 3245,
      'first_name' => 'Sally',
      'last_name' => 'Smith',
    ),
    array(
      'id' => 5342,
      'first_name' => 'Jane',
      'last_name' => 'Jones',
    ),
    array(
      'id' => 5623,
      'first_name' => 'Peter',
      'last_name' => 'David'
    )
  );

  $first_names = array_column($records, 'first_name', 'id');
  print_r($first_names);
}

function test4()
{
  #根据路径和后缀创建一个id
  $key = ftok(__DIR__, 'R');
#获取队列中的消息
  $q = msg_get_queue($key);
  var_dump($q);
#删除队列
//  msg_remove_queue($q);
#获取队列的状态信息
  $status = msg_stat_queue($q);
  print_r($status);
  echo "\n";
  for ($i = 0; $i < 2; $i++) {
    /**
     * 向队列里添加消息
     * resource $queue , int $msgtype , mixed $message [, bool $serialize = true [, bool $blocking = true [, int &$errorcode ]]]
     * $msgtype :消息的类型
     * $message : 具体的数据
     * $serialize:是否要序列化
     * $blocking: 是否阻塞 ， 当队列中满时，会进行阻塞，设为非阻塞会产生一个 MSG_EAGAIN 的 错误消息
     */
    $flag = msg_send($q, 111, array('a' => $i), true, false, $errorcode);
    var_dump($i . '--' . $errorcode);
  }

  /**
   * 接收消息
   * resource $queue , int $desiredmsgtype , int &$msgtype , int $maxsize , mixed &$message [, bool $unserialize = true [, int $flags = 0 [, int &$errorcode ]]]
   * $desiredmsgtype:0表示从队列最前面开始返回数据, bigger 0:具体的某个队列
   * $maxsize:数据最大值，获取的消息如果》此值则出错
   * $msgtype:消息的具体类型, 因为$desiredmsgtype可以不指定类型，即指定为0
   * $flags:MSG_IPC_NOWAIT 如果队列为空直接返回（不阻塞）, MSG_EXCEPT MSG_NOERROR 参见手册
   */
  $data = msg_receive($q, 0, $type, 200, $msg);
  var_dump($data);
  echo "\n";
  var_dump($type);
  echo "\n";
  var_dump($msg);
  echo "\n";
}

function test5()
{

//  "" (空字符串)
//  0 (作为整数的0)
//  0.0 (作为浮点数的0)
//  "0" (作为字符串的0)
//  NULL
//  FALSE
//  array() (一个空数组)
//  $var; (一个声明了，但是没有值的变量)
  var_dump(!!$a);
}

class Mysql{

  function connect(){
    echo 'Mysql has connected.';
  }
}

class SqlProxy{
  public $db;
  public function __construct($db)
  {
    $class = ucfirst($db);
    $this->db = new $class();
  }

  public function __call($name, $arguments)
  {
    $ref = new ReflectionClass($this->db);
    if($ref){
      $method = $ref->getMethod($name);
      if($method && $method->isPublic() && !$method->isAbstract()){
        $method->invoke($this->db,$arguments);
      }
    }
  }

}




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
 * date: 2017/6/19
 * Time: 下午3:01
 */
//use pattern_design_test\Colors;
//
////spl_autoload_register('auto');
//
//require_once('./Colors.php');
//function auto($class)
//{
//  if(!defined('APP_PATH')) {
//    define('APP_PATH', __DIR__.DIRECTORY_SEPARATOR.'..' . DIRECTORY_SEPARATOR);
//  }
//  require_once APP_PATH.$class.'.php';
//}
//
////用于动态
//class A
//{
//  private function abc()
//  {
//    echo "abcabc\r\n";
//  }
//
//}
//
//class ReflectionTest
//{
//  private $class = array();
//
//  public function __construct($class)
//  {
//    $this->class = ucfirst($class);
//
//  }
//
//  public function __call($name, $arguments)
//  {
//    $ref = new ReflectionClass($this->class);
//    try {
//      $method = $ref->getMethod($name);
//      echo $method->isPublic() ? 'isPublic' : '', $method->isPrivate() ? 'isPrivate' : '', $method->isProtected() ? 'isProtected' : '';
//
//      if ($method->isPublic() && !$method->isAbstract() && !$method->isPrivate()) {
//        $newObj = new $this->class();
//        $method->invoke($newObj, $arguments);
//      }
//    } catch (ReflectionException $e) {
//      $outputs = '';
//      $outputs .= "Code: {$e->getCode()} \r\n";
//      $outputs .= "Message: {$e->getMessage()} \r\n";
//      $outputs .= "ErrorLine: {$e->getLine()} \r\n";
//      $trace = $e->getTraceAsString();
//      $traceStr = 'Trace: ';
//      if (is_array($trace)) {
//        foreach ($trace as $k => $v) {
//          $traceStr .= "" . $v . "\r\n";
//        }
//      } else {
//        $traceStr .= $trace . "\r\n";
//      }
//      $outputs .= $traceStr . "\r\n";
//      $colors = new Colors();
//      echo $colors->getColoredString($outputs, 'red');
//    }
//
//  }
//}
//
//$ref = new ReflectionTest('a');
//$ref->aa();
//
//
//echo memory_get_usage();


function get_total_timestamp(){
  list($micros,$s) = explode(' ',microtime());
  $timestamp = $s.substr($micros,2,3);
  return $timestamp;
}

echo get_total_timestamp()."\r\n";
echo time();
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
 * date: 2017/6/5
 * Time: 下午5:26
 */


/**
 * 抽象主题角色
 * Interface IDbQuery
 */
interface IDbQuery{
  public function query();
}

/**
 * 具体主题角色
 * Class DbQuery
 */
class DbQuery implements IDbQuery {
  public function query()
  {
    echo "query MySQL.\r\n";
  }
}

/**
 * 代理角色 延迟代理
 * Class DbQueryProxy
 */
class DbQueryLazyProxy implements IDbQuery
{
  private $real_query;
  public function query()
  {
    echo "using lazy proxy.\r\n";
    $this->preQuery();
    if(empty($this->real_query)){
      $this->real_query = new DbQuery();
    }
    $this->real_query->query();
    $this->afterQuery();
  }
  private function preQuery(){
    echo "before query,connect database.\r\n";
  }
  private function afterQuery(){
    echo "after query,do other things.\r\n";
  }
}

/**
 * 代理角色 动态代理
 * Class DbQueryDynamicProxy
 */
class DbQueryDynamicProxy{

  private $subject;

  public function __construct($subject)
  {
    $this->subject = $subject;
  }

  public function __call($method, $arguments)
  {
    echo "using dynamic proxy.\r\n";
    return call_user_func_array(array($this->subject,$method),$arguments);
  }

}

// 使用延迟代理
$dbQueryLazyProxy = new DbQueryLazyProxy();
$dbQueryLazyProxy->query();
// 使用动态代理
$dbQuery = new DbQuery();
$dbQueryDynamicProxy = new DbQueryDynamicProxy($dbQuery);
$dbQueryDynamicProxy->query();
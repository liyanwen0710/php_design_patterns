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
 * date: 2017/6/9
 * Time: 上午10:13
 */
//某个人到银行去贷款，银行可能会做三件事，查银行卡到余额，此人到信用记录，此人有无信用劣迹等。

class User
{
  public $userName;

  public function __construct($userName)
  {
    $this->userName = $userName;
  }

  public function getUserName()
  {
    return $this->userName;
  }
}

/**
 * 子系统角色
 * Class Bank
 */
class Bank
{
  /**
   * 银行卡余额
   * @return int
   */
  public function getBalance(User $user)
  {
    echo  "用户：" . $user->getUserName() . "目前银行卡的余额：10000\r\n";
    return true;
  }
}

/**
 * 子系统角色
 * Class Credit
 */
class Credit
{
  /**
   * 信用记录
   * @return string
   */
  public function getCreditRecord(User $user)
  {
    echo  "用户：" . $user->getUserName() . "目前的信用记录良好。\r\n";
    return true;
  }
}

/**
 * 子系统角色
 * Class Loan
 */
class Loan
{
  public function getLoanRecord(User $user)
  {
    echo  "用户：" . $user->getUserName() . "目前的信用记录无任何不良记录。\r\n";
    return true;
  }
}

/**
 * 门面角色
 * Class Facade
 */
class Facade
{
  public $user;
  public $bank;
  public $credit;
  public $loan;

  public function __construct($user)
  {
    $this->user = $user;
    $this->bank = new Bank();
    $this->credit = new Credit();
    $this->loan = new Loan();
  }

  function preLoanQuery()
  {
    return $this->bank->getBalance($this->user) &&
      $this->credit->getCreditRecord($this->user) &&
      $this->loan->getLoanRecord($this->user);
  }
}

$user = new User('liyanwen');
$facade = new Facade($user);
$facade->preLoanQuery();

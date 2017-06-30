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
 * date: 2017/6/6
 * Time: 上午8:58
 */

/**
 * 抽象策略角色
 * Interface Strategy
 */
interface Strategy
{
  public function getDiscountPrice($price);

}

/**
 * 具体策略角色
 * Class ComputerBook
 */
class ComputerBook implements Strategy
{
  public function getDiscountPrice($price)
  {
    echo "You are buying computer book which will give you 7.5 discount!\r\n";
    return $price * 0.75;
  }
}

/**
 * 具体策略角色
 * Class LearningBook
 */
class LearningBook implements Strategy
{
  public function getDiscountPrice($price)
  {
    echo "You are buying learning book which will give you 8 discount!\r\n";
    return $price * 0.80;
  }
}

/**
 * 具体策略角色
 * Class VIPUser
 */
class VIPUser implements Strategy
{
  public function getDiscountPrice($price)
  {
    echo "You are VIP User, you will enjoy 5 discount!\r\n";
    return $price * 0.50;
  }
}

/**
 * 环境角色
 * Class Book
 */
class Book
{
  private $price;
  private $strategy;

  public function __construct($price)
  {
    $this->price = $price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function setStrategy(Strategy $strategy)
  {
    $this->strategy = $strategy;
  }

  public function getSettlePrice()
  {
    return $this->strategy->getDiscountPrice($this->price);
  }

}

$book = new Book(100.00);
$vip = new VIPUser();
$book->setStrategy($vip);
var_dump($book->getSettlePrice());

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
 * Time: 下午6:07
 */

namespace comments\strategy;
/**
 * 抽象策略角色
 * Interface Strategy
 */
interface Strategy{
  public function getDiscountPrice();

}


/**
 * 抽象类
 * Class Book
 */
class Book{
  public $price;
  public $discount;
  public function __construct($price){
    $this->price = $price;
  }
  public function setDiscountPrice($discount){
    $this->discount = $discount;
  }
}

/**
 * 具体策略角色
 * Class ComputerBook
 */
class ComputerBook extends Book implements Strategy{

  public function getDiscountPrice(){
    return $this->price*0.75;
  }
}

/**
 * 具体策略角色
 * Class LearningBook
 */
class LearningBook extends Book implements Strategy{

  public function getDiscountPrice(){
    return $this->price*0.80;
  }
}

/**
 * 环境角色
 * Class Payment
 */
class Payment{
  private $strategy;
  public function __construct(Strategy $strategy)
  {
    $this->strategy = $strategy;
  }
  public function pay(){
    return $this->strategy->getDiscountPrice();
  }
}



$computerBook = new ComputerBook(100.00);
$payment = new Payment($computerBook);
var_dump($payment->pay());
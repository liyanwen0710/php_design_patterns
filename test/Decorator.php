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
 * date: 2017/6/8
 * Time: 下午4:58
 */

/**
 * 抽象组件  表示饮料
 * Class Component
 */
abstract class Component{
  public $name;
  abstract public function drinkName();
  abstract public function cost();
}

/**
 * 具体组件 表示咖啡
 * Class Coffee
 */
class Coffee extends Component{

  public function __construct()
  {
    $this->name = 'coffee';
  }

  public function drinkName()
  {
    return $this->name;
  }

  public function cost()
  {
    return 30;
  }
}

/**
 * 具体组件 表示茶
 * Class Tea
 */
class Tea extends Component{

  public function __construct()
  {
    $this->name = 'tea';
  }

  public function drinkName()
  {
    return $this->name;
  }

  public function cost()
  {
    return 10;
  }
}

/**
 * 抽象装饰类
 * Class Decorator
 */
abstract class Decorator extends Component{
  public $component;
  public function __construct($component){
    $this->component = $component;
  }
}

/**
 * 具体装饰类  表示牛奶口味
 * Class Milk
 */
class Milk extends Decorator {

  public function __construct($component)
  {
    $this->name = ' Milk';
    parent::__construct($component);
  }

  public function drinkName()
  {
    return $this->component->drinkName().$this->name;
  }

  public function cost()
  {
    return $this->component->cost()+5;
  }
}

/**
 * 具体装饰类 表示甜口味
 * Class Sugar
 */
class Sugar extends Decorator {

  public function __construct($component)
  {
    $this->name = ' Sugar';
    parent::__construct($component);
  }

  public function drinkName()
  {
    return $this->component->drinkName().$this->name;
  }

  public function cost()
  {
    return $this->component->cost()+2;
  }
}

$beverage = new Coffee();
echo '您饮用的饮料是：'.$beverage->drinkName()."\r\n";
echo '您的消费是：'.$beverage->cost()."\r\n";

$beverageAddMilk = new Milk($beverage);
echo '您饮用的饮料是：'.$beverageAddMilk->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddMilk->cost()."\r\n";

$beverageAddSugar = new Sugar($beverage);
echo '您饮用的饮料是：'.$beverageAddSugar->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddSugar->cost()."\r\n";

$beverageAddMilkSugar = new Sugar($beverageAddMilk);
echo '您饮用的饮料是：'.$beverageAddMilkSugar->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddMilkSugar->cost()."\r\n";

echo "################################################\r\n";

$beverage = new Tea();
echo '您饮用的饮料是：'.$beverage->drinkName()."\r\n";
echo '您的消费是：'.$beverage->cost()."\r\n";

$beverageAddMilk = new Milk($beverage);
echo '您饮用的饮料是：'.$beverageAddMilk->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddMilk->cost()."\r\n";

$beverageAddSugar = new Sugar($beverage);
echo '您饮用的饮料是：'.$beverageAddSugar->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddSugar->cost()."\r\n";

$beverageAddMilkSugar = new Sugar($beverageAddMilk);
echo '您饮用的饮料是：'.$beverageAddMilkSugar->drinkName()."\r\n";
echo '您的消费是：'.$beverageAddMilkSugar->cost()."\r\n";
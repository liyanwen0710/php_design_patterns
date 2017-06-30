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
 * Time: 上午10:44
 */

/**
 * 抽象产品
 * Class Car
 */
abstract class Car
{
  /**
   * 汽车引擎，实际应用中应该是一个对象，这里用字符串来表示
   */
  public $engine;

  /**
   * 汽车玻璃，不同的汽车大小不一样，需要根据汽车的型号计算
   */
  public $glass;

  /**
   * 汽车方向盘
   */
  public $steeringWheel;

  public abstract function drive();

}

class AudiCar extends Car
{
  public function drive()
  {
    echo 'drive AudiCar cool';
  }


}

/**
 * 抽象建造类
 * Class Builder
 */
abstract class Builder
{
  /**
   * 创建引擎
   * @return mixed
   */
  public abstract function buildEngine();

  /**
   * 创建车玻璃
   * @return mixed
   */
  public abstract function buildGlass();

  /**
   * 创建方向盘
   * @return mixed
   */
  public abstract function buildSteeringWheel();

  /**
   * 返回创建好的产品
   * @return mixed
   */
  public abstract function getCar();
}

/**
 * 具体建造类
 * Class AudiBuilder
 */
class AudiBuilder extends Builder
{
  private $audiCar;

  public function __construct()
  {
    $this->audiCar = new AudiCar();
  }

  public function buildEngine()
  {
    $this->audiCar->engine = 'AudiEngine';
  }

  public function buildGlass()
  {
    $this->audiCar->glass = 'AudiGlass';
  }

  public function buildSteeringWheel()
  {
    $this->audiCar->steeringWheel = 'AudiSteeringWheel';
  }

  public function getCar()
  {
    return $this->audiCar;
  }
}

/**
 * 导演类
 * Class Director
 */
class Director
{

  public function __construct(Builder $builder)
  {
    $builder->buildEngine();
    $builder->buildGlass();
    $builder->buildSteeringWheel();
  }
}

//具体建造类
$audiBuilder = new AudiBuilder();
//导演类
$director = new Director($audiBuilder);

var_dump($audiBuilder->getCar());

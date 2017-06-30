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
 * Time: 下午4:45
 */

//某个商品有不同的规格，不同的颜色

/**
 * 抽象类  包含扩充抽象类的引用
 * Class GoodsSpec
 */
abstract class GoodsSpec{
  /**
   * 商品颜色类引用
   * @var
   */
  public $imp;
  public function setGoodsColor(GoodsColor $color){
    $this->imp = $color;
  }
  public abstract function show();
}

/**
 * 实现类
 * Class GoodsSpecBig
 */
class GoodsSpecBig extends GoodsSpec {
  public function show(){
    echo '本商品为大规格，颜色是'.$this->imp->getGoodsColor()."\r\n";
  }
}

/**
 * 实现类
 * Class GoodsSpecMiddle
 */
class GoodsSpecMiddle extends GoodsSpec {
  public function show(){
    echo '本商品为中规格，颜色是'.$this->imp->getGoodsColor()."\r\n";
  }
}

/**
 * 实现类
 * Class GoodsSpecSmall
 */
class GoodsSpecSmall extends GoodsSpec {
  public function show(){
    echo '本商品为小规格，颜色是'.$this->imp->getGoodsColor()."\r\n";
  }
}

/**
 * 扩充抽象类
 * Class GoodsColor
 */
abstract class GoodsColor{
  public $color;
  public abstract function getGoodsColor();
}

/**
 * 扩充实现类
 * Class GoodsColorBlue
 */
class GoodsColorBlue extends GoodsColor{

  public function __construct()
  {
    $this->color = '蓝色';
  }

  public function getGoodsColor()
  {
    return $this->color;
  }
}

/**
 * 扩充实现类
 * Class GoodsColorRed
 */
class GoodsColorRed extends GoodsColor{

  public function __construct()
  {
    $this->color = '红色';
  }

  public function getGoodsColor()
  {
    return $this->color;
  }
}

$goodsSpec = new GoodsSpecBig();
$goodsColor = new GoodsColorBlue();
$goodsSpec->setGoodsColor($goodsColor);
$goodsSpec->show();
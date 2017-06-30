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
 * Time: 下午2:08
 */


interface Prototype { public function copy(); }

class ConcretePrototype implements Prototype{
  public  $_name;

  public function __clone(){
    $this->_name = clone $this->_name;
  }

  public function __construct($name) { $this->_name = $name; }
  public function copy() { return clone $this;}
}

class Demo{}
$demo = new Demo();
$concretePrototype = new ConcretePrototype($demo);

$concretePrototype2 = $concretePrototype->copy();
var_dump($concretePrototype,$concretePrototype2);






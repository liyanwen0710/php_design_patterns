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
 * Time: 下午4:03
 */

interface ITarget{
  function janpanSocket();
}

class Adapter extends Adaptee implements ITarget
{

  public function janpanSocket()
  {
    $this->localSocket();
    echo "Convert the socket from three-pronged to two-pronged\r\n";
  }
}

class Adaptee{
  function localSocket(){
    echo "This is localSocket.\r\n";
  }
}


$adapter = new Adapter();
$adapter->janpanSocket();









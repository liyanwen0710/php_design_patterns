<?php

/**
 * Created by PhpStorm.
 * User: romens
 * Date: 2017/6/2
 * Time: 下午5:39
 */
class Button
{
}

class MacButton extends Button
{
}

class WinButton extends Button
{
}

interface IButton
{
  public function createButton($type);
}

class ButtonFactory implements IButton
{
  public function createButton($type)
  {
    switch ($type) {
      case 'Mac':
        return new MacButton();
      case 'Win':
        return new WinButton();
    }

  }
}

$buttonFactory = new ButtonFactory();
var_dump($buttonFactory->createButton('Mac'));
var_dump($buttonFactory->createButton('Win'));

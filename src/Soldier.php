<?php

namespace Styde;

class Soldier extends Unit {

  protected $damage = 40;
  protected $armor;

  public function __construct($name)
  {
    parent::__construct($name);
  }
}

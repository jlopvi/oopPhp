<?php

namespace Styde;

class Archer extends Unit {
  protected $damage = 20;
  protected $armor;
  public function attack(Unit $opponent)
  {
    show("{$this->name} lanza flechas a {$opponent->getName()}");

    $opponent->takeDamage($this->damage);
  }
}

<?php

namespace Styde;

class Scalibur implements Weapon
{
  protected $name = 'Scalibur';

  public function incrementeAttack($damage)
  {
    $damage = $damage * 2;
    return $damage;
  }

  public function getName()
  {
    return $this->name;
  }
}

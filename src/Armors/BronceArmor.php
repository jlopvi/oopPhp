<?php

namespace Styde\Armors;

use Styde\Armor;

class BronceArmor implements Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 2;
  }
}

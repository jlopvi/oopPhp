<?php

namespace Styde\Armors;

use Styde\Armor;

class LegendaryArmor implements Armor
{
  public function absorbDamage($damage)
  {
    return $damage / 5;
  }
}
